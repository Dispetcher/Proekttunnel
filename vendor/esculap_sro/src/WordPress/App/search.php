<?php

namespace Esculap\Wordpress\App;

use Esculap\Helpers\Helpers;

class Search
{
    private $queryTerm;
    private $dbInstance;

    public function __construct($dbInstance) {
        $this->dbInstance = $dbInstance;
    }

    public function postsResultsCallback($posts = array(), $wpQuery) {
        if (!$wpQuery->is_search) {
            return $posts;
        }

        $this->queryTerm = $wpQuery->query['s'];
        $searchResult = $this->searchMembers();
        $searchResultAdapted = $this->wpPostsAdapter($searchResult);

        return array_merge($searchResultAdapted, $posts);
    }

    public function postLinkCallback($permalink, $post) {
        $isEsculapEntity = (bool) $post->esculap;
        return $isEsculapEntity
            ? $post->esculap['url']
            : $permalink;
    }

    private function wpPostsAdapter($data) {
        $result = array();
        $config = Helpers::getConfig();
        $pluginUrl = $config['plugin']['plugin_url'];

        foreach ($data as $item) {
            $postParams = array(
                'ID' => $item['ID_AGENT'],
                'post_title' => $item['MEMBERNAME'],
                'post_excerpt' => "
                    № в реестре: {$item['REESTR_NUM']}.
                    ИНН: {$item['INN']}.
                    ОГРН: {$item['OGRN']}.
                    Статус: {$item['AGENTSTATUSE']}.
                ",
                'post_date' => $item['D_CERTIFICATE'],
                'esculap' => array(
/*                    'url' => $pluginUrl . '/#details/' . $item['ID_AGENT']   */
                      'url' => 'https://proekttunnel.ru/reestr/#id-' . $item['ID_AGENT']
                )
            );

            array_push($result, (object) $postParams);
        }

        return $result;
    }

    private function searchMembers() {
        $dbInstance = $this->dbInstance;
        $queryTerm = $this->queryTerm;

        $config = Helpers::getConfig();
        $table = $config['plugin']['database']['tables']['list'];
        $searchColumns = $config['plugin']['search']['fields'];
        $queryStr = '';

        foreach($searchColumns as $index => $column) {
            if ($index !== 0) {
                $queryStr .= ' UNION ';
            }
            $queryStr .= "SELECT * FROM {$table} WHERE {$column} LIKE '%{$queryTerm}%'";
        };

        $result = $dbInstance->query($queryStr)->fetchAll();
        return $result;
    }
}

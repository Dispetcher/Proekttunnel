<?php 
/*
Template Name: Реестр
*/
get_header();?>
<div class="content_bg">
    <?php get_template_part('includes/breadcrumbs');?>
    <div id="content_section">
        <div class="center_wrap">
            <div class="dt content_dt">
                <?php get_sidebar();?>
                <div class="dtc vat" id="page_content">
                    <div class="page_content">
                        <h1><?php if(get_field('seo_h1')): echo the_field('seo_h1'); else: the_title(''); endif;?></h1>
						<div class="page_content_orgnumber">
 		 По состоянию на <?php echo date(get_option('date_format')); ?> года количество действующих членов СРО &mdash; <?php echo 			get_post_meta($post->ID, 'orgnumber', true); ?>
           				</div>
                        <?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php the_content(''); ?>
							<?php endwhile; ?>
						<?php endif; ?>
					<?php// get_template_part('includes/page_date')?>
                    </div><!--/.page_content-->
				<div class="page_content_underreestr">
					<p>
					Актуальный реестр проектировщиков <strong>СРО А «ОПС-Проект»</strong> позволяет потенциальным заказчикам, всем заинтересованным лицам, в том числе государственным и муниципальным органам Санкт-Петербурга, получить достоверную информацию о той или иной компании, имеющей право осуществлять подготовку проектной документации. 
					</p>
					<p>
					Реестр членов СРО проектировщиков открывает доступ не только к официальным регистрационным данным организации, но и к сведениям о компенсационных взносах, о видах права. 	
					</p>
					<p>
					Особенно актуален реестр членов проектировщиков СРО А «ОПС-Проект» для тех, кто ищет, кому доверить создание проекта. Ведь в реестр заносятся данные о компаниях, которые состоят в Ассоциации, ведут свою деятельность абсолютно законно и регулярно проходят проверки.  В реестре содержатся результаты проведенных ранее проверок.	
					</p>
					<p>
					Все эти факторы значительно повышают рейтинг предприятия на профильном рынке и выгодно выделяют среди конкурентов, которые по каким-либо причинам не публикуют информацию о своей деятельности. 	
					</p>
				</div>	
				<p class="page_date date_reestr">Дата создания страницы: <?php the_time('d.m.Y H:i')?></p>
				<p class="page_date_modified">Дата изменения страницы: <?php echo date(get_option('date_format'));?> 08:25</p>
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>
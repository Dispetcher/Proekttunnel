<?php $id = get_the_ID(); ?>

<footer id="footer">
            <nav id="footer_nav" <?php if(418 == $post->ID):?>class="hidden"<?php endif;?>>
                <div class="center_wrap">
                    <ul class="footer_menu">
                        <?php wp_nav_menu(array('menu' => 'Нижнее меню', 'container' => '','items_wrap' => '%3$s')); ?>
                    </ul>
                </div>
            </nav>
            <div class="footer_content">
                <div class="center_wrap">
                    <div class="dt">
                        <div class="dtc vab logo_and_copy">
                            <div class="dt vab footer_logo">
                                <div class="dtc footer_logo_img">
                                    <a href="/"><img src="<?php bloginfo('template_url')?>/img/footer_logo.png" alt=""/></a>
                                </div>
                                <div class="dtc vab footer_logo_text">
                                    <a href="/">СРО А «Объединение <br>
                                    проектировщиков подземных  <br>
                                    сооружений, промышленных <br>
                                    и гражданских объектов»</a>
                                </div>
                            </div>
                            <p class="copy">© <?php if(418==$post->ID):?>© All rights reserved.<?php else:?>Все права защищены.<?php endif;?> <?php echo date('Y')?>.</p>
                            
                        </div><!--/.footer_logo-->
                        <div class="dtc vab footer_phones">
                            <p class="footer_phone">
                                <span class="label"><?php if(418==$post->ID):?>Tel:<?php else:?>Телефоны:<?php endif;?></span>
                                <a href="tel:<?php echo str_replace(' ','',get_field('phone_1','options'))?>"><?php the_field('phone_1','options')?></a>
                                <span><?php the_field('phone_1_text','options')?></span>
                            </p>
                            <p class="footer_phone">
                                <a href="tel:<?php echo str_replace(' ','',get_field('phone_2','options'))?>"><?php the_field('phone_2','options')?></a>
                                <span><?php the_field('phone_2_text','options')?></span>
                            </p>
                        </div>
                        <div class="dtc vab footer_contacts">
                            <p class="footer_email">
                                <span class="label">E-mail:</span>
                                <a href="mailto:info@metrotunnel.ru"><?php the_field('email','options')?></a>
                            </p>
                            <?php if(418==$post->ID):?>
                                <p class="footer_address">
                                    <span class="label">Address:</span>
                                    St Petersburg, Fuchika st, 4K, 611
                                </p>
                            <?php else:?>
                                <p class="footer_address">
                                    <span class="label">Адрес:</span>
                                    <?php the_field('address','options')?>
                                </p>
                            <?php endif;?>
                        </div>
                    </div><!--/.dt-->
                </div><!--/.center_wrap-->
            </div><!--/.footer_content-->
        </footer><!--/#footer-->
        
<!-- Ресурсы страницы-->
<?php if ( current_user_can( 'manage_options' ) ) { ?>
<div style="position:fixed;z-index:999;top:50px;left:5px;padding:5px;font-size:7pt;color:#fff;background:#000;">
<?php echo '<h6 style="font-size:7pt; margin:0">Loading time:'; timer_stop(1); echo 's/</h6>' ?>
<?php echo '<h6 style="font-size:7pt; margin:0">Queries: '.get_num_queries().' /</h6>'; ?>
<?php if (function_exists('memory_get_usage')) echo '<h6 style="font-size:7pt; margin:0">Memory used: '.round(memory_get_usage()/1024/1024, 2) . 'MB</h6>'; ?>
</div>
<?php } ?>
        <?php if($id != 1720):?>
        <div class="to_top">
            <span>наверх</span>
        </div>
        <?php ; endif;?>

        <?php wp_footer();?>
        <script src="<?php bloginfo('template_url')?>/js/mask.js"></script>
        <script src="<?php bloginfo('template_url')?>/js/main_new.js"></script>
        
        <?php if ($id == 1720):?>
        <script src="/wp-content/projapp/js/angular.js"></script>
        <script src="/wp-content/projapp/js/app.js" type="text/javascript"></script>
        <?php endif;?>
        <script src="<?php bloginfo('template_url')?>/js/reestr.js"></script>

        <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47406475 = new Ya.Metrika2({
                    id:47406475,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47406475" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
        
    </body>
</html>
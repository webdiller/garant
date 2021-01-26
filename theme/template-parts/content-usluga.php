<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package garant
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="usluga-content">
        <div class="usluga-content__wrapper">
            <div class="usluga-content__header">
                <div class="usluga-content__card">
                    <p>
                    <?php the_field('card_description'); ?>
                    </p>
					<script data-b24-form="click/9/o3ljhf" data-skip-moving="true">
                            (function(w,d,u){
                                    var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                                    var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                            })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_9.js');
                        </script>
                    <button>Оставить заявку на услугу</button>
                </div>
                <?php if (has_post_thumbnail()) {?>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="" /> 
                <?php } else { ?>
                <img src="<?php bloginfo('template_url'); ?>/images/usluga-bg.jpg" alt="" />
                <?php } ?>
            </div>
            <p class="usluga-content__descr">
                <?php the_field('card_description_2'); ?>
            </p>
        </div>
    </div>
    <div class="news-item">
        <div class="news-item__wrapper">
            <div class="entry-content">
                <?php
                 the_content();
                ?>
            </div><!-- .entry-content -->
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
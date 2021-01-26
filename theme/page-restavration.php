<?php
/*
Template Name: Реставрация мебели
Template Post Type: page
*/
?>

<?php get_header(); ?>

<div id="main">
    <div class="content group">
        <div class="usluga-content">
            <div class="usluga-content__wrapper">
                <div class="usluga-content__header">
                    <div class="usluga-content__card">
                        <p>
                            Высокий уровень вовлечения представителей целевой аудитории является четким
                            доказательством простого факта: постоянное информационно-пропагандистское обеспечение
                            нашей деятельности играет определяющее значение для благоприятных перспектив. В своём
                            стремлении повысить качество жизни
                        </p>
                        <button>Оставить заявку на услугу</button>
                    </div>
                    <img src="<?php bloginfo('template_url'); ?>/images/usluga-bg.jpg" alt="" />
                </div>
                <p class="usluga-content__descr">
                    Высокий уровень вовлечения представителей целевой аудитории является четким
                    доказательством простого факта: постоянное информационно-пропагандистское обеспечение
                    нашей деятельности играет определяющее значение для благоприятных перспектив. В своём
                    стремлении повысить качество жизни
                </p>
                <div class="usluga-content__lists">
                    <ul class="usluga-content__razdel">
                        <?php
                        $query = new WP_Query([
                            'category_name' => 'restavraciya-mebeli',
                            'posts_per_page' => -1
                        ]);
                        if (have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                        <?php
                            }
                        } else {
                            echo wpautop('Услуг не найдено');
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="portfolio">
            <div class="portfolio__wrapper">
                <p class="portfolio__title">Галерея</p>
                <ul class="portfolio__list">
                    <li class="portfolio__item">
                        <a data-fancybox="gallery" href="<?php bloginfo('template_url'); ?>/images/portfolio2.jpg">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio2.jpg" alt="" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio2.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio2.jpg" alt="thumbnail" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio3.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio3.jpg" alt="thumbnail" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio4.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio4.jpg" alt="thumbnail" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio5.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio5.jpg" alt="thumbnail" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio6.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio6.jpg" alt="thumbnail" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio7.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio7.jpg" alt="thumbnail" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio8.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio8.jpg" alt="thumbnail" />
                        </a>
                    </li>
                    <li class="portfolio__item">
                        <a href="<?php bloginfo('template_url'); ?>/images/portfolio9.jpg" data-fancybox="gallery">
                            <img src="<?php bloginfo('template_url'); ?>/images/portfolio9.jpg" alt="thumbnail" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- /content -->
</div><!-- /main -->

<?php get_footer(); ?>
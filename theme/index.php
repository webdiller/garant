<?php
/*
Template Name: Main Page
*/
?>
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package garant
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="promo">
        <div class="promo__wrapper">
            <img class="promo__img promo__img_left" src="<?php bloginfo('template_url'); ?>/images/promo-left.jpg" alt="" />
            <img class="promo__img promo__img_right" src="<?php bloginfo('template_url'); ?>/images/promo-right.jpg" alt="" />
            <div class="promo__block">
                <div class="promo__left">
                    <h1 class="promo__title">Ремонт</h1>
                    <h2 class="promo__subtitle">cтоматологического <span>оборудования</span></h2>
                    <?php
                    $link = get_field('main_link');
                    if ($link) : ?>
                        <a href="<?php echo $link; ?>" class="promo__link">подробнее</a>
                    <?php endif; ?>
                </div>
                <div class="promo__right">
                    <div class="promo__item">
                        <img src="<?php bloginfo('template_url'); ?>/images/Vector.svg" alt="" class="promo__item-img" />
                    </div>
                    <div class="promo__item">
                        <img src="<?php bloginfo('template_url'); ?>/images/Vector2.svg" alt="" class="promo__item-img" />
                    </div>
                    <div class="promo__item">
                        <img src="<?php bloginfo('template_url'); ?>/images/Vector3.svg" alt="" class="promo__item-img" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="uslugi">
        <div class="uslugi__wrapper">
            <h3 class="uslugi__title">Наши услуги</h3>
            <div class="uslugi__items">
                <div class="uslugi__left">
                    <?php
                    global $post;
                    $args = array(
                        'posts_per_page' => 1,
                        'category' => 6,
                        'tag' => 'большая-услуга'
                    );
                    $myposts = get_posts($args);
                    foreach ($myposts as $post) {
                        setup_postdata($post); ?>
                        <div class="uslugi__item">
							<p><a href="/category/services/repair-stomat"><?php the_title(); ?></a></p>
                            <?php the_content(); ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                    <?php
                    global $post;
                    $args = array(
                        'posts_per_page' => 1,
                        'category' => 6,
                        'tag' => 'маленькая-услуга'
                    );
                    $myposts = get_posts($args);
                    foreach ($myposts as $post) {
                        setup_postdata($post); ?>
                        <div class="uslugi__item uslugi__item_sm">
                            <p><a href="/services/obivka-i-peretyazhka-myagkoj-mebeli-2"><?php the_title(); ?></a></p>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                        ?><?php
                            global $post;
                            $args = array(
                                'posts_per_page' => 1,
                                'category' => 6,
                                'tag' => 'маленькая-услуга-2'
                            );
                            $myposts = get_posts($args);
                            foreach ($myposts as $post) {
                                setup_postdata($post); ?>
                        <div class="uslugi__item uslugi__item_sm">
                            <p><a href="/services/matrasy-na-stomatologicheskoe-kreslo-2/"><?php the_title(); ?></a></p>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                    <?php
                            }
                            wp_reset_postdata();
                    ?>
                </div>
                <div class="uslugi__right">
                    <div class="uslugi__item uslugi__item_wide uslugi__item_green">
                        <?php
                        global $post;
                        $args = array(
                            'posts_per_page' => 1,
                            'category' => 6,
                            'tag' => 'широкая-услуга'
                        );
                        $myposts = get_posts($args);
                        foreach ($myposts as $post) {
                            setup_postdata($post); ?>
                            <p><a href="/services/peretyazhka-stomotologicheskogo-kresla/"><?php the_title(); ?></a></p>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                    global $post;
                    $args = array(
                        'posts_per_page' => 1,
                        'category' => 6,
                        'tag' => 'большая-услуга-2'
                    );
                    $myposts = get_posts($args);
                    foreach ($myposts as $post) {
                        setup_postdata($post); ?>
                        <div class="uslugi__item uslugi__item_wide uslugi__item_blue">
                            <p><a href="/category/services/repair-medicine/"><?php the_title(); ?></a></p>
                            <?php the_content(); ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
<script data-b24-form="click/9/o3ljhf" data-skip-moving="true">
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_9.js');
</script>
                    <button class="uslugi__call" data-call>Оставить заявку на услугу</button>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="gallery__wrapper">
            <div class="gallery__header">
                <h5 class="gallery__title">ГАЛЕРЕЯ НАШИХ РАБОТ</h5>
                <p class="gallery__descr">Фото некоторых выполненных работ нашей фирмой</p>
            </div>
            <div id="slider" class="slider gallery__slider">
                <?php
                $images = get_field('slider');?>
                <div class="slider__main">
                    <div class="slider__main-img-wrapper">
                        <img src="<?php echo $images[0]['url']; ?>" alt="Галерея" class="slider__main-img" />
                    </div>
                    <div class="slider__arrows">
                        <button class="slider__arrow slider__arrow-left"></button>
                        <button class="slider__arrow slider__arrow-right"></button>
                    </div>
                </div>
                <div class="slider__thumbnails">
                    <div class="slider__thumb-wrapper current">
                        <img src="<?php echo $images[1]['url']; ?>" alt="Галерея" class="slider__thumb-img" />
                    </div>
                    <div class="slider__thumb-wrapper">
                        <img src="<?php echo $images[2]['url']; ?>" alt="Галерея" class="slider__thumb-img" />
                    </div>
                    <div class="slider__thumb-wrapper">
                        <img src="<?php echo $images[3]['url']; ?>" alt="Галерея" class="slider__thumb-img" />
                    </div>
                </div>
                <?php ?>
            </div>
        </div>
    </section>

    <div class="about">
        <div class="about__wrapper">
            <div class="about__content">
                <div class="about__form-wrapper">
                    <script data-b24-form="inline/15/1p4ilo" data-skip-moving="true">
                        (function(w, d, u) {
                            var s = d.createElement('script');
                            s.async = true;
                            s.src = u + '?' + (Date.now() / 180000 | 0);
                            var h = d.getElementsByTagName('script')[0];
                            h.parentNode.insertBefore(s, h);
                        })(window, document, 'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_15.js');
                    </script>
                    <img class="about__form-img" src="<?php bloginfo('template_url'); ?>/images/form-img.png" alt="Заполните форму" />
                </div>
                <div class="about__descr">
                    <?php
                    the_field('about_descr');
                    ?>
                </div>
            </div>
            <div class="about__footer">
                <?php
                the_field('home_features');
                ?>
            </div>
        </div>
    </div>

    <section class="our-news">
        <div class="our-news__wrapper">
            <h6 class="our-news__title">Наши новости</h6>
            <div class="our-news__list">
                <?php
                global $post; // не обязательно
                $myposts = get_posts(array(
                    'category' => 4,
                    'posts_per_page' => 2,
                ));

                foreach ($myposts as $post) {
                    setup_postdata($post);
                ?>
                    <div class="our-news__item">
                        <?php the_post_thumbnail(); ?>
                        <div>
                            <a class="our-news__item-title" href="<?php the_permalink();?>"><?php the_title();?></a>
                            <?php the_excerpt(); ?>
                            <p><span><?php echo get_the_date(); ?></span> <a href="<?php the_permalink(); ?>">Подробнее</a></p>
                        </div>
                    </div>
                <?php
                }

                wp_reset_postdata(); // сбрасываем переменную $post
                ?>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();

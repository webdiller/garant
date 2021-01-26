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
?><?php

// load all 'category' terms for the post
$terms = get_the_terms( get_the_ID(), 'category');


// we will use the first term to load ACF data from
if( !empty($terms) ) {

    $term = array_pop($terms);

    $custom_field = get_field('header_image', $term );

    // do something with $custom_field
}

?>

<main id="primary" class="site-main">
    <?php
    if (is_category(4)) {
    ?>
        <div class="news">
            <div class="news__wrapper">
                <ul>
                    <?php
                    $query = new WP_Query([
                        'category_name' => 'news',
                        'posts_per_page' => -1
                    ]);
                    if (have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                    ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                    <div>
                                        <p><?php the_title(); ?></p>
                                        <?php the_excerpt(); ?>
                                        <span> <?php echo get_the_date(); ?></span>
                                    </div>
                                </a>
                            </li>
                    <?php
                        }
                    } else {
                        echo wpautop('Новостей не найдено');
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
    } else if (is_category('production')) {
    ?>
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
                    <ul class="usluga-content__razdel usluga-content__razdel_mr-0">
                        <?php
                        if (have_posts()) {
                            $query = new WP_Query([
                                'category_name' => 'production',
                                'posts_per_page' => -1
                            ]);
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                        <?php
                            }
                        } else {
                            echo wpautop('Продукций не найдено');
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="usluga-content">
            <div class="usluga-content__wrapper">
                <div class="usluga-content__header">
					
					<?php 
                    $cat = get_queried_object();
                    $idCategory = $cat->term_id;
					$my_text_left = '';
					$my_text_bottom = '';
					$my_img = null;
					if (is_category(14)) {
					   // medicinskaya-mebel
					   $my_text_left = get_field('mebel_text_left', 'option');
					   $my_text_bottom = get_field('mebel_text_bottom', 'option');
					   $my_img = get_field('mebel_img', 'option');
					} else if (is_category(15)) {
					   // restavraciya-mebeli
					   $my_text_left = get_field('restavraciya_text_left', 'option');
					   $my_text_bottom = get_field('restavraciya_text_bottom', 'option');
					   $my_img = get_field('restavraciya_img', 'option');
					} else if (is_category(13)) {
					   // servisnoe-obsluzhivanie
					   $my_text_left = get_field('service_text_left', 'option');
					   $my_text_bottom = get_field('service_text_bottom', 'option');
					   $my_img = get_field('service_img', 'option');
					} else if (is_category(16)) {
					   // stomatologicheskie-ustanovki
					   $my_text_left = get_field('stomatology_text_left', 'option');
					   $my_text_bottom = get_field('stomatology_text_bottom', 'option');
					   $my_img = get_field('stomatology_img', 'option');
					} else if ($idCategory) {
                        $my_text_left = get_field('category-repair__text-up', "category_".$idCategory);
                        $my_text_bottom = get_field('category-repair__text-down', "category_".$idCategory);
                        $my_img = get_field('category-repair__img', "category_".$idCategory);
                    }
					?>
					
                    <div class="usluga-content__card">
                        <p><?php echo $my_text_left; ?></p>
                        <script data-b24-form="click/9/o3ljhf" data-skip-moving="true">
                            (function(w,d,u){
                                    var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                                    var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                            })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_9.js');
                        </script>
                        <button>Оставить заявку на услугу</button>
                    </div>
					<?php if( $my_img ) { ?>
						<img alt="Изображение" src="<?php echo $my_img ?>" />
					<?php } else {
						?> <img src="<?php bloginfo('template_url'); ?>/images/usluga-bg.jpg" alt="" /> <?php 
					} ?>
                </div>
				<!-- <p class="usluga-content__descr"><?php echo $my_text_bottom; ?></p> -->
				<div class="news-item news-item_reset">
<div class="news-item__wrapper">
						<div class="entry-content">
							<?php echo $my_text_bottom; ?>
						</div>
   				</div>
				</div>
                <div class="usluga-content__lists">
                    <ul class="usluga-content__razdel usluga-content__razdel_mr-0">
                    <?php
                        if (have_posts()){
                            while( have_posts() ){
                                the_post();
                            ?>
                            <!-- Содержимое записи -->
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php }
                    } ?>
                    </ul>
                </div>
            </div>
        </div>
		 <?php
			}
		?>
		
		<?php
			if (is_category(14)) {
			   // medicinskaya-mebel
			   $images = get_field('mebel_gallery', 'option');
			} else if (is_category(15)) {
			   // restavraciya-mebeli
			   $images = get_field('restavraciya_gallery', 'option');
			} else if (is_category(13)) {
			   // servisnoe-obsluzhivanie
			   $images = get_field('service_gallery', 'option');
			} else if (is_category(16)) {
			   // stomatologicheskie-ustanovki
			   $images = get_field('stomatology_gallery', 'option');
			} else if ($idCategory) {
                $images = get_field('category-repair__gallery', "category_".$idCategory);
            }
			if( $images ) { ?>
				<div class="portfolio">
					<div class="portfolio__wrapper">
						<p class="portfolio__title">Галерея</p> 
						<ul class="portfolio__list">
							<?php foreach( $images as $image ): ?>
							<li class="portfolio__item">
								<a href="<?php echo esc_url($image['url']); ?>">
									<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php }  ?>
		
</main><!-- #main -->

<?php
get_footer();

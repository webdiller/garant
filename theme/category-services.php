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
        <div class="usluga-content">
            <div class="usluga-content__wrapper">
                <div class="usluga-content__header">					
                    <div class="usluga-content__card">
                        <p><?php the_field('services-text-up', 'options'); ?></p>
                        <script data-b24-form="click/9/o3ljhf" data-skip-moving="true">
                            (function(w,d,u){
                                    var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                                    var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                            })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_9.js');
                        </script>
                        <button>Оставить заявку на услугу</button>
                    </div>
                    <img alt="Картинка услуги" src="<?php the_field('services-img', 'options'); ?>" />
                </div>
                <p class="usluga-content__descr"><?php the_field('services-text-down', 'options'); ?></p>
                <div class="usluga-content__lists">
                    <ul class="usluga-content__razdel usluga-content__razdel_mr-0">
                    <?php echo wp_list_categories([
                        'child_of' => get_cat_ID('Услуги'),
                        'hide_empty' => 0,
                        'title_li' => '',
                        ]); ?>
                    <?php
                        $posts = get_posts([
                            'category_name' => 'services',
                            'numberposts' => -1
                        ]);
                        foreach($posts as $post){
                            setup_postdata($post);
                            $tags = wp_get_post_tags($post->ID, ['fields'=>'slugs']);
                            if(in_array($tags[0], ['bolshaya-usluga-2','shirokaya-usluga','malenkaya-usluga-2','malenkaya-usluga','bolshaya-usluga'])) {
                                continue;
                            }
                            foreach(get_the_category($post->ID) as $value) $value = $value->cat_ID;
                            if($value != get_cat_ID('Услуги')) continue;
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php }
                        wp_reset_postdata();
                    ?>
                    </ul>
                </div>
            </div>
        </div>
		
		<?php
            $images = get_field('services-gallery', 'option');
			if( $images ) { ?>
				<div class="portfolio">
					<div class="portfolio__wrapper">
						<p class="portfolio__title">Галерея</p> 
						<ul class="portfolio__list">
							<?php foreach( $images as $image ): ?>
							<li class="portfolio__item">
								<a href="<?php echo esc_url($image['url']); ?>">
									<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
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

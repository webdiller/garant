<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package garant
 */

get_header();
?>
<main id="primary" class="site-main">
	<section class="news-item">
		<div class="news-item__wrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile;
			else : ?>
				<p>Пусто</p>
			<?php endif; ?>
		</div>
	</section>
</main><!-- #main -->
<?php
get_footer();

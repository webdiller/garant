<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package garant
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php
	while (have_posts()) :
		if (in_category('news')) {
			the_post();
			get_template_part('template-parts/content-news', get_post_type());
		} else if (in_category('production')) {
			the_post();
			get_template_part('template-parts/content-production', get_post_type());
		} else {
			the_post();
			get_template_part('template-parts/content-usluga', get_post_type());
		}
	endwhile; // End of the loop.
	?>
</main><!-- #main -->
<?php
get_footer();

<?php
/*
Template Name: Contacts Page
*/
?>

<?php get_header(); ?>

<div id="main">

	<div class="content group">
		<div class="news-item">
			<div class="news-item__wrapper">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile;
				else : ?>
					<p>Наши контакты</p>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- /content -->
</div><!-- /main -->

<?php get_footer(); ?>
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package garant
 */

get_header();
?>

	<main id="primary" class="site-main">

	<div class="error">
	<div class="error__wrapper">
	<img src="<?php bloginfo('template_url'); ?>/images/error.png" alt="Страница не найдена" class="error__img" />
	<div class="error__content">
		<h1 class="error__title">404</h1>
		<h2 class="error__subtitle">Вы попали на несуществующую страницу</h2>
		<p class="error__descr">
		К сожалению, запрашиваемая Вами страница не найдена. Вероятно, Вы указали несуществующий
		адрес, страница была удалена, перемещена или сейчас она временно недоступна!
		</p>
		<a href="<?php echo home_url(); ?>" class="error__btn">На главную</a>
		</div>
		</div>
	</div>

	</main><!-- #main -->

<?php
get_footer();

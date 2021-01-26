<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package garant
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Создание сайта Digital-агентство WebReforma https://webreforma.ru" />
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <header class="header">
      <div class="header__wrapper">
		<?php
		if (is_front_page()) {
		?>
			<div class="header__logo-link">
				<span class="header__logo-head">
					<span class="header__logo-title">Гарант</span>
					<span class="header__logo-title">Качество</span>
				</span>
				<span class="header__logo-footer"> Ремонт и перетяжка медицинской мебели </span>
			</div>
		<?php
		} else {
		?>
			<a href="/" class="header__logo-link">
				<span class="header__logo-head">
					<span class="header__logo-title">Гарант</span>
					<span class="header__logo-title">Качество</span>
				</span>
				<span class="header__logo-footer"> Ремонт и перетяжка медицинской мебели </span>
			</a>
		<?php
		}
		?>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'container' => 'nav',
            'container_class' => 'header__nav'
          )
        );
        ?>
        <div class="header__contact">
          <div class="header__contact-socials">
            <a class="header__contact-wa" href="https://api.whatsapp.com/send?phone=<?php echo the_field('main_wa', 'option'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/wa.png" alt="whatsapp" /></a>
            <a class="header__contact-vb" href="viber://chat?number=<?php echo the_field('main_viber', 'option'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/vb.png" alt="viber" /></a>
          </div>
          <div class="header__contact-email-and-phone">
            <a href="mailto:<?php echo the_field('main_email', 'option'); ?>" class="header__contact-mail"><?php echo the_field('main_email', 'option'); ?></a>
            <div id="menu_phone" class="header__contact-phones">
              <?php echo the_field('main_phones', 'option'); ?>
            </div>
          </div>
			<script data-b24-form="click/5/35fuu5" data-skip-moving="true">
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_5.js');
</script>
          <button data-call class="header__contact-modal">Оставить заявку</button>
        </div>
        <div id="menu_call" class="header__menu-call">
          <div id="menu_bar" class="header__menu-menu active">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div id="menu_close" class="header__menu-close">
            <span>&times;</span>
          </div>
        </div>
      </div>

      <?php if (!is_front_page() and !is_404()) {
      ?>
        <div class="breadcrumbs">
          <div class="breadcrumbs__wrapper">
            <div class="breadcrumbs__list"><?php breadcrumb_simple(); ?> </div>
            <h1 class="breadcrumbs__title">
              <?php if (is_category()) {
                echo get_queried_object()->name;
              } else {
                the_title();
              }
              ?>
            </h1>
          </div>
        </div>
      <?php
      } ?>

    </header>
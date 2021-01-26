<?php

/**
 * garant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package garant
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
if (!function_exists('garant_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function garant_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on garant, use a find and replace
		 * to change 'garant' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('garant', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'garant'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'garant_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'garant_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function garant_content_width()
{
	$GLOBALS['content_width'] = apply_filters('garant_content_width', 640);
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');
add_action('after_setup_theme', 'garant_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function garant_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'garant'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'garant'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'garant_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function garant_scripts()
{
	wp_enqueue_style('garant-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('garant-style', 'rtl', 'replace');

	wp_enqueue_script('garant-navigation', get_template_directory_uri() . '/js/app.min.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'garant_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Настройки сайта',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Наши услуги',
		'menu_title'	=> 'Услуги',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// выводим пагинацию
the_posts_pagination(array(
	'end_size' => 2,
));

add_action( 'admin_init', 'asp_acf_new_condition'); 

function asp_acf_new_condition () {

	add_filter('acf/location/rule_types', 'asp_location_rules_types');

	function asp_location_rules_types($choices)
	{
	
		$key = __('Forms', 'acf');

		if ( ! isset( $choices[$key] ) )  {
			$choices[$key] = [];
		}; 

		$choices[$key][ 'category_id' ] = __('Рубрика');

			// error_log(print_r($choices, 1)); 

		return $choices;
	}

// Формируем список значений которые может принимать правило

	add_filter( 'acf/location/rule_values/category_id', 'asp_location_rules_values_category_id');

	function asp_location_rules_values_category_id($choices)
	{

		$terms = get_terms( [
			'taxonomy' => 'category',
			'hide_empty' => false,
		]);

		if ($terms) {

			foreach ($terms as $term) {

				$choices[$term->term_id] = $term->name;
			}
		}

	//	error_log(print_r($terms, 1)); 

		return $choices;
	}

// Отображение ACF поля в нужном экране админки

	add_filter( 'acf/location/rule_match/category_id', 'asp_location_rules_match_category_id', 10, 3);
	function asp_location_rules_match_category_id($match, $rule, $options) {

		//error_log(print_r($rule, 1));

		$screen = get_current_screen();

		//error_log(print_r($screen, 1));

		if ( $screen->base !== 'term' || $screen->id !== 'edit-category') {
		return $match;
		}

		$term_id = $_GET[ 'tag_ID' ];
		$select_term = $rule[ 'value' ];

		if ( $rule[ 'operator' ] === '==') {
			$match = ( $term_id == $select_term );
		}
		elseif ($rule[ 'operator' ] === '!=') {
			$match = ( $term_id != $select_term );
		}

		return $match;
	}
}
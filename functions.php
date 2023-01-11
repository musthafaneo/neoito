<?php

/**
 * neoito functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package neoito
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function neoito_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on neoito, use a find and replace
		* to change 'neoito' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('neoito', get_template_directory() . '/languages');

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
	add_image_size('blog-card', '900', '553', true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Header nav 1', 'neoito'),
			'menu-2' => esc_html__('Header nav 2', 'neoito')
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
			'neoito_custom_background_args',
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
add_action('after_setup_theme', 'neoito_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function neoito_content_width()
{
	$GLOBALS['content_width'] = apply_filters('neoito_content_width', 640);
}
add_action('after_setup_theme', 'neoito_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function neoito_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'neoito'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'neoito'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footwr Sidebar', 'neoito'),
			'id'            => 'sidebar-2',
			'description'   => esc_html__('Add widgets here.', 'neoito'),
			'before_widget' => '<div id="%1$s" class="site-footer-widget lg:col-span-1 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'neoito_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function neoito_scripts()
{
	wp_enqueue_style('neoito-style', get_template_directory_uri() . '/assets/css/app.min.css', array(), _S_VERSION);
	wp_enqueue_script('neoito-script', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery'), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	if (is_page(11) || is_page(18)) {
		wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js', array(), 'latest', true);
		wp_enqueue_script('ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js', array(), 'latest', true);
		//wp_enqueue_script( 'DrawSVG', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/DrawSVGPlugin3.min.js', array( ), 'latest', true);
		wp_enqueue_script('MotionPath', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/MotionPathPlugin.min.js', array(), 'latest', true);
	}
	if (is_page(11)) {
		wp_enqueue_script('neoito-animation', get_template_directory_uri() . '/js/service-animation.js', array(), _S_VERSION, true);
	}
	if (is_page(18)) {
		/*wp_enqueue_script( 'amcharts-core', 'https://cdn.amcharts.com/lib/5/index.js', array( ), 'latest', true);
		wp_enqueue_script( 'amcharts-maps', 'https://cdn.amcharts.com/lib/5/map.js', array( ), 'latest', true);
		wp_enqueue_script( 'amcharts-worldLow', 'https://cdn.amcharts.com/lib/5/geodata/worldLow.js', array( ), 'latest', true);
		wp_enqueue_script( 'amcharts-animated', 'https://cdn.amcharts.com/lib/5/themes/Animated.js', array( ), 'latest', true);*/
		//wp_enqueue_script( 'globe', get_template_directory_uri() . '/js/globe.js', array(), _S_VERSION, true);
		wp_enqueue_script('neoito-animation', get_template_directory_uri() . '/js/about-animation.js', array(), _S_VERSION, true);
	}
	if (is_singular('casestudy')) {
		wp_enqueue_script('stickySidebar', get_template_directory_uri() . '/js/stickySidebar.js', array(), _S_VERSION, true);
	}
	if (is_page(22)) {
		wp_enqueue_script('selectric', get_template_directory_uri() . '/js/jquery.selectric.js', array(), _S_VERSION, true);
		wp_enqueue_script('neoito-animation', get_template_directory_uri() . '/js/selectric-init.js', array(), _S_VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'neoito_scripts',1);


/**
 * 
 * 
 * Gform after form submit
 */

//add_action( 'gform_after_submission_1', 'set_post_content', 10, 2 );
function set_post_content($entry, $form)
{

	// $response = wp_remote_post( $url, array(
	// 	'method'      => 'POST',
	// 	'timeout'     => 45,
	// 	'redirection' => 5,
	// 	'httpversion' => '1.0',
	// 	'blocking'    => true,
	// 	'headers'     => array(),
	// 	'body'        => array(
	// 		'username' => 'bob',
	// 		'password' => '1234xyz'
	// 	),
	// 	'cookies'     => array()
	// 	)
	// );

	// if ( is_wp_error( $response ) ) {
	// 	$error_message = $response->get_error_message();
	// 	echo "Something went wrong: $error_message";
	// } else {
	// 	echo 'Response:<pre>';
	// 	print_r( $response );
	// 	echo '</pre>';
	// }

	print_r($entry);
}



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
/**
 * Custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * ACF Blocks.
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Blog Posts form API.
 */
require get_template_directory() . '/inc/custom-blog.php';


// function get_cookie()
// {
// 	$visit_time = date('F j, Y g:i a');
// 	if (isset($_COOKIE['visit_time'])) {
// 		function placeholder()
// 		{
// 		}
// 	}
// }

//playbook_blog_related_post($perpage = '');

//error_log(playbook_blog_related_post());

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action('wp_head', 'feed_links_extra', 3 );
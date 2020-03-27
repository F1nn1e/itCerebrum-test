<?php
/**
 * itCerebrum functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package itCerebrum
 */

if ( ! function_exists( 'itcerebrum_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function itcerebrum_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on itCerebrum, use a find and replace
		 * to change 'itcerebrum' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'itcerebrum', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'itcerebrum' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'itcerebrum_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'itcerebrum_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function itcerebrum_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'itcerebrum_content_width', 640 );
}
add_action( 'after_setup_theme', 'itcerebrum_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function itcerebrum_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'itcerebrum' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'itcerebrum' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'itcerebrum_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function itcerebrum_scripts() {
	wp_enqueue_style( 'itcerebrum-style', get_stylesheet_uri() );

	wp_enqueue_script( 'itcerebrum-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'itcerebrum-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'slick-srcipt', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), '20151215', true );
    wp_enqueue_script( 'main',  get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

    wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css','', '3.0' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css','', '3.0' );
    wp_enqueue_style( 'slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css','', '3.0' );
}
add_action( 'wp_enqueue_scripts', 'itcerebrum_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// allow SVG uploads
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
    $existing_mimes['svg'] = 'image/svg+xml';
    return $existing_mimes;
}


function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}

add_action('admin_head', 'fix_svg');
add_action( 'after_setup_theme', function () {
    register_nav_menus( [
        'header-menu' => 'Верхняя область',
        'footer-menu' => 'Нижняя область',
    ] );
} );


add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args( $args ) {
    if ( $args['theme_location'] === 'header-menu' ) {
        $args['container']  = false;
        $args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
        $args['menu_class'] = 'site-navigation main-header__navigation';
    }
    return $args;
}
// Изменяем атрибут id у тега li
add_filter( 'nav_menu_item_id', 'filter_menu_item_css_id', 10, 4 );
function filter_menu_item_css_id( $menu_id, $item, $args, $depth ) {
    return $args->theme_location === 'header-menu' ? '' : $menu_id;
}
// Изменяем атрибут class у тега li
add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4 );
function filter_nav_menu_css_classes( $classes, $item, $args, $depth ) {
    if ( $args->theme_location === 'header-menu' ) {
        $classes = [
            'site-navigation__item',
        ];
        if ( $item->current ) {
            $classes[] = ' site-navigation__item--active';
        }
    }
    return $classes;
}
// Изменяет класс у вложенного ul
add_filter( 'nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3 );
function filter_nav_menu_submenu_css_class( $classes, $args, $depth ) {
    if ( $args->theme_location === 'header-menu' ) {
        $classes = [
            'menu',
            'menu--dropdown',
            'menu--vertical'
        ];
    }
    return $classes;
}
// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    if ( $args->theme_location === 'header-menu' ) {
        $atts['class'] = 'site-navigation__link';
        if ( $item->current ) {
            $atts['class'] .= ' site-navigation__link--active';
        }
    }
    return $atts;
}

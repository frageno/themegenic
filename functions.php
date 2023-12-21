<?php

/**
 * Theme setup.
 */
function themegenic_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary-menu'       => __( 'Primary Menu', 'themegenic' ),
			'topbar'       	=> __( 'Topbar Menu', 'themegenic' ),
			'footer_menu_1' => __( 'Footer Menu 1', 'themegenic' ),
			'footer_menu_2' => __( 'Footer Menu 2', 'themegenic' ),
			'footer_menu_3' => __( 'Footer Menu 3', 'themegenic' ),
			'footer_menu_4' => __( 'Footer Menu 4', 'themegenic' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'themegenic_setup' );

/**
 * Enqueue theme assets.
 */
function themegenic_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'theme-genic', themegenic_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'theme-genic', themegenic_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'themegenic_enqueue_scripts' );

/**
 * Enqueue admin styles
 */

 function enqueue_admin_styles() {
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/css/admin-style.css');
	
    // Enqueue the styles and scripts for the color picker.
	wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');
}

add_action('admin_enqueue_scripts', 'enqueue_admin_styles');



/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function themegenic_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function themegenic_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'themegenic_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function themegenic_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'themegenic_nav_menu_add_submenu_class', 10, 3 );


/**
 * Add functions helpers and options
 */

require locate_template('/inc/index.php');


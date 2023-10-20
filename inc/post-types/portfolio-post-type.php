<?php

/**
 * Register Custom Portfolio Post Type
 */

 function themegenic_register_portfolio_post_type() {
    // Labels for post type.
	$labels = array(
		'name'               => esc_html_x( 'Portfolio', 'post type general name', 'themegenic' ),
		'singular_name'      => esc_html_x( 'Portfolio', 'post type singular name', 'themegenic' ),
		'menu_name'          => esc_html_x( 'Portfolio', 'admin menu', 'themegenic' ),
		'name_admin_bar'     => esc_html_x( 'Portfolio', 'add new on admin bar', 'themegenic' ),
		'add_new'            => esc_html_x( 'Add New Portfolio', 'book', 'themegenic' ),
		'add_new_item'       => esc_html__( 'Add New Portfolio', 'themegenic' ),
		'new_item'           => esc_html__( 'New Portfolio', 'themegenic' ),
		'edit_item'          => esc_html__( 'Edit Portfolio', 'themegenic' ),
		'view_item'          => esc_html__( 'View Portfolio', 'themegenic' ),
		'all_items'          => esc_html__( 'All Portfolio', 'themegenic' ),
		'search_items'       => esc_html__( 'Search Portfolio', 'themegenic' ),
		'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'themegenic' ),
		'not_found'          => esc_html__( 'No Portfolio found.', 'themegenic' ),
		'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash.', 'themegenic' ),
	);
	// Args for post type.
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-welcome-widgets-menus',
		'description'        => false,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'portfolio',
		),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
	);
	// Register.
	register_post_type( 'portfolio', $args );


	// Add new taxonomy, make it hierarchical (like categories)
	// $labels = array(
	// 	'name'              => _x( 'Condition', 'taxonomy general name', 'themegenic' ),
	// 	'singular_name'     => _x( 'Condition', 'taxonomy singular name', 'themegenic' ),
	// 	'search_items'      => __( 'Search Conditions', 'themegenic' ),
	// 	'all_items'         => __( 'All Conditions', 'themegenic' ),
	// 	'parent_item'       => __( 'Parent Condition', 'themegenic' ),
	// 	'parent_item_colon' => __( 'Parent Condition:', 'themegenic' ),
	// 	'edit_item'         => __( 'Edit Condition', 'themegenic' ),
	// 	'update_item'       => __( 'Update Condition', 'themegenic' ),
	// 	'add_new_item'      => __( 'Add New Condition', 'themegenic' ),
	// 	'new_item_name'     => __( 'New Condition Name', 'themegenic' ),
	// 	'menu_name'         => __( 'Condition', 'themegenic' ),
	// );
	// Args for taxonomy.
	// $args = array(
	// 	'hierarchical'      => true,
	// 	'labels'            => $labels,
	// 	'show_ui'           => true,
	// 	'show_in_rest'      => true,
    //     'show_admin_column' => true,
	// 	'query_var'         => true,
	// 	'rewrite'           => array( 'slug' => 'cars-condition' ),
	// );
	// // Register
	// register_taxonomy( 'cars-condition', array( 'cars' ), $args );
}

add_action('init', 'themegenic_register_portfolio_post_type');

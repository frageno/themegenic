<?php

/**
 * Register Custom Cars Post Type
 */

 function themegenic_register_cars_post_type() {
    // Labels for post type.
	$labels = array(
		'name'               => esc_html_x( 'Cars', 'post type general name', 'themegenic' ),
		'singular_name'      => esc_html_x( 'Cars', 'post type singular name', 'themegenic' ),
		'menu_name'          => esc_html_x( 'Cars', 'admin menu', 'themegenic' ),
		'name_admin_bar'     => esc_html_x( 'Cars', 'add new on admin bar', 'themegenic' ),
		'add_new'            => esc_html_x( 'Add New Cars', 'book', 'themegenic' ),
		'add_new_item'       => esc_html__( 'Add New Cars', 'themegenic' ),
		'new_item'           => esc_html__( 'New Cars', 'themegenic' ),
		'edit_item'          => esc_html__( 'Edit Cars', 'themegenic' ),
		'view_item'          => esc_html__( 'View Cars', 'themegenic' ),
		'all_items'          => esc_html__( 'All Cars', 'themegenic' ),
		'search_items'       => esc_html__( 'Search Cars', 'themegenic' ),
		'parent_item_colon'  => esc_html__( 'Parent Cars:', 'themegenic' ),
		'not_found'          => esc_html__( 'No Cars found.', 'themegenic' ),
		'not_found_in_trash' => esc_html__( 'No Cars found in Trash.', 'themegenic' ),
	);
	// Args for post type.
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-car',
		'description'        => false,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'cars',
		),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
	);
	// Register.
	register_post_type( 'cars', $args );


	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Condition', 'taxonomy general name', 'themegenic' ),
		'singular_name'     => _x( 'Condition', 'taxonomy singular name', 'themegenic' ),
		'search_items'      => __( 'Search Conditions', 'themegenic' ),
		'all_items'         => __( 'All Conditions', 'themegenic' ),
		'parent_item'       => __( 'Parent Condition', 'themegenic' ),
		'parent_item_colon' => __( 'Parent Condition:', 'themegenic' ),
		'edit_item'         => __( 'Edit Condition', 'themegenic' ),
		'update_item'       => __( 'Update Condition', 'themegenic' ),
		'add_new_item'      => __( 'Add New Condition', 'themegenic' ),
		'new_item_name'     => __( 'New Condition Name', 'themegenic' ),
		'menu_name'         => __( 'Condition', 'themegenic' ),
	);
	// Args for taxonomy.
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_rest'      => true,
        'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'cars-condition' ),
	);
	// Register
	register_taxonomy( 'cars-condition', array( 'cars' ), $args );
}

add_action('init', 'themegenic_register_cars_post_type');

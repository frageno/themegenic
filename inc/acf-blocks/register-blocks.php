<?php
/**
 * Register ACF Blocks
 */

function themegenic_register_acf_blocks($block_name) {
    // $block_name = implode
    // $block_name = explode(' ', $block_name);
    // print_r(str_replace(' ', '', $block_name));

    if( function_exists('acf_register_block_type') ){
        // acf_register_block_type(array(
        //     'name'              => strtolower(str_replace(' ', '-', $block_name)),
        //     'title'             => __($block_name),
        //     'render_template'   => '/template-parts/blocks/' . str_replace(' ', '', $block_name) .  '/index.php',
        // ));

        // acf_register_block_type(array(
        //     'name'              => 'header_intro',
        //     'title'             => __('Header Intro'),
        //     'render_template'   => '/template-parts/blocks/HeaderIntro/index.php',
        // ));

        // acf_register_block_type(array(
        //     'name'              => 'projects',
        //     'title'             => __('Projects'),
        //     'render_template'   => '/template-parts/blocks/Projects/index.php',
        // ));

        // acf_register_block_type(array(
        //     'name'              => 'text_image',
        //     'title'             => __('Text Image'),
        //     'render_template'   => '/template-parts/blocks/TextImage/index.php',
        // ));
        
    }

}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Header Settings',
    //     'menu_title'    => 'Header',
    //     'parent_slug'   => 'theme-general-settings',
    // ));

    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Footer Settings',
    //     'menu_title'    => 'Footer',
    //     'parent_slug'   => 'theme-general-settings',
    // ));

}

add_action('acf/init', 'themegenic_register_acf_blocks');
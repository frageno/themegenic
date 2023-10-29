<?php
/**
 * Register ACF Blocks
 */

function themegenic_register_acf_blocks() {

    if( function_exists('acf_register_block_type') ){
        acf_register_block_type(array(
            'name'              => 'teaser_cards',
            'title'             => __('Teaser Cards'),
            'render_template'   => '/template-parts/blocks/TeaserCards/index.php',
        ));

        acf_register_block_type(array(
            'name'              => 'header_intro',
            'title'             => __('Header Intro'),
            'render_template'   => '/template-parts/blocks/HeaderIntro/index.php',
        ));

        acf_register_block_type(array(
            'name'              => 'projects',
            'title'             => __('Projects'),
            'render_template'   => '/template-parts/blocks/Projects/index.php',
        ));

        acf_register_block_type(array(
            'name'              => 'text_image',
            'title'             => __('Text Image'),
            'render_template'   => '/template-parts/blocks/TextImage/index.php',
        ));
    }

}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}

add_action('acf/init', 'themegenic_register_acf_blocks');
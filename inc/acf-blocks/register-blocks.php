<?php
/**
 * Register ACF Blocks
 */

function themegenic_register_acf_blocks() {

    if( function_exists('acf_register_block_type') ){
        acf_register_block_type(array(
            'name'              => 'header_intro',
            'title'             => __('Header Intro'),
            'render_template'   => '/template-parts/blocks/header_intro/index.php',
        ));
    }

}

add_action('acf/init', 'themegenic_register_acf_blocks');
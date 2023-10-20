<?php

/**
 * Define global variables
 */

if( !function_exists('themegenic_define_global_variables') ) {

    function themegenic_define_global_variables() {
        /**
         * Get all options, check if the options exist and assign them to the defined variables
         */

        $theme_options = get_option('theme_options');

        if($theme_options && is_array($theme_options)){

            define('DEFAULT_BACKGROUND_COLOR', $theme_options['theme_background_color']);
            define('DEFAULT_TEXT_COLOR', $theme_options['theme_text_color']);
            
        }

    }

    add_action( 'init', 'themegenic_define_global_variables' );

}

add_action('wp_enqueue_scripts', 'enqueue_theme_genic_colors');
add_action('admin_enqueue_scripts', 'enqueue_theme_genic_colors');
function enqueue_theme_genic_colors()
{

    $default_background_color = get_field('default_background_color', 'option');
    $colors = "
        .fill-bg-default{
            fill: $default_background_color !important;
        }
        .bg-default{
            background-color: $default_background_color !important;
        }
        .text-bg-default{
            color: $default_background_color !important;
        }
        .border-bg-default{
            border-color: $default_background_color !important;
        }
    ";


    wp_add_inline_style('theme-genic', $colors);
}
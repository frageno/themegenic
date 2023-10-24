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
    $primary_color = get_field('primary_color', 'option');
    $secondary_color = get_field('secondary_color', 'option');
    $body_text_color = get_field('body_text_color', 'option');
    $font_family = get_field('font_family', 'option');
	$body_font_size = get_field('body_font_size', 'option') . 'px';

    $styles = "
        .fill-primary{
            fill: $primary_color !important;
        }
        .bg-primary{
            background-color: $primary_color !important;
        }
        .text-primary{
            color: $primary_color !important;
        }
        .border-primary{
            border-color: $primary_color !important;
        }
        .bg-secondary {
            background-color: $secondary_color !important;
        }
        .text-secondary{
            color: $secondary_color !important;
        }
        .border-secondary{
            border-color: $secondary_color !important;
        }
        .text-body {
            color: $body_text_color !important;
        }
        .font-primary {
            font-family: $font_family !important;
            font-size: $body_font_size !important;
        }
    ";


    wp_add_inline_style('theme-genic', $styles);
}
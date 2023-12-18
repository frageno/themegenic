<?php

/**
 * Define theme option styles
 */


function enqueue_theme_genic_styles()
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

add_action('wp_enqueue_scripts', 'enqueue_theme_genic_styles');
add_action('admin_enqueue_scripts', 'enqueue_theme_genic_styles');
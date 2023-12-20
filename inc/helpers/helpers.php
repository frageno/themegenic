<?php

/**
 * Define theme option styles
 */

if(!function_exists('enqueue_theme_genic_styles')) {
    function enqueue_theme_genic_styles()
    {
        $primary_color = get_field('primary_color', 'option');
        $secondary_color = get_field('secondary_color', 'option');
        $body_text_color = get_field('body_text_color', 'option');
    
        $font_family = get_field('font_family', 'option');
        $body_font_family = get_field('body_font_family', 'option');
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
            .font-body {
                font-family: $body_font_family !important;
                font-size: $body_font_size !important;
            }
        ";
    
    
        wp_add_inline_style('theme-genic', $styles);
    }
    
    add_action('wp_enqueue_scripts', 'enqueue_theme_genic_styles');
    add_action('admin_enqueue_scripts', 'enqueue_theme_genic_styles');
}

/**
 * 
 * Add registered menus to choose by user
 * 
 */

if(!function_exists('populate_menu_location_field')) {
    function populate_menu_location_field($field) {
        if($field['name'] == 'display_menu' || $field['name'] == 'footer_menu_1' || $field['name'] == 'footer_menu_2' || $field['name'] == 'footer_menu_3' || $field['name'] == 'footer_menu_4') {
            $locations = get_registered_nav_menus();
            $choices = array();
    
            foreach($locations as $location => $description) {
                $choices[$location] = $description;
            }
    
            $field['choices'] = $choices;
        }
        return $field;
    }
    
    add_filter('acf/load_field', 'populate_menu_location_field');
}
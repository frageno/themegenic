<?php

/**
 * Define theme option styles
 */

if(!function_exists('enqueue_theme_genic_styles')) {
    function enqueue_theme_genic_styles()
    {
        // global colors options
        $primary_color = get_field('primary_color', 'option');
        $secondary_color = get_field('secondary_color', 'option');
        $body_text_color = get_field('body_text_color', 'option');
    
        // global typography options
        $font_family = get_field('font_family', 'option');
        $body_font_family = get_field('body_font_family', 'option');
        $body_font_size = get_field('body_font_size', 'option') . 'px';

        // header styling options
        $header_background_color = !empty(get_field('header_background_color', 'option')) ? get_field('header_background_color', 'option') : '#FFFFFF';
        $header_text_color = !empty(get_field('header_text_color', 'option')) ? get_field('header_text_color', 'option') : '#000000';
        
        // topbar styling options
        $topbar_background_color = !empty(get_field('topbar_background_color', 'option')) ? get_field('topbar_background_color', 'option') : '#FFFFFF';
        $topbar_text_color = !empty(get_field('topbar_text_color', 'option')) ? get_field('topbar_text_color', 'option') : '#000000';
        
    
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
            .header {
                color: $header_text_color;
                background: $header_background_color;
            }
            .topbar {
                color: $topbar_text_color;
                background: $topbar_background_color;
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
        if($field['name'] == 'display_menu' || $field['name'] == 'footer_menu' ) {
            $registered_menus = get_registered_nav_menus();
            $first_menu = !empty($registered_menus) ? key($registered_menus) : '';
            $choices = array();
    
            foreach($registered_menus as $menu => $description) {
                $choices[$menu] = $description;
            }
    
            $field['choices'] = $choices;
            $field['default_value'] = $first_menu;
        }
        return $field;
    }
    
    add_filter('acf/load_field', 'populate_menu_location_field');
}
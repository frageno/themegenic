<?php

/**
 * Define theme option styles
 */

if(!function_exists('enqueue_theme_genic_styles')) {
    function enqueue_theme_genic_styles()
    {
        // Global colors options
        $primary_color = get_field('primary_color', 'option');
        $secondary_color = get_field('secondary_color', 'option');
        $body_text_color = get_field('body_text_color', 'option');
    
        // Global typography styles options
        $font_family = get_field('font_family', 'option');
        $body_font_family = get_field('body_font_family', 'option');
        $body_font_size = get_field('body_font_size', 'option') . 'px';

        // Header styling styles options
        $header_background_color = !empty(get_field('header_background_color', 'option')) ? get_field('header_background_color', 'option') : '#FFFFFF';
        $header_text_color = !empty(get_field('header_text_color', 'option')) ? get_field('header_text_color', 'option') : '#000000';
        $header_text_hover_color = !empty(get_field('header_text_hover_color', 'option')) ? get_field('header_text_hover_color', 'option') : '#FFFFFF';
        
        // Topbar styling styles options
        $topbar_background_color = !empty(get_field('topbar_background_color', 'option')) ? get_field('topbar_background_color', 'option') : '#FFFFFF';
        $topbar_text_color = !empty(get_field('topbar_text_color', 'option')) ? get_field('topbar_text_color', 'option') : '#000000';
        $topbar_text_hover_color = !empty(get_field('topbar_text_hover_color', 'option')) ? get_field('topbar_text_hover_color', 'option') : '#FFFFFF';
        $topbar_border_color = !empty(get_field('topbar_border_color', 'option')) ? get_field('topbar_border_color', 'option') : '#FFFFFF';
        
        // Footer styling styles options
        $footer_background_color = !empty(get_field('footer_background_color', 'option')) ? get_field('footer_background_color', 'option') : '#121826';
        $footer_text_color = !empty(get_field('footer_text_color', 'option')) ? get_field('footer_text_color', 'option') : '#FFFFFF';
        $footer_copyright_background_color = !empty(get_field('footer_copyright_background_color', 'option')) ? get_field('footer_copyright_background_color', 'option') : '#121826';
        $footer_copyright_text_color = !empty(get_field('footer_copyright_text_color', 'option')) ? get_field('footer_copyright_text_color', 'option') : '#FFFFFF';

        // Breadcrumb styling styles options
        $breadcrumb_background_color = !empty(get_field('breadcrumb_background_color', 'option')) ? get_field('breadcrumb_background_color', 'option') : '#FFFFFF';
        $breadcrumb_text_color = !empty(get_field('breadcrumb_text_color', 'option')) ? get_field('breadcrumb_text_color', 'option') : '#000000';

        // Breadcrumb image and overlay
        $breadcrumb_background_image = !empty(get_field('breadcrumb_background_image', 'option')) ? get_field('breadcrumb_background_image', 'option') : null;
        $breadcrumb_background_image_overlay = !empty(get_field('breadcrumb_background_image_overlay', 'option')) ? get_field('breadcrumb_background_image_overlay', 'option') : '';
        
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
            .btn-primary {
                font-size:14px!important;
                line-height:24px!important;
                background: $primary_color !important;
            }
            .btn-bg {
                background: $primary_color !important;
            }
            .btn-bg:hover {
                background: $secondary_color !important;
            }
            .btn-primary:hover {
                background: $secondary_color !important;
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
            .header a:hover{
                color: $header_text_hover_color;
            }
            .topbar {
                color: $topbar_text_color;
                background: $topbar_background_color;
                border-bottom: 1px solid $topbar_border_color;
            }
            .topbar a:hover{
                color: $topbar_text_hover_color;
            }
            .footer {
                color: $footer_text_color;
                background: $footer_background_color;
            }
            .breadcrumb {
                color: $breadcrumb_text_color;
                background: $breadcrumb_background_color;
            }
            .breadcrumbImage {
                background: background:url($breadcrumb_background_image);
            }
        ";
    
    
        wp_add_inline_style('theme-genic', $styles);
    }
    
    add_action('wp_enqueue_scripts', 'enqueue_theme_genic_styles');
    add_action('admin_enqueue_scripts', 'enqueue_theme_genic_styles');
}

/**
 * 
 * Add created menus to choose by user in theme option
 * 
 */

if(!function_exists('populate_menu_location_field')) {
    function populate_menu_location_field($field) {
        if($field['name'] == 'display_menu' || $field['name'] == 'topbar_menu' || $field['name'] == 'footer_menu' ) {
            $menus = wp_get_nav_menus();
            $choices = array();
    
            foreach($menus as $menu) {
                $menu_name = $menu->name;
                $choices[$menu->name] = $menu_name;
            }
    
            $field['choices'] = $choices;
        }
        return $field;
    }
    
    add_filter('acf/load_field', 'populate_menu_location_field');
}

/**
 * 
 * 
 * Fill out Headline Tag Selector field with needed headlines
 * 
 */

 if(!function_exists('fill_out_headline_tag_selector_field')) {
    function fill_out_headline_tag_selector_field($field) {
        if($field['name'] == 'headline_tag_selector'){
            $choices = array(
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
            );

            $field['choices'] = $choices;
            $field['default_value'] = 'h2';
        }

        return $field;
    }

    add_filter('acf/load_field', 'fill_out_headline_tag_selector_field');
 }
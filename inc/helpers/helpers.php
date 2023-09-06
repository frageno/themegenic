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
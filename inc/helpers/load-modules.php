<?php

// Load json acf fields
function themegenic_acf_json_load_point( $paths ) {
    // Remove the original path (optional).
    unset($paths[0]);

    // Append the new path and return it.
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;    
}
add_filter( 'acf/settings/load_json', 'themegenic_acf_json_load_point' );

// Register acf modules
if(!function_exists('themegenic_acf_register_custom_modules')) {
    function themegenic_acf_register_custom_modules() {
        $blocks_directory = get_template_directory() . '/template-parts/blocks/';

        if(is_dir($blocks_directory)){
            $block_folders = scandir($blocks_directory);
            $block_folders = array_diff($block_folders, array('.', '..'));

            foreach($block_folders as $folder) {
                $block_path = $blocks_directory . $folder . '/index.php';
                if(file_exists($block_path)){
                    // Check if file has requires template name to register
                    $block_name = get_file_data($block_path, array('Template Name'));
					if (!empty($block_name[0])) { 
							// Register the block using ACF depends on created files
							acf_register_block_type(array(
								'name'            => strtolower(str_replace(' ', '_', $block_name[0])),
								'title'           => $block_name[0],
								'render_template' => '/template-parts/blocks/' . $folder . '/index.php',
							));
					} else {
                        error_log('Invalid block file or missing template name: ' . $block_path);
                    }
                }
            }

        }
    
    }

    add_action('acf/init', 'themegenic_acf_register_custom_modules');
}
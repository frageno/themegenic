<?php

// load json acf fields
function themegenic_acf_json_load_point( $paths ) {
    // Remove the original path (optional).
    unset($paths[0]);

    // Append the new path and return it.
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;    
}
add_filter( 'acf/settings/load_json', 'themegenic_acf_json_load_point' );

// register acf modules
if(!function_exists('themegenic_acf_register_custom_modules')) {
    function themegenic_acf_register_custom_modules() {
        $blocks_directory = get_template_directory() . '/template-parts/blocks/';

        if(is_dir($blocks_directory)){
            $block_folders = scandir($blocks_directory);

            $block_folders = array_diff($block_folders, array('.', '..'));

            foreach($block_folders as $folder) {
                $block_path = $blocks_directory . $folder . '/index.php';
                if(file_exists($block_path)){
                    // $index_contents = file_get_contents($block_path);
                    $block_name = get_file_data($block_path, array('Template Name'));
					if (!empty($block_name[0])) { 
						foreach($block_name as $name) {
							print_r('/template-parts/blocks/' . $folder . '/index.php');
							// Register the block using ACF
							acf_register_block_type(array(
								'name'            => strtolower(str_replace(' ', '-', $name)),
								'title'           => $name,
								'render_template' => '/template-parts/blocks/' . $folder . '/index.php',
								// Additional block settings can be added here
							));
						}
					}
                }
            }

        }
    
    }

    add_action('acf/init', 'themegenic_acf_register_custom_modules');
}
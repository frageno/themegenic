<?php

// require_once(get_stylesheet_directory(  ) . '/functions/helpers/admin_options.php');
/**
 * Register custom theme options in admin dashboard
 */

 function themegenic_register_theme_options_page() {
    add_menu_page(
        'Theme Options',
        'Theme Options',
        'manage_options',
        'theme_options',
        'theme_options_page_html'
    );

    // Add sub-menu pages for each tab
    add_submenu_page(
        'theme_options', // Parent menu slug
        'Logo',           // Page title
        'Logo',           // Menu title
        'manage_options',
        'theme_options_logo', // Unique slug for this tab
        'theme_options_logo_page_html'
    );

    add_submenu_page(
        'theme_options', // Parent menu slug
        'Site Layout',   // Page title
        'Site Layout',   // Menu title
        'manage_options',
        'theme_options_layout', // Unique slug for this tab
        'theme_options_layout_page_html'
    );

    add_submenu_page(
        'theme_options', // Parent menu slug
        'Footer',        // Page title
        'Footer',        // Menu title
        'manage_options',
        'theme_options_footer', // Unique slug for this tab
        'theme_options_footer_page_html'
    );
}
add_action('admin_menu', 'themegenic_register_theme_options_page');

// Define callback functions for each tab
function theme_options_logo_page_html() {
    // Add the HTML for the "Logo" tab here
}

function theme_options_layout_page_html() {
    // Add the HTML for the "Site Layout" tab here
}

function theme_options_footer_page_html() {
    // Add the HTML for the "Footer" tab here
}

// Modify your existing theme_options_page_html() function to handle tab navigation
function theme_options_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $current_tab = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : 'theme_options';
    ?>
    <div id="theme-options" class="wrap">
        <!-- header -->
        <div class="header">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <nav class="nav-tab-wrapper">
                <a href="?page=theme_options" class="nav-tab <?php echo ($current_tab === 'theme_options') ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('General', 'themegenic'); ?></a>
                <a href="?page=theme_options_logo" class="nav-tab <?php echo ($current_tab === 'theme_options_logo') ? 'nav-tab-active' : ''; ?>">Logo</a>
                <a href="?page=theme_options_layout" class="nav-tab <?php echo ($current_tab === 'theme_options_layout') ? 'nav-tab-active' : ''; ?>">Site Layout</a>
                <a href="?page=theme_options_footer" class="nav-tab <?php echo ($current_tab === 'theme_options_footer') ? 'nav-tab-active' : ''; ?>">Footer</a>
            </nav>
        </div>

        <!-- end of header -->
        <!-- options -->
        <div class="options">
            <form action="options.php" method="post">
                <?php
                    // Update this line to use the current tab's settings group
                    settings_fields($current_tab . '_group');
                    do_settings_sections($current_tab);
                    submit_button('Save Settings');
                ?>
            </form>
        </div>
    </div>
    <?php
}


/**
 * Register our settings
 */

function themegenic_register_settings() {
    register_setting( 'theme_options_group', 'theme_options', '' );

    add_settings_section( 'themegenic_options_section', false, false, 'theme_options' );

    add_settings_field( 'themegenic_default_background_color',
                        esc_html__( 'Default Background Color', 'themegenic' ),
                        'render_theme_options', 'theme_options',
                        'themegenic_options_section',
                        ['label_for' => 'theme_background_color'] );
                        
    add_settings_field( 'themegenic_default_text_color',
                        esc_html__( 'Default Text Color', 'themegenic' ),
                        'render_theme_options', 'theme_options',
                        'themegenic_options_section',
                        ['label_for' => 'theme_text_color'] );
}

add_action('admin_init', 'themegenic_register_settings');

/**
 * Render the theme option field
 */

 function render_theme_options($args) {
    $value = get_option( 'theme_options')[$args['label_for']] ?? ''; 
    ?>
        <input type="text"
               name="theme_options[<?php echo esc_attr($args['label_for']); ?>]"
               id="<?php echo esc_attr($args['label_for']); ?>"
               value="<?php echo esc_attr($value); ?>"
               class="color-field">
    <script>
        jQuery(document).ready(function($) {
        // Initialize the color picker
        $('.color-field').wpColorPicker();
        });
    </script>
    <?php
 }

// Register new Options panel.
// $panel_args = [
//     'title'           => 'My Options',
//     'option_name'     => 'my_options',
//     'slug'            => 'my-options-panel',
//     'user_capability' => 'manage_options',
//     'tabs'            => [
//         'tab-1' => esc_html__( 'Tab 1', 'text_domain' ),
//         'tab-2' => esc_html__( 'Tab 2', 'text_domain' ),
//     ],
// ];

// $panel_settings = [
//     // Tab 1
//     'option_1' => [
//         'label'       => esc_html__( 'Checkbox Option', 'text_domain' ),
//         'type'        => 'checkbox',
//         'description' => 'My checkbox field description.',
//         'tab'         => 'tab-1',
//     ],
//     'option_2' => [
//         'label'       => esc_html__( 'Select Option', 'text_domain' ),
//         'type'        => 'select',
//         'description' => 'My select field description.',
//         'choices'     => [
//             ''         => esc_html__( 'Select', 'text_domain' ),
//             'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
//             'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
//             'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
//         ],
//         'tab'         => 'tab-1',
//     ],
//     // Tab 2
//     'option_3' => [
//         'label'       => esc_html__( 'Text Option', 'text_domain' ),
//         'type'        => 'text',
//         'description' => 'My field 1 description.',
//         'tab'         => 'tab-2',
//     ],
//     'option_4' => [
//         'label'       => esc_html__( 'Textarea Option', 'text_domain' ),
//         'type'        => 'textarea',
//         'description' => 'My textarea field description.',
//         'tab'         => 'tab-2',
//     ],
// ];

// new WPEX_Options_Panel( $panel_args, $panel_settings );
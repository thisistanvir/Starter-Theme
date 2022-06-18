<?php

/**
 * The template for displaying Metaboxs and Options.
 *
 * @package starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


// valid tags
$allowed_html = array(
    'a' => array(
        'href'  => true,
        'title' => true,
    ),
    'br'     => array(),
    'em'     => array(),
    'strong' => array(),
    'small' => array(),
);

if (class_exists('CSF')) {
    $theme_options_prefix = 'starter_theme_options';

    CSF::createOptions($theme_options_prefix, array(
        'menu_title' => esc_html__('Theme Options', 'starter-theme'),
        'framework_title' => 'Theme Options <small>by <a style="text-decoration: none;" href="https://itanvir.net/">iTanvir</a></small>',
        'menu_slug'  => 'theme-options',
        'menu_type'   => 'menu',
    ));

    CSF::createSection($theme_options_prefix, array(
        'title'  => 'General',
        'fields' => array(

            array(
                'id'    => 'phone',
                'type'  => 'text',
                'title' => 'Phone number',
            ),

        )
    ));

    // Metaboxes

    // Page metabox
    $page_metabox_prefix = 'st_meta';
    CSF::createMetabox($page_metabox_prefix, array(
        'title'     => 'Options',
        'post_type' => 'page',
        'data_type' => 'serialize',
    ));

    CSF::createSection($page_metabox_prefix, array(
        'fields' => array(
            // array(
            //     'id'    => 'enable_page_title',
            //     'type'  => 'switcher',
            //     'title' => 'Enable page title?',
            //     'default' => true,
            // ),
            array(
                'id'    => 'default_padding',
                'type'  => 'switcher',
                'title' => 'Enable default padding?',
                'default' => true,
            ),
        )
    ));
} else {
    function starter_theme_codestar_install_notice() {
?>
        <div class="notice notice-warning">
            <p><strong><?php echo wp_get_theme(); ?></strong> required <strong>Codestar Framework</strong> plugin to be installed and activated on your site.</p>
        </div>
<?php
    }
    add_action('admin_notices', 'starter_theme_codestar_install_notice');
}

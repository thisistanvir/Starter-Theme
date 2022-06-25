<?php

/**
 * starter-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starter-theme
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}




/**
 * Better Comments
 */
include_once('inc/better-comments.php');

/**
 * Codestar Framework
 */
if (!class_exists('CSF')) {
   include_once('inc/codestar-framework/codestar-framework.php');
   include_once('inc/metabox-and-options.php');
}

/**
 * TGM Plugin Activator
 */
if (!class_exists('TGM_Plugin_Activation')) {
   include_once('inc/tgm-plugin-activation.php');
   include_once('inc/required-plugins.php');
}


/**
 * Define theme version
 */
if (!defined('STARTER_THEME_VERSION')) {
   // Replace the version number of the theme on each release.
   define('STARTER_THEME_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if (!function_exists('starter_theme_supports')) :
   function starter_theme_supports() {

      /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
      load_theme_textdomain('starter-theme', get_template_directory() . '/languages');

      /**
       * Add default posts and comments RSS feed links to head.
       * */
      add_theme_support('automatic-feed-links');

      /*
      * Let WordPress manage the document title.
      */
      add_theme_support('title-tag');

      /*
      * Enable support for Post Thumbnails on posts and pages.
      */
      add_theme_support('post-thumbnails');

      /*
      * Switch default core markup for search form, comment form, and comments
      * to output valid HTML5.
      */
      add_theme_support(
         'html5',
         array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
         )
      );

      /*
      * Enable support for Post Formats.
      *
      * See: https://codex.wordpress.org/Post_Formats
      */
      add_theme_support('post-formats', array(
         'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
      ));

      /**
       * Set up the WordPress core custom background feature.
       */
      add_theme_support(
         'custom-background',
         apply_filters(
            'demo_custom_background_args',
            array(
               'default-color' => 'ffffff',
               'default-image' => '',
            )
         )
      );

      /**
       * Add theme support for selective refresh for widgets.
       */
      add_theme_support('customize-selective-refresh-widgets');

      /**
       * Add support for core custom logo.
       */
      add_theme_support(
         'custom-logo',
         [
            'height'      => 100,
            'width'       => 350,
            'flex-height' => true,
            'flex-width'  => true,
         ]
      );

      /**
       * This theme uses wp_nav_menu() in one location.
       */
      register_nav_menus(
         [
            'main-menu'   => __('Primary menu', 'starter-theme'),
         ]
      );
   }
endif;
add_action('after_setup_theme', 'starter_theme_supports');


/**
 * Enqueue scripts and styles.
 */
function starter_theme_files() {
   wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], STARTER_THEME_VERSION, 'all');
   wp_enqueue_style('starter-theme-style', get_stylesheet_uri());

   // wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], '1.8.1', true);
   wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], STARTER_THEME_VERSION, true);

   if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
   }
}
add_action('wp_enqueue_scripts', 'starter_theme_files');


/**
 * Register Custom Post Type
 */
// add_action('init', 'starter_theme_custom_post');
// function starter_theme_custom_post() {
//    // Register Custom Post for CPT
//    register_post_type(
//       'cpt',
//       array(
//          'labels' => array(
//             'name' => __('CPTs', 'starter-theme'),
//             'singular_name' => __('CPT', 'starter-theme'),
//             'add_new' => __('Add New CPT', 'starter-theme'),
//             'add_new_item' => __('Add New CPT', 'starter-theme'),
//          ),
//          'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
//          'public'       => false,
//          'show_ui'      => true,
//          'show_in_rest' => true,
//          'menu_icon'    => 'dashicons-slides',
//       )
//    );
// }

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_theme_widgets_init() {
   register_sidebar(
      array(
         'name'          => esc_html__('Main Sidebar', 'starter-theme'),
         'id'            => 'main-sidebar',
         'description'   => esc_html__('Add widgets here.', 'starter-theme'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
}
add_action('widgets_init', 'starter_theme_widgets_init');


/**
 * Excerpt Length
 */
function starter_theme_excerpt_length($length) {
   return 20;
}
add_filter('excerpt_length', 'starter_theme_excerpt_length', 999);

// post excerpt more
function starter_theme_excerpt_more($more) {
   return '...';
}
add_filter('excerpt_more', 'starter_theme_excerpt_more');


/**
 * Theme Customize Register
 */
add_action('customize_register', 'starter_theme_customize_register');
function starter_theme_customize_register($wp_customize) {
   // Header Area
   $wp_customize->add_section('starter_theme_header_area', array(
      'title'    => __('Header Area', 'starter-theme'),
      'description' => __('If you interested to update your header area, you can do it form here.', 'starter-theme'),
   ));
   $wp_customize->add_setting('starter_theme_logo', array(
      'default'        => get_bloginfo('name'),
   ));
   $wp_customize->add_control(
      new WP_Customize_Image_Control(
         $wp_customize,
         'starter_theme_logo',
         array(
            'label'      => __('Upload a logo', 'starter-theme'),
            'description'      => __('If you want to update your site logo, just upload it here.', 'starter-theme'),
            'section'    => 'starter_theme_header_area',
            'settings'   => 'starter_theme_logo',
         )
      )
   );

   /**
    * Menu Position
    */
   $wp_customize->add_setting('starter_theme_menu_position', array(
      'default'        => 'right_menu',
   ));
   $wp_customize->add_control(
      'starter_theme_menu_position',
      array(
         'label'      => __('Menu Position', 'starter-theme'),
         'description'      => __('Select menu position.', 'starter-theme'),
         'section'    => 'starter_theme_header_area',
         'settings'   => 'starter_theme_menu_position',
         'type' => 'radio',
         'choices' => array(
            'left_menu' => __('Left Menu', 'starter-theme'),
            'right_menu' => __('Right Menu', 'starter-theme'),
            'center_menu' => __('Center Menu', 'starter-theme')
         )
      )
   );
}


/**
 * custom comments form order
 */
function starter_theme_comment_field($fields) {
   $comment = $fields['comment'];
   $author  = $fields['author'];
   $email   = $fields['email'];
   $url     = $fields['url'];
   $cookies = $fields['cookies'];

   unset($fields['comment']);
   unset($fields['author']);
   unset($fields['email']);
   unset($fields['url']);
   unset($fields['cookies']);

   $fields['author']  = $author;
   $fields['email']   = $email;
   $fields['url']     = $url;
   $fields['comment'] = $comment;
   $fields['cookies'] = $cookies;

   return $fields;
}
add_action('comment_form_fields', 'starter_theme_comment_field');

<?php

// starter-theme supports
if (!function_exists('starter_theme_supports')) :
   function starter_theme_supports()
   {
      load_theme_textdomain('starter-theme');
      add_theme_support('post-formats');
      add_theme_support('post-thumbnails');
      add_theme_support('title-tag');

      register_nav_menus(
         [
            'main-menu'   => __('Primary menu', 'starter-theme'),
         ]
      );
   }
endif;
add_action('after_setup_theme', 'starter_theme_supports');

// Calling Theme files
function starter_theme_files()
{
   wp_enqueue_style('starter-theme-style', get_stylesheet_uri());
   wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0', 'all');

   // wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], '1.8.1', true);
   wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'starter_theme_files');



// post excerpt more
function starter_theme_excerpt_more($more)
{
   return '...';
}
add_filter('excerpt_more', 'starter_theme_excerpt_more');


// Theme Customize Register
add_action('customize_register', 'starter_theme_customize_register');
function starter_theme_customize_register($wp_customize)
{
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

   // Menu Position
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


// custom comments form order
function starter_theme_comment_field($fields)
{
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

<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">

        <?php
        $site_logo = get_theme_mod('starter_theme_logo'); //get site logo from header customize
        $menu_position = get_theme_mod('starter_theme_menu_position'); //get menu position from header customize
        ?>

        <header id="masthead" class="site-header section <?php echo $menu_position; ?>">
            <div class="section-container">
                <div class="internal-header-wrap">
                    <div class="site-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if (!empty($site_logo)) : ?>
                                <img src="<?php echo esc_url($site_logo); ?>" alt="<?php bloginfo('name'); ?>">
                            <?php else : ?>
                                <h2><?php bloginfo('name'); ?></h2>
                            <?php endif; ?>
                        </a>
                    </div>
                    <nav id="site-navigation" class="main-navigation">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'main-menu',
                                'menu_class'     => '',
                                'menu_id'     => 'nav',
                            )
                        );
                        ?>
                    </nav> <!-- #site-navigation -->
                </div>
            </div>
        </header> <!-- #masthead -->
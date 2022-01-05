<!DOCTYPE html>
<html <?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    $site_logo = get_theme_mod('starter_theme_logo'); //get site logo from header customize
    $menu_position = get_theme_mod('starter_theme_menu_position'); //get menu position from header customize
    ?>

    <header id="header-area" class="section <?php echo $menu_position; ?>">
        <div class="section-container">
            <div class="internal_header_wrap">
                <div class="site_logo">
                    <a href="<?php echo home_url(); ?>">
                        <?php if (!empty($site_logo)) : ?>
                            <img src="<?php echo $site_logo; ?>" alt="<?php bloginfo('name'); ?>">
                        <?php else : ?>
                            <h2><?php bloginfo('name'); ?></h2>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="site-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'menu_class'     => '',
                            'menu_id'     => 'nav',
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </header>
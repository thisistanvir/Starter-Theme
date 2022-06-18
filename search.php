<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Starter_Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>

<main id="primary" class="site-main content-block">

  <?php if (have_posts()) : ?>

    <section class="section breadcrumb">
      <div class="section-container">
        <div class="internal-content-wrap">
          <h1 class="breadcrumb-title"> <?php printf(esc_html__('Search Results for: %s', 'starter-theme'), '<span>' . get_search_query() . '</span>'); ?> </h1>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="section-container">
        <div class="internal-content-wrap">
          <?php get_template_part('/template-parts/content', 'excerpt'); ?>
        </div>
      </div>
    </section> <!-- .section -->

  <?php else : ?>
    <h2><?php esc_html_e('Nothing Found', 'starter-theme'); ?></h2>
  <?php endif; ?>

</main> <!-- #main -->

<?php get_footer(); ?>
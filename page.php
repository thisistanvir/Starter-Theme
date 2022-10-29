<?php

/**
 * The template for displaying all single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package Starter_Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


get_header();

/* Start the Loop */
while (have_posts()) :
  the_post();

  // page content
  get_template_part('template-parts/content', 'page');

  // If comments are open or there is at least one comment, load up the comment template.
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
endwhile; // End of the loop.

get_footer();

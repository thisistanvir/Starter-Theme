<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Starter_Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();
?>

<header class="page-header alignwide">
  <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'starter-theme'); ?></h1>
</header><!-- .page-header -->

<div class="error-404 not-found default-max-width">
  <div class="page-content">
    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'starter-theme'); ?></p>
    <a href="<?php echo esc_url(home_url()); ?>" class="btn"><?php esc_html_e('go back to Home', 'starter-theme'); ?></a>
    <?php get_search_form(); ?>
  </div><!-- .page-content -->
</div><!-- .error-404 -->

<?php
get_footer();

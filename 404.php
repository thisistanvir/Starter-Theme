<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package starter-template
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
get_header(); ?>

<main id="primary" class="site-main content-block">

  <section class="section error-404 not-found">
    <div class="section-container">
      <div class="internal-content-wrap">

        <header class="page-header">
          <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'starter-theme'); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
          <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'starter-theme'); ?></p>

          <a href="<?php echo home_url(); ?>" class="btn"><?php esc_html_e('go back to Home', 'starter-theme'); ?></a>

        </div><!-- .page-content -->

      </div>
    </div>
  </section> <!-- .error-404 -->

</main> <!-- #main -->

<?php get_footer(); ?>
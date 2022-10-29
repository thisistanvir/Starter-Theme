<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_Theme
 */
if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
}
?>

</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<footer id="footer" class="site-footer">
        <div class="site-info">
                <?php
                printf(
                        esc_html__('Proudly powered by %s.', 'starter-theme'),
                        '<a href="' . esc_url(__('https://wordpress.org/', 'starter-theme')) . '">WordPress</a>'
                );
                ?>
                <span class="sep"> | </span>
                <?php printf(esc_html__('Theme: %1$s by %2$s.', 'starter-theme'), '' . esc_html__('Starter Theme', 'starter-theme') . '', '<a href="' . esc_url('http://itanvir.net/') . '">' . esc_html__('iTanvir', 'starter-theme') . '</a>'); ?>
        </div><!-- .site-info -->
</footer><!-- #footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
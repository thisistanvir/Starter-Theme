<?php

/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_Theme
 */
if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
}
?>

<footer id="footer" class="site-footer">
        <div class="site-info">
                <a href="<?php echo esc_url(__('https://wordpress.org/', 'starter-theme')); ?>">
                        <?php printf(esc_html__('Powered by %s', 'starter-theme'), 'WordPress'); ?>
                </a>
                <span class="sep"> | </span>
                <?php printf(esc_html__('Theme: %1$s by %2$s.', 'starter-theme'), 'Starter Theme', '<a href="http://itanvir.net/">iTanvir</a>'); ?>
        </div><!-- .site-info -->
</footer><!-- #footer -->

</div><!-- #page -->


<?php wp_footer(); ?>

</body>

</html>
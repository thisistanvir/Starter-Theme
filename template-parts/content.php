<?php

/**
 * Template part for displaying the post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php the_content(); ?>

  </article>

<?php endwhile; ?>
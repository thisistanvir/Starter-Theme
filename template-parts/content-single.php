<?php

/**
 * The template for displaying all single posts content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Starter_Theme
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

if (have_posts()) : ?>

   <article id="post-<?php the_ID(); ?>" <?php post_class('single_post'); ?>>

      <?php if (has_post_thumbnail()) :
         the_post_thumbnail('full', ['class' => 'single_post_thumb']);
      endif; ?>

      <div class="single_post_content">
         <h2 class="post_title"><?php the_title(); ?></h2>
         <p class="post-meta">
            <span class="date"><?php the_time('F j, Y') ?></span>
            <span class="author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
            <span class="cats-list"><?php the_category(', '); ?></span>
            <span class="tags-list"><?php the_tags(' ', ', ') ?></span>
         </p>
         <?php the_content(); ?>
      </div>




   </article>

   <div id="post_comments">
      <?php
      if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
         comments_template();
      }
      ?>
   </div>

<?php endif; ?>
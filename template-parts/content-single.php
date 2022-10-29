<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single_post'); ?>>
   <header class="entry-header alignwide">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
   </header><!-- .entry-header -->
   <div class="entry-content">
      <?php if (has_post_thumbnail()) :
         the_post_thumbnail('full', ['class' => 'single_post_thumb']);
      endif; ?>
      <p class="post-meta">
         <span class="date"><?php the_time('F j, Y') ?></span>
         <span class="author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
         <span class="cats-list"><?php the_category(', '); ?></span>
         <span class="tags-list"><?php the_tags(' ', ', ') ?></span>
      </p>
      <?php the_content(); ?>
   </div>
</article>
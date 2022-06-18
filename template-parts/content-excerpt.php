<?php

/**
 * Template part for displaying the post excerpt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */

?>

<?php while (have_posts()) : the_post(); ?>

   <article id="post-<?php the_ID(); ?>" <?php post_class('single_post_item'); ?>>

      <a href="<?php the_permalink(); ?>">
         <?php the_post_thumbnail('thumbnail', ['class' => 'alignleft post_thumb']); ?>
         <h2 class="post_title"><?php the_title(); ?></h2>
      </a>

      <p class="post-meta">
         <span class="date"><?php the_time('F j, Y') ?></span>
         <span class="author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
         <span class="cats-list"><?php the_category(', '); ?></span>
         <span class="tags-list"><?php the_tags(' ', ', ') ?></span>
      </p>
      <?php the_excerpt(); ?>
   </article>

<?php endwhile; ?>


<!-- Post Pagination -->
<?php the_posts_pagination(
   [
      'screen_reader_text' => ' ',
      'prev_text' => '<span class="fa fa-angle-left"></span>',
      'next_text' => '<span class="fa fa-angle-right"></span>',
      'class' => 'pagination'
   ]
);
?>
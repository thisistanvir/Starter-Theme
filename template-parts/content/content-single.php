<?php

/**
 * Template part for displaying post content
 *
 */

?>

<?php if (have_posts()) :
   while (have_posts()) : the_post(); ?>

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

<?php endwhile;
else :
   esc_html_e('No content found', 'starter-theme');
endif; ?>
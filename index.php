<?php

/**
 *  The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
   <header class="page-header alignwide">
      <h1 class="page-title"><?php single_post_title(); ?></h1>
   </header><!-- .page-header -->
<?php endif; ?>

<?php if (have_posts()) :

   // Load posts loop.
   while (have_posts()) :
      the_post();

      // post excerpt
      get_template_part('/template-parts/content', 'excerpt');

   endwhile;

   // posts navigation
   the_posts_pagination(
      [
         'screen_reader_text' => ' ',
         'prev_text' => '<span class="fa fa-angle-left"></span>',
         'next_text' => '<span class="fa fa-angle-right"></span>',
         'class' => 'pagination'
      ]
   );

else :

   // If no content, include the "No posts found" template.
   get_template_part('template-parts/content', 'none');
endif;

get_footer();

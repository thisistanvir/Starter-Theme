<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

$description = get_the_archive_description();
?>

<?php if (have_posts()) : ?>

  <header class="page-header alignwide">
    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
    <?php if ($description) : ?>
      <div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
    <?php endif; ?>
  </header><!-- .page-header -->

<?php while (have_posts()) :
    the_post();

    // post excerpt
    get_template_part('template-parts/content', 'excerpt');
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

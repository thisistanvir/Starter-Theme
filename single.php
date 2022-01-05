<?php get_header();
?>

<div class="content-block section">
   <div class="section-container">
      <div class="single-post-content-wrap">
         <?php get_template_part('/template-parts/content/content-single'); ?>

         <div id="post_comments">
            <?php
            if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
               comments_template();
            }
            ?>
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>
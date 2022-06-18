<?php

/**
 * The template for displaying comments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
  return;
}
?>

<div id="comments" class="comments-area">

  <?php
  // You can start editing here -- including this comment!
  if (have_comments()) :
    $buson_comment_count = get_comments_number();
  ?>
    <!-- <h2 class="comments-title">
			<h5><?php echo $buson_comment_count . ($buson_comment_count === '1' ? ' comment' : ' comments'); ?></h5>
		</h2> -->
    <!-- .comments-title -->

    <?php the_comments_navigation(); ?>

    <!-- Comments List -->
    <ul class="comments">
      <?php
      wp_list_comments(
        array(
          'style'      => 'ul',
          'short_ping' => true,
          'callback' => 'better_comments'
        )
      );
      ?>
    </ul>
    <!-- end: comments list -->

    <?php
    the_comments_navigation();

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open()) :
    ?>
      <p class="no-comments"><?php esc_html_e('Comments are closed.', 'buson'); ?></p>
  <?php
    endif;

  endif; // Check for have_comments().

  comment_form([
    'fields' => [
      'author' => '<input type="text" name="author" id="author" class="form-control half" placeholder="Name*" required="required">',
      'email' => '<input type="email" name="email" id="email" class="form-control half" placeholder="Email*" required="required">',
      'url' => '<input type="text" name="url" id="url" class="form-control" placeholder="Website">'
    ],
    'comment_field' => '<textarea name="comment" id="comment" cols="30" rows="7" class="form-control w-100" placeholder="Write comment*" required="required"></textarea>',
    'class_form' => 'form-contact comment_form comment-form',
    'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="button button-contactForm btn_1 boxed-btn %3$s">%4$s</button>',
    'title_reply' => '<div class="title"><h4>Leave a Comment</h4></div>'

  ]);
  ?>

</div><!-- #comments -->
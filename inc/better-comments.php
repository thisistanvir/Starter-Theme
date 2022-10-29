<?php

/**
 * The template for displaying better comments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */


if (!function_exists('better_comments')) :
  function better_comments($comment, $args, $depth) {
?>
    <li class="comment">
      <div class="single-comment justify-content-between d-flex" id="comment-<?php comment_ID() ?>">
        <?php if ($comment->comment_approved == '0') : ?>
          <em><?php esc_html_e('Your comment is awaiting moderation.', 'starter-theme') ?></em>
          <br />
        <?php endif; ?>

        <div class="user justify-content-between d-flex">
          <div class="thumb">
            <?php echo get_avatar($comment, '70'); ?>
          </div>
          <div class="desc">
            <div class="comment">
              <?php comment_text(); ?>
            </div>
            <div class="d-flex justify-content-between">
              <div class="d-flex align-items-center">
                <h5>
                  <?php echo get_comment_author(); ?>
                </h5>
                <p class="date"><?php echo get_comment_date(); ?></p>
              </div>
              <div class="reply-btn">
                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span class="btn-reply text-uppercase">reply</span>'))) ?>
              </div>
              <?php edit_comment_link(); ?>
            </div>
          </div>
        </div>
      </div>
    </li>
<?php
  }
endif;

<?php

/**
 * Comments Custom Callback
 */
function custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth; ?>
	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID( ); ?>">
    
			<div class="comment-left">
				<span class="the-author"><?php comment_author_link() ?></span>
				<span class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="">
				<?php comment_date('F jS, Y') ?></a></span>
        	
        		<div class="avatar_cont"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
			</div><!-- end .comment-left-->
      
			<div class="comment-right">
			<?php if ($comment->comment_approved == '0') _e('<span class="not-approved">Your comment is awaiting moderation.</span>', 'eighttwenty') ?>
				
				<span class="comment-content">
					<?php comment_text() ?>
 				</span><!-- comment-content -->
 			
					<?php echo comment_reply_link(array('before' => '<span class="reply">', 'after' => '</span>', 'reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>
      
			</div><!-- end .comment-right -->
   
<?php
}
?>
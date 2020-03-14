<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div id="commentarea">
    
    <?php if ( have_comments() ) : ?>
    
    <?php /* numbers of pings and comments */
        $ping_count = $comment_count = 0;
        foreach ( $comments as $comment )
	    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
    ?>
    
    <?php if ( !empty($comments_by_type['comment']) ) : ?>
    
    	<h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>
			
			<?php eighttwenty_before_comments(); ?>
			
        	<ol id="comment-list">
            	<?php wp_list_comments('type=comment&callback=custom_comment'); ?>
        	</ol>
        	
        	<?php eighttwenty_after_comments(); ?>
		
		<?php if ( get_option( 'page_comments' ) ) : ?>
    	<div class="navigation">
        	<div class="paginated-comments-links">
        		<?php paginate_comments_links(); ?>
        	</div>
    	</div>
    	<?php endif; ?>
    
    <?php endif; /* if ( $comment_count ) */ ?>
    
    <?php if ( !empty($comments_by_type['pings']) ) : ?>
    
    	<?php eighttwenty_before_pings(); ?>
    
      	<h3 id="pings">Trackbacks/Pingbacks</h3>
			<ol class="commentlist">
				<?php wp_list_comments('type=pings'); ?>
			</ol>
			
		<?php eighttwenty_after_pings(); ?>
		
	<?php endif; /* if ($ping_count) */ ?>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
		
	<?php elseif ( pings_open() && !comments_open() && is_single() ) : ?>
		<p class="comments-closed pings">Comments are closed  but <a href="<?php trackback_url() ;?>" title="trackback url">pings are open</a></p>

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="comments-closed">Comments are closed.</p>

	<?php endif; ?>

<?php endif; ?>



<?php if ( comments_open() ) : ?>

	<div id="respond">

		<h3><?php comment_form_title( 'Leave a Comment', 'Leave a Reply to %s' ); ?></h3>

			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		
<?php else : ?>

    	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    	<?php if ( $user_ID ) : ?>
        
        		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

    	<?php else : ?>
    	
        		<p><label for="author"><small>Name <?php if ($req) echo "*"; ?></small></label><br /><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>

        		<p><label for="email"><small>Mail <?php if ($req) echo "*"; ?></small></label><br /><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>

        		<p><label for="url"><small>Website</small></label><br /><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>

    	<?php endif; ?>

        		<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
        		
        		<p class="recommended-tags"><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>

        		<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
        		<?php comment_id_fields(); ?>
        		</p>
    	
    	<?php do_action('comment_form', $post->ID); ?>

    	</form>

<?php endif; // If registration required and not logged in ?>
	</div><!-- end respond -->

<?php endif; // if you delete this the sky will fall on your head ?>
</div><!-- end comment area -->
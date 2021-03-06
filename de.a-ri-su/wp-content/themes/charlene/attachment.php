<?php get_header(); ?>

	<div id="primary" class="hfeed">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <?php eighttwenty_before_entry(); ?><!-- hook before entry -->
                
				<div class="entry-content entry">
				
					<div class="entry-attachment">
							<p>Download this file <a href="<?php echo wp_get_attachment_url( $post->ID ); ?>" title="<?php echo wp_specialchars( get_the_title( $post->ID ), 1 ) ?>" rel="attachment"><?php echo basename( $post->guid ) ?></a></p>
					</div><!-- end .entry-attachment-->
					
					<?php the_content(); ?>
					
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
				</div><!-- end .entry -->

				<?php eighttwenty_after_entry(); ?><!-- hook after entry -->
			
			<?php if (is_active_sidebar('after-post')) {
				echo '<div id="first" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
					dynamic_sidebar('after-post');
				echo '</ul>' . "\n" . '</div><!-- #third .aside -->'. "\n";
			 } ?><!-- After Post Widget Area -->
			
		</div> <!-- end .post -->

		<?php comments_template('', true); ?>
		
		<?php endwhile; else: ?>

			<h2><?php _e('Sorry no record of that here, perhaps try again.', 'eighttwenty'); ?></h2>

		<?php endif; ?>

	</div> <!-- end #primary -->

<?php get_sidebar('widget'); ?>

<?php get_footer(); ?>

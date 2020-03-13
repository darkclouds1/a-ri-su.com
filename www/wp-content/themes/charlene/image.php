<?php get_header(); ?>

	<div id="primary" class="hfeed">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                
                <?php eighttwenty_before_entry(); ?><!-- before entry hook -->
                
				<div class="entry-content entry">
				
					<p class="attachment-image">
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" type="<?php echo get_post_mime_type(); ?>">
							<img class="aligncenter" src="<?php echo wp_get_attachment_url(); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
						</a>
					</p><!-- .attachment-image -->
				
					<?php the_content(); ?>
					
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div><!-- end .entry -->
				
				<div class="navigation">
					<span class="fl next"><?php previous_image_link(); ?></span>
					<span class="fr prev"><?php next_image_link(); ?></span>
				</div><!-- end .navigation -->
				
				<?php eighttwenty_after_entry(); ?><!-- after entry hook -->
			
			<?php if (is_active_sidebar('after-post')) {
				echo '<div id="first" class="aside sub-aside">'. "\n" . '<ul class="xoxo">' . "\n";
					dynamic_sidebar('after-post');
				echo '</ul>' . "\n" . '</div><!-- #third .aside -->'. "\n";
			 } ?>
			
		</div> <!-- end .post -->

		<?php comments_template('', true); ?>
		
		<?php endwhile; else: ?>

			<h2><?php _e('Sorry no record of that here, perhaps try again.', 'eighttwenty'); ?></h2>

		<?php endif; ?>

	</div> <!-- end #primary -->

<?php get_sidebar('widget'); ?>

<?php get_footer(); ?>

<?php get_header(); ?>

	<div id="primary">
	
		<div id="page-title">
			<h1><?php single_cat_title(); ?></h1>
		</div>
    
		<?php eighttwenty_breadcrumb_nav(); ?><!-- breadcrumb nav -->

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
			<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
				    
				    <?php eighttwenty_before_entry_summary(); ?><!-- hook before entry summary -->
				    
					<div class="entry-content entry">
						<?php the_excerpt(); ?>
					</div><!-- end .entry-content -->
					
					<?php eighttwenty_after_entry_summary(); ?><!-- hook after entry summary -->
					
			</div><!-- end .post -->
		
		<?php endwhile; ?>
		
			<div class="navigation">
				<span class="fl next"><?php next_posts_link('&laquo; Previous Articles') ?></span>
				<span class="fr prev"><?php previous_posts_link('Newer Articles &raquo;') ?></span>
			</div> <!-- end .navigation -->
		
		<?php else : ?>
		
			<h2><?php _e('Sorry no record of that here, perhaps try again.', 'eighttwenty'); ?></h2>
	    
		<?php endif; ?>
	       
	</div><!--end #primary-->

<?php get_sidebar('widget'); ?>

<?php get_footer(); ?>
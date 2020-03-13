<?php get_header(); ?>

    <div id="primary" class="hfeed">
    
    	<div id="page-title">
        	<h1><?php eighttwenty_home_title() // See Theme Options Panel ?></h1>
    	</div>
      
		<p class="tagline"><?php eighttwenty_colophon() // See Theme Options Panel ?></p><!-- p .tagline colophon -->
		
		<?php eighttwenty_breadcrumb_nav(); ?><!-- breadcrumb nav-->

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>    
         
         			<?php eighttwenty_before_entry_summary(); ?><!-- hook before entry summary -->
         			
					<div class="entry-content entry">
						<?php eighttwenty_post_content(); ?>
					</div><!-- end .entry-content --> 
					
					<?php eighttwenty_after_entry_summary(); ?><!-- hook after entry summary -->    
    
			</div><!-- end .post -->
        
		<?php endwhile; ?>
          
			<div class="navigation">
				<span class="fl next"><?php next_posts_link('&laquo; Previous Articles') ?></span>
				<span class="fr prev"><?php previous_posts_link('Newer Articles &raquo;') ?></span>
			</div>  
            
		<?php else : ?>

			<h2>Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>

		<?php endif; ?>
      
    </div><!--end #primary-->

<?php get_sidebar('widget'); ?>

<?php get_footer(); ?>
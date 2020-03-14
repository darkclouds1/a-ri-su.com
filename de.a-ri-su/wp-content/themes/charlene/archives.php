<?php
/**
 * Template Name: Archives
 *
 * Listing of monthly, yearly, and category archives by default.
 */

get_header(); ?>

<div id="primary" class="hfeed">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <h1 class="entry-title"><?php the_title(); ?></h1>
    
    <div class="entry-content entry">
    
	    <?php the_content(); ?>
	        
	    <h2>By Month:</h2>
	        <ul class="xoxo monthly-archives">
		        <?php wp_get_archives('type=monthly'); ?>
	        </ul><!-- end .xoxo monthly-archives -->
	    
	    <h2>By Year:</h2>
	        <ul class="xoxo yearly-archives">
		        <?php wp_get_archives('type=yearly'); ?>
	        </ul> <!-- end .xoxo yearly-archives -->   

	    <h2>By Subject:</h2>
	        <ul class="xoxo category-archives">
		        <?php wp_list_categories('depth=1&title_li='); ?>
	        </ul> <!-- end .xoxo category-archives -->
	     
	</div><!-- end .entry-content -->
	
	<?php endwhile; ?>
		
		<?php else : ?>
		
		    <h2><?php _e('Sorry no record of that here, perhaps try again.', 'eighttwenty'); ?></h2>
		        
	    <?php endif; ?>
	
</div><!-- end #primary -->

<?php get_sidebar('widget'); ?>

<?php get_footer(); ?>
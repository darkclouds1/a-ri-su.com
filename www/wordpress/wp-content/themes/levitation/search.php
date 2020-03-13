<?php 
global $more, $k_options; 
get_header();?> 

	        <div class="additional_info">
            <h2>SEARCH RESULTS</h2>
				</div>
				
 
	<div id="main">  
	    <div class="wrapper">
	    	<div class='box box_medium box1'>
		<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post();
		?>
		
	           <div class='entry'>
	           <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	            <div class="entry-head">
               <span class="categories"><?php the_category(', ') ?></span>&bull;<span class="date">on <?php the_time('F jS, Y') ?></span>&bull;<span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php edit_post_link('Edit', ' ,', ''); ?></span>
           </div>

	           <?php 
	           	the_excerpt('read more'); 
	           	?>
	           
	           
	      		</div> <!--end entry-->			
		<?php endwhile; 
           	kriesi_pagination($query_string);
           	else: ?>
	<div class="entry">
	<h2>Nothing Found</h2>
	<p>Sorry, no posts matched your criteria.</p>
	</div>
	
 	<?php
		endif;
	?>  
	 </div> <!--end box_medium-->   

	            	 <?php get_sidebar(); ?>  
	            </div><!--end wrapper-->
<?php get_footer();  ?>

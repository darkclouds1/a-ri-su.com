<?php
/*
Template Name: Blog
*/
global $more, $k_options; 
get_header(); 


$negative_cats = preg_replace("!(\d)+!","-${0}$0", $k_options['blog']['blog_cat_final']);
$query_string = "cat=".$negative_cats."&paged=$paged";
query_posts($query_string);

?>				
		<?php  // twitter display
		if($k_options['blog']['twitteractive']){
		$feed = twitter_feed($k_options['blog']['twitter_user'],$k_options['blog']['twitter_fallback'],true); ?>
	            <div class="additional_info ie6fix" id='twitterbox'>
	            	<?php echo $feed[0]; ?>
				<h2><?php echo $feed[1]; ?></h2>
	            </div>
		<?php } ?>
 
	<div id="main">  
	    <div class="wrapper">
	    	<div class='box box_medium box1'>
		<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post();
		$more = 0;
		$width = '600';
		$lightbox = array('','');
		$frontpage_image = get_post_meta($post->ID, "frontpage-image", true);
		if($frontpage_image != "") $size = @getimagesize($frontpage_image);
		
		if($frontpage_image != "" && ($size[0]  > $width || !isset($size[0])))
		{	
			$lightbox[0] ='<a href="'.$frontpage_image.'" rel="lightbox" title="">'; 
			$lightbox[1] ='</a>'; 
		
			if($k_options['general']['tim'] == 1){
			$resizepath = get_bloginfo('template_url')."/timthumb.php?src="; #timthumb path	
			$resize_options1 = "&amp;w=$width&amp;h=$height&amp;zc=1";
			
			$frontpage_image = $resizepath.$frontpage_image.$resize_options1;
			}

		}
		?>
		
	           <div class='entry'>
	           <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	            <div class="entry-head">
               <span class="categories"><?php the_category(', ') ?></span>&bull;<span class="date">on <?php the_time('F jS, Y') ?></span>&bull;<span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php edit_post_link('Edit', ' ,', ''); ?></span>
           </div>

	           <?php 
				if($frontpage_image != "") echo $lightbox[0].'<img class="item" src="'.$frontpage_image.'" alt="" />'.$lightbox[1];
	           	the_content('read more'); 
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

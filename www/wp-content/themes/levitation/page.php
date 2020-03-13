<?php 
global $k_options;
if ($post->ID == $k_options['contact']['contact_page']) $contactpage = true;
if ($post->ID == $k_options['blog']['blog_page']) $blogpage = true;

if(isset($k_options['portfolio']['matrix_slider_port_final']) && $k_options['portfolio']['matrix_slider_port_final'] != ''){
	foreach($k_options['portfolio']['matrix_slider_port_final'] as $key => $value)
	{
		if ($post->ID == $key)
		{	
			$portfoliopage = true;
		} 
	}
}

if($contactpage)
{
	include(TEMPLATEPATH."/template_contact.php");
}
else if($blogpage)
{
	include(TEMPLATEPATH."/template_blog.php");
}
else if($portfoliopage)
{
	include(TEMPLATEPATH."/template_portfolio.php");
}else{

 get_header(); 
 $teaser = get_post_meta($post->ID, "teaser", true);
 if($teaser != ""){ ?>
 	<div class="additional_info">
	    <h2><?php echo $teaser; ?></h2>
	</div>
<?php } ?>

	<div id="main">  
	    <div class="wrapper">
	    	<div class='box box_medium box1'>
		<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post();
		$width = '600';
		$lightbox = array('','');
		$frontpage_image = get_post_meta($post->ID, "frontpage-image", true);
		if($frontpage_image != "") $size = @getimagesize($frontpage_image);
		
		if($frontpage_image != "" && ($size[0]  > $width || !isset($size[0])) )
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
	           
	           <?php 
				if($frontpage_image != "") echo $lightbox[0].'<img class="item" src="'.$frontpage_image.'" alt="" />'.$lightbox[1];
	           the_content(); ?>
	      		</div> <!--end entry-->			
		<?php			
		endwhile; 
		endif;
	?>  
	 </div> <!--end box_medium-->   


	            	
								
								

	            	
	            	 <?php get_sidebar(); ?>  
	            </div><!--end wrapper-->
<?php get_footer(); } ?>
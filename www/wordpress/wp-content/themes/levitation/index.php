<?php 
global $k_options; 
get_header(); 
?>

            <div id="featured"> 	            
  
	            
            <?php
            # Here starts the code for the Mainpage Image Slider
            #Basic query: how many posts do you want to display and which categories should be displayed
            if($k_options['mainpage']['frontpage_image_count']){$mycount = $k_options['mainpage']['frontpage_image_count']; }else{$mycount = 5;}
			$query_string .= "&showposts=$mycount";
			$query_string .= "&cat=".$k_options['mainpage']['slider_cat_final'];
			query_posts($query_string);
			
			$firstitem = "featured_alternate_active";
			
			// IMAGE SLIDER BIGPIC
			
			if($k_options['mainpage']['whichslider'] == 2)
			{	
				//picture dimesnions
				$height = '390';
				$width = '940';
				
				if (have_posts()) : while (have_posts()) : the_post(); 
			
				$frontpage_image = get_post_meta($post->ID, "frontpage-image", true);
				$link = get_post_meta($post->ID, "frontpage-link", true);
				if($frontpage_image != "") $size = @getimagesize($frontpage_image);
				
				if($frontpage_image != "" && $k_options['general']['tim'] == 1 && ($size[0]  > $width || $size[1]  > $height || !isset($size[0])))
					{
						$resizepath = get_bloginfo('template_url')."/timthumb.php?src="; #timthumb path	
						$resize_options1 = "&amp;w=$width&amp;h=$height&amp;zc=1";
					
						$frontpage_image = $resizepath.$frontpage_image.$resize_options1;
					}
				
				if($link =='')
				{
					$link = get_permalink();	
				}
				
				echo'<a href="'.$link.'" class="featured_alternate '.$firstitem .'" ><img src="'.$frontpage_image.'" alt="" /></a>';
		        $firstitem ='';
		        endwhile; endif;   	
		           	
	        }
	        else
	        {   	
	           	
				// IMAGE SLIDER LEVITATION
				$counter = 0;
				if (have_posts()) : while (have_posts()) : the_post(); $counter++ ; endwhile; endif;
				
				$add_classes = array();
				$classes = array('featured_item_active','featured_item_upcoming','featured3','featured4','featured_item_last');
				if ($counter <= 4)
				{
					for($i = 1; $i < $counter+1; $i++)
					{
						switch ($i) {
						case 1:
						    $add_classes[1] = $classes[0]; break;
						case 2:
						    $add_classes[2] = $classes[1]; break;
						case $counter:
						    $add_classes[$i] = $classes[4]; break;
						default:
						    $add_classes[$i] = ''; break;
						}
					}
				}
				
				
				if ($counter >= 5)
				{
					for($i = 1; $i < $counter+1; $i++)
					{
						switch ($i) {
						case 1:
						    $add_classes[1] = $classes[0]; break;
						case 2:
						    $add_classes[2] = $classes[1]; break;
						case 3:
						    $add_classes[3] = $classes[2]; break;
						case $counter-1:
						    $add_classes[$i] = $classes[3]; break;
						case $counter:
						    $add_classes[$i] = $classes[4]; break;
						default:
						    $add_classes[$i] = ''; break;
						}
						
					
					}
				}
		
				$loopcounter = 1;
				$height = '300';
				$width = '600';
				
				if (have_posts()) : 
					while (have_posts()) : the_post(); 
					$frontpage_image = get_post_meta($post->ID, "frontpage-image", true);
					$link = get_permalink();
					if($frontpage_image != "") $size = @getimagesize($frontpage_image);
					
					if($frontpage_image != "" && $k_options['general']['tim'] == 1 && ($size[0]  > $width || $size[1]  > $height || !isset($size[0])))
					{
						$resizepath = get_bloginfo('template_url')."/timthumb.php?src="; #timthumb path	
						$resize_options1 = "&amp;w=$width&amp;h=$height&amp;zc=1";
					
						$frontpage_image = $resizepath.$frontpage_image.$resize_options1;
					}
					$skin = $k_options['general']['whichdesign'] != "" ? $k_options['general']['whichdesign'] : 1;
					
					echo'<div class="featured_item '.$add_classes[$loopcounter].'">';
		            echo'<img class="item" src="'.$frontpage_image.'" alt="" />';
		            echo'<img class="item_shadow" src="'.get_bloginfo('template_url').'/images/skin'.$skin.'/shadow.png" alt="" />';
		            echo'</div>';
					$loopcounter ++;
	            	endwhile; 
					endif;
			}
			// END IMAGE SLIDER
            ?> 
            </div><!-- end featured-->
            
            
	            <div class="additional_info">
	            	<h2><?php echo $k_options['mainpage']['teaser']; ?></h2>
	            	<?php if($k_options['mainpage']['button']) {$link = get_permalink($k_options['mainpage']['button']); }else{$link = '#';}?>
	            	
	            </div>
	            
   			<div id="main">     
	            <div class="wrapper">
	            <div class='box box_medium box1'>
	            	<div class='entry'>
	            	<?php 
	            	if($k_options['mainpage']['maincontent']){$maincontent = $k_options['mainpage']['maincontent']; }else{$maincontent = 2;}
	            	$maincontent = "showposts=1&page_id=$maincontent";
	            	query_posts($maincontent); 
	            	if (have_posts()) : 
					while (have_posts()) : the_post();
					$more = 0;
					?>
					<h3><?php the_title(); ?></h3>
						<?php the_content("read more",false);
					
					endwhile; 
					endif;
	            	?>
	            	

	            	</div> <!--end entry-->
	            	</div> <!--end box_medium-->
	            	
	            	<div class='box box_small box3'>
	            	<div class='widget'>
	            	
	            	<?php 
	            	$latest_posts = new kriesi_list_post_items;
	            	$latest_posts->recent_posts('Aktuelles');
	            	?>
					</div>
	            	</div> <!--end box_small-->
	            </div><!--end wrapper-->
      	 <?php 

      	 	
      	 	#start of main content boxes
      	 	$runs = 3;
      	 	
			echo '<div class="wrapper">'."\n";
			
			for($counter = 1; $counter <= $runs; $counter++)
			{
      	 		switch($k_options['mainpage']['box'.$counter.'_content'])
      	 		{
      	 		case 'post':
      	 		$query_string = "&showposts=1";
      	 		$offset = 0;
      	 		#calculate offset
      	 		if($counter > 1)
      	 		{
      	 			for($i = 1; $i < $counter; $i++)
      	 			{
      	 				if($k_options['mainpage']['box'.$i.'_content'] == $k_options['mainpage']['box'.$counter.'_content'])
      	 				{
      	 					if($k_options['mainpage']['box'.$i.'_content_post'] == $k_options['mainpage']['box'.$counter.'_content_post'] )
      	 					{
      	 					$offset++;
      	 					}
      	 				}
      	 			}
      	 		}
      	 		
      	 		$query_string .= "&offset=".$offset.".&cat=".$k_options['mainpage']['box'.$counter.'_content_post'];
      	 		query_posts($query_string);
      	 		
    	  		 	if (have_posts()) : 
						while (have_posts()) : the_post(); 
						$link = get_permalink();
						$more = 0;
						
						
						echo'<div class="box_small box box'.$counter.'">'."\n";
						echo'<h3><a href="'.$link.'">'.get_the_title().'</a></h3>'."\n";
						the_content('read more &raquo;');
						echo'</div><!--end box_small-->'."\n";
						endwhile; 
					endif; 
      	 		break;
      	 		
      	 		case 'page':
      	 		$query_string = "page_id=".$k_options['mainpage']['box'.$counter.'_content_page'];
      	 		query_posts($query_string);
      	 		
      	 		if (have_posts()) : 
						while (have_posts()) : the_post(); 
						$link = get_permalink();
						$more = 0;
						
						
						echo'<div class="box_small box box'.$counter.'">'."\n";
						echo'<h3><a href="'.$link.'">'.get_the_title().'</a></h3>'."\n";
						the_content('read more &raquo;');
						echo'</div><!--end box_small-->'."\n";
						endwhile; 
					endif; 
      	 		
      	 		break;
      	 		
      	 		case 'widget':
      	 		if (function_exists('dynamic_sidebar') && dynamic_sidebar('Frontpage Box'.$counter)){}
      	 		break;
      	 		default:
      	 		apply_placeholder($counter);
      	 		}
			}
		
			echo'</div><!-- end wrapper-->';
			
			function apply_placeholder($column)
			{	
				$themeurl = get_bloginfo('template_url');
				
				if($column == 1)
				{
				echo '
<div class="box_small box box1">
<h3>Visit a ri su!</h3>
<p>a ri su</p>
<p>Additionally all PSD files that where used to create this theme are included.</p>
<p><img alt="front1" src="'.$themeurl.'/files/block1.png" title="front1" class="alignnone size-full wp-image-16"/></p>
</div>';
				}
				
				if($column == 2)
				{
				echo'
<div class="box_small box box2">
<h3>Works everywhere</h3>
<p>This theme works fine under Windows, Linux and Mac OSX.</p>
<p>It was coded with web standards in mind and tested in multiple browsers, among them Internet Explorer 6,7 and 8, Firefox, Opera, Google Chrome and Safari.</p>
<p><img alt="front2" src="'.$themeurl.'/files/block2.png" title="front2" class="alignnone size-full wp-image-17"/></p>
</div>				';
				}
				
				if($column == 3)
				{
				echo'
<div class="box_small box box3">
<h3><a href="http://www.kriesi.at/demos/twicet/jquery-improved-theme/">jQuery improved</a></h3>
<p>Levitation uses jQuery</p>
<p>scripts are easy</p>
<p><img  alt="front3" src="'.$themeurl.'/files/block3.png" title="front3" class="alignnone size-full wp-image-18"/></p>
</div>				';
				}
			}
      	 ?>
          
          
          
          
          	
            
            
            

            
            
          
          
<?php get_footer(); ?>

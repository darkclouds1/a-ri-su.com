<?php
/*
Template Name: Portfolio
*/

global $k_options;

get_header();
 $teaser = get_post_meta($post->ID, "teaser", true);
 if($teaser != ""){ ?>
 	<div class="additional_info">
	    <h2><?php echo $teaser; ?></h2>
	</div>
<?php } 


$more = 0;
$posts_per_page = $k_options['portfolio']['portfolio_entry_count'];
$query_string ="posts_per_page=".$posts_per_page;
$query_string .= "&cat=".$k_options['portfolio']['matrix_slider_port_final'][$post->ID]."&paged=$paged";

query_posts($query_string);

echo '<div id="main"> ';
$boxnumber = 1;
if (have_posts()) : while (have_posts()) : the_post();
			$portfolio_image = get_post_meta($post->ID, "frontpage-image", true);	
			$portfolio_image_small= get_post_meta($post->ID, "frontpage-image-small", true);
			
			if($portfolio_image != "" && $k_options['general']['tim'] == 1)
			{
				$resizepath = get_bloginfo('template_url')."/timthumb.php?src="; #timthumb path	
				$resize_options1 = "&amp;w=280&amp;h=140&amp;zc=1";
				
				$portfolio_image_small = $resizepath.$portfolio_image.$resize_options1;
			}
			
			if($portfolio_image_small != ""){
			
				if ($boxnumber == 1) echo '<div class="wrapper">'; ?>
           
          		<div class="portfoliobox box_small box box<?php echo $boxnumber; ?>">
           		<h3 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h3>
           <?php 
           echo '<a href="'.$portfolio_image.'" rel="lightbox[portfolio]"><img class="aligncenter" src="'.$portfolio_image_small.'" alt="" /></a>';
           
           ?>
 			</div><!--end box_small-->
 			
           <?php if ($boxnumber == 3) echo '</div>'; ?>
           	<?php 
           $boxnumber = $boxnumber == 3 ? '1' : $boxnumber + 1;
           }
           	endwhile; 
           	echo"<div class='entry'>";
           	kriesi_pagination($query_string);
           	echo'</div>';
           	else: ?>
	<div class="entry">
	<h2>Nothing Found</h2>
	<p>Sorry, no posts matched your criteria.</p>
	</div>
	
<!--do not delete-->
<?php endif; 
if($boxnumber != 1){
echo '</div>';
}

	                   
get_footer(); ?>
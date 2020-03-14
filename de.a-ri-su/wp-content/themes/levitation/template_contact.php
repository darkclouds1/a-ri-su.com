<?php
/*
Template Name: Contact Form
*/
global $k_options;
$name_of_your_site = get_option('blogname');
$email_adress_reciever = $k_options['contact']['contact_mail'] != "" ? $k_options['contact']['contact_mail'] : get_option('admin_email');
$error = true;
if(isset($_POST['Send']))
{
	include('send.php');	
}


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
							?>
							
						           <div class='entry'>
						           <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						           <?php the_content(); ?>
						           
		<form action="" method="post" class="ajax_form">
			<fieldset><?php if (!isset($error) || $error == true){ ?><h3><span>Send us a mail</span></h3>
			
			<p class="<?php if (isset($the_nameclass)) echo $the_nameclass; ?>" ><input name="yourname" class="text_input empty" type="text" id="name" size="20" value='<?php if (isset($the_name)) echo $the_name?>'/><label for="name">Your Name*</label>
			</p>
			<p class="<?php if (isset($the_emailclass)) echo $the_emailclass; ?>" ><input name="email" class="text_input email" type="text" id="email" size="20" value='<?php if (isset($the_email)) echo $the_email ?>' /><label for="email">E-Mail*</label></p>
			<p><input name="website" class="text_input" type="text" id="website" size="20" value="<?php if (isset($the_website))  echo $the_website?>"/><label for="website">Website</label></p>
			<label for="message" class="blocklabel">Your Message*</label>
			<p class="<?php if (isset($the_messageclass)) echo $the_messageclass; ?>"><textarea name="message" class="text_area empty" cols="40" rows="7" id="message" ><?php  if (isset($the_message)) echo $the_message ?></textarea></p>
			
			
			<p>
			<input type="hidden" id="myemail" name="myemail" value="<?php echo $email_adress_reciever; ?>" />
			<input type="hidden" id="myblogname" name="myblogname" value="<?php echo $name_of_your_site; ?>" />
			
			<input name="Send" type="submit" value="Send" class="button" id="send" size="16"/></p>
			<?php } else { ?> 
			<p><h3>Your message has been sent!</h3> Thank you!</p>
			
			<?php } ?>
			</fieldset>
			
			</form> 
						      		</div> <!--end entry-->			
							<?php			
							endwhile; 
							endif;
						?>  
						 </div> <!--end box_medium-->   

	            	 <?php get_sidebar(); ?>  
	            </div><!--end wrapper-->
<?php get_footer();  ?>
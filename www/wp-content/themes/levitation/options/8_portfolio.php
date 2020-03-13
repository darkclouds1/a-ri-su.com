<?php
global $k_options;
##############
#edit Option name:
$optionname = "portfolio";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$k_options[$optionname] = get_option($saved_optionname);



############ Adding to the menu - always do this!
function options_portfolio() 
{	
	global $top_level_basename, $optionpage_name;
  	$optionpage_top_level = get_current_theme()." Options";
  	$optionpage_name ="Portfolio Options";

  	add_submenu_page($top_level_basename, $optionpage_name, $optionpage_name, 7, basename(__FILE__), 'k_generate_portfolio');
  
  
  	
  	#options###########################
}
add_action('admin_menu', 'options_portfolio');


############ Adding styles and script to the menu page - only do when we are on this page

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function k_generate_portfolio()
{		
	$optionname = "portfolio";
	$saved_optionname = get_current_theme()."_".$optionname;
	$options = $newoptions  = get_option($saved_optionname);
	//reset update_option($saved_optionname, "");
	if ( $_POST['save_my_options'] ) 
	{	
		//update_option($saved_optionname, "");
		foreach ($_POST as $key => $value)
		{	
			
			$newoptions[$key] = stripslashes($value); 


			//multiple cat "final" builder
			if (preg_match("/(\w+)(hidden)$/", $key, $result))
			{
				$loops = $newoptions[$key];
				$newoptions[$key] = 0;
				$final =  $result[1].'final';
				$newoptions[$final] = "";
				for($i = 0; $i < $loops; $i++)
				{
					$name = $result[1].$i;
					$newoptions[$name] = stripslashes($_POST[$name]);
					if($newoptions[$name] != "")
					{
						$newoptions[$key]++;
						
						$newoptions[$final] .= $newoptions[$name];
						if($i+2 < $loops)
						{
							$newoptions[$final] .=", ";
						}
					}		
				}
				$newoptions[$key]++;
			}
			
			if (preg_match("/^(matrix_)(page_)(\w+)(\d+)/", $key, $result))
			{
				$final_field_matrix = $result[1].$result[3].'final';
			}
			
		}
		
		//matrix divider
		unset($newoptions[$final_field_matrix]);
		
		$save_matrix_count = 0;
		foreach ($newoptions as $key => $value) //check all fields
		{	
			if($save_matrix_count < $_POST['super_matrix_count']) // dont save fields that are to high
			{
				if (preg_match("/^(matrix_)(page_)(\w+)(\d+)/", $key, $result))
				{				
					foreach ($newoptions as $key2 => $value2)
					{	
						if (preg_match("/^(matrix_)(".$result[3].")(".$result[4].")_final/", $key2, $result2))
						{
							$newoptions[$final_field_matrix][$value] = $value2;
							$save_matrix_count++;
						}
					}		
				}
			}
		} 	
	}
		
	if ( $options != $newoptions ) 
	{
		$options = $newoptions;
		update_option($saved_optionname, $options);
	}
	
	if($options)
	{
		foreach ($options as $key => $value)
		{
			$options[$key] = empty($options[$key]) ? false : $options[$key];
		}
	}
?>




<div class="wrap">
<h2>Portfolio Options</h2>

<form method="post" action="">

<table class="widefat kriesi_options">
<thead><tr><th>&nbsp;</th><th>&nbsp;</th></tr></thead>

<tr valign="top" >
  <th scope="row">Levitation Portfolio</th>
  <td>
How many items do you want to display per page? (default is 9)<br/>
<input name="portfolio_entry_count" type="text" id="portfolio_entry_count" value="<?php if ($options['portfolio_entry_count']){echo $options['portfolio_entry_count'];}else{echo"9";}?>" size="4" maxlength="4" />  
 <br/>
</td>
</tr>
<tfoot><tr><th>&nbsp;</th><th>&nbsp;</th></tr></tfoot>
</table>

<!-- //multiple portfolios -->
<div class='multitables'>
<?php 
if ($options['super_matrix_count'] == "")
{
	$options['super_matrix_count'] = 1;
}
?>
<input name="super_matrix_count" class="super_matrix_count" type="hidden" value="<?php echo $options['super_matrix_count'] ?>" />
<?php 
$count = $options['super_matrix_count'] +1;
for($z = 0; $z < $count; $z++){
?>

<table class="widefat kriesi_options multitable <?php if ($z+1 == $count) echo 'hidden clone_me';?>">
<thead><tr><th>
<?php if ($z != 0){ ?>
<a href='#' class='del_table' id='del_number_<?php echo $z + 1; ?>' >Delete this Portfolio</a>
<?php } ?>
</th><th>&nbsp;</th></tr></thead><tbody>
<tr valign="top">
  <th scope="row"> Portfolio Page <span class='changenumber'><?php echo $z+1; ?></span></th>
  <td>
  Select a Page to display Portfolio <span class='changenumber'><?php echo $z+1; ?></span> <br/>
<select class="postform" id="matrix_page_slider_port_<?php echo $z; ?>" name="matrix_page_slider_port_<?php echo $z; ?>"> 
<option value="">Select Page</option>  
<?php 
	$pages = get_pages('title_li=&orderby=name');
	foreach ($pages as $page){
		
		if ($options['matrix_page_slider_port_'.$z] == $page->ID && $z+1 != $count){
		$selected = "selected='selected'";	
			}else{
		$selected = "";		
		}
		echo"<option $selected value='". $page->ID."'>". $page->post_title."</option>";
		}
?>
</select><br/><br/>
Select Categories to display in Portfolio <span class='changenumber'><?php echo $z+1; ?></span> <br/>
<div class="multiple_box">
<noscript>ATTENTION: JAVASCRIPT IS DISABLED, THIS CAN BREAK THE MULTIPLE CATEGORY OPTION<br/></noscript>
<?php

if(($options['matrix_slider_port_'.$z.'_hidden'] == "" || $options['matrix_slider_port_'.$z.'_hidden'] == false || $z+1 == $count)) 
	{
		$options['matrix_slider_port_'.$z.'_hidden'] = 1;
	}
	
for($i = 0; $i < $options['matrix_slider_port_'.$z.'_hidden']; $i++)
{ ?>
	

<select class="postform multiply_me" id="matrix_slider_port_<?php echo $z; ?>_<?php echo $i; ?>" name="matrix_slider_port_<?php echo $z; ?>_<?php echo $i; ?>"> 
<option value="">Select additional category?</option>  
<?php 
	$categories = get_categories('title_li=&orderby=name');
	foreach ($categories as $category){
		
		if ($options['matrix_slider_port_'.$z.'_'.$i] == $category->term_id && $z+1 != $count){
		$selected = "selected='selected'";	
			}else{
		$selected = "";		
		}
		echo"<option $selected value='". $category->term_id."'>". $category->name."</option>";
		}
?>
</select> 
    
    
    
<?php } ?>
<input name="matrix_slider_port_<?php echo $z; ?>_hidden" class="matrix_slider_port_<?php echo $z; ?>_hidden" type="hidden" value="<?php echo $options['matrix_slider_port_'.$z.'_hidden'] ?>" />
</div>


<br/>
</td></tr></tbody>
<tfoot><tr><th><a href='#' class='add_table' id='number_<?php echo $z + 1; ?>' >Add another Portfolio</a></th><th>&nbsp;</th></tr></tfoot>
</table>
<?php } ?>

</div>
<?php // end multiple portfolios ?>
<p class="submit">
<input id="kriesi_options" type="hidden" value="1" name="save_my_options"/>
<input type="submit" name="Submit" value="Save Changes" /></p>

</form>
<?php
if(isset($_GET['debug'])){
	echo"<pre>";
		print_r($options);
	echo"</pre>";
}

?>
</div>

<?php
}
?>
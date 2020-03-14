<?php
global $k_options;
##############
#edit Option name:
$optionname = "general";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$k_options[$optionname] = get_option($saved_optionname);

function admin_top_level()
{
	global $top_level_basename;
	$top_level_basename = basename(__FILE__);
	$optionpage_top_level = get_current_theme()." Options";

	add_menu_page($optionpage_top_level, $optionpage_top_level, 7, basename(__FILE__), 'k_generate');
}

add_action('admin_menu', 'admin_top_level');

function admin_head_addition() 
{	
	$current_folder = preg_replace("!".TEMPLATEPATH."!","", dirname(__FILE__));
	
	$admin_stylesheet_url = get_bloginfo('template_url').$current_folder.'/admin.css';
	echo '<link rel="stylesheet" href="'. $admin_stylesheet_url . '" type="text/css" />';
	
	$admin_js_url = get_bloginfo('template_url').$current_folder.'/supporting_scripts.js';
	echo '<script type="text/javascript" src="'.$admin_js_url.'"></script>';	
}

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function k_generate()
{	
	$optionname = "general";
	$saved_optionname = get_current_theme()."_".$optionname;			
	$options = $newoptions  = get_option($saved_optionname);

	if ( $_POST['save_my_options'] ) 
	{
		foreach ($_POST as $key => $value)
		{	
			$newoptions[$key] = stripslashes($value); 
			
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
<h2><?php echo $optionpage_top_level; ?></h2>

<form method="post" action="">

<table class="widefat kriesi_options">
<thead><tr><th>&nbsp;</th><th>&nbsp;</th></tr></thead>
<tr valign="top">
  <th scope="row">Levitation Design</th>
  <td>
    <label><input type="radio" name="whichdesign" id="whichdesign" value="1" <?php if ($options['whichdesign'] == 1 || $options['whichdesign'] == false){echo "checked = checked";}?> /> Design 1 - Levitation White</label><br/>
    <label><input type="radio" name="whichdesign" id="whichdesign2" value="2" <?php if ($options['whichdesign'] == 2){echo "checked = checked";}?>/> Design 2 - Levitation Dark Grey</label><br/>
    <label><input type="radio" name="whichdesign" id="whichdesign3" value="3" <?php if ($options['whichdesign'] == 3){echo "checked = checked";}?>/> Design 3 - Levitation Light Grey</label><br/>
    <label><input type="radio" name="whichdesign" id="whichdesign4" value="4" <?php if ($options['whichdesign'] == 4){echo "checked = checked";}?>/> Design 4 - Levitation Tan</label><br/>

   <br/></td>
</tr>

<tr valign="top" class='alternate'>
  <th scope="row">Levitation Automatic Image scaling </th>
  <td>
  <strong>Should the images be scaled automaticaly?</strong>
 <br/>
	<?php
if (function_exists("gd_info")){
	
$path = TEMPLATEPATH."/cache/";

if (!is_writeable($path))
{
	echo "Your server supports automatic resizing for your portfolio and Frontpage pictures, however the folder 'cache' ($path) is not writable for the resizing script<br/>
	To make this feature work you have to set the folder permission to 777 (write for everyone)<br/><br/>";
	}else{
		
	?>
    (A script will automatically resize the frontpage and portfolio images and generate thumbnails for you when needed)
    <br/>
    <label><input type="radio" name="tim" id="tim" value="1" <?php if ($options['tim'] == 1){echo "checked = checked";}?> /> Auto Scaling on </label><br/>
	<label><input type="radio" name="tim" id="tim" value="" <?php if ($options['tim'] == false){echo "checked = checked";}?> /> Auto Scaling off</label><br/>
		<br/>
	<?php 
	}
	
}else{
	?>
    Sorry your server does not support automatic resizing, because gd library is not installed. <br/>Please contact the server administrator to install it, meanwhile you have to enter the different image sizes by hand.<br/><br/>
    <input type="hidden" name="tim" id="tim" value="" /> 
   <?php
}
?>
    </td>
</tr>

<tr valign="top">
<th scope="row"><label for="com_page">Page Navigation</label></th>
<td>

<input name="com_page" type="text" id="com_page" value="<?php if ($options['com_page']){echo $options['com_page'];}?>" size="70" maxlength="255" /><br/>
	Enter the query string of the pages you want to display in the main menu (top left corner of the page)<br/>
    If left empty it will display all pages<br/>
    Some Examples:<br/>
    <strong>include=9,16,22,24,33</strong> (this would display 5 menu items for the pages with the id 9, 16, 22, 24, 33)<br/>
    <strong>exclude=2,6,12</strong> (this would display menu itemsfor all pages except those with id 2, 6, 12)<br/><br/><br/>
</td>
</tr>


<tr class='alternate'>
  <th scope="row">Extra Widget Areas for specific Pages</th>
  <td>Here you can add widget areas for single pages. that way you can put different content for each page into your sidebar.<br/>
  After you have choosen the Pages press the "Save Changes" button and then start adding widgets to your <a href='widgets.php'>new widget areas here.</a>
  <br/><br/>
  	  <strong>Attention when removing areas:</strong> You have to be carefull when deleting widget areas that are not the last one in the list. It is recommended to avoid this. If you want to know more about this topic please read the documentation that comes with this theme.
 <br/>

<div class="multiple_box">
<noscript>ATTENTION: JAVASCRIPT IS DISABLED, THIS CAN BREAK THE MULTIPLE CATEGORY OPTION<br/></noscript>
<?php

if($options['multi_widget_hidden'] == "" || $options['multi_widget_hidden'] == false) 
	{
		$options['multi_widget_hidden'] = 1;
	}
	
for($i = 0; $i < $options['multi_widget_hidden']; $i++)
{?>


<select class="postform multiply_me disable_me" id="multi_widget_<?php echo $i; ?>" name="multi_widget_<?php echo $i; ?>"> 
<option value="">Select Page</option>  
<?php 
	$pages = get_pages('title_li=&orderby=name');
	foreach ($pages as $page){
		
		if ($options['multi_widget_'.$i] == $page->ID){
		$selected = "selected='selected'";	
			}else{
		$selected = "";		
		}
		echo"<option $selected value='". $page->ID."'>". $page->post_title."</option>";
		}
?>
</select>
<?php } ?>
<input name="multi_widget_hidden" class="multi_widget_hidden" type="hidden" value="<?php echo $options['multi_widget_hidden'] ?>" />
</div>

<br/> </td>
</tr>



<tr valign="top">
<th scope="row"><label for="google_analytics">Google analytics tracking code</label></th>
<td>
<textarea class="code" style="width: 98%; font-size: 12px;" id="google_analytics" rows="10" cols="60" name="google_analytics">
<?php if ($options['google_analytics']){echo $options['google_analytics'];}?>
</textarea>
	Enter your analtics tracking code here
</td>
</tr>


<tfoot><tr><th>&nbsp;</th><th>&nbsp;</th></tr></tfoot>
</table>

<p class="submit">
<input id="save_my_options" type="hidden" value="1" name="save_my_options"/>
<input type="submit" name="Submit" value="Save Changes" /></p>

</form>

</div>
<?php
}

?>
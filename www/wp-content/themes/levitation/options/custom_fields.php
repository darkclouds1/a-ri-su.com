<?php 

global $fields, $fieldsname;

$fields[0]= "teaser";
$fields[1]= "frontpage-image";
$fields[2]= "frontpage-image-small";
$fields[3]= "frontpage-link";

$fieldsname[0]= "Teaser Text below the menu";
$fieldsname[1]= "Image for Slider/Portfolio Full Size";
$fieldsname[2]= "Portfolio Thumbnail";
$fieldsname[3]= "Bigpicture link";

function kriesi_create_form(){
global $fields, $fieldsname;
$loop = count($fields);

if(isset($_GET['post'])){
$post_id = $_GET['post'];
}
global $k_options;
?>

<div class="jquery_move">
<div class="postbox koption" id="projektsdiv">
<div title="Click to toggle" class="handlediv"></div>
<h3 class"hndle">Levitation Options Panel</h3>
<div class="inside">

<?php 

for ($i=0; $i<$loop; $i++){
	if ($post_id != "")
	{
		$current_field = $fields[$i];
		$value = get_post_meta($post_id, $current_field, true);
	}
	
	if($k_options['general']['tim'] == 1 && ($i == 2 ) || ($k_options['mainpage']['whichslider'] != 2 && ($i == 3 )))
	{
		$hide = "displaynone";
	}else{
		$hide = "";	
	}
	
	
	if($i == 5)
	{
		if($value != "") {$checked = "checked='checked'";}
		echo "<br/><p class='extra_$i $hide'><label for='".$fields[$i]."'>".$fieldsname[$i].": </label><input id='".$fields[$i]."' name='".$fields[$i]."' type='checkbox' value=1 $checked ></p>";
	}
	else
	{
	echo "<p class='extra_$i $hide'><label for='".$fields[$i]."'>".$fieldsname[$i].": </label><input id='".$fields[$i]."' name='".$fields[$i]."' type='text' value='$value'></p>";
	}
	
} ?>

<?php
echo"<p><strong>For the Images enter a URL that links to an image (eg: http://www.yourdomain/yourimage1.jpg)</strong></p>";
if($k_options['general']['tim'] == 1){
	echo"<p>You have turned image rescaling on, images you enter here will be rescaled to fit the appropriate areas. (this works for portfolio thumbnails and front page slider thumbnails) <br/> </p>
	<p>If you want to enter all images by hand then turn rescaling off, this text will disapear and instead there will be more input fields for small images<br/><br/></p>";
	}
?>
</div></div></div>




<?php }
	
function kriesi_save_data($post_id){
global $fields;
$loop = count($fields);

	for ($i=0; $i<$loop; $i++){
		$current_field = $fields[$i];
		kriesi_insert_data($current_field, $post_id);		
		}
}

function kriesi_insert_data($current_field, $post_id){
global $fields;
$new_value = $_POST[$current_field];
		$value = get_post_meta($post_id, $current_field, true);
		
		if ($new_value == ""){
					if ($value != ""){
						delete_post_meta($post_id, $current_field, $value);
					}
		
				} else{
					if ($value == ""){
						add_post_meta($post_id, $current_field, $new_value, true);
					}else if ($value != $new_value ){
						update_post_meta($post_id, $current_field, $new_value, $value);	
					}
				}
			}


function kriesi_append_admin_head(){?>
<link rel='stylesheet' href='<?php echo bloginfo('template_url'); ?>/options/admin.css' type='text/css' />
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/options/supporting_scripts.js"></script>
<?php }

if(basename( $_SERVER['PHP_SELF']) == "page.php" || basename( $_SERVER['PHP_SELF']) == "page-new.php" || basename( $_SERVER['PHP_SELF']) == "post-new.php" || basename( $_SERVER['PHP_SELF']) == "post.php"){
add_action('admin_head','kriesi_append_admin_head');
add_action('save_post','kriesi_save_data');
add_action('edit_form_advanced','kriesi_create_form',1);
add_action('edit_page_form','kriesi_create_form',1);
}

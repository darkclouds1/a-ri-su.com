<?php function eighttwenty_admin_head() { 
		echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/library/admin/etm-admin.css" media="screen" />'; ?>
		
<?php wp_enqueue_script('jquery') ?>
<script type="text/javascript">
jQuery(document).ready(function($)
{
    $('#box').hide();
    $('a.trigger').click(function() {
    $(this).parent().next('#box').toggle('slow');

   return false;

    });
});
</script>


<?php }

// Theme options adapted from "A Theme Tip For WordPress Theme Authors"
// http://literalbarrage.org/blog/archives/2007/05/03/a-theme-tip-for-wordpress-theme-authors/

$themename = "Charlene";
$shortname = "etm";
$entry_number = array("Select a number:","1","2","3","4","5");

// Create theme options
   $options = array (
   				
   					array(  "name" => "General",
					        "type" => "heading"),
					    
   				    array(  "type" => "open"),
						    
				    array(	"name" => "SEO",
							"desc" => "Check to deactivate SEO if you are using plugins like All-In-One-SEO-Pack to avoid duplicate Meta Content ",
							"id" => $shortname."_seo_add",
							"std" => "false", 
							"type" => "checkbox",),
					
					array( 	"name" => "Site Keywords",
						    "desc" => "Enter comma separated keywords.",
						    "id" => $shortname."_keywords",
						    "std" => "",
						    "type" => "text", ),
					
					array( 	"name" => "Site Description",
						    "desc" => "Custom Default Meta Description used in home page.",
							"id" => $shortname."_description",
							"std" => "",
							"type" => "textarea",
							"options" => array( "rows" => "3",
											    "cols" => "50",) ),
						
   					array( 	"name" => "Meta Verify",
						    "desc" => "Google Verify Code Perhaps",
							"id" => $shortname."_headerscript",
							"std" => "",
							"type" => "textarea",
							"options" => array( "rows" => "3",
											    "cols" => "50",) ),

   					array( 	"name" => "Favicon",
							"desc" => "Enter the full path to your custom favicon here.",
							"id" => $shortname."_favicon",
							"std" => "",
							"type" => "text", ),

   					array( 	"name" => "Feedburner",
							"desc" => "Enter your Google Feedburner url here.",
							"id" => $shortname."_feedburner",
							"std" => "",
							"type" => "text", ),
						
   					array( 	"name" => "Analytics",
							"desc" => "Enter your Analytics Tracking codes here.",
							"id" => $shortname."_analytics",
							"std" => "",
							"type" => "textarea",
							"options" => array( "rows" => "5",
											    "cols" => "70",) ),									    	
						
   					array(  "type" => "close"),
   					
   					array( 	"name" => "Header",
					    	"type" => "heading"),
					
					array(  "type" => "open" ),
					
					array( 	"name" => "Site Title",
						    "desc" => "Enter custom site title (upper right), defaults to blog name.",
						    "id" => $shortname."_site_title",
						    "std" => "",
						    "type" => "text", ),
					    	
					array( 	"name" => "Header Quote",
							"desc" => "Enter header quote or tagline here (below site title).",
							"id" => $shortname."_quote",
							"std" => "",
							"type" => "textarea",
							"options" => array( "rows" => "5",
											    "cols" => "70",) ),	
					    	
					array(  "type" => "close"),	
					
					array( 	"name" => "Front Page",
					    	"type" => "heading"),
					
					array(  "type" => "open" ),
					    	
					array( 	"name" => "Home Title",
							"desc" => "Enter the home page main title here.",
							"id" => $shortname."_home_title",
							"std" => "",
							"type" => "textarea",
							"options" => array( "rows" => "5",
											    "cols" => "70",) ),
											    
					array( 	"name" => "Intro Paragraph",
							"desc" => "Enter the block of text the appears under the site title here.",
							"id" => $shortname."_descriptive",
							"std" => "",
							"type" => "textarea",
							"options" => array( "rows" => "5",
											    "cols" => "70",) ),
											    
					array(	"name" => "Content Settings",
							"desc" => "Chose to display the_content on home page, defaults to the_excerpt.",
							"id" => $shortname."_post_content",
							"std" => "false", 
							"type" => "checkbox",),
											    
					array(  "type" => "close"),											
   					
   					array( 	"name" => "Footer",
					    	"type" => "heading"),
					    
   					array(  "type" => "open" ),
   					
   					array( 	"name" => "Copyright",
							"desc" => "Enter footer text here. I would of course appreciate a link to http://papertreedesign.com/themes/, but it's your call.",
							"id" => $shortname."_copyright",
							"type" => "textarea",
							"options" => array( "rows" => "5",
											    "cols" => "70",) ),
   					
   					array( "type" => "close"),
   			);


function eighttwenty_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=theme-options.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=theme-options.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", $themename." Options", 'edit_themes', basename(__FILE__), 'eighttwenty_admin');

}


function eighttwenty_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    

    
?>

<div class="wrap_eighttwenty">
<h2 class="theme-title">Charlene Theme Options</h2>
<p>Thanks for taking a chance to try out this theme, I hope you enjoy it. While I am happy with the way things turned out to start, I will be constantly 
   making improvements. Please check out the <a href="http://papertreedesign.com/themes/">theme docs</a> for further information or email me at themesupport@papertreedesign.com.</p>

<form method="post">

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>

<?php foreach ($options as $value) { 
	
	switch ( $value['type'] ) {
	    case 'open';
	    ?>
	    <div id="box">
	    <table class="options_table">
	    
	    <?php break;
	    
	    case 'close';
	    ?>
	    </table>
	    </div>
	    <?php break;
	    
		case 'text':
		?>
		<tr class="options_row"> 
		    <td class="option_title"><?php echo $value['name']; ?>:</td>
		    <td>
		        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; }  ?>" class="textbox" /><br />
			    <p><?php echo $value['desc']; ?></p>
		    </td>
		</tr>
		<?php
		break;
		
		case 'select':
		?>
		<tr class="options_row"> 
	        <td class="option_title"><?php echo $value['name']; ?>:</td>
	        <td>
	            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                <?php foreach ($value['options'] as $option) { ?>
	                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                <?php } ?>
	            </select><br />
	            <p><?php echo $value['desc']; ?></p>
	        </td>
	    </tr>
		<?php
		break;
		
		case 'textarea':
		$ta_options = $value['options'];
		?>
		<tr class="options_row"> 
	        <td class="option_title"><?php echo $value['name']; ?>:</td>
	        <td>
			    
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php 
				if( get_settings($value['id']) != "") {
						echo stripslashes(get_settings($value['id']));
					}else{
						echo $value['std'];
				}?></textarea><br />
				<p><?php echo $value['desc']; ?></p>
	        </td>
	    </tr>
	    <?php break;
	    
	    case "checkbox":
		?>
			<tr class="options_row"> 
		        <td class="option_title"><?php echo $value['name']; ?>:</td>
		        <td>
		           <?php
						if(get_settings($value['id'])){
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
					?>
		            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		            <?php  ?>
			    <p><?php echo $value['desc']; ?></p>
		        </td>
		    </tr>
		<?php
		break;

		case "radio":
		?>
		<tr class="options_row"> 
	        <td class="option_title"><?php echo $value['name']; ?>:</td>
	        <td>
	            <?php foreach ($value['options'] as $key=>$option) { 
				$radio_setting = get_settings($value['id']);
				if($radio_setting != ''){
		    		if ($key == get_settings($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
	            <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
	            <?php } ?>
	        </td>
	    </tr>
	    <?php
		 break;
			
		 case "heading":
         ?>
		   							
		
		    							
		    	<div class="option-head"><h3><?php echo $value['name']; ?></h3> <a href="#" class="trigger">Open Options</a></div>

		<?php
		break;
		
		case "checkbox":
		?>
			<tr class="options_row"> 
		        <td class="option_title"><?php echo $value['name']; ?>:</td>
		        <td>
		           <?php
						if(get_settings($value['id'])){
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
					?>
		            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		            <?php  ?>
			    <p><?php echo $value['desc']; ?></p>
		        </td>
		    </tr>
			<?php
		break;

		default:

		break;
	}
}
?>


<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>



<?php
}

add_action('admin_menu' , 'eighttwenty_add_admin'); 
add_action('admin_head', 'eighttwenty_admin_head');


?>
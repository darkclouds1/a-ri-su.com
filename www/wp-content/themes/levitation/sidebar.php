<?php 
global $kriesi_options;
$themeurl = get_bloginfo('template_url');
function kriesi_small_description($themeurl) 
{
	echo'
	<div class="widget">
            	<h3>Adresse</h3>
                <p>Besuchen Sie uns im Lehel!<br>
Triftstraße 1, 80538 München<br>
Telefon: 089 / 24 24 35 94<br>
E-Mail: info[at]a-ri-su.de
</p>
                           </div><!--end small_box-->';
}

function kriesi_small_description2($themeurl) 
{
	echo'
	<div class="widget">
            	<h3></h3>
                <p></p>
            </div><!--end small_box-->';
}

function kriesi_small_description3($themeurl) 
{
	echo'
	<div class="widget">
            	<h3></h3>
                <p>
</p>            </div>';
}
?>

<div class='box box_small box3' id='sidebar' >
<?php 
if($post->post_parent)
  $children = wp_list_pages("title_li=&sort_column=menu_order&child_of=".$post->post_parent."&echo=0");
  else
  $children = wp_list_pages("title_li=&sort_column=menu_order&child_of=".$post->ID."&echo=0");
  if ($children) { ?>
  <div class="widget widget_pages">
  
  <h3>Sub-Navigation</h3>
  <ul>
  <?php echo $children; ?>
  </ul>
  </div>
  <?php } 
  
  
global $custom_widget_area;
if (function_exists('dynamic_sidebar') && dynamic_sidebar($custom_widget_area) ){

}else{

if (is_page()){ #sidebar used for  pages
  if (function_exists('dynamic_sidebar') && dynamic_sidebar('All Pages') ) : else: ?>
                        <?php 
                        if (!$children) {
                        kriesi_small_description($themeurl); 
                        kriesi_small_description2($themeurl);
                        }
                        ?>
                        
                        
  <?php endif; 
  
  }else{ #sidebar used for blog & archives (category, tag, date, etc)
  
  if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Blog') ) :else: ?>
                        
                        <?php 
                        
                        kriesi_small_description($themeurl);
                        kriesi_small_description3($themeurl); 
                        kriesi_small_description2($themeurl); ?>
                        
                        
<?php endif; } } ?>

</div><!-- end sidebar -->
         
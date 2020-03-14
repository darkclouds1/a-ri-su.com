<div id="secondary"><!--Start secondary-->

<?php eighttwenty_secondary_above(); ?><!-- hook above sidebar content -->

    <div id="left">
        <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('sidebar-main')) { ?>
             <ul id="main-left" class="xoxo">
                  <?php dynamic_sidebar('sidebar-main'); ?>
             </ul>
        <?php } ?> 
    </div>
  
  <?php eighttwenty_secondary_mid(); ?><!-- hook mid widget areas -->
  
    <div id="right">
        <?php if (function_exists('dynamic_sidebar') && is_sidebar_active('sidebar-secondary')) { ?>
				<ul id="main-right" class="xoxo">
					<?php dynamic_sidebar('sidebar-secondary'); ?>
				</ul>
        <?php } ?>
    </div>
    
<?php eighttwenty_secondary_below(); ?><!-- hook below sidebar content -->
  
</div><!-- end #secondary -->
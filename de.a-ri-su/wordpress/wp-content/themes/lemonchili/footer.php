                </div><!-- #content-->                          
                        
                <div id="copyright">
                        <div id="copyright-text" class="small">
                        &copy;
                        <?php $the_year = date("Y"); echo $the_year; ?>
                        
                        <?php
                        if ( of_get_option('gg_copyright') ) {
                                echo(of_get_option('gg_copyright'));
                        } else {
                        ?>
                                
                                <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved.', 'gxg_textdomain') ?>
                        <?php       
                        }
                        ?>                           
                        
                        </div>
                </div><!-- #copyright -->  
	
        </div><!-- #contentwrap-->        

</div><!-- #wrapper -->

</div><!-- #bg-image -->

<?php 
if ( of_get_option('gg_bg_image_custom') && of_get_option('gg_bg_position') == 'stretched' ) {
?>
       <script type="text/javascript">jQuery.backstretch("<?php echo of_get_option('gg_bg_image_custom'); ?>");</script>
<?php
}
?>

<?php wp_footer();  ?>

<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://dalija.de/piwik/" : "http://dalija.de/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 4);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://dalija.de/piwik/piwik.php?idsite=4" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->

</body>

</html>
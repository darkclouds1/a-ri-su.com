</div><!--end main-->
        
	<div id="footer">
	<span class='alignleft'>arisu - moderne koreanische Küche</span>
			
    <span class="alignright">
           
    </span>
    
    </div><!--end footer-->
        
    </div><!--end top-->
<?php wp_footer();
global $k_options; 

if($k_options['general']['google_analytics'])
echo $k_options['general']['google_analytics'];
?>

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
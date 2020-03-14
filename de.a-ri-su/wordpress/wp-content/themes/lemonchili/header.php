<!DOCTYPE html>   
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js"><!--<![endif]-->        
        
        
<!-- BEGIN head -->
<head>
        
        <!-- meta -->
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="language" content="de" /><meta name="content-language" content="de" />
<meta name="robots" content="follow, index" />
<meta name="keywords" content="Arisu, koreanisch Essen, Restaurant, München, Lehel, Korean, Korea, Bibimbap, Kimchi, Bulgogi, Asian, Asiatisch Essen, a-ri-su" />
<meta name="description" content="arisu, das koreanische Restaurant im Lehel, Triftstr. 1, München. Bibimbap & koreanische Spezialitäten." />

	<!-- Mobile Specific Metas -->
	<?php if ( of_get_option('gg_responsive') ) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php } ?>

        <!-- title -->
        <title> <?php wp_title(''); ?> <?php bloginfo('name'); ?></title>

        <!-- stylesheets -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        
        <?php if ( of_get_option('gg_font2') ) {
        ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo urlencode(of_get_option('gg_font2')); ?>:400,700,800,900' rel='stylesheet' type='text/css'>
        <?php
        } elseif ( of_get_option('gg_font') ) {
        ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo urlencode(of_get_option('gg_font')); ?>:400,700,800,900' rel='stylesheet' type='text/css'>
        <?php
        }
        ?>
        
        <!-- Pingbacks -->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <?php
        if ( of_get_option('gg_favicon') ) {
                  ?>
                  <!-- Favicon -->
                  <link rel="shortcut icon" href="<?php echo of_get_option('gg_favicon'); ?>" />
                  <?php                                    
        }
        ?>
         
        <?php
        if ( of_get_option('gg_google_analytics') ) {
                ?>
                <script type="text/javascript">
                <!-- Google Analytics -->
                <?php
                echo of_get_option('gg_google_analytics');  
                ?>
                </script>
                <?php         
        }
        ?>
                
        <!-- Calls Wordpress head functions -->
        <?php wp_head(); ?>                

</head><!-- END head -->


<!-- BEGIN body -->
<body <?php body_class(); ?>>

<?php if (
        of_get_option('gg_phone')
        || of_get_option('gg_address')
        || ( of_get_option('gg_social_pos') == 'top'  &&
                ( of_get_option('gg_instagram')
                or of_get_option('gg_foursquare')
                or of_get_option('gg_twitter')
                or of_get_option('gg_yelp')
                or of_get_option('gg_fb')
                or of_get_option('gg_flickr')
                or of_get_option('gg_pinterest')
                or of_get_option('gg_youtube')
                or of_get_option('gg_googleplus')
                )
        )        
)       
{ ?>


<div id="top-bar">

        <?php
                if ( of_get_option('gg_social_pos') == 'top'  &&
                        ( of_get_option('gg_instagram')
                        or of_get_option('gg_foursquare')
                        or of_get_option('gg_twitter')
                        or of_get_option('gg_yelp')
                        or of_get_option('gg_fb')
                        or of_get_option('gg_flickr')
                        or of_get_option('gg_pinterest')
                        or of_get_option('gg_youtube')
                        or of_get_option('gg_googleplus')
                        )
                )
        { ?>            
        
         <div id="social">
                        <ul id="socialicons">
                                <?php
                                if ( of_get_option('gg_fb') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_fb'); ?>" target="_blank" class="fb" > <i class="fa fa-facebook"></i> </a> </li>                        
                                <?php }
        
                                if ( of_get_option('gg_twitter') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_twitter'); ?>" target="_blank" class="twitter" > <i class="fa fa-twitter"></i> </a> </li>                        
                                <?php }
                                
                                if ( of_get_option('gg_googleplus') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_googleplus'); ?>" target="_blank" class="googleplus" > <i class="fa fa-google-plus"></i> </a> </li>                        
                                <?php }                                 
                                
                                if ( of_get_option('gg_yelp') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_yelp'); ?>" target="_blank" class="yelp" > <i class="icon-yelp"></i> </a> </li>                        
                                <?php }                                        
                                
                                if ( of_get_option('gg_instagram') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_instagram'); ?>" target="_blank" class="instagram" > <i class="fa fa-instagram"></i> </a> </li>                        
                                <?php }                                
                                
                                if ( of_get_option('gg_youtube') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_youtube'); ?>" target="_blank" class="youtube" > <i class="fa fa-youtube"></i> </a> </li>                        
                                <?php }
                                
                                if ( of_get_option('gg_foursquare') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_foursquare'); ?>" target="_blank" class="foursquare" > <i class="fa fa-foursquare"></i> </a> </li>                        
                                <?php }
                                
                                if ( of_get_option('gg_pinterest') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_pinterest'); ?>" target="_blank" class="pinterest" > <i class="fa fa-pinterest"></i> </a> </li>                        
                                <?php }                                 

                                if ( of_get_option('gg_flickr') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_flickr'); ?>" target="_blank" class="flickr" > <i class="fa fa-flickr"></i> </a> </li>                        
                                <?php }
                          
                                ?>
                        </ul>
                </div><!-- .social-->
        <?php } ?>
 
        <div id="topinfo">     
                <ul>
                        <?php
                        //test if mobile device
                        $detect = new Mobile_Detect;

                        if ($detect->isMobile() && of_get_option('gg_phone')  && of_get_option('gg_taptocall') ) { ?>
                                 <li><i class="fa fa-phone"></i>
                                         <a href="tel:<?php echo of_get_option('gg_taptocall'); ?>" class="phonecall"><?php echo of_get_option('gg_phone'); ?></a>
                                 </li>
                        <?php }

                        elseif (of_get_option('gg_phone') ) { ?>
                                <li><i class="fa fa-phone"></i><?php echo of_get_option('gg_phone'); ?> </li>
                        <?php } ?>

                        <?php if (of_get_option('gg_address')  && of_get_option('gg_googlemaps') ) { ?>

                        <li><i class="fa fa-map-marker"></i>
                                <a class="location" href="<?php echo of_get_option('gg_googlemaps'); ?>" target="_blank"> <?php echo of_get_option('gg_address'); ?> </a> 
                        </li>
                        <?php } 

                        elseif (of_get_option('gg_address') ) { ?>
                                <li><i class="fa fa-map-marker"></i><?php echo of_get_option('gg_address'); ?> </li>
                        <?php } ?>

                </ul>                        
        </div>
        
</div>
<?php } ?>





<div id="bg-image">

<div id="wrapper">

        <div id="left">
                
                <?php if ( of_get_option('gg_logo_image') ) {
                ?><div id="logo" class="logo-regular">
                        <a href="<?php echo home_url(); ?>" > <img class="logoimage" alt="<?php bloginfo('name'); ?>" src="<?php echo of_get_option('gg_logo_image'); ?>"   <?php if ( of_get_option('gg_logo_width') ) { ?> width="<?php echo of_get_option('gg_logo_width'); ?>"<?php } ?> <?php if ( of_get_option('gg_logo_height') ) { ?> height="<?php echo of_get_option('gg_logo_height'); ?>"<?php } ?> /> </a>
                </div> <!-- #logo-->
                <?php }

                
                if ( of_get_option('gg_logo_retina') ) {
                ?><div id="logo" class="logo-retina">
                        <a href="<?php echo home_url(); ?>" > <img class="logoimage" alt="<?php bloginfo('name'); ?>" src="<?php echo of_get_option('gg_logo_retina'); ?>"   <?php if ( of_get_option('gg_logo_width') ) { ?> width="<?php echo of_get_option('gg_logo_width'); ?>"<?php } ?> <?php if ( of_get_option('gg_logo_height') ) { ?> height="<?php echo of_get_option('gg_logo_height'); ?>"<?php } ?> /> </a>
                </div> <!-- #logo-->
                <?php }  ?>


                <div id="topnavi">
                <?php
                         wp_nav_menu( array(
                                 'theme_location' => 'main-menu',
                                 'menu_class' => 'sf-menu sf-vertical regular-menu',
                                 'fallback_cb' => 'wp_page_menu',
                                 )
                         );
                ?>                       
        
                <?php
                //test if mobile device
                $detect = new Mobile_Detect;
                
                if ($detect->isMobile() ) {
                        
                         wp_nav_menu_select( array(
                                 'theme_location' => 'main-menu',
                                 'menu_class' => 'sf-menu mobile-menu',
                                 'fallback_cb' => 'wp_page_menu',
                                 )
                         );
                       
                } else {        
                         wp_nav_menu_select( array(
                                 'theme_location' => 'main-menu',
                                 'menu_class' => 'sf-menu responsive-menu',
                                 'fallback_cb' => 'wp_page_menu',
                                 )
                         );                         
                         
                } ?>        
                </div><!-- #topnavi -->
                
                <div class="clear"></div>

                <?php
                if ( of_get_option('gg_searchbar') ) {
                ?><div id="search-left">     
                <?php get_template_part( 'searchform' ); ?>
                </div>  
                <?php } ?>

                <?php
                        if ( of_get_option('gg_social_pos') == 'left'  &&
                                ( of_get_option('gg_instagram')
                                or of_get_option('gg_foursquare')
                                or of_get_option('gg_twitter')
                                or of_get_option('gg_yelp')
                                or of_get_option('gg_fb')
                                or of_get_option('gg_flickr')
                                or of_get_option('gg_pinterest')
                                or of_get_option('gg_youtube')
                                or of_get_option('gg_googleplus')
                                )
                        )
                { ?>              
                <div id="social">
                        <ul id="socialicons">
                                <?php
                                if ( of_get_option('gg_fb') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_fb'); ?>" target="_blank" class="fb" > <i class="fa fa-facebook"></i> </a> </li>                        
                                <?php }
        
                                if ( of_get_option('gg_twitter') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_twitter'); ?>" target="_blank" class="twitter" > <i class="fa fa-twitter"></i> </a> </li>                        
                                <?php }            

                                if ( of_get_option('gg_googleplus') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_googleplus'); ?>" target="_blank" class="googleplus" > <i class="fa fa-google-plus"></i> </a> </li>                        
                                <?php } 
                                
                                if ( of_get_option('gg_yelp') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_yelp'); ?>" target="_blank" class="yelp" > <i class="icon-yelp"></i> </a> </li>                        
                                <?php }                                        
                                
                                if ( of_get_option('gg_instagram') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_instagram'); ?>" target="_blank" class="instagram" > <i class="fa fa-instagram"></i> </a> </li>                        
                                <?php }                                
                                
                                if ( of_get_option('gg_youtube') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_youtube'); ?>" target="_blank" class="youtube" > <i class="fa fa-youtube"></i> </a> </li>                        
                                <?php }
                                
                                if ( of_get_option('gg_foursquare') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_foursquare'); ?>" target="_blank" class="foursquare" > <i class="fa fa-foursquare"></i> </a> </li>                        
                                <?php }
                                
                                if ( of_get_option('gg_pinterest') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_pinterest'); ?>" target="_blank" class="pinterest" > <i class="fa fa-pinterest"></i> </a> </li>                        
                                <?php }                                                            

                                if ( of_get_option('gg_flickr') ) {
                                ?> <li> <a href="<?php echo of_get_option('gg_flickr'); ?>" target="_blank" class="flickr" > <i class="fa fa-flickr"></i> </a> </li>                        
                                <?php }                          
                                ?>
                                
                           
                                
                        </ul>
                </div><!-- .social-->
                <?php
                } ?>                  

        </div> <!-- .left-->
        
        <div id="contentwrap">   
        
		<?php
                if( of_get_option('gg_slider') != "" && is_page_template('template-home.php') ) {                        
                ?>
                        <div id="slide-bg"> 
                                <div id="slideshow">                         
                                        <?php get_template_part( 'slider' ); ?>
                                </div><!-- #slideshow-->
                        </div><!-- #slide-bg-->    
                <?php }
                ?>

        	<div id="content">          
<?php

function retina_styles() { ?>

        <style type="text/css">

                /* RETINA IMAGES */
                
                @media only screen and (-webkit-min-device-pixel-ratio: 2), 
                only screen and (min-device-pixel-ratio: 2) {
                
                
                        <?php 
                        if ( of_get_option('gg_logo_retina') ) {
                        ?>

                                .logo-retina{
                                        display: block;
                                        }
                                        
                                .logo-regular {
                                        display: none;
                                        }                

                        <?php }  ?>                
                
                }

        </style>
        
<?php }

add_action( 'wp_head', 'retina_styles', 100 );

?>
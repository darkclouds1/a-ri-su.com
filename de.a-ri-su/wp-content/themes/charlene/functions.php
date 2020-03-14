<?php

// Path constants
define(EIGHTTWENTY_DIR, TEMPLATEPATH);
define(EIGHTTWENTY_LIB, EIGHTTWENTY_DIR . '/library');

define(EIGHTTWENTY_CUSTOM, EIGHTTWENTY_LIB . '/custom');
define(EIGHTTWENTY_FUNCTIONS, EIGHTTWENTY_LIB . '/functions');
define(EIGHTTWENTY_ADMIN, EIGHTTWENTY_LIB . '/admin');
define(EIGHTTWENTY_LAYOUT, EIGHTTWENTY_LIB . '/layouts');
define(EIGHTTWENTY_WIDGETS, EIGHTTWENTY_LIB . '/widgets');


// load custom theme options
require_once(EIGHTTWENTY_ADMIN . '/theme-options.php');

// load theme functions 
require_once(EIGHTTWENTY_FUNCTIONS . '/dochead-functions.php'); // load document head functions
require_once(EIGHTTWENTY_FUNCTIONS . '/theme-functions.php'); // load general theme functions
require_once(EIGHTTWENTY_FUNCTIONS . '/widgets.php'); // load widget settings
require_once(EIGHTTWENTY_FUNCTIONS . '/hooks.php'); // load custom theme hooks and filters
require_once(EIGHTTWENTY_FUNCTIONS . '/post-functions.php'); // load theme post functions
require_once(EIGHTTWENTY_FUNCTIONS . '/theme-comments.php'); // load theme comment functions

// load Theme Custom Widgets
require_once(EIGHTTWENTY_WIDGETS . '/recent-posts.php'); //Recent Post Widget for Charlene

/**
 * Add Custom Functions file if exists
 * located in /library/custom
 * Useful for writing custom functions into the theme
 * making use of the many hooks available.
 */
if (file_exists(EIGHTTWENTY_CUSTOM . '/custom-functions.php'))
	include(EIGHTTWENTY_CUSTOM . '/custom-functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
		
<title><?php eighttwenty_title_tag(); ?></title>

<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	 
<?php eighttwenty_head(); //theme head hook ?>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php eighttweny_before_html(); ?><!-- hook before html -->

<div id="wrapper"><!--Start Wrapper-->

	<?php eighttwenty_aboveheader(); ?><!-- hook before header -->
	
	<div id="header">

			<?php eighttwenty_site_title(); ?>

			<p class="quote"><?php eighttwenty_insert_quote(); ?></p><!-- end .quote -->
		
	</div><!-- end #header -->
		
	<?php eighttwenty_belowheader(); ?><!-- hook after header -->

<div id="content"><!-- content -->
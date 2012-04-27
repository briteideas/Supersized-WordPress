<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>

<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />
<meta name="keywords" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />



<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>

</head>

<body class="<?php sandbox_body_class() ?>">

<div id="wrapper" class="hfeed">

	<div id="header">
		<h1 id="blog-title"><a href="<?php bloginfo('home') ?>/" title="<?php echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" rel="home"><span><?php bloginfo('name') ?></span></a></h1>
		<?php /* //* Hiding for KADG <div id="blog-description"><?php bloginfo('description') ?></div> */ ?>
	

	<div id="access">
		<?php /* // Hiding skip link <div class="skip-link"><a href="#content" title="<?php _e( 'Skip to content', 'sandbox' ) ?>"><?php _e( 'Skip to content', 'sandbox' ) ?></a></div> */ ?>
		<?php sandbox_globalnav() ?>
	</div><!-- #access -->
</div><!--  #header -->
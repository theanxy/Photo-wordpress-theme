
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

		

	?></title>
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<?php if(!is_single()):?>
	
	<meta name="description" content="The Digital CMO Summit is an Annual, Invitation-Only event that brings marketing leaders together to discuss how the internet and digital media are transforming their businesses. The intimate size of the summit, with its formal sessions and informal activities, creates an unparalleled opportunity to learn from, influence and connect with executives from top advertisers, agencies and media companies." />
	
	<?php endif;?>
	

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	
	<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url')?>/images/common/icon.png" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!-- <link rel="stylesheet" media="all" href="<?php bloginfo('template_url')?>/css/main.css" />  -->
	<link rel="stylesheet" media="all" href="<?php bloginfo('template_url')?>/css/colorbox.css" />
	<link rel="stylesheet" media="print" href="<?php bloginfo('template_url')?>/css/print.css" />
	<!--[if !IE]>-->
		<link rel="stylesheet" media="handheld, only screen and (min-device-width: 768px) and (max-device-width: 1024px), (max-width: 975px)" href="<?php bloginfo('template_url')?>/css/mobile.css" />
		<link rel="stylesheet" media="handheld, only screen and (max-width: 600px)" href="<?php bloginfo('template_url')?>/css/handheld.css"  />
	<!--<![endif]-->
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->	
	
</head>

<body <?php body_class(); ?>>

<div class="container">

	<nav id="accessibility-nav">
		<ol>
			<li><a href="#navigation">Skip to navigation</a></li>
			<li><a href="#content">Skip to content</a></li>
			<li><a href="#sidebar">Skip to sidebar</a></li>
		</ol>
	</nav>
	<!-- / accessibility-nav -->
	<hr />

	<header id="header">
		<a href="<?php bloginfo('url')?>" class="logo logo-compete-home">Compete<span></span></a>
		
		<?php wp_nav_menu( array( 'container_id' => 'navigation', 'theme_location' => 'primary' ) ); ?>
		<!-- <nav id="navigation">
			<ul>
				<li class="current"><a href="home.php">Home</a></li>
				<li><a href="agenda.php">2010 Agenda</a></li>
				<li><a href="participants.php">2010 Participants</a></li>
				<li><a href="speakers.php">2010 Speakers</a></li>
				<li class="important"><a href="registration.php">Registration</a></li>
			</ul>
		</nav>-->
		<!-- / navigation -->
	</header>
	<!-- / header -->
	<hr />
	
	<?php if(is_page('home')):?>
	<div id="top">
		<div  class="vevent">
			<hgroup class="summary">
				<h1 class="logo logo-summit-home">digitalCMOsummit'11<span></span></h1>
				<h2 class="logo summit-title">The Connection Project<span></span></h2>
			</hgroup>
			<p class="place-time"><span class="location">the roosevelt hotel, new orleans</span> - <abbr class="dtstart" title="2011-05-04">may 4</abbr>-<abbr class="dtend" title="2011-05-06">6, 2011</abbr></p>
			<!--<p class="description">More information on the <em>2011 Digital CMO Summit</em> is coming soon&hellip;</p>-->
			<div class="register"><a href="/?page_id=17" class="button-register url">Register Now</a></div>
		</div>
	</div>
	<?php endif;?>
	<!-- / top -->
	<hr />

	
	
		
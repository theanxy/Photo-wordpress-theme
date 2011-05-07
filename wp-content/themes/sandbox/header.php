<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
	
	<meta name="description" content="Homepage of Wojtek Zając.">
	<meta name="author" content="Wojtek Zając">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" />
	
	<script src="<?php bloginfo('template_directory') ?>/js/modernizr-1.7.min.js"></script>
<?php //wp_head() // For plugins ?>
</head>

<body>

<div id="wrapper">

	<header>
		<h1><a href="<?php bloginfo('home') ?>/" rel="home"><?php bloginfo('name') ?></a></h1>
	</header>

	<nav id="menu">
		<ul>
		<?php wp_list_pages('title_li=&sort_column=menu_order&exclude=4'); ?>
		</ul>
	</nav>
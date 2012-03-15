<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
	
	<meta name="description" content="Homepage of Wojtek Zając.">
	<meta name="author" content="Wojtek Zając">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" />
	<link href='http://fonts.googleapis.com/css?family=Economica:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	
	<script src="<?php bloginfo('template_directory') ?>/js/modernizr-1.7.min.js"></script>
<?php //wp_head() // For plugins ?>
</head>

<body>

<div id="wrapper">

	<header>
		<h1><a href="<?php bloginfo('home') ?>/" rel="home"><?php //bloginfo('name') ?>Wojtek <span>Zajac</span></a></h1>
		<small>voi·tek za·yats</small>
	</header>

<?php if (!is_page('home')) { ?>
	<nav role="navigation">
		<ul id="menu">
		<?php wp_list_pages('title_li=&sort_column=menu_order&exclude=4'); ?>
		</ul>
		<ul>
			<li><a href="">Blog</a></li>
		</ul>
	</nav>
<?php } ?>
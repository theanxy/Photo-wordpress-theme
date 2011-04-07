<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
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
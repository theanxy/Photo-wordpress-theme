<?php 
/**
 * Template Name: Home page
 */
?>
<?php get_header() ?>

<?php
	$currentID = get_the_ID();
	
	$imgWidth = 800;
	$imgHeight = 560;
?>
<div id="content">
	<h1><a href="<?php bloginfo('home') ?>/" rel="home"><?php //bloginfo('name') ?>Wojtek <span>Zajac</span></a></h1>
	
	<section class="bio">
		<p>Howdy. I am a 22 years old front-end engineer based in Kraków, Poland.
			
		<p>I specialize in web accessibility, device independence and designing good UX. I lead mobile efforts at <a href="http://XHTMLized.com">XHTMLized.com</a>.
									
		<!-- <p>I’m a founder/president of polish X–Team branch. I run an office featuring 9 brilliant developers, 2 designers and 2 PMs. My full experience is available on <a href="http://linkedin.com/in/wojciechzajac">LinkedIn</a>. -->

		<p><a href="http://www.flickr.com/photos/buterux/4098508821/">Typography</a>, especially <a href="http://www.flickr.com/photos/buterux/galleries/72157622652716272/">vintage book covers</a> are my obsession. I sometimes pretend to be a <a href="">public speaker</a>.
			
		<p>Read about my <a href="http://linkedin.com/in/wojciechzajac">work experience</a>. Check what I’m <a href="http://last.fm/user/buterux">listening&nbsp;to</a>. You’re invited to browse my <a href="/new-york/">photo gallery</a>. I also run a <a href="http://blog.wojtekzajac.com">blog</a>.
			
		<p>Follow me on <a href="http://twitter.com/theanxy">Twitter</a>.
			
		<ul class="social">
			<li><a href="http://twitter.com/theanxy"><img src="/img/twitter.png" alt="Twitter"></a></li>
			<li><a href="http://facebook.com/wzajac"><img src="/img/facebook.png" alt="Facebook"></a></li>
			<li><a href="http://last.fm/user/buterux"><img src="/img/lastfm.png" alt="Lastfm"></a></li>
			<li><a href="http://flickr.com/buterux"><img src="/img/flickr.png" alt="flickr"></a></li>
			<li><a href="http://linkedin.com/in/wojciechzajac"><img src="/img/linkedin.png" alt="Linkedin"></a></li>
	</section>

</div><!-- #content -->

<?php get_footer() ?>
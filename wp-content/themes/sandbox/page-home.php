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
<div id="content" class="home">
	
	<img src="/img/me.jpg" alt="Wojtek Zając" class="photo">
	<section class="bio">
		<p>Howdy. I am a 22 years old front-end engineer based in Kraków, Poland.
			
		<p>I specialize in web accessibility, device independence and designing good UX. I lead mobile efforts at <a href="http://XHTMLized.com">XHTMLized.com</a>.
									
		<p>I’m a founder/president of polish X–Team branch. I run an office featuring 9 brilliant developers, 2 designers and 2 PMs. My full experience is available on <a href="http://linkedin.com/in/wojciechzajac">LinkedIn</a>.
			
		<p><a href="">Typography</a> and <a href="">vintage book covers</a> turn me on. But that’s not all what I do. Check out my <a href="/new-york/">photo gallery</a>.
			
		<p>You should follow me on <a href="http://twitter.com/theanxy">Twitter</a>.
			
		<ul class="social">
			<li><a href="#"><img src="/img/twitter.png" alt="Twitter"></a></li>
			<li><a href="#"><img src="/img/facebook.png" alt="Facebook"></a></li>
			<li><a href="#"><img src="/img/lastfm.png" alt="Lastfm"></a></li>
			<li><a href="#"><img src="/img/flickr.png" alt="flickr"></a></li>
			<li><a href="#"><img src="/img/linkedin.png" alt="Linkedin"></a></li>
	</section>

</div><!-- #content -->

<?php get_footer() ?>
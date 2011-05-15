<?php 
/**
 * Template Name: Photos page
 */
?>
<?php get_header() ?>

	<div id="content">

<?php
the_post();
$currentID = get_the_ID();
$url = $_SERVER["REQUEST_URI"];
$urlPieces = explode("/", $url);
$currentPhoto = $urlPieces[count($urlPieces)-2];
if (!is_numeric($currentPhoto)) $currentPhoto = 1;
$prev = $currentPhoto - 1;
$next = $currentPhoto + 1;
$URL = explode('/', $_SERVER['REQUEST_URI']);
$pageURL = $URL[1];
?>

			<!--<h2 class="entry-title"><?php the_title() ?></h2>-->
			

<?php //the_content() ?>

<?php
	$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );
	if (!empty($images)) :
?>
<!--<section class="bio">
	<p>Hi!</p>
	<p>I’m a lead developer at XHTMLized.</p>
	<p>Photography is my hobby. Learn more about me or check my social media profiles.</p>
	<p><a href="#">LinkedIn</a></p>
	<p><a href="#">SlideShare</a></p>
	<p><a href="#">Facebook</a></p>
</section>-->
<section class="bio">
	<a href="#">About</a>
</section>
<section class="photos">
<?php
	$i = 0;
	foreach( (array) $images as $attachment_id => $attachment ) : 
	$i++;
	$image_attributes = wp_get_attachment_image_src( $attachment_id, array(760,760) );
?>
<article<?php if($currentPhoto == $i) echo ' class="active"'; ?>>
	<img src="<?php echo $image_attributes[0]?>" width="<?php echo $image_attributes[1] ?>" height="<?php echo $image_attributes[2] ?>" alt="" />
</article>
<?php
	endforeach;
	endif;
?>
</section>
<nav id="photos-nav">
	<a rel="prev"<?php if($currentPhoto > 1) echo ' href="/'.$pageURL.'/'.$prev.'/"'; ?>>◀</a>
	<span><meter min="1" max="<?php echo count($images); ?>"><?php echo $currentPhoto; ?></meter> / <?php echo count($images); ?></span>
	<a rel="next"<?php if($currentPhoto < count($images)) echo ' href="/'.$pageURL.'/'.$next.'/"'; ?>>▶</a>
</nav>


	</div><!-- #content -->


<?php get_footer() ?>
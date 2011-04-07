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
echo $currentPhoto;
?>

			<!--<h2 class="entry-title"><?php the_title() ?></h2>-->
			

<?php //the_content() ?>

<?php
	$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );
	if (!empty($images)) :
?>
<section class="photos">
<?php
	$i = 0;
	foreach( (array) $images as $attachment_id => $attachment ) : 
	$i++;
	$image_attributes = wp_get_attachment_image_src( $attachment_id, array(750,500) );
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
	<a rel="prev">&lt;</a>
	<span><meter min="1" max="<?php echo count($images); ?>">1</meter> / <?php echo count($images); ?></span>
	<a rel="next" href="2/">&gt;</a>
</nav>


	</div><!-- #content -->


<?php get_footer() ?>
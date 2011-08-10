<?php 
/**
 * Template Name: Photos page
 */
?>
<?php get_header() ?>

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

<div id="content">

<?php
	$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );
	if (!empty($images)) :
?>

<?php get_sidebar(); ?>

<section class="photos">
<?php
	$i = 0;
	foreach( (array) $images as $attachment_id => $attachment ) : 
	$i++;
	$image_attributes = wp_get_attachment_image_src( $attachment_id, array(600,400) );
?>
<article<?php if($currentPhoto == $i) echo ' class="active"'; ?>>
	<img src="<?php echo $image_attributes[0]?>" width="<?php echo $image_attributes[1] ?>" height="<?php echo $image_attributes[2] ?>" alt="<?php the_title(); echo ' photo '.$i ?>" />
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
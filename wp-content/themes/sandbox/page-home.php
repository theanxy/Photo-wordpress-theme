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
	
<?php get_sidebar('home') ?>

<?php		
	$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );
	if (!empty($images)) :
?>

<section class="photos">
<?php
	$i = 0;
	foreach( (array) $images as $attachment_id => $attachment ) : 
	$i++;
	$image_attributes = wp_get_attachment_image_src( $attachment_id, array($imgWidth,$imgHeight) );
?>
<figure>
	<img src="<?php echo $image_attributes[0]?>" width="<?php echo $image_attributes[1] ?>" height="<?php echo $image_attributes[2] ?>" alt="<?php the_title(); echo ' photo '.$i ?>" />
<?php
	if(!empty($attachment->post_excerpt)) {
		echo "	<figcaption>".$attachment->post_excerpt."</figcaption>\n";
	}
?>
</figure>
<?php
	endforeach;
	endif;
?>
			<!--<img class="alignnone" title="NYC street" src="http://farm5.static.flickr.com/4132/4840737806_c9c0cff7f2_o.jpg" alt="" width="800" height="600" />-->
			

</div><!-- #content -->

<?php get_footer() ?>
<?php 
/**
 * Template Name: Photos page: images
 */
?>
<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php
the_post();
$currentID = get_the_ID();
?>

			<div id="post-<?php the_ID() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
<?php //the_content() ?>

<?php
	$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );
	if (!empty($images)) :
	echo "Total: ".count($images)."<br>\n";
	$current_keys = array_keys($images);
	$first_image = wp_get_attachment_image_src( $current_keys[0], array(600,900));

	//echo "<!--"; print_r($images); echo "!-->";	
?>
<ul class="photos">
<li>
	<img src="<?php echo $first_image[0]?>" width="<?php echo $first_image[1] ?>" height="<?php echo $first_image[2] ?>" alt="" />
</li>
</ul>
<?php
	if(count($images) > 1) {
?>

<?php
	$i = 0;
	foreach( (array) $images as $attachment_id => $attachment ) : 
	$i++;
	$image_attributes = wp_get_attachment_image_src( $attachment_id, array(600,600) );
	if ($i > 1) { 
?>
<img src="<?php echo $image_attributes[0]?>" width="<?php echo $image_attributes[1] ?>" height="<?php echo $image_attributes[2] ?>" alt="" />
<?php
};
	endforeach;
?>
<?php
	};
	endif;
?>



				</div>
			</div><!-- .post -->


		</div><!-- #content -->
	</div><!-- #container -->


<?php get_footer() ?>
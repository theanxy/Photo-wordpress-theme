<?php
/**
 * Template Name: Agenda Page
 */
?>
<?php get_header();?>

<?php if ( have_posts() ) : the_post();
$currentID = get_the_ID();?>
<div id="content" class="narrow-sidebar">
<h2><?php the_title()?></h2>

<aside id="sidebar" class="narrow-sidebar">
<h2 id="venue-photos-title" class="vertical-heading">Venue Photos</h2>
<?php $attachments =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );?>



<?php if ($attachments) {?>
	<ul class="photos">
	
	<?php foreach($attachments as $attachment) {
		foreach($attachment as $attachment_key => $attachment_value) {
			$imageID = $attachment->ID;
			$imageTitle = $attachment->post_title;
			$imageCaption = $attachment->post_excerpt;
			$imageDescription = $attachment->post_content;
			$imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
			// $imageAlt = $attachment->image_alt; // not sure about this one
			$imageArray = wp_get_attachment_image_src($attachment_value, $size, false);
			$imageURI = $imageArray[0]; // 0 is the URI
			$imageWidth = $imageArray[1]; // 1 is the width
			$imageHeight = $imageArray[2]; // 2 is the height 
			?>
			
			<li>
				<img src="<?php echo $imageURI; ?>" alt="<?php echo $imageCaption; ?>" width="<?php echo $imageWidth; ?>" height="<?php echo $imageHeight; ?>" title="<?php echo $imageTitle; ?>" /> 
				<span><?php echo $imageTitle; ?></span>
			</li>
			
			
			<?php
			break;
		}
	}?>
	</ul>
<?php }


print_r(wp_get_attachment_metadata($attachment_id));

 ?>




</aside> <!-- / sidebar --> 
<section> 
<?php echo get_the_content()?>
</section> 


<?php else: endif; ?> 



<?php get_footer();?>
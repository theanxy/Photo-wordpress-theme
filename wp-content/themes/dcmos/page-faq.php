<?php
/*
 * 	Template Name: FAQ page
 * 	Pocket: DCMOS
 */

get_header()?>


<?php if ( have_posts() ) : the_post();
$currentID = get_the_ID();?>

<div id="content" class="narrow-sidebar">
		<h2>Frequently Asked Questions</h2>
		
		<aside id="sidebar" class="narrow-sidebar">
			<h2 id="venue-photos-title" class="vertical-heading">Venue Photos</h2>
			<?php $images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );
			if (!empty($images)):?>
			
			<ul class="photos">
				<?php foreach( (array) $images as $attachment_id => $attachment ) : 
					$image_attributes = wp_get_attachment_image_src( $attachment_id, 'video' ); ?>
					<li>
				  		<img src="<?php echo $image_attributes[0]?>" width="<?php echo $image_attributes[1] ?>" height="<?php echo $image_attributes[2] ?>" alt="" />
					</li>
				<?php endforeach;?>
				
				
			</ul>
			<?php endif;?>
		</aside>
		<!-- / sidebar -->
		
		<section>
			<?php the_content()?>
		</section>

<?php else: endif; ?>
<?php get_footer()?>
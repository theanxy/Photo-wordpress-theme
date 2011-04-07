<?php 
/**
 * Template Name: Participants Page
 */
?>
<?php get_header();?>	

<?php if ( have_posts() ) : the_post();
$currentID = get_the_ID();?>

<div id="content" class="narrow-sidebar">
	
		<h2><?php the_title()?></h2>
		
		<aside id="sidebar" class="narrow-sidebar">
			<h2 id="participant-logos-title" class="vertical-heading">Participant Logos</h2>
			<!--<ul class="photos logos">
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-verizon.png" width="173" height="83" alt="Logo Verizon" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-kantar.png" width="173" height="34" alt="Logo Kantar" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-wpp.png" width="173" height="35" alt="Logo Wpp" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-cocacola.png" width="173" height="52" alt="Logo Cocacola" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-mec.png" width="173" height="73" alt="Logo Mec" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-realmedia.png" width="173" height="79" alt="Logo Realmedia" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-mig.png" width="173" height="126" alt="Logo Mig" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-capitalone.png" width="173" height="43" alt="Logo Capitalone" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-univision.png" width="173" height="69" alt="Logo Univision" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-frommers.png" width="173" height="39" alt="Logo Frommers" /></li>
				<li><img src="<?php bloginfo('template_url')?>/_media/images/participants/logo-quickmobile.png" width="173" height="55" alt="Logo Quickmobile" /></li>
			</ul>-->
			
			<?php $images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$currentID.'&orderby=menu_order&order=ASC' );
			if (!empty($images)):?>
			
			<ul class="photos logos">
				<?php foreach( (array) $images as $attachment_id => $attachment ) : 
					$image_attributes = wp_get_attachment_image_src( $attachment_id, 'video' ); ?>
					<li><img src="<?php echo $image_attributes[0]?>" width="<?php echo $image_attributes[1] ?>" height="<?php echo $image_attributes[2] ?>" alt="" /></li>
				<?php endforeach;?>
				
				
			</ul>
			<?php endif;?>
			
		</aside>
		<!-- / sidebar -->
				
		<section>
		
			<?php the_content()?>
			
		</section>

<?php else: endif; ?>
		
<?php get_footer();?>	
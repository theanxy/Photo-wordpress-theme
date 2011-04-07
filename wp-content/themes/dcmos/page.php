<?php get_header();?>	

<?php if ( have_posts() ) : the_post();
$currentID = get_the_ID();?>
	<div id="content" class="narrow-sidebar">
		<h2><?php the_title()?></h2>
		
		<section> 
		<?php the_content()?>
		</section> 
<?php else: endif; ?>
<?php get_footer()?>
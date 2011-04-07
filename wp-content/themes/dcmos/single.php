<?php 
/**
 * Template Name: Speakers Page
 */
?>
<?php get_header();?>	

<?php if ( have_posts() ) : the_post();
$currentID = get_the_ID();?>

	<div id="content" class="narrow-sidebar">
		<h2>Digital CMO</h2>
		
		<?php get_sidebar('blog')?>
	
		<section>
			<article class="entry">
				<h3 class="entry-title"><?php the_title()?></h3>
				<div class="meta">by <?php the_author(); ?> — <?php the_time('F j, Y') ?> at <?php the_time() ?></div>
			
				<div class="fright">
				
				<!--  <img src="<?php bloginfo('template_url')?>/_media/images/blog/entry-pic.jpg" width="284" height="423" alt="" />
				 -->
				 <?php 	if(has_post_thumbnail()):
				 			the_post_thumbnail('blog');
				 		endif;
				 ?>
				 </div>
			
				<?php the_content(); ?>		
			</article>
			<?php comments_template(); ?>
			<ul class="pagination">
				<?php $next_post_id = get_next_post()->ID; ?>
				<?php $prev_post_id = get_previous_post()->ID; ?>
				<?php 	//next_post_link('%link', 'Next', TRUE, '');
				
						//previous_post_link('%link', 'Previous', TRUE, '');?>
				<?php if($prev_post_id):?><li class="prev"><?php previous_post_link('%link', 'Previous', TRUE, '');?></li><?php endif;?>
				<?php if($next_post_id):?><li class="next"><?php next_post_link('%link', 'Next', TRUE, '');?></li><?php endif;?>
			</ul>
		</section>
		
<?php else: endif; ?>
		
<?php get_footer();?>	
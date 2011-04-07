<?php 
/**
 * Template Name: Speakers Page
 */
?>
<?php get_header();?>	

<?php if ( have_posts() ) : the_post();
$currentID = get_the_ID();?>

<div id="content" class="narrow-sidebar">
	
		<h2><?php the_title()?></h2>
		<?php query_posts('post_type=page&post_parent='.$currentID.'&orderby=menu_order&order=ASC&posts_per_page=-1');?>
		<?php if ( have_posts() ) : ?>
		
		<aside id="sidebar" class="narrow-sidebar">
			<h2 id="speaker-photos-title" class="vertical-heading">Speakers Photos</h2>
			<ul class="photos">
				<?php $counter= 0; while ( have_posts() ) : the_post();
				$title = get_post_meta($post->ID, 'title', true); ?>
				<?php if(has_post_thumbnail()) :?>
					<li>
						<?php the_post_thumbnail('video'); ?>
						<a href="#speaker-<?php echo ++$counter;?>"><strong><?php the_title()?></strong><?php if($title)  echo ' - '.$title?></a>
					</li>
					
					<?php else: $counter++; continue;
				endif; endwhile;?>
				
			</ul>
		</aside>
		<!-- / sidebar -->
		<?php //else: endif; wp_reset_query();?>
		
				
		<section>
		
		<?php 
		rewind_posts();
		//query_posts('post_type=page&post_parent='.$currentID.'&orderby=menu_order&order=ASC');?>
			<?php $counter= 0; /*if ( have_posts() ) : */while ( have_posts() ) : the_post();
			$title = get_post_meta($post->ID, 'title', true); ?>
			
			
			<h4 id="speaker-<?php echo ++$counter;?>"><?php the_title()?><br /> <?php echo $title?></h4>
			
			<?php the_content()?>
			
			<a class="skip" href="#content">↑ Go back to the list of speakers</a>
			<?php endwhile;?>
		</section>
		<?php else: endif; wp_reset_query();?>
<?php else: endif; ?>
		
<?php get_footer();?>	
<?php 
/**
 * Template Name: Home Page
 */
?>
<?php get_header();?>	

<div id="content" class="wide-sidebar">

<?php if ( have_posts() ) : the_post();
$currentID = get_the_ID();?>
		<section>
			<?php the_content()?>
		</section>
		
		<aside id="sidebar">
			<h2 id="summit-videos-title" class="vertical-heading">Digital CMO Summit 2010 Videos</h2>
			
			<?php query_posts('post_type=page&post_parent='.$currentID.'&orderby=menu_order&order=ASC');?>
			<?php if ( have_posts() ) : ?>
				<ul class="photos videos">
				<?php $counter = 0; while ( have_posts() ) : the_post();
					  $video = get_post_meta($post->ID, "video_link", true); 
					  $content = get_the_content();
					  $content = apply_filters('the_content', $content);
					  $content = str_replace(']]>', ']]&gt;', $content); 
					  $content = strip_tags($content);
					  ?>
				
				<li <?php if(++$counter == 1) echo 'class="big"'?>>
					<?php if($video):?>
					<a href="<?php echo $video?>">
					<?php 	if(has_post_thumbnail()):
	 							if($counter==1):
									the_post_thumbnail('video-big');
								else:
									the_post_thumbnail('video');
								endif;			
							endif;
					?>
					<span class="play"></span>
					</a>
					
					<span><?php the_title()?> <?php if($content):?><span class="desc">- <?php echo $content;?></span><?php endif;?></span>
					<?php else: ?>
					<span>
					<?php 	if(has_post_thumbnail()):
	 							if($counter==1):
									the_post_thumbnail('video-big');
								else:
									the_post_thumbnail('video');
								endif;			
							endif;
					?>
					</span>
					
					<span><?php the_title()?> <?php if($content):?><span class="desc">- <?php echo $content;?></span><?php endif;?></span>
					<?php endif;?>
				</li>
			<!-- 	<li>
					<a href="http://www.youtube.com/user/D180Producer#p/c/47F8A3D5CB7E4B5F/1/MgJj7LD89uI" rel="people">
						<img src="_media/images/home/pic-jeff-hayzlett.jpg" alt="" width="180" height="108" />
						<span class="play"></span>
					</a>
					<span>Jeff Hayzlett <span class="desc">- CMO and VP, Eastman Kodak Company</span></span>
				</li>
				<li>
					<a href="http://www.youtube.com/user/D180Producer#p/c/47F8A3D5CB7E4B5F/4/OyoL2EEjrTY" rel="people">
						<img src="_media/images/home/pic-kirsten-ward.jpg" alt="" width="180" height="108" />
						<span class="play"></span>
					</a>
					<span>Kirsten Ward <span class="desc">- Director of Digital Advertising, Microsoft</span></span>
				</li>
				<li>
					<a href="http://www.youtube.com/user/D180Producer#p/c/47F8A3D5CB7E4B5F/7/hAfDhVp0NMs" rel="people">
						<img src="_media/images/home/pic-karen-schlosser.jpg" alt="" width="180" height="108" />
						<span class="play"></span>
					</a>
					<span>Karen Schlosser <span class="desc">- Associate Marketing Director – Procter and Gamble</span></span>
				</li>
				<li>
					<a href="http://www.youtube.com/user/D180Producer#p/c/47F8A3D5CB7E4B5F/5/qIvc6Dx2VVo" rel="people">
						<img src="_media/images/home/pic-dennis-haugan.jpg" alt="" width="180" height="108" />
						<span class="play"></span>
					</a>
					<span>Dennis Haugan <span class="desc">- Senior Director of Digital Marketing Strategy – T-Mobile USA</span></span>
				</li> -->
				
				<?php endwhile;?>
				</ul>
				<?php else: endif; wp_reset_query();?>
			
		</aside>
		<!-- / sidebar -->
		
<?php else: endif; ?>
		
<?php get_footer();?>	
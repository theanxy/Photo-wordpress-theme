<aside id="sidebar" class="narrow-sidebar">
					
			
			<h2 id="social-pages-title" class="vertical-heading">Speakers Photos</h2>
			<?php if(is_active_sidebar( 'primary-widget-area' )): ?> 
			<ul>
				<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
				<?php endif;?>
			</ul>		
			<?php endif;?>
			
			<a href="<?php echo get_option('dcmos_twitter') ?>" class="twitter">Twitter<span></span></a>
			
			
			<?php  
			$username = "dcmosummit"; // Your twitter username.  
			$limit = "5"; // Number of tweets to pull in.  

			/* These prefixes and suffixes will display before and after the entire block of tweets. */  
			$prefix = "<ul class='twitter-feed'>"; // Prefix - some text you want displayed before all your tweets.  
			$suffix = "</ul>"; // Suffix - some text you want displayed after all your tweets.  
			$tweetprefix = "<li>"; // Tweet Prefix - some text you want displayed before each tweet.  
			$tweetsuffix = "</li>"; // Tweet Suffix - some text you want displayed after each tweet.  

			$feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=" . $limit;  

			function parse_feed($feed, $prefix, $tweetprefix, $tweetsuffix, $suffix) {  

			$feed = str_replace("&lt;", "<", $feed);  
			$feed = str_replace("&gt;", ">", $feed);
			$feed = str_replace("&amp;", "&", $feed);
			$clean = explode("<content type=\"html\">", $feed);  

			$amount = count($clean) - 1;  

			echo $prefix;  

			for ($i = 1; $i <= $amount; $i++) {  
			$cleaner = explode("</content>", $clean[$i]);  
			echo $tweetprefix;  
			echo $cleaner[0];  
			echo $tweetsuffix;  
			}  

			echo $suffix;  
			}  

			$twitterFeed = file_get_contents($feed);  
			parse_feed($twitterFeed, $prefix, $tweetprefix, $tweetsuffix, $suffix);  
			?>
			
			<a href="<?php echo get_option('dcmos_facebook') ?>" class="facebook">Facebook<span></span></a>
			
			<a href="<?php echo get_option('dcmos_linked') ?>" class="linkedin">Linkedin<span></span></a>
			
			<a href="<?php echo get_option('dcmos_y2b') ?>" class="youtube">YouTube<span></span></a>
			
			<a href="<?php echo get_option('dcmos_flickr') ?>" class="flickr">Flickr<span></span></a>
			
			
			<?php query_posts( 'category_name=blog&posts_per_page=4');?>
			<?php if ( have_posts() ) : ?>
			
			<h2>Previous Blog Posts</h2>
			<ul class="blog-latest">
			
				<?php while ( have_posts() ) : the_post();?>
				
				<li><a href="<?php the_permalink()?>" rel="bookmark" title="<?php echo strip_tags(get_the_title());?>"><?php the_title()?></a> <?php the_time('F j, Y');?></li>
								
				<?php endwhile;?>
			
			</ul>
			
			<?php else:endif; wp_reset_query()?>

		</aside>
		<!-- / sidebar -->
<div id="footer">
	<div id="footer-content">
		<div class="left">
			<?php get_sidebar('footer-left'); ?>
		</div>
		<div class="right">
			<?php
				// get category name
				$category = get_the_category(); 
				$categoryname = $category[0]->cat_name;
			?>
			<?php if (is_single()) { ?>
            	<h2>Ebenfalls unter <?php echo $categoryname; ?></h2>
            <?php } else { ?>
            	<h2>Was es sonst noch gibt</h2>
            <?php } ?>
			<ul class="postBox">
			<!-- get related posts -->
				<?php
					global $post;
					if (is_single()) {
						// get current category id
						$categoryid= $category[0]->cat_ID; 
						
						// show related posts
						$args = array( 'numberposts' => 2, 'orderby' => 'rand', 'category__not_in' => array(338), 'category' => $categoryid);
					} else {
						$args = array( 'numberposts' => 2, 'orderby' => 'rand', 'category__not_in' => array(338));
					}
					$myposts = get_posts( $args );
					foreach( $myposts as $post ) :	setup_postdata($post); ?>
					<li>
						<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php if ( has_post_thumbnail()) { ?>
			   				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			   					<?php the_post_thumbnail('small-post-thumbnail'); ?>
			   				</a>
			 			<?php } ?>
			 		</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<? wp_footer(); ?>
</div>

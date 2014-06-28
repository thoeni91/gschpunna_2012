<?php get_header(); ?>
	<!-- The loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post">
		<h2 class="postTitle"><?php the_title(); ?></h2>
		<div class="clear"></div>
		<div class="post-content">
			 <?php 
				 if ( has_post_thumbnail()) {
				   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				   echo '<a class="thumbnail" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
				   the_post_thumbnail('large-post-thumbnail');
				   echo '</a>';
				 }
			 ?>
			<div class="content">
				<p class="content"><?php the_content(); ?></p>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<?php endwhile; else: ?>
		<p><?php _e('Hier ist nichts.'); ?></p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
</body>
</html>
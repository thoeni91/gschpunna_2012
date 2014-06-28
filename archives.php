<?php get_header(); ?>
<div id="container">
	<a id="logo" href="<?php bloginfo('url'); ?>"><span class="hide">gschpunna.ch</span></a>
	<ul id="navigation">
		<?php wp_list_pages('title_li='); ?>
		<div class="clear"></div>
	</ul>
	
	<!-- The loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   	<?php
		// Get number of pings
		global $wpdb;
		$post_id = get_the_ID();
		$ping_count = $wpdb->get_var("SELECT count(comment_id) FROM $wpdb->comments WHERE comment_type = 'pingback' and comment_approved = 1 and comment_post_id = $post_id");
    ?>
    <div class="post">
		<h2 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="date"><?php the_date(); ?></div>
		<div class="clear"></div>
		<div class="post-content">
			 <?php if ( has_post_thumbnail()) { ?>
			   <a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			   <?php the_post_thumbnail('large-post-thumbnail'); ?>
               </a>
			 <?php } ?>
			<div class="content">
				<p class="content"><?php the_content('weiterlesen<span></span>'); ?></p>
				<?php if($ping_count > 0) { ?>
                	<a class="pingCount" href="<?php echo get_permalink(); ?>#pingbacks" title="Pingbacks"><?php echo $ping_count; ?><span></span></a>
                <?php } ?>
                <a class="commentCount" href="<?php comments_link(); ?>" title="Kommentare"><?php comments_number( '0', '1', '%' ); ?><span></span></a>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<?php endwhile; else: ?>
		<p><?php _e('Hier ist nichts.'); ?></p>
	<?php endif; ?>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>
</body>
</html>
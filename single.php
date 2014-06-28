<?php 
// Anzahl Pings auslesen
global $wpdb;
$post_id = get_the_ID();
$ping_count = $wpdb->get_var("SELECT count(comment_id) FROM $wpdb->comments WHERE comment_type = 'pingback' and comment_approved = 1 and comment_post_id = $post_id");

// Pingback Text
if(($ping_count) == 1) {
	$ping_text = "Pingback";	
} else {
	$ping_text = "Pingbacks";	
}

get_header(); 
?>
	<!-- The loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post<?php if (in_category('video')) {?> video<?php } ?>" id="post-<?php the_ID(); ?>">
		<h2 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php if (in_category('video')) {?><span><?php the_time('j. M. Y'); ?></span><?php } ?></h2>
		<div class="date"><?php the_time('j. M. Y'); ?></div>
		<div class="clear"></div>
		<div class="post-content">
			 <?php 
				 if ( has_post_thumbnail()) {
				   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				   echo '<a class="thumbnail" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
				   the_post_thumbnail('large-post-thumbnail');
				   echo "</a>";
				 }
			 ?>
			<div class="content">
				<?php the_content('weiterlesen<span></span>'); ?>
				<div class="ping-comments">
					<?php if($ping_count > 0) { ?>
						<a class="pingCount" href="<?php echo get_permalink(); ?>#pingbacks" title="Pingbacks"><?php echo $ping_count; ?><span></span></a>
					<?php } ?>
					<a class="commentCount" href="<?php comments_link(); ?>" title="Kommentare"><?php comments_number( '0', '1', '%' ); ?><span></span></a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<?php endwhile; else: ?>
		<p><?php _e('Hier ist nichts.'); ?></p>
	<?php endif; ?>
	
	<?php comments_template( '', true ); ?>
	
	<div id="comments" class="comments">
		<h2><?php comments_number( '0 Kommentare :(', '1 Kommentar', '% Kommentare' ); ?></h2>
		<ul class="commentlist">
			<?php wp_list_comments('callback=mytheme_comment&type=comment'); ?>
		</ul>
        <?php if(($ping_count) != 0) { ?>
        <h2 id="pingbacks"><?php echo "$ping_count $ping_text"; ?></h2>
            <ul class="commentlist">
                <?php wp_list_comments('callback=mytheme_comment&type=pings'); ?>
            </ul>
        <?php } ?>
		<?php comment_form(); ?> 
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>
<?php

/*
functions.php
*/

/* Editor Style */
add_editor_style();

/* Thumbnails */
add_theme_support('post-thumbnails');
add_image_size( 'large-post-thumbnail', 960, 450, true );
add_image_size( 'small-post-thumbnail', 355, 180, true );
add_image_size( 'feed-post-thumbnail', 650, 305, true );

/* Post Thumbnails in RSS Feed */
function cwc_rss_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID, 'feed-post-thumbnail') .
        '</p>' . get_the_content();
    }

    return $content;
}
add_filter('the_excerpt_rss', 'cwc_rss_post_thumbnail');
add_filter('the_content_feed', 'cwc_rss_post_thumbnail');

/* Sidebar */
if (function_exists('register_sidebar')) {
	register_sidebar(array(
	  'name' => 'Sidebar',
	  'id' => 'sidebar',
	  'description' => 'Widgets für die Top Sidebar',
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title' => '<h2 class="widgetTitle">',
	  'after_title' => '</h2>'
	));
	
	/* Footer Left */
	register_sidebar(array(
	  'name' => 'Footer Left',
	  'id' => 'footer-left',
	  'description' => 'Widgets für den Footer links',
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title' => '<h2 class="widgetTitle">',
	  'after_title' => '</h2>'
	));
}

// Comments & Pings
function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
add_filter('get_comments_number', 'comment_count', 0);

// Function
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div class="commentBox" id="comment-<?php comment_ID(); ?>">
     	<?php echo get_avatar( $comment->comment_author_email, 96 ); ?>
		
		<div class="commentText">
			<p class="meta"><a href="<?php comment_author_url(); ?>" target="_blank"><?php comment_author(); ?></a><span class="says"> meint: </span><span class="date"><?php comment_date(); ?> um <?php comment_time(); ?></span></p>
			<?php comment_text() ?>
			<div class="reply">
		 		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?><span></span>
			</div>
		</div>
		<div class="clear"></div>
		
		<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Dein Kommentar wartet auf Freischaltung.') ?></em>
			<br />
		<?php endif; ?>
		</div>
<?php } ?>

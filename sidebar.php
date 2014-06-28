<div id="sidebar">
	<div id="social">
    	<div id="social-content">
            <div class="fbLike">
                <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fgschpunna&amp;send=false&amp;layout=button_count&amp;width=125&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21&amp;appId=181385425250142" style="border:none; overflow:hidden; width:125px; height:21px;"></iframe>
            </div>
            <a href="https://twitter.com/thoeni" class="twitter-follow-button" data-button="grey" data-text-color="#666666" data-link-color="#666666" data-lang="de" data-width="200px" data-align="right">Follow @thoeni</a><script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
            <div class="clear"></div>
    	</div>
    </div>
	<?php if (is_active_sidebar('sidebar')) : ?>
		<div class="sidebar-content"><?php dynamic_sidebar('sidebar'); ?><div class="clear"></div></div>
	<?php endif; ?>
</div>
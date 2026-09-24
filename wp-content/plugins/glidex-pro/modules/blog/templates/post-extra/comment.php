<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
	if( $enable_disqus_comments && $post_disqus_shortname != '' ) : ?>
		<!-- Entry Comment -->
		<div class="entry-comments">
			<?php echo '<i class="wdticon-comment"> </i><a href="'.get_permalink($post_ID).'#disqus_thread"></a>'; ?>
			<script id="dsq-count-scr" src='//<?php echo glidex_html_output($post_disqus_shortname);?>.disqus.com/count.js' async></script>
		</div><!-- Entry Comment --><?php
	else :
		if( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { 
			$comment_count = get_comments_number();
			$comment_text = ($comment_count > 1) ? 'Comments' : 'Comment';	
		?>
		<!-- Entry Comment -->
		<div class="entry-comments"><?php
			comments_popup_link(
            '<i class="wdticon-comment"> </i> 0 ' . $comment_text, 
            '<i class="wdticon-comment"> </i> 1 ' . $comment_text, 
            '<i class="wdticon-comment"> </i> % ' . $comment_text, 
            '', 
            '<i class="wdticon-comment"> </i> 0 ' . $comment_text
        ); ?>
        </div><!-- Entry Comment --><?php
		}
	endif; ?>
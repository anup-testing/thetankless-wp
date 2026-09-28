<?php
/**
 * Title: Recent posts
 * Slug: tankless-block/blog-listing
 * Categories: tankless-block
 * Description: Native Query Loop grid of recent posts, replicating "Recent Insights On The Tankless".
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"tertiary","layout":{"type":"constrained","contentSize":"1700px"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background tankless-reveal" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","textColor":"heading"} -->
	<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color">Recent Insights On The Tankless</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"12px"}}} /-->
			<!-- wp:post-title {"isLink":true,"textColor":"heading"} /-->
			<!-- wp:post-excerpt {"textColor":"body-text","excerptLength":20} /-->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->

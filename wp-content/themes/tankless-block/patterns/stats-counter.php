<?php
/**
 * Title: Stats counter
 * Slug: tankless-block/stats-counter
 * Categories: tankless-block
 * Description: Animated count-up stat numbers, replicating "Designed for Canadian Hard Water".
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"tertiary","layout":{"type":"constrained","contentSize":"1700px"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background tankless-reveal" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","textColor":"heading"} -->
	<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color">Designed for Canadian Hard Water</h2>
	<!-- /wp:heading -->

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column {"style":{"typography":{"textAlign":"center"}}} -->
		<div class="wp-block-column" style="text-align:center">
			<!-- wp:html -->
			<div class="tankless-counter" data-target="250" data-suffix="+">0</div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"align":"center","textColor":"body-text"} -->
			<p class="has-text-align-center has-body-text-color has-text-color">Dollars saved yearly</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"typography":{"textAlign":"center"}}} -->
		<div class="wp-block-column" style="text-align:center">
			<!-- wp:html -->
			<div class="tankless-counter" data-target="15" data-suffix="+">0</div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"align":"center","textColor":"body-text"} -->
			<p class="has-text-align-center has-body-text-color has-text-color">Years of reliable service</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"typography":{"textAlign":"center"}}} -->
		<div class="wp-block-column" style="text-align:center">
			<!-- wp:html -->
			<div class="tankless-counter" data-target="0" data-suffix="">0</div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"align":"center","textColor":"body-text"} -->
			<p class="has-text-align-center has-body-text-color has-text-color">Maintenance required</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

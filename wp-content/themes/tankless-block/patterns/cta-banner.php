<?php
/**
 * Title: CTA banner
 * Slug: tankless-block/cta-banner
 * Categories: tankless-block
 * Description: Full-width gradient call-to-action banner, replicating "Go Tankless. Endless Hot Water. Zero Worries."
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}},"color":{"gradient":"var:preset|gradient|primary-to-secondary"}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignfull has-background tankless-reveal" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);background:linear-gradient(135deg, #29aae2, #007aff)">

	<!-- wp:heading {"textAlign":"center","textColor":"accent-black"} -->
	<h2 class="wp-block-heading has-text-align-center has-accent-black-color has-text-color">Go Tankless. Endless Hot Water. Zero Worries.</h2>
	<!-- /wp:heading -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"accent-black","textColor":"heading"} -->
		<div class="wp-block-button">
			<a class="wp-block-button__link has-heading-color has-accent-black-background-color has-text-color has-background wp-element-button">Find Dealer Nearby</a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

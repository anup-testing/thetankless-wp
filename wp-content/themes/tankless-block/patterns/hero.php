<?php
/**
 * Title: Hero
 * Slug: tankless-block/hero
 * Categories: tankless-block
 * Description: Full-width dark hero with a heading, supporting text, CTA button, and a reveal-on-scroll animation.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"body-bg","layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-body-bg-background-color has-background tankless-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"3.25rem","fontWeight":"800"}},"textColor":"heading"} -->
	<h1 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="font-size:3.25rem;font-weight:800">Effortless Hot Water, No More Waiting</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"body-text","style":{"typography":{"fontSize":"1.25rem"}}} -->
	<p class="has-text-align-center has-body-text-color has-text-color" style="font-size:1.25rem">Save Space, Save Money, Go Tankless.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"primary","textColor":"accent-black"} -->
		<div class="wp-block-button">
			<a class="wp-block-button__link has-accent-black-color has-primary-background-color has-text-color has-background wp-element-button">Get Your Tankless Today</a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<?php
/**
 * Title: Contact section
 * Slug: tankless-block/contact-section
 * Categories: tankless-block
 * Description: Contact info + a self-contained native form (no Contact Form 7) that posts to admin-post.php.
 */

$tankless_contact_status = isset( $_GET['tankless_contact'] ) ? sanitize_key( wp_unslash( $_GET['tankless_contact'] ) ) : '';
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"body-bg","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-body-bg-background-color has-background tankless-reveal" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"textAlign":"center","level":1,"textColor":"heading"} -->
	<h1 class="wp-block-heading has-text-align-center has-heading-color has-text-color">Contact Us</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"body-text"} -->
	<p class="has-text-align-center has-body-text-color has-text-color">Please take a moment to fill out the form, and we promise to get back to you within 2 hours — support@thetankless.ca</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"backgroundColor":"tertiary","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"12px"}}} -->
		<div class="wp-block-column has-tertiary-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

			<!-- wp:heading {"level":3,"textColor":"primary"} -->
			<h3 class="wp-block-heading has-primary-color has-text-color">Get a response in 2 hours</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"body-text"} -->
			<p class="has-body-text-color has-text-color">support@thetankless.ca</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"20px"} -->
			<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"level":4,"textColor":"heading"} -->
			<h4 class="wp-block-heading has-heading-color has-text-color">Service Area</h4>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"body-text"} -->
			<p class="has-body-text-color has-text-color">Serving homeowners and contractors across Ontario.</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"66%"} -->
		<div class="wp-block-column" style="flex-basis:66%">

			<?php if ( 'success' === $tankless_contact_status ) : ?>
			<!-- wp:paragraph {"backgroundColor":"primary","textColor":"accent-black","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"8px"}}} -->
			<p class="has-accent-black-color has-primary-background-color has-text-color has-background" style="border-radius:8px;padding-top:1rem;padding-right:1.5rem;padding-bottom:1rem;padding-left:1.5rem">Thanks — your message has been sent. We'll be in touch shortly.</p>
			<!-- /wp:paragraph -->
			<?php elseif ( 'error' === $tankless_contact_status ) : ?>
			<!-- wp:paragraph {"style":{"color":{"background":"#4a1414","text":"#ff8080"},"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"8px"}}} -->
			<p class="has-text-color has-background" style="background-color:#4a1414;color:#ff8080;border-radius:8px;padding-top:1rem;padding-right:1.5rem;padding-bottom:1rem;padding-left:1.5rem">Something went wrong — please check the form and try again.</p>
			<!-- /wp:paragraph -->
			<?php endif; ?>

			<!-- wp:html -->
			<form class="tankless-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="tankless_contact_form">
				<?php wp_nonce_field( 'tankless_contact_form', 'tankless_contact_nonce' ); ?>
				<p style="position:absolute;left:-9999px;" aria-hidden="true">
					<label>Leave this field empty<input type="text" name="tankless_website" tabindex="-1" autocomplete="off"></label>
				</p>
				<p>
					<label for="tankless_name">Name</label><br>
					<input type="text" id="tankless_name" name="tankless_name" required>
				</p>
				<p>
					<label for="tankless_email">Email</label><br>
					<input type="email" id="tankless_email" name="tankless_email" required>
				</p>
				<p>
					<label for="tankless_phone">Phone</label><br>
					<input type="tel" id="tankless_phone" name="tankless_phone">
				</p>
				<p>
					<label for="tankless_message">Message</label><br>
					<textarea id="tankless_message" name="tankless_message" rows="5" required></textarea>
				</p>
				<button type="submit" class="wp-element-button">Send Message</button>
			</form>
			<!-- /wp:html -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

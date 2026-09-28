<?php
/**
 * Tankless Block theme setup.
 *
 * A dependency-free block theme: no Elementor, no page-builder plugin, no
 * jQuery/GSAP. Animations and the stats counter run on a small vanilla-JS
 * file enqueued below.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tankless-block' ),
		'footer'  => __( 'Footer Menu', 'tankless-block' ),
	) );
} );

add_action( 'init', function () {
	register_block_pattern_category( 'tankless-block', array(
		'label' => __( 'Tankless', 'tankless-block' ),
	) );
} );

/**
 * Native contact form handler — no Contact Form 7, no plugin dependency.
 * Verifies a nonce (CSRF), a honeypot field (basic bot filtering), and a
 * simple per-IP transient throttle, then sends via wp_mail().
 */
function tankless_block_handle_contact_form() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	if (
		! isset( $_POST['tankless_contact_nonce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tankless_contact_nonce'] ) ), 'tankless_contact_form' )
	) {
		wp_safe_redirect( add_query_arg( 'tankless_contact', 'error', $redirect ) );
		exit;
	}

	// Honeypot: real visitors never fill this hidden field in.
	if ( ! empty( $_POST['tankless_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'tankless_contact', 'success', $redirect ) );
		exit;
	}

	$ip           = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	$throttle_key = 'tankless_contact_' . md5( $ip );
	if ( get_transient( $throttle_key ) ) {
		wp_safe_redirect( add_query_arg( 'tankless_contact', 'error', $redirect ) );
		exit;
	}

	$name    = isset( $_POST['tankless_name'] ) ? sanitize_text_field( wp_unslash( $_POST['tankless_name'] ) ) : '';
	$email   = isset( $_POST['tankless_email'] ) ? sanitize_email( wp_unslash( $_POST['tankless_email'] ) ) : '';
	$phone   = isset( $_POST['tankless_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['tankless_phone'] ) ) : '';
	$message = isset( $_POST['tankless_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['tankless_message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'tankless_contact', 'error', $redirect ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = sprintf( '[%s] New contact form submission', get_bloginfo( 'name' ) );
	$body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$sent = wp_mail( $to, $subject, $body, $headers );

	set_transient( $throttle_key, 1, 60 );

	wp_safe_redirect( add_query_arg( 'tankless_contact', $sent ? 'success' : 'error', $redirect ) );
	exit;
}
add_action( 'admin_post_tankless_contact_form', 'tankless_block_handle_contact_form' );
add_action( 'admin_post_nopriv_tankless_contact_form', 'tankless_block_handle_contact_form' );

add_action( 'wp_enqueue_scripts', function () {
	$theme = wp_get_theme();

	wp_enqueue_style(
		'tankless-block-animations',
		get_theme_file_uri( 'assets/css/animations.css' ),
		array(),
		$theme->get( 'Version' )
	);

	wp_enqueue_script(
		'tankless-block-animations',
		get_theme_file_uri( 'assets/js/animations.js' ),
		array(),
		$theme->get( 'Version' ),
		array( 'strategy' => 'defer', 'in_footer' => true )
	);
} );

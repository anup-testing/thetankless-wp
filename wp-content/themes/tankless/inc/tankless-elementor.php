<?php
/**
 * Elementor Pro Theme Builder integration for the Tankless theme.
 *
 * Without a theme registering the 'header'/'footer' locations itself,
 * Elementor Pro's Theme_Support class silently takes over BOTH
 * get_header and get_footer the moment ANY Theme Builder document (even
 * just a footer) is active, discarding this theme's real header.php
 * output in the process. Registering both locations here stops Elementor
 * Pro from doing that; header.php / footer.php then call
 * elementor_theme_do_location() themselves at the right point so whichever
 * location actually has an active document renders there, and nowhere else.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register 'header' and 'footer' as theme-owned Elementor locations.
 *
 * @param \ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $location_manager
 */
function tankless_register_elementor_locations( $location_manager ) {
	if ( ! is_object( $location_manager ) || ! method_exists( $location_manager, 'register_location' ) ) {
		return;
	}

	$location_manager->register_location( 'header' );
	$location_manager->register_location( 'footer' );
}

if ( class_exists( '\ElementorPro\Modules\ThemeBuilder\Module' ) ) {
	add_action( 'elementor/theme/register_locations', 'tankless_register_elementor_locations' );
}

/**
 * Hide the theme's own title/breadcrumb block on specific Elementor pages
 * that use Elementor's "Hide Title" document setting. That block
 * (modules/breadcrumb) is rendered directly in header.php, independent of
 * Elementor's own --page-title-display CSS var, so it has to be unhooked
 * explicitly per page.
 *
 * Migrated from mu-plugins/hero-page-title.php.
 */
function tankless_hero_page_title() {
	if ( ! function_exists( 'is_page' ) ) {
		return;
	}

	$hidden_title_pages = [ 5285 ];

	if ( is_page( $hidden_title_pages ) ) {
		remove_action( 'glidex_breadcrumb', 'glidex_breadcrumb_template' );
	}
}
add_action( 'wp', 'tankless_hero_page_title' );

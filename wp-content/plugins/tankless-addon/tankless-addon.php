<?php
/**
 * Plugin Name: Tankless Addon
 * Description: Consolidated theme addon for Tankless (merges Glidex Plus, Glidex Pro, and the WeDesignTech Elementor Addon into a single plugin).
 * Version: 1.0.0
 * Author: The Tankless
 * Text Domain: tankless-addon
 *
 * This plugin bundles the unmodified code of three previously-separate plugins
 * as sub-directories, in their original load order (Glidex Plus must load
 * before Glidex Pro, which checks `class_exists('GlidexPlus')` at runtime).
 * Each sub-plugin computes its own path/URL constants from its own __FILE__,
 * so nesting them here does not require touching their internals.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'TANKLESS_ADDON_DIR_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

require_once TANKLESS_ADDON_DIR_PATH . 'glidex-plus/glidex-plus.php';
require_once TANKLESS_ADDON_DIR_PATH . 'glidex-pro/glidex-pro.php';
require_once TANKLESS_ADDON_DIR_PATH . 'wedesigntech-elementor-addon/wedesigntech-elementor-addon.php';

/**
 * Seed the shared "glidex-customiser-option" defaults on first activation.
 * Mirrors what the three original plugins' own (now-unreachable) activation
 * hooks did, since register_activation_hook() only fires for the plugin file
 * that was actually activated from the Plugins screen (this one).
 */
register_activation_hook( __FILE__, 'tankless_addon_activation_hook' );
function tankless_addon_activation_hook() {
	$settings = get_option( GLIDEX_CUSTOMISER_VAL );

	if ( empty( $settings ) ) {
		$settings = apply_filters( 'glidex_plus_customizer_default', array() );
	}

	$settings = ( is_array( $settings ) && ! empty( $settings ) ) ? $settings : array();

	if ( ! array_key_exists( 'pro-settings-updated', $settings ) ) {
		$pro_defaults = apply_filters( 'glidex_pro_customizer_default', array( 'pro-settings-updated' => true ) );
		$settings     = array_merge( $settings, $pro_defaults );
	}

	update_option( GLIDEX_CUSTOMISER_VAL, $settings );
}

/**
 * The WeDesignTech Elementor widgets only register via Elementor's own hooks
 * (safe no-op if Elementor is missing), but surface a visible admin notice
 * instead of silently doing nothing, since those widgets won't appear.
 */
add_action( 'admin_notices', 'tankless_addon_missing_elementor_notice' );
function tankless_addon_missing_elementor_notice() {
	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		return;
	}
	echo '<div class="notice notice-warning is-dismissible"><p>'
		. esc_html__( '"Tankless Addon" requires "Elementor" to be installed and activated for its Elementor widgets/templates to work.', 'tankless-addon' )
		. '</p></div>';
}

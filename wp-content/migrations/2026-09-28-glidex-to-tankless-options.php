<?php
/**
 * One-time migration: copy glidex-named wp_options rows forward to their
 * tankless-named equivalents, preserving the original rows (re-runnable,
 * non-destructive). Run via: wp eval-file migrate_glidex_options.php
 *
 * Does NOT touch theme_mods_glidex / theme_mods_glidex-child - those belong
 * to the separate, inactive glidex/glidex-child themes, not to tankless.
 */

$map = array(
	'glidex-customiser-option'    => 'tankless-customiser-option',
	'glidex-widget-areas'         => 'tankless-widget-areas',
	'_glidex_cs_options'          => '_tankless_cs_options',
	'widget_glidex_advance_field' => 'widget_tankless_advance_field',
	'widget_glidex_recent_posts'  => 'widget_tankless_recent_posts',
	'widget_glidex_orderby'       => 'widget_tankless_orderby',
);

foreach ( $map as $old_name => $new_name ) {
	global $wpdb;
	$exists_old = $wpdb->get_var( $wpdb->prepare( "SELECT option_id FROM {$wpdb->options} WHERE option_name = %s", $old_name ) );
	if ( ! $exists_old ) {
		WP_CLI::log( "SKIP  $old_name -> $new_name (old option not found)" );
		continue;
	}

	// Always overwrite with the historical glidex-named value: the renamed
	// theme/plugin code may have already auto-created an empty/default
	// "new_name" row on first page load after deploy (e.g. functions.php's
	// widget-areas bootstrap), which would otherwise silently shadow real
	// historical data if we only copied when "new" didn't exist yet.
	$exists_new = $wpdb->get_var( $wpdb->prepare( "SELECT option_id FROM {$wpdb->options} WHERE option_name = %s", $new_name ) );
	$value      = get_option( $old_name );
	update_option( $new_name, $value );

	WP_CLI::success( ( $exists_new ? 'Overwrote' : 'Copied' ) . " $old_name -> $new_name" );
}

// sidebars_widgets: rename the 'glidex-standard-sidebar-1' key to
// 'tankless-standard-sidebar-1' if present, preserving its widget list.
$sidebars_widgets = get_option( 'sidebars_widgets' );
if ( is_array( $sidebars_widgets ) && isset( $sidebars_widgets['glidex-standard-sidebar-1'] ) ) {
	if ( ! isset( $sidebars_widgets['tankless-standard-sidebar-1'] ) ) {
		$sidebars_widgets['tankless-standard-sidebar-1'] = $sidebars_widgets['glidex-standard-sidebar-1'];
		update_option( 'sidebars_widgets', $sidebars_widgets );
		WP_CLI::success( "Copied sidebars_widgets['glidex-standard-sidebar-1'] -> ['tankless-standard-sidebar-1']" );
	} else {
		WP_CLI::log( "SKIP  sidebars_widgets tankless-standard-sidebar-1 key already exists" );
	}
} else {
	WP_CLI::log( "SKIP  sidebars_widgets has no glidex-standard-sidebar-1 key" );
}

WP_CLI::success( 'Migration complete. Original glidex-named rows were left in place (not deleted).' );

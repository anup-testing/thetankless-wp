<?php
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'tankless_after_main_css', 'sidebar_style' );
function sidebar_style() {
    wp_enqueue_style( 'tankless-secondary', get_theme_file_uri('/modules/sidebar/assets/css/sidebar.css'), false, TANKLESS_THEME_VERSION, 'all');
}

if( !function_exists( 'tankless_check_sidebar_has_active_widgets' ) ) {
	function tankless_check_sidebar_has_active_widgets() {

		$active_items = 0;
		$active_sidebars = tankless_get_active_sidebars();
		if(is_array($active_sidebars) && !empty($active_sidebars)) {
			foreach( $active_sidebars as $active_sidebar ) {
				if( is_active_sidebar( $active_sidebar ) ) {
					$active_items++;
				}
			}
		}

		if($active_items > 0) {
			return true;
		}

		return false;

	}
}

if( !function_exists( 'tankless_get_primary_classes' ) ) {
	function tankless_get_primary_classes() {
		$default = 'page-with-sidebar with-right-sidebar';
		if(tankless_check_sidebar_has_active_widgets()) {
			return apply_filters( 'tankless_primary_classes', $default );
		} else {
			return 'content-full-width';
		}
	}
}

if( !function_exists( 'tankless_get_secondary_classes' ) ) {
	function tankless_get_secondary_classes() {
		$default = 'secondary-sidebar secondary-has-right-sidebar';
		if(tankless_check_sidebar_has_active_widgets()) {
			return apply_filters( 'tankless_secondary_classes', $default );
		} else {
			return '';
		}
	}
}

if( !function_exists( 'tankless_get_active_sidebars' ) ) {
	function tankless_get_active_sidebars() {
		return apply_filters( 'tankless_active_sidebars', array( 'tankless-standard-sidebar-1' ) );
	}
}

add_action( 'widgets_init', 'tankless_sidebars' );
function tankless_sidebars() {
	$sidebars = array(
		'name'          => esc_html__( 'Standard Sidebar', 'tankless' ),
		'id'            => 'tankless-standard-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);

	if( !empty( $sidebars ) ) {
		register_sidebar( $sidebars );
	}
}

add_action( 'after_switch_theme', 'tankless_update_default_widgets' );
function tankless_update_default_widgets() {

	// Add widgets programmatically

	$sidebars_widgets = get_option('sidebars_widgets');
    if(isset($sidebars_widgets['tankless-standard-sidebar-1']) && !empty($sidebars_widgets['tankless-standard-sidebar-1'])) {
        return;
    }

	$sidebars_widgets['tankless-standard-sidebar-1'] = array (
		'search-1',
		'recent-posts-1',
		'recent-comments-1',
		'archives-1',
		'categories-1',
	);
	update_option('sidebars_widgets', $sidebars_widgets);

	$search_widget_content[1]['title'] = esc_html__( 'Search', 'tankless' );
	update_option( 'widget_search', $search_widget_content );

	$rp_widget_content[1]['title'] = esc_html__( 'Recent Posts', 'tankless' );
	update_option( 'widget_recent-posts', $rp_widget_content );

	$rc_widget_content[1]['title'] = esc_html__( 'Recent Comments', 'tankless' );
	update_option( 'widget_recent-comments', $rc_widget_content );

	$archives_widget_content[1]['title'] = esc_html__( 'Archives', 'tankless' );
	update_option( 'widget_archives', $archives_widget_content );

	$categories_widget_content[1]['title'] = esc_html__( 'Categories', 'tankless' );
	$categories_widget_content[1]['hierarchical'] = 1;
	update_option( 'widget_categories', $categories_widget_content );

}
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (! class_exists ( 'GlidexPlusFooterPostType' ) ) {

	class GlidexPlusFooterPostType {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

		function __construct() {

			add_action ( 'init', array( $this, 'glidex_register_cpt' ) );
			add_filter ( 'template_include', array ( $this, 'glidex_template_include' ) );
		}

		function glidex_register_cpt() {

			$labels = array (
				'name'				 => __( 'Footers', 'glidex-plus' ),
				'singular_name'		 => __( 'Footer', 'glidex-plus' ),
				'menu_name'			 => __( 'Footers', 'glidex-plus' ),
				'add_new'			 => __( 'Add Footer', 'glidex-plus' ),
				'add_new_item'		 => __( 'Add New Footer', 'glidex-plus' ),
				'edit'				 => __( 'Edit Footer', 'glidex-plus' ),
				'edit_item'			 => __( 'Edit Footer', 'glidex-plus' ),
				'new_item'			 => __( 'New Footer', 'glidex-plus' ),
				'view'				 => __( 'View Footer', 'glidex-plus' ),
				'view_item' 		 => __( 'View Footer', 'glidex-plus' ),
				'search_items' 		 => __( 'Search Footers', 'glidex-plus' ),
				'not_found' 		 => __( 'No Footers found', 'glidex-plus' ),
				'not_found_in_trash' => __( 'No Footers found in Trash', 'glidex-plus' ),
			);

			$args = array (
				'labels' 				=> $labels,
				'public' 				=> true,
				'exclude_from_search'	=> true,
				'show_in_nav_menus' 	=> false,
				'show_in_rest' 			=> true,
				'menu_position'			=> 26,
				'menu_icon' 			=> 'dashicons-editor-insertmore',
				'hierarchical' 			=> false,
				'supports' 				=> array ( 'title', 'editor', 'revisions' ),
			);

			register_post_type ( 'wdt_footers', $args );
		}

		function glidex_template_include($template) {
			if ( is_singular( 'wdt_footers' ) ) {
				if ( ! file_exists ( get_stylesheet_directory () . '/single-wdt_footers.php' ) ) {
					$template = GLIDEX_PLUS_DIR_PATH . 'post-types/templates/single-wdt_footers.php';
				}
			}

			return $template;
		}
	}
}

GlidexPlusFooterPostType::instance();
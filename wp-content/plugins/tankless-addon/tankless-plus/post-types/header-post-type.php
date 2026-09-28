<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (! class_exists ( 'TanklessPlusHeaderPostType' ) ) {

	class TanklessPlusHeaderPostType {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

		function __construct() {

			add_action ( 'init', array( $this, 'tankless_register_cpt' ), 5 );
			add_filter ( 'template_include', array ( $this, 'tankless_template_include' ) );
		}

		function tankless_register_cpt() {

			$labels = array (
				'name'				 => __( 'Headers', 'tankless-plus' ),
				'singular_name'		 => __( 'Header', 'tankless-plus' ),
				'menu_name'			 => __( 'Headers', 'tankless-plus' ),
				'add_new'			 => __( 'Add Header', 'tankless-plus' ),
				'add_new_item'		 => __( 'Add New Header', 'tankless-plus' ),
				'edit'				 => __( 'Edit Header', 'tankless-plus' ),
				'edit_item'			 => __( 'Edit Header', 'tankless-plus' ),
				'new_item'			 => __( 'New Header', 'tankless-plus' ),
				'view'				 => __( 'View Header', 'tankless-plus' ),
				'view_item' 		 => __( 'View Header', 'tankless-plus' ),
				'search_items' 		 => __( 'Search Headers', 'tankless-plus' ),
				'not_found' 		 => __( 'No Headers found', 'tankless-plus' ),
				'not_found_in_trash' => __( 'No Headers found in Trash', 'tankless-plus' ),
			);

			$args = array (
				'labels' 				=> $labels,
				'public' 				=> true,
				'exclude_from_search'	=> true,
				'show_in_nav_menus' 	=> false,
				'show_in_rest' 			=> true,
				'menu_position'			=> 25,
				'menu_icon' 			=> 'dashicons-heading',
				'hierarchical' 			=> false,
				'supports' 				=> array ( 'title', 'editor', 'revisions' ),
			);

			register_post_type ( 'wdt_headers', $args );
		}

		function tankless_template_include($template) {
			if ( is_singular( 'wdt_headers' ) ) {
				if ( ! file_exists ( get_stylesheet_directory () . '/single-wdt_headers.php' ) ) {
					$template = TANKLESS_PLUS_DIR_PATH . 'post-types/templates/single-wdt_headers.php';
				}
			}

			return $template;
		}
	}
}

TanklessPlusHeaderPostType::instance();
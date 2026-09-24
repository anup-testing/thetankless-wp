<?php

/**
 * WooCommerce - Elementor Single Widgets Core Class
 */

namespace GlidexElementor\widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Glidex_Shop_Elementor_Single_Social_Widgets {

	/**
	 * A Reference to an instance of this class
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	function __construct() {

		$this->glidex_shop_load_modules();

		add_action( 'glidex_shop_register_widgets', array( $this, 'glidex_shop_register_widgets' ), 20, 1 );

		add_action( 'glidex_shop_register_widget_styles', array( $this, 'glidex_shop_register_widget_styles' ), 10, 1 );

		add_action( 'glidex_shop_preview_styles', array( $this, 'glidex_shop_preview_styles') );

	}

	/**
	 * Init
	 */
	function glidex_shop_load_modules() {

		require glidex_shop_single_module_social_share_and_follow()->module_dir_path() . 'elementor/utils.php';

	}

	/**
	 * Register widgets
	 */
	function glidex_shop_register_widgets( $widgets_manager ) {

		require glidex_shop_single_module_social_share_and_follow()->module_dir_path() . 'elementor/widgets/index.php';
		$widgets_manager->register( new Glidex_Shop_Widget_Product_Summary_Extend() );

	}

	/**
	 * Register widgets styles
	 */
	function glidex_shop_register_widget_styles( $suffix ) {

		# Social Sahre & Follow

			wp_register_style( 'wdt-shop-social-share-and-follow',
				glidex_shop_single_module_social_share_and_follow()->module_dir_url() . 'elementor/widgets/assets/css/style'.$suffix.'.css',
				array()
			);

	}

	/**
	 * Editor Preview Style
	 */
	function glidex_shop_preview_styles() {

		# Social Sahre & Follow
			wp_enqueue_style( 'wdt-shop-social-share-and-follow' );

	}

}

Glidex_Shop_Elementor_Single_Social_Widgets::instance();
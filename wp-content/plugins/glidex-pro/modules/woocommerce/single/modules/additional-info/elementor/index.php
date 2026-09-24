<?php

/**
 * WooCommerce - Elementor Single Widgets Core Class
 */

namespace GlidexElementor\widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Glidex_Shop_Elementor_Single_Additional_Info_Widgets {

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

		$this->glidex_shop_load_ai_modules();

		add_action( 'glidex_shop_register_widget_styles', array( $this, 'glidex_shop_register_widget_styles' ), 10, 1 );
		add_action( 'glidex_shop_register_widget_scripts', array( $this, 'glidex_shop_register_widget_scripts' ), 10, 1 );

		add_action( 'glidex_shop_preview_styles', array( $this, 'glidex_shop_preview_styles') );

	}

	/**
	 * Init
	 */
	function glidex_shop_load_ai_modules() {

		require glidex_shop_single_module_additional_info()->module_dir_path() . 'elementor/utils.php';

	}

	/**
	 * Register widgets styles
	 */
	function glidex_shop_register_widget_styles( $suffix ) {

		wp_register_style( 'wdt-shop-additional-info',
			glidex_shop_single_module_additional_info()->module_dir_url() . 'assets/css/style'.$suffix.'.css',
			array()
		);

	}

	/**
	 * Register widgets scripts
	 */
	function glidex_shop_register_widget_scripts( $suffix ) {

		wp_register_script( 'wdt-shop-additional-info',
			glidex_shop_single_module_additional_info()->module_dir_url() . 'assets/js/scripts'.$suffix.'.js',
			array( 'jquery' ),
			false,
			true
		);

	}

	/**
	 * Editor Preview Style
	 */
	function glidex_shop_preview_styles() {

		wp_enqueue_style( 'wdt-shop-additional-info' );

	}

}

Glidex_Shop_Elementor_Single_Additional_Info_Widgets::instance();
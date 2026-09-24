<?php

/**
 * WooCommerce - Single - Module - 360 Viewer - Customizer Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Glidex_Shop_Customizer_Single_360_Viewer' ) ) {

    class Glidex_Shop_Customizer_Single_360_Viewer {

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            add_filter( 'glidex_woo_single_page_settings', array( $this, 'single_page_settings' ), 10, 1 );
            add_action( 'customize_register', array( $this, 'register' ), 15);

        }

        function single_page_settings( $settings ) {

            $product_show_360_viewer                   = glidex_customizer_settings('wdt-single-product-show-360-viewer' );
            $settings['product_show_360_viewer']       = $product_show_360_viewer;

            return $settings;

        }

        function register( $wp_customize ) {

            /**
            * Option : Show Product 360 Viewer
            */
                $wp_customize->add_setting(
                    GLIDEX_CUSTOMISER_VAL . '[wdt-single-product-show-360-viewer]', array(
                        'type' => 'option'
                    )
                );

                $wp_customize->add_control(
                    new Glidex_Customize_Control_Switch(
                        $wp_customize, GLIDEX_CUSTOMISER_VAL . '[wdt-single-product-show-360-viewer]', array(
                            'type'    => 'wdt-switch',
                            'label'   => esc_html__( 'Show Product 360 Viewer', 'glidex-pro'),
                            'section' => 'woocommerce-single-page-default-section',
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'glidex-pro' ),
                                'off' => esc_attr__( 'No', 'glidex-pro' )
                            ),
                            'description'   => esc_html__('This option is applicable only for "WooCommerce Default" single page.', 'glidex-pro'),
                        )
                    )
                );

        }

    }

}


if( !function_exists('glidex_shop_customizer_single_360_viewer') ) {
	function glidex_shop_customizer_single_360_viewer() {
		return Glidex_Shop_Customizer_Single_360_Viewer::instance();
	}
}

glidex_shop_customizer_single_360_viewer();
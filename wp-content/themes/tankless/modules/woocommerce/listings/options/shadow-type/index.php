<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Tankless_Woo_Listing_Option_Shadow_Type' ) ) {

    class Tankless_Woo_Listing_Option_Shadow_Type extends Tankless_Woo_Listing_Option_Core {

        private static $_instance = null;

        public $option_slug;

        public $option_name;

        public $option_type;

        public $option_default_value;

        public $option_value_prefix;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

            $this->option_slug          = 'product-shadow-type';
            $this->option_name          = esc_html__('Shadow Type', 'tankless');
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_default_value = 'product-shadow-type-default';
            $this->option_value_prefix  = 'product-shadow-type-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'tankless_woo_custom_product_template_common_options', array( $this, 'woo_custom_product_template_common_options'), 50, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_common_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'common';
        }

        /**
         * Setting Args
         */
        function setting_args() {
            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'select';
            $settings['title']   =  $this->option_name;
            $settings['options'] =  array (
                'product-shadow-type-default' => esc_html__('Default', 'tankless'),
                'product-shadow-type-thumb'   => esc_html__('Thumb', 'tankless'),
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('tankless_woo_listing_option_shadow_type') ) {
	function tankless_woo_listing_option_shadow_type() {
		return Tankless_Woo_Listing_Option_Shadow_Type::instance();
	}
}

tankless_woo_listing_option_shadow_type();
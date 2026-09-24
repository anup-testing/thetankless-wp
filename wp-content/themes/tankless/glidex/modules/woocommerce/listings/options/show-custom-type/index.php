<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Glidex_Woo_Listing_Option_Show_Custom_Type' ) ) {

    class Glidex_Woo_Listing_Option_Show_Custom_Type extends Glidex_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-show-custom-type';
            $this->option_name          = esc_html__('Show Custom Product Type', 'glidex');
            $this->option_type          = array ( 'html', 'class', 'key-css' );
            $this->option_default_value = 'false';
            $this->option_value_prefix  = '';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'glidex_woo_custom_product_template_common_options', array( $this, 'woo_custom_product_template_common_options'), 85, 1 );
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
                'true'  => esc_html__('True', 'glidex'),
                'false' => esc_html__('False', 'glidex'),
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('glidex_woo_listing_option_show_custom_type') ) {
	function glidex_woo_listing_option_show_custom_type() {
		return Glidex_Woo_Listing_Option_Show_Custom_Type::instance();
	}
}

glidex_woo_listing_option_show_custom_type();
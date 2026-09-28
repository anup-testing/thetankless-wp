<?php

/**
 * Listing Options - Product Thumb Content
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Tankless_Woo_Listing_Option_Thumb_Element_Group' ) ) {

    class Tankless_Woo_Listing_Option_Thumb_Element_Group extends Tankless_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-thumb-element-group';
            $this->option_name          = esc_html__('Element Group Content', 'tankless');
            $this->option_type          = array ( 'html', 'value-css' );
            $this->option_default_value = '';
            $this->option_value_prefix  = '';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {

            /* Custom Product Templates - Options */
            add_filter( 'tankless_woo_custom_product_template_thumb_options', array( $this, 'woo_custom_product_template_thumb_options'), 55, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_thumb_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'thumb';
        }

        /**
         * Setting Arguments
         */
        function setting_args() {

            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'sorter';
            $settings['title']   =  $this->option_name;
            $settings['default'] =  array (
                'enabled' => array(
                    'title' => esc_html__('Title', 'tankless'),
                    'price' => esc_html__('Price', 'tankless'),
                ),
                'disabled'         => array(
                    'cart'           => esc_html__('Cart', 'tankless'),
                    'wishlist'       => esc_html__('Wishlist', 'tankless'),
                    'compare'        => esc_html__('Compare', 'tankless'),
                    'quickview'      => esc_html__('Quick View', 'tankless'),
                    'category'       => esc_html__('Category', 'tankless'),
                    'button_element' => esc_html__('Button Element', 'tankless'),
                    'icons_group'    => esc_html__('Icons Group', 'tankless'),
                    'excerpt'        => esc_html__('Excerpt', 'tankless'),
                    'rating'         => esc_html__('Rating', 'tankless'),
                    'separator'      => esc_html__('Separator', 'tankless'),
                    'swatches'       => esc_html__('Swatches', 'tankless')
                ),
            );
            $settings['enabled_title']  =  esc_html__('Active Elements', 'tankless');
            $settings['disabled_title'] =  esc_html__('Deatcive Elements', 'tankless');

            return $settings;
        }
    }

}

if( !function_exists('tankless_woo_listing_option_thumb_element_group') ) {
	function tankless_woo_listing_option_thumb_element_group() {
		return Tankless_Woo_Listing_Option_Thumb_Element_Group::instance();
	}
}

tankless_woo_listing_option_thumb_element_group();
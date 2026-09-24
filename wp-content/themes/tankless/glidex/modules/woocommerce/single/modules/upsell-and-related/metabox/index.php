<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Glidex_Shop_Metabox_Single_Upsell_Related' ) ) {
    class Glidex_Shop_Metabox_Single_Upsell_Related {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

			add_filter( 'glidex_shop_product_custom_settings', array( $this, 'glidex_shop_product_custom_settings' ), 10 );

		}

        function glidex_shop_product_custom_settings( $options ) {

			$ct_dependency      = array ();
			$upsell_dependency  = array ( 'show-upsell', '==', 'true');
			$related_dependency = array ( 'show-related', '==', 'true');
			if( function_exists('glidex_shop_single_module_custom_template') ) {
				$ct_dependency['dependency'] 	= array ( 'product-template', '!=', 'custom-template');
				$upsell_dependency 				= array ( 'product-template|show-upsell', '!=|==', 'custom-template|true');
				$related_dependency 			= array ( 'product-template|show-related', '!=|==', 'custom-template|true');
			}

			$product_options = array (

				array_merge (
					array(
						'id'         => 'show-upsell',
						'type'       => 'select',
						'title'      => esc_html__('Show Upsell Products', 'glidex'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-upsell' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'glidex' ),
							'true'         => esc_html__( 'Show', 'glidex'),
							null           => esc_html__( 'Hide', 'glidex'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'upsell-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Column', 'glidex'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'glidex' ),
						1              => esc_html__( 'One Column', 'glidex' ),
						2              => esc_html__( 'Two Columns', 'glidex' ),
						3              => esc_html__( 'Three Columns', 'glidex' ),
						4              => esc_html__( 'Four Columns', 'glidex' ),
					),
					'dependency' => $upsell_dependency
				),

				array(
					'id'         => 'upsell-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Limit', 'glidex'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'glidex' ),
						1              => esc_html__( 'One', 'glidex' ),
						2              => esc_html__( 'Two', 'glidex' ),
						3              => esc_html__( 'Three', 'glidex' ),
						4              => esc_html__( 'Four', 'glidex' ),
						5              => esc_html__( 'Five', 'glidex' ),
						6              => esc_html__( 'Six', 'glidex' ),
						7              => esc_html__( 'Seven', 'glidex' ),
						8              => esc_html__( 'Eight', 'glidex' ),
						9              => esc_html__( 'Nine', 'glidex' ),
						10              => esc_html__( 'Ten', 'glidex' ),
					),
					'dependency' => $upsell_dependency
				),

				array_merge (
					array(
						'id'         => 'show-related',
						'type'       => 'select',
						'title'      => esc_html__('Show Related Products', 'glidex'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-related' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'glidex' ),
							'true'         => esc_html__( 'Show', 'glidex'),
							null           => esc_html__( 'Hide', 'glidex'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'related-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Column', 'glidex'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'glidex' ),
						2              => esc_html__( 'Two Columns', 'glidex' ),
						3              => esc_html__( 'Three Columns', 'glidex' ),
						4              => esc_html__( 'Four Columns', 'glidex' ),
					),
					'dependency' => $related_dependency
				),

				array(
					'id'         => 'related-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Limit', 'glidex'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'glidex' ),
						1              => esc_html__( 'One', 'glidex' ),
						2              => esc_html__( 'Two', 'glidex' ),
						3              => esc_html__( 'Three', 'glidex' ),
						4              => esc_html__( 'Four', 'glidex' ),
						5              => esc_html__( 'Five', 'glidex' ),
						6              => esc_html__( 'Six', 'glidex' ),
						7              => esc_html__( 'Seven', 'glidex' ),
						8              => esc_html__( 'Eight', 'glidex' ),
						9              => esc_html__( 'Nine', 'glidex' ),
						10              => esc_html__( 'Ten', 'glidex' ),
					),
					'dependency' => $related_dependency
				)

			);

			$options = array_merge( $options, $product_options );

			return $options;

		}

    }
}

Glidex_Shop_Metabox_Single_Upsell_Related::instance();
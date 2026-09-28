<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Tankless_Shop_Metabox_Single_Upsell_Related' ) ) {
    class Tankless_Shop_Metabox_Single_Upsell_Related {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

			add_filter( 'tankless_shop_product_custom_settings', array( $this, 'tankless_shop_product_custom_settings' ), 10 );

		}

        function tankless_shop_product_custom_settings( $options ) {

			$ct_dependency      = array ();
			$upsell_dependency  = array ( 'show-upsell', '==', 'true');
			$related_dependency = array ( 'show-related', '==', 'true');
			if( function_exists('tankless_shop_single_module_custom_template') ) {
				$ct_dependency['dependency'] 	= array ( 'product-template', '!=', 'custom-template');
				$upsell_dependency 				= array ( 'product-template|show-upsell', '!=|==', 'custom-template|true');
				$related_dependency 			= array ( 'product-template|show-related', '!=|==', 'custom-template|true');
			}

			$product_options = array (

				array_merge (
					array(
						'id'         => 'show-upsell',
						'type'       => 'select',
						'title'      => esc_html__('Show Upsell Products', 'tankless'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-upsell' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'tankless' ),
							'true'         => esc_html__( 'Show', 'tankless'),
							null           => esc_html__( 'Hide', 'tankless'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'upsell-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Column', 'tankless'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'tankless' ),
						1              => esc_html__( 'One Column', 'tankless' ),
						2              => esc_html__( 'Two Columns', 'tankless' ),
						3              => esc_html__( 'Three Columns', 'tankless' ),
						4              => esc_html__( 'Four Columns', 'tankless' ),
					),
					'dependency' => $upsell_dependency
				),

				array(
					'id'         => 'upsell-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Limit', 'tankless'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'tankless' ),
						1              => esc_html__( 'One', 'tankless' ),
						2              => esc_html__( 'Two', 'tankless' ),
						3              => esc_html__( 'Three', 'tankless' ),
						4              => esc_html__( 'Four', 'tankless' ),
						5              => esc_html__( 'Five', 'tankless' ),
						6              => esc_html__( 'Six', 'tankless' ),
						7              => esc_html__( 'Seven', 'tankless' ),
						8              => esc_html__( 'Eight', 'tankless' ),
						9              => esc_html__( 'Nine', 'tankless' ),
						10              => esc_html__( 'Ten', 'tankless' ),
					),
					'dependency' => $upsell_dependency
				),

				array_merge (
					array(
						'id'         => 'show-related',
						'type'       => 'select',
						'title'      => esc_html__('Show Related Products', 'tankless'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-related' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'tankless' ),
							'true'         => esc_html__( 'Show', 'tankless'),
							null           => esc_html__( 'Hide', 'tankless'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'related-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Column', 'tankless'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'tankless' ),
						2              => esc_html__( 'Two Columns', 'tankless' ),
						3              => esc_html__( 'Three Columns', 'tankless' ),
						4              => esc_html__( 'Four Columns', 'tankless' ),
					),
					'dependency' => $related_dependency
				),

				array(
					'id'         => 'related-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Limit', 'tankless'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'tankless' ),
						1              => esc_html__( 'One', 'tankless' ),
						2              => esc_html__( 'Two', 'tankless' ),
						3              => esc_html__( 'Three', 'tankless' ),
						4              => esc_html__( 'Four', 'tankless' ),
						5              => esc_html__( 'Five', 'tankless' ),
						6              => esc_html__( 'Six', 'tankless' ),
						7              => esc_html__( 'Seven', 'tankless' ),
						8              => esc_html__( 'Eight', 'tankless' ),
						9              => esc_html__( 'Nine', 'tankless' ),
						10              => esc_html__( 'Ten', 'tankless' ),
					),
					'dependency' => $related_dependency
				)

			);

			$options = array_merge( $options, $product_options );

			return $options;

		}

    }
}

Tankless_Shop_Metabox_Single_Upsell_Related::instance();
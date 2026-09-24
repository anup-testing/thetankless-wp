<?php

/**
 * WooCommerce - Single - Module - Custom Template - Customizer Settings
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Glidex_Shop_Customizer_Single_Default_CT' ) ) {

    class Glidex_Shop_Customizer_Single_Default_CT {

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

            $product_default_template             = glidex_customizer_settings('wdt-single-product-default-template' );
            $settings['product_default_template'] = $product_default_template;

            return $settings;

        }

        function register($wp_customize)
        {

            /**
             * Option : Product Template
             */
            $wp_customize->add_setting(
             GLIDEX_CUSTOMISER_VAL . '[wdt-single-product-default-template]',
                array(
                    'type' => 'option'
                )
            );

            $wp_customize->add_control(
                new Glidex_Customize_Control
                (
                    $wp_customize,
                 GLIDEX_CUSTOMISER_VAL . '[wdt-single-product-default-template]',
                    array(
                        'type' => 'select',
                        'label' => esc_html__('Product Template', 'glidex-pro'),
                        'section' => 'woocommerce-single-page-default-section',
                        'choices' => apply_filters('glidex_shop_single_product_default_template',
                         array(
                            'woo-default' => esc_html__('WooCommerce Default', 'glidex-pro'),
                            'admin-template' => esc_html__('Admin Default', 'glidex-pro'),
                            'custom-template' => esc_html__('Custom Template', 'glidex-pro')
                         )),
                        'description' => esc_html__('"Custom template" option can be used to create Single product page as per your needs with Edit with elementor and drag the product related widgets.', 'glidex-pro'),

                    )
                )
            );
            $elementor_templates = [];
            $templates = get_posts([
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ]);

            if ($templates) {
                foreach ($templates as $template) {
                    $elementor_templates[$template->ID] = $template->post_title;
                }
            }
            $wp_customize->add_setting(
             GLIDEX_CUSTOMISER_VAL . '[wdt-single-product-default-elementortemplate]',
                array(
                    'type' => 'option'
                )
            );
            $wp_customize->add_control(
                new Glidex_Customize_Control
                (
                    $wp_customize,
                 GLIDEX_CUSTOMISER_VAL . '[wdt-single-product-default-elementortemplate]',
                    array(
                        'type' => 'select',
                        'section' => 'woocommerce-single-page-default-section',
                        'label' => esc_html__('Select Single product Template', 'glidex-pro'),
                        'choices' => $elementor_templates,
                        'description' => esc_html__('"Admin template" will use the same template for all products.', 'glidex-pro'),
                        'dependency' => array('wdt-single-product-default-template', "==", "admin-template")
                    )
                )
            );
        }

    }

}


if( !function_exists('glidex_shop_customizer_single_default_ct') ) {
	function glidex_shop_customizer_single_default_ct() {
		return Glidex_Shop_Customizer_Single_Default_CT::instance();
	}
}

glidex_shop_customizer_single_default_ct();
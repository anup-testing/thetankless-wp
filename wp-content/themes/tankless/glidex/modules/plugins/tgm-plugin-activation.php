<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Glidex WordPress theme
 */

function glidex_tgmpa_plugins_register() {

	// Get array of recommended plugins.

	$plugins_list = array(
        array(
            'name'               => esc_html__('DesignThemes Store Locator', 'glidex'),
            'slug'               => 'designthemes-storelocator',
            'source'             => GLIDEX_MODULE_DIR . '/plugins/designthemes-storelocator.rar',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Glidex Plus', 'glidex'),
            'slug'               => 'glidex-plus',
            'source'             => GLIDEX_MODULE_DIR . '/plugins/glidex-plus.rar',
            'required'           => true,
            'version'            => '1.0.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
         array(
            'name'               => esc_html__('Glidex Pro', 'glidex'),
            'slug'               => 'glidex-pro',
            'source'             => GLIDEX_MODULE_DIR . '/plugins/glidex-pro.rar',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Glidex Shop', 'glidex'),
            'slug'               => 'glidex-shop',
            'source'             => GLIDEX_MODULE_DIR . '/plugins/glidex-shop.rar',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('WeDesignTech Elementor Addon', 'glidex'),
            'slug'               => 'wedesigntech-elementor-addon',
            'source'             => GLIDEX_MODULE_DIR . '/plugins/wedesigntech-elementor-addon.rar',
            'required'           => true,
            'version'            => '1.0.4',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('Elementor', 'glidex'),
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Contact Form 7', 'glidex'),
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
         array(
            'name'     => esc_html__('Tidio Chat', 'glidex'),
            'slug'     => 'tidio-live-chat',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('GTranslate', 'glidex'),
            'slug'     => 'gtranslate',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('WooCommerce', 'glidex'),
            'slug'     => 'woocommerce',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Wishlist', 'glidex'),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('FOX - Currency Switcher Professional for WooCommerce', 'glidex'),
            'slug'     => 'woocommerce-currency-switcher',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Variation Swatches for WooCommerce', 'glidex'),
            'slug'     => 'woo-variation-swatches',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Quick View', 'glidex'),
            'slug'     => 'yith-woocommerce-quick-view',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('One Click Demo Import', 'glidex'),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        )
	);

    $plugins = apply_filters('glidex_required_plugins_list', $plugins_list);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'glidex_theme',
		'domain'       => 'glidex',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'glidex_tgmpa_plugins_register' );
<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Glidex WordPress theme
 */

function tankless_tgmpa_plugins_register() {

	// Get array of recommended plugins.

	$plugins_list = array(
        array(
            'name'               => esc_html__('DesignThemes Store Locator', 'tankless'),
            'slug'               => 'designthemes-storelocator',
            'source'             => TANKLESS_MODULE_DIR . '/plugins/designthemes-storelocator.rar',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Glidex Plus', 'tankless'),
            'slug'               => 'glidex-plus',
            'source'             => TANKLESS_MODULE_DIR . '/plugins/glidex-plus.rar',
            'required'           => true,
            'version'            => '1.0.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
         array(
            'name'               => esc_html__('Glidex Pro', 'tankless'),
            'slug'               => 'glidex-pro',
            'source'             => TANKLESS_MODULE_DIR . '/plugins/glidex-pro.rar',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Glidex Shop', 'tankless'),
            'slug'               => 'glidex-shop',
            'source'             => TANKLESS_MODULE_DIR . '/plugins/glidex-shop.rar',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('WeDesignTech Elementor Addon', 'tankless'),
            'slug'               => 'wedesigntech-elementor-addon',
            'source'             => TANKLESS_MODULE_DIR . '/plugins/wedesigntech-elementor-addon.rar',
            'required'           => true,
            'version'            => '1.0.4',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('Elementor', 'tankless'),
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Contact Form 7', 'tankless'),
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
         array(
            'name'     => esc_html__('Tidio Chat', 'tankless'),
            'slug'     => 'tidio-live-chat',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('GTranslate', 'tankless'),
            'slug'     => 'gtranslate',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('WooCommerce', 'tankless'),
            'slug'     => 'woocommerce',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Wishlist', 'tankless'),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('FOX - Currency Switcher Professional for WooCommerce', 'tankless'),
            'slug'     => 'woocommerce-currency-switcher',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Variation Swatches for WooCommerce', 'tankless'),
            'slug'     => 'woo-variation-swatches',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Quick View', 'tankless'),
            'slug'     => 'yith-woocommerce-quick-view',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('One Click Demo Import', 'tankless'),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        )
	);

    $plugins = apply_filters('tankless_required_plugins_list', $plugins_list);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'tankless_theme',
		'domain'       => 'tankless',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'tankless_tgmpa_plugins_register' );
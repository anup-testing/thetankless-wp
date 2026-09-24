<?php

/*
* Update Summary - Options Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_options_bn_render' ) ) {
	function glidex_shop_woo_single_summary_options_bn_render( $options ) {

		$options['buy_now'] = esc_html__('Summary Buy Now', 'glidex-pro');
		return $options;

	}
	add_filter( 'glidex_shop_woo_single_summary_options', 'glidex_shop_woo_single_summary_options_bn_render', 10, 1 );

}

/*
* Update Summary - Styles Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_styles_bn_render' ) ) {
	function glidex_shop_woo_single_summary_styles_bn_render( $styles ) {

		array_push( $styles, 'wdt-shop-buy-now' );
		return $styles;

	}
	add_filter( 'glidex_shop_woo_single_summary_styles', 'glidex_shop_woo_single_summary_styles_bn_render', 10, 1 );

}

/*
* Update Summary - Scripts Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_scripts_bn_render' ) ) {
	function glidex_shop_woo_single_summary_scripts_bn_render( $scripts ) {

		array_push( $scripts, 'wdt-shop-buy-now' );
		return $scripts;

	}
	add_filter( 'glidex_shop_woo_single_summary_scripts', 'glidex_shop_woo_single_summary_scripts_bn_render', 10, 1 );

}
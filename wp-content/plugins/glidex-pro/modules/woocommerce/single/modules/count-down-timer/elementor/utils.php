<?php

/*
* Update Summary - Options Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_options_cglidex_render' ) ) {
	function glidex_shop_woo_single_summary_options_cglidex_render( $options ) {

		$options['countdown'] = esc_html__('Summary Count Down', 'glidex-pro');
		return $options;

	}
	add_filter( 'glidex_shop_woo_single_summary_options', 'glidex_shop_woo_single_summary_options_cglidex_render', 10, 1 );

}

/*
* Update Summary - Styles Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_styles_cglidex_render' ) ) {
	function glidex_shop_woo_single_summary_styles_cglidex_render( $styles ) {

		array_push( $styles, 'wdt-shop-coundown-timer' );
		return $styles;

	}
	add_filter( 'glidex_shop_woo_single_summary_styles', 'glidex_shop_woo_single_summary_styles_cglidex_render', 10, 1 );

}

/*
* Update Summary - Scripts Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_scripts_cglidex_render' ) ) {
	function glidex_shop_woo_single_summary_scripts_cglidex_render( $scripts ) {

		array_push( $scripts, 'jquery-downcount' );
		array_push( $scripts, 'wdt-shop-coundown-timer' );
		return $scripts;

	}
	add_filter( 'glidex_shop_woo_single_summary_scripts', 'glidex_shop_woo_single_summary_scripts_cglidex_render', 10, 1 );

}
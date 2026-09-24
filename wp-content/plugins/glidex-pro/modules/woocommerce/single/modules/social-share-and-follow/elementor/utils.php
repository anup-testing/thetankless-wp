<?php

/*
* Update Summary Options Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_options_ssf_render' ) ) {
	function glidex_shop_woo_single_summary_options_ssf_render( $options ) {

		$options['share_follow'] = esc_html__('Summary Share / Follow', 'glidex-pro');
		return $options;

	}
	add_filter( 'glidex_shop_woo_single_summary_options', 'glidex_shop_woo_single_summary_options_ssf_render', 10, 1 );

}


/*
* Update Summary - Styles Filter
*/

if( ! function_exists( 'glidex_shop_woo_single_summary_styles_ssf_render' ) ) {
	function glidex_shop_woo_single_summary_styles_ssf_render( $styles ) {

		array_push( $styles, 'wdt-shop-social-share-and-follow' );
		return $styles;

	}
	add_filter( 'glidex_shop_woo_single_summary_styles', 'glidex_shop_woo_single_summary_styles_ssf_render', 10, 1 );

}

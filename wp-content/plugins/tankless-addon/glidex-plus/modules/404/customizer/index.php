<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'GlidexPlusCustomizerSite404' ) ) {
    class GlidexPlusCustomizerSite404 {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_action( 'customize_register', array( $this, 'register' ), 15);
        }

        function register( $wp_customize ) {

            /**
             * 404 Page
             */
            $wp_customize->add_section(
                new Glidex_Customize_Section(
                    $wp_customize,
                    'site-404-page-section',
                    array(
                        'title'    => esc_html__('404 Page', 'glidex-plus'),
                        'priority' => glidex_customizer_panel_priority( '404' )
                    )
                )
            );

            if ( ! defined( 'GLIDEX_PRO_VERSION' ) ) {
                $wp_customize->add_control(
                    new Glidex_Customize_Control_Separator(
                        $wp_customize, GLIDEX_CUSTOMISER_VAL . '[glidex-plus-site-404-separator]',
                        array(
                            'type'        => 'wdt-separator',
                            'section'     => 'site-404-page-section',
                            'settings'    => array(),
                            'caption'     => GLIDEX_PLUS_REQ_CAPTION,
                            'description' => GLIDEX_PLUS_REQ_DESC,
                        )
                    )
                );
            }

        }

    }
}

GlidexPlusCustomizerSite404::instance();
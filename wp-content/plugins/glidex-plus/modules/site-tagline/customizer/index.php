<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'GlidexPlusCustomizerSiteTagline' ) ) {
    class GlidexPlusCustomizerSiteTagline {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_action( 'customize_register', array( $this, 'register' ), 15 );
        }

        function register( $wp_customize ) {

            $wp_customize->add_section(
                new Glidex_Customize_Section(
                    $wp_customize,
                    'site-tagline-section',
                    array(
                        'title'    => esc_html__('Site Tagline', 'glidex-plus'),
                        'panel'    => 'site-identity-main-panel',
                        'priority' => 15,
                    )
                )
            );

            $wp_customize->get_control('blogdescription')->section = 'site-tagline-section';
            $wp_customize->get_control('blogdescription')->priority = 5;

            if ( ! defined( 'GLIDEX_PRO_VERSION' ) ) {
                $wp_customize->add_control(
                    new Glidex_Customize_Control_Separator(
                        $wp_customize, GLIDEX_CUSTOMISER_VAL . '[glidex-plus-site-tagline-separator]',
                        array(
                            'type'        => 'wdt-separator',
                            'section'     => 'site-tagline-section',
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

GlidexPlusCustomizerSiteTagline::instance();
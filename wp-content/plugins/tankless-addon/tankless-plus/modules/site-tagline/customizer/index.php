<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'TanklessPlusCustomizerSiteTagline' ) ) {
    class TanklessPlusCustomizerSiteTagline {

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
                new Tankless_Customize_Section(
                    $wp_customize,
                    'site-tagline-section',
                    array(
                        'title'    => esc_html__('Site Tagline', 'tankless-plus'),
                        'panel'    => 'site-identity-main-panel',
                        'priority' => 15,
                    )
                )
            );

            $wp_customize->get_control('blogdescription')->section = 'site-tagline-section';
            $wp_customize->get_control('blogdescription')->priority = 5;

            if ( ! defined( 'TANKLESS_PRO_VERSION' ) ) {
                $wp_customize->add_control(
                    new Tankless_Customize_Control_Separator(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[tankless-plus-site-tagline-separator]',
                        array(
                            'type'        => 'wdt-separator',
                            'section'     => 'site-tagline-section',
                            'settings'    => array(),
                            'caption'     => TANKLESS_PLUS_REQ_CAPTION,
                            'description' => TANKLESS_PLUS_REQ_DESC,
                        )
                    )
                );
            }

        }

    }
}

TanklessPlusCustomizerSiteTagline::instance();
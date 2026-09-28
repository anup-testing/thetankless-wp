<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'TanklessPlusCustomizerSite404' ) ) {
    class TanklessPlusCustomizerSite404 {

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
                new Tankless_Customize_Section(
                    $wp_customize,
                    'site-404-page-section',
                    array(
                        'title'    => esc_html__('404 Page', 'tankless-plus'),
                        'priority' => tankless_customizer_panel_priority( '404' )
                    )
                )
            );

            if ( ! defined( 'TANKLESS_PRO_VERSION' ) ) {
                $wp_customize->add_control(
                    new Tankless_Customize_Control_Separator(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[tankless-plus-site-404-separator]',
                        array(
                            'type'        => 'wdt-separator',
                            'section'     => 'site-404-page-section',
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

TanklessPlusCustomizerSite404::instance();
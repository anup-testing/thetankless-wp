<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'TanklessPlusCustomizerSiteIdentity' ) ) {
    class TanklessPlusCustomizerSiteIdentity {

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

            /**
             * Panel
             */
            $wp_customize->add_panel(
                new Tankless_Customize_Panel(
                    $wp_customize,
                    'site-identity-main-panel',
                    array(
                        'title'    => esc_html__('Site Identity', 'tankless-plus'),
                        'priority' => tankless_customizer_panel_priority( 'idenity' )
                    )
                )
            );
        }
    }
}

TanklessPlusCustomizerSiteIdentity::instance();
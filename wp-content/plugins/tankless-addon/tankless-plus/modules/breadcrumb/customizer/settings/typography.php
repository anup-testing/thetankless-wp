<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'TanklessPlusBreadCrumbTypo' ) ) {
    class TanklessPlusBreadCrumbTypo {

        private static $_instance = null;
        private $settings         = null;
        private $selector         = null;

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
            $wp_customize->add_section(
                new Tankless_Customize_Section(
                    $wp_customize,
                    'site-breadcrumb-typo-section',
                    array(
                        'title'    => esc_html__('Typography', 'tankless-plus'),
                        'panel'    => 'site-breadcrumb-main-panel',
                        'priority' => 15,
                    )
                )
            );

                if ( ! defined( 'TANKLESS_PRO_VERSION' ) ) {
                    $wp_customize->add_control(
                        new Tankless_Customize_Control_Separator(
                            $wp_customize, TANKLESS_CUSTOMISER_VAL . '[tankless-plus-site-breadcrumb-typo-separator]',
                            array(
                                'type'        => 'wdt-separator',
                                'section'     => 'site-breadcrumb-typo-section',
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

TanklessPlusBreadCrumbTypo::instance();
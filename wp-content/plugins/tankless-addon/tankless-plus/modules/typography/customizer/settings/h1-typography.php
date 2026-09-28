<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'TanklessPlusH1Settings' ) ) {
    class TanklessPlusH1Settings {

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

            $this->selector = apply_filters( 'tankless_h1_selector', array( 'h1' ) );
            $this->settings = tankless_customizer_settings('h1_typo');

            add_filter( 'tankless_plus_customizer_default', array( $this, 'default' ) );
            add_action( 'customize_register', array( $this, 'register' ), 20);

            add_filter( 'tankless_h1_typo_customizer_update', array( $this, 'h1_typo_customizer_update' ) );

            add_filter( 'tankless_google_fonts_list', array( $this, 'fonts_list' ) );
            add_filter( 'tankless_add_inline_style', array( $this, 'base_style' ) );
            add_filter( 'tankless_add_tablet_landscape_inline_style', array( $this, 'tablet_landscape_style' ) );
            add_filter( 'tankless_add_tablet_portrait_inline_style', array( $this, 'tablet_portrait' ) );
            add_filter( 'tankless_add_mobile_res_inline_style', array( $this, 'mobile_style' ) );
        }

        function default( $option ) {
            $theme_defaults = function_exists('tankless_theme_defaults') ? tankless_theme_defaults() : array ();
            $option['h1_typo'] = $theme_defaults['h1_typo'];
            return $option;
        }

        function register( $wp_customize ) {

            $wp_customize->add_section(
                new Tankless_Customize_Section(
                    $wp_customize,
                    'site-h1-section',
                    array(
                        'title'    => esc_html__('H1 Typography', 'tankless-plus'),
                        'panel'    => 'site-typography-main-panel',
                        'priority' => 5,
                    )
                )
            );

            /**
             * Option :H1 Typo
             */
                $wp_customize->add_setting(
                    TANKLESS_CUSTOMISER_VAL . '[h1_typo]', array(
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new Tankless_Customize_Control_Typography(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[h1_typo]', array(
                            'type'    => 'wdt-typography',
                            'section' => 'site-h1-section',
                            'label'   => esc_html__( 'H1 Tag', 'tankless-plus')
                        )
                    )
                );

            /**
             * Option : H1 Color
             */
                $wp_customize->add_setting(
                    TANKLESS_CUSTOMISER_VAL . '[h1_color]', array(
                        'default' => '',
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new WP_Customize_Color_Control(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[h1_color]', array(
                            'label'   => esc_html__( 'Color', 'tankless-plus' ),
                            'section' => 'site-h1-section',
                        )
                    )
                );

        }

        function h1_typo_customizer_update( $defaults ) {
            $h1_typo = tankless_customizer_settings( 'h1_typo' );
            if( !empty( $h1_typo ) ) {
                return  $h1_typo;
            }
            return $defaults;
        }

        function fonts_list( $fonts ) {
            return tankless_customizer_frontend_font( $this->settings, $fonts );
        }

        function base_style( $style ) {
            $css   = '';
            $color = tankless_customizer_settings('h1_color');

            $css .= tankless_customizer_typography_settings( $this->settings );
            $css .= tankless_customizer_color_settings( $color );

            $css = tankless_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }

        function tablet_landscape_style( $style ) {
            $css = tankless_customizer_responsive_typography_settings( $this->settings, 'tablet-ls' );
            $css = tankless_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }

        function tablet_portrait( $style ) {
            $css = tankless_customizer_responsive_typography_settings( $this->settings, 'tablet' );
            $css = tankless_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }

        function mobile_style( $style ) {
            $css = tankless_customizer_responsive_typography_settings( $this->settings, 'mobile' );
            $css = tankless_customizer_dynamic_style( $this->selector, $css );

            return $style.$css;
        }

    }
}

TanklessPlusH1Settings::instance();
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'TanklessProCustomizerCursor' ) ) {
    class TanklessProCustomizerCursor {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            add_filter( 'tankless_pro_customizer_default', array( $this, 'default' ) );
            add_action( 'tankless_general_cutomizer_options', array( $this, 'register_general' ), 30 );
        }

        function default( $option ) {

            $option['enable_cursor_effect'] = '1';
            $option['cursor_type'] = 'type-1';
            $option['cursor_link_hover_effect'] = 'link-hover-effect-1';
            $option['cursor_lightbox_hover_effect'] = 'image-hover-effect-1';

            return $option;
        }

        function register_general( $wp_customize ) {

            $wp_customize->add_section(
                new Tankless_Customize_Section(
                    $wp_customize,
                    'cursor-section',
                    array(
                        'title'    => esc_html__('Cursor', 'tankless-pro'),
                        'panel'    => 'site-general-main-panel',
                        'priority' => 30,
                    )
                )
            );

                /**
                 * Option : Enable Cursor
                 */
                $wp_customize->add_setting(
                    TANKLESS_CUSTOMISER_VAL . '[enable_cursor_effect]', array(
                        'type' => 'option',
                    )
                );

                $wp_customize->add_control(
                    new Tankless_Customize_Control_Switch(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[enable_cursor_effect]', array(
                            'type'    => 'wdt-switch',
                            'section' => 'cursor-section',
                            'label'   => esc_html__( 'Enable Cursor Effect', 'tankless-pro' ),
                            'choices' => array(
                                'on'  => esc_attr__( 'Yes', 'tankless-pro' ),
                                'off' => esc_attr__( 'No', 'tankless-pro' )
                            )
                        )
                    )
                );

                /**
                 * Option : Type
                 */
                /* $wp_customize->add_setting(
                    TANKLESS_CUSTOMISER_VAL . '[cursor_type]', array(
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new Tankless_Customize_Control(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[cursor_type]', array(
                            'type'       => 'select',
                            'section'    => 'cursor-section',
                            'label'      => esc_html__( 'Type', 'tankless-pro' ),
                            'desc'      => esc_html__( 'Choose one of the available cursor types.', 'tankless-pro' ),
                            'choices'    => array (
                                'type-1' => esc_html__('Type 1', 'tankless-pro'),
                                'type-2' => esc_html__('Type 2', 'tankless-pro'),
                            ),
                            'dependency' => array( 'enable_cursor_effect', '!=', '' ),
                        )
                    )
                ); */

                /**
                 * Option : Link Hover Effect
                 */
                /* $wp_customize->add_setting(
                    TANKLESS_CUSTOMISER_VAL . '[cursor_link_hover_effect]', array(
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new Tankless_Customize_Control(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[cursor_link_hover_effect]', array(
                            'type'       => 'select',
                            'section'    => 'cursor-section',
                            'label'      => esc_html__( 'Link Hover Effect', 'tankless-pro' ),
                            'desc'      => esc_html__( 'Effects to use if cursor hovers on links.', 'tankless-pro' ),
                            'choices'    => array (
                                '' => esc_html__('None', 'tankless-pro'),
                                'link-hover-effect-1' => esc_html__('Effect 1', 'tankless-pro'),
                                'link-hover-effect-2' => esc_html__('Effect 2', 'tankless-pro'),
                            ),
                            'dependency' => array( 'enable_cursor_effect', '!=', '' ),
                        )
                    )
                ); */

                /**
                 * Option : LightBox Hover Effect
                 */
                /* $wp_customize->add_setting(
                    TANKLESS_CUSTOMISER_VAL . '[cursor_lightbox_hover_effect]', array(
                        'type'    => 'option',
                    )
                );

                $wp_customize->add_control(
                    new Tankless_Customize_Control(
                        $wp_customize, TANKLESS_CUSTOMISER_VAL . '[cursor_lightbox_hover_effect]', array(
                            'type'       => 'select',
                            'section'    => 'cursor-section',
                            'label'      => esc_html__( 'LightBox Hover Effect', 'tankless-pro' ),
                            'desc'      => esc_html__( 'Effects to use if cursor hovers on images.', 'tankless-pro' ),
                            'choices'    => array (
                                '' => esc_html__('None', 'tankless-pro'),
                                'image-hover-effect-1' => esc_html__('Effect 1', 'tankless-pro'),
                                'image-hover-effect-2' => esc_html__('Effect 2', 'tankless-pro'),
                            ),
                            'dependency' => array( 'enable_cursor_effect', '!=', '' ),
                        )
                    )
                ); */

        }

    }
}

TanklessProCustomizerCursor::instance();
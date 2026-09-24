<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'GlidexPlusCustomizerBlogPost' ) ) {
    class GlidexPlusCustomizerBlogPost {

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
                    'site-blog-post-section',
                    array(
                        'title'    => esc_html__('Single Post', 'glidex-plus'),
                        'panel'    => 'site-blog-main-panel',
                        'priority' => 20,
                    )
                )
            );

			if ( ! defined( 'GLIDEX_PRO_VERSION' ) ) {
				$wp_customize->add_control(
					new Glidex_Customize_Control_Separator(
						$wp_customize, GLIDEX_CUSTOMISER_VAL . '[glidex-plus-site-single-blog-separator]',
						array(
							'type'        => 'wdt-separator',
							'section'     => 'site-blog-post-section',
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

GlidexPlusCustomizerBlogPost::instance();
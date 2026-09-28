<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (! class_exists ( 'TanklessProPostTypes' )) {
	/**
	 *
	 * @author iamdesigning11
	 *
	 */
	class TanklessProPostTypes {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

		function __construct() {

			// Mega Menu Post Type
			require_once TANKLESS_PRO_DIR_PATH . 'post-types/mega-menu-post-type.php';

		}
	}
}

TanklessProPostTypes::instance();
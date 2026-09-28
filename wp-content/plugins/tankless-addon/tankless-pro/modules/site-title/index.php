<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'TanklessProSiteTitle' ) ) {
    class TanklessProSiteTitle {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {
            $this->load_modules();
        }

        function load_modules() {
            include_once TANKLESS_PRO_DIR_PATH.'modules/site-title/customizer/index.php';
        }
    }
}

TanklessProSiteTitle::instance();
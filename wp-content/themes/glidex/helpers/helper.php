<?php
if ( ! function_exists( 'glidex_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 */
	function glidex_template_part( $module, $template, $slug = '', $params = array() ) {
		echo glidex_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'glidex_get_template_part' ) ) {
	/**
	 * Function that load module template part.
	 */
	function glidex_get_template_part( $module, $template, $slug = '', $params = array() ) {

		$file_path = '';
        $html      = '';
        $template_path = GLIDEX_MODULE_DIR . '/' . $module;
        $temp_path = $template_path . '/' . $template;
        if ( ! empty( $temp_path ) ) {
            if ( ! empty( $slug ) ) {
                $file_path = "{$temp_path}-{$slug}.php";
                if ( ! file_exists( $file_path ) ) {
                    $file_path = $temp_path . '.php';
                }
            } else {
                $file_path = $temp_path . '.php';
            }
        }
        $file_path = apply_filters( 'glidex_get_template_plugin_part', $file_path, $module, $template, $slug );
        if ( $file_path && file_exists( $file_path ) ) {
            ob_start();
            if ( is_array( $params ) && count( $params ) ) {
                extract( $params, EXTR_SKIP );
            }
            include $file_path;
            $html = ob_get_clean();
        }
        return $html;
	}
}

if ( ! function_exists( 'glidex_get_page_id' ) ) {
	function glidex_get_page_id() {

		$page_id = get_queried_object_id();

		if( is_archive() || is_search() || is_404() || ( is_front_page() && is_home() ) ) {
			$page_id = -1;
		}

		return $page_id;
	}
}

/* Convert hexdec color string to rgb(a) string */
if ( ! function_exists( 'glidex_hex2rgba' ) ) {
	function glidex_hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		if(empty($color)) {
			return $default;
		}

		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
				return $default;
		}

		$rgb =  array_map('hexdec', $hex);

		if($opacity){
			if(abs($opacity) > 1) {
				$opacity = 1.0;
			}
			$output = implode(",",$rgb).','.$opacity;
		} else {
			$output = implode(",",$rgb);
		}

		return $output;

	}
}

if ( ! function_exists( 'glidex_html_output' ) ) {
	function glidex_html_output( $html ) {
		return apply_filters( 'glidex_html_output', $html );
	}
}


if ( ! function_exists( 'glidex_theme_defaults' ) ) {
	/**
	 * Function to load default values
	 */
	function glidex_theme_defaults() {

		$defaults = array (
			'primary_color' => '#15c14a',
			'primary_color_rgb' => glidex_hex2rgba('#15c14a', false),
			'secondary_color' => '#a3ff00',
			'secondary_color_rgb' => glidex_hex2rgba('#a3ff00', false),
			'tertiary_color' => '#252525',
			'tertiary_color_rgb' => glidex_hex2rgba('#252525', false),
			'quaternary_color' => '#333333',
			'quaternary_color_rgb' => glidex_hex2rgba('#333333', false),
			'body_bg_color' => '#1b1b1b',
			'body_bg_color_rgb' => glidex_hex2rgba('#1b1b1b', false),
			'body_text_color' => '#c1c1c1',
			'body_text_color_rgb' => glidex_hex2rgba('#c1c1c1', false),
			'headalt_color' => '#ffffff',
			'headalt_color_rgb' => glidex_hex2rgba('#ffffff', false),
			'link_color' => '#ffffff',
			'link_color_rgb' => glidex_hex2rgba('#ffffff', false),
			'link_hover_color' => '#15c14a',
			'link_hover_color_rgb' => glidex_hex2rgba('#15c14a', false),
			'border_color' => '#424242',
			'border_color_rgb' => glidex_hex2rgba('#424242', false),
			'accent_text_color' => '#000000',
			'accent_text_color_rgb' => glidex_hex2rgba('#000000', false),

			'body_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 400,
				'fs-desktop' => 16,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.625,
				'lh-desktop-unit' => ''
			),
			'h1_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 52,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.35,
				'lh-desktop-unit' => ''
			),
			'h2_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 42,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.35,
				'lh-desktop-unit' => ''
			),
			'h3_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 30,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.35,
				'lh-desktop-unit' => ''
			),
			'h4_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 24,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.35,
				'lh-desktop-unit' => ''
			),
			'h5_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 20,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.35,
				'lh-desktop-unit' => ''
			),
			'h6_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 700,
				'fs-desktop' => 18,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.35,
				'lh-desktop-unit' => ''
			),
			'extra_typo' => array (
				'font-family' => "Inter",
				'font-fallback' => '"Inter", sans-serif',
				'font-weight' => 500,
				'fs-desktop' => 14,
				'fs-desktop-unit' => 'px',
				'lh-desktop' => 1.1,
				'lh-desktop-unit' => ''
			),

		);

		return $defaults;

	}
}
<?php

namespace GlidexElementor\Widgets;
use GlidexElementor\Widgets\Glidex_Shop_Widget_Product_Summary;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;


class Glidex_Shop_Widget_Product_Summary_Extend extends Glidex_Shop_Widget_Product_Summary {

	function dynamic_register_controls() {

		$this->start_controls_section( 'product_summary_extend_section', array(
			'label' => esc_html__( 'Social Options', 'glidex-pro' ),
		) );

			$this->add_control( 'share_follow_type', array(
				'label'   => esc_html__( 'Share / Follow Type', 'glidex-pro' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'share',
				'options' => array(
					''       => esc_html__('None', 'glidex-pro'),
					'share'  => esc_html__('Share', 'glidex-pro'),
					'follow' => esc_html__('Follow', 'glidex-pro'),
				),
				'description' => esc_html__( 'Choose between Share / Follow you would like to use.', 'glidex-pro' ),
			) );

			$this->add_control( 'social_icon_style', array(
				'label'   => esc_html__( 'Social Icon Style', 'glidex-pro' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					'simple'        => esc_html__( 'Simple', 'glidex-pro' ),
					'bgfill'        => esc_html__( 'BG Fill', 'glidex-pro' ),
					'brdrfill'      => esc_html__( 'Border Fill', 'glidex-pro' ),
					'skin-bgfill'   => esc_html__( 'Skin BG Fill', 'glidex-pro' ),
					'skin-brdrfill' => esc_html__( 'Skin Border Fill', 'glidex-pro' ),
				),
				'description' => esc_html__( 'This option is applicable for all buttons used in product summary.', 'glidex-pro' ),
				'condition'   => array( 'share_follow_type' => array ('share', 'follow') )
			) );

			$this->add_control( 'social_icon_radius', array(
				'label'   => esc_html__( 'Social Icon Radius', 'glidex-pro' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					'square'  => esc_html__( 'Square', 'glidex-pro' ),
					'rounded' => esc_html__( 'Rounded', 'glidex-pro' ),
					'circle'  => esc_html__( 'Circle', 'glidex-pro' ),
				),
				'condition'   => array(
					'social_icon_style' => array ('bgfill', 'brdrfill', 'skin-bgfill', 'skin-brdrfill'),
					'share_follow_type' => array ('share', 'follow')
				),
			) );

			$this->add_control( 'social_icon_inline_alignment', array(
				'label'        => esc_html__( 'Social Icon Inline Alignment', 'glidex-pro' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'yes', 'glidex-pro' ),
				'label_off'    => esc_html__( 'no', 'glidex-pro' ),
				'default'      => '',
				'return_value' => 'true',
				'description'  => esc_html__( 'This option is applicable for all buttons used in product summary.', 'glidex-pro' ),
				'condition'   => array( 'share_follow_type' => array ('share', 'follow') )
			) );

		$this->end_controls_section();

	}

}
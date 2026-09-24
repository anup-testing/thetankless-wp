<?php
use GlidexElementor\Widgets\GlidexElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Utils;

class Elementor_Post_Socials extends GlidexElementorWidgetBase {

    public function get_name() {
        return 'wdt-post-socials';
    }

    public function get_title() {
        return esc_html__('Post - Socials', 'glidex-pro');
    }

    protected function register_controls() {

        $this->start_controls_section( 'wdt_section_general', array(
            'label' => esc_html__( 'General', 'glidex-pro'),
        ) );

            $this->add_control( 'style', array(
                'type'    => Controls_Manager::SELECT,
				'label'   => esc_html__('Style', 'glidex-pro'),
                'default' => '',
                'options' => array(
                    ''  => esc_html__('Default', 'glidex-pro'),
                    'meta-elements-space'		 => esc_html__('Space', 'glidex-pro'),
                    'meta-elements-boxed'  		 => esc_html__('Boxed', 'glidex-pro'),
                    'meta-elements-boxed-curvy'  => esc_html__('Curvy', 'glidex-pro'),
                    'meta-elements-boxed-round'  => esc_html__('Round', 'glidex-pro'),
					'meta-elements-filled'  	 => esc_html__('Filled', 'glidex-pro'),
					'meta-elements-filled-curvy' => esc_html__('Filled Curvy', 'glidex-pro'),
					'meta-elements-filled-round' => esc_html__('Filled Round', 'glidex-pro'),
                ),
            ) );

            $this->add_control( 'el_class', array(
                'type'        => Controls_Manager::TEXT,
                'label'       => esc_html__('Extra class name', 'glidex-pro'),
                'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS', 'glidex-pro')
            ) );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        extract($settings);

		$out = '';

        global $post;
        $post_id =  $post->ID;

        $template_args['post_ID'] = $post_id;

		$out .= '<div class="entry-social-share-wrapper '.$style.' '.$el_class.'">';
			$out .= glidex_get_template_part( 'post', 'templates/post-extra/social', '', $template_args );
		$out .= '</div>';

		echo $out;
	}

}
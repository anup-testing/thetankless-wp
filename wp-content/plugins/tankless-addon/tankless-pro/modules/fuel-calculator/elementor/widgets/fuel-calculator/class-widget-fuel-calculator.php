<?php
use TanklessElementor\Widgets\TanklessElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Utils;

class Elementor_Fuel_Calculator extends TanklessElementorWidgetBase {

    public function get_name() {
        return 'wdt-fuel-calculator';
    }

    public function get_title() {
        return esc_html__('Fuel Calculator', 'tankless-pro');
    }

protected function register_controls() {
    $repeater = new \Elementor\Repeater();

        // Define fields for the repeater
        $repeater->add_control( 'label_text', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => esc_html__( 'Label Text', 'tankless-pro' ),
            'default' => esc_html__( 'Default Label', 'tankless-pro' ),
        ]);

        $repeater->add_control( 'additional_cost', [
            'type' => \Elementor\Controls_Manager::NUMBER,
            'label' => esc_html__( 'Additional Cost', 'tankless-pro' ),
            'default' => 0,
        ]);

        $this->start_controls_section( 'wdt_section_general', [
            'label' => esc_html__( 'General', 'tankless-pro' ),
        ]);
        
        $this->add_control( 'kms_per_day_slider_text', [
                'label' => esc_html__( 'KMS Per Day', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'KMS Per Day',
                'selectors' => [
                    '{{WRAPPER}}' => 'width: {{TOP}}{{UNIT}}; height: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]);
               $this->add_control( 'kms_per_day_slider', [
                'label' => esc_html__( 'KMS Per Day Default', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 30,
            ]);
            $this->add_control( 'kms_per_day_min', [
                'label' => esc_html__( 'Min', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 15,
            ]);
            
            $this->add_control( 'kms_per_day_max', [
                'label' => esc_html__( 'Max', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
                'min' => 150,
                'max' => 150,
            ]);
            
            $this->add_control( 'kms_per_day_cost', [
                'label' => esc_html__( 'Cost/Litre', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0.90,
                'min' => 0,
                'max' => 1000,
                'step' => 0.01,
            ]);
            $this->add_control( 'petrol_bike_label', [
                'label' => esc_html__( 'Petrol Bike/Scooter', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Petrol Bike/Scooter', 'tankless-pro' ),
            ]);
            $this->add_control( 'monhthy_petrol_cost', [
                'label' => esc_html__( 'Monthly petrol cost label', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Monthly Petrol Cost', 'tankless-pro' ),
            ]);
            $this->add_control( 'revolt_bike_label', [
                'label' => esc_html__( 'Revolt Bike', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Revolt Bike', 'tankless-pro' ),
            ]);
            $this->add_control( 'monhthy_electricity_cost', [
                'label' => esc_html__( 'Monthly Electricity cost label', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Monthly Electricity Cost', 'tankless-pro' ),
            ]);
            $this->add_control( 'savings_on_revolt_label', [
                'label' => esc_html__( 'Your Savings on Revolt Bike', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Your Savings on Revolt Bike', 'tankless-pro' ),
            ]);
            $this->add_control( 'monthly_savings_label', [
                'label' => esc_html__( 'Monthly Savings', 'saasoft-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Monthly Savings', 'saasoft-pro' ),
            ]);
            $this->add_control( 'annual_savings_label', [
                'label' => esc_html__( 'Annual Savings', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Annual Savings', 'tankless-pro' ),
            ]);
            $this->add_control( 'disclaimer', [
                'label' => esc_html__( 'Disclaimer', 'tankless-pro' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'Disclaimer', 'tankless-pro' ),
            ]);
           
    $this->end_controls_section();
}
protected function render() {
    $settings = $this->get_settings_for_display();
    extract($settings);

    $output = '';
    global $post;
    $page_id = $post->ID;

    $output = '<div class="wdt-sc-emi-calc aligncenter">';
        $output .= '<div class="wdt-sc-one-half">';
            $output .= '<form name="frmemicalc" class="wdt-sc-emi-form" id="frmemicalc">';
                $output .= '<div class="wdt-sc-wrapper">';
                    // Feature Range List
                    $output .= '<div class="wdt-sc-one-third">';
                        $output .= '<div class="wdt-fuel-range-progress">';    
                        $output .= '<div>';
                            $output .= '<div>';
                            $output .= '<div class="wdt-fuel-range-label-group">';
                                $output .= '<label>' . esc_html__('KMS Per Day:', 'tankless-pro') . '</label>';
                                $output .= '<div class="selected-range-value">';
                                    $output .= '<span id="selected-value">' . esc_attr($kms_per_day_slider) . '</span><span>KMS</span>';
                                $output .= '</div>';
                                $output .= '</div>';
                                $output .= '<input type="range" name="kms_per_day" id="kms_per_day" min="' . esc_attr($kms_per_day_min) . '" max="' . esc_attr($kms_per_day_max) . '" value="' . esc_attr($kms_per_day_slider) . '" oninput="updateRangeValue(this)">';
                                $output .= '<div class="range-values">';
                                $output .= '<span id="range-value-min">' . esc_html__('Min:') . esc_attr($kms_per_day_min) . 'KM</span>';
                                $output .= '<span id="range-value-max">' . esc_html__('Max:') . esc_attr($kms_per_day_max) . 'KM</span>';
                    $output .= '</div>';
                                $output .= '<div class="cost-perlitre"><span><span class="note">Note:</span> For calculations, the fuel price is considered to be: $'.esc_html($kms_per_day_cost).' / litre</span><input type="hidden" name="kms_per_day_cost" id="kms_per_day_cost" value="' . esc_attr($kms_per_day_cost) . '"></div>';
                               
                                $output .= '<div class="wdt-calculator-disclaimer" >' .$disclaimer. '</div>';    
                                $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div class="selected-range-value">';
                        $output .= '<span id="selected-value">' . esc_attr($kms_per_day_slider) . '</span>';
                    $output .= '</div>';
                    $output .= '<div class="wdt-sc-emi-result">';
                        $output .= '<div class="monthly-petrol-cost-wrapper"><div class="wdt-label-heading" >' . esc_html($petrol_bike_label) . '</div>';
                        $output .= '<div>' . esc_html($monhthy_petrol_cost) . ': <span id="monthly-petrol-cost"></span></div></div>';
                        $output .= '<div class="monthly-electricity-cost-wrapper"><div class="wdt-label-heading" >' . esc_html($revolt_bike_label) . '</div>';
                        $output .= '<div>' . esc_html($monhthy_electricity_cost) . ': <span id="monthly-electricity-cost"></span></div></div>';
                        $output .= '<div class="cost-savings-wrapper"><div class="wdt-label-heading" >' . esc_html($savings_on_revolt_label) . '</div>';
                        $output .= '<div class="monthly-savings">' . esc_html($monthly_savings_label) . ': <span id="monthly-savings"></span></div>';
                        $output .= '<div class="annual-savings">' . esc_html($annual_savings_label) . ': <span id="annual-savings"></span></div></div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</form>';
        $output .= '</div>'; // Close column
    $output .= '</div>'; // Close main container

    echo $output;
}
    
}

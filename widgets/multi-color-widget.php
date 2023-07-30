<?php
if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Icons_Manager;
use Elementor\Utils;

class K_Universe_Elementor_multicolor_heading_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'multicolor-heading';
    }

    public function get_title()
    {
        return esc_html__('K_Universe multicolor heading', 'k-universe-elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['multicolor', 'K_Universe','heading', 'K_Universe-heading'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'K_Universe-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text_1',
            [
                'label' => __( 'Text 1', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Text 1', 'text-domain' ),
            ]
        );

        $this->add_control(
            'text_2',
            [
                'label' => __( 'Text 2', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Text 2', 'text-domain' ),
            ]
        );

        $this->add_control(
            'text_3',
            [
                'label' => __( 'Text 3', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Text 3', 'text-domain' ),
            ]
        );

        $this->add_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'text-domain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'text-domain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'text-domain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'text-domain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .multi-color-heading .heading-text' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_tag',
            [
                'label' => __('Heading Tag', 'text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => __('H1', 'text-domain'),
                    'h2' => __('H2', 'text-domain'),
                    'h3' => __('H3', 'text-domain'),
                    'h4' => __('H4', 'text-domain'),
                    'h5' => __('H5', 'text-domain'),
                    'h6' => __('H6', 'text-domain'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => esc_html__('Icon Style', 'K_Universe-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Heading Typography', 'K_Universe-elementor-widget'),
                'selector' => '{{WRAPPER}} .multi-color-heading .heading-text',
            ]
        );


        


        $this->add_control(
            'text_color_1',
            [
                'label' => __( 'Text Color 1', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .multi-color-heading .heading-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'text_color_2',
            [
                'label' => __( 'Text Color 2', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .multi-color-heading .text-2' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'text_color_3',
            [
                'label' => __( 'Text Color 3', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .multi-color-heading .text-3' => 'color: {{VALUE}};',
                ],
            ]
        );
        

        $this->add_control(
            'heading_animation',
            [
                'label' => __('Heading Animation', 'text-domain'),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'selector' => '{{WRAPPER}} .multi-color-heading .heading-text',
            ]
        );


        $this->end_controls_section();


    }
   protected function render() {
    $settings = $this->get_settings_for_display();
    $animation_classes = $this->get_settings('heading_animation') ? ' elementor-animation-' . $this->get_settings('heading_animation') : '';


    echo '<div class="multi-color-heading">';
    echo '<' . $settings['heading_tag'] . ' class="heading-text' . $animation_classes . '">' . $settings['text_1'] . ' ';
    echo '<span class="text-2">' . $settings['text_2'] . ' </span>';
    echo '<span class="text-3">' . $settings['text_3'] . '</span>';
    echo '</' . $settings['heading_tag'] . '>';
    echo '</div>';
}

}
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

class K_Universe_Elementor_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'card';
    }

    public function get_title()
    {
        return esc_html__('K_Universe Card', 'k-universe-elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-header';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['keyword1', 'keyword2', 'K_Universe-keyword'];
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

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => esc_html__('Icon Style', 'K_Universe-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();


    }
    protected function render() {
        $settings = $this->get_settings_for_display();
    }
    
}
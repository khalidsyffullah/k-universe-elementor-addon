<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class K_Universe_Elementor_button_Widget extends Widget_Base {

    public function get_name() {
        return 'K_Universe-button';
    }

    public function get_title() {
        return esc_html__('K_Universe Button', 'k-universe-elementor-addon');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return array('K_Universe-category');
    }

    public function get_keywords() {
        return ['buttons', 'K_Universe', 'K_Universe-buttons'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'elementor-K_Universe-addon' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Click Me', 'elementor-K_Universe-addon' ),
                'placeholder' => __( 'Enter your button text', 'elementor-K_Universe-addon' ),
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __( 'Button Icon', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'description' => __( 'Enter the Font Awesome icon class (e.g., fa-arrow-right)', 'elementor-K_Universe-addon' ),
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Icon Position', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'before',
                'options' => [
                    'before' => __( 'Before Text', 'elementor-K_Universe-addon' ),
                    'after' => __( 'After Text', 'elementor-K_Universe-addon' ),
                ],
            ]
        );

        $this->add_control(
            'icon_rotate',
            [
                'label' => __( 'Icon Rotation', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 0,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn i' => 'transform: rotate({{VALUE}}deg);',
                ],
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Color', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff0000',
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => __( 'Border Width', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn' => 'border-width: {{VALUE}}px',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 0,
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn' => 'border-radius: {{VALUE}}px',
                ],
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label' => __( 'Hover Color', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hover_text_color',
            [
                'label' => __( 'Hover Text Color', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-K_Universe-button .k-universe-addon-btn .btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_position',
            [
                'label' => __( 'Button Position', 'elementor-K_Universe-addon' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => __( 'Left', 'elementor-K_Universe-addon' ),
                    'center' => __( 'Center', 'elementor-K_Universe-addon' ),
                    'right' => __( 'Right', 'elementor-K_Universe-addon' ),
                ],
            ]
        );
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $button_text = $settings['button_text'];
        $button_icon = $settings['button_icon'];
        $icon_position = $settings['icon_position'];
        $button_position = $settings['button_position'];
    
        // Set the button position CSS class based on the control value
        $button_position_class = 'text-' . $button_position;
    
        ?>
        <div class="k-universe-addon-btn <?php echo esc_attr($button_position_class); ?>">
            <a href="#" class="btn">
                <?php if ($icon_position === 'before' && !empty($button_icon)) : ?>
                    <i class="<?php echo esc_attr($button_icon); ?>"></i>
                <?php endif; ?>
                <?php echo esc_html($button_text); ?>
                <?php if ($icon_position === 'after' && !empty($button_icon)) : ?>
                    <i class="<?php echo esc_attr($button_icon); ?>"></i>
                <?php endif; ?>
            </a>
        </div>
        <?php
    }
    
    
}

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

class K_Universe_Elementor_Card_Widget extends \Elementor\Widget_Base
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
        return ['card', 'K_Universe', 'K_Universe-card'];
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
            'box_icon',
            [
                'label' => __('Icon', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'true',
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );



        $this->add_control(


            'card_title',
            [
                'label' => esc_html__('Card title', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('Your card title here', 'K_Universe-elementor-widget'),
            ]
        );

        $this->add_control(
            'card_description',
            [
                'label' => esc_html__('Card Description', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => esc_html__('Your card description here', 'K_Universe-elementor-widget'),
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
        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size ', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .writing-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .writing-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'content_style_section',
            [
                'label' => esc_html__('Card Content Style', 'K_Universe-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .writing-content p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'K_Universe-elementor-widget'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'title_stroke',
                'label' => esc_html__('Title Stroke', 'K_Universe-elementor-widget'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'label' => esc_html__('Title Shadow', 'K_Universe-elementor-widget'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'K_Universe-elementor-widget'),
                'selector' => '{{WRAPPER}} .writing-content p',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $card_title = $settings['card_title'];
        $card_description = $settings['card_description'];



?>

        <section>
            <div class="container">
                <div class="writing-item">
                    <div class="writing-shape">
                        <svg viewBox="0 0 417 207" fill="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" preserveAspectRatio="none">
                            <g opacity="0.1">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 96C0 82 7.5 73 26.2229 76.38C43.8225 79.5573 73.5 62.5 65 34C58.0931 10.8417 68.4854 0.0152226 90.4536 0H387C403.569 0 417 13.4315 417 30V177C417 193.569 403.569 207 387 207H30C13.4315 207 0 193.569 0 177V96Z" fill="currentcolor" />
                                <path d="M26.2229 76.38L26.0452 77.3641L26.0452 77.3641L26.2229 76.38ZM65 34L64.0417 34.2858L65 34ZM90.4536 0L90.4536 -1L90.4529 -1L90.4536 0ZM26.4005 75.3959C16.8849 73.6781 9.9765 75.0628 5.4433 78.9101C0.915622 82.7526 -1 88.8465 -1 96H1C1 89.1535 2.83438 83.7474 6.73743 80.4349C10.6349 77.1272 16.838 75.7019 26.0452 77.3641L26.4005 75.3959ZM64.0417 34.2858C68.1618 48.1001 63.0533 59.0984 54.7432 66.3139C46.3758 73.5791 34.8545 76.9221 26.4005 75.3959L26.0452 77.3641C35.1909 79.0152 47.3082 75.4182 56.0544 67.8241C64.858 60.1802 70.3382 48.3998 65.9583 33.7142L64.0417 34.2858ZM90.4529 -1C79.3517 -0.992307 70.8799 1.74143 66.1176 7.69682C61.3388 13.673 60.5475 22.57 64.0417 34.2858L65.9583 33.7142C62.5456 22.2717 63.4971 14.1764 67.6796 8.94589C71.8788 3.69466 79.5873 1.00753 90.4543 1L90.4529 -1ZM90.4536 1H387V-1H90.4536V1ZM387 1C403.016 1 416 13.9837 416 30H418C418 12.8792 404.121 -1 387 -1V1ZM416 30V177H418V30H416ZM416 177C416 193.016 403.016 206 387 206V208C404.121 208 418 194.121 418 177H416ZM387 206H30V208H387V206ZM30 206C13.9837 206 1 193.016 1 177H-1C-1 194.121 12.8792 208 30 208V206ZM1 177V96H-1V177H1Z" fill="currentcolor" />
                            </g>
                        </svg>
                    </div>
                    <div class="writing-icon">
                        <?php
                        $icon_html = Icons_Manager::render_icon($settings['box_icon'], ['aria-hidden' => 'true']);
                        $this->add_render_attribute(
                            'box_icon',
                            [
                                'class' => ['custom-icon-box-icon'],
                            ]
                        );


                        ?>
                    </div>
                    <div class="writing-content">
                        <h4 class="title"><?php echo $card_title;  ?></h4>
                        <p>
                            <?php echo $card_description;  ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}

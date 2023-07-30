<?php

use Elementor\Widget_Base;

class K_Universe_Elementor_Timeline_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'timeline';
    }

    public function get_title()
    {
        return esc_html__('K_Universe timeline', 'k-universe-elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['timeline', 'K_Universe', 'K_Universe-timeline'];
    }

    protected function _register_controls()
    {
        // Add content controls for image, serial number, heading, and description
        $this->start_controls_section('section_content_1', [
            'label' => 'First Section',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('image_1', [
            'label' => 'First Image',
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('serial_number_1', [
            'label' => 'First Serial Number',
            'type' => \Elementor\Controls_Manager::NUMBER,
        ]);

        $this->add_control('heading_1', [
            'label' => 'First Heading',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Section Heading',
        ]);

        $this->add_control('description_1', [
            'label' => 'First Description',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Section Description',
        ]);

        $this->end_controls_section();



        $this->start_controls_section('section_content_2', [
            'label' => 'Second Section',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('image_2', [
            'label' => 'Second Image',
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('serial_number_2', [
            'label' => 'Second Serial Number',
            'type' => \Elementor\Controls_Manager::NUMBER,
        ]);

        $this->add_control('heading_2', [
            'label' => 'Second Heading',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Section Heading',
        ]);

        $this->add_control('description_2', [
            'label' => 'Second Description',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Section Description',
        ]);

        $this->end_controls_section();



        $this->start_controls_section('section_content_3', [
            'label' => 'Third Section',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('image_3', [
            'label' => 'Third Image',
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('serial_number_3', [
            'label' => 'Third Serial Number',
            'type' => \Elementor\Controls_Manager::NUMBER,
        ]);

        $this->add_control('heading_3', [
            'label' => 'Third Heading',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Section Heading',
        ]);

        $this->add_control('description_3', [
            'label' => 'Third Description',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Section Description',
        ]);

        $this->end_controls_section();



        $this->start_controls_section('timeline_image_section_content', [
            'label' => 'Timeline Image Section',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('image_timeline', [
            'label' => 'Timeline Image Image',
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);
        $this->end_controls_section();

        //style section
        


        $this->start_controls_section('image_style_section', [
            'label' => esc_html__('Timeline Images Style', 'K_Universe-elementor-widget'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('image_style', [
            'label' => esc_html__('Images Style', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('image_width', [
            'label' => esc_html__('Width', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-img img.timeline-images' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('image_height', [
            'label' => esc_html__('Height', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-img img.timeline-images' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_section();


        $this->start_controls_section('serial_numbert_style_section', [
            'label' => esc_html__('Serial Number Style', 'K_Universe-elementor-widget'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('serial_number_style', [
            'label' => esc_html__('Serial Number Style', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('serial_number_color', [
            'label' => esc_html__('Color', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-img span.number' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('serial_number_font_size', [
            'label' => esc_html__('Font Size', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-img span.number' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_section();


        $this->start_controls_section('heading_style_section', [
            'label' => esc_html__('Headings Style', 'K_Universe-elementor-widget'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('heading_style', [
            'label' => esc_html__('Heading Style', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('heading_color', [
            'label' => esc_html__('Color', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-content h4.title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('heading_font_size', [
            'label' => esc_html__('Font Size', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-content h4.title' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_section();


        $this->start_controls_section('description_style_section', [
            'label' => esc_html__('Descriptions Style', 'K_Universe-elementor-widget'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('description_style', [
            'label' => esc_html__('Description Style', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('description_color', [
            'label' => esc_html__('Color', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-content p' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('description_font_size', [
            'label' => esc_html__('Font Size', 'K_Universe-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .roadmap-item .roadmap-content p' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_section();

        // Add content controls for image, serial number, heading, and description
        $this->start_controls_section('section_content_1', [
            'label' => 'First Section',
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('image_1', [
            'label' => 'First Image',
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('serial_number_1', [
            'label' => 'First Serial Number',
            'type' => \Elementor\Controls_Manager::NUMBER,
        ]);

        $this->add_control('heading_1', [
            'label' => 'First Heading',
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Section Heading',
        ]);

        $this->add_control('description_1', [
            'label' => 'First Description',
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Section Description',
        ]);

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Render the HTML output
?>
        <section class="roadmap-area pt-140 pb-130">
            <div class="">
                <div class="row justify-content-center">
                    <div class="">
                        <div class="roadmap-timeline-wrap">
                        <div class="roadmap-line" style="background-image: url('<?php echo $settings['image_timeline']['url']; ?>');"></div>
                            <ul class="list-wrap">
                                <li>
                                    <div class="roadmap-item">
                                        <div class="roadmap-img wow fadeInLeft" data-wow-delay=".2s">
                                            <img class="timeline-images" src="<?php echo $settings['image_1']['url']; ?>" alt="" />
                                            <span class="number"><?php echo $settings['serial_number_1']; ?></span>
                                        </div>
                                        <div class="roadmap-content wow fadeInRight" data-wow-delay=".2s">
                                            <h4 class="title"><?php echo $settings['heading_1']; ?></h4>
                                            <p>
                                                <?php echo $settings['description_1']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="roadmap-item">
                                        <div class="roadmap-img wow fadeInRight" data-wow-delay=".2s">
                                            <img class="timeline-images" src="<?php echo $settings['image_2']['url']; ?>" alt="" />
                                            <span class="number"><?php echo $settings['serial_number_2']; ?></span>
                                        </div>
                                        <div class="roadmap-content wow fadeInLeft" data-wow-delay=".2s">
                                            <h4 class="title"><?php echo $settings['heading_2']; ?></h4>
                                            <p>
                                                <?php echo $settings['description_2']; ?> </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="roadmap-item">
                                        <div class="roadmap-img wow fadeInLeft" data-wow-delay=".2s">
                                            <img class="timeline-images" src="<?php echo $settings['image_3']['url']; ?>" alt="" />
                                            <span class="number"><?php echo $settings['serial_number_3']; ?></span>
                                        </div>
                                        <div class="roadmap-content wow fadeInRight" data-wow-delay=".2s">
                                            <h4 class="title"><?php echo $settings['heading_3']; ?></h4>
                                            <p>
                                                <?php echo $settings['description_3']; ?> </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}

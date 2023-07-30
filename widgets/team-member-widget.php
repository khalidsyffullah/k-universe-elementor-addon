<?php

if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Plugin;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class K_Universe_Elementor_team_members_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'K_Universe-testimonail';
    }

    public function get_title()
    {
        return esc_html__('K_Universe team_members', 'k-universe-elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-tabs';
    }

    public function get_categories()
    {
        return array('K_Universe-category');
    }

    public function get_keywords()
    {
        return ['team_members', 'K_Universe', 'K_Universe-team_members'];
    }

    public function show_in_panel(): bool
    {
        return !Plugin::$instance->experiments->is_feature_active('nested-elements');
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'tab_section',
            [
                'label' => 'Team Members Tabs',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_member_name',
            [
                'label' => 'Team Member Name',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Team Member Name',
            ]
        );

        $repeater->add_control(
            'team_member_designation',
            [
                'label' => 'Team Member Designation',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Team Member Designation',
            ]
        );

        $repeater->add_control(
            'team_member_image',
            [
                'label' => __('Image', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );


        $repeater->add_control(
            'team_member_description',
            [
                'label' => 'Team Member Description',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'Team Member Description',
            ]
        );

        $this->add_control(
            'Team_member',
            [
                'label' => 'Team Members Information Tabs',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'team_member_name' => 'Team Member Name',
                        'team_member_description' => 'Team Member Description',
                        'team_member_designation' => 'Team Member Designation'
                    ],
                    [
                        'team_member_name' => 'Team Member Name',
                        'team_member_description' => 'Team Member Description',
                        'team_member_designation' => 'Team Member Designation'
                    ],
                    [
                        'team_member_name' => 'Team Member Name',
                        'team_member_description' => 'Team Member Description',
                        'team_member_designation' => 'Team Member Designation'
                    ],
                ],
                'title_field' => '{{{ team_member_name }}}',
            ]
        );

        $this->end_controls_section();

        // Style Tab

        $this->start_controls_section(
            'style_section',
            [
                'label' => 'Icon Style',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Add typography and text color controls for team_member_name in the Style tab
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_member_name_typography_style',
                'label' => 'Name Typography',
                'selector' => '{{WRAPPER}} .testimonial-content .title',
            ]
        );

        $this->add_control(
            'team_member_name_color',
            [
                'label' => 'Name Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Add typography and text color controls for team_member_designation in the Style tab
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_member_designation_typography_style',
                'label' => 'Designation Typography',
                'selector' => '{{WRAPPER}} .testimonial-content span',
            ]
        );

        $this->add_control(
            'team_member_designation_color',
            [
                'label' => 'Designation Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content span' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Add typography and text color controls for team_member_description in the Style tab
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_member_description_typography_style',
                'label' => 'Description Typography',
                'selector' => '{{WRAPPER}} .testimonial-content p',
            ]
        );

        $this->add_control(
            'team_member_description_color',
            [
                'label' => 'Description Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_content_paragraph_margin',
            [
                'label' => __('Paragraph Margin', 'your-plugin'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        

        

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();

        if (!empty($settings['Team_member'])) {
            $widget_id = 'K_Universe-team-members-' . $this->get_id();

            // Output the widget HTML markup
?>
            <!-- <section class="testimonial-area"> -->
                <!-- <div class="container"> -->

                <div class="testimonial-item-wrap" id="team-card">

                    <div id="<?php echo esc_attr($widget_id); ?>" class="testimonial-active">
                        <?php foreach ($settings['Team_member'] as $index => $item) : ?>
                            <div class="team-member-column">
                                <div class="testimonial-item">
                                    <div class="testimonial-shape">
                                        <svg viewBox="0 0 561 274" fill="none" x="0px" y="0px" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M97.8407 0H531C547.569 0 561 13.4315 561 30V244C561 260.569 547.569 274 531 274H127.841C111.272 274 97.8407 260.569 97.8407 244V78.4298C97.8407 66.4626 90.7283 55.6401 79.7433 50.8921L6.37287 19.1792C-3.59343 14.8715 -0.516972 0 10.3404 0H97.8407Z" fill="currentcolor" />
                                        </svg>
                                    </div>

                                    <div class="testimonial-thumb">
                                        <?php if (!empty($item['team_member_image']['url'])) : ?>
                                            <img class="thumb-img" src="<?php echo esc_url($item['team_member_image']['url']); ?>" alt="<?php echo esc_attr($item['team_member_name']); ?>">
                                        <?php endif; ?>
                                    </div>

                                    <div class="testimonial-content">
                                        <p>
                                            <?php echo wp_kses_post($item['team_member_description']); ?>
                                        </p>
                                        <div class="testimonial-bottom">
                                            <h5 class="title"><?php echo esc_html($item['team_member_name']); ?></h5>
                                            <span><?php echo esc_html($item['team_member_designation']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- </div> -->
            <!-- </section> -->


            <script>
                jQuery(document).ready(function($) {
                    var widgetId = '<?php echo $widget_id; ?>';
                    $('#' + widgetId).slick({
                        autoplay: true,
                        autoplaySpeed: 2000,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false,
                        pauseOnHover: true,
                        responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }]
                    });
                });
            </script>



            <!-- <script>
            jQuery(document).ready(function($) {
                var sliderId = '#<?php echo esc_js($widget_id); ?>';
                var sliderSettings = {
                    autoplay: true, // Enable autoplay
                    autoplaySpeed: 5000, // Autoplay interval in milliseconds
                    prevArrow: '',
        nextArrow: '',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: slidesToShow,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: Math.min(2, slidesToShow),
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
            // Add more responsive breakpoints if needed
        ]
                    // Add other settings as needed
                };

                $(sliderId).slick(sliderSettings);
            });




            
        </script> -->




            

<?php
        }
    }
}

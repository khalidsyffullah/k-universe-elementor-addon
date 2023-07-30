<?php

if (!defined('ABSPATH')) {
    exit;
}
use Elementor\Plugin;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;




class K_Universe_Elementor_Tab_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'K_Universe-tab';
    }

    public function get_title()
    {
        return esc_html__('K_Universe Tab', 'k-universe-elementor-addon');
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
        return ['tabs', 'K_Universe', 'K_Universe-tabs'];
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
                'label' => 'Tabs',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' => 'Tab Title',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Tab',
            ]
        );

        $repeater->add_control(
            'tab_icon',
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

        $repeater->add_control(
            'tab_description',
            [
                'label' => 'Tab Description',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'Tab Description',
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => 'Tabs',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => 'Tab 1',
                        'tab_description' => 'Tab 1 Description',
                    ],
                    [
                        'tab_title' => 'Tab 2',
                        'tab_description' => 'Tab 2 Description',
                    ],
                    [
                        'tab_title' => 'Tab 3',
                        'tab_description' => 'Tab 3 Description',
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
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
                    '{{WRAPPER}} .custom-tab-widget .k-universe-tab-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'K_Universe-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-tab-widget .k-universe-tab-icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'tab_title_style_section',
            [
                'label' => 'Tab Title Style',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'active_tab_background_color',
            [
                'label' => 'Active Tab Background Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'active_tab_border_color',
            [
                'label' => 'Active Tab Border Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link.active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_title_border_radius',
            [
                'label' => 'Tab Title Border Radius',
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tab_title_border_size',
            [
                'label' => 'Tab Title Border Size',
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tab_title_padding',
            [
                'label' => 'Tab Title Padding',
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        



        $this->add_control(
            'tab_title_background_color',
            [
                'label' => 'Tab Title Background Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_title_color',
            [
                'label' => 'Tab Title Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        


        


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'K_Universe-elementor-widget'),
                'selector' => '{{WRAPPER}} .nav-link',
            ]
        );

        $this->end_controls_section();





        $this->start_controls_section(
            'tab_content_style_section',
            [
                'label' => 'Tab Content Style',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tab_content_background_color',
            [
                'label' => 'Tab Content Background Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cases-details-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tab_content_border',
                'label' => 'Tab Content Border',
                'selector' => '{{WRAPPER}} .cases-details-content',
                ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_description_typography',
                'label' => esc_html__('Tab Description Typography', 'K_Universe-elementor-widget'),
                'selector' => '{{WRAPPER}} .tab-content .tab-pane p',
            ]
        );
        
        $this->end_controls_section();
        

    }


    /**
     * Render Widget Output
     */
    protected function render()
    {
        $settings = $this->get_settings();

        if (!empty($settings['tabs'])) {
            $widget_id = 'K_Universe-tab-' . $this->get_id();

            echo '<div class="custom-tab-widget">';

            echo '<ul class="nav nav-tabs" id="' . $widget_id . '-tabs" role="tablist">';
            foreach ($settings['tabs'] as $index => $tab) {
                $active_class = ($index === 0) ? 'active' : '';
                echo '<li class="nav-item" role="presentation">';
                echo '<button class="nav-link ' . $active_class . '" id="' . $widget_id . '-tab-' . $index . '" data-bs-toggle="tab" data-bs-target="#' . $widget_id . '-tab-pane-' . $index . '" type="button" role="tab" aria-controls="' . $widget_id . '-tab-pane-' . $index . '" aria-selected="' . ($index === 0 ? 'true' : 'false') . '">';
                echo $tab['tab_title'];
                echo '</button>';
                echo '</li>';
            }
            echo '</ul>';

            echo '<div class="tab-content" id="' . $widget_id . '-tab-content">';
            foreach ($settings['tabs'] as $index => $tab) {
                $active_class = ($index === 0) ? 'show active' : '';
                echo '<div class="tab-pane fade ' . $active_class . '" id="' . $widget_id . '-tab-pane-' . $index . '" role="tabpanel" aria-labelledby="' . $widget_id . '-tab-' . $index . '" tabindex="0">';
                echo '<div class="cases-details-wrap">';
                echo '<div class="cases-details-content">';
                if (!empty($tab['tab_icon'])) {
                    echo '<div class="icon">';
                    echo '<i class="k-universe-tab-icon ' . $tab['tab_icon']['value'] . '"></i>';
                    echo '</div>';
                }
                echo '<p>';
                echo $tab['tab_description'];
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            echo '</div>';

            // JavaScript code to handle tab switching
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var tabs = document.querySelectorAll("#' . $widget_id . '-tabs button");
                var tabContent = document.querySelectorAll("#' . $widget_id . '-tab-content .tab-pane");

                tabs.forEach(function(tab) {
                    tab.addEventListener("click", function() {
                        var tabId = this.getAttribute("data-bs-target");

                        // Remove active class from all tabs
                        tabs.forEach(function(tab) {
                            tab.classList.remove("active");
                        });

                        // Add active class to the clicked tab
                        this.classList.add("active");

                        // Hide all tab content
                        tabContent.forEach(function(content) {
                            content.classList.remove("show", "active");
                        });

                        // Show the corresponding tab content
                        document.querySelector(tabId).classList.add("show", "active");
                    });
                });
            });
        </script>';
        }
    }
}

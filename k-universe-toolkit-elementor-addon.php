<?php

/*
Plugin Name: K Universe Elementor Addon
Plugin URI: https://wordpress.org/plugins/k-universe-elementor-addon/
Description: Custom Elementor addon
Version: 1.0.0
Author: Khalid Syffullah
Author URI: https://github.com/khalidsyffullah/
Text Domain: k-universe-elementor-addon
Domain Path: /languages
*/

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Widgets.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_K_Universe_custom_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/card-widget.php' );  // include the widget file
    require_once(__DIR__ . '/widgets/timeline-widget.php'); // include the timeline widget file
    require_once(__DIR__ . '/widgets/tab-widget.php'); // include the timeline widget file
    require_once(__DIR__ . '/widgets/button-widget.php'); // include the timeline widget file
    require_once(__DIR__ . '/widgets/multi-color-widget.php'); // include the timeline widget file
    require_once(__DIR__ . '/widgets/team-member-widget.php'); // include the timeline widget file





    $widgets_manager->register( new \K_Universe_Elementor_Card_Widget() );  // register the widget
    $widgets_manager->register(new \K_Universe_Elementor_Timeline_Widget()); // register the timeline widget
    $widgets_manager->register(new \K_Universe_Elementor_Tab_Widget()); // register the timeline widget
    $widgets_manager->register(new \K_Universe_Elementor_Tab_Widget()); // register the timeline widget
    $widgets_manager->register(new \K_Universe_Elementor_button_Widget()); // register the timeline widget
    $widgets_manager->register(new \K_Universe_Elementor_multicolor_heading_Widget()); // register the timeline widget
    $widgets_manager->register(new \K_Universe_Elementor_team_members_Widget()); // register the timeline widget






}
add_action( 'elementor/widgets/register', 'register_K_Universe_custom_widgets' );


function enqueue_bootstrap() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
  
    // Enqueue Bootstrap JavaScript
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), '4.5.0', true);
  }
  add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

  
  function enqueue_K_Universe_styles() {
    wp_enqueue_style('k_universe-styles', plugin_dir_url(__FILE__) . 'css/k_universe-style.css');
    wp_enqueue_style('fontawesome-styles', plugin_dir_url(__FILE__) . 'css/fontawesome-all.min.css');
    wp_enqueue_style('animation-styles', plugin_dir_url(__FILE__) . 'css/animate.min.css');
  }
  add_action('wp_enqueue_scripts', 'enqueue_K_Universe_styles');

  function enqueue_custom_addon_scripts() {
    wp_enqueue_script('jquery-script', plugin_dir_url(__FILE__) . 'js/jquery-3.6.0.min.js');
    wp_enqueue_script('wow-script', plugin_dir_url(__FILE__) . 'js/wow.min.js', array('jquery'), '1.1.2', true);
    wp_enqueue_script('k_universe-scripts', plugin_dir_url(__FILE__) . 'js/K_Universe-main.js');
    wp_enqueue_script('slick-script', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js');
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', [], '5.15.3' );
    wp_enqueue_script( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js', [], '5.15.3', true );
    wp_enqueue_script('slick-script', plugin_dir_url(__FILE__) . 'js/aos.js');

    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', ['jquery'], '1.8.1', true);





}


function enqueue_swiper_scripts() {
  wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
  wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_swiper_scripts' );



add_action( 'wp_enqueue_scripts', 'enqueue_custom_addon_scripts' );

  
  



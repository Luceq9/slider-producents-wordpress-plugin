<?php
/*
Plugin Name: Slider Producents
Description: A simple slider plugin for displaying producents.
Version: 1.0
Author: Luceq
*/

function slider_producents_enqueue_scripts() {
    wp_enqueue_style('slider-producents-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('slider-producents-script', plugins_url('script.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'slider_producents_enqueue_scripts');

function slider_producents_shortcode($atts) {
    ob_start();
    ?>
        <div class="slider-producents"></div>
            <div class="slider-wrapper">
                <?php
                // Example array of producents' logos
                $producents = array(
                    array('name' => 'Producent 1', 'logo' => plugins_url('images/logo1.png', __FILE__)),
                    array('name' => 'Producent 2', 'logo' => plugins_url('images/logo2.png', __FILE__)),
                    array('name' => 'Producent 3', 'logo' => plugins_url('images/logo3.png', __FILE__)),
                );

                foreach ($producents as $producent) {
                    echo '<div class="slide">';
                    echo '<img src="' . esc_url($producent['logo']) . '" alt="' . esc_attr($producent['name']) . '">';
                    echo '</div>';
                echo '<button class="carousel-button prev">Prev</button>';
                echo '<button class="carousel-button next">Next</button>';
                }
                ?>
            </div>
        </div>
    <?php
    return ob_get_clean();
}
add_shortcode('slider_producents', 'slider_producents_shortcode');

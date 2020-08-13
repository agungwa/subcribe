<?php 

function sub_adds(){

    // CSS
        wp_enqueue_style('sub-main-style', plugins_url().'/subcribe/css/main.css');
    // JS
        wp_enqueue_style('sub-main-script', plugins_url().'/subcribe/js/main.js');
    // Add Google Script
    wp_register_script('google','https://apis.google.com/js/platform.js"');
    wp_enqueue_script('google');
    
}

add_action('wp_enqueue_scripts','sub_adds');

<?php 
/*
Plugin Name: Subcribe
Plugin URI: https://agungw.net/
Description: Don't forget drink coffee
Version: 0.0.1
Author: Agung Widhiatmojo
Author URI: https://agungw.com/
License: None
Text Domain: subcribe
*/
if(!defined('ABSPATH')){
    exit;
}

//load scripts
require_once(plugin_dir_path(__FILE__).'/core/subcribe-add.php');
//load class
require_once(plugin_dir_path(__FILE__).'/core/subcribe-class.php');
//register widget
function register_subcribe(){
    register_widget('Subcribe_Widget');
}

//hook in function
add_action('widgets_init','register_subcribe');
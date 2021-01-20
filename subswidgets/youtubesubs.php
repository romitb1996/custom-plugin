<?php
/*
Plugin Name: Subcribe Widgets
Plugin URI: http://romitb.sgedu.site/
Description: Display profile and subscription count, with additional features
Version: 1.0.0
Author: Romit Bagadia
Author URI: https://www.linkedin.com/in/romit-bagadia-5793611bb/
*/

// will exit if directly accessed
if(!defined('ABSPATH')){
  exit;
}

// loads scripts
require_once(plugin_dir_path(__FILE__).'/includes/subswidgets-scripts.php');

// loads class
require_once(plugin_dir_path(__FILE__).'/includes/subswidgets-class.php');

// Registering Widget
function register_subswidgets(){
  register_widget('Subs_Widget');
}

// Hook function
add_action('widgets_init', 'register_subswidgets');
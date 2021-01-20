<?php
  // Add Scripts
  function sw_add_scripts(){
    //CSS if needed
    wp_enqueue_style('sw-main-style', plugins_url(). '/subswidgets/css/style.css');
    // JS if needed
    wp_enqueue_script('sw-main-script', plugins_url(). '/subswidgets/js/main.js');

    // Add Google Script
    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
  }

  add_action('wp_enqueue_scripts', 'sw_add_scripts');
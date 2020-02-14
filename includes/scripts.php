  <?php
  // Add Scripts
  function flw_add_scripts(){
    // Add Main CSS
    wp_enqueue_style('flw-main-style', plugins_url(). '/followers/css/style.css');
    // Add Main JS
    wp_enqueue_script('flw-main-script', plugins_url(). '/followers/js/main.js');

    // Add Google Script
    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
  }

  add_action('wp_enqueue_scripts', 'flw_add_scripts');
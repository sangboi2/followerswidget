<?php
/**
 * Plugin Name:       Followers
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       It shows your followers.
 * Version:           1.0.0
 * Author:            Philip Thang
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       Followers
 * Domain Path:       /languages
 */
// Terminate if it is accessed by in-human.
if(!defined('ABSPATH')){
    exit;
  }

  // Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__).'/includes/class.php');

// Register Widget
function register_followers(){
  register_widget('Followers_Widget');
}

// Hook in function
add_action('widgets_init', 'register_followers');




<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
// include '../../js/custom.js';
// wp_enqueue_script( 'script', '/wp-content/plugins/WeatherPlugin/js/custom.js');
wp_enqueue_script( 'customJs', plugin_dir_url(__FILE__) . 'js/custom.js', array('jquery'));
// wp_register_script('customJs', plugin_dir_url(__FILE__) . '../../js/custom.js', array('jquery'));
$settings           = array(
  'menu_title'      => 'Framework',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Made by<small> Mahadi8457</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();


// -----------------------------------------------------------------------------------------------
// CUSTOM SETTINGS FOR weather
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options[]              = array(

  'name'              => 'Temparature',
  'title'             => 'tempurature',
  'icon'             => 'fa fa-star',

 // begin: fields
  'fields'      => array(

   // begin: a field
    array(
      'id'      => 'Location',
      'type'    => 'text',
      'title'   => 'Locatioin',
    ),
    // end: a field

   // begin: a field
    array(
      'id'      => 'shortcode_name',
      'type'    => 'text',
      'title'   => 'Unique ID',
      'class'   => 'Unique_id'
    ),
    // end: a field

  // begin: a field
    array(
      'id'      => 'shortcode_123',
      'class'   => 'shortcode',
      'type'    => 'text',
      'title'   => 'Shortcode',
      'desc'    => 'Use This Short code to see Weather',
      'help'    => 'Use This Shortcode',
      'default' => '[wup_weather]',
    ),
    // end: a field
  ),
);


CSFramework::instance( $settings, $options );
?>

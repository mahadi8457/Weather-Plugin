<?php

/**
 * A simple plugin to Show wheather update 
 *
 * 
 *
 * @link              https://a.weather_updater_plugin
 * @since             1.0.0
 * @package           weather_updater_plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Weather Updater Plugin
 * Plugin URI:        https://a.Weather.plugin
 * Description:       A simple plugin to Show wheather update 
 * Version:           1.0.0
 * Author:            Mahadi Hasan
 * Author URI:        https://fb.com/mahadi8457
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       weather-updater-plugin
 * Domain Path:       /languages
 */


// If this file is called directly, abort.


if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'WUP_VERSION', '1.0.0' );
define( 'WUP_NAME', 'Weather Update Plugin' );

/**
 * cs-framework
 */
include'cs-framwork/cs-framework.php';
// require get_parent_theme_file_path(  );

class WUP_Main
{
	public function __construct()
	{
		add_action('admin_menu', 'wup_menu');
	}

	function activate()
	{
		// generated a CPT
		// flush rewrite rules
		flush_rewrite_rules();
		
	}
		function deactivate(){
		// flush rewrite rules

	}
	function uninstall(){
		// delete CPT
		// delete all the plugin data from the DB
	}
}

$wup_main = new WUP_Main();


//activation

register_activation_hook( __FILE__, array ( $wup_main, 'activate'));

//deactivation

register_deactivation_hook( __FILE__, array ( $wup_main, 'deactivate'));

//uninstall



// Menu Registration code
	function wup_menu() {
	add_menu_page( 'Plugin Options', 'Weather Plugin', 'manage_options', 'wup_Weather_update_plugin', 'wup_plugin_options' );
	}

	function wup_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}}	



function wup_Weather_plugin($atts, $content){
?>
<script>
jQuery(document).ready(function(){
  var city = "<?php echo cs_get_option( 'Location' );?>";
  var searchtext = "select item.condition from weather.forecast where woeid in (select woeid from geo.places(1) where text='" + city + "') and u='c'"
  //change city variable dynamically as required
  jQuery.getJSON("https://query.yahooapis.com/v1/public/yql?q=" + searchtext + "&format=json").success(function(data){
   console.log(data);
   jQuery('#temp').html("Temperature in " + city + " is " + data.query.results.channel.item.condition.temp + "°C");
  });
});
</script>
<div id="temp"></div>
<?php

}
$shortcd = cs_get_option( 'shortcode_name' );
add_shortcode( 'wup_weather', 'wup_Weather_plugin');

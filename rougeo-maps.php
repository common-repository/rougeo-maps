<?php
/**
* Plugin Name: Rougeo Maps
* Plugin URI: http://www.rougeo.com/wordpress
* Description: Show Rougeo maps on your website
* Version: 1.0
* Author: Geosho Cyf
* Author URI: http://www.rougeo.com/wordpress
* License: GPL12
*/


add_action( 'admin_menu', 'rougeomaps_custom_admin_menu' );

function rougeomaps_custom_admin_menu() {
    add_options_page(
        'Rougeo Maps',
        'Rougeo Maps',
        'manage_options',
        'rougeo-maps',
        'rougeomaps_options_page'
    );
}

function rougeomaps_options_page() {
    ?>
    <div class="wrap">
        <h2>Rougeo Maps</h2>
        <p>Please copy the shortcode below and paste it anywhere on the page you would like your map to show.</p>
          <p><div style="background: #b7e3f2; border: 1px solid #88c3d7; color: #222222; padding: 5px 10px; border-radius: 3px; display: inline-block;">[rougeomap trailid="11" lang="EN"]</div></p>
        <h3>Customise</h3>
        <ul>
          <li>- Replace the <em>'trailid'</em> value with your Rougeo Trail ID (e.g trailid="323").</li>
          <li>- Replace the <em>'lang'</em> value with your desired language if available. (e.g lang="EN" or lang="CY").</li>
        </ul>

          <h3>Support</h3>
            <p>If you would like any assistance with our plugin please do not hesitate to get in touch. <a href="http://www.rougeo.com" target="_blank">Visit our website</a> for support contact details. </p>
    </div>

<?php
}


function rougeomaps_shortcode_func($atts)
{

  $atts = shortcode_atts(array(
            'trailid' => '#',
            'lang' => 'EN'
        ), $atts, 'rougeomaps');

?>




<iframe src="http://rougeo.geosho.com/RougeoCore/iframe_trail_full_detail/<?php echo $atts['trailid'];?>/?lang=<?php echo $atts['lang'];?>" style="width: 100%; min-height: 550px; float: left; margin: 0px; padding: 0px; border: none;"></iframe>
<div style="color: #c0c0c0; font-size: 13px; background: #f1f1f1; padding: 3px 6px 0px 6px; display: inline-block; -webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px; -moz-border-radius-bottomright: 4px; -moz-border-radius-bottomleft: 4px; border-bottom-right-radius: 4px; border-bottom-left-radius: 4px;">
  <a href="http://www.rougeo.com" target="_blank" style="font-size: 13px; color: #999999; text-decoration: none; font-weight: bold;">Rougeo</a> | <a href="http://rougeo.geosho.com/RougeoCore/iframe_trail_full_detail/<?php echo $atts['trailid'];?>/?lang=<?php echo $atts['lang'];?>" target="_blank" style="font-size: 13px; color: #999999; text-decoration: none;"> View Full Map</a>
</div>

<?php }

add_shortcode('rougeomaps', 'rougeomaps_shortcode_func');

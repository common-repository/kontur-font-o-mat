<?php
/*
* @link              https://profiles.wordpress.org/netzaufsicht/
 * @since             1.0.0
 * @package kontur-font-o-mat
 *
 * @wordpress-plugin
 * Plugin Name:       kontur Font-o-Mat
 * Plugin URI:        https://wordpress.org/plugins/kontur-font-o-mat/
 * Description:       We are going wild with fonts on the Gutenberg RichText editor toolbar. <br>Change font family and/or size and/or font-weight on each word or even a single letter - just as you want! This one is for the font-lovers. Therfor you can set up to 5 fonts. And even can set classes you want them as well to be attached to.
 * Version:           1.1.2
 * Author:            Eilert Behrends
 * Author URI:        https://profiles.wordpress.org/netzaufsicht/
 * License:           GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: kontur-font-o-mat
 * Domain Path:       /languages/
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$kntrfnt_data = get_file_data(
	__FILE__,
	array(
		'Version' => 'Version',
	)
);

define( 'KNTRFNT_VERSION', $kntrfnt_data['Version'] );
define( 'KNTRFNT_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'KNTRFNT_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'KNTRFNT_BASENAME', plugin_basename( __FILE__ ) );

require_once KNTRFNT_PATH . '/_inc/class.kontur-font-o-mat-main.php';

new kontur_font_o_mat\Main();


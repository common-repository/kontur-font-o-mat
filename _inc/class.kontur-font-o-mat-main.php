<?php
/**
 * @package kontur-font-o-mat
 * @author Eilert Behrends
 * @since             1.0.0
 * @package kontur-font-o-mat
 * @license GPL-2.0+
 */


namespace kontur_font_o_mat;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Main {
	/**
	 * Constructor
	 */
	public function __construct() {
		// Translations
		load_plugin_textdomain( 'kontur-font-o-mat', false, dirname( KNTRFNT_BASENAME ) . '/languages' );

		// Leave me alane: Uninstallation process
		register_uninstall_hook( KNTRFNT_BASENAME, 'kontur_font_o_mat\Main::uninstall_kontur_font_o_mat' );

		// Link to this plugin settings page in plugin list
		add_filter( 'plugin_action_links_' . KNTRFNT_BASENAME, array( $this, 'add_action_links' ) );

		// Load classes
		$this->load_classes();
	}

	/**
	 * Load classes
	 */
	private function load_classes() {
		require_once( KNTRFNT_PATH . '/_inc/class.kontur-font-o-mat-config.php' );
		require_once( KNTRFNT_PATH . '/_inc/class.kontur-font-o-mat-enqueue.php' );
		require_once( KNTRFNT_PATH . '/_inc/class.kontur-font-o-mat-options.php' );
	}

	/**
	 * Add a Link to this plugin settings page in plugin list
	 */
	public function add_action_links( $links ) {
		$link = '<a href="' . admin_url( 'options-general.php?page=kontur-font-o-mat-option' ) . '">' . __( 'Settings', 'kontur-font-o-mat' ) . '</a>';
		array_unshift( $links, $link );
		return $links;
	}

	/**
	 * Uninstallation process
	 */
	public static function uninstall_kontur_font_o_mat() {
		$options = array();

		for ( $i = 0; $i <= 4; $i ++ ) {
			$options[] = 'kntrfnt_kntrfntmt_active_' . $i;
			$options[] = 'kntrfnt_kntrfntmt_title_' . $i;
            $options[] = 'kntrfnt_kntrfntmt_fontfamily_' . $i;
             $options[] = 'kntrfnt_kntrfntmt_class_' . $i;
			
			
		}

		for ( $i = 0; $i <= 3; $i ++ ) {
			$options[] = 'kntrfnt_font_size_active_' . $i;
			$options[] = 'kntrfnt_font_size_title_' . $i;
			$options[] = 'kntrfnt_font_size_size_' . $i;
		}
        
        
        
        
        	for ( $i = 0; $i <= 3; $i ++ ) {
			$options[] = 'kntrfnt_font_weight_active_' . $i;
			$options[] = 'kntrfnt_font_weight_title_' . $i;
			$options[] = 'kntrfnt_font_weight_size_' . $i;
		}

		$options[] = 'kntrfnt_underline_active';
		$options[] = 'kntrfnt_clear_format_active';
        $options[] = 'kntrfnt_load_fonts_active';
        $options[] = 'kntrfnt_load_fonts';

		foreach ( $options as $key ) {
			delete_option( $key );
		}
	}
}

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


class Enqueue {

	/**
	 * Constructor
	 */
	function __construct() {
		// Enqueue front-end scripts
		// add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Enqueue block editor scripts  enqueue_block_editor_assets
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_editor_scripts' ) );

		// Enqueue option page scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_option_scripts' ) );
       
	}

  
    
	/**
	 * Enqueue front-end scripts
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'kontur-font-o-mat', KNTRFNT_URL . '/admin/css/style.css', array(), KNTRFNT_VERSION );
        
        
        $fontenq = $this->get_load_fonts();
		wp_enqueue_style( 'kontur-font-o-mat-editor-fonts', $fontenq, array(), KNTRFNT_VERSION );
      
        

		$inline_css = $this->get_inline_css();
		wp_add_inline_style( 'kontur-font-o-mat', $inline_css );
	}

	/**
	 * Enqueue block editor scripts
	 */
	public function enqueue_editor_scripts() {
		wp_enqueue_style( 'kontur-font-o-mat-editor', KNTRFNT_URL . '/admin/css/kontur-font-o-mat-style-editor.css', array(), KNTRFNT_VERSION );
      
         $fontenq = $this->get_load_fonts();
		wp_enqueue_style( 'kontur-font-o-mat-editor-fonts', $fontenq, array(), KNTRFNT_VERSION );
			

		$inline_css = $this->get_inline_css();
		wp_add_inline_style( 'kontur-font-o-mat-editor', $inline_css );

		$asset = include( KNTRFNT_PATH . '/admin/js/format.asset.php' );
		wp_enqueue_script( 'kontur-font-o-mat-editor', KNTRFNT_URL . '/admin/js/format.js', $asset['dependencies'] );

		wp_localize_script( 'kontur-font-o-mat-editor', 'rtexConf', $this->create_editor_config() );

		wp_set_script_translations( 'kontur-font-o-mat-editor', 'kontur-font-o-mat', KNTRFNT_PATH . '/languages' );
        
        
	}

	/**
	 * Enqueue option page scripts
	 */
	public function enqueue_option_scripts( $hook ) {
		if ( 'settings_page_kontur-font-o-mat-option' !== $hook ) {
			return;
		}

		
   
		wp_enqueue_style( 'kontur-font-o-mat-option', KNTRFNT_URL . '/admin/css/kontur-font-o-mat-settings42.css', array(), KNTRFNT_VERSION );
        
        $fontenq = $this->get_load_fonts();
		wp_enqueue_style( 'kontur-font-o-mat-option-fonts', $fontenq, array(), KNTRFNT_VERSION );
			
    
        
		$inline_css = $this->get_inline_css();
		wp_add_inline_style( 'kontur-font-o-mat-option', $inline_css );

		
    
	}

    	/**
	 * Get the fonts, if they shall be loaded 
	 *
	 * @return string
	 */
    
    
        
        private function get_load_fonts() {
		$fontcss    = '';
		
        

		// check if fonts shall be loaded
		
			if ( get_option( 'kntrfnt_kntrfntmt_active_', true ) ) {
				
				
            $loadfontfamily      = get_option( 'kntrfnt_load_fonts');
            $loadfontfamily2 = esc_url($loadfontfamily);
            $fontcss = $loadfontfamily2;
                
		
        
			}
		
	


		return $fontcss;
	}
        
    
		/**
	 * Get inline style css
	 *
	 * @return string
	 */
	private function get_inline_css() {
		$css    = '';
		$styles = array();
        

		// Generate kntrfntmt style
		for ( $i = 0; $i <= 4; $i++ ) {
			if ( get_option( 'kntrfnt_kntrfntmt_active_' . $i, true ) ) {
				
				
                $fontfamily      = get_option( 'kntrfnt_kntrfntmt_fontfamily_' . $i, Config::$default_font_family[ $i ] ); 
                 $fontfamily_esc      = esc_attr($fontfamily);

              if ( get_option( 'kntrfnt_kntrfntmt_class_' . $i, true ) ) {  
              $get_classy = get_option( 'kntrfnt_kntrfntmt_class_' . $i, Config::$default_own_class[ $i ] ); 
            $get_classy_esc = esc_attr($get_classy);
                  	$css .= "${get_classy_esc}, .kontur-font-o-mat-font-${i}{ font-family:${fontfamily_esc}!important;}";
              }
                
			else 	$css .= ".kontur-font-o-mat-font-${i} { font-family:${fontfamily_esc}!important;}";
               
			}
		}

		// Generate font size style
		for ( $i = 0; $i <= 3; $i++ ) {
			if ( get_option( 'kntrfnt_font_size_active_' . $i, true ) ) {
				$font_size = get_option( 'kntrfnt_font_size_size_' . $i, Config::$font_size[ $i ] ) / 1;
				$css      .= ".kntrfnt-font-size-${i}, #kntrfnt-font-size-preview-${i}{ font-size: ${font_size}%;}";
			}
		}
        
        
        		// Generate font WEIGHT style
		for ( $i = 0; $i <= 3; $i++ ) {
			if ( get_option( 'kntrfnt_font_weight_active_' . $i, true ) ) {
				$font_weight = get_option( 'kntrfnt_font_weight_size_' . $i, Config::$font_weight[ $i ] ) / 1;
				$css      .= ".kntrfnt-font-weight-${i}, #kntrfnt-font-weight-preview-${i}{ font-weight: ${font_weight};}";
			}
		}

		return $css;
	}

	/**
	 * Generate settings to be passed to the block editor
	 *
	 * @return array
	 */
	private function create_editor_config() {
		$config = array(
			'kntrfntmt' => array(),
			'fontSize'    => array(),
           'fontWeight'    => array(),
		);
        	$default_title = array(
			__( 'Courier', 'kontur-font-o-mat' ),
			__( 'Verdana', 'kontur-font-o-mat' ),
			__( 'Helvetica / Arial', 'kontur-font-o-mat' ),
			__( 'Times', 'kontur-font-o-mat' ),
            __( 'Georgia', 'kontur-font-o-mat' ),
		);


		for ( $i = 0; $i <= 4; $i++ ) {
			if ( get_option( 'kntrfnt_kntrfntmt_active_' . $i, true ) ) {
				$config['kntrfntmt'][] = array(
					'title'     => get_option( 'kntrfnt_kntrfntmt_title_' . $i, $default_title[ $i ] ),
					'className' => 'kontur-font-o-mat-font-' . $i,
				);
			}
		}

		$default_title = array(
			__( 'Extra small', 'kontur-font-o-mat' ),
			__( 'Small', 'kontur-font-o-mat' ),
			__( 'Large', 'kontur-font-o-mat' ),
			__( 'Extra large', 'kontur-font-o-mat' ),
		);

		for ( $i = 0; $i <= 3; $i++ ) {
			if ( get_option( 'kntrfnt_font_size_active_' . $i, true ) ) {
				$config['fontSize'][] = array(
					'title'     => get_option( 'kntrfnt_font_size_title_' . $i, $default_title[ $i ] ),
					'className' => 'kntrfnt-font-size-' . $i,
				);
			}
		}
        
        
        	$default_title = array(
			__( '200', 'kontur-font-o-mat' ),
			__( '300', 'kontur-font-o-mat' ),
			__( '400', 'kontur-font-o-mat' ),
			__( '600', 'kontur-font-o-mat' ),
            __( '900', 'kontur-font-o-mat' ),
		);
        	for ( $i = 0; $i <= 4; $i++ ) {
			if ( get_option( 'kntrfnt_font_weight_active_' . $i, true ) ) {
				$config['fontWeight'][] = array(
					'title'     => get_option( 'kntrfnt_font_weight_title_' . $i, $default_title[ $i ] ),
					'className' => 'kntrfnt-font-weight-' . $i,
				);
			}
		}

		$config['underlineActive']   = get_option( 'kntrfnt_load_fonts_active', true );
		$config['clearFormatActive'] = get_option( 'kntrfnt_clear_format_active', true );
        $config['loadFontActive'] = get_option( 'kntrfnt_load_fonts_active', true );

		return $config;
	}
}

new Enqueue();
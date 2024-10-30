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

class Options {
	// Settable font size range
	const MIN_FONT_SIZE = 70;
	const MAX_FONT_SIZE = 300;
    // Settable font weight range
    const MIN_FONT_WEIGHT = 200;
	const MAX_FONT_WEIGHT = 900;
    
  

	/**
	 * Constructor
	 */
	public function __construct() {
		// Add option page
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );

		// Create setting
		add_action( 'admin_init', array( $this, 'register_option' ) );
	}

	/**
	 * Add option page
	 */
	public function add_options_page() {
		$this->hook = add_options_page(
			__( 'kontur-font-o-mat Settings', 'kontur-font-o-mat' ),
			__( 'kontur Font-o-Mat', 'kontur-font-o-mat' ),
			'manage_options',
			'kontur-font-o-mat-option',
			array( $this, 'create_options_page' )
		);

		//Load javascript to allow drag/drop, expand/collapse of metaboxes
		add_action( 'load-' . $this->hook, array( $this, 'load_postbox' ) );
	}

	/**
	 * Load javascript to allow drag/drop, expand/collapse of metaboxes
	 */
	public function load_postbox() {
		wp_enqueue_script( 'postbox' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script('common');
        add_thickbox(); 
		wp_enqueue_script('wp-lists');
        wp_enqueue_script('plugin-install');
	}

		/**
	 * Create setting
	 */
	public function register_option() {
		for ( $i = 0; $i <= 4; $i++ ) {
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_kntrfntmt_active_' . $i,
				array( $this, 'sanitize_checkbox' )
			);
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_kntrfntmt_title_' . $i,
				'sanitize_text_field'
			);
            
            	register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_kntrfntmt_fontfamily_' . $i,
				'sanitize_text_field'
			);
            
                	register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_kntrfntmt_class_' . $i,
				'sanitize_text_field'
			);
            
             
		
		
		
		}

		for ( $i = 0; $i <= 3; $i++ ) {
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_font_size_active_' . $i,
				array( $this, 'sanitize_checkbox' )
			);
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_font_size_title_' . $i,
				'sanitize_text_field'
			);
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_font_size_size_' . $i,
				array( $this, 'sanitize_font_size' )
			);
		}
        
        
        
        	for ( $i = 0; $i <= 3; $i++ ) {
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_font_weight_active_' . $i,
				array( $this, 'sanitize_checkbox' )
			);
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_font_weight_title_' . $i,
				'sanitize_text_field'
			);
			register_setting(
				'kontur-font-o-mat-group',
				'kntrfnt_font_weight_size_' . $i,
				array( $this, 'sanitize_font_weight' )
			);
		}

		register_setting(
			'kontur-font-o-mat-group',
			'kntrfnt_underline_active',
			array( $this, 'sanitize_checkbox' )
		);

		register_setting(
			'kontur-font-o-mat-group',
			'kntrfnt_clear_format_active',
			array( $this, 'sanitize_checkbox' )
		);
        
        register_setting(
			'kontur-font-o-mat-group',
			'kntrfnt_load_fonts_active',
			array( $this, 'sanitize_checkbox' )
		);
        
            register_setting(
			'kontur-font-o-mat-group',
			'kntrfnt_load_fonts',
			array( $this, 'sanitize_text_field' )
		);
	}

	/**
	 * Sanitizer (Chechbox)
	 * @param string $value input value.
	 *
	 * @return string
	 */
	public static function sanitize_checkbox( $value ) {
		return ( isset( $value ) ? true : false );
	}

	/**
	 * Sanitizer (Range)
	 * @param string $value input value.
	 *
	 * @return string
	 */
	public static function sanitize_range( $value ) {
		$value = absint( $value );
		$value = max( 0, $value );
		$value = min( 100, $value );
		return $value;
	}

		/**
	 * Sanitizer (Font size)
	 * @param string $value input value.
	 *
	 * @return string
	 */
	public static function sanitize_font_size( $value ) {
		$value = absint( $value );
		$value = max( self::MIN_FONT_SIZE, $value );
		$value = min( self::MAX_FONT_SIZE, $value );
		return $value;
	}
    
    
    		/**
	 * Sanitizer (Font weight)
	 * @param string $value input value.
	 *
	 * @return string
	 */
	public static function sanitize_font_weight( $value ) {
		$value = absint( $value );
		$value = max( self::MIN_FONT_WEIGHT, $value );
		$value = min( self::MAX_FONT_WEIGHT, $value );
		return $value;
	}


	/**
	 * Create our meta boxes
	 */
	public function create_meta_boxes() {
        
        $svg01 =
// Icon 01
'<span class="me-4"><?xml version="1.0" encoding="utf-8"?>
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" aria-hidden="true" focusable="false">
    <path d="M4.87,20.56H1.11a1.13,1.13,0,0,1-.84-.27A1.16,1.16,0,0,1,0,19.44V3.75a1.64,1.64,0,0,1,.08-.53.88.88,0,0,1,.26-.36L3.46.22A.85.85,0,0,1,3.79.06,1.63,1.63,0,0,1,4.24,0H15a1.13,1.13,0,0,1,.84.27,1.13,1.13,0,0,1,.27.84V4a1.45,1.45,0,0,1-.09.54.9.9,0,0,1-.25.36L13.1,7.14a1.11,1.11,0,0,1,.82.27,1.16,1.16,0,0,1,.27.85v2.9a1.36,1.36,0,0,1-.09.53.87.87,0,0,1-.25.37L10.7,14.67a.7.7,0,0,1-.3.17,1.33,1.33,0,0,1-.45.07H9.1V16.8a1.46,1.46,0,0,1-.08.54.93.93,0,0,1-.26.36L5.62,20.31a.81.81,0,0,1-.31.17A1.23,1.23,0,0,1,4.87,20.56ZM8,17.67a.91.91,0,0,0,.67-.2,1,1,0,0,0,.2-.67V12h4.21a1,1,0,0,0,.67-.2.91.91,0,0,0,.21-.67V8.26a.91.91,0,0,0-.21-.67.91.91,0,0,0-.67-.21H8.86V4.87H15a.9.9,0,0,0,.66-.21A.91.91,0,0,0,15.91,4V1.11A.89.89,0,0,0,15.7.45.9.9,0,0,0,15,.24H4.24a.91.91,0,0,0-.67.21.89.89,0,0,0-.2.66V16.8a.91.91,0,0,0,.2.67.91.91,0,0,0,.67.2ZM6,15.5V2.42h7.73v.24H6.25V9.59h5.52v.24H6.25V15.5Z "></path>
</svg></span>';
add_meta_box(
'kntrfnt-metabox-kntrfntmt',
$svg01 . __( 'Set your fonts ', 'kontur-font-o-mat' ),
array( $this, 'metabox_kntrfntmt' ),
$this->hook,
'normal'
);

$svg02 =
// Icon 02
'<span class="me-4">
    <?xml version="1.0" encoding="utf-8"?>
    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 14" aria-hidden="true" focusable="false">
        <path d="M5.07,13.6,5,12.48h0a3.19,3.19,0,0,1-2.62,1.3,2.07,2.07,0,0,1-2.3-2c0-1.64,1.52-2.71,4.89-2.66V9a1.93,1.93,0,0,0-2-2.15,3.63,3.63,0,0,0-2.07.6L.53,6.89a4.31,4.31,0,0,1,2.37-.7c2.46,0,2.73,1.9,2.73,3v2.62a11.44,11.44,0,0,0,.12,1.75ZM4.89,9.75C3,9.68.78,10,.78,11.66a1.46,1.46,0,0,0,1.58,1.52A2.56,2.56,0,0,0,4.8,11.7a1.18,1.18,0,0,0,.09-.42Z M16.74,14.26l-.23-2.14h-.06a6.15,6.15,0,0,1-5,2.49C8.25,14.61,7,12.47,7,10.79,7,7.62,9.9,5.57,16.4,5.65V5.33c0-1-.24-4.17-3.95-4.14a7,7,0,0,0-4,1.16L8,1.33A8.4,8.4,0,0,1,12.57,0c4.72,0,5.25,3.65,5.25,5.86v5a21.09,21.09,0,0,0,.23,3.36ZM16.4,6.84c-3.69-.11-7.92.47-7.92,3.68a2.81,2.81,0,0,0,3,2.93,4.91,4.91,0,0,0,4.7-2.84,2.21,2.21,0,0,0,.18-.81Z"></path>
    </svg>
</span>';
add_meta_box(
'kntrfnt-metabox-font-size',
$svg02 . __( 'Set your font sizes', 'kontur-font-o-mat' ),
array( $this, 'metabox_font_size' ),
$this->hook,
'normal'
);


$svg03 =
// Icon 03
'<span class="me-4">
    <?xml version="1.0" encoding="utf-8"?>
    <svg width="24" height="24" version="1.1" id="Layer_1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
        <g>
            <path d="M0.3,6.2c0.9-0.2,2-0.3,3.1-0.3c1.9,0,3.2,0.4,4.1,1.3c0.6,0.6,1,1.5,1,2.5c0,1.6-1.1,2.9-2.7,3.5v0.1
		c1.3,0.3,3.3,1.4,3.3,4c0,1.3-0.5,2.2-1.2,3c-1,1-2.7,1.5-4.9,1.5c-1.2,0-2.1-0.1-2.7-0.1V6.2z M1.4,12.8h2.3c2.3,0,3.7-1.3,3.7-3
		c0-2.2-1.7-3-4-3c-1,0-1.6,0.1-2,0.2V12.8z M1.4,20.6c0.5,0.1,1.1,0.1,1.9,0.1c2.4,0,4.6-0.9,4.6-3.5c0-2.4-2.1-3.5-4.6-3.5h-2
		V20.6z" />
            <path d="M11.6,6.2c0.9-0.2,3-0.3,4.9-0.3c2.2,0,3.6,0.2,4.8,0.8c1.2,0.6,2.1,1.7,2.1,3.2c0,1.3-0.7,2.6-2.5,3.3v0
		c1.9,0.5,3,1.9,3,3.8c0,1.5-0.7,2.6-1.8,3.4c-1.2,0.9-3.1,1.4-6.4,1.4c-1.9,0-3.3-0.1-4.1-0.3V6.2z M15.7,11.9h0.8
		c1.8,0,2.6-0.6,2.6-1.6c0-0.9-0.7-1.5-2.1-1.5c-0.7,0-1.1,0-1.4,0.1V11.9z M15.7,18.6c0.3,0,0.7,0,1.2,0c1.4,0,2.6-0.6,2.6-1.9
		c0-1.3-1.2-1.8-2.8-1.8h-1V18.6z" />
        </g>
    </svg>
</span>';
add_meta_box(
'kntrfnt-metabox-font-weight',
$svg03 .__( 'Set your font weights', 'kontur-font-o-mat' ),
array( $this, 'metabox_font_weight' ),
$this->hook,
'normal'
);


$svg04 =
// Icon 04
'<span class="me-4">
    <?xml version="1.0" encoding="utf-8"?>
    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M7 18v1h10v-1H7zm5-2c1.5 0 2.6-.4 3.4-1.2.8-.8 1.1-2 1.1-3.5V5H15v5.8c0 1.2-.2 2.1-.6 2.8-.4.7-1.2 1-2.4 1s-2-.3-2.4-1c-.4-.7-.6-1.6-.6-2.8V5H7.5v6.2c0 1.5.4 2.7 1.1 3.5.8.9 1.9 1.3 3.4 1.3z"></path>
    </svg>
</span>';

add_meta_box(
'kntrfnt-metabox-underline',
$svg04 . __( 'Enable "Underline" in the editor?', 'kontur-font-o-mat' ),
array( $this, 'metabox_underline' ),
$this->hook,
'normal'
);

$svg05 =
// Icon 05
'<span class="me-4">
    <?xml version="1.0" encoding="utf-8"?>
    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <g>
            <g>
                <path d="M18,22c-0.2,0-0.4,0-0.6-0.1l-5.1-2.7c-0.2-0.1-0.5-0.1-0.8,0l-5.1,2.7c-0.4,0.2-0.9,0.2-1.3-0.1
			c-0.4-0.3-0.5-0.7-0.5-1.2l1-5.7c0-0.3,0-0.5-0.2-0.7L1.4,10C1.1,9.7,1,9.2,1.1,8.8C1.3,8.3,1.6,8,2.1,8l5.7-0.8
			c0.3,0,0.5-0.2,0.6-0.4L11,1.6c0.2-0.4,0.6-0.7,1.1-0.7c0,0,0,0,0,0c0.5,0,0.9,0.3,1.1,0.7l2.5,5.2C15.8,7,16,7.2,16.3,7.2L22,8.1
			c0.5,0.1,0.8,0.4,1,0.8c0.1,0.4,0,0.9-0.3,1.2l-4.2,4c-0.2,0.2-0.3,0.5-0.2,0.7l0.9,5.7c0.1,0.4-0.1,0.9-0.5,1.2
			C18.5,21.9,18.3,22,18,22z M12,18.6c0.2,0,0.4,0,0.6,0.1l5.1,2.7c0.3,0.1,0.6,0.1,0.8-0.1c0.3-0.2,0.4-0.5,0.3-0.8l-0.9-5.7
			c-0.1-0.4,0.1-0.8,0.3-1.1l4.2-4c0.2-0.2,0.3-0.5,0.2-0.8c-0.1-0.3-0.3-0.5-0.6-0.6l-5.7-0.9c-0.4-0.1-0.7-0.3-0.9-0.7l-2.5-5.2
			c-0.1-0.3-0.4-0.5-0.7-0.5c-0.3,0-0.6,0.2-0.7,0.4L8.8,6.9C8.6,7.3,8.3,7.5,7.9,7.6L2.1,8.4c-0.3,0-0.6,0.2-0.7,0.5
			c-0.1,0.3,0,0.6,0.2,0.8l4.1,4.1c0.3,0.3,0.4,0.7,0.3,1.1l-1,5.7c-0.1,0.3,0.1,0.6,0.3,0.8c0.3,0.2,0.6,0.2,0.8,0.1l5.1-2.7
			C11.6,18.7,11.8,18.6,12,18.6z" />
            </g>
            <g>
                <path d="M18,22c-0.2,0-0.4,0-0.6-0.1l-5.1-2.7c-0.2-0.1-0.5-0.1-0.8,0l-5.1,2.7c-0.4,0.2-0.9,0.2-1.3-0.1
			c-0.4-0.3-0.5-0.7-0.5-1.2l1-5.7c0-0.3,0-0.5-0.2-0.7L1.4,10C1.1,9.7,1,9.2,1.1,8.8C1.3,8.3,1.6,8,2.1,8l5.7-0.8
			c0.3,0,0.5-0.2,0.6-0.4L11,1.6c0.2-0.4,0.6-0.7,1.1-0.7c0,0,0,0,0,0c0.5,0,0.9,0.3,1.1,0.7l2.5,5.2C15.8,7,16,7.2,16.3,7.2L22,8.1
			c0.5,0.1,0.8,0.4,1,0.8c0.1,0.4,0,0.9-0.3,1.2l-4.2,4c-0.2,0.2-0.3,0.5-0.2,0.7l0.9,5.7c0.1,0.4-0.1,0.9-0.5,1.2
			C18.5,21.9,18.3,22,18,22z M12,18.6c0.2,0,0.4,0,0.6,0.1l5.1,2.7c0.3,0.1,0.6,0.1,0.8-0.1c0.3-0.2,0.4-0.5,0.3-0.8l-0.9-5.7
			c-0.1-0.4,0.1-0.8,0.3-1.1l4.2-4c0.2-0.2,0.3-0.5,0.2-0.8c-0.1-0.3-0.3-0.5-0.6-0.6l-5.7-0.9c-0.4-0.1-0.7-0.3-0.9-0.7l-2.5-5.2
			c-0.1-0.3-0.4-0.5-0.7-0.5c-0.3,0-0.6,0.2-0.7,0.4L8.8,6.9C8.6,7.3,8.3,7.5,7.9,7.6L2.1,8.4c-0.3,0-0.6,0.2-0.7,0.5
			c-0.1,0.3,0,0.6,0.2,0.8l4.1,4.1c0.3,0.3,0.4,0.7,0.3,1.1l-1,5.7c-0.1,0.3,0.1,0.6,0.3,0.8c0.3,0.2,0.6,0.2,0.8,0.1l5.1-2.7
			C11.6,18.7,11.8,18.6,12,18.6z" />
            </g>
        </g>
    </svg>
</span>';
add_meta_box(
'kntrfnt-metabox-load-font',
$svg05 . __( 'Load your own fonts from "Google", "Adobe"...?', 'kontur-font-o-mat' ),
array( $this, 'metabox_load_font' ),
$this->hook,
'normal'
);


$svg06 =
// Icon 06
'<span class="me-4">
    <?xml version="1.0" encoding="utf-8"?>
    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M 17.148438 5.507812 L 18.46875 6.839844 C 18.960938 7.320312 19.199219 7.96875 19.199219 8.605469 L 19.199219 11.148438 C 19.199219 11.785156 18.960938 12.433594 18.46875 12.910156 L 10.511719 20.867188 C 10.03125 21.359375 9.382812 21.601562 8.746094 21.601562 C 8.113281 21.601562 7.464844 21.359375 6.984375 20.867188 L 5.652344 19.546875 L 4.332031 18.214844 C 3.839844 17.734375 3.601562 17.089844 3.601562 16.453125 L 3.601562 13.90625 C 3.601562 13.261719 3.839844 12.625 4.332031 12.132812 L 12.289062 4.1875 C 12.769531 3.695312 13.414062 3.457031 14.050781 3.457031 C 14.6875 3.457031 15.324219 3.695312 15.816406 4.1875 Z M 9.695312 17.148438 L 17.398438 9.445312 C 17.867188 8.976562 17.867188 8.207031 17.398438 7.726562 L 14.832031 5.160156 C 14.605469 4.933594 14.292969 4.8125 13.96875 4.8125 C 13.644531 4.8125 13.34375 4.933594 13.117188 5.160156 L 5.410156 12.863281 C 4.945312 13.34375 4.945312 14.113281 5.410156 14.578125 L 7.980469 17.148438 C 8.4375 17.605469 9.226562 17.605469 9.695312 17.148438 Z M 9.695312 17.148438 "></path>
    </svg>
</span>';
add_meta_box(
'kntrfnt-metabox-clear-format',
$svg06 . __( 'Enable "Clear format"?', 'kontur-font-o-mat' ),
array( $this, 'metabox_clear_format' ),
$this->hook,
'normal'
);
}

/**
* The options page
*/
public function create_options_page() {
self::create_meta_boxes();
?>



<div class="wrap" style="padding:15px; background:white; ">

    <style>
        body {
            background: white;
        }
    </style>


    <div class="kntr-row d-flex align-items-center mt-3 ps-2">

        <div class="kntr-col-9">
            <h1 class="kntr-large mt-3 d-none"><?php esc_html_e( 'kontur "Font-o-Mat" Settings', 'kontur-font-o-mat' ); ?> </h1>

        </div>
        <div class="kntr-col-3" style="max-width:300px;"><img src="<?php echo KNTRFNT_URL . '/admin/img/werbekontur_font-o-mat.png'; ?>" alt="kontur nonags" height="auto" width="100%"> </div>
    </div>
    <form method="post" action="options.php">
        <?php
					settings_fields( 'kontur-font-o-mat-group' );
					do_settings_sections( 'kontur-font-o-mat-group' );
					wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', true );
					wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
				?>


        <?php      
        


  //Get the active tab from the $_GET param
  $default_tab = null;
  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

  ?>

        <nav class="nav-tab-wrapper">
            <a href="?page=kontur-font-o-mat-option" class="settings nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">
                <?php esc_html_e( 'Settings', 'kontur-font-o-mat' ); ?>
            </a>
            <a href="?page=kontur-font-o-mat-option&tab=about" class="nav-tab <?php if($tab==='about'):?>nav-tab-active<?php endif; ?>">

                <?php esc_html_e( 'About', 'kontur-font-o-mat' ); ?>
            </a>

        </nav>
        <div class="tab-content">
            <?php switch($tab) :
                  case 'settings': 
        { ?>
            <?php }
        break;
      case 'about': 
        { ?>

            <div class="mx-4 col col-sm-8 align-self-center" style="height:70px;">
                <div style="width:60px; float:right;"><svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #FFFFFF;
                                stroke: #636363;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-miterlimit: 10;
                            }
                        </style>
                        <g id="mb-stern_x5F_10">
                        </g>
                        <g>
                            <path class="st0" d="M60.4,26.5h-4.2l-8.7-15.4c-0.5-0.9-1.8-1.6-2.8-1.6h-1.2l-2.7,8.4c0.8,0.3,1.5,0.8,1.9,1.5l6,10.7
		c0.5,0.9,0.5,2.4,0,3.3L42.4,44c-0.5,0.9-1.8,1.6-2.9,1.6l-7.8-0.1L29,53.7l15.1,0.1c1,0,2.3-0.7,2.9-1.6l8.7-14.7h4.6
		c1,0,1.9-0.9,1.9-1.9v-7.2C62.3,27.4,61.4,26.5,60.4,26.5z"></path>
                        </g>
                        <g>
                            <path class="st0" d="M24.4,43.8l-6.1-10.7c-0.5-0.9-0.5-2.4,0-3.3l6.3-10.6c0.5-0.9,1.8-1.6,2.9-1.6l6.4,0.1l2.7-8.2L22.8,9.3
		c-1,0-2.3,0.7-2.9,1.6l-9.2,15.6H3.8c-1,0-1.9,0.9-1.9,1.9v7.2c0,1,0.9,1.9,1.9,1.9h7.6l8.2,14.4c0.5,0.8,1.6,1.6,2.6,1.7l2.9-9.1
		C24.8,44.4,24.6,44.1,24.4,43.8z"></path>
                        </g>
                    </svg></div>

                <h2 class="kntr-no-nags-h2 pt-4"> <?php esc_html_e( 'About ', 'kontur-font-o-mat' ); ?> </h2>

            </div>
            <div class="mx-4 col col-sm-8 align-self-center">
                <hr>
                <p><?php esc_html_e( 'We love the Gutenberg editor, but wanted / needed some more wild typography options.  ', 'kontur-font-o-mat' ); ?></p>
                <p> <?php esc_html_e( 'kontur Font-o-Mat gives us the optiones to use fonts and typography pretty playfull as a design feature.  ', 'kontur-font-o-mat' ); ?></p>



                <p><?php esc_html_e( 'This is a free plugin without any premium versions or paid options. We intend to develop this further with a few more options in the future.  ', 'kontur-font-o-mat' ); ?><br><br><strong><?php esc_html_e( 'Have FUN using it!  ', 'kontur-font-o-mat' ); ?> </strong> </p>
                <hr>
                <h2 class="kntr-no-nags-h2 pt-4"> <?php esc_html_e( 'Support ', 'kontur-font-o-mat' ); ?> </h2> <span class="dashicons dashicons-wordpress" style="display: inline-block; color:#707070;"></span>
                <p class="ps-2 d-inline"><?php esc_html_e( 'For suggestions, questions, help: please visit our ', 'kontur-font-o-mat' ); ?>
                    <a href="https://wordpress.org/support/plugin/kontur-font-o-mat/" target="_blank" rel="noopener"><?php esc_html_e( 'WordPress plugin support page ', 'kontur-font-o-mat' ); ?>

                    </a><br>
                </p>
                <p><small><?php esc_html_e( 'Please keep in mind, that this is a free plugin, so you probably might have to wait a moment, because we are stuck in our normal life and cannot give 24/7 support ', 'kontur-font-o-mat' ); ?></small></p>
                <hr>
                <h2 class="kntr-no-nags-h2 pt-4"> <?php esc_html_e( 'Need / want more? ', 'kontur-font-o-mat' ); ?> </h2>
                <p> <?php esc_html_e( 'Contact us, follw us via LinkedIn, WhatsApp, Email or Instagram', 'kontur-font-o-mat' ); ?> </p>
                <hr>
                <div style="  display: flex;
  justify-content: start;
  align-items: center;
  height: auto;
  "> <a href="mailto:hello@kontur.us" target="_blank" title="Send us an email" rel="noopener" style="">
                        <div style="width:20px;display: inline-block;">
                            <svg id="email" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 32.31">
                                <path d="M40,18.72h0v-4.75h0c-.07-8.69-1.55-13.93-11.94-13.96H10.83V.03C.98,.44-.02,5.41,0,13.6H0v4.75h0c.07,8.69,1.55,13.93,11.94,13.96H28.05c10.89-.08,11.96-5.11,11.94-13.6h0ZM28.05,3.01h0c2.43,.02,4.24,.42,5.56,1.15l-13.24,12.65L7.16,3.72c1.23-.44,2.79-.68,4.78-.71H28.05Zm0,26.29h0s-16.11,0-16.11,0c-8.03-.08-9.17-4.2-9.22-11.01h0v-4.69h0c0-3.57,.25-6.35,1.82-8.17l15.79,15.65,.2-.19h0s15.3-14.61,15.3-14.61c1.14,1.88,1.42,4.51,1.44,7.75h0v4.69h0c0,6.57-.86,10.48-9.22,10.58h0Z" style="fill:#707070;" />
                            </svg>
                        </div>
                    </a>



                    <a href="https://wa.me/4915154747294?text=Hello%20" title="send us a WhatsApp Message" target="_blank" rel="noopener" style="margin-left:15px;display: inline-block;">
                        <div style="width:20px;display: block;"><svg id="WApp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.2 41.81">
                                <path d="M37.2,13.67c-.06-5.75-1.46-9.38-4.42-11.44C30.09,.37,26.49,0,21.56,0h-.24s-.05,0-.07,0h-4.99s-.03,0-.05,0C11.97,.04,7.62,.35,4.58,2.42,1.47,4.53,.02,8.14,0,13.76v8.11H0c.05,6.4,1.76,10.25,5.48,12.16L.37,39.49c-.43,.46-.49,1.16-.15,1.69,.26,.4,.7,.63,1.15,.63,.15,0,.3-.02,.45-.08l17.53-6.1h1.58s.03,0,.05,0c4.25-.03,8.6-.35,11.63-2.42,3.11-2.11,4.57-5.72,4.58-11.34V13.72s0-.03,0-.05h0Zm-2.75,8.2c-.02,6.08-1.94,8.09-3.38,9.07-2.44,1.66-6.31,1.91-10.14,1.94,0,0-.02,0-.03,0h-1.77c-.15,0-.31,.03-.45,.08l-12.48,4.35,2.68-2.87c.33-.35,.45-.84,.32-1.3s-.48-.82-.94-.96c-2.82-.83-5.44-2.65-5.5-10.3V13.76c.02-6.08,1.94-8.09,3.38-9.07,2.44-1.66,6.31-1.91,10.14-1.94,0,0,.02,0,.03,0h5.03s.05,0,.07,0h.16c4.28,0,7.55,.3,9.64,1.74,1.36,.95,3.19,2.93,3.24,9.23,0,0,0,.02,0,.02v8.11h0Z" style="fill:#707070;" />
                            </svg></div>
                    </a>


                    <a href="https://www.instagram.com/kontur.us/" title="follow us on Instagram" target="_blank" rel="noopener" style="margin-left:15px;">
                        <div style="width:20px;display: inline-block;">
                            <svg id="insta" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.75 39.75">
                                <path d="M26.5,19.87c0-3.65-2.98-6.62-6.62-6.62s-6.62,2.98-6.62,6.62,2.98,6.62,6.62,6.62,6.62-2.98,6.62-6.62Zm3.57,0c0,5.64-4.55,10.19-10.19,10.19s-10.19-4.55-10.19-10.19,4.55-10.19,10.19-10.19,10.19,4.55,10.19,10.19Zm2.79-10.61c0,1.32-1.06,2.38-2.38,2.38s-2.38-1.06-2.38-2.38,1.06-2.38,2.38-2.38,2.38,1.06,2.38,2.38ZM19.87,3.57c-2.9,0-9.11-.23-11.72,.8-.91,.36-1.58,.8-2.28,1.5s-1.14,1.37-1.5,2.28c-1.04,2.61-.8,8.82-.8,11.72s-.23,9.11,.8,11.72c.36,.91,.8,1.58,1.5,2.28s1.37,1.14,2.28,1.5c2.61,1.04,8.82,.8,11.72,.8s9.11,.23,11.72-.8c.91-.36,1.58-.8,2.28-1.5s1.14-1.37,1.5-2.28c1.04-2.61,.8-8.82,.8-11.72s.23-9.11-.8-11.72c-.36-.91-.8-1.58-1.5-2.28s-1.37-1.14-2.28-1.5c-2.61-1.04-8.82-.8-11.72-.8Zm19.87,16.3c0,2.74,.03,5.46-.13,8.2-.16,3.18-.88,6-3.21,8.33s-5.15,3.05-8.33,3.21c-2.74,.16-5.46,.13-8.2,.13s-5.46,.03-8.2-.13c-3.18-.16-6-.88-8.33-3.21S.29,31.26,.13,28.08C-.02,25.33,0,22.62,0,19.87s-.03-5.46,.13-8.2c.16-3.18,.88-6,3.21-8.33S8.49,.29,11.67,.13C14.41-.02,17.13,0,19.87,0s5.46-.03,8.2,.13c3.18,.16,6,.88,8.33,3.21s3.05,5.15,3.21,8.33c.16,2.74,.13,5.46,.13,8.2Z" style="fill:#707070;" />
                            </svg>
                        </div>
                    </a>

                    <a href="https://www.linkedin.com/company/kontur_us/" title="follow us on LinkedIn" target="_blank" rel="noopener" style="margin-left:15px;">
                        <div style="width:20px;display: inline-block;">
                            <svg id="linkedin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                                <path d="M6.17,33.49h6.02V15.42H6.17v18.07h0ZM12.58,9.84c-.03-1.77-1.3-3.12-3.36-3.12s-3.41,1.35-3.41,3.12,1.3,3.12,3.33,3.12h.03c2.11,0,3.41-1.41,3.41-3.12Zm15.23,23.65h6.02v-10.36c0-5.55-2.97-8.13-6.93-8.13-3.23,0-4.66,1.8-5.44,3.05h.05v-2.63h-6.02s.08,1.69,0,18.07h6.02v-10.1c0-.52,.03-1.07,.18-1.46,.44-1.07,1.43-2.19,3.1-2.19,2.16,0,3.02,1.64,3.02,4.09v9.66h0ZM40,7.5v25c0,4.14-3.36,7.5-7.5,7.5H7.5c-4.14,0-7.5-3.36-7.5-7.5V7.5C0,3.36,3.36,0,7.5,0h25c4.14,0,7.5,3.36,7.5,7.5Z" style="fill:#707070;" />
                            </svg>
                        </div>
                    </a>

                </div>




                <hr>
                <h2 class="kntr-no-nags-h2 pt-4">
                    <?php esc_html_e( 'Our other FREE WP Plugins: ', 'kontur-font-o-mat' ); ?>
                </h2>
                <?php   // plugin kontur Admin Style is active
         
         if (is_plugin_active('kontur-admin-style/kontur-admin-style.php')) { { ?>
                <hr><?php esc_html_e( '+ You are using kontur ADMIN STYLE ', 'kontur-font-o-mat' ); ?>
                <hr>
                <?php } } 
         else {         { ?>
                <hr>
                <blockquote class="wp-embedded-content" data-secret="QfDFmmJKpU"><a href="https://wordpress.org/plugins/kontur-admin-style/">kontur Admin Style</a></blockquote><iframe sandbox="allow-scripts" security="restricted" src="https://wordpress.org/plugins/kontur-admin-style/embed/#?secret=QfDFmmJKpU" width="600" height="400" title="&#8220;kontur Admin Style&#8221; &#8212; Plugin Directory" data-secret="QfDFmmJKpU" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" class="wp-embedded-content"></iframe>
                <script type="text/javascript">
                    /*! This file is auto-generated */ ! function(c, l) {
                        "use strict";
                        var e = !1,
                            o = !1;
                        if (l.querySelector)
                            if (c.addEventListener) e = !0;
                        if (c.wp = c.wp || {}, c.wp.receiveEmbedMessage);
                        else if (c.wp.receiveEmbedMessage = function(e) {
                                var t = e.data;
                                if (!t);
                                else if (!(t.secret || t.message || t.value));
                                else if (/[^a-zA-Z0-9]/.test(t.secret));
                                else {
                                    for (var r, s, a, i = l.querySelectorAll('iframe[data-secret="' + t.secret + '"]'), n = l.querySelectorAll('blockquote[data-secret="' + t.secret + '"]'), o = 0; o < n.length; o++) n[o].style.display = "none";
                                    for (o = 0; o < i.length; o++)
                                        if (r = i[o], e.source !== r.contentWindow);
                                        else {
                                            if (r.removeAttribute("style"), "height" === t.message) {
                                                if (1e3 < (s = parseInt(t.value, 10))) s = 1e3;
                                                else if (~~s < 200) s = 200;
                                                r.height = s
                                            }
                                            if ("link" === t.message)
                                                if (s = l.createElement("a"), a = l.createElement("a"), s.href = r.getAttribute("src"), a.href = t.value, a.host === s.host)
                                                    if (l.activeElement === r) c.top.location.href = t.value
                                        }
                                }
                            }, e) c.addEventListener("message", c.wp.receiveEmbedMessage, !1), l.addEventListener("DOMContentLoaded", t, !1), c.addEventListener("load", t, !1);

                        function t() {
                            if (o);
                            else {
                                o = !0;
                                for (var e, t, r, s = -1 !== navigator.appVersion.indexOf("MSIE 10"), a = !!navigator.userAgent.match(/Trident.*rv:11\./), i = l.querySelectorAll("iframe.wp-embedded-content"), n = 0; n < i.length; n++) {
                                    if (!(r = (t = i[n]).getAttribute("data-secret"))) r = Math.random().toString(36).substr(2, 10), t.src += "#?secret=" + r, t.setAttribute("data-secret", r);
                                    if (s || a)(e = t.cloneNode(!0)).removeAttribute("security"), t.parentNode.replaceChild(e, t);
                                    t.contentWindow.postMessage({
                                        message: "ready",
                                        secret: r
                                    }, "*")
                                }
                            }
                        }
                    }(window, document);
                </script>


                <?php }}
         
        ; ?>


                <?php   // plugin kontur No Aioseo Nags is active
         
         
         if (is_plugin_active('no-aioseop-nags/no-aioseop-nags.php')) { { ?>
                <hr><?php esc_html_e( '+ You are blocking the SPAM with No AIOSEO Nags ', 'kontur-font-o-mat' ); ?>
                <?php } } 
         else {         { ?>
                
      

                <blockquote class="wp-embedded-content" data-secret="VqheqG3T8j"><a href="https://wordpress.org/plugins/no-aioseop-nags/">NO admin premium NAGS</a></blockquote><iframe sandbox="allow-scripts" security="restricted" src="https://wordpress.org/plugins/no-aioseop-nags/embed/#?secret=VqheqG3T8j" width="600" height="400" title="&#8220;No All in one SEO Notifications &#8211; STOP nagging me&#8221; &#8212; Plugin Directory" data-secret="VqheqG3T8j" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" class="wp-embedded-content"></iframe>
                <script type="text/javascript">
                    /*! This file is auto-generated */ ! function(c, l) {
                        "use strict";
                        var e = !1,
                            o = !1;
                        if (l.querySelector)
                            if (c.addEventListener) e = !0;
                        if (c.wp = c.wp || {}, c.wp.receiveEmbedMessage);
                        else if (c.wp.receiveEmbedMessage = function(e) {
                                var t = e.data;
                                if (!t);
                                else if (!(t.secret || t.message || t.value));
                                else if (/[^a-zA-Z0-9]/.test(t.secret));
                                else {
                                    for (var r, s, a, i = l.querySelectorAll('iframe[data-secret="' + t.secret + '"]'), n = l.querySelectorAll('blockquote[data-secret="' + t.secret + '"]'), o = 0; o < n.length; o++) n[o].style.display = "none";
                                    for (o = 0; o < i.length; o++)
                                        if (r = i[o], e.source !== r.contentWindow);
                                        else {
                                            if (r.removeAttribute("style"), "height" === t.message) {
                                                if (1e3 < (s = parseInt(t.value, 10))) s = 1e3;
                                                else if (~~s < 200) s = 200;
                                                r.height = s
                                            }
                                            if ("link" === t.message)
                                                if (s = l.createElement("a"), a = l.createElement("a"), s.href = r.getAttribute("src"), a.href = t.value, a.host === s.host)
                                                    if (l.activeElement === r) c.top.location.href = t.value
                                        }
                                }
                            }, e) c.addEventListener("message", c.wp.receiveEmbedMessage, !1), l.addEventListener("DOMContentLoaded", t, !1), c.addEventListener("load", t, !1);

                        function t() {
                            if (o);
                            else {
                                o = !0;
                                for (var e, t, r, s = -1 !== navigator.appVersion.indexOf("MSIE 10"), a = !!navigator.userAgent.match(/Trident.*rv:11\./), i = l.querySelectorAll("iframe.wp-embedded-content"), n = 0; n < i.length; n++) {
                                    if (!(r = (t = i[n]).getAttribute("data-secret"))) r = Math.random().toString(36).substr(2, 10), t.src += "#?secret=" + r, t.setAttribute("data-secret", r);
                                    if (s || a)(e = t.cloneNode(!0)).removeAttribute("security"), t.parentNode.replaceChild(e, t);
                                    t.contentWindow.postMessage({
                                        message: "ready",
                                        secret: r
                                    }, "*")
                                }
                            }
                        }
                    }(window, document);
                </script>


                <?php }}
         
        ; ?>


            </div>
            <div id="konturModal01" style="display:none; background:red;" class="kntr-row p-4 mt-5 ">
                <div class="kntr-row d-flex align-items-center mt-3 ps-2">
                    <div class="kntr-col-3"><img src="<?php echo KNTRFNT_URL . '/admin/img/werbekontur_font-o-mat.png'; ?>" alt="" height="auto" width="100%"> </div>
                    <div class="kntr-col-9">
                        <h2 class="kntr-no-nags-h2">
                            <?php esc_html_e( 'The Editor Button ', 'kontur-font-o-mat' ); ?>
                        </h2>
                    </div>
                </div>
                <hr>
                <div class="kntr-row d-flex align-items-center mt-3 ps-2">
                    <p class="p-3 ps-5 kntr-col-6 ">
                        <?php esc_html_e( ' This is appears in the top hand right corner on the post / page editor (Gutenberg) ', 'kontur-font-o-mat' ); ?>

                    </p>
                    <div class="p-3 ps-5 kntr-col-6 "><img src="<?php echo KNTRFNT_URL . '/admin/img/werbekontur_font-o-mat.png'; ?>" alt="Yoast Gutenberg Button" height="auto" width="100%">
                    </div>
                </div>
            </div>
            <?php }
        break;
      default:
      { ?>
            <div id="poststuff" style="padding:15px; background:white;">
                <div class="metabox-holder columns-1" id="post-body">
                    <div class="postbox-container" id="post-body-content">
                        <?php do_meta_boxes( $this->hook, 'normal', null ); ?>
                        <?php submit_button(); ?>
                    </div>
                </div>
            </div>
        </div>


        <?php }
        break;
    endswitch; ?>
</div>

</form>

<style>
    #wpfooter {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 10px 20px;
        color: #50575e;
        display: none;
    }
</style>
<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function($) {
        // close postboxes that should be closed
        $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
        // postboxes setup
        postboxes.add_postbox_toggles('<?php echo esc_attr( $this->hook ); ?>');
    });
    //]]>
</script>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // Sync range and number input
        $('.kntrfnt-range [type="range"]').on('input', function() {
            var parent = $(this).parents('.kntrfnt-range');
            parent.find('[type="number"]').val($(this).val());
        });
        $('.kntrfnt-range [type="number"]').on('change', function() {
            var parent = $(this).parents('.kntrfnt-range');
            parent.find('[type="range"]').val($(this).val());
        });


        // Preview styles (Font size)
        $('#kntrfnt-metabox-font-size input').on('change', function() {
            var index = $(this).parents('tr').attr('data-index');
            var active = $('[name="kntrfnt_font_size_active_' + index + '"]').prop('checked');
            var target = $('#kntrfnt-font-size-preview-' + index);
            var fontSize = parseInt($('[name="kntrfnt_font_size_size_' + index + '"]').val());

            if (!active) {
                target.css('font-size', '100%');
            } else {
                target.css('font-size', fontSize + '%');
            }
        });


        // Preview styles (Font weight)
        $('#kntrfnt-metabox-font-weight input').on('change', function() {
            var index = $(this).parents('tr').attr('data-index');
            var active = $('[name="kntrfnt_weight_size_active_' + index + '"]').prop('checked');
            var target = $('#kntrfnt-font-weight-preview-' + index);
            var fontWeight = parseInt($('[name="kntrfnt_font_weight_size_' + index + '"]').val());


            if (!active) {
                target.css('font-weight', fontWeight);

            } else {
                target.css('font-weight', fontWeight);

            }
        });


        // Preview styles (Font weight)

    });
</script>
<?php
	}

	/**
	 * Meta box(defaults)
	 */
	public function metabox_kntrfntmt() {
		$default_title = array(
			__( 'Courier', 'kontur-font-o-mat' ),
			__( 'Verdana', 'kontur-font-o-mat' ),
			__( 'Helvetica / Arial', 'kontur-font-o-mat' ),
			__( 'Times', 'kontur-font-o-mat' ),
           __( 'Georgia', 'kontur-font-o-mat' ),
		);
        
        	$default_family = array(
			__( 'Courier New, monospace;', 'kontur-font-o-mat' ),
			__( 'Verdana, sans-serif;', 'kontur-font-o-mat' ),
			__( 'Helvetica, sans-serif;', 'kontur-font-o-mat' ),
			__( 'Times New Roman, serif;', 'kontur-font-o-mat' ),
			__( 'Georgia, serif;', 'kontur-font-o-mat' ),
           
		);
        
        
               	$default_class = array(
			__( '.your-class1', 'kontur-font-o-mat' ),
			__( '.your-class2', 'kontur-font-o-mat' ),
			__( '.your-class3', 'kontur-font-o-mat' ),
			__( '.your-class4', 'kontur-font-o-mat' ),
			__( '.your-class5', 'kontur-font-o-mat' ),
           
		);
        
       
     
		?>



<div class="kntrfnt-inside kntr-container">



    <ul>
        <li><?php esc_html_e( 'Set your own fonts.', 'kontur-font-o-mat' ); ?> <?php esc_html_e( 'Make sure the fonts do exist / are beeing loaded.', 'kontur-font-o-mat' ); ?></li>
        <li><?php esc_html_e( 'The Fonts - like the ones from Googe, Adode etc.-  must be included in your theme or have to be loaded via a plugin! ', 'kontur-font-o-mat' ); ?><em><?php esc_html_e( 'You can add your link from Google, Adobe below under the "load your own fonts" options section.', 'kontur-font-o-mat' ); ?></em></li>
        <li><?php esc_html_e( 'If you change a setting, the font you\'ve already applied to your site content will also change to the new font.', 'kontur-font-o-mat' ); ?></li>
    </ul>




    <div class="kntrfnt-table-wrap kntr-row">



        <?php
						for ( $i = 0; $i <= 4; $i++ ) :
							?>
        <hr>
        <div class="d-flex flex-row flex-wrap" style="background:white;">
            <div class="align-self-center">
                <label class="kntrfnt-switch">
                    <input id="<?php echo  esc_attr('kntrfnt_kntrfntmt_active_' . $i); ?>" class="kntrfnt-ui-button" type="checkbox" name="<?php echo esc_html ( 'kntrfnt_kntrfntmt_active_' . $i ); ?>" value="1" <?php checked( get_option( 'kntrfnt_kntrfntmt_active_' . $i, true ) ); ?>>
                    <span class="kntrfnt-switch-thumb"></span>
                    <span class="kntrfnt-switch-track"></span>
                </label>
            </div>
            <div class="mx-4 align-self-center">
                <h2 style="font-size:23px; font-family:<?php echo esc_attr( get_option( 'kntrfnt_kntrfntmt_fontfamily_' . $i, $default_family[ $i ] ) ); ?>"><?php esc_html_e( 'Font', 'kontur-font-o-mat' ); ?> <?php echo esc_attr( $i+1); ?></h2>
            </div>
            <div class="align-self-center">
                <span id="kontur-font-o-mat-font-preview-<?php echo esc_attr( $i ); ?>" class="" style="font-size:23px; font-family:<?php echo esc_attr( get_option( 'kntrfnt_kntrfntmt_fontfamily_' . $i, $default_family[ $i ] ) ); ?>!important;}"><strong><?php esc_html_e( 'HELLO', 'kontur-font-o-mat' ); ?> </strong> <em><?php esc_html_e( 'This is', 'kontur-font-o-mat' ); ?> </em>"<?php echo esc_html( get_option( 'kntrfnt_kntrfntmt_title_' . $i, $default_title[ $i ] ) ); ?>"</span>
            </div>
            <div class="knt-col-12 p-3 align-self-center"><?php submit_button(); ?> <a href="#TB_inline?&inlineId=konturSetYourFonts" title="Info" class="thickbox"><span class="dashicons dashicons-info-outline kntr-no-nags-main-color"></span></a></div>
        </div>
        <div id="konturSetYourFonts" style="display:none;" class="kntr-row p-4 mt-5 ">
            <div class="kntr-row d-flex align-items-center mt-3 ps-2">
                <div class="kntr-col-3"><img src="<?php echo KNTRFNT_URL . '/admin/img/werbekontur_font-o-mat.png'; ?>" alt="" height="auto" width="100%"> </div>
                <div class="kntr-col-9">
                    <h2 class="kntr-no-nags-h2">
                        <?php esc_html_e( 'Set your fonts ', 'kontur-font-o-mat' ); ?>
                    </h2>
                </div>
            </div>
            <hr>
            <div class="kntr-row d-flex align-items-center mt-3 ps-2">
                <h3 class="ps-5 mb-0">
                    <?php esc_html_e( 'Your fonts in the editor ', 'kontur-font-o-mat' ); ?>
                </h3>
                <p class="p-3 ps-5 kntr-col-6 ">
                    <!--?xml version="1.0" encoding="utf-8"?-->
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" aria-hidden="true" focusable="false">
                        <path d="M4.87,20.56H1.11a1.13,1.13,0,0,1-.84-.27A1.16,1.16,0,0,1,0,19.44V3.75a1.64,1.64,0,0,1,.08-.53.88.88,0,0,1,.26-.36L3.46.22A.85.85,0,0,1,3.79.06,1.63,1.63,0,0,1,4.24,0H15a1.13,1.13,0,0,1,.84.27,1.13,1.13,0,0,1,.27.84V4a1.45,1.45,0,0,1-.09.54.9.9,0,0,1-.25.36L13.1,7.14a1.11,1.11,0,0,1,.82.27,1.16,1.16,0,0,1,.27.85v2.9a1.36,1.36,0,0,1-.09.53.87.87,0,0,1-.25.37L10.7,14.67a.7.7,0,0,1-.3.17,1.33,1.33,0,0,1-.45.07H9.1V16.8a1.46,1.46,0,0,1-.08.54.93.93,0,0,1-.26.36L5.62,20.31a.81.81,0,0,1-.31.17A1.23,1.23,0,0,1,4.87,20.56ZM8,17.67a.91.91,0,0,0,.67-.2,1,1,0,0,0,.2-.67V12h4.21a1,1,0,0,0,.67-.2.91.91,0,0,0,.21-.67V8.26a.91.91,0,0,0-.21-.67.91.91,0,0,0-.67-.21H8.86V4.87H15a.9.9,0,0,0,.66-.21A.91.91,0,0,0,15.91,4V1.11A.89.89,0,0,0,15.7.45.9.9,0,0,0,15,.24H4.24a.91.91,0,0,0-.67.21.89.89,0,0,0-.2.66V16.8a.91.91,0,0,0,.2.67.91.91,0,0,0,.67.2ZM6,15.5V2.42h7.73v.24H6.25V9.59h5.52v.24H6.25V15.5Z "></path>
                    </svg><?php esc_html_e( '<< By clicking on the "F"-Icon you can attach the selected font to words, sentences or even single letters', 'kontur-font-o-mat' ); ?>
                    <?php esc_html_e( 'Icon, you can attach the selected font to words, sentences or even single letters  ', 'kontur-font-o-mat' ); ?>
                    <br>
                    <?php esc_html_e( 'Your custom font name will appear within the Gutenberg editor', 'kontur-font-o-mat' ); ?> <?php esc_html_e( 'In this example we used "Courier New, monospace;" as font, but gave it the Name "My Font 1"', 'kontur-font-o-mat' ); ?> <?php esc_html_e( 'This might be helpfull for other editors, that have no clue about font names', 'kontur-font-o-mat' ); ?>

                </p>
                <div class="p-3 ps-5 kntr-col-6 "><img src="<?php echo KNTRFNT_URL . '/admin/img/kontur_font-o-mat_gutenberg_font-family.png'; ?>" alt="apply your fonts in Gutenberg" height="auto" width="100%">
                </div>
            </div>

            <hr>

            <div class="kntr-row d-flex align-items-center mt-3 ps-2">
                <h3 class="ps-5 mb-0">
                    <?php esc_html_e( 'The Font-Family ', 'kontur-font-o-mat' ); ?>
                </h3>
                <p class="p-3 pt-0 ps-5 kntr-col-12 ">

                    <br>
                    <?php esc_html_e( '  Make sure to enter the propper CSS property here. WITHOUT double or single quotes', 'kontur-font-o-mat' ); ?> <?php esc_html_e( 'E.g.: "Courier New, Helvetica, Arial, monospace;"', 'kontur-font-o-mat' ); ?> <?php esc_html_e( 'This might be helpfull for other editors, that have no clue about font names', 'kontur-font-o-mat' ); ?>

                </p>

            </div>
        </div>
        <hr>
        <div class="kntr-row my-3 kntr-row-cols-auto" data-index="<?php echo esc_attr( $i ); ?>">


            <div class="pt-3 kntr-col-12 kntr-col-lg-2"><label for="kntrfnt_kntrfntmt_title_" style="font-size:16px;"><?php esc_html_e( 'Name in editor:', 'kontur-font-o-mat' ); ?>
                    <br></label>
                <input type="text" style="width:100%;" class="form-control form-control-lg" name="<?php echo esc_attr(  'kntrfnt_kntrfntmt_title_' . $i ); ?>" value="<?php echo esc_html(get_option( 'kntrfnt_kntrfntmt_title_' . $i, $default_title[ $i ] )); ?>"><small>
                    <ul class="ps-2 mt-0"><?php esc_html_e( 'This will appear in the Gutenberg editor blocks  ', 'kontur-font-o-mat' ); ?></ul>
                </small>
            </div>
            <div class="kntr-col-12 pt-3 kntr-col-lg-3">
                <label for="kntrfnt_kntrfntmt_fontfamily_" style="font-size:16px;"><?php esc_html_e( 'font-family', 'kontur-font-o-mat' ); ?>
                    <?php echo esc_attr( $i+1 ); ?>:<br></label>
                <input type="text" style="width:100%;" name="<?php echo esc_attr( 'kntrfnt_kntrfntmt_fontfamily_' . $i ); ?>" value="<?php echo esc_attr( get_option( 'kntrfnt_kntrfntmt_fontfamily_' . $i, Config::$default_font_family [ $i ]  ) ); ?>"><small>
                    <ul class="ps-2 mt-0"><?php esc_html_e( 'Make sure to enter the propper CSS property here. WITHOUT double or single quotes', 'kontur-font-o-mat' ); ?></ul>
                </small>
            </div>

            <div class="kntr-col pt-3 knt-col-12 kntr-col-lg-7 ">
                <label for="kntrfnt_kntrfntmt_title_" style="font-size:16px;"><?php esc_html_e( 'Get classy', 'kontur-font-o-mat' ); ?>
                    :<br></label>
                <input type="text" style="width:100%;" name="<?php echo 'kntrfnt_kntrfntmt_class_' . $i; ?>" value="<?php echo esc_html( get_option( 'kntrfnt_kntrfntmt_class_' . $i, Config::$default_own_class[ $i ] ) );  ?>">
                <ul class="ps-2 mt-0" style="list-style-position: outside;"><small>
                        <li><?php esc_html_e( 'Other classes you want this font to be assigned to. ', 'kontur-font-o-mat' ); ?><?php esc_html_e( 'Classes need to start with a . (DOT), IDs with a #. Multiple classes can be separated with a , like e.g.: .class1, h1, #myid...', 'kontur-font-o-mat' ); ?></li>
                    </small></ul>
            </div>






        </div>



        <?php endfor; ?>



        <div class="knt-row"><?php submit_button(); ?></div>

    </div>
</div>
<?php
	}

    
 /**
* Meta box(Font weight)
 */
	public function metabox_font_weight() {
        
        
        
           		$default_title = array(
			__( '200 Thin', 'kontur-font-o-mat' ),
            __( '300 Light', 'kontur-font-o-mat' ),
			__( '600 Strong', 'kontur-font-o-mat' ),
			__( '900 Super-Bold', 'kontur-font-o-mat' ),
		
		);
		?>
<div class="kntrfnt-inside">
    <ul>
        <li><?php esc_html_e( 'The weights will appear selectable in te Gutenber Editor.', 'kontur-font-o-mat' ); ?></li>
        <li><?php esc_html_e( 'This will allow you, to e.g. apply different weights on words, or sentences', 'kontur-font-o-mat' ); ?></li>
    </ul>
    <div class="kntrfnt-table-wrap">
        <table class="form-table kntrfnt-table">
            <thead>
                <tr>
                    <th style="width: 10%;"><?php esc_html_e( 'Status', 'kontur-font-o-mat' ); ?></th>
                    <th style="width: 15%;"><?php esc_html_e( 'Name in editor', 'kontur-font-o-mat' ); ?></th>
                    <th style="width: 15%;"><?php esc_html_e( 'Weight', 'kontur-font-o-mat' ); ?></th>
                    <th style="width: 55%;"><?php esc_html_e( 'Preview', 'kontur-font-o-mat' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
						for ( $i = 0; $i <= 3; $i++ ) :
							?>
                <tr data-index="<?php echo esc_attr( $i ); ?>">
                    <td>
                        <label class="kntrfnt-switch">
                            <input id="<?php echo esc_attr( 'kntrfnt_font_weight_active_' . $i ); ?>" class="kntrfnt-ui-button" type="checkbox" name="<?php echo esc_attr( 'kntrfnt_font_weight_active_' . $i ); ?>" value="1" <?php checked( get_option( 'kntrfnt_font_weight_active_' . $i, true ) ); ?>>
                            <span class="kntrfnt-switch-thumb"></span>
                            <span class="kntrfnt-switch-track"></span>
                        </label>
                    </td>


                    <td>
                        <input type="text" name="<?php echo esc_attr(  'kntrfnt_font_weight_title_' . $i ); ?>" value="<?php echo esc_html( get_option( 'kntrfnt_font_weight_title_' . $i, $default_title[ $i ] ) ); ?>">
                    </td>
                    <td>
                        <div class="kntrfnt-range">
                            <input type="range" min="<?php echo self::MIN_FONT_WEIGHT; ?>" max="<?php echo self::MAX_FONT_WEIGHT; ?>" step="100" value="<?php echo esc_attr(get_option( 'kntrfnt_font_weight_size_' . $i, Config::$font_weight[ $i ] ) ); ?>">
                            <div class="kntrfnt-input">
                                <input type="number" min="<?php echo self::MIN_FONT_WEIGHT; ?>" max="<?php echo self::MAX_FONT_WEIGHT; ?>" step="1" class="kntrfnt-is-append" name="<?php echo esc_attr(  'kntrfnt_font_weight_size_' . $i ); ?>" value="<?php echo esc_html ( get_option( 'kntrfnt_font_weight_size_' . $i, Config::$font_weight[ $i ] ) ); ?>">

                            </div>
                        </div>
                    </td>

                    <td>
                        <span style=color:#ccc><?php esc_html_e( 'Weight a mintute:: ', 'kontur-font-o-mat' ); ?></span><span id="kntrfnt-font-weight-preview-<?php echo esc_attr( $i ); ?>"> <?php esc_html_e( 'Is this ', 'kontur-font-o-mat' ); ?><?php echo esc_html( get_option( 'kntrfnt_font_weight_title_' . $i, $default_title[ $i ] ) ); ?> ?</span>


                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <div class="col mb-3 py-3"><?php submit_button(); ?></div>
    </div>

</div>
<?php     
        
        
    }
 
    
	/**
	 * Meta box(Font size)
	 */
	public function metabox_font_size() {
		$default_title = array(
			__( 'Extra small', 'kontur-font-o-mat' ),
			__( 'Small', 'kontur-font-o-mat' ),
			__( 'Large', 'kontur-font-o-mat' ),
			__( 'Extra large', 'kontur-font-o-mat' ),
		);
		?>
<div class="kntrfnt-inside">
    <ul>
        <li><?php esc_html_e( 'The size is specified as a percentage of the base font size.', 'kontur-font-o-mat' ); ?></li>
        <li><?php esc_html_e( 'If you change each setting, the style you\'ve already applying to your content will also change.', 'kontur-font-o-mat' ); ?></li>
    </ul>
    <div class="kntrfnt-table-wrap">
        <table class="form-table kntrfnt-table">
            <thead>
                <tr>
                    <th style="width: 10%;"><?php esc_html_e( 'Status', 'kontur-font-o-mat' ); ?></th>
                    <th style="width: 15%;"><?php esc_html_e( 'Name in editor', 'kontur-font-o-mat' ); ?></th>
                    <th style="width: 20%;"><?php esc_html_e( 'Size', 'kontur-font-o-mat' ); ?></th>
                    <th style="width: 55%;"><?php esc_html_e( 'Preview', 'kontur-font-o-mat' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
						for ( $i = 0; $i <= 3; $i++ ) :
							?>
                <tr data-index="<?php echo esc_attr( $i ); ?>">
                    <td>
                        <label class="kntrfnt-switch">
                            <input id="<?php echo esc_attr( 'kntrfnt_font_size_active_' . $i ); ?>" class="kntrfnt-ui-button" type="checkbox" name="<?php echo esc_attr( 'kntrfnt_font_size_active_' . $i ); ?>" value="1" <?php checked( get_option( 'kntrfnt_font_size_active_' . $i, true ) ); ?>>
                            <span class="kntrfnt-switch-thumb"></span>
                            <span class="kntrfnt-switch-track"></span>
                        </label>
                    </td>
                    <td>
                        <input type="text" name="<?php echo esc_attr(  'kntrfnt_font_size_title_' . $i ); ?>" value="<?php echo esc_html( get_option( 'kntrfnt_font_size_title_' . $i, $default_title[ $i ] ) ); ?>">
                    </td>
                    <td>
                        <div class="kntrfnt-range">
                            <input type="range" min="<?php echo self::MIN_FONT_SIZE; ?>" max="<?php echo self::MAX_FONT_SIZE; ?>" step="1" value="<?php echo esc_attr(get_option( 'kntrfnt_font_size_size_' . $i, Config::$font_size[ $i ] ) ); ?>">
                            <div class="kntrfnt-input">
                                <input type="number" min="<?php echo self::MIN_FONT_SIZE; ?>" max="<?php echo self::MAX_FONT_SIZE; ?>" step="1" class="kntrfnt-is-append" name="<?php echo esc_attr(  'kntrfnt_font_size_size_' . $i ); ?>" value="<?php echo esc_html ( get_option( 'kntrfnt_font_size_size_' . $i, Config::$font_size[ $i ] ) ); ?>">
                                <span class="kntrfnt-input-append">%</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span style=color:#ccc><?php esc_html_e( 'Size does matter: ', 'kontur-font-o-mat' ); ?></span><span id="kntrfnt-font-size-preview-<?php echo esc_attr( $i ); ?>"> <?php esc_html_e( 'This is your Size !', 'kontur-font-o-mat' ); ?></span>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <div class="col mb-3 py-3"><?php submit_button(); ?></div>
    </div>
</div>
<?php
	}

    
    	/**
	 * Meta box(Load fonts)
	 */
	public function metabox_load_font() {
		?>
<div class="kntrfnt-inside">
    <label>
        <input class="kntrfnt-ui-button" type="checkbox" name="<?php echo esc_html ( 'kntrfnt_load_fonts_active' ); ?>" value="1" <?php checked( get_option( 'kntrfnt_load_fonts_active', true ) ); ?>><?php esc_html_e( 'Enable "loading your own fonts?"', 'kontur-font-o-mat' ); ?>
    </label>
    <div class="kntr-col pt-3 knt-col-12 kntr-col-lg-7 ">
        <label for="kntrfnt_kntrfntmt_title_" style="font-size:16px;"><?php esc_html_e( 'Paste the css-file link of your fonts', 'kontur-font-o-mat' ); ?>
            :<br></label>
        <input type="text" style="width:100%;" name="kntrfnt_load_fonts" value="<?php echo esc_html( get_option( 'kntrfnt_load_fonts') ); ?>">

        <span class="ps-2"><small><?php esc_html_e( 'Insert the Link fom Google Fonts, Adobe...' ); ?><?php esc_html_e( 'Make sure to use a working link, it should look like e.g. this from Google: https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Literata', 'kontur-font-o-mat' ); ?> </small></span>
    </div>
</div>
<?php
	}
    
	/**
	 * Meta box(Underline)
	 */
	public function metabox_underline() {
		?>
<div class="kntrfnt-inside">
    <label>
        <input class="kntrfnt-ui-button" type="checkbox" name="kntrfnt_underline_active" value="1" <?php checked( get_option( 'kntrfnt_underline_active', true ) ); ?>><?php esc_html_e( 'Enable "underline"', 'kontur-font-o-mat' ); ?>
    </label>
    <small>
        <ul style="list-style-position: outside;">
            <li class="ps-2" style="list-style-position: outside;"><?php esc_html_e( 'Insert the Link fom Google Fonts, Adobe...' ); ?><?php esc_html_e( 'Make sure to use a working link, it should look like e.g. this from Google: https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Literata', 'kontur-font-o-mat' ); ?> </li>
        </ul>
    </small>
</div>
<?php
	}
    
    
    

		/**
	 * Meta box(Clear format)
	 */
	public function metabox_clear_format() {
		?>
<div class="kntrfnt-inside">
    <label>
        <input class="kntrfnt-ui-button" type="checkbox" name="kntrfnt_clear_format_active" value="1" <?php checked( get_option( 'kntrfnt_clear_format_active', true ) ); ?>><?php esc_html_e( 'Enable the "kontur clean format" button << this will allow to unset your font & size settings in the Gutenberg editor', 'kontur-font-o-mat' ); ?>
    </label>
</div>
<?php
	}
}

new Options();
<?php
/**
 * @package kontur-font-o-mat
 * @author Eilert Behrends
 * @license GPL-2.0+
 * @since             1.0.0
 * @package kontur-font-o-mat
 *

 */

namespace kontur_font_o_mat;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Config {


// Default font size variation
	static $font_size = array( 70, 120, 150, 260 );

    
    // Default font size variation
	static $font_weight = array( 200, 300, 600, 900 );
    
  // Default font family
   static $default_font_family = array( 'Courier', 'Verdana', 'Arial', 'Times', 'Georgia' );
    
    
 // Default own classes 
   static $default_own_class = array(
			'.your-class1', '.your-class2', '.your-class3', '.your-class4', '.your-class5' );

}

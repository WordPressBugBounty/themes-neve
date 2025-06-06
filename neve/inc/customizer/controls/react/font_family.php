<?php
/**
 * Font_Family Control. Handles data passing from args to JS.
 *
 * @package Neve\Customizer\Controls\React
 */

namespace Neve\Customizer\Controls\React;

/**
 * Class Button_Appearance
 *
 * @package Neve\Customizer\Controls\React
 */
class Font_Family extends \WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @var string
	 */
	public $type = 'neve_font_family_control';

	/**
	 * The theme mod to be used for color.
	 * 
	 * @var string
	 */
	public $color_setting = '';

	/**
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $input_attrs = [];
	/**
	 * Send to JS.
	 */
	public function json() {
		$json                  = parent::json();
		$json['input_attrs']   = $this->input_attrs;
		$json['color_setting'] = $this->color_setting;
		return $json;
	}

	/**
	 * This method overrides the default render
	 * so that nothing is rendered.
	 * Previously it would try to put an input element where the value was `esc_attr()`
	 * This would trigger notices in PHP
	 * It is not required to have a render as it is being handled by React.
	 */
	final public function render_content() {
		// this is rendered from React
	}
}

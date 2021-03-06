<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Number control.
 *
 * A base control for creating a number control. Displays a simple number input.
 *
 * Creating new control in the editor (inside `Widget_Base::_register_controls()`
 * method):
 *
 *    $this->add_control(
 *        'price',
 *        [
 *            'label' => __( 'Price', 'plugin-domain' ),
 *            'type' => Controls_Manager::NUMBER,
 *            'default' => 10,
 *            'min' => 5,
 *            'min' => 100,
 *            'step' => 5,
 *        ]
 *    );
 *
 * PHP usage (inside `Widget_Base::render()` method):
 *
 *    echo '<span class="price">' . $this->get_settings( 'price' ) . '</span>';
 *
 * JS usage (inside `Widget_Base::_content_template()` method):
 *
 *    <span class="price">{{{ settings.price }}}</span>
 *
 * @since 1.0.0
 *
 * @param string $label       Optional. The label that appears above of the
 *                            field. Default is empty.
 * @param string $title       Optional. The field title that appears on mouse
 *                            hover. Default is empty.
 * @param string $placeholder Optional. The field placeholder that appears when
 *                            the field has no values. Default is empty.
 * @param string $description Optional. The description that appears below the
 *                            field. Default is empty.
 * @param mixed  $default     Optional. The field default value.
 * @param int    $min         Optional. The minimum number (only affects the
 *                            spinners, the user can still type a lower value).
 *                            Default is empty.
 * @param int    $max         Optional. The maximum number (only affects the
 *                            spinners, the user can still type a higher value).
 *                            Default is empty.
 * @param int    $step        Optional. The intervals value that will be
 *                            incremented or decremented when using the controls'
 *                            spinners. Default is empty, the value will be
 *                            incremented by 1.
 * @param string $separator   Optional. Set the position of the control separator.
 *                            Available values are 'default', 'before', 'after'
 *                            and 'none'. 'default' will position the separator
 *                            depending on the control type. 'before' / 'after'
 *                            will position the separator before/after the
 *                            control. 'none' will hide the separator. Default
 *                            is 'default'.
 * @param bool   $show_label  Optional. Whether to display the label. Default is
 *                            true.
 * @param bool   $label_block Optional. Whether to display the label in a
 *                            separate line. Default is false.
 */
class Control_Number extends Base_Data_Control {

	/**
	 * Retrieve number control type.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'number';
	}

	/**
	 * Retrieve number control default settings.
	 *
	 * Get the default settings of the number control. Used to return the
	 * default settings while initializing the number control.
	 *
	 * @since  1.5.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'min' => '',
			'max' => '',
			'step' => '',
		];
	}

	/**
	 * Render number control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
        <div class="elementor-control-field">
            <label for="<?php echo $control_uid; ?>" class="elementor-control-title">{{{ data.label }}}</label>
            <div class="elementor-control-input-wrapper">
                <input id="<?php echo $control_uid; ?>" type="number" min="{{ data.min }}" max="{{ data.max }}"
                       step="{{ data.step }}" class="tooltip-target" data-tooltip="{{ data.title }}"
                       title="{{ data.title }}" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}"/>
            </div>
        </div>
        <# if ( data.description ) { #>
            <div class="elementor-control-field-description">{{{ data.description }}}</div>
            <# } #>
		<?php
	}
}

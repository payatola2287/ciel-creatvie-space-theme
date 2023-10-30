<?php
add_filter('gform_add_field_buttons', 'add_SpaceSelectorCowork_field_button');
function add_SpaceSelectorCowork_field_button($field_groups) {

		foreach ( $field_groups as &$group ) {
			if ( $group['name'] == 'advanced_fields' ) {
					$group['fields'][] = array(
							'class'     => 'button',
							'data-type' => 'spaceSelectorCowork',
							'value'     => __( 'Cowork Spaces', 'gravityforms' ),
							'onclick'   => "StartAddField('spaceSelectorCowork');"
					);
					break;
			}
	}

	return $field_groups;
    return $field_groups;
}

add_filter('gform_field_input', 'render_SpaceSelectorCowork_input', 10, 5);
function render_SpaceSelectorCowork_input($input, $field, $value, $lead_id, $form_id) {
  if ($field->type == 'spaceSelectorCowork') {
    $shortcode_output = do_shortcode('[space_selector_cowork]');  // Process the shortcode to get its output.
    $input = '<div class="space_selector_cowork">' . $shortcode_output . '</div>'; // Wrap the output in a div for potential styling or scripting purposes.
  }
  return $input;
}


function cowork_selector_output($atts) {
	// Your shortcode logic here.
	if( is_admin() ) {
		return '[[= Coworking Space Selector =]]';
	}	else {
		$output = '';
		ob_start();
		include_once( get_template_directory() . '/template-parts/space-selector--coworks.php' );
		$output .= ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('space_selector_cowork', 'cowork_selector_output');
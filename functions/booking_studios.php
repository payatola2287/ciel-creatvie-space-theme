<?php
add_filter('gform_add_field_buttons', 'add_SpaceSelectorStudio_field_button');
function add_SpaceSelectorStudio_field_button($field_groups) {

		foreach ( $field_groups as &$group ) {
			if ( $group['name'] == 'advanced_fields' ) {
					$group['fields'][] = array(
							'class'     => 'button',
							'data-type' => 'spaceSelectorStudio',
							'value'     => __( 'Studio Spaces', 'gravityforms' ),
							'onclick'   => "StartAddField('spaceSelectorStudio');"
					);
					break;
			}
	}

	return $field_groups;
    return $field_groups;
}

add_filter('gform_field_input', 'render_SpaceSelectorStudio_input', 10, 5);
function render_SpaceSelectorStudio_input($input, $field, $value, $lead_id, $form_id) {
  if ($field->type == 'spaceSelectorStudio') {
    $shortcode_output = do_shortcode('[space_selector_studio]');  // Process the shortcode to get its output.
    $input = '<div class="studio_selector_output">' . $shortcode_output . '</div>'; // Wrap the output in a div for potential styling or scripting purposes.
  }
  return $input;
}


function studio_selector_output($atts) {
	// Your shortcode logic here.
	if( is_admin() ) {
		return '[[= Studio Space Selector =]]';
	}	else {
		$output = '';
		ob_start();
		include( get_template_directory() . '/template-parts/space-selector--studios.php' );
		$output .= ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode('space_selector_studio', 'studio_selector_output');


add_filter('gform_add_field_buttons', 'add_StudioX_field');
function add_StudioX_field($field_groups) {

		foreach ( $field_groups as &$group ) {
			if ( $group['name'] == 'advanced_fields' ) {
					$group['fields'][] = array(
							'class'     => 'button',
							'data-type' => 'spaceStudioX',
							'value'     => __( 'Studio X', 'gravityforms' ),
							'onclick'   => "StartAddField('spaceStudioX');"
					);
					break;
			}
	}

	return $field_groups;
    return $field_groups;
}

add_filter('gform_field_input', 'render_StudioX_input', 10, 5);
function render_StudioX_input($input, $field, $value, $lead_id, $form_id) {
  if ($field->type == 'spaceStudioX') {
    $shortcode_output = do_shortcode('[space_field_studio_x]');  // Process the shortcode to get its output.
    $input = '<div class="studio_selector_output">' . $shortcode_output . '</div>'; // Wrap the output in a div for potential styling or scripting purposes.
  }
  return $input;
}

function studio_x_selector( $atts ){
	if( is_admin() ){
		return '[[ STUDIO X ]]';
	}else{
		ob_start();
		echo '<label class="gform_label"></label><input type="hidden" value="studio-x" name="spaceSelectionCheckbox--studios" />';
		return ob_get_clean();
	}
}
add_shortcode( 'space_field_studio_x','studio_x_selector'  );
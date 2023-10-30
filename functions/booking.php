<?php
// Old Version
function post_to_third_party( $entry, $form ) {	
	

	$post_url = '';
	$body = [];

	switch($form['title']) {
		case 'Book Photo/Film Space' :
			$post_url = 'https://api.tripleseat.com/v1/leads/create.js?lead_form_id=26678&public_key=f4f878951e192a7f2a12774a2f3ef0cc962e709e';
			$body = [
				'lead[first_name]' => rgar( $entry, '1.3' ), 
				'lead[last_name]' => rgar( $entry, '1.6' ), 
				'lead[email_address]' => rgar ($entry, '3'),
				'lead[phone_number]' => rgar( $entry, '4' ),
				'lead[company]' => rgar( $entry, '5' ),
				'lead[event_description]' => rgar( $entry, '8' ),
				'lead[event_date]' => rgar( $entry, '9' ),
				'lead[start_time]' => rgar( $entry, '10' ),
				'lead[end_time]' => rgar( $entry, '11' ),
				'lead[guest_count]' => rgar( $entry, '12' ),
				// 'lead[additional_information]' => rgar( $entry, '10' ),
				'lead[lead_source_id]' => rgar( $entry, '13' ),
				'lead[gdpr_consent_granted]' => rgar( $entry, '7.1' )
			];
			break;
		case 'Book Event Space' :
			$post_url = 'https://api.tripleseat.com/v1/leads/create.js?lead_form_id=26186&public_key=f4f878951e192a7f2a12774a2f3ef0cc962e709e';
			$body = [
				'lead[first_name]' => rgar( $entry, '1.3' ), 
				'lead[last_name]' => rgar( $entry, '1.6' ), 
				'lead[email_address]' => rgar ($entry, '3'),
				'lead[phone_number]' => rgar( $entry, '4' ),
				'lead[company]' => rgar( $entry, '5' ),
				'lead[event_description]' => rgar( $entry, '8' ),
				'lead[event_date]' => rgar( $entry, '9' ),
				'lead[start_time]' => rgar( $entry, '10' ),
				'lead[end_time]' => rgar( $entry, '11' ),
				'lead[guest_count]' => rgar( $entry, '12' ),
				// 'lead[additional_information]' => rgar( $entry, '10' ),
				'lead[lead_source_id]' => rgar( $entry, '13' ),
				'lead[gdpr_consent_granted]' => rgar( $entry, '7.1' )
			];
			break;
		case 'Book Coworking Space' :
			$post_url = 'https://api.tripleseat.com/v1/leads/create.js?lead_form_id=26679&public_key=f4f878951e192a7f2a12774a2f3ef0cc962e709e';
			$body = [
				'lead[first_name]' => rgar( $entry, '1.3' ), 
				'lead[last_name]' => rgar( $entry, '1.6' ), 
				'lead[email_address]' => rgar ($entry, '3'),
				'lead[phone_number]' => rgar( $entry, '4' ),
				'lead[company]' => rgar( $entry, '5' ),
				'lead[event_description]' => rgar( $entry, '8' ),
				'lead[event_date]' => rgar( $entry, '9' ),
				'lead[start_time]' => rgar( $entry, '10' ),
				'lead[end_time]' => rgar( $entry, '11' ),
				'lead[guest_count]' => rgar( $entry, '12' ),
				// 'lead[additional_information]' => rgar( $entry, '10' ),
				'lead[lead_source_id]' => rgar( $entry, '13' ),
				'lead[gdpr_consent_granted]' => rgar( $entry, '7.1' )
			];
			break;
	}


	// $post_url = '';
	// $body = [];

	// bb_print_r($entry);
	// bb_print_r($form);
	// die();

	if(!$post_url || !$body) {
		return;
	}

	
	// GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );
	$request = new WP_Http();
	$response = $request->post( $post_url, array( 'body' => $body ) );
	// GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );

	// bb_print_r($response);
	// die();


}


// New Version
add_action( 'gform_after_submission', 'post_to_third_party', 10, 2 );

foreach (array(

  
  'featureStudio' => array(
    'object_type'      => array('studios'),
    'label'          => 'Studio Features',
    'labels'        => array('singular_name' => 'Studio Feature'),
    'public'        => false,
    'show_ui'        => true,
    'show_in_nav_menus'    => true,
	),
	'featureCoworking' => array(
    'object_type'      => array('coworks'),
    'label'          => 'Coworking Features',
    'labels'        => array('singular_name' => 'Coworking Feature'),
    'public'        => false,
    'show_ui'        => true,
    'show_in_nav_menus'    => true,
	),

) as $custom_taxonomy => $args) {

  // Standard Arguements
  $standard_args = array(
    'show_admin_column' => true,
    'hierarchical' => true
  );

  $args = array_replace($standard_args, $args);

  register_taxonomy($custom_taxonomy, $args['object_type'], $args);
}


function post_to_third_party_new( $entry, $form ) {	
	

	$post_url = '';
	$body = [];


	// $post_url = '';
	// $body = [];

	$formrgar = rgar( $form, 'fields' );
	// bb_print_r($formrgar);

	// die();
	
	if( !str_contains( $form['cssClass'], '__bookingForm') ) {
		return;
	}

	$presetFields = array(
		'lead[first_name]', 
		'lead[last_name]',
		'lead[email_address]',
		'lead[phone_number]',
		'lead[company]',
		'lead[event_description]',
		'lead[event_date]',
		'lead[start_time]',
		'lead[end_time]',
		'lead[guest_count]',
		'lead[lead_source_id]',
		'lead[gdpr_consent_granted]'
	);

	$body = array();
	$additional_information = "";
	$additional_information_array = array();

	// Loop through the form fields
	foreach ($form['fields'] as $field) {
			
			$field_value = ""; // Reset for each loop

			// If the field is complex, it will have an 'inputs' attribute
			if (isset($field->inputs) && is_array($field->inputs)) {
					$complex_values = [];
					foreach ($field->inputs as $input) {
							$input_id = (string) $input['id'];
							$value = rgar($entry, $input_id);
							if (!empty($value)) {
									$complex_values[] = $value;
							}
					}
					$field_value = implode(', ', $complex_values);
			} else {
					$field_value = rgar($entry, (string) $field->id);
					if($field->adminLabel == 'Space Type') {
						switch($field_value) {
							case 'Film & Photo Space' :
								$post_url = 'https://api.tripleseat.com/v1/leads/create.js?lead_form_id=26678&public_key=f4f878951e192a7f2a12774a2f3ef0cc962e709e';
								break;
							case 'Event Space' :
								$post_url = 'https://api.tripleseat.com/v1/leads/create.js?lead_form_id=26186&public_key=f4f878951e192a7f2a12774a2f3ef0cc962e709e';
								break;
							case 'Coworking Space' :
								$post_url = 'https://api.tripleseat.com/v1/leads/create.js?lead_form_id=26679&public_key=f4f878951e192a7f2a12774a2f3ef0cc962e709e';
								break;
						}
					}
			}

			// Check if the adminLabel exists in $presetFields
			if (in_array($field->adminLabel, $presetFields)) {
					$body[$field->adminLabel] = $field_value;
			} elseif (!empty($field->adminLabel) && $field->adminLabel !== 'lead[full_name]') { // Ensure adminLabel isn't empty
					// Append to the additional information
					if($field_value) {
						$additional_information .= $field->adminLabel . ": " . $field_value . "\n";
						$additional_information_array[$field->adminLabel] = $field_value;
					}
			}

			if($field->adminLabel === 'lead[full_name]') {
				// split over comma
				$full_name = explode(',', $field_value);
				// add first to first name
				$body['lead[first_name]'] = isset($full_name[0]) ? $full_name[0] : '';
				// add second to last name
				$body['lead[last_name]'] = isset($full_name[1]) ? $full_name[1] : '';
			}
	}

	// Add the aggregated additional information to the body array
	if (!empty($additional_information)) {
			$body['lead[additional_information]'] = $additional_information;
	}

	switch($additional_information_array['Space Type']) {
		case 'Coworking Space' :
			if( isset($_POST['spaceSelection--coworks']) && !empty(isset($_POST['spaceSelection--coworks'])) ) {
				// remove trailing comma
				$_POST['spaceSelection--coworks'] = rtrim($_POST['spaceSelection--coworks'], ',');
		
				// replace , with , with space
				$_POST['spaceSelection--coworks'] = str_replace(',', ', ', $_POST['spaceSelection--coworks']);
		
				// add to additional information
				if($_POST['spaceSelection--coworks']) {
					$body['lead[additional_information]'] .= 'Coworking Space(s) Interested in: ' . $_POST['spaceSelection--coworks'] . "\n";
				}
			}
		break;
		case 'Film & Photo Space' :
			if( isset($_POST['spaceSelection--studios']) && !empty(isset($_POST['spaceSelection--studios'])) ) {
				// remove trailing comma
				$_POST['spaceSelection--studios'] = rtrim($_POST['spaceSelection--studios'], ',');
		
				// replace , with , with space
				$_POST['spaceSelection--studios'] = str_replace(',', ', ', $_POST['spaceSelection--studios']);
		
				// add to additional information
				if($_POST['spaceSelection--studios']) {
					$body['lead[additional_information]'] .= 'Studio Space(s) Interested in: ' . $_POST['spaceSelection--studios'] . "\n";
				}
		
			}
		break;
	}
	
	// Debug outout
	// bb_print_r($post_url);
	// bb_print_r($body);
	// bb_print_r($_POST);
	
	// bb_print_r($entry);
	// bb_print_r($form['cssClass']);
	// bb_print_r($form);

	if(!$post_url || !$body) {
		return;
	}

	
	// GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );
	$request = new WP_Http();
	$response = $request->post( $post_url, array( 'body' => $body ) );
	// GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );

	// bb_print_r($body);
	// die();
	return;


}

add_action( 'gform_after_submission', 'post_to_third_party_new', 10, 2 );

add_filter('gform_field_content', 'hide_custom_field_label_frontend', 10, 5);
function hide_custom_field_label_frontend($content, $field) {
    // Check if the field type is your custom field
    if (
      $field->type == 'spaceSelectorCowork'
      || $field->type == 'spaceSelectorStudio'
    ) {
        // Use regex to remove the label
        $content = preg_replace('/<label.*?>.*?<\/label>/', '', $content);
    }
    return $content;
}

include_once( get_template_directory() . '/functions/booking_studios.php' );
include_once( get_template_directory() . '/functions/booking_coworking.php' );
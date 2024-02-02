<?php
/**
 * Plugin Name: WPJM Extra Fields
 * Description: Adds an extra Salary and Important Information fields to WP Job Manager job listings
 * Version: 1.3.0
 * Author: Gururaj Acharya
 * Author URI: https://creationdesks.com/
 * Text Domain: wpjm-extra-fields
 * Domain Path: /languages
 *
 * License: GPLv2 or later
 */

/**
 * Prevent direct access data leaks
 **/
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_vacancy_status');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_duration_advert');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_duration_period');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_reference_number');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_contract_type');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_min_salary_field');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_max_salary_field');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_job_salary_field');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_job_start_date');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_weekly_hours');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_key_words_field');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_responsibilities');
	add_filter( 'submit_job_form_fields', 'gma_wpjmef_frontend_add_objectives');
	
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_vacancy_status');
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_duration_advert' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_duration_period' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_reference_number');
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_contract_type');
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_min_salary_field' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_max_salary_field' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_job_salary_field' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_job_start_date' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_weekly_hours' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_key_words_field' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_responsibilities' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_add_objectives' );
	add_filter( 'job_manager_job_listing_data_fields', 'gma_wpjmef_admin_company_tagline' );

	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_vacancy_status');
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_duration_advert_period' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_reference_number');
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_contract_type');
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_job_min_salary_data' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_job_max_salary_data' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_job_salary_data' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_job_start_date' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_weekly_hours' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_key_words_data' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_responsibilities' );
	add_action( 'single_job_listing_meta_end', 'gma_wpjmef_display_objectives' );	


/**
* Adds a new optional "Vacancy Status" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_vacancy_status( $fields ) {
  
  $fields['job']['job_vacancy_status'] = array(
    'label'       => __( 'Vacancy Status', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => true,
    'placeholder' => 'e.g. Open or Close',
    'description' => '',
    'priority'    => 7,
  );

  return $fields;

}

/**
* Adds a new optional "Duration Advertisement" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_duration_advert( $fields ) {
  
  $fields['job']['duration_advert'] = array(
    'label'       => __( 'Advertisement Duration: ', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. 1',
    'description' => '',
    'priority'    => 8,
  );
  
  return $fields;

}

/**
* Adds a new optional "Duration Period" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_duration_period( $fields ) {
  
  $fields['job']['duration_period'] = array(
    'label'       => __( 'Duration Period: ', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. Month or Day',
    'description' => '',
    'priority'    => 9,
  );
  
  return $fields;

}

/**
* Adds a new optional "Reference Number" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_reference_number( $fields ) {
  
  $fields['job']['job_reference_number'] = array(
    'label'       => __( 'Reference Number', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => true,
    'placeholder' => 'e.g. 12345',
    'description' => '',
    'priority'    => 10,
  );

  return $fields;

}
/**
* Adds a new optional "Contract type" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_contract_type( $fields ) {
  
  $fields['job']['contract_type'] = array(
    'label'       => __( 'Contract Type', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => true,
    'placeholder' => 'e.g. Permanent Full Time',
    'description' => '',
    'priority'    => 11,
  );

  return $fields;

}
/**
* Adds a new optional "Salary" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_min_salary_field( $fields ) {
  
  $fields['job']['job_minsalary'] = array(
    'label'       => __( 'Minimum Salary (£)', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => true,
    'placeholder' => 'e.g. £ 20.000',
    'description' => '',
    'priority'    => 12,
  );

  return $fields;

}
function gma_wpjmef_frontend_add_max_salary_field( $fields ) {
  
  $fields['job']['job_maxsalary'] = array(
    'label'       => __( 'Maximum Salary (£)', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => true,
    'placeholder' => 'e.g. £ 40.000',
    'description' => '',
    'priority'    => 13,
  );

  return $fields;

}
function gma_wpjmef_frontend_add_job_salary_field( $fields ) {
  
  $fields['job']['job_salary'] = array(
    'label'       => __( 'Salary (£)', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => true,
    'placeholder' => 'e.g. Competitive',
    'description' => '',
    'priority'    => 14,
  );

  return $fields;

}


/**
* Adds a new optional "job start date" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_job_start_date( $fields ) {
  
  $fields['job']['job_start_date'] = array(
    'label'       => __( 'Job Start Date: ', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. 25-10-2019',
    'description' => '',
    'priority'    => 15,
  );
  
  return $fields;

}
/**
* Adds a new optional "Weekly Hours" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_weekly_hours( $fields ) {
  
  $fields['job']['weekly_hours'] = array(
    'label'       => __( 'Weekly Hours: ', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. 48 hours',
    'description' => '',
    'priority'    => 16,
  );
  
  return $fields;

}
/**
* Adds a new optional "Key Words" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_key_words_field( $fields ) {
  
  $fields['job']['key_words_field'] = array(
    'label'       => __( 'Key Words: ', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. Administration',
    'description' => '',
    'priority'    => 17,
  );
  
  return $fields;

}

/**
* Adds a new optional "responsbilities" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_responsibilities ( $fields ){
	$fields['job']['job_responsibilities'] = array(
    'label'       => __( 'Job Responsibilities: ', 'wpjm-extra-fields' ),
    'type'        => 'textarea',
    'required'    => false,
    'placeholder' => 'job responsibilities',
    'description' => '',
    'priority'    => 18,
  );
  
  return $fields;
}
/**
* Adds a new optional "objectives" text field at the "Submit a Job" form, generated via the [submit_job_form] shortcode
**/
function gma_wpjmef_frontend_add_objectives ( $fields ){
	$fields['job']['job_objectives'] = array(
    'label'       => __( 'Role Objectives: ', 'wpjm-extra-fields' ),
    'type'        => 'textarea',
    'required'    => false,
    'placeholder' => 'Role Objectives',
    'description' => '',
    'priority'    => 19,
  );
  
  return $fields;
}

/**
* Adds a text field to the Job Listing wp-admin meta box named “Contract type”
**/
function gma_wpjmef_admin_add_contract_type( $fields ) {
  
  $fields['_contract_type'] = array(
    'label'       => __( 'Contract Type', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. Permanent Full Time',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}

/**
* Adds a text field to the Job Listing wp-admin meta box named “Vacancy Status”
**/
function gma_wpjmef_admin_add_vacancy_status( $fields ) {
  
  $fields['_vacancy_status'] = array(
    'label'       => __( 'Vacancy Status', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. Open Or Close',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}

/**
* Adds a text field to the Job Listing wp-admin meta box named “Salary”
**/
function gma_wpjmef_admin_add_min_salary_field( $fields ) {
  
  $fields['_job_minsalary'] = array(
    'label'       => __( 'Minimum Salary', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. £ 20.000',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}
function gma_wpjmef_admin_add_max_salary_field( $fields ) {
  
  $fields['_job_maxsalary'] = array(
    'label'       => __( 'Maximum Salary', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. £ 40.000',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}
function gma_wpjmef_admin_add_job_salary_field( $fields ) {
  
  $fields['_job_salary'] = array(
    'label'       => __( 'Salary', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. Competitive',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}

/**
* Adds a text field to the Job Listing wp-admin meta box named "Job start date"
**/
function gma_wpjmef_admin_add_job_start_date( $fields ) {
  
  $fields['_job_start_date'] = array(
    'label'       => __( 'Job Start Date', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. 25-10-2019',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}
/**
* Adds a text field to the Job Listing wp-admin meta box named "Weekly Hours"
**/
function gma_wpjmef_admin_add_weekly_hours( $fields ) {
  
  $fields['_weekly_hours'] = array(
    'label'       => __( 'Weekly Hours', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. 48 hours',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}
/**
* Adds a text field to the Job Listing wp-admin meta box named "Advertisement Duration"
**/
function gma_wpjmef_admin_add_duration_advert( $fields ) {
  
  $fields['_duration_advert'] = array(
    'label'       => __( 'Advertisement Duration', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. 1',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}
/**
* Adds a text field to the Job Listing wp-admin meta box named "Duration Period"
**/
function gma_wpjmef_admin_add_duration_period( $fields ) {
  
  $fields['_duration_period'] = array(
    'label'       => __( 'Duration Period', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. Month or Day',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}

/**
* Adds a text field to the Job Listing wp-admin meta box named "Key Words"
**/
function gma_wpjmef_admin_add_key_words_field( $fields ) {
  
  $fields['_key_word_field'] = array(
    'label'       => __( 'Key Words', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. Administration',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}
/**
* Adds a text field to the Job Listing wp-admin meta box named “Reference Number”
**/
function gma_wpjmef_admin_add_reference_number( $fields ) {
  
  $fields['_reference_number'] = array(
    'label'       => __( 'Reference Number', 'wpjm-extra-fields' ),
    'type'        => 'text',
    'placeholder' => 'e.g. 12345',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;

}
/**
* Adds a text field to the Job Listing wp-admin meta box named "Job Responsibilities"
**/
function gma_wpjmef_admin_add_responsibilities ( $fields ){
	$fields['_job_responsibilities'] = array(
    'label'       => __( 'Job Responsibilities', 'wpjm-extra-fields' ),
    'type'        => 'textarea',
    'placeholder' => 'Job Responsibilities',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;
}
/**
* Adds a text field to the Job Listing wp-admin meta box named "Job Objectives"
**/
function gma_wpjmef_admin_add_objectives ( $fields ){
	$fields['_job_objectives'] = array(
    'label'       => __( 'Role Objectives', 'wpjm-extra-fields' ),
    'type'        => 'textarea',
    'placeholder' => 'Role Objectives',
    'description' => '',
	'show_in_rest' => true
  );

  return $fields;
}

/**
* Adds a text field to the Job Listing wp-admin meta box named "comapnay_tagline"
**/
function gma_wpjmef_admin_company_tagline ( $fields ){
	$fields['_company_tagline'] = array(
		'label'       => __( 'Job Short Description', 'wpjm-extra-fields' ),
		'type'        => 'text',
		'placeholder' => 'Job Short Description',
		'description' => '',
		'maxlength' => 60,
		'show_in_rest' => true
	);

	return $fields;
}

/**
* Displays "Vacancy Status" on the Single Job Page, by checking if meta for "_vacancy_status" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_vacancy_status() {
  
  global $post;

  $vacancy_status = get_post_meta( $post->ID, '_vacancy_status', true );
 
  if ( $vacancy_status ) {
    echo '<li class="vacancy-status">' . __( 'Vacancy Status: ' ) . esc_html( $vacancy_status ) . '</li>';
  }
 
}

/**
* Displays the content of the "Advertisement Duration" text-field on the Single Job Page, by checking if meta for "_duration_advert and _duration_period" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_duration_advert_period() {
	
	global $post;
	
	$duration_advert = get_post_meta( $post->ID, '_duration_advert', true );
	$duration_period = get_post_meta( $post->ID, '_duration_period', true );
	
	function dateDiffInDays($str_date, $end_date){
		// Calulating the difference in timestamps 
		$diff = strtotime($str_date) - strtotime($end_date); 
        
		// 1 day = 24 hours 
		// 24 * 60 * 60 = 86400 seconds 
		return abs(round($diff / 86400)); 
	}
	// Start date 
	$str_date = date("d-m-Y");
	
	// End date 
	$end_date = get_post_meta( $post->ID, '_job_expires', true );
	
	
	// Function call to find date difference 	
	$finalDuration = dateDiffInDays($str_date, $end_date);
	
	// Display the result 
	if( $end_date ){
		if( $finalDuration == "1"){
	 echo '<li class="advert-duration">Advertisement duration: ' . $finalDuration . ' Day</li>'; 
	} else{
	 echo '<li class="advert-duration">Advertisement duration: ' . $finalDuration . ' Days</li>';
	}
	} else {
		echo ' ';
	}
}

/**
* Displays "Reference Number" on the Single Job Page, by checking if meta for "_reference_number" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_reference_number() {
  
  global $post;

  $reference_number = get_post_meta( $post->ID, '_reference_number', true );
    
  if ( $reference_number ) {
   echo	 '</ul><h5 class="widget-title h6">Job Details:</h5><div class="row"><p class="widget-title h6 col-4">Reference Number:</p><p class="col ref-number">' . esc_html( $reference_number ) . '</p></div>'; ?>
   <div class="row"><p class="widget-title h6 col col-4">Location:</p><p class="col location"><?php the_job_location(); ?></p></div>
 <?php }
 
}
/**
* Displays "Contract Type" on the Single Job Page, by checking if meta for "_contract_type" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_contract_type() {
  
  global $post;

  $contract_type = get_post_meta( $post->ID, '_contract_type', true );
 
  if ( $contract_type ) {
	  echo '</ul><div class="row"><p class="widget-title h6 col-4">Contract Type:</p><p class="col contract-type">' . esc_html( $contract_type ) . '</p></div>';
  } else {
	  echo '</ul><div class="row"><p class="widget-title h6 col-4">Contract Type:</p><p class="col contract-type"> -- </p></div>';
  }
 
}

/**
* Displays "Salary" on the Single Job Page, by checking if meta for "_job_salary" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_job_min_salary_data() {
  
  global $post;

  $minsalary = get_post_meta( $post->ID, '_job_minsalary', true );
 
  if ( $minsalary ) {
    echo '</ul><div class="row"><p class="widget-title h6 col-4">Minimum Salary:</p><p class="col salary">' . esc_html( $minsalary ) . '</p></div>';
  }
 
}

function gma_wpjmef_display_job_max_salary_data() {
  
  global $post;

  $maxsalary = get_post_meta( $post->ID, '_job_maxsalary', true );

  if ( $maxsalary ) {
    echo '</ul><div class="row"><p class="widget-title h6 col-4">Maximum Salary:</p><p class="col salary">' . esc_html( $maxsalary ) . '</p></div>';
  }

}

function gma_wpjmef_display_job_salary_data() {
  
  global $post;

  $jobsalary = get_post_meta( $post->ID, '_job_salary', true );
 
  if ( $jobsalary ) {
    echo '</ul><div class="row"><p class="widget-title h6 col-4">Salary:</p><p class="col salary">' . esc_html( $jobsalary ) . '</p></div>';
  } else{
	echo '</ul><div class="row"><p class="widget-title h6 col-4">Salary:</p><p class="col salary"> -- </p></div>';  
  }
 
}

/**
* Displays the content of the "Job Start Date" text-field on the Single Job Page, by checking if meta for "_job_start_date" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_job_start_date(){
	
	global $post;
	
	$job_start_date = get_post_meta( $post->ID, '_job_start_date', true );
	$closing_date =  get_post_meta( $post->ID, '_job_expires', true );
	$newClosingDate = date("d-m-Y", strtotime($closing_date));

	
	if( $closing_date ){
		echo '</ul><div class="row"><p class="widget-title h6 col-4">Last date of application submission:</p><p class="col job-expiry">' .esc_html( $newClosingDate ) . '</p></div>';
	} else {
		echo '</ul><div class="row"><p class="widget-title h6 col-4">Last date of application submission:</p><p class="col job-expiry"> -- </p></div>';
	}
	if( $job_start_date ){
		echo '</ul><div class="row"><p class="widget-title h6 col-4">Job Starts:</p><p class="col job-starts">'. esc_html ( $job_start_date ) . '</p></div>';
	} else {
		echo '</ul><div class="row"><p class="widget-title h6 col-4">Job Starts:</p><p class="col job-starts"> -- </p></div>';
	}
}
/**
* Displays the content of the "Weekly Hours" text-field on the Single Job Page, by checking if meta for "_weekly_hours" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_weekly_hours(){
	
	global $post;
	
	$weekly_hours = get_post_meta( $post->ID, '_weekly_hours', true );
	
	
	if( $weekly_hours ){
		echo '</ul><div class="row"><p class="widget-title h6 col-4">Weekly Hours:</p><p class="col weekly-hours">'. esc_html ( $weekly_hours ) . '</p></div>';
	} else {
		echo '</ul><div class="row"><p class="widget-title h6 col-4">Weekly Hours:</p><p class="col weekly-hours"> -- </p></div>';
	}
	
}

/**
* Displays the content of the "Key Words" text-field on the Single Job Page, by checking if meta for "_key_word_field" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_key_words_data() {
  
  global $post;

  $keywords_info = get_post_meta( $post->ID, '_key_word_field', true );

// if ( $keywords_info ) {
//  echo '</ul><div class="row"><p class="widget-title h6 col-4">Key Words:</p><p class="col key-word">'. esc_html( $keywords_info ) . '</p></div>';
// } else {
//	echo '</ul><div class="row"><p class="widget-title h6 col-4">Key Words:</p><p class="col key-word"> -- </p></div>';
// }

}

/**
* Displays the content of the "Job Responsibilities" text-field on the Single Job Page, by checking if meta for "_job_responsibilities" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_responsibilities(){
	
	global $post;
	
	$responsbilities = get_post_meta( $post->ID, '_job_responsibilities', true );
	
	
	if( $responsbilities ){
		echo '</ul><h5 class="widget-title h6">Job Responsibilities:</h5><p class="responsbilities">' . $responsbilities . '</p>';
	}
	
}
/**
* Displays the content of the "Role Objectives" text-field on the Single Job Page, by checking if meta for "_job_responsibilities" exists and is displayed via do_action( 'single_job_listing_meta_end' ) on the template
**/
function gma_wpjmef_display_objectives(){
	
	global $post;
	
	$role_objectives = get_post_meta( $post->ID, '_job_objectives', true );
	
	
	if( $role_objectives ){
		echo '</ul><h5 class="widget-title h6">Role Objectives:</h5><p class="objectives">' . esc_html( $role_objectives ) . '</p>';
	}
	
}

/**
 * Display an error message notice in the admin if WP Job Manager is not active
 */
function gma_wpjmef_admin_notice__error() {
	
  $class = 'notice notice-error';
	$message = __( 'An error has occurred. WP Job Manager must be installed in order to use this plugin', 'wpjm-extra-fields' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 

}
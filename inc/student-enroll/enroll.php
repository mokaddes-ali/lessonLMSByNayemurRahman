<?php
/**
 * Student Enrollments
 * 
 * @package lessonlms
 */

function lessonlms_handle_enrollment() {
        $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;

        if ( $course_id <= 0 ){
            wp_send_json_error('Invalid Course ID');
        }

        $user_id = get_current_user_id();

        if ( $user_id == 0 ) {
            wp_send_json_error('Please Login to enroll');
        }

        $current_enrolled = get_post_meta($course_id, '_enrolled_students', true ?: 0 );
        $new_count = intval($current_enrolled) + 1;
        update_post_meta($course_id, '_enrolled_students', $new_count);


        $user_enrollments = get_user_meta($user_id, '_user_enrollments', true);

        if ( !is_array($user_enrollments) ) {
            $user_enrollments = array();
        }

        $user_enrollments[] = array(
            'course_id' => $course_id,
            'date' => current_time('mysql'),
        );

        update_user_meta($user_id, '_user_enrollments', $user_enrollments);

        $formatted_count = number_format($new_count);
        wp_send_json_success($formatted_count);

    }
    add_action('wp_ajax_lessonlms_enroll_course', 'lessonlms_handle_enrollment');
    add_action('wp_ajax_nopriv_lessonlms_enroll_course', 'lessonlms_handle_enrollment');
<?php
/**
 * Course Meta Box
 * 
 * @package lessonlms
 */

function lessonlms_course_meta_box() {
    add_meta_box(
        'course_details',
        'Course Details',
        'lessonlms_course_meta_box_callback',
        'course',
        'normal',
        'high',
    );
}
add_action('add_meta_boxes', 'lessonlms_course_meta_box');
//callback function include
require_once get_template_directory() . '/inc/cpt/courses/callback-function.php';
// save course data include
require_once get_template_directory() . '/inc/cpt/courses/save-data.php';


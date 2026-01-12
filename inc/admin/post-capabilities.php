<?php
/**
 * Handle Post Capabilities
 * 
 * @package lessonlms
 */
function lessonlms_show_own_courses_only( $query ) {
    if ( ! is_admin() || $query->is_main_query() ) {
        return;
    }
    $user = wp_get_current_user();

    if( in_array('instructor', (array) $user->roles )){
        $query->set('author', $user->ID);
    }
}
add_action('pre_get_posts', 'lessonlms_show_own_courses_only');
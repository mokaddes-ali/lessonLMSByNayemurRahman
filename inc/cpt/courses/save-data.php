<?php
/**
 * Save Course Data
 * 
 * @package lessonlms
 */
function lessonlms_save_course_meta($post_id){

    $fields = array(
        'price', 'original_price', 'video_hours', 'article_count', 'downloadable_resources', 'language', 'subtitles',
    );
    foreach ($fields as $field) {
        if(isset($_POST[$field])){
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    $textarea_fields = array(
        'learn_points', 'requirements', 'target_audience'
    );
    foreach ($textarea_fields as $textarea_field) {
        if(isset($_POST[$textarea_field])){
            update_post_meta($post_id, $textarea_field, sanitize_textarea_field($_POST[$textarea_field]));
        }
    }

}
add_action('save_post_course', 'lessonlms_save_course_meta');
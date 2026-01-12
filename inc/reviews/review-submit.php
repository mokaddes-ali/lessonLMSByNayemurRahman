<?php
/**
 * Review Submit Condition and Save
 * 
 * @package lessonlms
 */
// ইউজার রিভিউ সাবমিট করলে তা প্রসেস হবে এবং সেভ হবে।
    function lessonlms_handle_review_submission(){
        if ( isset($_POST['submit_review']) && isset($_POST['course_id']) ) {
            $course_id = intval($_POST['course_id']);
            $rating = intval($_POST['rating']);
            $review_text = sanitize_text_field($_POST['review_text']);
            $reviewer_name = sanitize_text_field($_POST['reviewer_name']);

            if ( $rating >= 1 && $rating <= 5 && !empty($review_text) && !empty($reviewer_name) ) {
                $reviews = get_post_meta($course_id, '_course_reviews', true);

                if ( !is_array($reviews) ) {
                    $reviews = array();
                }

                $new_review = array(
                    'rating' => $rating,
                    'review' => $review_text,
                    'name'   => $reviewer_name,
                    'date'   => current_time('mysql')
                );

                $reviews[] = $new_review;

                update_post_meta($course_id, '_course_reviews', $reviews);

                lessonlms_update_review_stats($course_id);
            }
        }
    }
    add_action('init', 'lessonlms_handle_review_submission');
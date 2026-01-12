<?php
/**
 * Reviews State
 * 
 * @package lessonlms
 */
    // কোর্সের রিভিউ থেকে মোট রিভিউ সংখ্যা এবং গড় রেটিং আপডেট করবে।
    function lessonlms_update_review_stats($course_id) {
        $reviews = get_post_meta($course_id, '_course_reviews', true);

        if ( is_array($reviews) && !empty($reviews) ) {
            $total_rating = 0;
            $review_count = count($reviews);

            foreach ( $reviews as $review) {
                $total_rating = $total_rating + $review['rating'];
            }

            $average_rating = round($total_rating / $review_count, 1);

            update_post_meta($course_id, '_total_reviews', $review_count);
            update_post_meta($course_id, '_average_rating', $average_rating);
        }
    }

    // কোর্সের মোট রিভিউ ও গড় রেটিং রিটার্ন করে
    function lessonlms_get_review_stats($course_id) {
        $total_reviews = get_post_meta($course_id, '_total_reviews', true) ?: 0;
        $average_rating = get_post_meta($course_id, '_average_rating', true) ?: 0;

        return array(
            'total_reviews' => $total_reviews,
            'average_rating' => $average_rating
        );
    }
    
        // কোর্সের সকল রিভিউ অ্যারে রিটার্ন করে
    function lessonlms_get_course_reviews($course_id){
        return get_post_meta($course_id, '_course_reviews', true) ?: array();
    }
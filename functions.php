<?php
require_once get_template_directory() . '/inc/enqueue-css.php';
require_once get_template_directory() . '/inc/enqueue-js.php';
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/customizer/customizer.php';


function lessonlms_register_sidebar() {
    register_sidebar(array(
        'name' => __('Blog Sidebar','lessonlms'),
        'id'   => 'blog_sidebar',
        'description' => __('Widgets in this area will be shown on the blog sidebar.', 'lessonlms'),
        'before_widget' => '<div class="sidebar-widget recent-posts">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
    ));
}
add_action('widgets_init', 'lessonlms_register_sidebar');

function lessonlms_register_course(){
	register_post_type('course',
		array(
			'labels'      => array(
				'name'          => __('Courses', 'lessonlms'),
				'singular_name' => __('Course', 'lessonlms'),
                'add_new'       => __('Add New Course', 'lessonlms'),
                'add_new_item'  => __('Add New Course', 'lessonlms'),
                'edit_item'     => __('Edit Course', 'lessonlms'),
                'new_item'      => __('New Course', 'lessonlms'),
                'search_items'  => __('Search Courses', 'lessonlms'),
			),
				'public'      => true,
				'has_archive' => true,
                'rewrite'     => array('slug' => 'course'),
                'supports'    => array('title', 'editor', 'thumbnail', 'author'),
                'menu_icon'   => 'dashicons-welcome-learn-more',
		)
	);

}
add_action('init','lessonlms_register_course');

function lessonlms_course_meta_box() {
    add_meta_box(
        'course_details',
        'Course Details',
        'lessonlms_course_meta_box_callback',
        'course',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'lessonlms_course_meta_box');

function lessonlms_course_meta_box_callback($post){
    $price = get_post_meta($post->ID, 'price', true);
    $original_price = get_post_meta($post->ID, 'original_price', true);
    $video_hours = get_post_meta($post->ID, 'video_hours', true);
    $article_count = get_post_meta($post->ID, 'article_count', true);
    $downloadable_resources = get_post_meta($post->ID, 'downloadable_resources', true);
    $language = get_post_meta($post->ID, 'language', true);
    $subtitles = get_post_meta($post->ID, 'subtitles', true);

    $learn_points_data = get_post_meta($post->ID, 'learn_points', true);
    $learn_points = is_array($learn_points_data) ? implode("\n", $learn_points_data) : $learn_points_data;

    $requirements_data = get_post_meta($post->ID, 'requirements', true);
    $requirements = is_array($requirements_data) ? implode("\n", $requirements_data) : $requirements_data;

    $target_audience_data = get_post_meta($post->ID, 'target_audience', true);
    $target_audience = is_array($target_audience_data) ? implode("\n", $target_audience_data) : $target_audience_data;

    ?>
    <div>
        <p>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="<?php echo esc_attr($price); ?>">
        </p>
        <p>
            <label for="original_price">Original Price:</label>
            <input type="number" name="original_price" step="0.01" value="<?php echo esc_attr($original_price); ?>">
        </p>
        <p>
            <label for="video_hours">Video Hours:</label>
            <input type="number" name="video_hours" step="0.1" value="<?php echo esc_attr($video_hours); ?>">
        </p>
        <p>
            <label for="article_count">Article Count:</label>
            <input type="number" name="article_count" value="<?php echo esc_attr($article_count); ?>">
        </p>
        <p>
            <label for="downloadable_resources">Downloadable Resources:</label>
            <input type="number" name="downloadable_resources" value="<?php echo esc_attr($downloadable_resources); ?>">
        </p>
        <p>
            <label for="language">Language:</label>
            <input type="text" name="language" value="<?php echo esc_attr($language); ?>">
        </p>
        <p>
            <label for="subtitles">Subtitles:</label>
            <input type="text" name="subtitles" value="<?php echo esc_attr($subtitles); ?>">
        </p>

        <p>
            <label for="learn_points"><strong>What You'll Learn</strong></label><br>
            <small>Input your list items</small>
            <textarea name="learn_points" id="learn_points" rows="5" style="width:100%;">
                <?php echo esc_textarea($learn_points); ?>
            </textarea>
        </p>

        <p>
            <label for="requirements"><strong>Requirements</strong></label><br>
            <small>Input your list items</small>
            <textarea name="requirements" id="requirements" rows="5" style="width:100%;">
                <?php echo esc_textarea($requirements); ?>
            </textarea>
        </p>

        <p>
            <label for="target_audience"><strong>Who this course is for:</strong></label><br>
            <small>Input your list items</small>
            <textarea name="target_audience" id="target_audience" rows="5" style="width:100%;">
                <?php echo esc_textarea($target_audience); ?>
            </textarea>
        </p>
    </div>

    <?php
}

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

function lessonlms_ajax_scripts() {
    ?>
    
    <script type="text/javascript">
        var ajax_object = {
            ajaxurl: '<?php echo admin_url('admin-ajax.php'); ?>'
        }
    </script>

    <?php
}
add_action('wp_head', 'lessonlms_ajax_scripts');

function lessonlms_dashboard_enrollment_widget() {
    global $wpdb;

    $total_enrollments = $wpdb->get_var(
        "SELECT SUM(meta_value) FROM $wpdb->postmeta WHERE meta_key = '_enrolled_students'"
    );

    $recent_enrollments = $wpdb->get_results(
        "SELECT u.user_login, p.post_title, um.meta_value
        FROM $wpdb->usermeta um
        JOIN $wpdb->users u ON u.ID = um.user_id
        JOIN $wpdb->posts p ON p.ID = um.meta_value
        WHERE um.meta_key = '_user_enrollments'
        ORDER BY um.umeta_id DESC
        LIMIT 5"
    );
    ?>

    <div class="enrollment-dashboard-widget">
        <h3>Enrollment Status</h3>

        <div class="enrollment-stats">
            <div class="stat-item">
                <span class="stat-number"><?php echo number_format($total_enrollments ?: 0 ); ?></span>
                <span class="stat-label">Total Enrollments</span>
            </div>
        </div>

        <?php if ( $recent_enrollments ) : ?>
            <div class="recent-enrollments">
                <h4>Last Enrollment</h4>
                <ul>
                    <?php foreach ( $recent_enrollments as $enrollment ) : ?>
                        <li>
                            <strong><?php echo esc_html($enrollment->user_login); ?></strong>
                            - <?php echo esc_html($enrollment->post_title); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;?>
    </div>



    <?php

}

function lessonlms_add_enrollment_dashboard_widget() {
    wp_add_dashboard_widget(
        'enrollment_dashboard_widget',
        'Course Enrollment Status',
        'lessonlms_dashboard_enrollment_widget'
    );
}
add_action('wp_dashboard_setup', 'lessonlms_add_enrollment_dashboard_widget');
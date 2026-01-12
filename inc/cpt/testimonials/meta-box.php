<?php
/**
 * Testimonials Meta Box
 * 
 * @package lessonlms
 */
function lessonlms_testimonial_meta_box() {
    add_meta_box(
        'testimonial_info',
        'Student Designation',
        'lessonlms_testimonial_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'lessonlms_testimonial_meta_box');

function lessonlms_testimonial_callback($post) {
    $designation = get_post_meta( $post->ID, 'testimonial_designation', true);
    ?>
    <p>
        <label><strong>Designation / Course Name:</strong></label><br>
        <input type="text" name="testimonial_designation" style="width:100%; margin-top:5px;" value="<?php echo esc_attr($designation); ?>" placeholder="e.g. Student  of WordPrss Theme Development">
    </p>
    <?php
}

function lessonlms_save_testimonial_meta($post_id) {
    if(isset($_POST['testimonial_designation'])) {
        update_post_meta($post_id, 'testimonial_designation', sanitize_text_field($_POST['testimonial_designation']));
    }
}
add_action('save_post_testimonial', 'lessonlms_save_testimonial_meta');
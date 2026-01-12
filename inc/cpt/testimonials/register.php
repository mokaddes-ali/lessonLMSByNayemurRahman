<?php
/**
 * Register Testimonials
 * 
 * @package lessonlms
 */
function lessonlms_register_testimonial() {
    $args =  array(
        'labels' => array(
            'name'          => __('Testimonials', 'lessonlms'),
            'singular_name' => __('Testimonial', 'lessonlms'),
            'add_new'       => __('Add New', 'lessonlms'),
            'add_new_item'  => __('Add New Testimonial', 'lessonlms'),
            'edit_item'     => __('Edit Testimonial', 'lessonlms'),
        ),
        'public'      => true,
        'menu_icon'   => 'dashicons-format-quote',
        'supports'    => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'rewrite'     => array('slug' => 'testimonials'),
    );

    register_post_type( 'testimonial', $args );
}
add_action('init', 'lessonlms_register_testimonial');

require_once get_template_directory() . '/inc/cpt/testimonials/meta-box.php';
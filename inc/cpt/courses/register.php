<?php
/**
 * CPT: Register Course
 * 
 * @package lessonlms
 */
 function lessonlms_register_course(){
        $args = array(
            'labels' => array(
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
            );

            register_post_type( 'course', $args );
    }
    add_action('init','lessonlms_register_course');
    
    require_once get_template_directory() . '/inc/cpt/courses/meta-box.php';
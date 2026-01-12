<?php
/**
 * Sidebar Widget
 */

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
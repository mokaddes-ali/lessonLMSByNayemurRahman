<?php
/**
 * Blog Customizer
 * 
 * @package lessonlms
 */
 // Blog Section Start Here
        $wp_customize->add_section('blog_settings', array(
            'title' => __('Blog Settings', 'lessonlms'),
            'priority' => 110,
        ) );

        
        // Blog Section Title
        $wp_customize->add_setting('blog_section_title', array(
            'default' => 'Our Blog',
        ) );
        $wp_customize->add_control('blog_section_title', array(
            'label' => __('Blog Section Title', 'lessonlms'),
            'section' => 'blog_settings',
            'type' => 'text'
        ) );

        
        
        // Blog Section Description
        $wp_customize->add_setting('blog_section_description', array(
            'default' => 'Read our regular travel blog and know the latest update of tour and travel',
        ) );
        $wp_customize->add_control('blog_section_description', array(
            'label' => __('Blog Section Description', 'lessonlms'),
            'section' => 'blog_settings',
            'type' => 'text'
        ) );

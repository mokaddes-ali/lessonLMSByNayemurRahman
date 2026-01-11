<?php
    /**
     * Hero Customizer
     * 
     * @package lessonlms
     */
    // Hero Section Start Here
    $wp_customize->add_section( 'hero_settings', array(
        'title'    => __( 'Hero Settings', 'lessonlms' ),
        'priority' => 30,
    ) );

    // Hero Image
    $wp_customize->add_setting( 'hero_image', array(
        'default' => get_template_directory_uri() . '/assets/images/hero-img.png',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
        'label'    => __( 'Hero Image', 'lessonlms' ),
        'settings' => 'hero_image',
        'section'  => 'hero_settings'
    ) ) );

    // Hero Title
    $wp_customize->add_setting( 'hero_title', array(
        'default' => 'Learn without limits and spread knowledge.',
    ) );
    $wp_customize->add_control( 'hero_title', array(
        'label'   => __( 'Heor Title', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );   

    // Hero Description
    $wp_customize->add_setting( 'hero_description', array(
        'default' => 'Build new skills for that “this is my year” feeling with courses, certificates, and degrees from world-class universities and companies.',
    ) );
    $wp_customize->add_control( 'hero_description', array(
        'label'   => __( 'Hero Description', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'textarea'
    ) );

    // Hero Button Text
    $wp_customize->add_setting( 'hero_button_text', array(
        'default' => 'See Courses',
    ) );
    $wp_customize->add_control( 'hero_button_text', array(
        'label'   => __( 'Hero Button Text', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );

    // Hero Button Link
    $wp_customize->add_setting( 'hero_button_link', array(
        'default' => '#',
    ) );
    $wp_customize->add_control( 'hero_button_link', array(
        'label'   => __( 'Hero Button Link', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'url'
    ) );

    // video Text
    $wp_customize->add_setting( 'hero_video_text', array(
        'default' => 'Watch Video',
    ) );
    $wp_customize->add_control( 'hero_video_text', array(
        'label'   => __( 'Hero Video Text', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );

    // Hero Video Link
    $wp_customize->add_setting( 'hero_video_link', array(
        'default' => '#',
    ) );
    $wp_customize->add_control( 'hero_video_link', array(
        'label'   => __( 'Hero Video Link', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'url'
    ) );


    // Engagement Title
    $wp_customize->add_setting( 'engagement_title', array(
        'default' => 'Recent engagement.',
    ) );
    $wp_customize->add_control( 'engagement_title', array(
        'label'   => __( 'Engagement Title', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );

    // Students Count
    $wp_customize->add_setting( 'students_count', array(
        'default' => '50K',
    ) );
    $wp_customize->add_control( 'students_count', array(
        'label'   => __( 'Students Count', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );

    // Students Label
    $wp_customize->add_setting( 'students_label', array(
        'default' => 'Students',
    ) );
    $wp_customize->add_control( 'students_label', array(
        'label'   => __( 'Students Label', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );

    // Courses Count
    $wp_customize->add_setting( 'courses_count', array(
        'default' => '70K',
    ) );
    $wp_customize->add_control( 'courses_count', array(
        'label'   => __( 'Courses Count', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );

    // Courses Label
    $wp_customize->add_setting( 'courses_label', array(
        'default' => 'Courses',
    ) );
    $wp_customize->add_control( 'courses_label', array(
        'label'   => __( 'Courses Label', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'text'
    ) );

    // UI/UX Courses Count
    $wp_customize->add_setting( 'uiux_courses_count', array(
        'default' => '20',
    ) );
    $wp_customize->add_control( 'uiux_courses_count', array(
        'label'   => __( 'UI/UX Courses Count', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'number'
    ));

    // Development Courses Count
    $wp_customize->add_setting( 'dev_courses_count', array(
        'default' => '20',
    ) );
    $wp_customize->add_control( 'dev_courses_count', array(
        'label'   => __( 'Development Courses Count', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'number'
    ) );

    // Marketing Courses Count
    $wp_customize->add_setting( 'marketing_courses_count', array(
        'default' => '30',
    ) );
    $wp_customize->add_control( 'marketing_courses_count', array(
        'label'   => __( 'Marketing Courses Count', 'lessonlms' ),
        'section' => 'hero_settings',
        'type'    => 'number'
    ) );

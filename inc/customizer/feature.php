<?php
    /**
     * Feature
     * 
     * @package lessonlms
     */
    $wp_customize->add_section( 'features_settings', array(
        'title' => __('Features Settings', 'lessonlms'),
        'priority' => 100,
    ) );

    // Features Title
    $wp_customize->add_setting( 'features_title', array(
        'default' => 'Learner outcomes through our awesome platform.',
    ) );
    $wp_customize->add_control( 'features_title', array(
        'label'   => __( 'Features Title', 'lessonlms' ),
        'section' => 'features_settings',
        'type'    => 'text'
    ) );

    // Features Description
    $wp_customize->add_setting( 'features_description', array(
        'default' => '87% of people learning for professional development report career benefits like getting a promotion, a raise, or starting a new career.',
    ) );
    $wp_customize->add_control( 'features_description', array(
        'label'   => __( 'Features Description', 'lessonlms' ),
        'section' => 'features_settings',
        'type'    => 'textarea'
    ) );


    // Features Description Two
    $wp_customize->add_setting( 'features_description_two', array(
        'default' => 'Lesson Impact Report (2025)',
    ) );
    $wp_customize->add_control( 'features_description_two', array(
        'label'   => __( 'Features Description Two', 'lessonlms' ),
        'section' => 'features_settings',
        'type'    => 'textarea'
    ) );

    // Features Button Text
    $wp_customize->add_setting( 'features_button_text', array(
        'default' => 'Sign Up',
    ) );
    $wp_customize->add_control( 'features_button_text', array(
        'label'   => __( 'Features Button Text', 'lessonlms' ),
        'section' => 'features_settings',
        'type'    => 'text'
    ) );


    // Features Button URL
    $wp_customize->add_setting( 'features_button_url', array(
        'default' => '#',
    ) );
    $wp_customize->add_control( 'features_button_url', array(
        'label'   => __( 'Features Button URL', 'lessonlms' ),
        'section' => 'features_settings',
        'type'    => 'url'
    ) );

    // Featuer Image One
    $wp_customize->add_setting( 'features_image_one', array(
        'default' => get_template_directory_uri() . '/assets/images/features-img-1.png'
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'features_image_one', array(
        'label' => __('Featuer Image One', 'lessonlms'),
        'settings' => 'features_image_one',
        'section' => 'features_settings'
    ) ) );

    // Featuer Image Two
    $wp_customize->add_setting('features_image_two', array(
        'default' => get_template_directory_uri() . '/assets/images/features-img-2.png'
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'features_image_two', array(
        'label' => __('Featuer Image Two', 'lessonlms'),
        'settings' => 'features_image_two',
        'section' => 'features_settings'
    ) ) );

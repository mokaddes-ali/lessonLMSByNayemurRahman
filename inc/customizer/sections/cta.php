<?php
/**
 * CTA Section
 * 
 * @package lessonlms
 */
$wp_customize->add_section('cta_settings', array(
            'title' => __('CTA Settings', 'lessonlms'),
            'priority' => 105,
        ) );

        // CTA Title
        $wp_customize->add_setting('cta_title', array(
            'default' => 'Take the next step toward your personal and professional goals with Lesson.',
        ) );
        $wp_customize->add_control('cta_title', array(
            'label' => __('CTA Title', 'lessonlms'),
            'section' => 'cta_settings',
            'type' => 'text'
        ) );


        // CTA Description
        $wp_customize->add_setting('cta_description', array(
            'default' => 'Take the next step toward. Join now to receive personalized and more recommendations from the full Coursera catalog.',
        ) );
        $wp_customize->add_control('cta_description', array(
            'label' => __('CTA Description', 'lessonlms'),
            'section' => 'cta_settings',
            'type' => 'textarea'
        ) );

        // CTA Button Text
        $wp_customize->add_setting('cta_button_text', array(
            'default' => 'Join Now',
        ) );
        $wp_customize->add_control('cta_button_text', array(
            'label' => __('CTA Button Text', 'lessonlms'),
            'section' => 'cta_settings',
            'type' => 'text'
        ) );


        // CTA Button URL
        $wp_customize->add_setting('cta_button_url', array(
            'default' => '#',
        ) );
        $wp_customize->add_control('cta_button_url', array(
            'label' => __('CTA Button URL', 'lessonlms'),
            'section' => 'cta_settings',
            'type' => 'url'
        ) );

        // CTA Image
        $wp_customize->add_setting('cta_image', array(
            'default' => get_template_directory_uri() . '/assets/images/cta-img.png'
        ) );
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_image', array(
            'label' => __('CTA Image', 'lessonlms'),
            'settings' => 'cta_image',
            'section' => 'cta_settings'
        ) ) );
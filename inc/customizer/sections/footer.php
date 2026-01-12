<?php
/**
 * Footer Customizer
 * 
 * @package lessonlms
 */
// Footer Section Start Here
        $wp_customize->add_section('footer_settings', array(
            'title' => __('Footer Settings', 'lessonlms'),
            'priority' => 120,
        ) );

        // Footer Logo
        $wp_customize->add_setting('footer_logo');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
            'label' => __('Footer Logo', 'lessonlms'),
            'settings' => 'footer_logo',
            'section' => 'footer_settings'
        ) ) );

        // Social Links
        $socials = ['twitter', 'facebook', 'linkedin', 'instagram'];
        foreach ( $socials as $social ) {
            $wp_customize->add_setting("footer_{$social}_link", array(
                'default' => '#',
            ) );
            $wp_customize->add_control("footer_{$social}_link", array(
                'label' => sprintf(__('%s URL', 'lessonlms'), ucfirst($social)),
                'section' => 'footer_settings',
                'type' => 'url'
            ) );
        }

        // About Text
        $wp_customize->add_setting('footer_about_text', array(
            'default' => 'Need to help for your dream Career? trust us. With Lesson, study becomes a lot easier with us.',
        ) );
        $wp_customize->add_control('footer_about_text', array(
            'label' => __('About Text', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'textarea'
        ) );

        // Footer menu 1 Title
        $wp_customize->add_setting('footer_menu_1_title', array(
            'default' => 'Company',
        ) );
        $wp_customize->add_control('footer_menu_1_title', array(
            'label' => __('Footer Menu 1 Title', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'text'
        ) );

        // Footer menu 2 Title
        $wp_customize->add_setting('footer_menu_2_title', array(
            'default' => 'Support',
        ) );
        $wp_customize->add_control('footer_menu_2_title', array(
            'label' => __('Footer Menu 2 Title', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'text'
        ) );

        // Footer Address
        $wp_customize->add_setting('footer_address_title', array(
            'default' => 'Address',
        ) );
        $wp_customize->add_control('footer_address_title', array(
            'label' => __('Footer Address Title', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'text'
        ) );

        // Footer Location
        $wp_customize->add_setting('footer_location', array(
            'default' => '',
        ) );
        $wp_customize->add_control('footer_location', array(
            'label' => __('Footer Location', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'text'
        ) );

        // Footer Location Description
        $wp_customize->add_setting('footer_location_description', array(
            'default' => '27 Division St, New York, NY 10002, USA',
        ) );
        $wp_customize->add_control('footer_location_description', array(
            'label' => __('Footer Location Description', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'text'
        ) );

        // Footer Email Title
        $wp_customize->add_setting('footer_email_title', array(
            'default' => 'Email',
        ) );
        $wp_customize->add_control('footer_email_title', array(
            'label' => __('Footer Email Title', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'text'
        ) );

        // Footer Email 
        $wp_customize->add_setting('footer_email', array(
            'default' => 'email@gmail.com',
        ) );
        $wp_customize->add_control('footer_email', array(
            'label' => __('Footer Email', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'email'
        ) );

        // Footer Phone Title
        $wp_customize->add_setting('footer_phone_title', array(
            'default' => 'Phone',
        ) );
        $wp_customize->add_control('footer_phone_title', array(
            'label' => __('Footer Phone Title', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'text'
        ) );

        // Footer Phone 
        $wp_customize->add_setting('footer_phone', array(
            'default' => '+ 000 1234 567 890',
        ) );
        $wp_customize->add_control( 'footer_phone', array(
            'label' => __('Footer Phone', 'lessonlms'),
            'section' => 'footer_settings',
            'type' => 'tel'
        ) );
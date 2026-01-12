<?php
    /**
     * Theme Set Up
     * 
     * @package lessonlms
     */
    
    function lessonlms_theme_registration() {

        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo', array(
            'height' => 30,
            'width'  => 80,
        ) );
        register_nav_menus( array(
            'primary_menu'  => __( 'Primary Menu', 'lessonlms' ),
            'mobile_menu'   => __( 'Mobile Menu', 'lessonlms' ),
            'footer_menu_1' => __( 'Footer Menu 1', 'lessonlms' ),
            'footer_menu_2' => __( 'Footer Menu 2', 'lessonlms' ),
        ) );
    }
    add_action('after_setup_theme', 'lessonlms_theme_registration');
<?php
/**
 * Customizer
 * 
 * @package lessonlms
 */

function lessonlms_customize_register( $wp_customize ) {

    $theme_dir = get_template_directory();
    $folder    = '/inc/customizer/';

    $files = array(
        'hero.php',
        'feature.php',
        'cta.php',
        'blog.php',
        'footer.php',
    );

    foreach ( $files as $file ) {
        $path = $theme_dir . $folder . $file;

        if ( file_exists( $path ) ) {
            require_once $path;
        }
    }
}

add_action( 'customize_register', 'lessonlms_customize_register' );

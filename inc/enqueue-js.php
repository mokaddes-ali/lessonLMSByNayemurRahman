<?php
/**
 * Enqueue Scripts
 * 
 * @package lessonlms
 */

function lessonlms_theme_enqueue_scripts() {

    // WordPress jQuery
    wp_enqueue_script( 'jquery' );

    $theme_js = array(
        // Slick JS
        'slick-js' => array(
            'src'   => 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
            'deps'  => array( 'jquery' ),
            'ver'   => '1.9.0',
            'condi' => ! is_admin(),
        ),
        // Main JS
        'main-js' => array(
            'src'   => get_template_directory_uri() . '/assets/js/script.js',
            'deps'  => array( 'jquery' ),
            'ver'   => null,
            'condi' => ! is_admin(),
        ),
    );

    foreach ( $theme_js as $handler => $js_enqueue ) :

        wp_register_script(
            $handler,
            $js_enqueue['src'],
            $js_enqueue['deps'],
            $js_enqueue['ver'],
            true // footer
        );

        if ( $js_enqueue['condi'] ) :
            wp_enqueue_script( $handler );
        endif;

    endforeach;
}
add_action( 'wp_enqueue_scripts', 'lessonlms_theme_enqueue_scripts' );

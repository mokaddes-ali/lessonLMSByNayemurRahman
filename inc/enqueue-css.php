<?php
/**
 * Enqueue Styles
 * 
 * @package lessonlms
 */

// styles
function lessonlms_theme_enqueue_styles(){
    $theme_styles = array(
        // google-fonts
        'google-fonts' => array(
            'src'   => 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&family=Sen:wght@700&display=swap',
            'deps'  => array(),
            'ver'   => null,
            'condi' => ! is_admin(),
        ),
        // Boxicon
        'boxico-css' => array(
            'src'   => 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css',
            'deps'  => array(),
            'ver'   => '2.1.4',
            'condi' => ! is_admin(),
        ),
        // Font Awesome
        'font-awesome-css' => array(
            'src'   => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css',
            'deps'  => array(),
            'ver'   => '7.0.0',
            'condi' => ! is_admin(),
        ),
        // slick-css
        'slick-css' => array(
            'src'   => 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css',
            'deps'  => array(),
            'ver'   => '1.9.0',
            'condi' => ( is_front_page() || is_page( 'home' ) ) && ! is_admin(),
        ),
         // main style
        'main-style' => array(
            'src'   => get_stylesheet_uri(),
            'deps'  => array(),
            'ver'   => wp_get_theme()->get( 'Version' ),
            'condi' => true,
        ),
         // theme style
        'theme-style' => array(
            'src'   => get_template_directory_uri() . '/assets/css/style.css',
            'deps'  => array(),
            'ver'   => wp_get_theme()->get( 'Version' ),
            'condi' => ! is_admin(),
        ),
         // responsive-css
        'responsive-css' => array(
            'src'   => get_template_directory_uri() . '/assets/css/responsive.css',
            'deps'  => array(),
            'ver'   => wp_get_theme()->get( 'Version' ),
            'condi' => ! is_admin(),
        ),
    );

    foreach( $theme_styles as $handler => $style_enqueue ) :

        wp_register_style(
            $handler,
            $style_enqueue[ 'src' ],
            $style_enqueue[ 'deps' ],
            $style_enqueue[ 'ver' ],
            'all',
        );
        
        if ( $style_enqueue['condi'] ) :
            wp_enqueue_style( $handler );
        endif;

    endforeach;
}
add_action("wp_enqueue_scripts","lessonlms_theme_enqueue_styles");
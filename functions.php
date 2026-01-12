<?php
    $theme_dir = get_template_directory();

    if ( is_admin() && ! wp_doing_ajax() ) {

        $admin_path_only = array(
        '/inc/admin/admin-access-control.php',
        '/inc/admin/dashboard-redirect.php',
        '/inc/admin/post-capabilities.php',
        '/inc/admin/user-roles.php',
    );
       foreach ( $admin_path_only as $admin ) {
        require_once $theme_dir . $admin;
    }

    }

    $paths = array(
        '/inc/enqueue-css.php',
        '/inc/enqueue-js.php',
        '/inc/theme-setup.php',
        '/inc/customizer/customizer.php',
        '/inc/cpt/courses/register.php',
        '/inc/cpt/testimonials/register.php',
        '/inc/reviews/review.php',
        '/inc/student-enroll/enroll.php',
        '/inc/widget-register.php',
        '/inc/student-enroll/main.php'
    );
    foreach ( $paths as $path ) {
        require_once $theme_dir . $path;
    }


 
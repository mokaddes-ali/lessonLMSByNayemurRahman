<?php
/**
 * Show Data in Admin Dashboard
 * 
 * @package lessonlms
 */
 function lessonlms_dashboard_enrollment_widget() {
        global $wpdb;

        $total_enrollments = $wpdb->get_var(
            "SELECT SUM(meta_value) FROM $wpdb->postmeta WHERE meta_key = '_enrolled_students'"
        );

        $recent_enrollments = $wpdb->get_results(
            "SELECT u.user_login, p.post_title, um.meta_value
            FROM $wpdb->usermeta um
            JOIN $wpdb->users u ON u.ID = um.user_id
            JOIN $wpdb->posts p ON p.ID = um.meta_value
            WHERE um.meta_key = '_user_enrollments'
            ORDER BY um.umeta_id DESC
            LIMIT 5"
        );
        ?>

        <div class="enrollment-dashboard-widget">
            <h3>Enrollment Status</h3>

            <div class="enrollment-stats">
                <div class="stat-item">
                    <span class="stat-number"><?php echo number_format($total_enrollments ?: 0 ); ?></span>
                    <span class="stat-label">Total Enrollments</span>
                </div>
            </div>

            <?php if ( $recent_enrollments ) : ?>
                <div class="recent-enrollments">
                    <h4>Last Enrollment</h4>
                    <ul>
                        <?php foreach ( $recent_enrollments as $enrollment ) : ?>
                            <li>
                                <strong><?php echo esc_html($enrollment->user_login); ?></strong>
                                - <?php echo esc_html($enrollment->post_title); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif;?>
        </div>



        <?php

    }

    function lessonlms_add_enrollment_dashboard_widget() {
        wp_add_dashboard_widget(
            'enrollment_dashboard_widget',
            'Course Enrollment Status',
            'lessonlms_dashboard_enrollment_widget'
        );
    }
    add_action('wp_dashboard_setup', 'lessonlms_add_enrollment_dashboard_widget');
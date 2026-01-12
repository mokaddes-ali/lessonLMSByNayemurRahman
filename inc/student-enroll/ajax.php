<?php
/**
 * Load Ajax
 * 
 * @package lessonlms
 */
    function lessonlms_ajax_scripts() {
        ?>
        
        <script type="text/javascript">
            var ajax_object = {
                ajaxurl: '<?php echo admin_url('admin-ajax.php'); ?>'
            }
        </script>

        <?php
    }
    add_action('wp_head', 'lessonlms_ajax_scripts');
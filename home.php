<?php
/**
 * Show Latest Blog Post
 * 
 * @package lessonlms
 */
get_header();
?>
<div class="container">
<?php
    $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'order' => 'DESC'
    );
    $posts = new WP_Query( $args );
        if( $posts->have_posts() ) :
            while($posts->have_posts()) : $posts->the_post();
            get_template_part('template-parts/content/blog-card');
        endwhile; 
        wp_reset_postdata(); 
    else: 
        echo '<p>' . __('No blog post found', 'lessonlms') . '</p>';
    endif;
?>
</div>

<?php
    get_footer();
 ?>
<?php get_header(); ?>

<section class="blog search-results">
    <div class="container">
        <!-- Search Title -->
         <div class="section-header">
            <h2 class="section-title">
                <?php printf( esc_html__('Search Results for %s','lessonlms'), get_search_query() ); ?>
            </h2>
         </div>

        <?php if( have_posts() ) :
            get_template_part('template-parts/content/blog-card');
             else : 
             ?>
            <p class="no-results">
                <?php _e('No results found','lessonlms'); ?>
            </p>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>
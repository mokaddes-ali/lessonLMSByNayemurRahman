        <section class="blog">
            <div class="container">

                <div class="blog-heading">
                    <h3><?php echo esc_html(get_theme_mod('blog_section_title', 'Our Blog'));?></h3>

                    <p>
                        <?php echo esc_html(get_theme_mod('blog_section_description', 'Read our regular travel blog and know the latest update of tour and travel')) ?>
                    </p>
                </div>


                <div class="blog-wrapper">

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
            </div>
        </section>
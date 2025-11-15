    <?php get_header(); ?>
    <section class="single-course">
        <div class="container">
            <div class="heading courses-heading">
                <h2>All Courses</h2>
                <p>Browse our complete collection of courses and find the perfect one for your career growth.</p>
            </div>

            <div class="courses-grid">
                
                    <?php
                        $courses = new WP_Query(array(
                            'post_type'      => 'course',
                            'posts_per_page' => 6,
                        ));

                        if( $courses->have_posts() ) :
                            while( $courses->have_posts() ) : $courses->the_post();

                            $rating = get_post_meta(get_the_ID(), 'rating', true);
                            $price = get_post_meta(get_the_ID(), 'price', true);

                            $price = !empty($price) ? $price : '0.00';
                            $rating = !empty($rating) ? $rating : '0.0';
                    ?>
                    <!----- course-1 ----->
                    <div class="course course-1 active-btn">
                        <div class="img">
                            <?php if( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('full', array( 'alt' => get_the_title() )); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course-1.png" alt="course-1">
                            <?php endif; ?>
                            
                        </div>

                        <div class="course-details">
                            <!----- course title and rating ----->
                            <div class="flex">
                                <span class="c-title"><?php the_title(); ?></span>

                                <div class="rating">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z" fill="#FEA31B"/>
                                    </svg>

                                    <span><?php echo esc_html($rating); ?></span>
                                </div>
                            </div>

                            <p><?php echo wp_trim_words(get_the_excerpt() , 15); ?></p>


                            <!----- price and btn ----->
                            <div class="price-btn">
                                <span class="price">$<?php echo esc_html($price); ?></span>

                                <a href="<?php echo get_permalink(); ?>" class="yellow-bg-btn book-now">Book Now</a>
                            </div>
                        </div>
                    </div>

                            <?php endwhile; ?>
                        <?php else : ?>
                            <h2>No course found.</h2>
                        <?php endif; wp_reset_postdata(); ?>
            </div>
            
            <div class="pagination">

                <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text'=> __('Prev', 'lessonlms'),
                        'next_text'=> __('Next', 'lessonlms'),
                    ));
                ?>
                <a href="#" class="page-btn active">1</a>
                <a href="#" class="page-btn">2</a>
                <a href="#" class="page-btn">3</a>
                <a href="#" class="page-btn next">Next <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>
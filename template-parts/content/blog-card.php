<?php
/**
 * Common Blog Card
 * 
 * @package lessonlms
 */
?>
 <!----- blog-card ----->
    <div class="sngle-blog blog-1">
        <div class="img">
            <a href="<?php the_permalink(); ?>">
                <?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('lerge');
                    }else{
                        echo '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-1.png" alt="course-1">';
                    }
                ?>

            </a>
        </div>

        <div class="single-blog-details">
            <!----- blog-details ----->
            <div class="date">
                <div class="yellow-cercel"></div>
                <span><?php echo get_the_date('d F Y'); ?></span>
            </div>

            <hr>

            <div class="blog-title">
                <span>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </span>
            </div>

            <!----- btn ----->
            <div class="yellow-bg-btn read-more">
                <a href="<?php the_permalink(); ?>">
                    <?php _e('Read More', 'lessonlms'); ?>
                </a>
            </div>
        </div>
    </div>
<?php get_header(); ?>

<!----- Blog Details Section ----->
<section class="blog-details">
    <div class="container">
        <div class="blog-details-wrapper">
            <!----- Main Blog Content ----->
            <div class="blog-content">
                <?php if( have_posts() ) : while (  have_posts()) : the_post(); ?>

                <div class="blog-meta">
                    <div class="date">
                        <div class="yellow-circle"></div>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                    <h1 class="blog-title"> <?php echo the_title(); ?> </h1>
                    <div class="author">
                        <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                        <!-- <img src="https://avatars.githubusercontent.com/u/27496908?v=4" alt="Author" class="author-avatar"> -->
                        <span class="author-name">By <?php the_author(); ?></span>
                    </div>
                </div>
                
                <div class="featured-image">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php endif; ?>
                    <!-- <img src="assets/images/blog-1.png" alt="Blog Featured Image"> -->
                </div>
                
                <div class="blog-text">

                    <?php the_content(); ?>
                    
                    <div class="blog-tags">
                        <span>Tags:</span>
                        <?php the_tags('', '', ''); ?>
                        <!-- <a href="#">Web Design</a>
                        <a href="#">Career</a>
                        <a href="#">2022</a> -->
                    </div>
                    
                    <div class="social-share">
                        <span>Share:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url=&text=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                
                <!----- Author Box ----->
                <div class="author-box">
                    <div class="author-avatar">
                        <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                    </div>
                    <div class="author-info">
                        <h3>About <?php the_author(); ?> </h3>
                        <p><?php echo get_the_author_meta('description'); ?></p>
                        <div class="author-social">
                            <?php if ( get_the_author_meta('user_url') ) : ?>
                                <a href="<?php echo get_the_author_meta('user_url'); ?>"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>

                            <?php if ( get_the_author_meta('user_url') ) : ?>
                                <a href="<?php echo get_the_author_meta('user_url'); ?>"><i class="fab fa-twitter"></i></a>
                            <?php endif; ?>

                            <?php if ( get_the_author_meta('user_url') ) : ?>
                                <a href="<?php echo get_the_author_meta('user_url'); ?>"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>

                            <?php if ( get_the_author_meta('user_url') ) : ?>
                                <a href="<?php echo get_the_author_meta('user_url'); ?>"><i class="fab fa-linkedin-in"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!----- Comments Section ----->
                <div class="comments-section">

                    <?php 
                        $comments_count = get_comments_number();
                        if ( $comments_count > 0 ):
                            echo '<h2 class="section-title">Comments ('.$comments_count.')</h2>';
                        endif;

                        $parent_comments = get_comments(array(
                            'post_id' => get_the_ID(),
                            'status' => 'approve',
                            'order'  => 'ASC',
                            'parent' => 0
                        ));
                    ?>

                    <?php if( $parent_comments ) : ?>
                        <div class="comment-list">
                            <?php foreach($parent_comments as $comment) : ?>
                                <div class="comment" id="comment-<?php echo $comment->comment_ID; ?>">
                                    <div class="comment-avatar">
                                        <?php echo get_avatar($comment, 50); ?>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <h4><?php echo esc_html($comment->comment_author); ?></h4>
                                            <span class="comment-date">
                                                <?php echo human_time_diff(strtotime($comment->comment_date), current_time('timestamp')); ?> ago
                                            </span>
                                        </div>

                                        <p><?php echo esc_html($comment->comment_content); ?></p>
                                        <div class="comment-actions">
                                            <?php 
                                                comment_reply_link(array(
                                                    'reply_text' => 'Reply',
                                                    'depth'      => 1,
                                                    'max_depth'  => get_option('thread_comments_depth'),
                                                    'class' => 'reply-btn'
                                                ), $comment->comment_ID, get_the_ID());
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    
                    <!----- Comment 1 ----->
                    <div class="comment">
                        <div class="comment-content">
                            
                            <!----- Reply to Comment 1 ----->
                            <?php
                                $replies = get_comments(array(
                                    'post_id' => get_the_ID(),
                                    'status' => 'approve',
                                    'order'  => 'ASC',
                                    'parent' => $comment->comment_ID
                                ));
                            ?>

                            <?php if($replies) : ?>
                                <?php foreach($replies as $reply) : ?>
                                    <div class="comment reply" id="comment-<?php echo $reply->comment_ID; ?>">
                                        <div class="comment-avatar">
                                            <?php echo get_avatar($reply, 50); ?>
                                        </div>

                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h4><?php echo esc_html($reply->comment_author); ?></h4>
                                                <span class="comment-date">
                                                    <?php echo human_time_diff(strtotime($reply->comment_date), current_time('timestamp')); ?> ago
                                                </span>
                                            </div>
                                            <p><?php echo esc_html($reply->comment_content); ?></p>
                                            <div class="comment-actions">
                                                <a href="#" class="reply-btn">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!----- Comment Form ----->
                <div class="comment-form">
                    <h2 class="section-title">Leave a Comment</h2>

                    <?php
                        comment_form(array(
                            'fields' => array(
                                'author' => '<div class="form-row"><div class="form-group"><input id="author" name="author" type="text" placeholder="Name" required></div>',
                                'email'  => '<div class="form-group"><input id="email" name="email" type="email" placeholder="Email" required></div></div>'
                            ),
                            'comment_field' => '<div class="form-group"><textarea id="comment" name="comment" placeholder="Write your comment here..." required></textarea></div>',
                            'class_submit' => 'yellow-bg-btn submit-btn',
                            'label_submit' => 'Post Comment'
                        ));
                    ?>
                </div>

                <?php endwhile; endif; ?>

            </div>
            
            <!----- Sidebar ----->
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
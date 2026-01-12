<?php
/**
 * Callback function
 * 
 * @package lessonlms
 */


function lessonlms_course_meta_box_callback($post){
    $price = get_post_meta($post->ID, 'price', true);
    $original_price = get_post_meta($post->ID, 'original_price', true);
    $video_hours = get_post_meta($post->ID, 'video_hours', true);
    $article_count = get_post_meta($post->ID, 'article_count', true);
    $downloadable_resources = get_post_meta($post->ID, 'downloadable_resources', true);
    $language = get_post_meta($post->ID, 'language', true);
    $subtitles = get_post_meta($post->ID, 'subtitles', true);

    $learn_points_data = get_post_meta($post->ID, 'learn_points', true);
    $learn_points = is_array($learn_points_data) ? implode("\n", $learn_points_data) : $learn_points_data;

    $requirements_data = get_post_meta($post->ID, 'requirements', true);
    $requirements = is_array($requirements_data) ? implode("\n", $requirements_data) : $requirements_data;

    $target_audience_data = get_post_meta($post->ID, 'target_audience', true);
    $target_audience = is_array($target_audience_data) ? implode("\n", $target_audience_data) : $target_audience_data;

    ?>
    <div>
        <p>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="<?php echo esc_attr($price); ?>">
        </p>
        <p>
            <label for="original_price">Original Price:</label>
            <input type="number" name="original_price" step="0.01" value="<?php echo esc_attr($original_price); ?>">
        </p>
        <p>
            <label for="video_hours">Video Hours:</label>
            <input type="number" name="video_hours" step="0.1" value="<?php echo esc_attr($video_hours); ?>">
        </p>
        <p>
            <label for="article_count">Article Count:</label>
            <input type="number" name="article_count" value="<?php echo esc_attr($article_count); ?>">
        </p>
        <p>
            <label for="downloadable_resources">Downloadable Resources:</label>
            <input type="number" name="downloadable_resources" value="<?php echo esc_attr($downloadable_resources); ?>">
        </p>
        <p>
            <label for="language">Language:</label>
            <input type="text" name="language" value="<?php echo esc_attr($language); ?>">
        </p>
        <p>
            <label for="subtitles">Subtitles:</label>
            <input type="text" name="subtitles" value="<?php echo esc_attr($subtitles); ?>">
        </p>

        <p>
            <label for="learn_points"><strong>What You'll Learn</strong></label><br>
            <small>Input your list items</small>
            <textarea name="learn_points" id="learn_points" rows="5" style="width:100%;">
                <?php echo esc_textarea($learn_points); ?>
            </textarea>
        </p>

        <p>
            <label for="requirements"><strong>Requirements</strong></label><br>
            <small>Input your list items</small>
            <textarea name="requirements" id="requirements" rows="5" style="width:100%;">
                <?php echo esc_textarea($requirements); ?>
            </textarea>
        </p>

        <p>
            <label for="target_audience"><strong>Who this course is for:</strong></label><br>
            <small>Input your list items</small>
            <textarea name="target_audience" id="target_audience" rows="5" style="width:100%;">
                <?php echo esc_textarea($target_audience); ?>
            </textarea>
        </p>
    </div>
    <?php
}
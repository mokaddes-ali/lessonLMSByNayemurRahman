<?php
/**
 * Course Review
 * 
 * @package lessonlms
 */
// ইউজার রিভিউ সাবমিট করলে তা প্রসেস হবে এবং সেভ হবে।
  require_once get_template_directory() . '/inc/reviews/review-submit.php';
    // কোর্সের রিভিউ থেকে মোট রিভিউ সংখ্যা এবং গড় রেটিং আপডেট করবে।
  require_once get_template_directory() . '/inc/reviews/review-stats.php';
<?php
/**
 * Front Page (Home Page)
 *
 * @package lessonlms
 */

get_header();

$common_folder = 'template-parts/sections/';
$sections = array(
    'hero',
    'courses',
    'testimonials',
    'features',
    'cta',
    'blog',
);
?>

<main>
    <?php
    foreach ( $sections as $section ) {
        get_template_part( $common_folder . $section );
    }
    ?>
</main>

<?php
get_footer();
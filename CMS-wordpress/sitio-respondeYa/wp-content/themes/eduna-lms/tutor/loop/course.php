<?php
/**
 * A single course loop
 *
 * @package Tutor\Templates
 * @subpackage CourseLoopPart
 * @author Themeum
 * @link https://themeum.com
 * @since 1.4.3
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $authordata;
$course_id = get_the_ID();
$profile_url       = tutor_utils()->profile_url($authordata->ID, true);

// Safely fetch course details
$course_title = get_the_title($course_id);
$course_permalink = get_the_permalink($course_id);
$course_image_url = get_tutor_course_thumbnail($course_id, 'full'); // Fetch featured image safely
$course_price = tutor_utils()->get_course_price($course_id, true);
$course_rating = tutor_utils()->get_course_rating($course_id);
$enrolled_students = tutor_utils()->count_enrolled_users_by_course($course_id);
$lessons = tutor_utils()->get_course_lessons($course_id);
$course_categories = get_tutor_course_categories($course_id); // Get course categories

?>

<div class="ed-course__card m-0">
    <a href="<?php echo esc_url($course_permalink); ?>" class="ed-course__img">
        <img src="<?php echo esc_url($course_image_url); ?>" alt="<?php echo esc_attr($course_title); ?>" />
    </a>
    
    <?php
    // Check if course categories exist and output the first one (or all categories if you want to display multiple)
    if ($course_categories) {
        $first_category = $course_categories[0]; // Get the first category
        ?>
        <a href="<?php echo esc_url(get_term_link($first_category)); ?>" class="ed-course__tag">
            <?php echo esc_html($first_category->name); // Display the category name ?>
        </a>
        <?php
    }
    ?>
    
    <div class="ed-course__body">
        <div class="ed-course__lesson">
            <div class="ed-course__part">
                <span class="ed-course__lesson-icon">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.875 2.83341H4.95833C4.17593 2.83341 3.54167 3.46768 3.54167 4.25008C3.54167 5.03249 4.17593 5.66675 4.95833 5.66675H14.875V14.8751C14.875 15.2663 14.5579 15.5834 14.1667 15.5834H4.95833C3.39353 15.5834 2.125 14.3149 2.125 12.7501V4.25008C2.125 2.68527 3.39353 1.41675 4.95833 1.41675H14.1667C14.5579 1.41675 14.875 1.73388 14.875 2.12508V2.83341ZM3.54167 12.7501C3.54167 13.5325 4.17593 14.1667 4.95833 14.1667H13.4583V7.08341H4.95833C4.44226 7.08341 3.95841 6.94544 3.54167 6.70436V12.7501ZM14.1667 4.95841H4.95833C4.56713 4.95841 4.25 4.64128 4.25 4.25008C4.25 3.85888 4.56713 3.54175 4.95833 3.54175H14.1667V4.95841Z" fill="#5F5D5D"/>
                    </svg>
                </span>
                <p><?php echo tutor_utils()->get_lesson_count_by_course( $course_id ); ?><?php esc_html_e('Lessons','eduna-lms');?></p>
            </div>
            <div class="ed-course__teacher">
                <i class="fa-regular fa-user"></i>
                <a href="<?php echo esc_url($profile_url); ?>"><p><?php echo esc_html(get_the_author()); ?></p></a>
            </div>
        </div>
        <a href="<?php echo esc_url($course_permalink); ?>" class="ed-course__title">
            <h5><?php echo esc_html($course_title); ?></h5>
        </a>
        <div class="ed-course__ratings">
            <?php echo do_action('tutor_course/loop/rating'); ?>
        </div>
        <div class="ed-course__bottom">
            <span class="ed-course__price"><?php echo wp_kses_post($course_price ? $course_price : __('Free', 'eduna-lms')); ?></span>
            <span class="ed-course__students">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.83333 8.02784L0 6.37508L8.5 1.41675L17 6.37508V12.3959H15.5833V7.20149L14.1667 8.02784V12.7581L14.009 12.9529C12.7115 14.5563 10.7254 15.5834 8.5 15.5834C6.27454 15.5834 4.28846 14.5563 2.99103 12.9529L2.83333 12.7581V8.02784ZM4.25 8.85425V12.2484C5.28927 13.4258 6.80788 14.1667 8.5 14.1667C10.1921 14.1667 11.7107 13.4258 12.75 12.2484V8.85425L8.5 11.3334L4.25 8.85425ZM2.81157 6.37508L8.5 9.69334L14.1884 6.37508L8.5 3.05683L2.81157 6.37508Z" fill="#5F5D5D"/>
            </svg>
            <?php echo esc_html($enrolled_students); ?> <?php esc_html_e('Students','eduna-lms');?></span>
        </div>
    </div>
</div>

<?php

// do_action('tutor_course/loop/header');

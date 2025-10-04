<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eduna LMS
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="eduna-lms-primary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside>

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eduna LMS
 */
$categories = get_the_category(); // Get all categories of the post
$first_category = !empty($categories) ? $categories[0] : null; // Get the first category
?>
<div class="<?php if(is_active_sidebar('sidebar')):?> col-lg-6 col-md-6 col-12 <?php else :?> col-lg-4 col-md-6 col-12 <?php endif;?>   eduna-lms-masonry-item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="eduna-lms-blog__card">
			<?php if(has_post_thumbnail()) : ?>	
			<div class="eduna-lms-blog__head">
				<div class="eduna-lms-blog__img">
					<?php the_post_thumbnail('eduna-lms-blog-thumb'); ?>
				</div>
				<?php if ($first_category) : ?>
                    <a href="<?php echo esc_url(get_category_link($first_category->term_id)); ?>" class="eduna-lms-blog__category">
                        <?php echo esc_html($first_category->name); ?>
                    </a>
                <?php endif; ?>
			</div>
			<?php endif;?>
			<div class="eduna-lms-blog__content">
				<ul class="eduna-lms-blog__meta">
                    <li><i class="fa-regular fa-calendar"></i><?php echo get_the_date(); ?></li>
                    <li><i class="fa-regular fa-comment-dots"></i><?php echo get_comments_number_text(); ?></li>
                </ul>
				<h3 class="eduna-lms-blog__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
		</div>
	</article> <!-- #post-<?php the_ID(); ?> -->
</div>

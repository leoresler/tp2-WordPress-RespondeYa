<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eduna LMS
 */
?>
	<div class="blog-content-main">
		<div class="blog-head">
			<?php the_post_thumbnail('eduna-lms-blog-single-thumb'); ?>
		</div>
		<div class="blog-body">
			<h1 class="blog-heading"><?php the_title(); ?></h1>
			<div class="blog-meta">
				<ul class="list">
					<li><i class="fa-regular fa-calendar"></i><?php eduna_lms_posted_on(); ?></li>
					<li><i class="fa-regular fa-comment"></i><?php echo esc_html(get_comments_number());?> <?php esc_html_e('comments', 'eduna-lms'); ?></li>
				</ul>
			</div>
			<?php the_content(); ?>
		</div>

		<?php wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'eduna-lms'),
			'after'  => '</div>',
		)); ?>
	</div>

	<?php
    $tags = get_the_tags();
    if ($tags) {
        echo '
        <div class="tags_lists d-flex">';
            foreach ($tags as $tag) {
                echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="cs_category">' . esc_html($tag->name) . '</a>';
            }
        echo '
        </div>
    ';
    }
    ?>

    <div class="blog_navbar d-flex justify-content-between">
        <?php
        $prev_post = get_previous_post();
        if ($prev_post) {
            $prev_title = get_the_title($prev_post->ID);
            echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '" class="post_prev"><i class="fa fa-arrow-left" aria-hidden="true"></i>' . esc_html__('Previous Post', 'eduna-lms') . '</a>';
        } else {
            echo '<a href="#" class="post_prev disabled"><i class="fa fa-arrow-left" aria-hidden="true"></i>' . esc_html__('Previous Post', 'eduna-lms') . '</a>';
        }

        $next_post = get_next_post();
        if ($next_post) {
            $next_title = get_the_title($next_post->ID);
            echo '<a href="' . esc_url(get_permalink($next_post->ID)) . '" class="post_next">' . esc_html__('Next Post', 'eduna-lms') . '<i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
        } else {
            echo '<a href="#" class="post_next disabled">' . esc_html__('Next Post', 'eduna-lms') . '<i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
        }
        ?>
    </div>
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Eduna LMS
 */

get_header();
?>
	<div class="ed-breadcrumbs background-image">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6 col-12">
					<div class="ed-breadcrumbs__content">
						<h2 class="ed-breadcrumbs__title"><?php the_title(); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Blog Sinlge -->
	<section class="eduna-lms-blog-single">
		<div class="container">
			<div class="row">
				<div class="<?php if(is_active_sidebar('sidebar')) : ?> col-lg-8 col-md-8 <?php else :?> col-12 <?php endif;?>">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single' );

					

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
				<?php if(is_active_sidebar('sidebar')) : ?>
				<div class="col-lg-4 col-md-4 col-12">
					<div class="eduna-lms-sidebar eduna-lms-sidebar__single">
						<aside id="eduna-lms-secondary-sidebar" class="widget-area">
							<?php dynamic_sidebar('sidebar'); ?>
						</aside>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>
	<!--/ End Single -->
<?php
get_footer();

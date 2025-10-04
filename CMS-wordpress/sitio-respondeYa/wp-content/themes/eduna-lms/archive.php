<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eduna LMS
 */

get_header();
?>

	<?php if(get_theme_mod('eduna_lms_archive_bc', true)) : ?>
		<div class="ed-breadcrumbs background-image">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6 col-12">
						<div class="ed-breadcrumbs__content">
							<?php
								the_archive_title( '<h2 class="ed-breadcrumbs__title">', '</h2>' );
								the_archive_description( '<p class="archive-description">', '</p>' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<section class="eduna-lms-blog-section site-archive">
		<div class="container">
			<div class="row">
				<div class="<?php if(is_active_sidebar('sidebar')): ?> col-lg-9 eduna-lms-main-area__with-side <?php else :?> col-12 <?php endif; ?>">
					<div class="row eduna-lms-masonry">
						<?php if ( have_posts() ) : ?>
							<?php
								/* Start the Loop */
								while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'archive' );

							endwhile;

							else :
							get_template_part( 'template-parts/content', 'none' );

							endif;
						?>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="pagination-main">
								<?php if (function_exists("eduna_lms_pagination")) :?>
									<?php eduna_lms_pagination(); ?>
								<?php endif;?>
							</div>
						</div>
					</div>	
				</div>
				<?php if(is_active_sidebar('sidebar')): ?>
				<div class="col-lg-3 col-12 eduna-lms-main-area__sidebar">
					<div class="eduna-lms-sidebar eduna-lms-sidebar__right">
						<?php get_sidebar(); ?>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>

<?php
get_footer();

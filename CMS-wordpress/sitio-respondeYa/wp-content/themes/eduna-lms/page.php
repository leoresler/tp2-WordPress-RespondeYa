<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eduna LMS
 */

get_header();
?>
	
	<?php if(get_theme_mod('eduna_lms_page_bc', true) && !(is_front_page())  ) : ?>
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
	<?php endif; ?>

	<section class="eduna-lms-page site-page <?php echo eduna_lms_active(); ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="eduna-lms-page__inners">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();

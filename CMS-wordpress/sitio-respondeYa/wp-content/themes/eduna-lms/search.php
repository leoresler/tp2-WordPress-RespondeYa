<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Eduna LMS
 */

get_header();

?>
	
	<?php if(get_theme_mod('eduna_lms_search_bc', true)) : ?>
		<div class="ed-breadcrumbs background-image">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6 col-12">
						<div class="ed-breadcrumbs__content">
							 <?php if ( have_posts() ) : ?>
								<h3 class="ed-breadcrumbs__title"><?php printf( esc_html__( 'Search Results for: %s', 'eduna-lms' ), get_search_query() ); ?></h3>
							<?php else : ?>
								<h3 class="ed-breadcrumbs__title"><?php esc_html_e( 'Nothing Found', 'eduna-lms' ); ?></h3>
								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'eduna-lms' ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<section class="eduna-lms-search-page search-page">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if ( have_posts() ) : ?>
						<div class="row eduna-lms-masonry">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;
							?>
						</div>
					<?php else :?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif;?>
				</div>
			</div>

			<?php the_posts_navigation();?>
		</div>
	</section>

<?php
get_footer();

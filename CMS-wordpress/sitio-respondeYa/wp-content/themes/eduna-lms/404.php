<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Eduna LMS
 */

get_header();
?>


	 <!-- Start Error Area  -->
	 <section class="ed-error ed-section-padding">
		<div class="container ed-container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-3 col-12">
					<div class="ed-error__inner text-center">
						<div class="ed-error__content">
							<h1 class="eduna-lms-404__title">
								<?php esc_html_e( '404', 'eduna-lms' ); ?> <span><?php esc_html_e( 'Error', 'eduna-lms' ); ?></span>
							</h1>
							<p class="ed-error__content-text">
								<?php esc_html_e( 'Seems like you\'ve landed on a page which has been archived or removed, let\'s take you back home?', 'eduna-lms' ); ?>
							</p>
							<div class="ed-error__btn">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ed-btn-custom"><?php esc_html_e( 'Go to Homepage', 'eduna-lms' ); ?><i class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Error Area  -->

<?php
get_footer();
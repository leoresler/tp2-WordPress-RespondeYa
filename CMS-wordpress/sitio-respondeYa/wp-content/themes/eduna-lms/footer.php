<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eduna LMS
 */

?>
</div><!-- #content -->
	<footer id="colophon" class="eduna-lms-footer">
		<?php if(is_active_sidebar('eduna-lms-footer-1')) : ?>
		<div class="eduna-lms-footer__top">
			<div class="container">
				<div class="row">
					<?php if(is_active_sidebar('eduna-lms-footer-1')) : ?>
						<div class="col-lg-4 col-md-3 col-12 eduna-lms-footer-1">
							<?php dynamic_sidebar('eduna-lms-footer-1'); ?>
						</div>
					<?php endif; ?>
					<div class="col-lg-8 col-md-9 col-12">
						<div class="row">
							<?php if(is_active_sidebar('eduna-lms-footer-2')) : ?>
								<div class="col-lg-4 col-md-4 col-12">
									<?php dynamic_sidebar('eduna-lms-footer-2'); ?>
								</div>
							<?php endif; ?>
							<?php if(is_active_sidebar('eduna-lms-footer-3')) : ?>
								<div class="col-lg-4 col-md-4 col-12">
									<?php dynamic_sidebar('eduna-lms-footer-3'); ?>
								</div>
							<?php endif; ?>
							<?php if(is_active_sidebar('eduna-lms-footer-4')) : ?>
								<div class="col-lg-4 col-md-4 col-12">
									<?php dynamic_sidebar('eduna-lms-footer-4'); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="eduna-lms-footer__bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="eduna-lms-footer__branding text-center">
							<p class="eduna-lms-footer__site"><?php esc_html_e('&copy; All Right Reserved ','eduna-lms'); ?> <a class="eduna-lms-footer__url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('title'); ?></a> <?php echo  esc_html(date_i18n( __( 'Y' , 'eduna-lms' ) ));?></p>
							<p class="eduna-lms-footer__devs"><?php
							printf( esc_html__( 'Theme %2$s  By  %1$s', 'eduna-lms' ), '<a href="https://pencilwp.com/" target="_blank" >PencilWp</a>' , '<a href="https://pencilwp.com/product/eduna-lms" target="_blank">Eduna LMS</a>' );?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
</div><!-- End Page -->

<?php wp_footer(); ?>

</body>
</html>

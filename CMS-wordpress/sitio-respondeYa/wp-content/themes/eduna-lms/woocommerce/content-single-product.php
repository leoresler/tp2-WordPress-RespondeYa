<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$shop_meta = get_post_meta($post->ID, 'eduna_wp_shop_options', true) ?: [];
$enable_custom_thumb = $shop_meta['enable_custom_thumb'] ?? false;
$custom_thumb_img = $shop_meta['custom_thumb_img'] ?? false;
$custom_thumb_img_src = is_array($custom_thumb_img) ? wp_get_attachment_image_src($custom_thumb_img['id'], 'full') : false;

$product_id = get_the_ID();


?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<div class="row">
		<div class="col-lg-6 col-12">
			<?php if (!empty($custom_thumb_img_src[0])) : ?>
				<div class="cs_single_product_thumb cs_single_product_thumb_custom">
					<img src="<?php echo esc_url($custom_thumb_img_src[0]); ?>" alt="<?php the_title(); ?>">
				</div>
			<?php else : ?>
				<div class="cs_single_product_thumb">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-lg-6 col-12">
			<div class="cs_single-product-details">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
		</div>
	</div>
	
	<div class="cs_height_100 cs_height_lg_60"></div>
		
	<div class="col-12">
		<div class="cs-product_meta_info">
			<?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
			?>
		</div>
	</div>
	
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$idd = get_the_ID();

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


?>
<li id="single-products" <?php wc_product_class( '', $product ); ?>>

	<!-- Single Product -->
	<div class="ed-product__card">
		<div class="ed-product__cover">
			<div class="ed-product__img">
				<img src="<?php echo esc_url( wp_get_attachment_url( $product->get_image_id() ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
			</div>
			<a  href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" class="ed-btn add-to-cart" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>">
				<?php esc_html_e( 'View Products', 'eduna-lms' ); ?>
			</a>
		</div>
		<div class="ed-product__info">
			<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" class="ed-product__title">
				<?php echo esc_html( $product->get_name() ); ?>
			</a>
			<div class="ed-product__ratings">
				<?php
				if ( $product->get_rating_count() ) {
					echo wc_get_rating_html( $product->get_average_rating(), $product->get_rating_count() ); // Outputs the rating stars.
					?>
					<div class="ed-product__ratings-text"><span>(<?php echo esc_html( $product->get_rating_count() ); ?> Reviews)</span></div>
					<?php
				} else {
					?>
					<div class="ed-product__ratings-text"><?php esc_html_e( 'No reviews yet', 'eduna-lms' ); ?></div>
					<?php
				}
				?>
			</div>

			<div class="ed-product__info-bottom">
				<div class="ed-product__price">
					<?php echo wp_kses_post($product->get_price_html()); ?>
				</div>
			</div>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>

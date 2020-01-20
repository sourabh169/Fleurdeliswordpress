<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="reviewTable">
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>	
	<h3 id="order_review_heading" class="headingPrimary"><?php esc_html_e( 'Order Summary', 'woocommerce' ); ?></h3>
	<div class="reviewTableBody">
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<div class="row <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="col-sm-8 reviewTableCol8">
						<div class="reviewTableThumbmail">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
							?>
						</div>
						<div class="reviewTableProName">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="producQuantity"> Quantity ' . sprintf( '%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
					</div>
					<div class="col-sm-4 text-right reviewproductTotal">
						<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div >
				</div>
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</div>
	<div class="reviewTableFooter">

		<div class="row cart-subtotal">
			<div class="col-sm-8">
				<?php esc_html_e( 'Subtotal', 'woocommerce' ); ?>
			</div>
			<div class="col-sm-4 text-right">
				<?php wc_cart_totals_subtotal_html(); ?>					
			</div>
		</div>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="row cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<div class="col-sm-8">
					<?php wc_cart_totals_coupon_label( $coupon ); ?>						
				</div>
				<div class="col-sm-4 text-right">
					<?php wc_cart_totals_coupon_html( $coupon ); ?>						
				</div>
			</div>
		<?php endforeach; ?>

		<div class="row">
			<div class="col-sm-8">
				Tax
			</div>
			<div class="col-sm-4 text-right">
				-
			</div>			
		</div>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

		<div>
			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
		</div>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="row fee">
				<div class="col-sm-8"><?php echo esc_html( $fee->name ); ?></div>
				<div class="col-sm-4 text-right"><?php wc_cart_totals_fee_html( $fee ); ?></
			</div>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
					<div class="row tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<div class="col-sm-8"><?php echo esc_html( $tax->label ); ?></div>
						<div class="col-sm-4"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="row tax-total">
					<div class="col-sm-8"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
					<div class="col-sm-4 text-right"><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<div class="row order-total">
			<div class="col-sm-8"><strong><?php esc_html_e( 'Total', 'woocommerce' ); ?></strong></div>
			<div class="col-sm-4 text-right"><strong><?php wc_cart_totals_order_total_html(); ?></strong></div>
		</div>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</div>
</div>

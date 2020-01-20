<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="customCartTotal <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<div class="customContinueShoppingDiv">
		<a href="<?php echo get_option('home'); ?>" class="btn btn-default2 btn-caps">Continue Shopping</a>
	</div>

	<div class="customCartTotalDesc">
		<div class="customCartOrdertotal">
			<h3><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></h3>
			<h3 data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></h3>
		</div>
		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
		<div class="customCartOrderCheckout">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>

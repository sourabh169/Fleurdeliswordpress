<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="myAccountDashboard">
	<div class="myaccHead">
		<h1 class="headingPrimary">My Account</h1>
		<p>Welcome <?php global $current_user; wp_get_current_user(); ?><?php if ( is_user_logged_in() ) { $current_user->user_login . "\n"; echo '' . $current_user->display_name . "\n"; } else { wp_loginout(); } ?> <br />Here you can find an overview of your personal account and access exclusive services</p>
	</div>
	<div class="row myAccountLinksList">
		<div class="col-md-9">
			<h4 class="headingPrimary">Wishlist</h4>
			<p>Save the items you want, ready for your next order or as a perfect gift suggestion.</p>
		</div>
		<div class="col-md-3">
			<a href="#" class="btn btn-primary btn-lg">Go to Wishlist</a>
		</div>
	</div>
	<div class="row myAccountLinksList">
		<div class="col-md-9">
			<h4 class="headingPrimary">Orders</h4>
			<p>Save the items you want, ready for your next order or as a perfect gift suggestion.</p>
		</div>
		<div class="col-md-3">
			<a href="<?php printf (esc_url( wc_get_endpoint_url( 'orders' ) )); ?>" class="btn btn-primary btn-lg">Go to Orders</a>
		</div>
	</div>
	<div class="row myAccountLinksList">
		<div class="col-md-9">
			<h4 class="headingPrimary">Profile</h4>
			<p>Save the items you want, ready for your next order or as a perfect gift suggestion.</p>
		</div>
		<div class="col-md-3">
			<a href="<?php printf (esc_url( wc_get_endpoint_url( 'edit-account' ) )); ?>" class="btn btn-primary btn-lg">Go to Profile</a>
		</div>
	</div>
	<div class="row myAccountLinksList">
		<div class="col-md-9">
			<h4 class="headingPrimary">Saved Cards</h4>
			<p>Save the items you want, ready for your next order or as a perfect gift suggestion.</p>
		</div>
		<div class="col-md-3">
			<a href="#" class="btn btn-primary btn-lg">Go to Saved Cards</a>
		</div>
	</div>
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */


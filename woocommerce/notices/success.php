<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

?>

<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-message" role="alert">
		<div class="successMsgText">
			<?php
				echo wc_kses_notice( $message );
			?>
			<div class="successMsgBtns">
				<a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-primary btn-lg">View Bag</a>
				<a href="<?php echo get_option('home'); ?>" class="btn btn-primary btn-lg continueShoppingBtn">Continue</a>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

<!-- resetPasswordModal -->
<div class="modal fade modalNoOverlay in" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block;">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    			<a href="<?php echo get_option('home'); ?>/my-account" class="closeAnchorinButton">
	    			<span aria-hidden="true"></span>
	    		</a>
    		</button>
      		<div class="modal-body">
      			<div class="modalCard loginPageModalCard registerPageModalCard">
      				<div class="text-center">
						<h3 class="headingPrimary">Lost Password</h3>
						<div class="space15"></div>
						<p>Create a new password for your account.</p>
						<div class="space5"></div>
					</div>
					<div class="col-md-offset-2 col-md-8">						
						<form method="post" class="woocommerce-ResetPassword lost_reset_password">
							<?php // @codingStandardsIgnoreLine ?>
							<input placeholder="New Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" />
							<input placeholder="Confirm Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password" />
							<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
							<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />
							<div class="clear"></div>
							<?php do_action( 'woocommerce_resetpassword_form' ); ?>
							<input type="hidden" name="wc_reset_password" value="true" />
							<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Change Password', 'woocommerce' ); ?>"><?php esc_html_e( 'Change Password', 'woocommerce' ); ?></button>
							<div class="space15"></div>
							<a href="<?php echo get_option('home'); ?>/my-account">Log in</a>
							<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>
						</form>
					</div>
      			</div>
      		</div>
    	</div>
  	</div>
</div>

<?php
do_action( 'woocommerce_after_reset_password_form' );


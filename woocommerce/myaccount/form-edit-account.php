<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="myAccountDashboard">
	<div class="myaccHead">
		<h1 class="headingPrimary">My Account</h1>
		<p>Store your shipping and billing addresses to speed up checkout.<br />
		The address you mark as "Favourite" will be already filled in for you when you place a new order.</p>
	</div>

	<!-- customMyAccEdit -->
	<form class="customMyAccEdit row woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
		<div class="col-md-2">
			<div class="formFieldmyAccount">
				<label for="">Title</label>
				<div class="formFieldmyAccountSelect">
					<i class="fa fa-chevron-down"></i>
					<select>
						<option>Ms.</option>
						<option>Mrs.</option>
						<option>Mr.</option>
						<option>Dr.</option>
					</select>
				</div>
			</div>
		</div>
		<div class="clear col-md-11">
			<div class="formFieldmyAccount">
				<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			</div>
		</div>
		<div class="clear col-md-11">
			<div class="formFieldmyAccount">
				<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</div>
		</div>
		<div class="clear col-md-11">
			<div class="formFieldmyAccount">
			<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
			</div>
		</div>		
		<div class="clear col-md-11">
			<div class="formFieldmyAccount">
				<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
			</div>
		</div>
		<div class="clear col-md-5">
			<div class="formFieldmyAccount">
				<label><?php esc_html_e( 'City', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input input-text" name="" id="" autocomplete="" value="Abu Dhabi" />
			</div>
		</div>
		<div class="col-md-3">
			<div class="formFieldmyAccount">
				<label><?php esc_html_e( 'Postcode', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input input-text" name="" id="" autocomplete="" value="1234" />
			</div>
		</div>
		<div class="clear col-md-5">
			<div class="formFieldmyAccount">
				<label><?php esc_html_e( 'Country', 'woocommerce' ); ?></label>
				<div class="formFieldmyAccountSelect">
					<i class="fa fa-chevron-down"></i>
					<select>
						<option>United Arab Emirates</option>
						<option>Saubi Arabia</option>
						<option>India</option>
						<option>Qatar</option>
						<option>Bahrain</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="formFieldmyAccount">
				<label><?php esc_html_e( 'Emirate', 'woocommerce' ); ?></label>
				<div class="formFieldmyAccountSelect">
					<i class="fa fa-chevron-down"></i>
					<select>
						<option>Abu Dhabi</option>
						<option>Dubai</option>
						<option>Sharjah</option>
						<option>Ajman</option>
						<option>Ras Al Khaimah</option>
					</select>
				</div>
			</div>
		</div>
		<div class="clear col-md-6">
			<div class="formFieldmyAccount">
				<label><?php esc_html_e( 'Phone', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input input-text" name="" id="" autocomplete="" value="+971" />
			</div>
		</div>
		<div class="clear col-md-11">
			<div class="formFieldmyAccount">
			<?php //esc_html_e( 'Password change', 'woocommerce' ); ?>			
				<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
			</div>
		</div>
		<div class="clear col-md-11">
			<div class="formFieldmyAccount">
				<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
			</div>
		</div>
		<div class="clear col-md-11">
			<div class="formFieldmyAccount">
				<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
			</div>
		</div>
		<div class="clear col-md-6">
			<div class="checkboxLabel">
				<label for="check1">
					<input type="checkbox" name="checklabel" id="check1" /><span></span>
					Preferred shipping address
				</label>
			</div>
			<div class="checkboxLabel">
				<label for="check2">
					<input type="checkbox" name="checklabel" id="check2" /><span></span>
					Preferred billing address
				</label>
			</div>
		</div>
		<div class="space20"></div>
		<?php do_action( 'woocommerce_edit_account_form' ); ?>
		<div class="clear col-md-11">
			<div class="formFieldmyAccount formFieldmyAccountButtons">
				<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
				<a href="#" class="btn btn-default btn-lg">Cancel</a>
				<button type="submit" class="btn btn-primary btn-lg" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
				<input type="hidden" name="action" value="save_account_details" />
			</div>
		</div>
		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	</form>
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>

<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">

<?php endif; ?>

	<!-- loginPageSection -->
	<div class="loginPageSection">
		<div class="text-center">
			<h2 class="headingPrimary loginHeading"><?php esc_html_e( 'Account', 'woocommerce' ); ?></h2>
		</div>
		<div class="container loginPageContainer">
			<div class="row">
				<div class="col-md-6">
					<div class="loginCol">
						<h3 class="headingPrimary headingPrimaryNouppercase">FLEURDELIS Member?</h3>
						<a href="#" data-toggle="modal" data-target="#loginModal" class="btn btn-primary btn-lg">Login</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="loginCol">
						<h3 class="headingPrimary headingPrimaryNouppercase">New to FLEURDELIS?</h3>
						<a href="#" data-toggle="modal" data-target="#registrationModal" class="btn btn-primary btn-lg">Register</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- End of loginPageSection -->

	<!-- loginModal -->
	<div class="modal fade modalNoOverlay" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
	      		<div class="modal-body">
	      			<div class="modalCard loginPageModalCard">
	      				<div class="text-center">
							<h3 class="headingPrimary">Login</h3>
							<div class="space15"></div>
							<p>Please fill in your information below</p>
							<div class="space5"></div>
						</div>
	      				<form class="col-md-offset-2 col-md-8" method="post">
							<?php do_action( 'woocommerce_login_form_start' ); ?>
							<input placeholder="Username" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							<input placeholder="Password" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
							<?php do_action( 'woocommerce_login_form' ); ?>
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
							<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
							<div class="space15"></div>
							<!-- <a href="<?php //echo esc_url( wp_lostpassword_url() ); ?>"><?php //esc_html_e( 'Forgot password?', 'woocommerce' ); ?></a> -->
							<a href="<?php echo get_option('home'); ?>/my-account/lost-password">Forgot password?</a>
							<?php do_action( 'woocommerce_login_form_end' ); ?>
						</form>
	      			</div>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<!-- registrationModal -->
	<div class="modal fade modalNoOverlay" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
	      		<div class="modal-body">
	      			<div class="modalCard loginPageModalCard registerPageModalCard">
	      				<div class="text-center">
							<h3 class="headingPrimary">Create Account</h3>
							<div class="space15"></div>
							<p>New to FLEURDELIS? Please create your account.</p>
							<div class="space5"></div>
						</div>
						<div class="col-md-offset-2 col-md-8">
							<?php echo do_shortcode( '[user_registration_form id="132"]' ); ?>
						</div>
	      			</div>
	      		</div>
	    	</div>
	  	</div>
	</div>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="u-column2 col-2">

		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

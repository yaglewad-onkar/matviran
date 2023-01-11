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
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">
	<div class="u-column1 col-1">

	<?php endif; ?>
		<div class="vc_row">
			<div class="vc_col-lg-12 woo-c_login">
				<div class="ohio-tabs-sc tab" data-ohio-tab-box="true">
					<div class="tabNav_wrapper">
						<ul class="tabNav <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'no' ){ echo single;}?>" role="tablist">
							<li class="tabNav_line brand-bg-color"></li>

							<li class="tabNav_link active second-title text-left font-titles">
								<?php esc_html_e( 'Sign In', 'ohio' ); ?>
							</li>

							<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) { ?>
								<li class="tabNav_link title text-left font-titles">
									<?php esc_html_e( 'Sign Up', 'ohio' ); ?>
								</li>
							<?php } ?>
						</ul>
					</div>

					<div class="tabItems" role="tabpanel">
						<div class="tabItems_item active" data-title="<?php esc_html_e( 'Sign In', 'ohio' ); ?>">
							<form class="woocommerce-form woocommerce-form-login login" method="post">
								<fieldset>
									<?php do_action( 'woocommerce_login_form_start' ); ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="username"><?php esc_html_e( 'Username or email address', 'ohio' ); ?>&nbsp;<span class="required">*</span></label>
										<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									</p>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="password"><?php esc_html_e( 'Password', 'ohio' ); ?>&nbsp;<span class="required">*</span></label>
										<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
									</p>

									<?php do_action( 'woocommerce_login_form' ); ?>

									<p class="form-row">
										<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
										<div class="form-row_btn_remember_container">
											<label for="rememberme" class="inline">
												<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'ohio' ); ?>
											</label>
											<a class="lost-link" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'ohio' ); ?></a>
										</div>
										<button type="submit" class="btn woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Sign In', 'ohio' ); ?>"><?php esc_html_e( 'Sign In', 'ohio' ); ?> <i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
											
										</button>
									</p>

									<?php do_action( 'woocommerce_login_form_end' ); ?>
								<fieldset>
							</form>
						</div>

						<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
							<div class="tabItems_item" data-title="<?php esc_html_e( 'Registration', 'ohio' ); ?>">
								<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
									<fieldset>	
										<?php do_action( 'woocommerce_register_form_start' ); ?>

										<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
												<label for="reg_username"><?php esc_html_e( 'Username', 'ohio' ); ?>&nbsp;<span class="required">*</span></label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
											</p>

										<?php endif; ?>

										<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
											<label for="reg_email"><?php esc_html_e( 'Email address', 'ohio' ); ?>&nbsp;<span class="required">*</span></label>
											<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
										</p>

										<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
												<label for="reg_password"><?php esc_html_e( 'Password', 'ohio' ); ?>&nbsp;<span class="required">*</span></label>
												<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
											</p>

										<?php else : ?>

											<div><?php esc_html_e( 'A password will be sent to your email address.', 'ohio' ); ?></div>

										<?php endif; ?>

										<?php do_action( 'woocommerce_register_form' ); ?>

										<p class="woocommerce-form-row form-row">
											<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
											<button type="submit" class="btn woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'ohio' ); ?>"><?php esc_html_e( 'Sign Up', 'ohio' ); ?> <i class="ion-right ion"><svg class="arrow-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i></button>
										</p>
									<fieldset>

									<?php do_action( 'woocommerce_register_form_end' ); ?>
								</form>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

 ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>


<?php endif; ?>

		<h1 class="modal-login-title">Вход</h1>

		<form onsubmit="deleteName();" id="login_form" class="woocommerce-form woocommerce-form-login login" method="post">

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<input type="text" class="modal-input modal-login-input-email woocommerce-Input woocommerce-Input--text input-text" placeholder="email" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				<p class="error-parag"> <label id="log_email-error" class="error" for="username" style="display: none;"></label> </p>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wideform-row form-row-wide">
				<input class="modal-login-password-input modal-input  modal-input-mt woocommerce-Input woocommerce-Input--text input-text" placeholder="пароль" type="password"  name="password" id="password" autocomplete="current-password" />
				<p class="error-parag"> <label id="log_password-error" class="error" for="password" style="display: none;"></label> </p>
			</p>

			
			<div class="login-btn-and-memory-block">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<label class="b-contain woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<span class="memory-span" >Запомнить меня</span>
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
					<div class="b-input"></div>
				</label>
				<button type="submit" class="input-login-submit woocommerce-button button vz-button woocommerce-form-login__submit" id="login-submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">Авторизация</button>
				
			</div>	

			
			<!-- </p> -->
			<p class="lost-pass-parag woocommerce-LostPassword lost_password">
				<a class="lost-password-link" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

		</form>

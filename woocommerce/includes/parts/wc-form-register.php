<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>




    <h1 class="modal-login-title">Регистрация</h1>

    <form onsubmit="deleteName();" method="post" id="reg_form" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

        <p>
            <input type="text" name="first_name" id="first_name" class="modal-input modal-reg-input-firstname" placeholder="имя" value="" size="25" />
            <p id="name_error_parag" class="error-parag">  <label id="name_error" class="error" for="first_name" style="display: none;"></label> <span id="incorrect_name_error" style="font-family: 'Raleway'; font-size: 14px; color:red;"></span> </p>
        </p>
        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <input type="text" class="modal-input modal-input-mb modal-reg-input-name woocommerce-Input woocommerce-Input--text input-text" placeholder="имя" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>

        <?php endif; ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="email" class="modal-input modal-input-mt modal-reg-input-email woocommerce-Input woocommerce-Input--text input-text" placeholder="email"  name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            <p class="error-parag"> <label id="reg_email-error" class="error" for="reg_email" style="display: none;"></label> </p>
        </p>

        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <input type="password" class="modal-input modal-input-mt modal-reg-input-pass woocommerce-Input woocommerce-Input--text input-text" placeholder="пароль"  name="password" id="reg_password" autocomplete="new-password" />
                <p class="error-parag">  <label id="reg_password-error" class="error" for="reg_password" style="display: none;"></label> </p>
            </p>

        <?php else : ?>

            <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

        <?php endif; ?>
            <p>
                <input class="modal-input modal-input-mt" name="rep_password" id="reg_repeat_password" type="password" placeholder="повторите пароль">
                <p class="error-parag"> <label id="reg_repeat_password-error" class="error" for="reg_repeat_password" style="display: none;"></label> </p>
            </p>
        


        <div class="accepting-block">
            <div class="terms-of-use-block">
                <label  class="b-contain terms-of-use-checkbox">
                    <input type="checkbox" id="terms-of-use-check">
                    <div class="b-input"></div>
                </label>
                <p class="terms-of-use-accept-text accept-span">Я согласен с <a target="_blank" class="terms-of-use-accept-link accept-link" href="/terms-of-use">пользовательским соглашением</a></p>
            </div>
            <div class="private-privacy-block">
                <label class="b-contain">
                    <input id="private-privacy-check" type="checkbox">
                    <div class="b-input"></div>
                </label> <a href=""></a>
                <p class="private-privacy-text accept-span">Я согласен на <a target="_blank" class="private-privacy-link accept-link" href="/private-policy">обработку моих персональных данных</a></p>
            </div>
        </div>

        <p class="woocommerce-form-row form-row " style="display: flex; justify-content: flex-end;">
            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <button type="submit" class="input-login-submit woocommerce-Button woocommerce-button button vz-button woocommerce-form-register__submit" id="register-submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">Регистрация</button>
        </p>

    </form> 
<?php endif; ?>
<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vegazona
 */

defined( 'ABSPATH' ) || exit;
?>
    <div class="modal-window-password-background">
        <div class="modal-password-window">
            <button class="change-pass-close">&times</button>
            <h1 class="modal-password-title"><?php esc_html_e( 'Password change', 'woocommerce' ); ?></h1>
            <fieldset class="modal-password-form">
                <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide modal-password-field-for-frst-parag">
                    <input type="password" class="modal-password-fields woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" placeholder="Введите текущий пароль" />
                </div>
                <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <input type="password" class="modal-password-fields woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" placeholder="Введите новый пароль" />
                    <p class="error-parag" style="display: block;"> <label id="password_1-error " class="error" for="password_1" style="display: none;"></label></p> 

                </div>
                <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide modal-password-field-for-last-parag">
                    <input type="password" class="modal-password-fields woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" placeholder="Повторите пароль"/>
                    <p class="error-parag" style="display: block;"> <label id="password_2-error " class="error" for="password_2" style="display: none;"></label></p>
                </div>
                <div class="modal-password-mt-for-btn">
                    <button type="submit" class="woocommerce-Button button vz-button modal-password-submit-button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">Изменить</button>
                    <input type="hidden" name="action" value="save_account_details" />
                </div>
            </fieldset>
        </div>
    </div>    
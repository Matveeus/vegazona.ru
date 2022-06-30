<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vegazona
 */

 $user = wp_get_current_user();

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>
<div class="private-area_right-side">
    <h1 class="private-area_head">Личная информация</h1>
    <?php wc_print_notices(); ?>
    <form class="woocommerce-EditAccountForm edit-account" id="edit_acc_form" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

    <div class="private-area_name-surname">
        <div>
            <p class="private-area_label-for-input woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                Имя*
                <input type="text" class="private-area_inputs woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
                <p class="error-parag" style="display: block;"> <label id="account_first_name-error" class="error" for="account_first_name" style="display: none;"></label> </p>      
            </p>
        </div>
        <div>
            <p class="private-area_label-for-input woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                Фамилия
                <input type="text" class="private-area_inputs woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
                <p class="error-parag" style="display: block;"> <label id="account_last_name-error" class="error" for="account_last_name" style="display: none;"></label> </p> 
            </p>
        </div>
    </div>

    <div class="private-area_email-phone">
        <div>
            <p class="private-area_label-for-input">
                Email*
                <input type="email" class="private-area_inputs woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                <p class="error-parag" style="display: block;"> <label id="account_email-error" class="error" for="account_email" style="display: none;"></label> </p> 
            </p>
        </div>    
        <div>
            <p class="private-area_label-for-input">
                Телефон
                <input name="account_phone" id="account_phone" class="private-area_inputs" type="text" placeholder="+7 (___) ___-__-__" value="<?php echo esc_attr( $user->billing_phone ); ?>">
                <p class="error-parag" style="display: block;"> <label id="account_phone-error" class="error" for="account_phone" style="display: none;"></label> </p> 
            </p>
        </div> 
    </div>

    <?php get_template_part( 'template-parts/my-account-parts/content', 'account-changepass-modal' ); ?>
      

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

    <p>
        <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
            <input class="private-area_change-password_button" id="change_password" type="button" value="Изменить пароль" >
        
        <button type="submit" class="woocommerce-Button button vz-button private-area_save-changes" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">Сохранить</button>
        <input type="hidden" name="action" value="save_account_details" />
    </p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

    </form>
    
</div>
<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
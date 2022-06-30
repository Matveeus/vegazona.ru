<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vegazona
 */

?>

<div class="modal-window">
    <div class="modal-container">
        <div class="modal-registration">
            <?php wc_print_notices(); ?>
            <button class="modal-registration-close"></button>
            <div class="modal-inner-block">
                <div class="modal-login-select-headers">
                    <h2 class="modal-login-select-header modal-login-selected">Вход</h2>
                    <h2 class="modal-login-select-header">Регистрация</h2>
                </div>
                <div class="modal-login-block">
                    <?php get_template_part( 'woocommerce/includes/parts/wc-form' , 'login' ); ?>
                </div>
                <div class="modal-register-block">
                    <?php get_template_part( 'woocommerce/includes/parts/wc-form' , 'register' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
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


<div class="profile-nav">
    <table class="navigation-tab">
        <tr>
            <td>
                <div class="profile-nav-pages" id="my_account1">
                    <a id="my_account_main_link" href="/my-account" class="profile-nav-pages_text">Личная информация</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="profile-nav-pages">
                    <a id="my_account_my_address_link" href="/my-account/edit-address" class="profile-nav-pages_text">Мои адреса</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="profile-nav-pages">
                    <a id="my_account_wishlist_link" href="/my-account/wishlist/" class="profile-nav-pages_text">Избранное</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="profile-nav-pages">
                    <a id="my_account_history_link" href="/my-account/orders/" class="profile-nav-pages_text">История покупок</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="profile-nav-pages">
                    <a id="my_account_bonus_link" href="" class="profile-nav-pages_text">Бонусы</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="profile-nav-pages">
                    <a id="my_account_log_out_link" href="<?php echo wp_logout_url( home_url() ); ?>" class="profile-nav-pages_text">Выйти</a>
                </div>
            </td>
        </tr>
    </table>
</div>
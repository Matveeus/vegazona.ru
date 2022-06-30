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


    <div class="private-area_right-side">
        <h1 class="private-area_head"><?php echo single_post_title() ?></h1>
        <div class="order-history_info-card_block">
            <div class="order-history_info-card">
                <h1 class="order-history_info-card-title">Заказ №001</h1>
                <img class="icon-for_order-history-card icon-for_order-history-card_vagon" src="<?php echo get_template_directory_uri();?>/assets/image/in-process(order-history).svg" alt="">
                <p  class="order-history-card_status order-history-card_status-yellow" >Доставляется</p>
                <div class="order-history-card-price_block">
                    <p class="order-history-card_overall">Итого:</p>
                    <p class="order-histoty-card_price">1777.99</p>
                    
                </div>
                <button class="order-histoty-card_all-info_button">Подробнее</button>
            </div>
            <div class="order-history_info-card">
                <h1 class="order-history_info-card-title">Заказ №002</h1>
                <img class="icon-for_order-history-card" src="<?php echo get_template_directory_uri();?>/assets/image/delivered(order-history).svg" alt="">
                <p class="order-history-card_status order-history-card_status-green">Доставлено</p>
                <div class="order-history-card-price_block">
                    <p class="order-history-card_overall">Итого:</p>
                    <p class="order-histoty-card_price">1777.99</p>
                    
                </div>
                <button class="order-histoty-card_all-info_button">Подробнее</button>
            </div>
            <div class="order-history_info-card">
                <h1 class="order-history_info-card-title">Заказ №003</h1>
                <img class="icon-for_order-history-card " src="<?php echo get_template_directory_uri();?>/assets/image/processing(order-history).svg" alt="">
                <p class="order-history-card_status order-history-card_status-red">Обрабатывается</p>
                <div class="order-history-card-price_block">
                    <p class="order-history-card_overall">Итого:</p>
                    <p class="order-histoty-card_price">1777.99</p>
                    
                </div>
                <button class="order-histoty-card_all-info_button">Подробнее</button>
            </div>
            <div class="order-history_info-card">
                <h1 class="order-history_info-card-title">Заказ №004</h1>
                <img class="icon-for_order-history-card" src="<?php echo get_template_directory_uri();?>/assets/image/delivered(order-history).svg" alt="">
                <p class="order-history-card_status order-history-card_status-green">Доставлено</p>
                <div class="order-history-card-price_block">
                    <p class="order-history-card_overall">Итого:</p>
                    <p class="order-histoty-card_price">1777.99</p>
                    
                </div>
                <button class="order-histoty-card_all-info_button">Подробнее</button>
            </div>
        </div>
    </div>


       
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
            <div class="bonus_discount-point_section">
                <div class="bonus_discount_block">
                    <div class="bonus_card-whole-img">
                        <img class="card_bonus_img" src="/image/no_discount(bonus).svg" alt="">
                        <div class="bonus_usernumber_block">
                            <h2>#</h2>
                            <h2 class="bonus_user-number_card">11</h2>
                        </div>
                        <p class="bonus_how-many-to-spand">
                            Закажите продукты в нашем интернет-магазине еще на <span>5700</span> рублей, чтобы получить <span>серебряную</span> скидочную карту
                        </p>
                    </div> 
                </div>
                <div class="bonus_vegapoints_section">
                    <div class="bonus_points_block">
                        <h1 class="bonus_point_title">VegaPoints:</h1>
                        <p class="bonus_number-of-vegapoints">420</p>
                        <img src="/image/vegapoint(bonus).svg" alt="">
                    </div>
                    <p class="bonus_vegapoints_info">Используйте VegaPoints чтобы оплатить до 50% заказа</p>
                </div>
            </div>
        </div>

<?php
/**
 * Template name: Доставка
 */

get_header();
?>
<div class="entry-content">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
        <h1 class="page-title">Доставка</h1>
        <div class="delivery-section">
              <h2 class="delivery-options-header">Доставка осуществляется по Москве и Московскому району.</h2>
              <h3 class="delivery-option-title">Доставка заказа по Москве в пределах МКАД</h3>
              <p class="delivery-option-description">
                  К доставке принимаются заказы на сумму <span class="green-text-delivery">от 500 рублей</span>;
                  При заказе на сумму <span class="green-text-delivery">от 500 до 1000 рублей</span> стоимость доставки — <span class="green-text-delivery">300 рублей</span>;
                  При заказе на сумму <span class="green-text-delivery">от 1000 рублей</span> и более доставка — <span class="green-text-delivery">БЕСПЛАТНАЯ</span>;
              </p>
              <h3 class="delivery-option-title">Доставка загород в радиусе 20 км от МКАД:</h3>
              <p class="delivery-option-description">К доставке принимаются заказы на сумму <span class="green-text-delivery">от 1000 рублей</span>;
                  При заказе на сумму <span class="green-text-delivery">от 1000 до 1500 рублей</span> стоимость доставки — <span class="green-text-delivery">300 рублей</span>;
                  При заказе на сумму <span class="green-text-delivery">от 1500 рублей</span> и более доставка — <span class="green-text-delivery">БЕСПЛАТНАЯ</span>;
              </p>
              <h3 class="delivery-option-title">Доставка загород по Московскому району (20-30 км от МКАД):</h3>
              <p class="delivery-option-description third-option">
                  К доставке принимаются заказы на сумму <span class="green-text-delivery">от 3000 рублей</span>. Стоимость доставки — <span class="green-text-delivery">БЕСПЛАТНАЯ;</span>
              </p>
              <h3 class="delivery-option-title">Время доставки:</h3>
              <p class="delivery-time">понедельник — пятница: с 18:00 до 22:00;<br>суббота — воскресенье: выходной.</p>
              <p class="delivery-more-info">
                  Точное время доставки определяет курьер в зависимости от маршрута.
                  Доставка по указанному адресу обязывает покупателя находиться на месте в согласованное накануне время. Время ожидания курьером покупателя — 15 минут.
                  Предварительно, перед выездом на указанный адрес, курьер свяжится с Вами и сообщит время доставки.
              </p>
          </div>
    </div>
</div>
<?php

get_footer();

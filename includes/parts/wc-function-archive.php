<?php

add_filter('woocommerce_product_loop_title_classes', 'vz_add_class_loop_item_title');

function vz_add_class_loop_item_title (){
    $classes = 'product-item-content__title';
    return $classes;
}

add_filter('post_class', 'vz_add_class_loop_item');

function vz_add_class_loop_item ( $classes ){
    if(is_shop()){
        $classes[] = 'product-item-content';
    }
    return $classes;
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 );
function wpa83367_price_html( $price, $product ){
    if ( '' === $product->get_price() ) {
        $price = apply_filters( 'woocommerce_empty_price_html', '', $product );
    } elseif ( $product->is_on_sale() ) {
        $price = wc_format_sale_price( wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price() ) ), wc_get_price_to_display( $product ) ) . $product->get_price_suffix();
    } else {
        $price = '<div class="item-actual-price">' . wc_price( wc_get_price_to_display( $product ) ) . $product->get_price_suffix() . '</div>';
    }
    return $price;
}

add_filter('woocommerce_format_sale_price', 'ss_format_sale_price', 100, 3);
function ss_format_sale_price( $price, $regular_price, $sale_price ) {
    $output_ss_price = '<p class="item-actual-price">' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</p> <p class="item-previous-price">' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</p>';
    return $output_ss_price;
}

function change_view_cart( $params, $handle )
{
    switch ($handle) {
        case 'wc-add-to-cart':
            $params['i18n_view_cart'] = ""; //chnage Name of view cart button
            $params['cart_url'] = ""; //change URL of view cart button
            break;
    }
    return $params;
}
add_filter( 'woocommerce_get_script_data', 'change_view_cart',10,2 );

//change product thumbnail size
add_filter( 'woocommerce_get_image_size_thumbnail', 'vz_custom_thumbnail_size', 10, 1 );
function vz_custom_thumbnail_size( $size ){
    return array(
        'width'  => 0,
        'height' => 0,
        'crop'   => false,
    );
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );



add_filter( 'woocommerce_pagination_args', 	'vz_woocommerce_pagination', 10 );

//unset default pagination arrows
function vz_woocommerce_pagination( $args ) {

    $args['prev_text'] = '';
    $args['next_text'] = '';

    return $args;
}

//print products on sale for sale slider
function getSaleProducts() {
    $sale_products_ids = wc_get_product_ids_on_sale();
    $count = sizeof($sale_products_ids) % 2 === 0 ? sizeof($sale_products_ids) : sizeof($sale_products_ids)-1;
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $count,
        'meta_query'     => array(
            'relation' => 'OR',
            array( // Simple products type
                'key'           => '_sale_price',
                'value'         => 0,
                'compare'       => '>',
                'type'          => 'numeric'
            ),
            array( // Variable products type
                'key'           => '_min_variation_sale_price',
                'value'         => 0,
                'compare'       => '>',
                'type'          => 'numeric'
            ),
            array( // Variable products type
                'key'           => '_min_variation_sale_price',
                'value'         => 0,
                'compare'       => '>',
                'type'          => 'numeric'
            )
        )
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();

            wc_get_template_part( 'content', 'product' );

        endwhile;
    } else {
        return false;
    }

    return true;
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'vz_sort_by_stock', 9999 );

function vz_sort_by_stock( $args ) {
    $args['orderby'] = 'meta_value';
    $args['order'] = 'ASC';
    $args['meta_key'] = '_stock_status';
    return $args;
}

function max_quantity_single( $max, $product ) {
    $stock = get_post_meta( get_the_ID(), '_stock', true );
    $max = $stock;
    return $max;
}
add_filter( 'woocommerce_quantity_input_max','max_quantity_single', 10, 2 );

remove_action( 'woocommerce_after_shop_loop_item', 'qib_quantity_field_archive', 9 );

add_action( 'woocommerce_before_cart', 'woocommerce_breadcrumb', 20, 0 );

add_action( 'woocommerce_cart_totals_before_order_total', 'vz_show_total_discount', 10 );
add_action( 'woocommerce_review_order_after_order_total', 'vz_show_total_discount', 9999 );

function vz_show_total_discount() {

    $discount_total = 0;

    foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
        $product = $values['data'];
        if ( $product->is_on_sale() ) {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            $discount = ( $regular_price - $sale_price ) * $values['quantity'];
            $discount_total += $discount;
        }
    }

    if ( $discount_total > 0 ) {
        echo '<tr><th>Скидка</th><td data-title="Скидка">' . wc_price( $discount_total + WC()->cart->get_discount_total() ) .'</td></tr>';
    }

}   

// удаление экшна на вывод уведомлений сверху старницы
remove_action( 'woocommerce_before_cart', 'woocommerce_output_all_notices', 10 );

add_action( 'woocommerce_before_cart_collaterals', 'woocommerce_output_all_notices', 20 );

remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_title', 5 );

// Добавления поля "Состав" в настройках товара
add_action( 'woocommerce_product_options_advanced', 'add_product_composition' );

function add_product_composition(){
	echo '<div class="options_group">';// Группировка полей

    woocommerce_wp_textarea_input( array(
        'id'                => '_product_composition',
        'label'             => __( 'Состав', 'woocommerce' ),
        'placeholder'       => '',
        'desc_tip'          => 'true',
        'custom_attributes' => array(),
        'description'       => __( 'Введите состав товара', 'woocommerce' ),
    ) );

    echo '</div>';
}

// Добавления поля "Пищевая ценность" в настройках товара
add_action( 'woocommerce_product_options_advanced', 'add_product_nutritional_value' );

function add_product_nutritional_value(){
	echo '<div class="options_group">';// Группировка полей

    woocommerce_wp_textarea_input( array(
        'id'                => '_product_nutritional_value',
        'label'             => __( 'Пищевая ценность', 'woocommerce' ),
        'placeholder'       => '',
        'desc_tip'          => 'true',
        'custom_attributes' => array(),
        'description'       => __( 'Введите пищевую ценность', 'woocommerce' ),
    ) );

    echo '</div>';
}

// Добавления поля "Срок годности" в настройках товара
add_action( 'woocommerce_product_options_advanced', 'add_product_expiration_date' );

function add_product_expiration_date(){
	echo '<div class="options_group">';// Группировка полей

    woocommerce_wp_text_input( array(
        'id'                => '_product_expiration_date',
        'label'             => __( 'Срок годности', 'woocommerce' ),
        'placeholder'       => '',
        'desc_tip'          => 'true',
        'custom_attributes' => array(),
        'description'       => __( 'Введите срок годности', 'woocommerce' ),
    ) );

    echo '</div>';
}

// Сохранение поля "Состав" в настройках товара
add_action( 'woocommerce_process_product_meta', 'save_product_composition', 10, 1 );

function save_product_composition( $post_id ){

    $text_field = isset( $_POST['_product_composition'] ) ? sanitize_text_field( $_POST['_product_composition'] ) : '';

    update_post_meta($post_id,'_product_composition', $text_field );

}

// Сохранение поля "Пищевая ценность" в настройках товара
add_action( 'woocommerce_process_product_meta', 'save_product_nutritional_value', 10, 1 );

function save_product_nutritional_value( $post_id ){

    $text_field = isset( $_POST['_product_nutritional_value'] ) ? sanitize_text_field( $_POST['_product_nutritional_value'] ) : '';

    update_post_meta($post_id,'_product_nutritional_value', $text_field );

}

// Сохранение поля "Срок годности" в настройках товара
add_action( 'woocommerce_process_product_meta', 'save_product_expiration_date', 10, 1 );

function save_product_expiration_date( $post_id ){

    $text_field = isset( $_POST['_product_expiration_date'] ) ? sanitize_text_field( $_POST['_product_expiration_date'] ) : '';

    update_post_meta($post_id,'_product_expiration_date', $text_field );

}


add_filter( 'wc_add_to_cart_message_html', '__return_null');


add_action( 'woocommerce_before_shop_loop', 'vz_filter_button', 5);

function vz_filter_button(){
    $button = "<div class='filter-overlay'></div><button class='product-filter-open-button'>Фильтр</button>";
    echo $button;
}

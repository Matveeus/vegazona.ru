<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; //exit if accessed directly
}

/**
 * Enqueue scripts.
 */
function vegazona_scripts() {

    if( !is_page(178) ){
        wp_enqueue_script( 'dadata-script', 'https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js', array('jquery'), null, true );
        wp_enqueue_script( 'maskedinput', get_template_directory_uri() . '/assets/js/jquery.maskedinput.min.js', array('jquery'), null, true );
        wp_enqueue_script( 'vegazona-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
        wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/carousel.js', array('jquery'), null, true );
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true );
        wp_enqueue_script( 'saleslider', get_template_directory_uri() . '/assets/js/saleslider.js', array('slick'), null, true );
        wp_enqueue_script( 'validate', get_template_directory_uri() . '/assets/js/validate.min.js', array('jquery'), null, true );
        wp_enqueue_script( 'flexslider-script', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array('jquery'), null, true );
        wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'session', 'validate'), null, true );
        wp_localize_script('main', 'php_params', ['ajaxurl'=>admin_url('admin-ajax.php')]);
        wp_enqueue_script( 'session', get_template_directory_uri() . '/assets/js/session.js', array('jquery'), null, true );
    }


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'vegazona_scripts' );

/**
 * Enqueue styles.
 */
function vegazona_styles() {
    global $post;
    $page_id = $post->ID;

    wp_enqueue_style( 'vegazona-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'vegazona-style', 'rtl', 'replace' );
    wp_enqueue_style( 'vegazona-style-media', get_template_directory_uri() . '/assets/css/media/style-media.css' );

    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
    wp_enqueue_style( 'check', get_template_directory_uri() . '/assets/css/check.css' );
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/css/flexslider.css' );
    wp_enqueue_style( 'modal-registration', get_template_directory_uri() . '/assets/css/modal-registration.css' );
    wp_enqueue_style( 'modal-registration-media', get_template_directory_uri() . '/assets/css/media/modal-registration-media.css' );
    wp_enqueue_style( 'product-modal-style', get_template_directory_uri() . '/assets/css/product-modal.css' );
    wp_enqueue_style( '404-page-style', get_template_directory_uri() . '/assets/css/404.css' );
    wp_enqueue_style( 'saleslider-media', get_template_directory_uri() . '/assets/css/media/123.css' );

    if( is_shop() ){
        wp_enqueue_style( 'products-style', get_template_directory_uri() . '/assets/css/products-style.css' );
        wp_enqueue_style( 'product-filter-style', get_template_directory_uri() . '/assets/css/product-filter-style.css' );
        wp_enqueue_style( 'products-style-media', get_template_directory_uri() . '/assets/css/media/products-style-media.css' );
        wp_enqueue_style( 'product-filter-style-media', get_template_directory_uri() . '/assets/css/media/product-filter-style-media.css' );
        wp_enqueue_style( 'wishlist-style', get_template_directory_uri() . '/assets/css/wishlist-style.css' );
    }

    switch ($page_id) {
        case 14: //Главная
            wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main-page-style.css' );
            wp_enqueue_style( 'main-style-media', get_template_directory_uri() . '/assets/css/media/main-page-style-media.css' );
            wp_enqueue_style( 'slider', get_template_directory_uri() . '/assets/css/slider.css' );
            wp_enqueue_style( 'saleslider-style', get_template_directory_uri() . '/assets/css/saleslider.css' );
            wp_enqueue_style( 'products-style', get_template_directory_uri() . '/assets/css/products-style.css' );
            wp_enqueue_style( 'products-style-media', get_template_directory_uri() . '/assets/css/media/products-style-media.css' );
            wp_enqueue_style( 'wishlist-style', get_template_directory_uri() . '/assets/css/wishlist-style.css' );
            break;
        case 30: //Акции
            break;
        case 32: //Доставка
            wp_enqueue_style( 'delivery-style', get_template_directory_uri() . '/assets/css/delivery.css' );
            wp_enqueue_style( 'delivery-style-media', get_template_directory_uri() . '/assets/css/media/delivery-media.css' );
            break;
        case 7: //Корзина
            wp_enqueue_style( 'cart-style', get_template_directory_uri() . '/assets/css/cart-section.css' );
            wp_enqueue_style( 'cart-style-media', get_template_directory_uri() . '/assets/css/media/cart-section-media.css' );
            break;
        case 9: //Личный кабинет и мои адреса
            wp_enqueue_style( 'p-area', get_template_directory_uri() . '/assets/css/p_area-page1.css' );
            wp_enqueue_style( 'change-pass', get_template_directory_uri() . '/assets/css/modal-password.css' );
            wp_enqueue_style( 'change-address-form', get_template_directory_uri() . '/assets/css/change-address-form.css' );
            wp_enqueue_style( 'my-address', get_template_directory_uri() . '/assets/css/my-address-page2.css' );
            wp_enqueue_style( 'dadata-style', get_template_directory_uri() . '/assets/css/dadata-style.css' );

            wp_enqueue_style( 'p-area-media', get_template_directory_uri() . '/assets/css/media/p_area-page1-media.css' );
            wp_enqueue_style( 'my-address-media', get_template_directory_uri() . '/assets/css/media/my-address-page2-media.css' );
            break;
        case 92: //Список желаний
            wp_enqueue_style( 'p-area', get_template_directory_uri() . '/assets/css/p_area-page1.css' );
            wp_enqueue_style( 'p-area-media', get_template_directory_uri() . '/assets/css/media/p_area-page1-media.css' );

            wp_enqueue_style( 'wishlist-style', get_template_directory_uri() . '/assets/css/wishlist-style.css' );
            wp_enqueue_style( 'wishlist-style-media', get_template_directory_uri() . '/assets/css/media/wishlist-style-media.css' );
            wp_enqueue_style( 'products-style', get_template_directory_uri() . '/assets/css/products-style.css' );
            break;
        case 34: //О нас
            wp_enqueue_style( 'about-us-page-style', get_template_directory_uri() . '/assets/css/about-us.css' );
            wp_enqueue_style( 'about-us-page-style-media', get_template_directory_uri() . '/assets/css/media/about-us-page-style-media.css' );
            break;
        case 57: //Опт

            break;
        case 8: //Оформление заказа

            break;
        case 59: //Политика конфиденциальности
            wp_enqueue_style( 'terms-of-use-page-style', get_template_directory_uri() . '/assets/css/terms-of-use.css' );
            break;
        case 61: //Пользовательское соглашение
            wp_enqueue_style( 'terms-of-use-page-style', get_template_directory_uri() . '/assets/css/terms-of-use.css' );
            break;
    }

    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wc-block-style' );
    wp_dequeue_style( '	wc-block-vendors-style' );
    wp_dequeue_style( 'woocommerce-inline' );
    wp_dequeue_style( 'vegazona-woocommerce-style' );
    wp_dequeue_style( 'prefix-font-awesome' );

}
add_action( 'wp_enqueue_scripts', 'vegazona_styles' );

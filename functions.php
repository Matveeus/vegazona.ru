<?php

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( get_template_directory() . '/includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields' , 'vegazona_register_custom_fields');
function vegazona_register_custom_fields() {
	require get_template_directory() . '/includes/custom-fields-options/theme-options.php';
	require get_template_directory() . '/includes/custom-fields-options/metabox.php';
}


//Подключение настроек темы
require get_template_directory() . '/includes/theme-settings.php';

//Подключение виджетов
require get_template_directory() . '/includes/widget-areas.php';

//Подключение стилей и скриптов
require get_template_directory() . '/includes/enqueue-script-style.php';

//Подключение настроек продуктов
require get_template_directory() . '/includes/parts/wc-function-archive.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
}


function extra_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
	}
add_filter( 'upload_mimes', 'extra_mime_types' );



//Добавление нового поля регистрации

add_action( 'user_register', 'myplugin_user_register' );
    function myplugin_user_register( $user_id ) {
        if ( ! empty( $_POST['first_name'] ) ) {
            update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
        }
//        add_user_meta( $user_id, '$meta_key', $meta_value, true );
}



add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {

	if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
		$errors->add( 'first_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'mydomain' ) );
	}
	return $errors;
}

add_action( 'woocommerce_save_account_details', 'save_favorite_color_account_details', 12, 1 );
function save_favorite_color_account_details( $user_id ) {

	if ( ! empty( $_POST['account_phone'] ) ) {
        update_user_meta( $user_id, 'billing_phone', trim( $_POST['account_phone'] ) );
    }
}


add_filter( 'woocommerce_save_account_details_required_fields' , 'woo_save_account_details_required_fields' );
	function woo_save_account_details_required_fields( $required_fields ) {
	unset($required_fields['account_last_name']);
	unset($required_fields['account_display_name']);
	return $required_fields;
}

function true_remove_default_widget() {
	unregister_widget('WP_Widget_Archives'); // Архивы
	unregister_widget('WP_Widget_Calendar'); // Календарь
	unregister_widget('WP_Widget_Categories'); // Рубрики
	unregister_widget('WP_Widget_Meta'); // Мета
	unregister_widget('WP_Widget_Pages'); // Страницы
	unregister_widget('WP_Widget_Recent_Comments'); // Свежие комментарии
	unregister_widget('WP_Widget_Recent_Posts'); // Свежие записи
	unregister_widget('WP_Widget_RSS'); // RSS
	unregister_widget('WP_Widget_Search'); // Поиск
}

add_action( 'widgets_init', 'true_remove_default_widget', 20 );

	
add_filter( 'woocommerce_shipping_fields' , 'custom_override_shipping_fields' );

function custom_override_shipping_fields( $fields ) {

	unset($fields['shipping_first_name']);
	unset($fields['shipping_last_name']);
	unset($fields['shipping_company']);
	unset($fields['shipping_postcode']);
	unset($fields['shipping_state']);
	unset($fields['shipping_city']);
	unset($fields['shipping_address_2']);
  	return $fields;
}


add_action( 'wp_ajax_nopriv_mytag_function_name', 'mytag_function_name');
add_action( 'wp_ajax_mytag_function_name', 'mytag_function_name');

function mytag_function_name() {

    $postcode = $_POST['postcode'];
	$region = $_POST['region'];
	$city = $_POST['city'];
	$address_name = $_POST['urlparam'];
    $new_nickname = $_POST['new_nickname'];
    $user_id = get_current_user_id();
    $rename = 0;

    $wc_address_book = WC_Address_Book::get_instance();

    $address_names = $wc_address_book->get_address_names( $user_id );

    foreach( $address_names as $key ) {
        if( $key != $address_name ) {
            if( get_user_meta( $user_id, $key . '_address_nickname', true ) == $new_nickname )
            $rename++;
        }

    }

	if($rename === 0) {
        update_user_meta( $user_id, $address_name . '_postcode', $postcode );
        update_user_meta( $user_id, $address_name . '_state', $region );
        update_user_meta( $user_id, $address_name . '_city', $city );
    }

}

add_action( 'woocommerce_after_save_address_validation', 'custom_validation', 10, 3);  

function custom_validation( $user_id, $load_address, $address )
{
    $newAddress = '';
	$entrance = $_POST['entrance_number'];
	$floor = $_POST['floor_number'];
	$flat = $_POST['flat_number'];

    foreach ( $address as $key ) { 
		$address2 = key($address);
		next($address);
	}

	$address3 = preg_split( '/_/', $address2 );	

	foreach ( $address3 as $key) {
		if( strripos( $key, 'shipping') !== false )
		$address4 = $key;
	}

    $new_nickname = $_POST[ $address4 . '_address_nickname' ];
	
    $address_names = get_user_meta( get_current_user_id(), 'wc_address_book', true );

		$current_address_name = 'shipping'; // default.

		if ( ! empty( $_GET['address-book'] ) ) {
			$current_address_name = sanitize_text_field( wp_unslash( $_GET['address-book'] ) );
		}

		if ( is_array( $address_names ) ) {
			foreach ( $address_names as $address_name ) {
				if ( $current_address_name !== $address_name ) {
					$address_nickname = get_user_meta( get_current_user_id(), $address_name . '_address_nickname', true );

					if ( ! empty( $new_nickname ) && sanitize_title( $address_nickname ) === sanitize_title( $new_nickname ) ) {
						// address nickname should be unique.
						$new_nickname = false;
						break;
					}
				}
			}
		}

        if( $new_nickname != false ) {

            if(isset($entrance) && trim($entrance) !== '' ){ 
                $newAddress = $newAddress . 'подъезд ' . $entrance;
                if(isset($floor) && trim($floor) !== ''){
                    $newAddress = $newAddress . ', этаж ' . $floor;
                    if(isset($flat) && trim($flat) !== ''){
                        $newAddress = $newAddress . ', квартира ' . $flat;
                    }
                }
                elseif( isset($flat) && trim($flat) !== '' ){
                    $newAddress = $newAddress . ', квартира ' . $flat;
                }
            }
            elseif (isset($floor) && trim($floor) !== ''){
                $newAddress = $newAddress . 'этаж ' . $floor;
                if(isset($flat) && trim($flat) !== ''){
                    $newAddress = $newAddress . ', квартира ' . $flat;
                }
            }
            elseif(isset($flat) && trim($flat) !== ''){
                $newAddress = $newAddress . 'квартира ' . $flat;
            }
        
            update_user_meta( $user_id, $address4 . '_address_2', $newAddress);

        }

}

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
    $defaults['delimiter'] = ' &gt; ';
    return $defaults;
}

add_filter( 'manage_users_columns', 'ur_add_column_head' );
add_filter( 'manage_users_custom_column', 'ur_add_column_cell', 10, 3 );


/**
 * Add the column header
 *
 * @param array $columns
 *
 * @return array
 */
function ur_add_column_head( $columns ) {
    if ( ! current_user_can( 'edit_user' ) ) {
        return $columns;
    }

    $columns['ur_extra'] = __( 'Country', 'user-registration' );
    return $columns;
}

/**
 * Set the Column value for each user in the users list
 *
 * @param string $val
 * @param string $column_name
 * @param int $user_id
 *
 * @return string
 */
function ur_add_column_cell( $val, $column_name, $user_id ) {

    if ( ! current_user_can( 'edit_user' ) ) {
        return false;
    }

    $val = '';
    if ( $column_name == 'ur_extra') {
        $val = get_user_meta( $user_id, 'first_name', true );
        return isset( $val ) ? $val : '';
    }
    return $val;
}

add_filter('woocommerce_add_success', 'removeNotice_AddressChangedSuccessfully', 99, 1);

function removeNotice_AddressChangedSuccessfully($notice_message) {
    return ($notice_message === __( 'Address changed successfully.', 'woocommerce' )) ? 'Адрес успешно добавлен/изменён' : $notice_message;
}






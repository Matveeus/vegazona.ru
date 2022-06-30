<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vegazona
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();
$woo_address_book_name = 'shipping';

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;


$woo_address = apply_filters(
	'woocommerce_my_account_my_address_formatted_address',
	array(
		'first_name' => get_user_meta( $customer_id, $woo_address_book_name . '_first_name', true ),
		'last_name'  => get_user_meta( $customer_id, $woo_address_book_name . '_last_name', true ),
		'company'    => get_user_meta( $customer_id, $woo_address_book_name . '_company', true ),
		'address_1'  => get_user_meta( $customer_id, $woo_address_book_name . '_address_1', true ),
		'address_2'  => get_user_meta( $customer_id, $woo_address_book_name . '_address_2', true ),
		'city'       => get_user_meta( $customer_id, $woo_address_book_name . '_city', true ),
		'state'      => get_user_meta( $customer_id, $woo_address_book_name . '_state', true ),
		'postcode'   => get_user_meta( $customer_id, $woo_address_book_name . '_postcode', true ),
		'country'    => get_user_meta( $customer_id, $woo_address_book_name . '_country', true ),
	),
	$customer_id,
	$woo_address_book_name
); ?>

<div class="private-area_right-side address-right-side">
	<h1 class="private-area_head">Мои адреса</h1>
	<?php wc_print_notices(); ?>
	<!-- Check if there are no addresses -->
	<?php if( $woo_address['address_1'] !== '' ) : ?>
		<h2 class="primary-address-title">Адрес по умолчанию:</h2>

		<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
			<div class="u-columns woocommerce-Addresses col2-set addresses">
		<?php endif; ?>

		<?php foreach ( $get_addresses as $name => $address_title ) : ?>
			
			<?php
				$address = wc_get_account_formatted_address( $name );
				$col     = $col * -1;
				$oldcol  = $oldcol * -1;
			?>

			<div class="u-column2 col-2 woocommerce-Address">
				<div class="private-area_my-primary-address">
					<div class="my-address-field">
						<button class="address_primary_icon"></button>
						<address class="address-line">
							<h1 class="name-of-place_address"><?php echo $woo_address['address_nickname']; ?></h1>
							<p class="full-address_in-field"><?php echo $woo_address['address_1'] ?><?php if($woo_address['address_2'] != null) echo ','; ?> <?php echo $woo_address['address_2'] ?> </p>
						</address>
						<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit change-address_button"></a> 
					</div>
				</div>
				
			</div>

		<?php endforeach; ?>

		<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
			</div>
		<?php endif; ?>

	<?php else : ?>
		<h2 class="primary-address-title">У вас еще нет адресов</h2>
	<?php endif; ?>
</div>
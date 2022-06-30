<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );
$user_id = get_current_user_id();

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>
	<form method="post" id="address_edit_form" onsubmit="return checkForSuggestion(addressBefore);"  >
		<div class="woocommerce-address-fields">
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper">
				<?php
				
				foreach ( $address as $key => $field ) {
					woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
					$myaddress = key($address);
					next($address);
				}
				?>
			</div>
			<?php 
				$addressArray = preg_split( '/_/', $myaddress );
				foreach( $addressArray as $key) {
					if( strripos( $key, 'shipping') !== false ) $current_address_book = $key;
				}
				$address2 = get_user_meta( $user_id, $current_address_book . '_address_2', true );
				$addressArray2 = preg_split( '/,/', $address2 );
				foreach( $addressArray2 as $key){
					if( strripos( $key, 'подъезд') !== false ) $pod = str_replace('подъезд ', '' , $key);
					if( strripos( $key, 'этаж') !== false ) $floor = str_replace('этаж ', '' , $key);
					if( strripos( $key, 'квартира') !== false ) $flat = str_replace('квартира ', '' , $key);
				}
			?>
			<div class="address-change-add-address-block">
			
                <h1 class="change-add-address-head">Изменить адрес</h1>
                    <label for="name_of_address" class="address-fields-label" id="label_for_address_nickname">Название</label>
					<p class="error-parag" style="display: block; margin-bottom: 11px;"><label id="shipping_address_nickname-error" class="error" for="shipping_address_nickname" style="display: none;"></label></p>
                    
                    <label for="full_address" class="address-fields-label" id="label_for_address">Адрес*</label>
					<p class="error-parag" style="display: block; margin-bottom: 11px;"><label id="shipping_address_1-error" class="error" for="shipping_address_1" style="display: none;"></label></p>
                    <div class="address-rows-fields">
                        <div class="address-fields-block">
                            <label for="entrance_number" class="address-fields-label">Подъезд</label>
                            <input name="entrance_number" class="detailed-address-field" id="pod" type="text" value="<?php if ( isset( $pod ) ) echo trim($pod); ?>">
                        </div>
                        <div class="address-fields-block">
                            <label for="floor_number" class="address-fields-label">Этаж</label>
                            <input name="floor_number" class="detailed-address-field" id="floor" type="text" value="<?php if ( isset( $floor ) ) echo trim($floor); ?>">
                        </div>
                        <div class="address-fields-block">
                            <label for="flat_number" class="address-fields-label">Кв/офис*</label>
                            <input name="flat_number" class="detailed-address-field" id="flat" type="text" value="<?php if ( isset( $flat ) ) echo trim($flat); ?>">
                        </div>
                    </div>
					<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>
					<p>
						<button type="submit" class="button vz-button submit-new-address" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"><?php esc_html_e( 'Сохранить', 'woocommerce' ); ?></button>
						<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
						<input type="hidden" name="action" value="edit_address" />
					</p>
                    
                
            </div>

			
		</div>

	</form>

	<script>
		//      addressInputsArray 
		//      {
		//          0 - Address nickname
		//          1 - Address_1
		//      }
		//
		//      addressFieldsArray
		//      {
		//          0 - Address nickname
		//          1 - Country
		//          2 - Address_1
		//      }
        
            if( document.querySelector('.entry-content').contains( document.querySelector(".woocommerce .woocommerce-error"))){
            var secondaryAddress = JSON.parse(sessionStorage.getItem('address2Object'));
            document.querySelector('#pod').value = secondaryAddress[0];
            document.querySelector('#floor').value = secondaryAddress[1];
            document.querySelector('#flat').value = secondaryAddress[2];
        }
        
        

		const addressInputsArray = document.getElementsByClassName('input-text');
		const addressFieldsArray = document.getElementsByClassName('form-row');
		const addressBefore = addressInputsArray[1].value;
		addressFieldsArray[0].classList.add('form-row-address-nickname-field');
		addressFieldsArray[1].classList.add('form-row-country-field');
		addressFieldsArray[2].classList.add('form-row-address_1-field');

		document.querySelector('.form-row-country-field').style.display = 'none';

		addressInputsArray[0].classList.add('form-row-address-nickname-input');
		addressInputsArray[1].classList.add('form-row-address_1-input');

		addressInputsArray[1].classList.add('full-address-field');
		addressInputsArray[0].classList.add('full-address-field');

		const adressLabel = document.getElementById('label_for_address');
		document.querySelector('.form-row-address_1-field label').remove();
		const addressField = addressInputsArray[1];
		adressLabel.after(addressField);

		const adressNicknameLabel = document.getElementById('label_for_address_nickname');
		document.querySelector('.form-row-address-nickname-field label').remove();
		const addressNicknameField = addressFieldsArray[0];
		adressNicknameLabel.after(addressNicknameField);
	</script>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>

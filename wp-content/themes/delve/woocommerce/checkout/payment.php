<?php
/**
 * Checkout Payment Section
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.5
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! is_ajax() ) : do_action( 'woocommerce_review_order_before_payment' ); endif; ?>

<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>
		<ul class="payment_methods methods"> <?php
			
			$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
			if ( ! empty( $available_gateways ) ) {

				if(isset(WC()->session->chosen_payment_method) && isset($available_gateways[WC()->session->chosen_payment_method])){
					$available_gateways[ WC()->session->chosen_payment_method ]->set_current();
				} elseif ( isset( $available_gateways[ get_option( 'woocommerce_default_gateway' ) ] ) ) {
					$available_gateways[ get_option( 'woocommerce_default_gateway' ) ]->set_current();
				} else {
					current( $available_gateways )->set_current();
				}

				foreach ( $available_gateways as $gateway ) { ?>
					<li class="payment_method_<?php echo $gateway->id; ?>">
						<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
					
                    	<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
						
						<?php if ( $gateway->has_fields() || $gateway->get_description() ) :
							echo '<div class="payment_box payment_method_' . $gateway->id . '" ' . ( $gateway->chosen ? '' : 'style="display:none;"' ) . '>';
							$gateway->payment_fields();
							echo '</div>';
						endif; ?>
					</li><?php
				}
			} else {
				if ( ! WC()->customer->get_country() )
					$no_gateways_message = __('Please fill in your details above to see available payment methods.', 'woocommerce');
				else
					$no_gateways_message = __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' );

				echo '<p>' . apply_filters( 'woocommerce_no_available_payment_methods_message', $no_gateways_message ) . '</p>';
			} ?>
		</ul>
	<?php endif; ?>
    
	<div class="form-row place-order">
		<noscript>
			<?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?><br/>
            
            <input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php _e( 'Update totals', 'woocommerce' ); ?>" />
		</noscript>

		<?php wp_nonce_field( 'woocommerce-process_checkout' );
		do_action( 'woocommerce_review_order_before_submit' );
		$order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );

		echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' );

		if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) {
			$terms_is_checked = apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ); ?>
			
            <p class="form-row terms">
				<input type="checkbox" class="input-checkbox" name="terms" <?php checked($terms_is_checked, true); ?> id="terms" />
				
                <label for="terms" class="checkbox"><?php _e( 'I have read and accept the', 'delve' ); ?> <a href="<?php echo esc_url( get_permalink(wc_get_page_id('terms')) ); ?>" target="_blank"><?php _e( 'terms &amp; conditions', 'delve' ); ?></a></label>
			</p>
		<?php }

		do_action( 'woocommerce_review_order_after_submit' ); ?>
	</div>
	<div class="clear"></div>
</div>

<?php if ( ! is_ajax() ) : do_action( 'woocommerce_review_order_after_payment' ); ?>
</div> <!-- #order_review / from review-order.php -->
<?php endif; ?>
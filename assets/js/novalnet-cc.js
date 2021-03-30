/**
 * Novalnet CC action process
 *
 * @category   Novalnet CC action
 * @package    edd-novalnet-gateway
 * @copyright  Novalnet (https://www.novalnet.de)
 * @license    https://www.novalnet.de/payment-plugins/kostenlos/lizenz
 */

var novalnet_cc;

jQuery( document ).ready(
	function ($) {
		if ( window.addEventListener ) {
			// AddEventListener works for all major browsers.
			window.addEventListener(
				'message',
				function( evt ) {
					novalnet_add_event( evt );
				}
			);
		} else {
			// AttachEvent works for IE8.
			window.attachEvent(
				'onmessage',
				function ( evt ) {
					novalnet_add_event( evt );
				}
			);
		}
		jQuery( "#edd_purchase_form" ).on(
			'submit',
			function( evt ) {

				/* Fetch the payment name from the payment selection */
				var payment = jQuery( '#edd-gateway-novalnet_cc' ).val();
				if ( payment == 'novalnet_cc' && jQuery( '#novalnet_cc_hash' ).val() == '' && '' == jQuery( '#novalnet_cc_error' ).val() ) {
					var iframe       = document.getElementById( 'nnIframe' ).contentWindow;
					var targetOrigin = 'https://secure.novalnet.de';
					evt.preventDefault();
					evt.stopImmediatePropagation();
					iframe.postMessage( { callBack : 'getHash' }, targetOrigin );
				}
			}
		);
		jQuery( "#edd-purchase-button" ).on(
			'click',
			function( evt ) {

				if ( jQuery( '#novalnet_cc_hash' ).val() == '' && '' == jQuery( '#novalnet_cc_error' ).val() ) {

					var iframe       = document.getElementById( 'nnIframe' ).contentWindow;
					var targetOrigin = 'https://secure.novalnet.de';
					evt.preventDefault();
					evt.stopImmediatePropagation();
					iframe.postMessage( { callBack : 'getHash' }, targetOrigin );
				}
			}
		);
		
		jQuery( "#edd-recurring-form" ).on(
			'submit',
			function( evt ) {
				var payment = jQuery('input[name=edd-recurring-update-gateway]').val();
				/* Fetch the payment name from the payment selection */
				if ( payment == 'novalnet_cc' && jQuery( '#novalnet_cc_hash' ).val() == '' && '' == jQuery( '#novalnet_cc_error' ).val() ) {
					var iframe       = document.getElementById( 'nnIframe' ).contentWindow;
					var targetOrigin = 'https://secure.novalnet.de';
					evt.preventDefault();
					evt.stopImmediatePropagation();
					iframe.postMessage( { callBack : 'getHash' }, targetOrigin );
				}
			}
		);
		
	}
);

function novalnet_load_iframe() {

	var iframe       = document.getElementById( 'nnIframe' ).contentWindow;
	var targetOrigin = 'https://secure.novalnet.de';
	var styleObj     = {
		labelStyle : novalnet_cc.common_label_style,
		inputStyle : novalnet_cc.common_field_style,
		styleText  : novalnet_cc.common_style_text,
	};

	var textObj = {
		card_holder: {
			labelText: novalnet_cc.card_holder_label,
			inputText: novalnet_cc.card_holder_input,
		},
		card_number: {
			labelText: novalnet_cc.card_number_label,
			inputText: novalnet_cc.card_number_input,
		},
		expiry_date: {
			labelText: novalnet_cc.card_expiry_label,
			inputText: novalnet_cc.card_expiry_input,
		},
		cvc: {
			labelText: novalnet_cc.card_cvc_label,
			inputText: novalnet_cc.card_cvc_input,
		},
		cvcHintText: novalnet_cc.card_cvc_hint,
		errorText: novalnet_cc.card_error_text,
	};

	var create_element_obj = { callBack : 'createElements', customStyle : styleObj, customText : textObj }

	iframe.postMessage( JSON.stringify( create_element_obj ), targetOrigin );
}



// Function to handle Event Listener.
function novalnet_add_event( evt ) {
	// Convert message string to object - eval.
	if ( evt.origin === 'https://secure.novalnet.de' ) {
			var data = ( typeof evt.data === 'string' ) ? eval( '(' + evt.data.replace( /(<([^>]+)>)/gi, "" ) + ')' ) : evt.data;
		if ( data['callBack'] == 'getHash' ) {
			if ( data['result'] == 'success' ) {
				jQuery( '#novalnet_cc_hash' ).val( data['hash'] );
				jQuery( '#novalnet_cc_uniqueid' ).val( data['unique_id'] );
				if ( jQuery('#edd_purchase_form').html() != null ) {
					jQuery('#edd_purchase_form').submit();
				}
				if ( jQuery('#edd-recurring-form').html() != null ) {
					jQuery('#edd-recurring-form').submit();
				}
			} else {
				jQuery( '#novalnet_cc_error' ).val( data['error_message'] );
				if ( jQuery('#edd_purchase_form').html() != null ) {
					jQuery('#edd_purchase_form').submit();
				}
				if ( jQuery('#edd-recurring-form').html() != null ) {
					jQuery('#edd-recurring-form').submit();
				}
			}
		} else if ( data['callBack'] == 'getHeight' ) {
			document.getElementById( 'nnIframe' ).height = data['contentHeight'];
		}
	}
}

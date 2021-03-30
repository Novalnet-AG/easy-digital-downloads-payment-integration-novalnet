<?php
/**
 * This script is used for Novalnet updates template
 *
 * Copyright (c) Novalnet
 *
 * This script is only free to the use for merchants of Novalnet. If
 * you have found this script useful a small recommendation as well as a
 * comment on merchant form would be greatly appreciated.
 *
 * @author   	Novalnet AG
 * @category 	Admin
 * @package 	edd-novalnet-gateway
 * @author   	Novalnet AG
 * @license     https://www.novalnet.de/payment-plugins/kostenlos/lizenz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Goto Novalnet global configuration page.
$configuration_url = admin_url( 'edit.php?post_type=download&page=edd-settings&tab=gateways&section=novalnet_global_config' );
// Goto Novalnet admin portal page.
$admin_url = 'https://admin.novalnet.de/';
$language  = strtolower( novalnet_shop_language() );
if ( 'de' === $language ) {
	$projects_tab                = NOVALNET_PLUGIN_URL . '/assets/images/setup/de/projects_tab.png';
	$product_activation_key      = NOVALNET_PLUGIN_URL . '/assets/images/setup/de/product_activation_key.png';
	$vendor_script_configuration = NOVALNET_PLUGIN_URL . '/assets/images/setup/de/vendor_script_configuration.png';
	$system_ip_configuration     = NOVALNET_PLUGIN_URL . '/assets/images/setup/de/system_ip_configuration.png';
	$paypal_config_home          = NOVALNET_PLUGIN_URL . '/assets/images/setup/de/paypal_config_home.png';
	$paypal_config               = NOVALNET_PLUGIN_URL . '/assets/images/setup/de/paypal_config.png';
} else {
	$projects_tab                = NOVALNET_PLUGIN_URL . '/assets/images/setup/projects_tab.png';
	$product_activation_key      = NOVALNET_PLUGIN_URL . '/assets/images/setup/product_activation_key.png';
	$vendor_script_configuration = NOVALNET_PLUGIN_URL . '/assets/images/setup/vendor_script_configuration.png';
	$system_ip_configuration     = NOVALNET_PLUGIN_URL . '/assets/images/setup/system_ip_configuration.png';
	$paypal_config_home          = NOVALNET_PLUGIN_URL . '/assets/images/setup/paypal_config_home.png';
	$paypal_config               = NOVALNET_PLUGIN_URL . '/assets/images/setup/paypal_config.png';
}
$home_page = __( 'https://www.novalnet.com', 'edd-novalnet' );
?>
<div class="wrap about-wrap">
	<a href="<?php echo esc_attr( $home_page ); ?>" target="_blank"><img style="border:0;width:auto" id="novalnet-logo" alt="Novalnet" src="<?php echo esc_attr( NOVALNET_PLUGIN_URL ); ?>/assets/images/novalnet.png"/></a>
	<h1><?php echo esc_html( __( 'Novalnet Payment Plugin V2.0.1', 'edd-novalnet' ) ); ?></h1>
	<div class="about-text">
		</p><?php echo esc_html( __( 'Thank you for updating to the latest version of Novalnet Payment Plugin. This version introduces some great new features and enhancements.', 'edd-novalnet' ) ); ?></p>
		<?php echo esc_html( __( 'We hope you enjoy it!', 'edd-novalnet' ) ); ?>
	</div>

	<div class="return-to-dashboard">
		<a href="<?php echo esc_attr( $configuration_url ); ?>"><?php echo esc_html( __( 'Go to Novalnet Global Configuration &raquo;', 'edd-novalnet' ) ); ?></a>
	</div>

	<div class="changelog">
		<h2><?php echo esc_html( __( "Check Out What's New", 'edd-novalnet' ) ); ?></h2>
		<hr/>
		<div class="feature-section two-col">
			<div class="col feature-copy">
				<img src="<?php echo esc_attr( $projects_tab ); ?>" />
			</div>

			<div class="col feature-copy">
				<h3><?php echo esc_html( __( 'Product Activation Key', 'edd-novalnet' ) ); ?></h3>
				<p><?php echo esc_html( __( 'Novalnet introduces Product Activation Key to fill entire merchant credentials automatically on entering the key into the Novalnet Global Configuration.', 'edd-novalnet' ) ); ?></p>
			</div>
			<div class="feature-image col">
				<img style="width:auto" src="<?php echo esc_attr( $product_activation_key ); ?>" />
			</div>
			<div class="col feature-copy">
				<p>
				<?php
				/* translators: %s: admin URL */
				echo wp_kses(
					sprintf( __( 'Enter the Novalnet Product activation key that is required for authentication and payment processing. You will find the Product activation key in the <a href="%s" target="blank">Novalnet Admin Portal</a> :  <strong>PROJECT</strong> > <strong>Choose your project</strong> > <strong>Shop Parameters</strong> > <strong>API Signature (Product activation key)</strong>. ', 'edd-novalnet' ), $admin_url ),
					array(
						'strong' => true,
						'a'      => array(
							'href'   => true,
							'target' => true,
						),
					)
				);
				?>
				</p>
			</div>
		</div>
		<hr/>
		<div class="feature-section two-col">

			<div class="col feature-copy">
				<h3><?php echo esc_html( __( 'IP Address Configuration', 'edd-novalnet' ) ); ?></h3>
				<p><?php 
				/* translators: %s: admin URL */
				echo sprintf( __( 'For all API access (Auto configuration with Product Activation Key, loading Credit Card iframe, Transaction API access, Transaction status enquiry, and update), it is required to configure a server IP address in <a href="%s" target="blank">Novalnet Admin Portal</a>.', 'edd-novalnet' ), $admin_url ); ?></p>
			</div>
			<div class="feature-image col">
				<img src="<?php echo esc_attr( $projects_tab ); ?>" />
			</div>
			<div class="col feature-copy">
				<p>
				<?php
				/* translators: %s: admin URL */
				echo wp_kses(
					sprintf( __( "To configure an IP address, please go to <a href='%s' target='_blank'>Novalnet Admin Portal</a> : <strong>PROJECT</strong> > <strong>Choose your project</strong> > <strong>Project Overview</strong> > <strong>Payment Request IP's</strong> > <strong>Update Payment Request IP</strong>.", 'edd-novalnet' ), $admin_url ),
					array(
						'strong' => true,
						'a'      => array(
							'href'   => true,
							'target' => true,
						),
					)
				);
				?>
				</p>
			</div>
			<div class="feature-image col">
				<img style="width:auto" src="<?php echo esc_attr( $system_ip_configuration ); ?>" />
			</div>
		</div>
		<hr/>
		<div class="feature-section two-col">
			<div class="col feature-copy">
				<img src="<?php echo esc_attr( $projects_tab ); ?>" />
			</div>

			<div class="col feature-copy">
				<h3><?php echo esc_html( __( 'Update of Notification / Webhook URL', 'edd-novalnet' ) ); ?></h3>
				<p><?php 
				/* translators: %s: admin URL */
				echo sprintf( __( 'Notification / Webhook URL is required to keep the merchant’s database/system up-to-date and synchronized with Novalnet transaction status. It is mandatory to configure the Notification / Webhook URL in <a href="%s" target="blank">Novalnet Admin Portal</a>. Novalnet system (via asynchronous) will transmit the information on each transaction and its status to the merchant’s system.', 'edd-novalnet' ), $admin_url ); ?></p>

			</div>
			<div class="feature-image col">
				<img style="width:auto" src="<?php echo esc_attr( $vendor_script_configuration ); ?>" />
			</div>
			<div class="col feature-copy">
				<p>
				<?php
				/* translators: %s: admin URL */
				echo wp_kses(
					sprintf( __( "To configure Notification / Webhook URL, please go to <a href='%s' target='_blank'>Novalnet Admin Portal</a> : <strong>PROJECT</strong> > <strong>Choose your project</strong> > <strong>Project Overview</strong> > <strong>Vendor script URL / Notification & Webhook URL</strong>.", 'edd-novalnet' ), $admin_url ),
					array(
						'strong' => true,
						'a'      => array(
							'href'   => true,
							'target' => true,
						),
					)
				);
				?>
				</p>
			</div>
		</div>
	</div>
	<hr/>
		<div class="feature-section two-col">

			<div class="col feature-copy">
				<h4><?php echo esc_html( __( 'PAYPAL', 'edd-novalnet' ) ); ?></h4>
				<p><?php
				/* translators: %s: admin URL */
				echo sprintf( __( 'To proceed transaction in PayPal payment, it is required to configure PayPal API details in <a href="%s" target="blank">Novalnet Admin Portal</a>.', 'edd-novalnet' ), $admin_url ); ?></p>
			</div>
			<div class="feature-image col">
				<img style="width:auto" src="<?php echo esc_attr( $paypal_config_home ); ?>" />
			</div>
			<div class="col feature-copy">
				<p>
				<?php
				/* translators: %s: admin URL */
				echo wp_kses(
					sprintf( __( "To configure PayPal API details, please go to <a href='%s' target='_blank'>Novalnet Admin Portal</a>: <strong>PROJECT</strong> > <strong>Choose your project</strong> > <strong>Payment Methods</strong> > <strong>PayPal</strong> > <strong>Configure</strong>.", 'edd-novalnet' ), $admin_url ),
					array(
						'strong' => true,
						'a'      => array(
							'href'   => true,
							'target' => true,
						),
					)
				);
				?>
				</p>
			</div>
			<div class="feature-image col">
				<img style="width:auto" src="<?php echo esc_attr( $paypal_config ); ?>" />
			</div>
		</div>
		<div class="changelog still-more">
			<h2><?php echo esc_html( __( "But wait, there's more!", 'edd-novalnet' ) ); ?></h2>
			<hr/>
			<div class="feature-section three-col">
				<div class="col">
					<h3><?php echo esc_html( __( 'Credit Card Responsive Iframe', 'edd-novalnet' ) ); ?></h3>
					<p><?php echo esc_html( __( 'Now, we have updated the Credit Card with the most dynamic features. With the little bit of code, we have made the Credit Card iframe content responsive friendly.', 'edd-novalnet' ) ); ?></p>
					<p><?php echo esc_html( __( 'The merchant can customize the CSS settings of the Credit Card iframe form.', 'edd-novalnet' ) ); ?></p>
				</div>
			</div>
			<hr/>
		</div>
		<div class="return-to-dashboard">
			<a href="<?php echo esc_attr( $configuration_url ); ?>"><?php echo esc_html( __( 'Go to Novalnet Global Configuration &raquo;', 'edd-novalnet' ) ); ?></a>
		</div>
</div>

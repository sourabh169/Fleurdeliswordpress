<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

	<div class="myAccountDashboard">
		<div class="myaccHead">
			<h1 class="headingPrimary">My Account</h1>
			<p>Track the shipment of orders you have just placed, see past purchases and check when pre-ordered items will be in stock.<br />
			You can also easily request returns within 15 days from delivery.</p>
		</div>
		<div class="orderDetailsTable colorSecondary">
			<h5 class="headingPrimary">Orders</h5>
			<div class="space5"></div>
			<p>Please enter your Order Number here if you don’t find it in the list below:</p>
			<div class="space10"></div>
			<form action="" method="">
				<div class="formFieldmyAccount">
					<input type="number" name="" placeholder="Enter Your Order number" />
				</div>
				<div class="formFieldmyAccount">
					<input type="email" name="" placeholder="Enter Your Email Address" />
				</div>
				<div class="space5"></div>
				<button type="submit" class="btn btn-primary btn-lg">Find your order</button>
			</form>
		</div>

		<div class="orderDetailsTableData">
			<h5 class="headingPrimary headingPrimary2">Orders History</h5>
			<div class="space5"></div>
			<table class="orderTableMyAcc woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
				<!--<thead>
					<tr>
						<?php //foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
							<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php //echo esc_attr( $column_id ); ?>"><span class="nobr"><?php //echo esc_html( $column_name ); ?></span></th>
						<?php //endforeach; ?>
					</tr>
				</thead>-->
				<tbody>
					<?php
					foreach ( $customer_orders->orders as $customer_order ) {
						$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
						$item_count = $order->get_item_count() - $order->get_item_count_refunded();
						?>
						<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
							<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
								<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
									<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
										<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

									<?php elseif ( 'order-number' === $column_id ) : ?>
										<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
											<?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
										</a>

									<?php elseif ( 'order-date' === $column_id ) : ?>
										<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

									<?php elseif ( 'order-total' === $column_id ) : ?>
									<?php
									/* translators: 1: formatted order total 2: total order items */
									echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
									?>

									<?php elseif ( 'order-status' === $column_id ) : ?>
										<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

									<?php elseif ( 'order-actions' === $column_id ) : ?>
										<?php
										$actions = wc_get_account_orders_actions( $order );

										if ( ! empty( $actions ) ) {
											foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
												<!-- echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>'; -->
												<a href="#" class="" data-toggle="modal" data-target="#vieworderDetails">View </a>
											<?php }
										}
										?>
									<?php endif; ?>
								</td>
							<?php endforeach; ?>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- vieworderDetails -->
	<div class="modal fade" id="vieworderDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>	      		
	      		<div class="modal-body">
	        		<div class="modalInvoice">
	        			<div class="modalInvoiceHead">
	        				<div class="invoice-logo"></div>
	        				Invoice
	        			</div>
	        			<div class="space5"></div>
	        			<div class="invoiceDetailsBlock">
	        				<div class="invoiceDetailsRow1">
		        				<div class="row">
		        					<div class="col-sm-6 text-left">
		        						<p>FLEURDELIS</p>
		        						<p>+971.234556789</p>
		        						<p>Abu Dhabi, United Arab Emirates</p>
		        					</div>
		        					<div class="col-sm-6 text-right">
		        						<p>03 March 2019</p>
		        						<p>Order #123456789</p>
		        						<p>PO 456001200</p>
		        					</div>
		        				</div>
		        			</div>
		        			<div class="invoiceDetailsRow1">
		        				<div class="row">
		        					<div class="col-sm-6 text-left">
		        						<p>Abjad Design</p>
		        						<p>Abjad Design LLC</p>
		        						<p>2nd Floor Al, Links Investment Office,</p>
		        						<p>Garhoud Centre</p>
		        						<p>Dubai, Dubai 98486</p>
		        						<p>United Arab Emirates +971.42823999</p>
		        					</div>
		        					<div class="col-sm-6 text-right">
		        						<p>Jemicah dela Cruz</p>
		        						<p>Visa ############1234</p>
		        						<p>Paid: AED 2060.00</p>
		        						<p>Complete</p>
		        					</div>
		        				</div>
		        			</div>
		        			<table class="invoiceOrderTable" cellspacing="0">
								<thead>
									<tr>
										<th class="product-thumbnail"><span>Description</span></th>
										<th class="product-quantity"><span>Quantity</span></th>
										<th class="product-price"><span>Amount</span></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="product-thumbnail">
											<div>
												<a href="#">Al Wajd</a>
											</div>
										</td>
										<td class="product-quantity">
											<div>
												1
											</div>
										</td>
										<td class="product-price">
											<span>
												1,300.00 <span> AED</span>
											</span>
										</td>
									</tr>
									<tr>
										<td colspan="2" class="invoiceshippingCol">
											<div>
												Shipping
											</div>
										</td>										
										<td class="product-price">
											<span>
												1,300.00 <span> AED</span>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="invoiceTotalRow">
								<div class="invoiceTotalRowCol1"></div>
								<div class="invoiceTotalRowCol2">
									<div>Order Total</div>
									<div>2060.00 <span>AED</span></div>
								</div>
							</div>
							<div class="clear"></div>
		        			<p>Many thanks for your order! We look forward to doing business with you again in due course. <br />Need help? Please see our FAQs or contact us.</p>
		        			<div class="invoiceFooter">
		        				<p>M: 0097336188861 | T: 0097770006060 | E: <a href="mailto:ceo@fleurdelis.ae">ceo@fleurdelis.ae</a> | <a href="https://www.fleurdelis.ae" target="_blank">fleurdelis.ae</a></p>
		        				<div class="invoicePrintBtn">
		        					<a href="#"></a>
		        				</div>
		        			</div>
	        			</div>
	        		</div>
	      		</div>		      	
	    	</div>
	  	</div>
	</div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Browse products', 'woocommerce' ); ?>
		</a>
		<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>

<?php
/**
 * Wishlist page template - Standard Layout
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $wishlist \YITH_WCWL_Wishlist Current wishlist
 * @var $wishlist_items array Array of items to show for current page
 * @var $wishlist_token string Current wishlist token
 * @var $wishlist_id int Current wishlist id
 * @var $users_wishlists array Array of current user wishlists
 * @var $current_page int Current page
 * @var $page_links array Array of page links
 * @var $is_user_owner bool Whether current user is wishlist owner
 * @var $show_price bool Whether to show price column
 * @var $show_dateadded bool Whether to show item date of addition
 * @var $show_stock_status bool Whether to show product stock status
 * @var $show_add_to_cart bool Whether to show Add to Cart button
 * @var $show_remove_product bool Whether to show Remove button
 * @var $show_price_variations bool Whether to show price variation over time
 * @var $show_variation bool Whether to show variation attributes when possible
 * @var $show_cb bool Whether to show checkbox column
 * @var $show_quantity bool Whether to show input quantity or not
 * @var $show_ask_estimate_button bool Whether to show Ask an Estimate form
 * @var $show_last_column bool Whether to show last column (calculated basing on previous flags)
 * @var $move_to_another_wishlist bool Whether to show Move to another wishlist select
 * @var $move_to_another_wishlist_type string Whether to show a select or a popup for wishlist change
 * @var $additional_info bool Whether to show Additional info textarea in Ask an estimate form
 * @var $price_excl_tax bool Whether to show price excluding taxes
 * @var $enable_drag_n_drop bool Whether to enable drag n drop feature
 * @var $repeat_remove_button bool Whether to repeat remove button in last column
 * @var $available_multi_wishlist bool Whether multi wishlist is enabled and available
 * @var $no_interactions bool
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>

<div class="woocommerce">
    <div class="customWishlistPage">
        <div class="myaccHead">
            <h1 class="headingPrimary">My Account</h1>
            <p>Want to save these items for next time? <br />
            <a href="#">Sign in</a> to your account and your items will be saved for your next visit.<br />
            Don't have an account? It's quick and easy to <a href="#">create an account.</a></p>
        </div>
        <nav class="woocommerce-MyAccount-navigation">
            <ul>
                <li class="wishlistListLink"><a href="<?php echo get_option('home'); ?>/wishlist/">Wishlist</a></li>
                <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                    <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                        <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="woocommerce-MyAccount-content">
            <div class="myAccountDashboard mywishlistDashboard">
                <h5 class="headingPrimary">My Wishlist</h5>
                <div class="space10"></div>
                <div class="shareThisBlock">
                    <div class="shareThisBlockBtn">
                        <div class="sharethisIcon"></div>
                    </div>
                    <div class="shareThisBlockModal">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer.php?u=http://localhost/Fleurdelis-WooCommerce/product/al-siba/&amp;t=Al Siba" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-snapchat-ghost"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 col-sm-11">
                        <div class="wishlistColBlockRow row shop_table cart wishlist_table wishlist_view traditional responsive" data-pagination="<?php echo esc_attr( $pagination )?>" data-per-page="<?php echo esc_attr( $per_page )?>" data-page="<?php echo esc_attr( $current_page )?>" data-id="<?php echo $wishlist_id ?>" data-token="<?php echo $wishlist_token ?>">

                            <?php $column_count = 2; ?>

                            <div class="wishlist-items-wrapper">
                            <?php
                            if( $wishlist && $wishlist->has_items() ) :
                                foreach( $wishlist_items as $item ) :
                                    /**
                                     * @var $item \YITH_WCWL_Wishlist_Item
                                     */
                                    global $product;

                                    $product = $item->get_product();
                                    $availability = $product->get_availability();
                                    $stock_status = isset( $availability['class'] ) ? $availability['class'] : false;

                                    if( $product && $product->exists() ) :
                                        ?>
                                        <div class="col-md-6 col-sm-6" id="yith-wcwl-row-<?php echo $item->get_product_id() ?>" data-row-id="<?php echo $item->get_product_id() ?>">
                                            <div class="wishlistColBlock">
                                                
                                                <?php if( $show_remove_product ): ?>
                                                <div class="product-remove">
                                                    <div>
                                                        <a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item->get_product_id() ) ) ?>" class="remove remove_from_wishlist" title="<?php echo apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ); ?>">&times;</a>
                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <div class="product-thumbnail">
                                                    <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ) ?>">
                                                        <?php echo $product->get_image() ?>
                                                    </a>
                                                </div>

                                                <div class="product-name">
                                                    <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></a>

                                                    <?php
                                                    if( $show_variation && $product->is_type( 'variation' ) ){
                                                        /**
                                                         * @var $product \WC_Product_Variation
                                                         */
                                                        echo wc_get_formatted_variation( $product );
                                                    }
                                                    ?>

                                                    <?php do_action( 'yith_wcwl_table_after_product_name', $item ); ?>

                                                    <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>"><?php echo $product->get_price_html(); ?></p>

                                                    <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

                                                    <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                                                        <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>


                                                        <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-primary btn-lg">Add to Bag</button>

                                                        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                                                    </form>

                                                    <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                endforeach;
                            else: ?>
                                <div class="col-sm-12">
                                    <div colspan="<?php echo esc_attr( $column_count ) ?>" class="wishlist-empty"><?php echo apply_filters( 'yith_wcwl_no_product_to_remove_message', __( 'No products added to the wishlist', 'yith-woocommerce-wishlist' ) ) ?></div>
                                </div>
                            <?php
                            endif;

                            if( ! empty( $page_links ) ) : ?>
                                <div class="pagination-row">
                                    <div colspan="<?php echo esc_attr( $column_count ) ?>"><?php echo $page_links ?></div>
                                </div>
                            <?php endif ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
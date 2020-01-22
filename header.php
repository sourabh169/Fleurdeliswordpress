<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fleurdelis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>

    <!-- Other CSS libraries -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/modern-normalize.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/font-awesome/css/all.min.css">

    <!-- theme's custom CSS -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>

<body <?php body_class(); ?>>

	<!-- headerSection -->
    <div class="headerSection">
        <div class="containerWrapper">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <!-- menuBtn -->
                    <div class="menuBtn">
                        <div class="menuBtnBar menuBtnBar1"></div>
                        <div class="menuBtnBar menuBtnBar2"></div>
                        <div class="menuBtnBar menuBtnBar3"></div>
                    </div>
                    <!-- menuNavigation -->
                    <div class="menuNavigation">
                        <div class="menuNavigationCloseBtn">
                            <div></div>
                            <div></div>
                        </div>
                        <div class="menuNavigationInn">
                            <div class="menuNavigationCol">
                                <?php 
								    $argsPrimaryMenu = array(
								        'menu_class' => 'menu',
								        'menu' => '(your_menu_id)',
								        'container' => false,
								        'theme_location' => 'primary-menu'
								    );
								    wp_nav_menu( $argsPrimaryMenu ); 
								?>
                            </div>
                        </div>
                    </div>
                    <!-- languageSwitcherBtn -->
                    <div class="languageSwitcherBtn">
                        <div class="angleDownIcon"></div>
                        <ul>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/uae-flag.svg" alt="UAE"><span>AED</span></a></li>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/euro.svg" alt="UAE"><span>EUR</span></a></li>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/usdollar.svg" alt="UAE"><span>USD</span></a></li>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/gbp.svg" alt="UAE"><span>GBP</span></a></li>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/omr.svg" alt="UAE"><span>OMR</span></a></li>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/kwd.svg" alt="UAE"><span>KWD</span></a></li>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/bhd.svg" alt="UAE"><span>BHD</span></a></li>
                            <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/assets/images/ksa.svg" alt="UAE"><span>SAR</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="logoDiv">
                        <a href="<?php echo get_option('home'); ?>" class="logo">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg" alt="<?php get_bloginfo( 'name' ); ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="toprightLinks">
                        <ul>
                            <?php
                            if ( is_user_logged_in() ) { ?>
                                <li class="userBtn userLoggedInBtn">
                                    <a href="<?php echo get_option('home'); ?>/my-account">
                                        <?php
                                        if ( is_user_logged_in() ) {
                                        global $current_user;
                                        get_currentuserinfo();
                                        echo '<span> '.$current_user->display_name.'</span>';
                                        } else {}
                                        ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/user-icon.svg" alt="">
                                    </a>
                                    <ul>
                                        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                            <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="userBtn">
                                    <a href="<?php echo get_option('home'); ?>/my-account">
                                        <span></span>
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/user-icon.svg" alt="">
                                    </a>
                                </li>
                            <?php }
                            ?>
                            <?php
                            if ( is_user_logged_in() ) { ?>
                                <li class="wishlistBtn">
                                    <a href="<?php echo get_option('home'); ?>/wishlist/">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/wishlist.svg" alt="">
                                        <?php $wishlist_count = YITH_WCWL()->count_products();?><span><?php echo $wishlist_count; ?></span>
                                    </a>
                                </li>
                            <?php } else {
                                //echo 'Welcome, visitor!';
                            }
                            ?>
                            <li class="cartBtn">
                                <?php global $woocommerce; ?>                                
                                <a class="cart-customlocation" href="<?php //echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/cart-icon.svg" alt="">
                                    <span><?php echo sprintf ( _n( '%d ', '%d ', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mini cart  -->
    <div class="miniCartBlock">
        <div class="miniCartBlockInner">
            <!-- <div class="miniCartBlockCloseBtn"><i class="fa fa-close"></i></div> -->
            <?php woocommerce_mini_cart(); ?>
        </div>
    </div>

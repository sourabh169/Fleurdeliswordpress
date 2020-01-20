<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fleurdelis
 */

get_header();
?>

	<!-- homepageBanner -->
    <div class="homepageBanner">
        <div class="homepageBannerSlider">
            <div class="owl-carousel" id="bannerSlider">
                <div class="item">
                    <a href="product-details.html" class="homeBannerSliderImg" style="background: url('<?php bloginfo('template_directory'); ?>/assets/images/home-slide1.jpg') no-repeat;"></a>
                </div>
                <div class="item">
                    <a href="product-details.html" class="homeBannerSliderImg" style="background: url('<?php bloginfo('template_directory'); ?>/assets/images/home-slide2.jpg') no-repeat;"></a>
                </div>
                <div class="item">
                    <a href="product-details.html" class="homeBannerSliderImg" style="background: url('<?php bloginfo('template_directory'); ?>/assets/images/home-slide3.jpg') no-repeat;"></a>
                </div>
                <div class="item">
                    <a href="product-details.html" class="homeBannerSliderImg" style="background: url('<?php bloginfo('template_directory'); ?>/assets/images/home-slide4.jpg') no-repeat;"></a>
                </div>
                <div class="item">
                    <a href="product-details.html" class="homeBannerSliderImg" style="background: url('<?php bloginfo('template_directory'); ?>/assets/images/home-slide5.jpg') no-repeat;"></a>
                </div>
                <div class="item">
                    <a href="product-details.html" class="homeBannerSliderImg" style="background: url('<?php bloginfo('template_directory'); ?>/assets/images/home-slide6.jpg') no-repeat;"></a>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();

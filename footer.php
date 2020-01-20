<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fleurdelis
 */

?>

	<!-- footerStrip -->
    <div class="footerStrip">
        <div class="containerWrapper">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p><a href="#">Legal Terms</a></p>
                </div>
                <div class="col-md-6 col-sm-6 text-center">
                    <p>&copy; <?php echo date('Y'); ?> FLEURDELIS. All Rights Reserved.</p>
                </div>
                <div class="col-md-3 col-sm-3 text-right">
                    <p><a href="#">Follow Us</a></p>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- jQuery Libraries -->
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/owlcarousel/owl.carousel.min.js"></script>
    
    <!-- custom JS -->
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/custom.js"></script>

<?php wp_footer(); ?>

</body>
</html>

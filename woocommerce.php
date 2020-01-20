<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fleurdelis
 */

get_header();
?>

	<div class="innerPageSection">
	    <div id="wooCommPage">
		    <div class="containerWrapper">
		        <?php woocommerce_content(''); ?>
		    </div>
		    <!-- productLinkPaginate -->
			<div class="productLinkPaginate">
				<ul>
					<li class="activeproductLinkPaginate"><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
					<li><a href="#"></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>	      		
	      		<div class="modal-body">
	        		<div class="singleProductModal">
	        			<div class="row">
	        				<div class="col-md-6 col-sm-6">
	        					<h2 class="singleProductModalHeading"><?php the_title(''); ?> <small><?php $ProductSubTitle = get_post_custom_values($subTitle = 'Product-Sub-Title'); echo $ProductSubTitle[0]; ?></small></h2>
	        					<div class="singleProductModalDesc">
		        					<?php the_content(); ?>
		        				</div>
	        				</div>
	        				<div class="col-md-6 col-sm-6">
	        					<?php the_post_thumbnail( array(600,600) ); ?>
	        				</div>
	        			</div>
	        		</div>
	      		</div>		      	
	    	</div>
	  	</div>
	</div>

<?php
get_footer();

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fleurdelis
 */

get_header();
?>

	<div class="innerPageSection">
	    <?php if (have_posts()) : ?>
	        <?php while (have_posts()) : the_post(); ?>
	            <?php the_content(''); ?>
	        <?php endwhile; ?>
	    <?php endif; ?>
	</div>

<?php
get_footer();

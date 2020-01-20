<?php
/*
  Template Name: Product Single Page
  Template Post Type: post, page
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

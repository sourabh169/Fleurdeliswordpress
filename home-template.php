<?php
/**
Template Name: Home
*/

get_header();
?>

	<!-- homepageBanner -->
    <div class="homepageBanner">
        <div class="homepageBannerSlider">
            <div class="owl-carousel" id="bannerSlider">
                <?php
                $args_homepagesliderquery = array(
                    'post_type' => array('homepageslider'),
                    'posts_per_page' => 10,
                    'order' => 'DESC',
                );
                $homepagesliderquery = new WP_Query( $args_homepagesliderquery );
                if ( $homepagesliderquery->have_posts() ) {
                    while ( $homepagesliderquery->have_posts() ) {
                        $homepagesliderquery->the_post(); ?>
                        <div class="item">
                            <?php $homeSliderImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <a href="<?php echo catch_that_hyplink(); ?>" class="homeBannerSliderImg" style="background: url('<?php echo $homeSliderImg[0]; ?>') no-repeat;"></a>
                        </div>
                    <?php }
                } else {
                    echo '<h4>No posts</h4>';
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();

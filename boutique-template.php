<?php
/**
Template Name: Boutique
*/

get_header();
?>

    <!-- collectionsSection5 -->
    <div class="collectionsSection collectionsSection5 mainSliderSection boutiqueSection">
        <div class="collectionsSectionInn">
            <div class="col-md-offset-1 col-md-10">
                <div class="boutiqueHeadCol">
                    <h2 class="heading-center">Boutique</h2>
                </div>
                <div class="space20"></div>
                <div class="row">
                    <div class="owl-carousel" id="collectionSlider">
                        <?php
                        $args_collectionsquery = array(
                            'post_type' => array('product'),
                            'order' => 'DESC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'boutique',
                                    'terms' => array(19),
                                    'include_children' => false,
                                ),
                            ),
                        );
                        $collectionsquery = new WP_Query( $args_collectionsquery );
                        if ( $collectionsquery->have_posts() ) {
                            while ( $collectionsquery->have_posts() ) {
                                $collectionsquery->the_post(); ?>
                                <div class="item">
                                    <?php $collectionsqueryImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                    <a href="<?php the_permalink(''); ?>" class="collectionsSlideBlock">  
                                        <div style="background: url('<?php echo $collectionsqueryImg[0]; ?>') no-repeat;"></div>
                                    </a>
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
        </div>
    </div>

<?php
get_footer();

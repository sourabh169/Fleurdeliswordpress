<?php
/**
Template Name: Collections
*/

get_header();
?>

    <!-- collectionsSection1 -->
    <div class="collectionsSection collectionsSection1">
        <div class="collectionsSectionInn">
            <h1>Fields of Bloom.</h1>
        </div>
    </div>

    <?php 
    $args_collectionpostquery = array(
        'post_type' => array('collectionpost'),
        'posts_per_page' => 3,
        'order' => 'ASC',
    );
    $collectionpostquery = new WP_Query( $args_collectionpostquery );
    if ( $collectionpostquery->have_posts() ) {
        while ( $collectionpostquery->have_posts() ) {
            $collectionpostquery->the_post(); ?>
            <div class="collectionsSection">
                <div class="collectHeading">
                    <div>Collection</div>
                </div>
                <div class="collectionsSectionInn">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <?php the_content(''); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        echo '<h4>No posts</h4>';
    }
    wp_reset_postdata();
    ?>

    <!-- <div class="collectionsSection collectionsSection2">
        <div class="collectHeading">
            <div>Collection</div>
        </div>
        <div class="collectionsSectionInn">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <h4>It is truly unbelievable the precious gifts nature gives us, and all the wisdom it keeps. Into ﬁelds oﬂilies, a magniﬁcent pool of colors awaits, but do not be fooled, as every ﬂower is uniquely and heavenly made.</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="collectionsSection collectionsSection3">
        <div class="collectHeading">
            <div>Collection</div>
        </div>
        <div class="collectionsSectionInn">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <h4>With a thread of ancestral stories, women have known to treasure the essence of the lily flower as a diamond, due to its powerful virtues. Purity, youth, passion, beauty, promise and love are represented by the lily, each petal guarding them until it is time to blossom, releasing a blissful, sparkling spirit. Its inspiring air flew by FLEURDELIS, confecting a vibrant collection of handbags, originated from the lily qualities and its shapes.</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="collectionsSection collectionsSection4">
        <div class="collectHeading">
            <div>Collection</div>
        </div>
        <div class="collectionsSectionInn">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <h4>Animal leathers are combined to give resistance and smoothness, its texture making every piece one of a kind, while diamonds and precious gems appear as brushstrokes of wild hues into the masterpiece.</h4>
                </div>
            </div>
        </div>
    </div> -->

    <!-- mainSliderSection -->
    <div class="collectionsSection collectionsSection5 mainSliderSection">
        <div class="collectionsSectionInn">
            <div class="col-md-offset-1 col-md-10">
                <h2 class="heading-center">Collections</h2>
                <div class="space30"></div>
                <div class="row">
                    <div class="owl-carousel" id="collectionSlider">
                        <?php
                        $args_collectionsquery = array(
                            'post_type' => array('product'),
                            'order' => 'DESC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'collections',
                                    'terms' => array(16),
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

<?php
/**
Template Name: FAQs Template
*/

get_header();
?>

    <div class="innerPageSection">
        <div class="faqPageSection faqPageSection1">
            <div class="faqPageSectionInner faqPageSectionHead">
                <h1>A gift for you.</h1>
            </div>
            <div class="faqDiscoverBtn">
                <a href="#faqPageDetailSection">Discover</a>
            </div>
        </div>
        <div class="faqPageDetailSection" id="faqPageDetailSection">
            <div class="col-md-offset-1 col-md-10">
                <div class="text-center">
                    <h2 class="headingPrimary">FAQ</h2>
                </div>
                <div class="space40"></div>
                <div class="row faqRow">
                    <?php 
                    $args_faqpostquery = array(
                        'post_type' => array('faqpost'),
                        'posts_per_page' => 4,
                        'order' => 'ASC',
                    );
                    $faqpostquery = new WP_Query( $args_faqpostquery );
                    if ( $faqpostquery->have_posts() ) {
                        while ( $faqpostquery->have_posts() ) {
                            $faqpostquery->the_post(); ?>
                            <div class="col-md-6">
                                <div class="faqBlock">
                                    <div class="faqBlockInner">
                                        <div class="faqBlockIcon">
                                            <?php the_post_thumbnail( array(50,50) ); ?>
                                        </div>
                                        <h3 class="inlineHeading headingPrimary"><?php the_title(''); ?></h3>
                                        <div class="pull-right"><a href="<?php echo catch_that_hyplink(); ?>"><small>View All</small></a></div>
                                        <?php the_content(''); ?>
                                    </div>
                                </div>
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

<?php
get_footer();

<?php
/**
Template Name: About Template
*/

get_header();
?>

    <div class="innerPageSection">
        <?php 
        $args_aboutpostquery = array(
            'post_type' => array('aboutpost'),
            'posts_per_page' => 1,
            'order' => 'ASC',
            'p' => 235,
        );
        $aboutpostquery = new WP_Query( $args_aboutpostquery );
        if ( $aboutpostquery->have_posts() ) {
            while ( $aboutpostquery->have_posts() ) {
                $aboutpostquery->the_post(); ?>
                <div class="abtPageSection abtPageSection1">
                    <div class="abtPageSectionInner abtPageSectionHead">
                        <h1><?php the_title(''); ?></h1>
                    </div>
                </div>
                <div class="abtPageSection abtPageSection1">
                    <div class="abtPageSectionInner">
                        <div class="col-md-offset-3 col-md-6 text-justify">
                            <?php the_content(''); ?>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo '<h4>Nost posts</h4>';
        }
        wp_reset_postdata();
        ?>        
        <div class="abtPageSection abtPageSliderCol">
            <div class="owl-carousel" id="abtPageSlider">
                <?php
                $args_aboutpostquery2 = array(
                    'post_type' => array('aboutpost'),
                    'posts_per_page' => 7,
                    'order' => 'ASC',
                    'post__not_in' => array( 235, ),
                );
                $aboutpostquery2 = new WP_Query( $args_aboutpostquery2 );
                if ( $aboutpostquery2->have_posts() ) {
                    while ( $aboutpostquery2->have_posts() ) {
                        $aboutpostquery2->the_post(); ?>
                        <div class="item">
                            <div class="abtPageSectionInner abtPageSectionInnerCenter">
                                <div class="col-md-6">
                                    <div class="abtSliderItem text-justify">
                                        <?php the_content(''); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo '<h4>Nost posts</h4>';
                }
                wp_reset_postdata();
                ?>
                <!--<div class="item">
                    <div class="abtPageSectionInner abtPageSectionInnerCenter">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="abtSliderItem text-right">
                                <h4>FLEURDELIS has hold onto this millennial philosophy of resistance going hand in hand with poise, embracing it as a seed. But the seed by itself doesn’t create a prairie, it needs gentle and dedicated hands to look after it, watering it everyday with detail and most of all, love. Only in that manner, the seed will begin to sprout from the ground, its stem growing and its blossom hidden; until one day, unexpectedly, it blooms. Such as the splendorous flower, FLEURDELIS has carried a similar time-lapse.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="abtPageSectionInner abtPageSectionInnerTop">
                        <div class="col-md-offset-1 col-md-6">
                            <div class="abtSliderItem text-justify">
                                <h4>Created in 2017, the brand was inspired by icon that lilies have represented in time, as well as through other women who carried the virtues of the lily flower: Elegance and savviness with a touch of delicacy. Along refreshing desires of designing luxurious, precious artworks, caring hands and the ticking of clocks, FLEURDELIS has imagined the fusion of two embellishments that define much of a woman’s style, jewelry and handbags, with the purpose of turning it into something real.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="abtPageSectionInner abtPageSectionInnerCenter">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="abtSliderItem text-justify">
                                <h4>However, these jeweled purses are not made by chance, as FLEURDELIS doesn't enter into a simple process: The designs emerge in the United Arab Emirates, where meticulous minds discover the elements, textures and colors every handbag needs, reflecting those that appear on different lily flowers. In Spain, a constant, careful artisanship follows, and it’s in this stage where pieces are crafted to fit softly on the gems, assuring detail and quality during the making. Every FLEURDELIS handbag contains different jewelry parts, which can be removed easily to be worn in endless ways; allowing you to give an exuberant, feminine touch into your everyday style.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="abtPageSectionInner abtPageSectionInnerBottom">
                        <div class="col-md-offset-1 col-md-6">
                            <div class="abtSliderItem text-justify">
                                <h4>A perfect mixture is what makes them, but the story the purses carry is what defines them, as they’re uniquely made. Individually, each one represents a lily petal, and every petal takes the symbol of a quality. Youth, purity, promise, passion, beauty and love compose these handbags, engulfing in the chosen essence like nectar and transforming into the embodiment of it.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="abtPageSectionInner abtPageSectionInnerCenter">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="abtSliderItem text-justify">
                                <h4>FLEURDELIS, truthful to its spirit, combines the spellbinding aura of the Arabian Peninsula with the commitment to artistry from Spanish craftsmen, providing you with a myriad of charm and an excellence in materials that lasts through time.</h4>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(''); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php
get_footer();

<?php

/**
Template Name: Vision & Mission Template
 */

get_header();
?>

<div class="innerPageSection">

    <!-- Mission section -->
    <div class="abtPageSection" id="missionSection">
        <div class="abtPageSectionInner abtPageSectionHead visionMissionHead">
            <div class="visionMissionRotateHeading">
                <div>
                    <a href="#visionSection">Vision</a>
                    <span></span>
                    <a class="activeLinkVisionMission" href="#missionSection">Mission</a>
                </div>
            </div>
            <h1>The Reveal of <br />Your Essence.</h1>
        </div>
    </div>
    <div class="abtPageSection abtPageSliderCol">
        <div class="owl-carousel" id="visionMissionSlider">
            <?php
            $args_missionpostquery = array(
                'post_type' => array('missionpost'),
                'posts_per_page' => 7,
                'order' => 'ASC',
            );
            $missionpostquery = new WP_Query($args_missionpostquery);
            if ($missionpostquery->have_posts()) {
                while ($missionpostquery->have_posts()) {
                    $missionpostquery->the_post(); ?>
                    <div class="item visionMissionItems">
                        <div class="abtPageSectionInner abtPageSectionInnerCenter">
                            <div class="visionMissionRotateHeading">
                                <div>
                                    <a href="#visionSection">Vision</a>
                                    <span></span>
                                    <a class="activeLinkVisionMission" href="#missionSection">Mission</a>
                                </div>
                            </div>
                            <div class="col-md-offset-3 col-md-6">
                                <div class="abtSliderItem text-center">
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
        </div>
    </div>

    <!-- Vision section -->
    <div class="abtPageSection" id="visionSection">
        <div class="abtPageSectionInner abtPageSectionHead visionMissionHead">
            <div class="visionMissionRotateHeading">
                <div>
                    <a class="activeLinkVisionMission" href="#visionSection">Vision</a>
                    <span></span>
                    <a href="#missionSection">Mission</a>
                </div>
            </div>
            <h2 class="h1SecondHead">A Glistening<br /> Journey.</h2>
        </div>
    </div>
    <div class="abtPageSection abtPageSliderCol">
        <div class="owl-carousel" id="visionMissionSlider">
            <?php
            $args_visionpostquery = array(
                'post_type' => array('visionpost'),
                'posts_per_page' => 7,
                'order' => 'ASC',
            );
            $visionpostquery = new WP_Query($args_visionpostquery);
            if ($visionpostquery->have_posts()) {
                while ($visionpostquery->have_posts()) {
                    $visionpostquery->the_post(); ?>
                    <div class="item visionItemsOnly">
                        <div class="abtPageSectionInner abtPageSectionInnerCenter">
                            <div class="visionMissionRotateHeading">
                                <div>
                                    <a class="activeLinkVisionMission" href="#visionSection">Vision</a>
                                    <span></span>
                                    <a href="#missionSection">Mission</a>
                                </div>
                            </div>
                            <div class="col-md-offset-3 col-md-6">
                                <div class="abtSliderItem text-center">
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
        </div>
    </div>

</div>

<?php
get_footer();

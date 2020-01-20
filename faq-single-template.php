<?php
/**
Template Name: FAQs Single page
Template Post Type: post, page
*/

get_header();
?>

    <div class="innerPageSection">
        <div class="faqPageDetailSection">
            <div class="col-md-offset-1 col-md-10">
                <div class="text-center">
                    <h2 class="headingPrimary">FAQ</h2>
                </div>
                <div class="space40"></div>
                <div class="faqPageBlock">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="faqPageColLeft">
                                <a href="#" class="returnCartBtnBlock"><i></i> <span>Back</span></a>
                                <div class="space20"></div>
                                <h1 class="headingPrimary inlineHeading"><?php the_title(''); ?></h1>
                                <div class="pull-right">
                                    <a href="#"><small>Expand All</small></a>
                                </div>
                                <div class="space20"></div>
                                <div class="row">
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                            <?php the_content(''); ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="faqSideContact">
                                <h5 class="headingPrimary">Here to Help</h5>
                                <div class="space15"></div>
                                <p>Have a question we have not answered?</p>
                                <div class="space5"></div>
                                <a href="<?php echo get_option('home'); ?>/contact-us" class="btn btn-primary btn-lg">CONTACT US</a>
                                <div class="space15"></div>
                                <p>Sunday to Thursday: 9am - 6pm GST<br /> (Gulf Standard Time)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();

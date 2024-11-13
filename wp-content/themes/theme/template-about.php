<?php
/*Template Name:About */
?>
<?php get_header(); ?>

<?php $menu=get_field('menu');?>
<section class="bg-4 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b><?php echo $menu['small_text']?></b></h5>
                                <h2 class="mt-30 mb-15"><?php echo $menu['main_text']?></h2>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">

                <div class="row">
                    <?php $about=get_field('about');?>
                        <div class="col-md-6"><img class="mb-30" src="<?php bloginfo('template_directory'); ?>/images/about-1-600x400.jpg" alt=""></div>
                        <div class="col-md-6"><img class="mb-30" src="<?php bloginfo('template_directory'); ?>/images/about-2-600x400.jpg" alt=""></div>
                        <div class="col-md-12">
                                <div class="mt-50 mt-sm-30 mb-50 mb-sm-30 center-text"> <h2><?php echo $about['heading']?></h2> </div>

                                <h5 class="center-text mb-50 mb-sm-30 plr-25"><?php echo $about['sub_heading']?></h5>
                        </div>
                        <div class="col-md-6">
                                <p class="mb-15"><?php echo $about['left_text']?> </p>
                        </div><!-- col-md-6 -->

                        <div class="col-md-6">
                                <p class="mb-15"><?php echo $about['right_text']?>  </p>
                        </div><!-- col-md-6 -->
                </div><!-- row -->

                <h6 class="center-text mt-40 mt-sm-30 mb-20">
                        <a href="<?php echo $about['left_button_link']?> " class="btn-primaryc plr-25 mb-10 mlr-5"><b><?php echo $about['left_button_text']?> </b></a>
                        <a href="<?php echo $about['right_button_link']['url']?> " class="btn-primaryc secondary plr-50 mlr-5 mb-10"><b><?php echo $about['right_button_text']?> </b></a>
                </h6>

        </div><!-- container -->
</section>


<section class="story-area bg-seller color-white pos-relative">
    <div class="pos-bottom triangle-up"></div>
    <div class="pos-top triangle-bottom"></div>
    <div class="container">
        <div class="heading">
            <img class="heading-img" src="<?php echo get_template_directory_uri(); ?>/images/heading_logo.png" alt="">
            <h2>What Clients Say</h2>
        </div>

        <?php
        // Query for testimonials
        $testimonial_query = new WP_Query([
            'post_type' => 'testimonial',
            'posts_per_page' => -1,
        ]);

        if ($testimonial_query->have_posts()): ?>
            <div class="swiper-container" data-slide-effect="slide" data-autoheight="false" data-swiper-speed="500" data-swiper-margin="25" data-swiper-slides-per-view="3" data-swiper-breakpoints="true" data-scrollbar="true" data-swiper-loop="true" data-swpr-responsive="[1, 2, 2, 2]">
                
                <div class="swiper-wrapper pb-90 pb-sm-60 left-text center-sm-text">
                    <?php while ($testimonial_query->have_posts()): $testimonial_query->the_post(); ?>
                        <?php
                        $client_name = get_field('client_name');
                        $client_role = get_field('client_role');
                        ?>
                        <div class="swiper-slide">
                            <h4><?php the_title(); ?></h4>
                            <div class="color-ash mb-50 mb-sm-30 mt-20"><?php the_content(); ?></div>


                            <?php if (has_post_thumbnail()): ?>
                                <img class="circle-60 mb-20" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
                            <?php else: ?>
                                <img class="circle-60 mb-20" src="<?php echo get_template_directory_uri(); ?>/images/default-avatar.jpg" alt="Default Image">
                            <?php endif; ?>
                            
                            <h6><b class="color-primary"><?php echo esc_html($client_name); ?></b>, <b class="color-ash"><?php echo esc_html($client_role); ?></b></h6>
                        </div><!-- swiper-slide -->
                    <?php endwhile; ?>
                </div><!-- swiper-wrapper -->

                <div class="swiper-pagination"></div>
            </div><!-- swiper-container -->
        <?php else: ?>
            <p>No testimonials available.</p>
        <?php endif; wp_reset_postdata(); ?>
    </div><!-- container -->
</section>


<section class="counter-section section center-text" id="counter">
    <div class="container">
        <div class="row">
            <?php if( have_rows('counters') ): ?>
                <?php while( have_rows('counters') ): the_row(); 
                    // Get subfield values
                    $image = get_sub_field('image');
                    $count = get_sub_field('count');
                    $duration = get_sub_field('duration');
                    $title = get_sub_field('title');
                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-30">
                        <?php if( $image ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>" class="mlr-auto mb-30 icon-gradient" />
                        <?php endif; ?>
                        <h2><b><span class="counter-value" data-duration="<?php echo esc_attr($duration); ?>" data-count="<?php echo esc_attr($count); ?>">0</span></b></h2>
                        <h5 class="semi-black"><b><?php echo esc_html($title); ?></b></h5>
                    </div><!-- margin-b-30 -->
                </div><!-- col-md-3-->
                <?php endwhile; ?>
            <?php endif; ?>
        </div><!-- row-->
    </div><!-- container-->
</section><!-- counter-section-->

<?php get_footer(); ?>
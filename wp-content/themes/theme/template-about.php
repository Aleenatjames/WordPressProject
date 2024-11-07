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
                        <img class="heading-img" src="<?php bloginfo('template_directory'); ?>/images/heading_logo.png" alt="">
                        <h2>What Clients Say</h2>
                </div>

                <div class="swiper-container" data-slide-effect="slide" data-autoheight="false" data-swiper-speed="500" data-swiper-margin="25" data-swiper-slides-per-view="3"
                     data-swiper-breakpoints="true" data-scrollbar="true" data-swiper-loop="true" data-swpr-responsive="[1, 2, 2, 2]">

                        <div class="swiper-wrapper pb-90 pb-sm-60 left-text center-sm-text">
                                <div class="swiper-slide">
                                        <h4>Amazing Pizza</h4>
                                        <p class="color-ash mb-50 mb-sm-30 mt-20">Etiam nec odio vestibulum est mattis
                                                efficiturut magna.Pellentesquesit amet tellus blandit. Etiam nec odio
                                                vestibulum est mattis
                                                effic iturut magna. Pellentesque sit am et tellus blandit. Etiamnec odio
                                                vestibul. </p>
                                        <img class="circle-60 mb-20 " src="<?php bloginfo('template_directory'); ?>/images/quoto-1-200x200.jpg" alt="">
                                        <h6><b class="color-primary">Daiane Smith</b>,<b class="color-ash">Customer</b>
                                        </h6>
                                </div><!-- swiper-slide -->

                                <div class="swiper-slide">
                                        <h4>Amazing Pizza</h4>
                                        <p class="color-ash mb-50 mb-sm-30 mt-20">Etiam nec odio vestibulum est mattis
                                                efficiturut magna.Pellentesquesit amet tellus blandit. Etiam nec
                                                odio vestibulum est mattis
                                                effic iturut magna. Pellentesque sit am et tellus blandit.
                                                Etiamnec odio vestibul. </p>
                                        <img class="circle-60 mb-20" src="<?php bloginfo('template_directory'); ?>/images/quoto-2-200x200.jpg" alt="">
                                        <h6><b class="color-primary">Daiane Smith</b>,<b class="color-ash">Customer</b>
                                        </h6>
                                </div><!-- swiper-slide -->

                                <div class="swiper-slide">
                                        <h4>The best pastas in town</h4>
                                        <p class="color-ash mb-50 mb-sm-30 mt-20">Nec odio vestibulum est mattis
                                                effic iturut
                                                magna. Pellentesque sit am et tellus blandit.
                                                Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic
                                                iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio. </p>
                                        <img class="circle-60 mb-20" src="<?php bloginfo('template_directory'); ?>/images/quoto-3-200x200.jpg"
                                             alt="">
                                        <h6><b class="color-primary">Michael Williams</b>,<b
                                                class="color-ash">Customer</b></h6>
                                </div><!-- swiper-slide -->

                                <div class="swiper-slide">
                                        <h4>We love it there</h4>
                                        <p class="color-ash mb-50 mb-sm-30 mt-20">Retiam nec odio vestibulum est
                                                mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est
                                                mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. </p>
                                        <img class="circle-60 mb-20"
                                             src="<?php bloginfo('template_directory'); ?>/images/quoto-1-200x200.jpg" alt="">
                                        <h6><b class="color-primary">Shawn Gaines</b>,<b class="color-ash">Customer</b>
                                        </h6>
                                </div><!-- swiper-slide -->
                        </div><!-- swiper-wrapper -->

                        <div class="swiper-pagination"></div>
                </div><!-- swiper-container -->
        </div><!-- container -->
</section>

<section class="counter-section section center-text" id="counter">
        <div class="container">
                <div class="row">
                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30 ">
                                        <i class="mlr-auto mb-30  icon-gradient icon-pizza"></i>
                                        <h2><b><span class="counter-value" data-duration="400" data-count="574">0</span></b>
                                        </h2>
                                        <h5 class="semi-black"><b>Pizza per day</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30">
                                        <i class="mlr-auto mb-30 icon-gradient icon-sea-food"></i>
                                        <h2><b><span class="counter-value" data-duration="1400" data-count="14">0</span></b>
                                        </h2>
                                        <h5 class="semi-black"><b>Sea Food Dshes</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30">
                                        <i class="mlr-auto mb-30 icon-gradient icon-pasta"></i>
                                        <h2><b><span class="counter-value" data-duration="300"
                                                     data-count="3">0</span></b></h2>
                                        <h5 class="semi-black"><b>Pasta Chefs</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30">
                                        <i class="mlr-auto mb-30 icon-gradient icon-salad"></i>
                                        <h2><b><span class="counter-value" data-duration="1000" data-count="52">0</span></b>
                                        </h2>
                                        <h5 class="semi-black"><b>Salads per day</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                </div><!-- row-->
        </div><!-- container-->
</section><!-- counter-section-->
<?php get_footer(); ?>
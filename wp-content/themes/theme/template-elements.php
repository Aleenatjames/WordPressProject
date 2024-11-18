<?php
/*Template Name:Elements */
?>
<?php get_header();
$top = get_field('top');
if ($top['main_heading']):
?>
    <section class="bg-8 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">
                    <?php if ($top['sub_heading']): ?>
                        <h5><b><?php echo $top['sub_heading'] ?></b></h5>
                    <?php endif; ?>
                    <h3 class="mt-30 mb-15"><?php echo $top['main_heading'] ?></h3>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="story-area left-text center-sm-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-20">
                    <?php $sent_message = get_field('send_message') ?>
                    <h6 class="dplay-inl-block m-10"><a href="#" class="btn-primaryc plr-25"><b><?php echo $sent_message ?></b></a></h6>
                    <h6 class="dplay-inl-block m-10"><a href="#" class="btn-fill-primary plr-25"><b><?php echo $sent_message ?></b></a></h6>
                    <h6 class="dplay-inl-block m-10"><a href="#" class="btn-primaryc secondary plr-25"><b><?php echo $sent_message ?></b></a></h6>
                    <h6 class=" dplay-inl-block m-10"><a href="#" class="btn-fill-primary secondary plr-25"><b><?php echo $sent_message ?></b></a></h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="story-area left-text center-sm-text pt-0">
    <div class="container">
        <h5 class="font-30 mb-70 mb-sm-40 left-text"><b><?php echo get_field('tab_group')['title'] ?></b></h5>
        <div class="row">

            <?php if (have_rows('tab_group')): ?>
                <?php while (have_rows('tab_group')): the_row(); ?>

                    <!-- Accordion Section -->
                    <div class="col-md-12 col-lg-6">
                        <div class="panel mb-30">
                            <?php if (have_rows('accordion_items')): ?>
                                <?php while (have_rows('accordion_items')): the_row(); ?>
                                    <div class="panel-area mb-30">
                                        <p class="panel-title <?php echo (get_row_index() === 1) ? 'active' : ''; ?>">
                                            <a class="dplay-block" href="#">
                                                <?php the_sub_field('accordion_title'); ?>
                                                <i class="icon minus ion-minus"></i>
                                                <i class="icon plus ion-plus"></i>
                                            </a>
                                        </p>
                                        <p class="panel-desc">
                                            <?php the_sub_field('accordion_description'); ?>
                                        </p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tabs Section -->
                    <div class="col-md-12 col-lg-6">
                        <div class="selecton tab-style-1 mb-10">
                            <div class="row">
                                <?php if (have_rows('tab_items')): ?>
                                    <?php $index = 1; ?>
                                    <?php while (have_rows('tab_items')): the_row(); ?>
                                        <div class="col-sm-4 plr-5 mb-15">
                                            <a href="#" class="ptb-20 dplay-block <?php echo ($index === 1) ? 'active' : ''; ?>" data-select="sec-<?php echo $index; ?>">
                                                <b><?php the_sub_field('tab_title'); ?></b>
                                            </a>
                                        </div>
                                        <?php $index++; ?>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <p>No tabs found.</p>
                                <?php endif; ?>
                            </div>
                        </div>


                        <?php if (have_rows('tab_items')): ?>
                            <?php $index = 1; ?>
                            <?php while (have_rows('tab_items')): the_row(); ?>
                                <div class="sec-<?php echo $index; ?> food-menu ">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?php
                                            $tab_image = get_sub_field('tab_image');
                                            if ($tab_image): ?>
                                                <img class="br-3" src="<?php echo esc_url($tab_image['url']); ?>" alt="<?php echo esc_attr($tab_image['alt']); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="mt-15"><?php the_sub_field('tab_description'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php $index++; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="pt-0">
    <div class="container">
        <h5 class="font-30 mb-70 mb-sm-40 left-text"><b>Loaders</b></h5>

        <div class="row font-beyond">
            <?php
            // Check if there are any loaders defined in ACF
            if (have_rows('loader_items')): // Repeater field for loaders
                while (have_rows('loader_items')): the_row();
                    // Get title and percentage for each loader
                    $title = get_sub_field('loader_title');
                    $percentage = get_sub_field('loader_percent');
            ?>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="radial-prog-area">
                            <div class="radial-progress" data-prog-percent=".<?php echo esc_attr($percentage); ?>">
                                <div></div>
                                <h5 class="progress-title"><?php echo esc_html($title); ?></h5>
                            </div>
                        </div><!-- radial-prog-area-->
                    </div><!-- col-sm-6-->
            <?php
                endwhile;
            else :
                // Fallback content in case no loaders are available
                echo '<p>No loaders found.</p>';
            endif;
            ?>
        </div><!-- row-->
    </div><!-- container-->
</section><!-- radial-progress -->



<section class="counter-section center-text pt-0" id="counter">
    <div class="container">
        <?php $heading1 = get_field('heading1');
        if ($heading1): ?>
            <h5 class="font-30 mb-70 mb-sm-40 left-text"><b><?php echo $heading1 ?></b></h5>
        <?php endif; ?>
        <div class="row">
            <?php if (have_rows('counters')): ?>
                <?php while (have_rows('counters')): the_row();
                    $image = get_sub_field('image');
                    $count = get_sub_field('count');
                    $duration = get_sub_field('duration');
                    $title = get_sub_field('title');
                ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="mb-30">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>" class="mlr-auto mb-30 icon-gradient" />
                            <?php endif; ?>
                            <h2><b><span class="counter-value" data-duration="<?php echo esc_attr($duration); ?>" data-count="<?php echo esc_attr($count); ?>">0</span></b></h2>
                            <h5 class="semi-black"><b><?php echo esc_html($title); ?></b></h5>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div><!-- container-->
</section><!-- counter-section-->



<?php if (have_rows('icon_boxes')) : ?>
    <section class="pt-0">
        <div class="container">
            <?php $heading2 = get_field('heading2');
            if ($heading2): ?>
                <h5 class="font-30 mb-70 mb-sm-40"><b><?php echo $heading2 ?></b></h5>
            <?php endif; ?>
            <div class="row">
                <?php while (have_rows('icon_boxes')) : the_row();
                    $icon_class = get_sub_field('icon_class');
                    $title = get_sub_field('icon_title');
                    $description = get_sub_field('icon_description');
                ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <h4 class="pos-relative mb-20 pt-20">
                            <i class="abs-bl icon-box <?php echo esc_attr($icon_class); ?>"></i>
                            <b class="pl-60"><?php echo esc_html($title); ?></b>
                        </h4>
                        <p class="mb-30"><?php echo esc_html($description); ?></p>
                    </div><!-- col-md-4 -->
                <?php endwhile; ?>
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- counter-section -->
<?php endif; ?>


<?php get_footer(); ?>
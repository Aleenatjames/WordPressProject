<?php get_header(); ?>

<?php $hero = get_field('hero'); ?>

<section class="bg-1 h-900x main-slider pos-relative" style="background:url('<?php the_post_thumbnail_url()?>') !important;background-size:cover !important">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white">

                                <h5><b><?php echo $hero['small_title']; ?></b></h5>
                                <h1 class="mt-30 mb-15"><?php echo $hero['main_title']; ?></h1>
                                <?php if ($hero['link']): ?>
                                        <h5><a href="<?php echo $hero['link']; ?>" class="btn-primaryc plr-25"><b><?php echo $hero['link_text']; ?></b></a></h5>
                                <?php endif; ?>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<?php $info = get_field('main_information') ?>
<section class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="<?php bloginfo('template_directory'); ?>/images/heading_logo.png" alt="">
                        <h2>Our Story</h2>
                </div>

                <div class="row">
                        <div class="col-md-6">
                                <?php echo $info['left_side'] ?>
                        </div><!-- col-md-6 -->

                        <div class="col-md-6">
                                <?php echo $info['right_side'] ?>
                        </div><!-- col-md-6 -->
                </div><!-- row -->
        </div><!-- container -->
</section>


<?php

// Check rows exists.
if (have_rows('best_seller_details')): ?>
        <section class="story-area bg-seller color-white pos-relative">
                <div class="pos-bottom triangle-up"></div>
                <div class="pos-top triangle-bottom"></div>
                <div class="container">
                        <div class="heading">
                                <img class="heading-img" src="images/heading_logo.png" alt="">
                                <h2>Best Sellers</h2>
                        </div>

                        <div class="row">

                                <?php
                                // Loop through rows.
                                while (have_rows('best_seller_details')) : the_row();

                                        // Load sub field value.
                                        $image = get_sub_field('image');
                                        $title = get_sub_field('title');
                                        $price = get_sub_field('price');
                                        $link = get_sub_field('link');
                                        $tags = get_sub_field('tag');
                                ?>

                                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                                <div class="center-text mb-30">
                                                        <div class="ïmg-200x mlr-auto pos-relative">
                                                                <?php
                                                                if (is_array($tags)) {
                                                                        if (in_array('offer', $tags)) : ?>
                                                                                <h6 class="ribbon-cont">
                                                                                        <div class="ribbon primary"></div><b>OFFER</b>
                                                                                </h6>
                                                                        <?php elseif (in_array('speciality', $tags)) : ?>
                                                                                <h6  class="ribbon-cont"><div class="ribbon secondary"></div><b>SPECIALITY</b></h6>
                                                                        <?php elseif (in_array('plus size', $tags)) : ?>

                                                                                <h6 class="ribbon-cont color-black">
                                                                                        <div class="ribbon white"></div><b>PLUS SIZE</b>
                                                                                </h6>
                                                                <?php endif;
                                                                }
                                                                ?>
                                                                <img src="<?php echo $image['sizes']['product_image_small'] ?>" alt="">
                                                        </div>
                                                        <h5 class="mt-20"><?php echo $title ?></h5>
                                                        <h4 class="mt-5"><b>$<?php echo $price ?></b></h4>
                                                        <?php if ($link): ?>
                                                                <h6 class="mt-20"><a href="<?php echo $link ?>" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                                                        <?php endif; ?>
                                                </div><!--text-center-->
                                        </div><!-- col-md-3 -->

                                <?php endwhile; ?>
                        </div><!-- row -->

                        <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h6>
                </div><!-- container -->
        </section>
<?php endif; ?>

<section>
    <div class="container">
        <div class="heading">
            <img class="heading-img" src="<?php echo get_template_directory_uri(); ?>/images/heading_logo.png" alt="">
            <h2>Our Menu</h2>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <ul class="selecton brdr-b-primary mb-70">
                    <li><a class="active" href="#" data-select="*" onclick="filterItems('*')"><b>ALL</b></a></li>
                    <?php
                    // Display categories dynamically
                    $categories = get_terms([
                        'taxonomy' => 'food_category',
                        'hide_empty' => true,
                    ]);

                    foreach ($categories as $category) {
                        echo '<li><a href="#" data-select="' . esc_attr($category->slug) . '" onclick="filterItems(\'' . esc_attr($category->slug) . '\')"><b>' . esc_html($category->name) . '</b></a></li>';
                    }
                    ?>
                </ul>
            </div><!--col-sm-12-->
        </div><!--row-->

        <div class="row" id="menu-items">
            <?php
            $menu_query = new WP_Query([
                'post_type' => 'food_items',
                'posts_per_page' => 8,
            ]);

            if ($menu_query->have_posts()):
                while ($menu_query->have_posts()): $menu_query->the_post();
                    $post_categories = get_the_terms(get_the_ID(), 'food_category');
                    $category_classes = '';
                    if ($post_categories && !is_wp_error($post_categories)) {
                        foreach ($post_categories as $post_category) {
                            $category_classes .= ' ' . esc_attr($post_category->slug);
                        }
                    }

                    // Fetch the ACF image field
                    $image = get_field('image');
                    ?>
                    <div class="col-md-6 food-menu<?php echo $category_classes; ?>">
                        <div class="sided-90x mb-30">
                            <div class="s-left">
                                <?php if ($image): ?>
                                    <img class="br-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php else: ?>
                                    <img class="br-3" src="<?php echo get_template_directory_uri(); ?>/images/default-image.jpg" alt="Menu Image">
                                <?php endif; ?>
                            </div><!--s-left-->
                            <div class="s-right">
                                <h5 class="mb-10"><b><?php the_title(); ?></b><b class="color-primary float-right">$<?php echo get_field('price'); ?></b></h5>
                                <p class="pr-70"><?php the_content(); ?></p>
                            </div><!--s-right-->
                        </div><!-- sided-90x -->
                    </div><!-- food-menu -->
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No menu items found.</p>';
            endif;
            ?>
        </div><!-- row -->

        <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAY'S MENU</b></a></h6>
    </div><!-- container -->
</section>



<?php get_footer(); ?>
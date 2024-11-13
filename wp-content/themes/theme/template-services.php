<?php
/*Template Name:Services */
?>
<?php get_header(); ?>

<section class="bg-5 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                    <?php $menu=get_field('menu')?>
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b><?php echo $menu['small_heading']?></b></h5>
                                <h2 class="mt-30 mb-15"><?php echo $menu['large_heading']?></h2>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
    <div class="container">
        <div class="heading">
            <h3>Choose from Pizza</h3>
        </div>
        <div class="row">
            <?php
            // Query Food Items
            $args = array(
                'post_type' => 'food_items',  // Custom post type
                'posts_per_page' => 3,        // Limit to only one item
                'title' => 'Pizza Margherita',  // Only select Pizza Margherita
            );         
               
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    // Get the tags associated with the current food item
                    $tags = wp_get_post_terms(get_the_ID(), 'food_tags');
                    
                    // Get the image from the ACF field
                    $image = get_field('image'); // Replace 'food_image' with the actual ACF field name
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative">
                            <?php 
                            // Check if the food item has a tag 'offer' or 'speciality'
                            if (has_term('offer', 'food_tags')) : ?>
                                <h6 class="ribbon-cont color-white"><div class="ribbon primary"></div><b>OFFER</b></h6>
                            <?php elseif (has_term('speciality', 'food_tags')) : ?>
                                <h6 class="ribbon-cont color-white"><div class="ribbon secondary"></div><b>SPECIALITY</b></h6>
                            <?php endif; ?>

                            <!-- Display the food image from ACF -->
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                                <img src="<?php bloginfo('template_directory'); ?>/images/default-food.png" alt="Food Image">
                            <?php endif; ?>
                        </div>
                        <h5 class="mt-20"><?php the_title(); ?></h5>
                        <h4 class="mt-5 color-primary"><b>$<?php echo get_post_meta(get_the_ID(), 'price', true); ?></b></h4>

                        
                    </div><!-- center-text -->
                </div><!-- col-md-3 -->
            <?php
                endwhile;
            else :
                echo '<p>No food items found.</p>';
            endif;

            wp_reset_postdata(); // Reset the global post object
            ?>
        </div><!-- row -->
    </div><!-- container -->
</section><!-- story-area -->



<section class="bg-lite-blue">
    <div class="container">
        <div class="row">
            <?php
            // WP Query to fetch food items
            $menu_query = new WP_Query([
                'post_type' => 'food_items',
                'posts_per_page' => 8, // Fetch all food items
            ]);

            // Check if there are any posts
            if ($menu_query->have_posts()) :
                // Loop through all the food items
                while ($menu_query->have_posts()) : $menu_query->the_post();
                    // Get the ACF image field for the food item
                    $image = get_field('image');
                    // Get the price from the custom field (adjust if needed)
                    $price = get_field('price');
                    ?>
                    <div class="col-md-6">
                        <div class="sided-90x mb-30">
                            <div class="s-left">
                                <?php if ($image) : ?>
                                    <img class="br-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                    <img class="br-3" src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg" alt="Menu Image">
                                <?php endif; ?>
                            </div><!--s-left-->
                            <div class="s-right">
                                <h5 class="mb-10"><b><?php the_title(); ?></b>
                                    <b class="color-primary float-right">$<?php echo esc_html($price); ?></b></h5>
                                <p class="pr-70"><?php the_content(); ?></p> <!-- Display the content/description -->
                            </div><!--s-right-->
                        </div><!-- sided-90x -->
                    </div><!-- food-menu -->
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No menu items found.</p>';
            endif;
            ?>
        </div><!-- row -->
    </div><!-- container -->
</section>


<section class="story-area bg-seller color-white pos-relative">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
            <?php $banner=get_field('banner');?>
                <h4 class="font-30 font-sm-20  center-text mb-25"><?php echo $banner['banner1']?> <b><?php echo $banner['banner2']?></b> <?php echo $banner['banner3']?></h4>
        </div><!-- container -->
</section>


<section>
    <div class="container">
        <div class="heading mb-sm-10"><h3>Choose from Pasta</h3></div>
        <div class="row">
            <?php
                // Custom query to get Food Items in the "Pasta" category
                $pasta_query = new WP_Query(array(
                    'post_type' => 'food_items',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'food_category',
                            'field'    => 'slug',
                            'terms'    => 'pasta', // Make sure this matches your taxonomy term for Pasta
                        ),
                    ),
                ));

                // Loop through "Pasta" category items
                if ($pasta_query->have_posts()) :
                    while ($pasta_query->have_posts()) : $pasta_query->the_post();
                        // Get the ACF image field URL
                        $image = get_field('image'); // Replace 'image' with your actual ACF field name
                        $image_url = $image['url'];
            ?>
                        <div class="col-md-12 col-lg-6">
                            <div class="sided-220x responsive mb-30 left-text center-sm-text">
                                <div class="s-left mlr-sm-auto">
                                    <?php if ($image_url): ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="s-right">
                                    <h5><?php the_title(); ?></h5>
                                    <h4 class="mtb-10"><b class="color-primary">$<?php echo get_post_meta(get_the_ID(), 'price', true); ?></b></h4>
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                        </div>
            <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
        </div><!-- row-->

        <div class="brder-t-light mt-sm-10 mb-60 mb-sm-40"></div>

        <!-- Start General Menu Items Section -->
        <div class="row">
            <?php
                // Custom query to get other food items excluding Pasta category
                $general_query = new WP_Query(array(
                    'post_type' => 'food_items',
                    'posts_per_page' => 4, // Set to the number of additional items to display
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'food_category',
                            'field'    => 'slug',
                            'terms'    => 'pasta',
                            
                        ),
                    ),
                ));

                // Loop through other food items
                if ($general_query->have_posts()) :
                    while ($general_query->have_posts()) : $general_query->the_post();
                        // Get the ACF image field URL
                        $image = get_field('image'); // Replace 'image' with your actual ACF field name
                        $image_url = $image['url'];
            ?>
                        <div class="col-md-6">
                            <div class="sided-90x mb-30">
                                <div class="s-left">
                                    <?php if ($image_url): ?>
                                        <img class="br-3" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="s-right">
                                    <h5 class="mb-10"><b><?php the_title(); ?></b><b class="color-primary float-right">$<?php echo get_post_meta(get_the_ID(), 'price', true); ?></b></h5>
                                    <p class="pr-70"><?php the_content(); ?></p>
                                </div>
                            </div>
                        </div>
            <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
        </div><!-- row -->
    </div><!-- container -->
</section>


<?php get_footer(); ?>
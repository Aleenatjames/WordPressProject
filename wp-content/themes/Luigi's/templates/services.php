<?php
/*Template Name:Services */

get_header(); 
$menu = get_field('menu'); 
if ($menu && isset($menu['large_heading']) && $menu['large_heading']): ?>
    <section class="bg-5 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">
                    <?php if (isset($menu['small_heading']) && $menu['small_heading']): ?>
                        <h5><b><?php echo esc_html($menu['small_heading']); ?></b></h5>
                    <?php endif; ?>
                    <h2 class="mt-30 mb-15"><?php echo esc_html($menu['large_heading']); ?></h2>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="story-area left-text center-sm-text">
    <div class="container">
        <div class="heading">
            <?php 
            $pizza = get_field('pizza'); 
            if ($pizza): ?>
                <h3><?php echo esc_html($pizza); ?></h3>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'food_items',
                'posts_per_page' => 4,
                'order' => 'ASC',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $tags = wp_get_post_terms(get_the_ID(), 'food_tags');
                    $image = get_field('image');
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="center-text mb-30">
                            <div class="img-200x mlr-auto pos-relative">
                                <?php
                                if (has_term('offer', 'food_tags')) : ?>
                                    <h6 class="ribbon-cont color-white">
                                        <div class="ribbon primary"></div><b>OFFER</b>
                                    </h6>
                                <?php elseif (has_term('speciality', 'food_tags')) : ?>
                                    <h6 class="ribbon-cont color-white">
                                        <div class="ribbon secondary"></div><b>SPECIALITY</b>
                                    </h6>
                                <?php endif; ?>

                                <?php if ($image) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-food.png'); ?>" alt="Food Image">
                                <?php endif; ?>
                            </div>
                            <h5 class="mt-20"><?php the_title(); ?></h5>
                            <h4 class="mt-5 color-primary"><b>$<?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?></b></h4>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
                echo '<p>No food items found.</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>


<section class="bg-lite-blue">
    <div class="container">
        <div class="row">
            <?php
            $menu_query = new WP_Query([
                'post_type' => 'food_items',
                'posts_per_page' => 8,
            ]);

            if ($menu_query->have_posts()) :
                while ($menu_query->have_posts()) : $menu_query->the_post();
                    $image = get_field('image');
                    $price = get_field('price');
            ?>
                    <div class="col-md-6">
                        <div class="sided-90x mb-30">
                            <div class="s-left">
                                <?php if ($image) : ?>
                                    <img class="br-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php else : ?>
                                    <img class="br-3" src="<?php echo esc_url(get_template_directory_uri() . '/images/default-image.jpg'); ?>" alt="Menu Image">
                                <?php endif; ?>
                            </div>
                            <div class="s-right">
                                <h5 class="mb-10">
                                    <b><?php the_title(); ?></b>
                                    <b class="color-primary float-right">$<?php echo esc_html($price); ?></b>
                                </h5>
                                <p class="pr-70"><?php the_content(); ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No menu items found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<section class="story-area bg-seller color-white pos-relative">
    <div class="pos-bottom triangle-up"></div>
    <div class="pos-top triangle-bottom"></div>
    <div class="container">
        <?php 
        $banner = get_field('banner'); 
        if ($banner): ?>
            <h4 class="font-30 font-sm-20 center-text mb-25">
                <?php echo esc_html($banner['banner1']); ?> 
                <b><?php echo esc_html($banner['banner2']); ?></b> 
                <?php echo esc_html($banner['banner3']); ?>
            </h4>
        <?php endif; ?>
    </div>
</section>

<section>
    <div class="container">
        <div class="heading mb-sm-10">
            <?php 
            $pasta = get_field('pasta');
            if ($pasta): ?>
                <h3><?php echo esc_html($pasta); ?></h3>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php
            $pasta_query = new WP_Query(array(
                'post_type' => 'food_items',
                'posts_per_page' => 2,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'food_category',
                        'field'    => 'slug',
                        'terms'    => 'pasta',
                    ),
                ),
            ));

            if ($pasta_query->have_posts()) :
                while ($pasta_query->have_posts()) : $pasta_query->the_post();
                    $image = get_field('image');
                    $image_url = $image['url'] ?? ''; // Default to an empty string if no image URL
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
                                <h4 class="mtb-10">
                                    <b class="color-primary">
                                        $<?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?>
                                    </b>
                                </h4>
                                <p><?php the_content(); ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="brder-t-light mt-sm-10 mb-60 mb-sm-40"></div>

        <div class="row">
            <?php
            $general_query = new WP_Query(array(
                'post_type' => 'food_items',
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'food_category',
                        'field'    => 'slug',
                        'terms'    => 'pasta',
                    ),
                ),
            ));

            if ($general_query->have_posts()) :
                while ($general_query->have_posts()) : $general_query->the_post();
                    $image = get_field('image');
                    $image_url = $image['url'] ?? ''; // Default to an empty string if no image URL
            ?>
                    <div class="col-md-6">
                        <div class="sided-90x mb-30">
                            <div class="s-left">
                                <?php if ($image_url): ?>
                                    <img class="br-3" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="s-right">
                                <h5 class="mb-10">
                                    <b><?php the_title(); ?></b>
                                    <b class="color-primary float-right">
                                        $<?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?>
                                    </b>
                                </h5>
                                <p class="pr-70"><?php the_content(); ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
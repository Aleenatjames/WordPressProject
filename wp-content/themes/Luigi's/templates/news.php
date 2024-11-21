<?php
/*Template Name:News */

get_header();
$main_heading = get_field('main_heading');
if ($main_heading): ?>
    <section class="bg-7 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">
                    <?php if ($sub_heading = get_field('sub_heading')): ?>
                        <h5><b><?php echo esc_html($sub_heading); ?></b></h5>
                    <?php endif; ?>
                    <h3 class="mt-30 mb-15"><?php echo esc_html($main_heading); ?></h3>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="story-area left-text center-sm-text">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <?php
                $blog_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'ASC',
                ));

                if ($blog_posts->have_posts()) :
                    while ($blog_posts->have_posts()) : $blog_posts->the_post();
                        $post_date = get_field('date');

                        if ($post_date) {
                            $date = DateTime::createFromFormat('Ymd', $post_date);
                            $day = $date->format('d');
                            $month = $date->format('m');
                            $year = $date->format('Y');  // Correct year format
                        }
                ?>
                        <div class="mb-50 mb-sm-30">
                            <div class="pos-relative mb-30 pt-15">
                                <div class="font-8 abs-tl p-20 bg-primary color-white">
                                    <h4><b><?php echo esc_html($day); ?></b></h4>
                                    <h4><b><?php echo esc_html($month); ?></b></h4>
                                    <h4><b><?php echo esc_html($year); ?></b></h4>
                                    <div class="brdr-style-1"></div>
                                </div>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <h4><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a></h4>
                            <h6 class="mt-10 bg-lite-blue dplay-inl-block">
                                <a class="plr-20 mtb-10" href="#"><b>By <?php the_author(); ?></b></a>
                                <a class="plr-20 mtb-10 brder-lr-lite-black-2" href="#"><b>in </b></a>
                                <a class="plr-20 mtb-10" href="<?php comments_link(); ?>"><b><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></b></a>
                            </h6>
                            <p class="mt-30"><?php the_excerpt(); ?></p>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

                <ul class="font-14 mb-30">
                    <?php
                    // This list should dynamically link to actual blog posts
                    if ($blog_posts->have_posts()) :
                        $counter = 1;
                        while ($blog_posts->have_posts()) : $blog_posts->the_post();
                    ?>
                            <li class="color-primary">
                                <a href="<?php the_permalink(); ?>"><b><?php echo sprintf('%02d', $counter++); ?>.</b></a>
                            </li>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
            </div>

            <div class="col-md-5 col-lg-4">
                <div class="mx-w-400x mlr-auto">
                    <?php if (is_active_sidebar('custom-sidebar')) : 
                        dynamic_sidebar('custom-sidebar'); 
                    else : ?>
                        <p>No widgets added to Sidebar Area.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
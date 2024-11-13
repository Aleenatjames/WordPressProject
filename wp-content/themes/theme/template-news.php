<?php
/*Template Name:News */
?>
<?php get_header(); ?>

<section class="bg-7 h-500x main-slider pos-relative">
    <div class="triangle-up pos-bottom"></div>
    <div class="container h-100">
        <div class="dplay-tbl">
            <div class="dplay-tbl-cell center-text color-white pt-90">
                <h5><b>THE BEST IN TOWN</b></h5>
                <h3 class="mt-30 mb-15">Our Blog</h3>
            </div><!-- dplay-tbl-cell -->
        </div><!-- dplay-tbl -->
    </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <?php
                // WP Query to fetch blog posts
                $blog_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3, // Adjust as needed
                    'orderby' => 'date',   // Order by date
                    'order' => 'ASC'
                ));

                if ($blog_posts->have_posts()) :
                    while ($blog_posts->have_posts()) : $blog_posts->the_post();
                        // Get the ACF date field (assuming the field name is 'post_date')
                        $post_date = get_field('date'); // Adjust 'post_date' to match your field name

                        if ($post_date) {
                            // Convert the date to a DateTime object
                            $date = DateTime::createFromFormat('Ymd', $post_date);
                            $day = $date->format('d'); // Day format
                            $month = $date->format('m'); // Month format
                            $year = $date->format('y'); // Year format
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
                    <li class="color-primary"><a href="#"><b> 01.</b></a></li>
                    <li><a href="#"><b> 02.</b></a></li>
                    <li><a href="#"><b> 03.</b></a></li>
                </ul>
            </div><!--col-md-8-->


            <div class="col-md-5 col-lg-4">
                <div class="mx-w-400x mlr-auto">
                    <form class="mb-50 mb-sm-30 mt-sm-30 placeholder-1 form-style-1 pos-relative">
                        <input class="pr-50" type="text" placeholder="Search">
                        <button class="abs-tbr plr-20" type="submit"><i class="ion-android-search"></i></button>
                    </form>

                    <div class="mb-50 mb-sm-30 pos-relative oflow-hidden">
                        <div class="bg-trinagle-primary"></div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/sidebar-1-400x600.jpg" alt="">
                        <div class="abs-bl font-18 color-white p-30 z-1">
                            <h4 class="lh-1">30%</h4>
                            <h4 class="lh-1">off</h4>
                            <h6 class="font-5 mt-10">Combo Pack <b>Pizza + Salad</b></h6>
                        </div>
                    </div><!--mb-50-->

                    <div class="mb-50 mb-sm-30">
                        <h5 class="left-text"><b>Subscribe to our newsletter</b></h5>
                        <form class="placeholder-1 form-style-1 pos-relative">
                            <input class="mtb-20" type="text" placeholder="Your e-mail here">
                            <button class="w-100 btn-primaryc" type="submit">subscribe</button>
                        </form>
                    </div><!--mb-50-->

                    <div class="mb-50 mb-sm-30">
                        <h5 class="mb-30 left-text"><b>Latest Posts</b></h5>

                        <?php
                        // Define a WP_Query to get the latest 3 posts
                        $latest_posts = new WP_Query(array(
                            'post_type' => 'blog', // Change to your custom post type if needed
                            'posts_per_page' => 3, // Display only the latest 3 posts
                        ));

                        // Check if there are posts
                        if ($latest_posts->have_posts()) :
                            // Start the loop to display each post
                            while ($latest_posts->have_posts()) : $latest_posts->the_post();
                                // Retrieve the post's thumbnail URL
                                $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : get_template_directory_uri() . '/images/default-image.jpg';
                                // Retrieve the post date formatted as required
                                $post_date = get_the_date('M d, Y'); // Format as "May 22, 2018"
                        ?>
                                <div class="sided-90x mb-30">
                                    <div class="s-left">
                                        <img class="br-3" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                    </div>
                                    <div class="s-right left-text">
                                        <h6 class="color-semi-black">Recipes</h6>
                                        <h6 class="color-semi-black"><?php the_category(', '); ?></h6>
                                        <h6 class="font-11 mtb-5"><b><a href="#"><?php the_title(); ?></a></b></h6>
                                        <h6 class="color-primary"><b><?php echo esc_html($post_date); ?></b></h6>
                                    </div><!--s-right-->
                                </div><!-- sided-90x -->
                        <?php
                            endwhile;
                            // Reset post data after custom query
                            wp_reset_postdata();
                        else :
                            echo '<p>No posts found.</p>';
                        endif;
                        ?>
                    </div><!--mb-50-->


                    <div class="mb-30 pos-relative">
                        <img src="<?php bloginfo('template_directory'); ?>/images/sidebar-2-400x600.jpg" alt="">
                        <div class="font-23  ptb-15 abs-tlr-30 color-white center-text brdr-primary-3">
                            <div class="abs-tblr bg-black opacty-6 z--1"></div>
                            <h4><b>1 + 1</b></h4>
                            <h6 class="font-5 pb-15"><b>Buy one get one</b></h6>
                        </div>
                    </div><!--mb-50-->

                </div><!--mx-w-500x-->
            </div><!--col-md-4-->
        </div><!-- row -->
    </div><!-- container -->
</section>
<?php get_footer(); ?>
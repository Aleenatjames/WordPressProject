<?php get_header(); ?>

<section class="story-area left-text center-sm-text">
<div class="container">
        <div class="row">
    <div class="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full'); // Use 'medium', 'large', or custom size if needed 
                        ?>
                    </div>
                <?php endif; ?>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
        </div>
</div>
</section>
<?php get_footer(); ?>
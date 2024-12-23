<?php get_header(); ?>

<div class="container pb-5 pt-5">
    <h1><?php single_cat_title(); ?></h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="card mb-4">
                <div class="card-body">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('smallest') ?>" class="img-fluid">
                    <?php endif ?>
                    <h3><?php the_title() ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-success">Read More</a>
                </div>
            </div>
    <?php endwhile;
    endif; ?>

    <?php previous_posts_link();?>
    <?php next_posts_link();?>
</div>

<?php get_footer(); ?>
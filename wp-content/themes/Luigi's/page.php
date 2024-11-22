<?php get_header(); ?>
<section>
    <div class="container pb-5 pt-5">
        <h1><?php the_title(); ?></h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile;
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>
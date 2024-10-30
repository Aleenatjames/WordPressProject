<?php

$locations = get_field('locations');
get_header();
?>

<section class="page">
    <div class="container">
        <h1><?php the_title(); ?></h1>

        <?php foreach ($locations as $post): ?>
            <?php setup_postdata($post);?>
            <?php echo the_title();?>
            <?php echo the_content();?>
            <?php the_field('address');?>
           
        <?php wp_reset_postdata(); endforeach; ?>

    </div>
    

</section>

<?php get_footer(); ?>
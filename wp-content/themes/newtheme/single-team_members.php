<?php

$locations = get_field('locations');

$related_post=get_field('related_post');
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

<BR><BR>
        <?php if($related_post):?>
           <?php foreach($related_post as $post): ?>

            <a href="<?php echo get_the_permalink($post->ID)?>"><?php echo $post->post_title;?></a>
            <?php endforeach; ?>
            <?php endif;?>

    </div>
    

</section>

<?php get_footer(); ?>
<?php get_header();

$title = get_field('page_title');

$description = get_field('description');

$other_description = get_field('other_description');

$my_input = get_field('my_input');

$email = get_field('email');
?>

<div class="container pb-5 pt-5">
    <h1><?php the_title(); ?></h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

    <?php endwhile;
    endif; ?>


    <?php if ($title); ?>
    <h2><?php echo $title; ?></h2>

    <?php if ($description); ?>
    <p><?php echo nl2br($description); ?></p>

    <?php if ($other_description); ?>
    <?php echo $other_description; ?>

    <?php if ($my_input); ?>
    <?php echo (int)$my_input; ?>

    <?php if ($email); ?>
    <a href="mailto:<?php echo $email; ?>">
        <?php echo $email; ?>
    </a>


</div>

<?php get_footer(); ?>
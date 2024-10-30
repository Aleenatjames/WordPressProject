<?php 

/* Template Name:Options*/

$color =get_field('choose_your_color');
$flavor =get_field('choose_a_flavor');
$consent=get_field('do_you_consent');
$button=get_field('where_do_you_want_to_go');
$question =get_field('are_you_learning_anything');

get_header(); ?>

<div class="container pb-5 pt-5">
    <h1><?php the_title();?></h1>

    <?php if (have_posts()) : while(have_posts()) : the_post();?>

    <?php the_content();?>

    <?php endwhile;endif;?>

    <?php if($color)?>
    <strong>Color:</strong>
    <?php echo $color['label'] ?>

    <br>
    <br>

    <?php switch($color['value']){
        case 'red':
                echo 'Danger the color is red';
            break;
    }
    ?>
    <br>
    <?php echo implode(', ', $flavor); ?>
    <br>
    <br>

    <?php echo $consent?>
    <br>
    <?php echo $button ?>
    <br>
    <?php if($question):?>
    Yes,Iam Learning
    
    <?php else: ?>
        No, I am not Learning
    <?php endif; ?>

</div>

<?php get_footer(); ?>
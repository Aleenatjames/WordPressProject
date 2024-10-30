
<?php 

/* Template Name: Content Page*/

$image=get_field('feature_image');
$picture=$image['sizes']['smallest'];
$title=$image['title'];


$file=get_field('upload_a_file');
$filename=$file['filename'];
$fileurl=$file['url'];

get_header(); ?>

<div class="container pb-5 pt-5">
    <h1><?php the_title();?></h1>

    <?php if (have_posts()) : while(have_posts()) : the_post();?>

    <?php the_content();?>

    <?php endwhile;endif;?>

    
    <img src="<?php echo $picture ?>" class="img-fluid" title="<?php echo $title; ?>">
<div>
   <?php if($file);?>
   <a href="<?php echo $fileurl; ?> " download>Download the Image</a>
</div>
</div>

<?php get_footer(); ?>

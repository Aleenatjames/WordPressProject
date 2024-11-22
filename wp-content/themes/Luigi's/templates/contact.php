<?php
/*Template Name:Contact */
?>

<?php get_header();
$main = get_field('main'); 
if (!empty($main) && !empty($main['big_title'])) : ?>
    <section class="bg-6 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">
                    <?php if (!empty($main['small_title'])) : ?>
                        <h5><b><?php echo esc_html($main['small_title']); ?></b></h5>
                    <?php endif; ?>
                    <h3 class="mt-30 mb-15"><?php echo esc_html($main['big_title']); ?></h3>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="story-area left-text center-sm-text">
    <div class="container">
        <div class="heading">
            <img class="heading-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/heading_logo.png" alt="Heading Logo">
            
            <?php 
            $hello = get_field('hello'); // Retrieve the 'hello' field
            
            if (!empty($hello['heading'])) : ?>
                <h2><?php echo esc_html($hello['heading']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($hello['sub_heading'])) : ?>
                <h5 class="mt-10 mb-30"><?php echo esc_html($hello['sub_heading']); ?></h5>
            <?php endif; ?>

            <?php if (!empty($hello['description'])) : ?>
                <p class="mx-w-700x mlr-auto"><?php echo esc_html($hello['description']); ?></p>
            <?php endif; ?>
        </div>

        <form class="form-style-1 placeholder-1">
            <div class="row">
                <div class="col-md-6">
                    <input class="mb-20" type="text" name="name" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input class="mb-20" type="email" name="email" placeholder="E-mail">
                </div>
                <div class="col-md-12">
                    <input class="mb-20" type="text" name="subject" placeholder="Subject">
                </div>
                <div class="col-md-12">
                    <textarea class="h-200x ptb-20" name="message" placeholder="Message"></textarea>
                </div>
            </div>
            
            <?php if (!empty($hello['link']['url']) && !empty($hello['link_text'])) : ?>
                <h6 class="center-text mtb-30">
                    <a href="<?php echo esc_url($hello['link']['url']); ?>" class="btn-primaryc plr-25">
                        <b><?php echo esc_html($hello['link_text']); ?></b>
                    </a>
                </h6>
            <?php endif; ?>
        </form>
    </div>
</section>


<?php get_footer(); ?>
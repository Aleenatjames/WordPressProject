<?php get_header(); ?>

<section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 m-50">
                <div class="col-sm-10 col-sm-offset-1 text-center">
                    <!-- Centering the Icon Using Bootstrap Utilities -->
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <i class="fas fa-exclamation-circle" style="font-size: 100px; color: red;"></i>
						<h1 class="text-center"><?php echo esc_html__('404', 'luigis'); ?></h1>
                    </div>
                    
                    <div class="contant_box_404">
                        <h3 class="h2">
                            <?php echo esc_html__('Looks like you\'re lost', 'luigis'); ?>
                        </h3>

                        <p>
                            <?php echo esc_html__('The page you are looking for is not available!', 'luigis'); ?>
                        </p>
                        
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="link_404">
                            <?php echo esc_html__('Go to Home', 'luigis'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
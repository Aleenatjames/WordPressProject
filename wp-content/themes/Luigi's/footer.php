<footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (function_exists('the_custom_logo')) {
                                the_custom_logo();
                        } ?>
                </a>

                <?php
                $address = get_field('address', 'option');
                $phone = get_field('phone', 'option');
                $email = get_field('email', 'option');
                ?>

                <div class="pt-30">
                        <p class="underline-secondary"><b><?php echo esc_html__('Address:', 'luigis'); ?></b></p>
                        <?php if (!empty($address)) : ?>
                                <p><b><?php echo esc_html($address); ?></b></p>
                        <?php endif; ?>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b><?php echo esc_html__('Phone:', 'luigis'); ?></b></p>
                        <?php if (!empty($phone)) : ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>"><b><?php echo esc_html($phone); ?></b></a>
                        <?php endif; ?>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b><?php echo esc_html__('Email:', 'luigis'); ?></b></p>
                        <?php if (!empty($email)) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><b><?php echo esc_html($email); ?></b></a>
                        <?php endif; ?>
                </div>

                <ul class="icon mt-30">
                        <?php
                        // Retrieve the entire social media links group field
                        $social_media_links = get_field('social_media_links', 'option');
                        ?>

                        <?php if (!empty($social_media_links['pinterest_url']['url'])): ?>
                                <li>
                                        <a href="<?php echo esc_url($social_media_links['pinterest_url']['url']); ?>">
                                                <i class="ion-social-pinterest"></i>
                                        </a>
                                </li>
                        <?php endif; ?>

                        <?php if (!empty($social_media_links['facebook_url']['url'])): ?>
                                <li>
                                        <a href="<?php echo esc_url($social_media_links['facebook_url']['url']); ?>">
                                                <i class="ion-social-facebook"></i>
                                        </a>
                                </li>
                        <?php endif; ?>

                        <?php if (!empty($social_media_links['twitter_url']['url'])): ?>
                                <li>
                                        <a href="<?php echo esc_url($social_media_links['twitter_url']['url']); ?>">
                                                <i class="ion-social-twitter"></i>
                                        </a>
                                </li>
                        <?php endif; ?>

                        <?php if (!empty($social_media_links['dribbble_url']['url'])): ?>
                                <li>
                                        <a href="<?php echo esc_url($social_media_links['dribbble_url']['url']); ?>">
                                                <i class="ion-social-dribbble-outline"></i>
                                        </a>
                                </li>
                        <?php endif; ?>

                        <?php if (!empty($social_media_links['linkedin_url']['url'])): ?>
                                <li>
                                        <a href="<?php echo esc_url($social_media_links['linkedin_url']['url']); ?>">
                                                <i class="ion-social-linkedin"></i>
                                        </a>
                                </li>
                        <?php endif; ?>

                        <?php if (!empty($social_media_links['vimeo_url']['url'])): ?>
                                <li>
                                        <a href="<?php echo esc_url($social_media_links['vimeo_url']['url']); ?>">
                                                <i class="ion-social-vimeo"></i>
                                        </a>
                                </li>
                        <?php endif; ?>
                </ul>

                <p class="color-light font-9 mt-50 mt-sm-30">
                        Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib --- Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a></a></p>
        </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
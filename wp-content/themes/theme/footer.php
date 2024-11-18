<footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                <a href="index.html"> <?php if (function_exists('the_custom_logo')) {
                                                the_custom_logo();
                                        } ?></a>
                <?php
                $title1 = get_field('title1', 'option');
                $address = get_field('address', 'option');
                $title2 = get_field('title2', 'option');
                $phone = get_field('phone', 'option');
                $title3 = get_field('title3', 'option');
                $email = get_field('email', 'option');
                ?>

                <div class="pt-30">
                        <?php if (!empty($title1)) : ?>
                                <p class="underline-secondary"><b><?php echo $title1; ?></b></p>
                        <?php endif; ?>

                        <?php if (!empty($address)) : ?>
                                <p><b><?php echo $address; ?></b></p>
                        <?php endif; ?>
                </div>

                <div class="pt-30">
                        <?php if (!empty($title2)) : ?>
                                <p class="underline-secondary mb-10"><b><?php echo $title2; ?></b></p>
                        <?php endif; ?>

                        <?php if (!empty($phone)) : ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>"><b><?php echo $phone; ?></b></a>
                        <?php endif; ?>
                </div>

                <div class="pt-30">
                        <?php if (!empty($title3)) : ?>
                                <p class="underline-secondary mb-10"><b><?php echo $title3; ?></b></p>
                        <?php endif; ?>

                        <?php if (!empty($email)) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><b><?php echo $email; ?></b></a>
                        <?php endif; ?>
                </div>


                <ul class="icon mt-30">
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
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
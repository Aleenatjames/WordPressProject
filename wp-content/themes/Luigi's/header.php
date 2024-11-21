<!DOCTYPE HTML>
<html lang="en">

<head>
        <title>Luigi's</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <?php wp_head(); ?>

</head>

<body>

        <header>
                <div class="container">
                        <div class="logo">
                                <?php if (function_exists('the_custom_logo')) {
                                        the_custom_logo();
                                } ?>
                        </div>
                        <div class="right-area">
                                <h6><a class="plr-20 color-white btn-fill-primary" href="#">ORDER: +34 685 778 8892</a></h6>
                        </div><!-- right-area -->

                        <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
                        <?php
                        wp_nav_menu(
                                array(
                                        'theme_location' => 'top-menu',
                                        'menu_class' => 'main-menu font-mountainsre',
                                        'container' => 'ul',
                                        'menu_id' => 'main-menu'
                                )
                        );
                        ?>
                        <div class="clearfix"></div>
                </div><!-- container -->
        </header>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php wp_head(); ?>
</head>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" 
                        data-toggle="collapse" 
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top"><?php bloginfo('name');?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php my_menus();?>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" 
                         src="<?php echo get_template_directory_uri()?>/img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name"><?php bloginfo('name');?></span>
                        <hr class="star-light">
                        <span class="skills"><?php bloginfo('description');?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
            <?php
            $query = new WP_Query(array('category_name'=>'portfolio'));
            if ($query->have_posts()) {
                $a = 1;
                while ($query->have_posts()) {
                    $query->the_post(); ?>

                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal<?php echo $a;?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        } else { ?>
                        <img src="<?php echo get_template_directory_uri();?>img/portfolio/cabin.png" 
                             class="img-responsive" alt="">
                          <?php
                        } ?>
                    </a>
                </div>

                    <?php
                    $a++;
                }

                wp_reset_postdata();
            } ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <?php
                $the_query = new WP_Query(
                                    array(
                                        'pagename'=>'about',
                                        'posts_per_page' => 1
                                    )
                            );

                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?>
                        <?php the_content();?>
                        <?php
                    }

                    wp_reset_postdata();
                }
                ?>
                
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" action="<?php echo esc_url(home_url());?>" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control"
                                       placeholder="Name" id="name" 
                                       required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control"
                                       placeholder="Email Address" id="email" 
                                       required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" 
                                       placeholder="Phone Number" id="phone" 
                                       required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control"
                                          placeholder="Message" id="message" 
                                          required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <?php
                if (is_active_sidebar('footer-widget')) {?>
                <div class="row">
                    <?php dynamic_sidebar('footer-widget');?>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php bloginfo('name');?> 2014
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    
    <!-- Portfolio Modals -->
    <?php
    $query = new WP_Query(array('category_name'=>'portfolio'));
    if ($query->have_posts()) {
        $n = 1;
        while ($query->have_posts()) {
            $query->the_post(); ?>

            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $n;?>" 
                 tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2><?php the_title();?></h2>
                                    <hr class="star-primary">
                                     <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('single-thumbnail');
                                    } else {
                                        ?>
                                        <img src="<?php echo get_template_directory_uri();?>/img/portfolio/cabin.png" 
                                             class="img-responsive img-centered" alt="">
                                        <?php
                                    }
                                    ?>
                                    <?php the_content();?>
                                    <ul class="list-inline item-details">
                                        <li>Date Publish :
                                            <strong><?php the_date();?>
                                            </strong>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $n++;
        }
        wp_reset_postdata();
    } ?>

    <?php wp_footer();?>
</body>
</html>

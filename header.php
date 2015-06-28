<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="General" name="rating"/>

        <title><?php bloginfo('name'); ?></title>

        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styles.css" />

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php wp_head(); ?>
    </head>
    
    <body>

        <a class="sr-only" href="#main-content-wrapper">Skip to main content</a>
        
        <header id="main-header">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <button type="button" id="menu-toggle">
                                <span class="sr-only">Toggle Navigation</span>
                                Menu<span class="glyphicon glyphicon-thin-menu" aria-hidden="true"></span>
                            </button>

                            <a class="parent-link" href="//harvest.cals.ncsu.edu/">College of Agriculture and Life&nbsp;Sciences<span class="glyphicon glyphicon-thin-arrow"></span></a>
                            
                            <h1>
                                <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>

                        </div>
                    </div>
                </div>
            </div>
        </header><!-- end #main-header -->
        
        <div id="main-nav">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav>
                                <?php 
                                    $args = array(
                                        'container' => false,
                                        'menu_class' => 'list-unstyled',
                                        'fallback_cb' => 'wp_list_categories',
                                        'title_li' => false,
                                        'depth' => 2
                                    );
                                    wp_nav_menu($args);
                                ?>
                            </nav><!--#global-nav-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end #main-nav -->

        <div id="mobile-nav">
            <div class="wrapper">
                <div class="container">
                    <nav>
                        <ul class="list-unstyled">
                            <li>
                                <a href="//harvest.cals.ncsu.edu/">College of Agriculture and Life&nbsp;Sciences</a>
                            </li>
                            <li>
                                <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                                    <strong><?php bloginfo('name'); ?></strong>
                                </a>
                                <?php 
                                    $args = array(
                                        'container' => false,
                                        'menu_class' => 'list-unstyled',
                                        'fallback_cb' => 'wp_list_categories',
                                        'title_li' => false,
                                        'depth' => 2
                                    );
                                    wp_nav_menu($args);
                                ?>
                            </li>
                        </ul>
                    </nav><!--#global-nav-->
                </div>
            </div>
        </div><!-- end #main-nav -->

        <div id="main-content-wrapper">
        
        
<!DOCTYPE html>
<html>
    <head>  
        <title><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styles.css" />
        <?php wp_head(); ?>
    </head>
    
    <body>
        
        <header id="main-header">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><a href="<?php site_url(); ?>" title="<?php bloginfo('name'); ?>">
                                <img src="<?php bloginfo('template_url'); ?>/img/block-logo.jpg" alt="<?php bloginfo('name'); ?>" />
                            </a></h1>
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
                                <ul>
                                    <li class="active"><a href="#">News</a>
                                    </li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Academics</a></li>
                                    <li><a href="#">Research</a></li>
                                    <li><a href="#">Extension</a></li>
                                    <li><a href="#">Diversity</a></li>
                                    <li><a href="#">Apply</a></li>
                                    <li><a href="#">Give</a></li>
                                </ul>
                            </nav><!--#global-nav-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end #main-nav -->

        <div id="local-nav">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav>
                                <?php 
                                    $args = array(
                                        'container' => false,
                                        'menu_class' => false,
                                        'fallback_cb' => 'wp_list_categories',
                                        'title_li' => false
                                    );
                                    wp_nav_menu($args);
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
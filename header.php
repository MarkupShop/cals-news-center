<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en">
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="General" name="rating"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <meta name="description" content="News from the College of Agriculture and Life Sciences at NC State" />

        <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?> <?php if ( !wp_title('', true, 'left') ); { ?> | <?php bloginfo('description'); ?> <?php } ?></title>

        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styles.css" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

        <!-- OpenGraph & Twitter -->
        <?php if(is_home() || is_archive()): ?>
            <meta property="og:title" content="News from the College of Agriculture and Life Sciences at NC State" />
            <meta property="og:description" content="News from the College of Agriculture and Life Sciences at NC State" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="<?php echo current_page_url(); ?>" />
        <?php else: ?>
            <meta property="og:title" content="<?php the_title(); ?>" />
            <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:url" content="<?php echo get_the_permalink(); ?>" />
            <?php if (has_post_thumbnail()) : ?>
                <?php 
                    $ogImageId = get_post_thumbnail_id();
                    $ogImageUrl = wp_get_attachment_image_src($ogImageId,'thumbnail-size', true);
                ?>
                <meta property="og:image" content="<?php echo $ogImageUrl[0]; ?>" />
            <?php endif; ?>
        <?php endif; ?>
        <meta property="twitter:card" content="summary" />
        <meta property="twitter:site" content="@ncsu_cals" />
        <!-- End OpenGraph -->

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- start wp_head() -->
        <?php wp_head(); ?>
        <!-- end wp_head() -->
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
        
        
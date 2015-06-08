<!DOCTYPE html>
<html>
    <head>  
        <title><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styles.css" />
    </head>
    
    <body>
        
        <header>
            <h1><?php bloginfo('name'); ?></h1>
        </header>
        
        <nav id="global-nav">
            <ul>
            <?php 
                $args = array(
                    'container' => false,
                    'menu_class' => false,
                    'fallback_cb' => 'wp_list_categories',
                    'title_li' => false
                );
                wp_nav_menu($args);
            ?>
            </ul>
        </nav><!--#global-nav-->
        
        
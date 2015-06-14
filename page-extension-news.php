<?php 
/*
Template Name: Perspectives
*/

get_header(); ?>

<div class="secondary span-12">

    <div id="content-secondary">
            <?php global $wp_query; $wp_query = new WP_Query("post_type=extension&post_status=publish"); ?>

                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <!--BEGIN .hentry-->
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <div class="clearfix" style="margin:0 0 20px 0;">
                            <span style="float:left; margin:0 16px 0 0; "><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(300,450)); ?></a></span>
                            <?php the_excerpt(); ?>
                        </div>
                    <!--END .hentry-->

                <?php endwhile; ?>

            
    </div><!-- end #content-secondary -->

    <?php get_sidebar('extension'); ?>

</div><!-- end #secondary -->

<?php get_footer(); ?>
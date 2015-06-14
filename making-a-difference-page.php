<?php 
/*
Template Name: Making a Difference
*/

get_header(); ?>

<div class="secondary span-12">

    <div id="content-secondary">
        
            <h2>Making a Difference</h2>

            <?php global $wp_query; $wp_query = new WP_Query("post_type=difference&post_status=publish"); ?>

                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <!--BEGIN .hentry-->
                        <p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
                    <!--END .hentry-->

                <?php endwhile; ?>

            
    </div><!-- end #content-secondary -->

    <?php get_sidebar(); ?>

</div><!-- end #secondary -->



<?php get_footer(); ?>
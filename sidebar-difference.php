<div id="sidebar">

    <?php global $wp_query; $wp_query = new WP_Query("post_type=making-a-difference&post_status=publish"); ?>
        
    <ul>
        
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    
            <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
            
        <?php endwhile; ?>
        
    </ul>

</div><!-- end #sidebar -->
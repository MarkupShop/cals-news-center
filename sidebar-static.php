<div id="sidebar">
    
    <h3>Latest from Perspectives</h3>
    
    <ul>
    
        <?php global $wp_query; ?>
        <?php $wp_query = new WP_Query("post_type=post&category_name=perspectives&posts_per_page=3"); ?>

        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    
    </ul>

</div><!-- end #sidebar -->
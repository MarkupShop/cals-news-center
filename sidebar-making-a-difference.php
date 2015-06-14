<div id="sidebar">

    <!-- Food Production -->

    <?php global $wp_query; ?>
    <?php $wp_query = new WP_Query(
        array(
            'making-a-difference-issue' => 'foodproduction', 
            'category__and' => array(10,68)
        )
    ); ?>

    <?php if($wp_query->have_posts()): ?>

        <h3 class="difference-title">
            <a href="<?php echo home_url(); ?>/making-a-difference/food-production/">Food Production</a>
        </h3>

        <ul class="difference-list">

            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
            <?php endwhile; ?>

        </ul>

    <?php endif; ?>

    <!-- Environment -->

    <?php global $wp_query; ?>
    <?php $wp_query = new WP_Query(
        array(
            'making-a-difference-issue' => 'environment', 
            'category__and' => array(10,68)
        )
    ); ?>

    <?php if($wp_query->have_posts()): ?>
        
        <h3 class="difference-title">
            <a href="<?php echo home_url(); ?>/making-a-difference/environment/">Environment</a>
        </h3>
            
        <ul class="difference-list">
        
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
            <?php endwhile; ?>

        </ul>

    <?php endif; ?>

    <!-- NC AgAdvantage -->

    <?php global $wp_query; ?>
    <?php $wp_query = new WP_Query(
        array(
            'making-a-difference-issue' => 'ncagadvantage', 
            'category__and' => array(10,68)
        )
    ); ?>

    <?php if($wp_query->have_posts()): ?>

        <h3 class="difference-title">
            <a href="<?php echo home_url(); ?>/making-a-difference/north-carolinas-agadvantage/">North Carolina's AgAdvantage</a>
        </h3>
            
        <ul class="difference-list">

            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
            <?php endwhile; ?>

        </ul>

    <?php endif; ?>

    <?php global $wp_query; ?>
    <?php $wp_query = new WP_Query(
        array(
            'making-a-difference-issue' => 'health-and-well-being-2', 
            'category__and' => array(10,68)
        )
    ); ?>

    <?php if($wp_query->have_posts()): ?>
                
        <h3 class="difference-title">
            <a href="<?php echo home_url(); ?>/making-a-difference/health-and-well-being/">Health and Well-Being</a>
        </h3>
            
        <ul class="difference-list">

            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
            <?php endwhile; ?>

        </ul>

    <?php endif; ?>
        
</div><!-- end #sidebar -->
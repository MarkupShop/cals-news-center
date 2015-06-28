<?php 
/*
Template Name: Strategic Plan Template
*/

get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
    
            <div class="row">

                <div class="col-md-8 col-md-push-4">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php $videoId = get_field('youtube_video'); ?>
                        <?php if(strlen($videoId)>0): ?>
                            <div class="video">
                                <iframe frameborder="0" allowfullscreen
                                    src="//www.youtube.com/embed/<?php echo $videoId; ?>?showinfo=0&rel=0" 
                                ></iframe>
                            </div>
                        <?php else: ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>

                        <div class="story-text">
                            <?php the_content(); ?>
                        </div>

                    <?php endwhile; ?>

                    <?php
                        $args = array(
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                            'category_name' => 'the-strategic-plan'
                        );
                        $wp_query_strat = new WP_Query($args);
                        $cnt = 0;
                    ?>

                    <?php while ($wp_query_strat->have_posts()) : $wp_query_strat->the_post(); ?>

                        <?php if($cnt++ < 6): ?>

                            <article class="story">
        
                                <a href="<?php the_permalink(); ?>">

                                    <h3 class="story-heading"><?php the_title(); ?></h3>
                                    
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="story-thumb-image">
                                            <?php the_post_thumbnail( array(100,450) ); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <p class="story-text">
                                        <?php echo get_the_excerpt(); ?>
                                        <span class="story-arrow glyphicon glyphicon-thin-arrow" aria-hidden="true"></span>
                                    </p>

                                </a>
                            
                            </article>

                        <?php endif; ?>

                <?php endwhile; ?>

                </div>

                <div class="col-md-4 col-md-pull-8">

                    <?php get_sidebar(); ?>

                </div>

            </div>

        </div>

    </div>

</section><!-- end #main -->

<?php get_footer(); ?>
<?php 
/*
Template Name: Perspectives Home
*/

get_header(); ?>

<section id="home-page">

    <?php
        $count = 1;
        $featurePost = new WP_Query(array(
            'post_status' => 'publish',
            'post__in'=>get_option('sticky_posts'),
            'category_name' => 'Perspectives',
            'posts_per_page' => 1
        ));
        $feature_id;
    ?>

    <?php if ($featurePost->have_posts()) : while ($featurePost->have_posts()) : $featurePost->the_post(); ?>

        <?php if($count-- > 0): ?>

            <?php $feature_id = get_the_ID(); ?>
            <?php get_template_part('part','feature-story'); ?>

        <?php endif; ?>

    <?php endwhile; endif; ?>

    <div class="story-grid">

        <div class="wrapper">

            <div class="container">

                <div class="row">

                    <?php
                        // Logic pulled from previous New Center homepage loops
                        $count = 4; // One to make sure we don't overlap with the top feature
                        $args = array(
                            'post_status' => 'publish',
                            'posts_per_page' => $count,
                            'category_name' => 'Perspectives'
                        );
                        $nonFeaturePosts = new WP_Query($args);
                        $showCount = 0;
                    ?>

                    <?php if ($nonFeaturePosts->have_posts()) : while ($nonFeaturePosts->have_posts()) : $nonFeaturePosts->the_post(); ?>

                        <?php if($feature_id === get_the_ID()): ?>

                            <?php $count--; ?>

                        <?php elseif($count-- > 0 && $showCount < 3): ?>

                            <?php $showCount++; ?>
                            <div class="col-md-4">

                                <?php get_template_part('part','grid-story'); ?>

                            </div>

                        <?php endif; ?>

                    <?php endwhile; endif; ?>

                </div>

            </div>

        </div>

    </div><!-- end .story-grid -->

</section><!--#main-->

<?php get_footer(); ?>
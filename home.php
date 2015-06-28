<?php get_header(); ?>

<section id="home-page">

    <?php
        $count = 1;
        $featurePost = new WP_Query(array(
           'post__in'=>get_option('sticky_posts'),
           'posts_per_page' => $count
        ));
    ?>

    <?php if ($featurePost->have_posts()) : while ($featurePost->have_posts()) : $featurePost->the_post(); ?>

        <?php if($count-- > 0): ?>

            <?php get_template_part('part','feature-story'); ?>

        <?php endif; ?>

    <?php endwhile; endif; ?>

    <div class="story-grid">

        <div class="wrapper">

            <div class="container">

                <div class="row">

                    <?php
                        // Logic pulled from previous New Center homepage loops
                        $count = 3;
                        $sticky = get_option('sticky_posts');
                        $args = array(
                            'post_status' => 'publish',
                            'posts_per_page' => $count,
                            'post__not_in'  => $sticky,
                            'category_name' => 'media-releases,extension-news'
                            // 'category__not_in' => array( 10,11,12,13,23,24,25,26,27,28,29,30,31,32,33,34,68,69,70 )
                        );
                        $nonFeaturePosts = new WP_Query($args);
                    ?>

                    <?php if ($nonFeaturePosts->have_posts()) : while ($nonFeaturePosts->have_posts()) : $nonFeaturePosts->the_post(); ?>

                        <?php if($count-- > 0): ?>

                            <div class="col-md-4">

                                <?php get_template_part('part','grid-story'); ?>

                            </div>

                        <?php endif; ?>

                    <?php endwhile; endif; ?>

                </div>

                <div class="row">

                    

                </div>

            </div>

        </div>

    </div><!-- end .story-grid -->

</section><!--#main-->

<?php get_footer(); ?>
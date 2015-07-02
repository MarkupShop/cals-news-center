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
                    <div class="col-md-12">
                        <h2 class="feature-header">Feature Stories | <a href="#">More Stories</a></h2>
                    </div>
                </div>

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

                    <?php get_template_part('part','media-headlines'); ?>
                    <?php get_template_part('part','economic-perspectives'); ?>
                    <?php get_template_part('part','perspectives-mag'); ?>

                </div>

            </div>

        </div>

    </div><!-- end .story-grid -->

</section><!--#main-->

<?php get_footer(); ?>
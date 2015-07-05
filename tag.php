<?php get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
        
            <div class="row">

                <div class="col-md-8 col-md-push-4">
    
                    <?php if (is_tag('you-decide')) { ?>
                        <h2>Mike Walden's You Decide</h2>
                    <?php } elseif (is_category()) { ?>
                        <h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
                    <?php } elseif( is_tag() ) { ?>
                        <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
                    <?php } elseif (is_day()) { ?>
                        <h2>Archive for <?php the_time('F jS, Y'); ?></h2>
                    <?php } elseif (is_month()) { ?>
                        <h2>Archive for <?php the_time('F, Y'); ?></h2>
                    <?php } elseif (is_year()) { ?>
                        <h2>Archive for <?php the_time('Y'); ?></h2>
                    <?php } elseif (is_author()) { ?>
                        <h2>Author Archive</h2>
                    <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                        <h2>Blog Archives</h2>
                    <?php } ?>

                    <?php get_template_part('part','loop'); ?>
                    <?php echo paginate_links(); ?>

                </div>

                <div class="col-md-4 col-md-pull-8">

                    <?php get_sidebar('tag'); ?>

                </div>

            </div>

        </div>

    </div>

</section><!-- end #main -->

<?php get_footer(); ?>
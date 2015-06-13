<?php get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
    
            <div class="row">

                <div class="col-md-8 col-md-push-4">

                    <?php $termTitle = single_term_title("", false); ?>
                    <h2><?php echo $termTitle . " Issue" ?></h2>

                    <?php global $query_string; ?>

                    <!-- Features -->
                    <?php query_posts($query_string . "&category_name=Features"); ?>
                    <?php get_template_part('part','perspectives-story'); ?>
                    <!-- End Features -->

                    <!-- Noteworthy News -->
                    <?php query_posts($query_string . "&category_name=Noteworthy News&nopaging=true"); ?>
                    <?php get_template_part('part','perspectives-story'); ?>
                    <!-- End Noteworthy News -->

                    <!-- Noteworthy Alumni -->
                    <?php query_posts($query_string . "&category_name=Noteworthy Alumni&nopaging=true"); ?>
                    <?php get_template_part('part','perspectives-story'); ?>
                    <!-- End Noteworthy Alumni -->

                    <!-- Noteworthy Giving -->
                    <?php query_posts($query_string . "&category_name=Noteworthy Giving&nopaging=true"); ?>
                    <?php get_template_part('part','perspectives-story'); ?>
                    <!-- End Noteworthy Giving -->

                </div>

                <div class="col-md-4 col-md-pull-8">

                    <?php get_sidebar(); ?>

                </div>

            </div>

        </div>

    </div>

</section><!--#main-->

<?php get_footer(); ?>
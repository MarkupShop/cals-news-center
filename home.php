<?php get_header(); ?>

<section id="home-page">

    <?php get_template_part('part','feature-story'); ?>

    <div class="story-grid">

        <div class="wrapper">

            <div class="container">

                <div class="row">

                    <div class="col-md-4">

                        <?php get_template_part('part','grid-story'); ?>

                    </div>

                    <div class="col-md-4">

                        <?php get_template_part('part','grid-story'); ?>

                    </div>

                    <div class="col-md-4">

                        <?php get_template_part('part','grid-story'); ?>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <?php get_template_part('part','grid-story'); ?>

                    </div>

                    <div class="col-md-4">

                        <?php get_template_part('part','grid-story'); ?>

                    </div>

                    <div class="col-md-4">

                        <?php get_template_part('part','grid-story'); ?>

                    </div>

                </div>

            </div>

        </div>

    </div><!-- end .story-grid -->

</section><!--#main-->

<?php get_footer(); ?>
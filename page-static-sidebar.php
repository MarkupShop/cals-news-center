<?php
/*
Template Name: Static Content w/Sidebar
*/
get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
    
            <div class="row">

                <div class="col-md-8 col-md-push-4">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          
                        <h2><?php the_title(); ?></h2>
          
                        <?php the_content(); ?> 

                    <?php endwhile; else: ?>
          
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
         
                    <?php endif; ?>
          
                </div>

                <div class="col-md-4 col-md-pull-8">

                    <?php get_sidebar(); ?>

                </div>

            </div>

        </div>  

    </div>
    
</section><!--#main-->

<?php get_footer(); ?>
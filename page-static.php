<?php
/*
Template Name: Static Content
*/
get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
    
            <div class="row">

                <div class="col-md-12">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          
                        <h2><?php the_title(); ?></h2>
          
                        <?php the_content(); ?> 

                    <?php endwhile; else: ?>
          
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
         
                    <?php endif; ?>
          
                </div>

            </div>

        </div>  

    </div>
    
</section><!--#main-->

<?php get_footer(); ?>
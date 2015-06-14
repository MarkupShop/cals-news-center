<?php get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
        
            <div class="row">

                <div class="col-md-8 col-md-push-4">

                    <div class="story-single">

                        <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
            
                            <?php 
                                $timestamp = get_the_date('Y-m-d H:i');
                                $formattedTime = date('F j, Y', strtotime($timestamp)); 
                            ?>

                            <h2><?php the_title(); ?></h2>
                            <p class="date">Date posted: <time datetime="<?php echo $timestamp; ?>"><?php echo $formattedTime; ?></time></p>

                            <?php if (has_post_thumbnail() && (!in_category('Student Perspectives'))) { ?>
                                <div class="lead-image">
                                <?php           
                                    the_post_thumbnail( array(300,450) ); 
                                    the_post_thumbnail_caption();
                                ?>
                                </div>
                            <?php } ?>

                            <?php the_content(); ?>

                            <?php echo get_the_term_list( $post->ID, 'perspectives-issues', '<span class="issue">From Issue: ', ', ', '</span>' ); ?> 
                            <?php echo get_the_term_list( $post->ID, 'category', '<span class="cats">Category: ', ', ', '</span>' ); ?> 
                            <?php echo get_the_tag_list('<p class="tags">Tags: ',', ','</p>'); ?>

                            <?php comments_template(); ?>
                            
                        <?php endwhile; endif; ?>

                    </div>
                    
                </div>

                <div class="col-md-4 col-md-pull-8">

                    <?php get_sidebar(); ?>

                </div>

            </div>

        </div>  

    </div>
    
</section><!--#main-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
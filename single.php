<?php get_header(); ?>

<section id="main">
    
    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
        
        <h2><?php the_title(); ?></h2>
        <time><?php the_date(); ?></time>
        <p><?php the_content(); ?></p>
        
    <?php endwhile; endif; ?>
    
</section><!--#main-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
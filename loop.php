<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
    
    <article>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <time><?php echo get_the_date(); ?></time>
        <p><?php the_excerpt(); ?></p>
    </article>

<?php endwhile; else: ?>
    
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    
<?php endif; ?>
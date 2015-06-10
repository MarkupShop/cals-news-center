<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
    
    <article class="story">
        <h2 class="story-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <time><?php echo get_the_date(); ?></time>
        <p>
        	<?php echo get_the_excerpt(); ?>
        	<span class="story-arrow glyphicon glyphicon-thin-arrow" aria-hidden="true"></span>
        </p>
    </article>

<?php endwhile; else: ?>
    
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    
<?php endif; ?>
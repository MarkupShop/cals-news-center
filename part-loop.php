<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
    
    <article class="story">
        
        <h3 class="story-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
        <?php if (has_post_thumbnail()) : ?>
            <div class="story-thumb-image">
                <?php the_post_thumbnail( array(100,450) ); ?>
            </div>
        <?php endif; ?>
        
        <p class="story-text">
        	<?php echo get_the_excerpt(); ?>
        	<span class="story-arrow glyphicon glyphicon-thin-arrow" aria-hidden="true"></span>
        </p>
    
    </article>

<?php endwhile; else: ?>
    
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    
<?php endif; ?>
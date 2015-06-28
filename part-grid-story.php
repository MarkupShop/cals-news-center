<div class="story-grid-item">

	<a href="<?php the_permalink(); ?>">

		<?php if (has_post_thumbnail()) : ?>
            <div class="story-grid-item-image">
                <?php the_post_thumbnail( array(360,300) ); ?>
            </div>
        <?php endif; ?>

	    <h3 class="story-grid-item-heading"><?php the_title(); ?></h3>

	    <p class="story-grid-item-text"><?php echo get_the_excerpt(); ?>
	        <span class="story-arrow glyphicon glyphicon-thin-arrow" aria-hidden="true"></span></p>

	</a>

</div><!-- end .story-grid-item -->
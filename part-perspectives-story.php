<?php if (have_posts()) : ?>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php if (is_category()) : ?>
        <h3><?php single_cat_title(); ?></h3>
    <?php endif; ?>

    <?php while (have_posts()) : the_post(); ?>

        <?php if (function_exists('get_post_type')) : ?>

            <?php $this_post_type = get_this_post_type(); ?>

            <div class="story" name="<?php echo $this_post_type; ?>">
                
                <h4 class="story-heading">
                    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                </h4>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="story-thumb-image">
                        <?php the_post_thumbnail( array(100,450) ); ?>
                    </div>
                <?php endif; ?>

                <p class="story-text">
                	<?php echo rtrim(get_the_excerpt()); ?>
                	<span class="story-arrow glyphicon glyphicon-thin-arrow" aria-hidden="true"></span>
                </p>

            </div><!-- end #post -->

       	<?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>
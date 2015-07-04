<div class="feature-story">

    <div class="feature-story-image">

        <?php if (get_field('webm') || get_field('mpeg')) : ?>
            <div class="story-grid-item-image">
                <video autoplay loop aria-hidden="true">
                    <source src="<?php the_field('webm'); ?>" type="video/webm" />
                    <source src="<?php the_field('mpeg'); ?>" type="video/mp4" />
                </video>
            </div>
        <?php elseif (get_field('feature-image')) : ?>
            <?php $image = get_field('feature-image'); ?>
            <div class="story-grid-item-image">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
            </div>
        <?php endif; ?>
    
    </div>

    <div class="wrapper">

        <div class="container">

            <div class="feature-story-text">
                
                <a href="<?php the_permalink(); ?>">

                    <h2 class="feature-story-heading"><?php the_title(); ?></h2>
                    <p><?php echo get_the_excerpt(); ?>
                        <span class="story-arrow glyphicon glyphicon-thin-arrow" aria-hidden="true"></span></p>

                </a>

            </div>

        </div>

    </div>

</div><!-- end .feature-story -->
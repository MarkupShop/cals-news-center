<?php get_header(); ?>

<div class="secondary span-12">

    <div id="content-secondary">
		 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
          <?php the_content(__('Read more'));?>	
         <?php endwhile; else: ?>
          <p><strong>There has been a glitch in the Matrix.</strong><br />
          There is nothing to see here.</p>
          <p>Please try somewhere else.</p>
         <?php endif; ?>

	</div><!-- end #content-secondary -->

	<?php get_sidebar(); ?>

</div><!-- end #secondary -->

<?php get_footer(); ?>
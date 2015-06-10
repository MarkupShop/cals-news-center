<?php 
/*
Template Name: Search
*/

get_header(); ?>

<div class="secondary span-12">

    <div id="content-secondary">

	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
     <?php endwhile; ?>

      <div id="postnavigation">
       <p><?php next_posts_link('&laquo; Older Entries') ?> <?php previous_posts_link(' | Newer Entries &raquo;') ?></p>
      </div> <!-- end #postnavigation -->


	<?php else: ?>
      <h2>No Results</h2>
      <p>Please feel free try again!</p>
      <p><?php include (TEMPLATEPATH . '/searchform.php'); ?></p>
     <?php endif; ?>

	</div><!-- end #content-secondary -->

	<?php get_sidebar('tag'); ?>

</div><!-- end #secondary -->

<?php get_footer(); ?>
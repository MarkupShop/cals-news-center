<?php get_header(); ?>

<div class="secondary span-12">

    <div id="content-secondary">
	
	<?php is_tag(); ?>
	<?php if (have_posts()) : ?>

   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
   <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
   <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2>Archive for <?php the_time('F jS, Y'); ?></h2>
   <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2>Archive for <?php the_time('F, Y'); ?></h2>
   <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2>Archive for <?php the_time('Y'); ?></h2>
   <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2>Author Archive</h2>
   <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2>Blog Archives</h2>
   <?php } ?>

  <?php while (have_posts()) : the_post(); ?>

  <?php if (function_exists('get_post_type')) $this_post_type = get_this_post_type(); ?>
  <div class="post clearfix" name="<?php echo $this_post_type; ?>">
   <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
   <p><?php //the_time('l, F jS, Y') ?></p>

	<?php if (has_post_thumbnail()) { ?>
        <div class="thumb-image">
        <?php	
            the_post_thumbnail( array(100,450) ); 
        ?>
        </div>
    <?php } ?>

   <?php the_excerpt(); ?>
	<?php //echo get_the_term_list( $post->ID, 'perspectives-issues', 'From Issue: ', ', ', '' ); ?> 
    </div><!-- end #post -->

  <?php endwhile; ?>

  <div id="postnavigation">
   <p><?php next_posts_link('&laquo; Older Entries') ?> <?php previous_posts_link(' | Newer Entries &raquo;') ?></p>
  </div> <!-- end #postnavigation -->
 
 <?php else : ?>

  <h2>Not Found</h2>
  <p>Try using the search form below</p>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>

 <?php endif; ?>

	</div><!-- end #content-secondary -->

		<?php 

            get_sidebar('tag');

        ?>

</div><!-- end #secondary -->

<?php get_footer(); ?>
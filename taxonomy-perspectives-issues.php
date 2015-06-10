<?php get_header(); ?>

<div class="secondary span-12">

	<script type="text/javascript">
        $("li#menu-item-1803").addClass('current-menu-item');
    </script>

    <div id="content-secondary">
	<?php is_tag(); ?>
	<h2 class="issue"><?php echo get_the_term_list( 0, 'perspectives-issues', '', '', ' Issue' ); ?></h2>
	
	<?php 
	// Modify original loop to filter by features.
	global $query_string; ?>

	<!-- BEGIN FEATURES ---------------------------------------------------------------------------------->

	<?php query_posts($query_string . "&category_name=Features"); ?>
	<?php if (have_posts()) : ?>


   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2><?php single_cat_title(); ?></h2>
   <?php } ?>

  <?php while (have_posts()) : the_post(); ?>
  <?php if (function_exists('get_post_type')) $this_post_type = get_this_post_type(); ?>
  <div class="post feature clearfix" name="<?php echo $this_post_type; ?>">
   <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
   <p><?php //the_time('l, F jS, Y') ?></p>

	<?php if (has_post_thumbnail()) { ?>
        <div class="thumb-image">
        <?php
            the_post_thumbnail( array(100,450) );
        ?>
        </div>
    <?php } ?>

   <?php the_excerpt('Read More');  ?><a style="float:right;" href="<?php the_permalink() ?>" rel="bookmark">Read Full Story &raquo;</a>
	<?php //echo get_the_term_list( $post->ID, 'category', 'Category: ', ', ', '' ); ?> 

    </div><!-- end #post -->

  <?php endwhile; ?>
 
 <?php endif; ?>

	<!-- END FEATURES ---------------------------------------------------------------------------------->

	<!-- BEGIN NOTEWORTHY NEWS ---------------------------------------------------------------------------------->


	<?php query_posts($query_string . "&category_name=Noteworthy News&nopaging=true"); ?>
	<?php if (have_posts()) : ?>

   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2 class="section"><?php single_cat_title(); ?></h2>
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

   <?php the_excerpt('Read More »');  ?>
	<?php //echo get_the_term_list( $post->ID, 'category', 'Category: ', ', ', '' ); ?> 

    </div><!-- end #post -->

  <?php endwhile; ?>

  <div id="postnavigation">
   <p><?php //next_posts_link('&laquo; Older Entries') ?> <?php //previous_posts_link(' | Newer Entries &raquo;') ?></p>
  </div> <!-- end #postnavigation -->

 <?php endif; ?>

	<!-- END NOTEWORTHY NEWS ---------------------------------------------------------------------------------->

	<!-- BEGIN NOTEWORTHY ALUMNI ---------------------------------------------------------------------------------->

	<?php query_posts($query_string . "&category_name=Noteworthy Alumni&nopaging=true"); ?>
	<?php if (have_posts()) : ?>

   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2 class="section"><?php single_cat_title(); ?></h2>
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

   <?php the_excerpt('Read More »');  ?>
	<?php //echo get_the_term_list( $post->ID, 'category', 'Category: ', ', ', '' ); ?> 

    </div><!-- end #post -->

  <?php endwhile; ?>

  <div id="postnavigation">
   <p><?php //next_posts_link('&laquo; Older Entries') ?> <?php //previous_posts_link(' | Newer Entries &raquo;') ?></p>
  </div> <!-- end #postnavigation -->
 
 <?php else : ?>

 <?php endif; ?>

	<!-- END NOTEWORTHY ALUMNI ---------------------------------------------------------------------------------->

	<!-- BEGIN NOTEWORTHY GIVING ---------------------------------------------------------------------------------->

	<?php query_posts($query_string . "&category_name=Noteworthy Giving&nopaging=true"); ?>
	<?php if (have_posts()) : ?>

   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2 class="section"><?php single_cat_title(); ?></h2>
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

   <?php the_excerpt('Read More »');  ?>
	<?php //echo get_the_term_list( $post->ID, 'category', 'Category: ', ', ', '' ); ?> 

    </div><!-- end #post -->

  <?php endwhile; ?>

  <div id="postnavigation">
   <p><?php //next_posts_link('&laquo; Older Entries') ?> <?php //previous_posts_link(' | Newer Entries &raquo;') ?></p>
  </div> <!-- end #postnavigation -->
 
 <?php else : ?>


 <?php endif; ?>

	<!-- END NOTEWORTHY GIVING ---------------------------------------------------------------------------------->

	</div><!-- end #content-secondary -->

			<?php 
	
				get_sidebar();

			?>

</div><!-- end #secondary -->

<?php get_footer(); ?>
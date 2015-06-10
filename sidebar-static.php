<div id="sidebar" class="span-3">
	<h4>Latest from Perspectives</h3>
	<ul style="margin:0; padding:0 1em 0 2em;">
 				<?php global $wp_query; $wp_query = new WP_Query("post_type=post&category_name=perspectives&posts_per_page=3"); ?>

                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

						<li style="padding:0 0 1em 0; font-size:11px; font-family:verdana;"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>

				<?php endwhile; ?>
	</ul>

</div><!-- end #sidebar -->
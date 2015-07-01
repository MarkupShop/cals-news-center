<div class="col-md-4">

	<div class="story-grid-item">

		<h3 class="story-grid-item-heading">More Headlines</h3>

		<ul class="list-unstyled">
		<?php
			$count = 8;
			$sticky = get_option('sticky_posts');
			$args = array(
			    'post_status' => 'publish',
			    'posts_per_page' => $count,
			    'post__not_in'  => $sticky,
			    'category_name' => 'media-releases,extension-news'
			);
			$nonFeaturePosts = new WP_Query($args);

			if ($nonFeaturePosts->have_posts()): 
				
				while ($nonFeaturePosts->have_posts()): 
				
					$nonFeaturePosts->the_post();
					$count--;

					if($count < 5 && $count >= 0):

						echo "<li><a href=\"" . get_permalink() . "\">" . get_the_title() . "</a></li>";

					endif;

				endwhile;

			endif;
		?>
		</ul>

	</div><!-- end .story-grid-item -->

</div>
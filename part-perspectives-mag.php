<div class="col-md-4">

	<div class="story-grid-item">

		<?php 
			$issues = get_terms('perspectives-issues', array(
	            "order" => "desc",
	            "orderby" => "id"
	        ));
			$magLink = home_url() . "/perspectives-issues/" . $issues[1]->slug;
	    ?> 

	    <a href="<?php echo $magLink; ?>">

			<h3 class="story-grid-item-heading">Perspectives Magazine</h3>

			<p class="story-grid-item-text">Read stories from NC&nbsp;State's College of Agriculture and Life&nbsp;Sciences magazine.
				<span class="story-arrow glyphicon glyphicon-thin-arrow" aria-hidden="true"></span>
			</p>

		</a>

		<?php
	        // Logic pulled from previous New Center homepage loops
	        $count = 1;
	        $args = array(
	            'post_status' => 'publish',
	            'post_type' => 'magazine',
	            'posts_per_page' => $count
	        );
	        $issuesQuery = new WP_Query($args);
	    ?>

	    <?php if ($issuesQuery->have_posts()) : while ($issuesQuery->have_posts()) : $issuesQuery->the_post(); ?>

	        <?php $id = get_field('id'); ?>

	        <div class="perspectives-embed">
	            <div data-configid="<?php echo $id; ?>" class="issuuembed"></div>
	        </div>
	  
	    <?php endwhile; endif; ?>

	    <script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>

	</div><!-- end .story-grid-item -->

</div>
<?php 
/*
Template Name: Strategic Plan Template
*/

get_header(); ?>

	<div id="content">

		<div id="slideshow" class="span-12 pull-1">

			<div class="strategic-plan-intro">

				<?php while (have_posts()) : the_post(); ?>

					<?php $videoId = get_field('youtube_video'); ?>
					<?php if(strlen($videoId)>0): ?>
						<iframe width="450" height="300" 
							src="//www.youtube.com/embed/<?php echo $videoId; ?>?showinfo=0&rel=0" 
							frameborder="0" allowfullscreen></iframe>
					<?php else: ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>

	                <div class="story-text">
						<?php the_content(); ?>
					</div>

				<?php endwhile; ?>

			</div>
               
		</div><!-- end #slideshow -->

		<div id="headlines" class="span-4">
			<div class="box">

			<?php
				$args = array(
					'post_status' => publish,
					'posts_per_page' => 6,
					'category_name' => 'the-strategic-plan'
				);
				$wp_query_strat = new WP_Query($args);
				$cnt = 0;

			?>
				
                <?php while ($wp_query_strat->have_posts()) : $wp_query_strat->the_post(); ?>

                	<?php if($cnt++ < 3): ?>

                    <!--BEGIN news-story-->
						<div class="clearfix news-story news-story-<?php the_ID(); ?>">
							<h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                            <div class="story-text">
								<?php the_excerpt(); ?>
								
							</div>
						</div>
                    <!--END news-story-->

                	<?php endif; ?>

				<?php endwhile; ?>

			</div>
		</div><!-- end #news -->


		<div id="extension-news" class="span-4">
			<div class="box">

				<?php $wp_query_strat->rewind_posts(); $cnt = 0; ?>
				<?php while ($wp_query_strat->have_posts()) : $wp_query_strat->the_post(); ?>

                	<?php if($cnt++ > 2): ?>

                    <!--BEGIN news-story-->
						<div class="clearfix news-story news-story-<?php the_ID(); ?>">
							<h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                            <div class="story-text">
								<?php the_excerpt(); ?>
								
							</div>
						</div>
                    <!--END news-story-->

                	<?php endif; ?>

				<?php endwhile; ?>

			</div>

		</div><!-- end #news -->


		<div id="economic-perspectives" class="span-4 strat-bar" style="width:312px;">


			<div class="box headlines">
				<ul>
					<?php
						$parent = get_category_by_slug('the-strategic-plan'); 
  						$parent_id = $parent->term_id; 
						$catPeople  = get_category_by_slug('strategic-plan-people');
						
						$catPartnerships  = get_category_by_slug('strategic-plan-partnerships');
						$catPrograms  = get_category_by_slug('strategic-plan-programs');
					$catConversations  = get_category_by_slug('strategic-plan-strategic-conversations');	

						$cats = array($catPeople->term_id, $catPartnerships->term_id, $catPrograms->term_id, $catConversations->term_id);


						wp_list_categories(array(
							'child_of' => $parent_id,
							'title_li' => '',
							'include' => implode(',',$cats),
							'orderby' => 'ID',
							'show_option_none' => '',
							'hide_empty' => 0 // remove this
						)); 
					?>
				</ul>
			</div>


		</div><!-- end #news -->


		<div class="clearfix"></div>
	</div> <!-- end #content -->
<?php get_footer(); ?>
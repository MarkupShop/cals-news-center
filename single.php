<?php get_header(); ?>

<section id="main">

	<div class="wrapper">

		<div class="container">
		
			<div class="row">

				<div class="col-md-8 col-md-push-4">

					<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
        
				        <h2><?php the_title(); ?></h2>
				        <time><?php the_date(); ?></time>
				        <p><?php the_content(); ?></p>
				        
				    <?php endwhile; endif; ?>
					
				</div>

				<div class="col-md-4 col-md-pull-8">

					<?php get_sidebar(); ?>

				</div>

			</div>

		</div>	

	</div>
    
</section><!--#main-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
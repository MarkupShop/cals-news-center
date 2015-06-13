<?php get_header(); ?>

<section id="main">

	<div class="wrapper">

		<div class="container">
		
			<div class="row">

				<div class="col-md-8 col-md-push-4">

					<?php $termTitle = single_term_title("", false); ?>
                    <h2><?php echo $termTitle; ?></h2>

					<?php get_template_part('part','loop'); ?>
					<?php echo paginate_links(); ?>
					
				</div>

				<div class="col-md-4 col-md-pull-8">

					<?php get_sidebar(); ?>

				</div>

			</div>

		</div>	

	</div>
        
</section><!--#main-->

<?php get_Footer(); ?>
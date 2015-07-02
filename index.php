<?php get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
        
            <div class="row">

                <div class="col-md-8 col-md-push-4">

                    <?php if(isset($_GET['cat']) && $_GET['cat'] === "12,11"): ?>
                        <h2>More News</h2>
                    <?php else: ?>
                        <?php $termTitle = single_term_title("", false); ?>
                        <h2><?php echo $termTitle; ?></h2>
                    <?php endif; ?>

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
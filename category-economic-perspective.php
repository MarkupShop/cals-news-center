<?php get_header(); ?>

<section id="main">

    <div class="wrapper">

        <div class="container">
        
            <div class="row">

                <div class="col-md-8 col-md-push-4">

                    <?php $termTitle = single_term_title("", false); ?>
                    <h2><?php echo $termTitle; ?></h2>

                    <?php

                        global $wp_query;

                        $archive_year  = get_query_var('year');
                        $archive_month = get_query_var('monthnum');
                        $archive_day   = get_query_var('day');

                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_status' => 'publish',
                            'category_name' => 'economic-perspective',
                            'posts_per_page' => 10,
                            'orderby' => 'date',
                            'paged' => $paged,
                            'date_query' => array(
                                'after' => date('Y-m-d', strtotime('-9 months')) 
                            )
                        );

                        if($archive_day) {
                            $args['date_query']['day'] = $archive_day;  
                        } 

                        if($archive_month) {
                            $args['date_query']['month'] = $archive_month;
                        } 

                        if($archive_year) {
                            $args['date_query']['year'] = $archive_year;
                        }

                        $wp_query = new WP_Query($args);

                    ?>
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
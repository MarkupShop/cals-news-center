<?php get_header(); ?>

<div class="secondary span-12">

    <div id="content-secondary">


            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>         

                <div id="post-<?php the_ID(); ?>" class="post diffposttype" name="Making a Difference">
                
                <script type="text/javascript">
                    $("li#menu-item-250").addClass('current-menu-item');
                </script>
                

                <?php if (has_post_thumbnail()) { ?>
                    <div class="making-a-difference-header">
                    <h2 class="hidden"><?php the_title(); ?></h2>
                    <?php                           
                        the_post_thumbnail( large ); 
                    ?>
                    </div>
                <?php } else { ?>
                    <h2><?php the_title(); ?></h2>
                <?php } ?>

                <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>

                </div><!-- end .post & #post"#" -->

            <?php endwhile; else: ?>

                <p><strong>There has been a glitch in the Matrix.</strong><br />
                There is nothing to see here. No matter how many times you click 'refresh.'</p>
                <p>Please try somewhere else.</p>

            <?php endif; ?>

    </div><!-- end #content-secondary -->

    <?php get_sidebar('difference'); ?>

</div><!-- end #secondary -->

<?php get_footer(); ?>
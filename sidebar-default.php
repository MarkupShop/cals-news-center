<div id="sidebar">

    <h3>Issues</h3>

    <?php 
        $issues = get_terms('perspectives-issues', array(
            "order" => "desc",
            "orderby" => "id"
        )); 

        if ($issues) {
            
            echo "<ul>";
            
            foreach ($issues as $issue) {
                echo "<li><a href=\"" . home_url() . "/perspectives-issues/{$issue->slug}\">{$issue->name}</a></li>";
            }  
            
            echo "</ul>";
        
        } 
    ?>

    <ul>
        <li><a href="http://www.cals.ncsu.edu/agcomm/magazine/index.html">Older Archives &raquo;</a></li>
    </ul>

    <h3>Sections</h3>

    <ul> 
        <?php wp_list_categories('orderby=id&hide_empty=0&child_of=3&title_li=0'); ?>
    </ul>

    <h3>View the latest print versions of Perspectives</h3>

    <?php
        // Logic pulled from previous New Center homepage loops
        $count = 2;
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

</div><!-- end #sidebar -->
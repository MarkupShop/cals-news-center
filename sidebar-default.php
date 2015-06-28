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

    <div class="perspectives-embed">
        <div data-configid="1573019/11254270" class="issuuembed"></div>
    </div>

    <div class="perspectives-embed">
        <div data-configid="1573019/10568290" class="issuuembed"></div>
    </div>  

    <script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>

</div><!-- end #sidebar -->
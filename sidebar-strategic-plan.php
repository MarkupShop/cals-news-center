<div id="sidebar">
    
    <h3>The Strategic Plan</h3>

    <ul>

        <?php   
            $parent = get_category_by_slug('the-strategic-plan'); 
            $parent_id = $parent->term_id; 
            $catPeople  = get_category_by_slug('strategic-plan-people');
            $catPartnerships  = get_category_by_slug('strategic-plan-partnerships');
            $catPrograms  = get_category_by_slug('strategic-plan-programs');

            $cats = array(
                $catPeople->term_id, 
                $catPartnerships->term_id, 
                $catPrograms->term_id
            );

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

</div><!-- end #sidebar -->
<div id="sidebar" class="span-3">
	<h3>Archives</h3>
	<ul>
		<?php wp_get_archives('type=monthly&cat=11'); ?>
	</ul>
	<ul><li><a href="http://www.ncsu.edu/extensionnews/">Older Archives &raquo;</a></li></ul>
<h3>Sections</h3>
<ul> 
<?php wp_list_categories('orderby=id&hide_empty=0&child_of=11&title_li=0'); ?>
</ul>

</div><!-- end #sidebar -->
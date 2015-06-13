<?php
	if (in_category('the-strategic-plan')) {
		get_sidebar('strategic-plan');
	} else if (in_category('Perspectives')) { 
		get_sidebar('default');
	} else if (in_category('Extension News')) { 			
		get_sidebar('extension');
	} else if (in_category('Media Releases')) { 			
		get_sidebar('media-releases');
	} else if (in_category('Economic Perspective')) { 			
		get_sidebar('economic');
	} else if (in_category('Making a Difference')) { 			
		get_sidebar('making-a-difference');
	} else {
		get_sidebar('default');
	}
?>
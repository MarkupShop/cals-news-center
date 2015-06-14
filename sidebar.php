<?php

    if(is_archive()) {

        if (is_category('the-strategic-plan') || in_category('the-strategic-plan')) {
            get_sidebar('strategic-plan');
        } else if (is_category('Perspectives') || in_category('Perspectives')) {
            get_sidebar('default');
        } else if (is_category('Extension News') || in_category('Extension News')) {
            get_sidebar('extension');
        } else if (is_category('Media Releases') || in_category('Media Releases')) {
            get_sidebar('media-releases');
        } else if (is_category('Economic Perspective') || in_category('Economic Perspective')) {
            get_sidebar('economic');
        } else if (is_category('Making a Difference') || in_category('Making a Difference')) { 
            get_sidebar('making-a-difference');
        } else {
            get_sidebar('default');
        }

    } else {

        if (is_page_template('page-static.php')){
            get_sidebar('static');
        } else if (is_page_template('page-strategic-plan.php')) {
            get_sidebar('strategic-plan');
        } else if (in_category('Perspectives')) { 
            get_sidebar('default');
        } else if (in_category('Extension News')) {             
            get_sidebar('extension');
        } else if (in_category('Media Releases')) {             
            get_sidebar('media-releases');
        }  else if (in_category('Economic Perspective')) {          
            get_sidebar('economic');
        } else if (in_category('Making a Difference')) {            
            get_sidebar('making-a-difference');
        } else {
            get_sidebar('default');
        }

    }
?>
<?php

    /** 
     **  This file is organized in 5 main components:
     ** 
     **  i.   Wordpress Resets
     **  ii.  Custom Post Types
     **  iii. Custom Taxonomies
     **  iv.  Theme Functions
     **  v.   Short Codes
     ** 
     **/

    /*****************************************************************************
    *** i.   Wordpress Resets 
    ******************************************************************************/

    ## Resource: http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters

    if ( function_exists('register_sidebar') ){
        register_sidebar(array('id'=>'sidebar-1'));
    }

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'nav-menus' );
    add_editor_style();
      
    /*****************************************************************************
    *** ii.   Custom Post Types
    *****************************************************************************/
     
    ## Documentation: http://codex.wordpress.org/Post_Types
         
    /*****************************************************************************
    *** iii.  Custom Taxonomies
    ******************************************************************************/
     
    ## Documentation: http://codex.wordpress.org/Taxonomies
      
    register_taxonomy(
        'perspectives-issues',
        'post',
        array(
            'hierarchical' => true,
            'label' => 'Perspectives Issues',
            'query_var' => true,
            'rewrite' => true
        )
    );

    register_taxonomy(
        'making-a-difference-issue',
        'post',
        array(
            'hierarchical' => true,
            'label' => 'Making a Difference',
            'query_var' => true,
            'rewrite' => true
        )
    );

    register_taxonomy(
        'ncce_web',
        'post',
        array(
            'hierarchical' => true,
            'label' => 'Publish to Extension',
            'query_var' => true,
            'rewrite' => true
        )
    );
      
    /*****************************************************************************
    *** iv.  Theme Functions
    ******************************************************************************/

    ## FYI: http://codex.wordpress.org/Functions_File_Explained
     
    function ncsu_show_feed( $source = "", $cnt = 5 , $class = "" ){

        if(!empty($source)){

            // content of feed 
            $feedContent = "";

            // create curl object and set options
            if(strlen($feedContent) < 1){

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL,$source);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);

                // load xml object from curl execution
                $feedContent = curl_exec($curl);
                curl_close($curl);

            } 

            if($feedContent == false || strstr($feedContent,"<title>WordPress &rsaquo; Error</title>")){

                return false;
            
            } else {

                // load curl content into simplexml
                $feedObj = simplexml_load_string($feedContent);
                
                if(count($feedObj->channel->item) < 1)
                    return;
                    
                if(empty($class))       echo "<ul>";
                else                    echo "<ul class=\"$class\">";
                                        
                foreach($feedObj->channel->item as $item){
                    if($cnt-- > $cnt){
                        echo "<li><a href=\"" . $item->link . "\">" . $item->title . "</a> <span>" . date("n/j/Y",strtotime($item->pubDate)) . "</span></li>";
                    }
                }
                
                echo "</ul>";

            }        

        }

    }
     
    function ncsu_show_twitter( $handle = "ncstate" , $cnt = 5 ){

        // json source
        $source = "https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=$handle&count=$cnt";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$source);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);

        // load xml object from curl execution
        $twitterSource = curl_exec($curl);
        curl_close($curl);

        $twitterObj = json_decode($twitterSource);

        if(count($twitterObj) < 1)
            return;

        echo "<ul>";

        foreach($twitterObj as $status){

            $text = $status->text;

            // check for links
            foreach($status->entities->urls as $l){
                $url = $l->url;
                $replace = "<a href=\"" . $url . "\">" . $url . "</a>";
                $text = str_replace( $url , $replace, $text);
            }

            $id = $status->id;
            $time = strtotime($status->created_at);

            echo "<li>" . $text . " &mdash;  <a href=\"https://twitter.com/intent/retweet?tweet_id=" . $id . "\">" . date("n/j/Y, g:h a", $time)  . "</a></li>";
            
        }

        echo "</ul>";

    }

    function the_post_thumbnail_caption() {
        
        global $post;

        $thumbnail_id    = get_post_thumbnail_id($post->ID);
        $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
        if ($thumbnail_image && isset($thumbnail_image[0])) {
            echo '<span class="photocredit">'.$thumbnail_image[0]->post_content.'</span>';  
            echo '<span class="caption">'.$thumbnail_image[0]->post_excerpt.'</span>';
        }

    }

    function dimox_breadcrumbs() {
 
        $delimiter = '&raquo;';
        $name = 'Home'; //text for the 'Home' link
        $currentBefore = '<span class="current">';
        $currentAfter = '</span>';
 
        if ( !is_home() && !is_front_page() || is_paged() ) {
 
            echo '<div id="crumbs">';
 
            global $post;
            
            $home = get_bloginfo('url');
            echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
            if ( is_category() ) {
        
                global $wp_query;
        
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);

                if ($thisCat->parent != 0){ 
                    echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
                }

                echo $currentBefore . 'Archive by category &#39;';
                single_cat_title();
                echo '&#39;' . $currentAfter;
 
            } elseif ( is_day() ) {
                
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                echo $currentBefore . get_the_time('d') . $currentAfter;
 
            } elseif ( is_month() ) {

                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo $currentBefore . get_the_time('F') . $currentAfter;

            } elseif ( is_year() ) {

                echo $currentBefore . get_the_time('Y') . $currentAfter;

            } elseif ( is_single() ) {

                $cat = get_post_type( $post ); the_permalink(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $currentBefore;
                the_title();
                echo $currentAfter;

            } elseif ( is_page() && !$post->post_parent ) {

                echo $currentBefore;
                the_title();
                echo $currentAfter;

            } elseif ( is_page() && $post->post_parent ) {

                $parent_id  = $post->post_parent;
                $breadcrumbs = array();

                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id  = $page->post_parent;
                }

                $breadcrumbs = array_reverse($breadcrumbs);

                foreach ($breadcrumbs as $crumb) {
                    echo $crumb . ' ' . $delimiter . ' ';
                }

            echo $currentBefore;
            the_title();
            echo $currentAfter;

        } elseif ( is_search() ) {

            echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;

        } elseif ( is_tag() ) {

            echo $currentBefore . 'Posts tagged &#39;';
            single_tag_title();
            echo '&#39;' . $currentAfter;

        } elseif ( is_author() ) {

            global $author;
            $userdata = get_userdata($author);
            echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;

        } elseif ( is_404() ) {

            echo $currentBefore . 'Error 404' . $currentAfter;

        }

        if ( get_query_var('paged') ) {

            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
                echo ' (';
            }

            echo __('Page') . ' ' . get_query_var('paged');

            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) 
                    echo ')';
            }

            echo '</div>';

        }

    }

    function get_this_post_type() {

        global $post;

        if ( is_single() ) {
            $cat = get_post_type($post);
            return $cat;
        } else if ( is_archive() ) {
            $cat = get_post_type($post);
            return $cat;
        }

    }

    // Tests if any of a post's assigned categories are descendants of target categories
    if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
        function post_is_in_descendant_category( $cats, $_post = null ) {
            foreach ( (array) $cats as $cat ) {
                // get_term_children() accepts integer ID only
                $descendants = get_term_children( (int) $cat, 'category' );
                if ( $descendants && in_category( $descendants, $_post ) )
                    return true;
            }
            return false;
        }
    }
     
    /*****************************************************************************s
    *** v.  Short Codes
    ******************************************************************************/

    ## Docuementation: http://codex.wordpress.org/Shortcode_API

    add_shortcode('wp_caption', 'custom_img_caption_shortcode');
    add_shortcode('caption', 'custom_img_caption_shortcode');

    function custom_img_caption_shortcode($attr, $content = null) {
        
        // New-style shortcode with the caption inside the shortcode with the link and image tags.
        if ( ! isset( $attr['caption'] ) ) {
            if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
                $content = $matches[1];
                $attr['caption'] = trim( $matches[2] );
            }
        }

        // Allow plugins/themes to override the default caption template.
        $output = apply_filters('img_caption_shortcode', '', $attr, $content);
        if ( $output != '' )
            return $output;

        extract(shortcode_atts(array(
            'id'    => '',
            'align' => 'alignnone',
            'width' => '',
            'caption' => ''
        ), $attr));

        if ( 1 > (int) $width || empty($caption) )
            return $content;
        
        // Grab ID to query post_content [description] field for image
        preg_match('/([\d]+)/', $id, $matches); 

        $description = '';
        if ($matches[0]) {

            global $wpdb;
            $custom_description = $wpdb->get_row("SELECT post_content FROM $wpdb->posts WHERE ID = {$matches[0]};");

            if ($custom_description->post_content) {

                $description = '<p class="wp-custom-description">'. $custom_description->post_content . '</p>';

            }
        }

        if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

        return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">'
        . do_shortcode( $content ) . $description . '<p class="wp-caption-text">' . $caption . '</p></div>';
    
    }

    /*****************************************************************************s
    *** vi.  Sidebars
    ******************************************************************************/

    /*****************************************************************************s
    *** vii.  Feeds
    ******************************************************************************/
    
    remove_all_actions( 'do_feed_rss2' );

    // Custom feed for extension site
    add_action( 'do_feed_rss2', 'ncce_web_feed_rss2', 10, 1 );
    function ncce_web_feed_rss2( $for_comments ) {
        $rss_template = get_template_directory() . '/feeds/feed-rss2-ncce_web.php';
        load_template( $rss_template );
    }

?>
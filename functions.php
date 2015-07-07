<?php

    /** 
     **  This file is organized in 5 main components:
     ** 
     **  i.    Wordpress Resets
     **  ii.   Custom Post Types
     **  iii.  Custom Taxonomies
     **  iv.   Theme Functions
     **  v.    Short Codes
     **  vi.   Sidebars
     **  vii.  Feeds
     **  viii. Menus
     ** 
     **/

    /*****************************************************************************
    *** i.   Wordpress Resets 
    ******************************************************************************/

    ## Resource: http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'nav-menus' );
    add_editor_style();
      
    /*****************************************************************************
    *** ii.   Custom Post Types
    *****************************************************************************/
     
    ## Documentation: http://codex.wordpress.org/Post_Types

    register_post_type( 'magazine',
        array(
            'labels' => array(
                'name' => __( 'Perspectives Magazine Issues' ),
                'singular_name' => __( 'Perspectives Magazine Issue' )
            ),
        'public' => true,
        'has_archive' => false
        )
    );
         
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

    function current_page_url() {
        $pageURL = 'http';
        if( isset($_SERVER["HTTPS"]) ) {
            if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
     
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
     
    /*****************************************************************************
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

    add_shortcode('youtube', 'custom_youtube_shortcode');

    function custom_youtube_shortcode($attr, $content = null) {

        extract(shortcode_atts(array(
            'id' => ''
        ), $attr));

        $output  = '<div class="video">';
        $output .= '<iframe frameborder="0" allowfullscreen src="//www.youtube.com/embed/';
        $output .= esc_attr($id);
        $output .= '?showinfo=0&rel=0"></iframe>';
        $output .= '</div>';

        return $output;

    }

    add_shortcode('gallery', 'custom_gallery_shortcode');
    
    function custom_gallery_shortcode( $attr ) {
        $post = get_post();

        static $instance = 0;
        $instance++;

        if ( ! empty( $attr['ids'] ) ) {
            // 'ids' is explicitly ordered, unless you specify otherwise.
            if ( empty( $attr['orderby'] ) ) {
                $attr['orderby'] = 'post__in';
            }
            $attr['include'] = $attr['ids'];
        }

        $output = apply_filters( 'post_gallery', '', $attr, $instance );
        if ( $output != '' ) {
            return $output;
        }

        $html5 = current_theme_supports( 'html5', 'gallery' );
        $atts = shortcode_atts( array(
            'order'      => 'ASC',
            'orderby'    => 'menu_order ID',
            'id'         => $post ? $post->ID : 0,
            'itemtag'    => $html5 ? 'figure'     : 'dl',
            'icontag'    => $html5 ? 'div'        : 'dt',
            'captiontag' => $html5 ? 'figcaption' : 'dd',
            'columns'    => 3,
            'size'       => 'thumbnail',
            'include'    => '',
            'exclude'    => '',
            'link'       => ''
        ), $attr, 'gallery' );

        $id = intval( $atts['id'] );

        if ( ! empty( $atts['include'] ) ) {
            $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

            $attachments = array();
            foreach ( $_attachments as $key => $val ) {
                $attachments[$val->ID] = $_attachments[$key];
            }
        } elseif ( ! empty( $atts['exclude'] ) ) {
            $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
        } else {
            $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
        }

        if ( empty( $attachments ) ) {
            return '';
        }

        if ( is_feed() ) {
            $output = "\n";
            foreach ( $attachments as $att_id => $attachment ) {
                $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
            }
            return $output;
        }

        $itemtag = tag_escape( $atts['itemtag'] );
        $captiontag = tag_escape( $atts['captiontag'] );
        $icontag = tag_escape( $atts['icontag'] );
        $valid_tags = wp_kses_allowed_html( 'post' );
        if ( ! isset( $valid_tags[ $itemtag ] ) ) {
            $itemtag = 'dl';
        }
        if ( ! isset( $valid_tags[ $captiontag ] ) ) {
            $captiontag = 'dd';
        }
        if ( ! isset( $valid_tags[ $icontag ] ) ) {
            $icontag = 'dt';
        }

        $columns = intval( $atts['columns'] );
        $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
        $float = is_rtl() ? 'right' : 'left';

        $selector = "gallery-{$instance}";

        $gallery_style = '';

        /**
         * Filter whether to print default gallery styles.
         *
         * @since 3.1.0
         *
         * @param bool $print Whether to print default gallery styles.
         *                    Defaults to false if the theme supports HTML5 galleries.
         *                    Otherwise, defaults to true.
         */
        if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
            $gallery_style = "
            <style type='text/css'>
                #{$selector} {
                    margin: 20px 0px;
                }
                #{$selector} .gallery-item {
                    float: {$float};
                    margin-top: 3px;
                    margin-bottom: 0px;
                }
                #{$selector} img {
                    max-width: 100%;
                    height: auto;
                    padding-right: 3px;
                }

                #{$selector} .gallery-caption {
                    margin-left: 0;
                }
                /* see gallery_shortcode() in wp-includes/media.php */
            </style>\n\t\t";
        }

        $size_class = sanitize_html_class( $atts['size'] );
        $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

        /**
         * Filter the default gallery shortcode CSS styles.
         *
         * @since 2.5.0
         *
         * @param string $gallery_style Default CSS styles and opening HTML div container
         *                              for the gallery shortcode output.
         */
        $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

        $i = 0;
        foreach ( $attachments as $id => $attachment ) {

            $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
            if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
                $image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
            } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
                $image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
            } else {
                $image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
            }
            $image_meta  = wp_get_attachment_metadata( $id );

            $orientation = '';
            if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
                $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
            }
            $output .= "<{$itemtag} class='gallery-item'>";
            $output .= "
                <{$icontag} class='gallery-icon {$orientation}'>
                    $image_output
                </{$icontag}>";
            if ( $captiontag && trim($attachment->post_excerpt) ) {
                $output .= "
                    <{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
                    " . wptexturize($attachment->post_excerpt) . "
                    </{$captiontag}>";
            }
            $output .= "</{$itemtag}>";
            
        }

        $output .= "<br style='clear: both' /></div>\n";

        return $output;
    }

    /*****************************************************************************
    *** vi.  Sidebars
    ******************************************************************************/

    if ( function_exists('register_sidebar') ){
        register_sidebar(array('id'=>'sidebar-1'));
    }

    /*****************************************************************************
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
<?php
  
  /*
  
  This file generates our xml sitemap. There is no need
  do anything with this. It is included within 'seo-functions.php'
  
  */ 
  
  
  function seo_create_sitemap() {
    
    /* Set up the Loop */
    $postsForSitemap = get_posts(array(
      'numberposts' => -1,                     // collect all the posts
      'post_type'  => array('post','page'),    // list the post types to collect
      'orderby' => 'modified',                 // order by the date modified
      'order'    => 'DESC'                     // list in descending order
    ));
    
    /* Write the XML document */
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';                          // set the correct doc type
    $sitemap = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';    // open the <urlset>
      
    if ( is_front_page() && is_home() ) {                 // if Front page == Posts Page write an inital <url> entry for our home page
      
      $sitemap = '<url>'.                                 // open the home page <url>
        '<loc>'. get_bloginfo('wpurl') .'</loc>'.         // pull in the wpurl value as the location
        '<priority>1.00</priority>'.                      // set as priority 1 - optional
      '</url>';                                           // close the home page <url>
      
    }
    
    /* Write the <url> sets for our loop */
    foreach($postsForSitemap as $post) {                  // run through each of the posts from our loop
      setup_postdata($post);                              // set up post data so we can access the meta info
      
      $postdate = explode(" ", $post->post_modified);     // retrieve the last date the post was modified
      
      if( !get_field('private_page', $post->ID) ) {       // if the user has NOT opted to hide the page from Search Engine results

        $sitemap .= '<url>'.                              // open the <url> tag
          '<loc>'. get_permalink($post->ID) .'</loc>'.    // retrieve the permalink as <loc>
          '<lastmod>'. $postdate[0] .'</lastmod>'.        // set last modified date - optional
          '<changefreq>monthly</changefreq>'.             // set <changefreq> - optional
        '</url>';                                         // close the <url> tag
        
      }
    }
    
    $sitemap .= '</urlset>';     // close the <urlset>
    
    /* Save the XML document */
    $saveFile = fopen(ABSPATH . "sitemap.xml", 'w');      // if it exists, open the sitemap
    fwrite($saveFile, $sitemap);                          // save the sitemap with our generated code
    fclose($saveFile);                                    // close the sitemap again
  }
  
  /* Tell WordPress when to run our function */
  add_action("publish_post", "seo_create_sitemap");       // on publishing a post
  add_action("publish_page", "seo_create_sitemap");       // on publishing a page
  add_action("trash_post",   "seo_create_sitemap");       // on trashing a post
  add_action("trash_page",   "seo_create_sitemap");       // on trashing a page
  add_action("untrash_post", "seo_create_sitemap");       // on restoring (untrashing) a post
  add_action("untrash_page", "seo_create_sitemap");       // on restoring (untrashing) a page
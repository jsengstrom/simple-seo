<?php

  function seo_create_sitemap() {
    $postsForSitemap = get_posts(array(
      'numberposts' => -1,
      'orderby' => 'modified',
      'post_type'  => array('post','page'),
      'order'    => 'DESC'
    ));
    
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.
      '<url>'.
        '<loc>'. get_bloginfo('wpurl') .'</loc>'.
        '<priority>1.00</priority>'.
      '</url>';
    
    foreach($postsForSitemap as $post) {
      setup_postdata($post);
      
      $postdate = explode(" ", $post->post_modified);
      
      $sitemap .= '<url>'.
        '<loc>'. get_permalink($post->ID) .'</loc>'.
        '<lastmod>'. $postdate[0] .'</lastmod>'.
        '<changefreq>monthly</changefreq>'.
      '</url>';
    }
    
    $sitemap .= '</urlset>';
    
    $fp = fopen(ABSPATH . "sitemap.xml", 'w');
    fwrite($fp, $sitemap);
    fclose($fp);
  }
  
  add_action("publish_post", "seo_create_sitemap");
  add_action("publish_page", "seo_create_sitemap");
  add_action("trash_post",   "seo_create_sitemap");
  add_action("trash_page",   "seo_create_sitemap");
  add_action("untrash_post", "seo_create_sitemap");
  add_action("untrash_page", "seo_create_sitemap");
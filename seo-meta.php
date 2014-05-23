<?php
  
  /*
  
  This file writes our <title> and <description> meta tags,
  and also adds a robots nofollow instruction for pages that
  the user does not want to appear in search engines.
  
  Include this file into your themes 'header.php' file inside the <head>
  to install this part of the module.
  
  */ 
  
  
  /* if front page == posts page */
  if ( is_front_page() && is_home() ) {                                                  // if you do NOT have a static front page
    
    echo "<title>" . get_bloginfo('name') . "</title>";                                  // echo the blog title (in settings)
    echo "<meta name='description' content='" .  get_bloginfo('description') . "'>";     // echo the blog description (in settings)
    
    
  /* pages, posts & static front page */    
  } elseif ( is_page() || is_single() ) {                                                // if you DO have astatic front page, plus other posts & pages
    
    $title = get_field( 'meta_title', $page_id );                                        // set title variable as our custom input
    $description = get_field( 'meta_description', $page_id );                            // set description variable as our custom textarea
    
    if ( $title ) {                                                                      // if our custom input has been used
      echo "<title>" . $title . "</title>";                                              // pull in the title from there
    } else {
      echo "<title>" . get_the_title() . "</title>";                                     // use the post/page title as a fallback
    }
    
    if ( $description ) {                                                                // if our custom textarea has been used
      echo "<meta name='description' content='" .  $description . "'>";                  // pull it into our description (no fallback needed)
    }
    
  /* posts page */  
  } elseif ( is_home() ) {                                                               // if your home page IS static, this is for the posts page
    
    $page_id = get_option( 'page_for_posts' );                                           // set the page id to = the posts page
    
    if ( $title ) {                                                                      // if our custom input has been used
      echo "<title>" . $title . "</title>";                                              // pull in the title from there
    } else {
      echo "<title>" . get_bloginfo('name') . " - Blog</title>";                         // use the blog name as a fallback
    }
    
    if ( $description ) {                                                                // if our custom textarea has been used
      echo "<meta name='description' content='" .  get_bloginfo('name') . "'>";          // pull it into our description (no fallback needed)
    }
    
    
  /* all other page types (eg, 404, search, archives) */  
  } else {
    
    echo "<title>";                                                                      // open the <title> tag
    echo get_bloginfo('name');                                                           // get the blog title first
    echo wp_title('|', true, 'left');                                                    // then call the wp_title function
    echo "</title>";                                                                     // close the <title>
    
  }
  
  
  /* if user chooses to hide the page from search engines */  
  if ( is_search() || get_field('private_page') ) {
    echo '<meta name="robots" content="noindex, nofollow" />';                           // echo the robots nofollow meta tag
  } 
  
?>
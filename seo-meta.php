<?php if ( is_front_page() ) { ?>
 
  <title><?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  
<?php } elseif ( is_page() || is_single() ) { 
  
  $title = get_field( "meta_title" );
  $description = get_field( "meta_description" );
  
  if( $title ) { ?>
    
    <title><?php the_field('meta_title'); ?></title>
    
  <?php } else { ?>
    
    <title><?php the_title(); ?></title>
    
  <?php } if( $description ) { ?>
    
    <meta name="description" content="<?php the_field('meta_description'); ?>">
  
<?php } } else { ?>
  
  <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
  
<?php } ?>

<?php if ( is_search() || get_field('private_page') ) { echo '<meta name="robots" content="noindex, nofollow" />'; } ?>
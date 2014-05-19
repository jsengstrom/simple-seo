<?php 
  
  require_once('seo-sitemap.php');
  
  if( function_exists('register_field_group') ):
  
  register_field_group(array (
    'key' => 'group_533d8805cdba7',
    'title' => 'Simple SEO',
    'fields' => array (
      array (
        'key' => 'field_5342821f6d723',
        'label' => 'General',
        'name' => '',
        'prefix' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
      ),
      array (
        'key' => 'field_533d880cc87b7',
        'label' => 'Meta Title',
        'name' => 'meta_title',
        'prefix' => '',
        'type' => 'text',
        'instructions' => 'This title will show up in Search Engine results. Max 70 characters.',
        'required' => 0,
        'conditional_logic' => 0,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => 70,
        'formatting' => 'none',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_533d889dc87b8',
        'label' => 'Meta Description',
        'name' => 'meta_description',
        'prefix' => '',
        'type' => 'textarea',
        'instructions' => 'This description will show up in Search Engine results. Max 156 characters.',
        'required' => 0,
        'conditional_logic' => 0,
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => 156,
        'rows' => 3,
        'formatting' => 'none',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_5342822e6d724',
        'label' => 'Advanced',
        'name' => '',
        'prefix' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
      ),
      array (
        'key' => 'field_53428187732fb',
        'label' => 'Private Page',
        'name' => 'private_page',
        'prefix' => '',
        'type' => 'true_false',
        'instructions' => 'Check this box to discourage Search Engines from indexing this page.',
        'required' => 0,
        'conditional_logic' => 0,
        'message' => 'Hide from Search Engines?',
        'default_value' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'snippets',
        ),
      ),
    ),
    'menu_order' => 100,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'field',
    'hide_on_screen' => '',
  ));

  endif;
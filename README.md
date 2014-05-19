Simple SEO for Wordpress
========================

A very simple SEO module for integration into Wordpress themes.

Built upon ACF (http://www.advancedcustomfields.com) by Elliot Condon. This module allows the author to specify a page title and meta description, and to choose to hide the post/page from Search Engines all together if they wish. Finally, it will auto generate/update an XML sitemap whenever a post or page is created.

## Installation

First, clone this direcory to the root of your theme. Make sure that you have the ACF plugin activated, then add this line inside the ```<head>``` of your template, located in 'header.php': 

```
<?php include (TEMPLATEPATH . '/simple-seo/seo-meta.php' ); ?>
```

Next, add this line into 'functions.php':

```
<?php require_once('simple-seo/seo-functions.php'); ?>
```

* * *

Tweet me for support [@jsengstrom](https://twitter.com/jsengstrom).
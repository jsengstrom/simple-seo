Simple SEO for Wordpress
========================

A very simple SEO module for integration into Wordpress themes.

Built upon ACF ( http://www.advancedcustomfields.com ) by Elliot Condon. This module allows the author to specify a page title and meta description, and to choose to hide the post/page from Search Engines all together of they wish. Finally, it will auto generate a 'sitemap.xml' file whenever a post or page is created.

To install:

1 Add this line inside the ```<head>``` tag of your template, located in 'header.php': 

```
<?php include (TEMPLATEPATH . '/path/to/seo-meta.php' ); ?>  /* Remember to change the path */
```

2 Add this line into your functions.php file:

```
require_once('path/to/seo-functions.php'); /* Remember to change the path */
```

3 Import acf-import.json to the ACF plugin.
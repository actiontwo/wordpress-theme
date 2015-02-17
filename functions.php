<?php

$includes = array(
  'include/url_define.php',
  'include/enqueue_scripts.php',
  'include/post_thumbnail.php',
  'include/menu.php',
  'include/walker_nav_menu.php',
  'include/shortcode.php',
  'include/theme_options.php',
  
  'post_type/example.php',
  
  'widget/example.php'
);

foreach ($includes as $include) {
  require_once($include);
}


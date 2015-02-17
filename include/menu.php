<?php

/* Add menu */
add_theme_support('nav-menus');
if (function_exists('register_nav_menus')) {

  register_nav_menus(array(
    'primaryMenu' => 'Primary menu'
  ));
}
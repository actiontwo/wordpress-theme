<?php

/* Add menu */
add_theme_support('nav-menus');
if (function_exists('register_nav_menus')) {
  $menu = array(
    'primary' => 'Primary menu'
  );
  register_nav_menus($menu);
}
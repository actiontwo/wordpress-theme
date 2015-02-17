<?php
function themeslug_enqueue_script() {
  // Add script js to footer
  $scripts = array(
    array(
      'id' => 'script',
      'src' => 'script.js',
      'in_footer' => true
    )
  );

  foreach ($scripts as $script) {
    wp_enqueue_script($script['id'], JS . $script['src'], array(), null, $script['in_footer']);
  }
  // Add style  js to header
  $styles = array(
    array(
      'id' => 'mainStyle',
      'src' => '../style.css',
      'in_footer' => false
    )
  );

  foreach ($styles as $style) {
    wp_enqueue_style($style['id'], CSS . $style['src'], array(), null, $style['in_footer']);
  }
}
add_action('wp_enqueue_scripts', 'themeslug_enqueue_script');
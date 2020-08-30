<?php
//styles
function load_stylesheets() {
  wp_register_style('stylesheets', get_template_directory_uri() . '/style.css', '', 1, 'all');
  wp_enqueue_style('stylesheets');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');

//js
function load_js () {
  wp_register_script('custom',  get_template_directory_uri() . '/app.js', 'jquery', 1, true);
  wp_localize_script('custom','ajaxurl', admin_url('admin-ajax.php'));

  wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'load_js');
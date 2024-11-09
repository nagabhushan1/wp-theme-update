<?php

$theme_url = get_template_directory_uri();
$theme_version = wp_get_theme()->get('Version');

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
  'https://github.com/nagabhushan1/wp-theme-update',
  __FILE__,
  'wp-theme-update'
);

// Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

function theme_enqueue() {
    global $theme_url;
    global $theme_version;
    wp_enqueue_style('theme-style', $theme_url . '/style.css', [], $theme_version);
    wp_enqueue_script('main-script', $theme_url . '/js/main.js', [], $theme_version);
  }
  add_action('wp_enqueue_scripts', 'theme_enqueue');
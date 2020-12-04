<?php
/*include 'databaseConnect.php';
include_once 'controller.php';
session_start();
ModeloUserDB::init();

if (!isset($_SESSION['user'])) {
  CtlLogin();
} else {*/
  /**
   * Front to the WordPress application. This file doesn't do anything, but loads
   * wp-blog-header.php which does and tells WordPress to load the theme.
   *
   * @package WordPress
   */

  /**
   * Tells WordPress to load the WordPress theme and output it.
   *
   * @var bool
   */
  define('WP_USE_THEMES', true);

  /** Loads the WordPress Environment and Template */
  require __DIR__ . '/wp-blog-header.php';
//}

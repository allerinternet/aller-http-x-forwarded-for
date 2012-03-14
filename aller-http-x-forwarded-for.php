<?php
/**
 *  Plugin Name: Aller HTTP_X_FORWARDED_FOR
 *  Description: Makes sure comments get correct ip, even when using Varnish.
 *  Version: 1.0
 *  Author: Johannes Henrysson <johannes.henrysson@aller.se>, Aller Media AB
 *
 *  @package Wordpress 3
 *  @subpackage Aller HTTP_X_FORWARDED_FOR
 */

/**
 *  Try to get correct ip, by using HTTP_X_FORWARDED_FOR, which is pushed from
 *  Varnish or something...
 *  Fallback to REMOTE_ADDR if HTTP_X_FORWARDED_FOR wasn't found.
 *
 *  @return string
 *    Hopefully correct ip.
 */
function aller_get_correct_ip() {
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $http_x_forwarded_for = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
    $remote_ip = trim($http_x_forwarded_for[0]);
  } else
    $remote_ip = $_SERVER['REMOTE_ADDR'];
  
  return $remote_ip;
}

// Add filter.
add_filter('pre_comment_user_ip', 'aller_get_correct_ip');
<?php
/*
 * Plugin Name: Disable Login Form 
 * Description: Disable login form & Disable password reset functionality. 
 * Version: 1.0
 * Author: AidenKim
 * Author URI: https://github.com/aidenkihyunkim
 */
  
class Disable_Login_Form {
 
  function __construct() {
    remove_filter('authenticate', 'wp_authenticate_username_password', 20);
    add_action('login_enqueue_scripts', array($this, 'hide_login_form'));
    add_filter('show_password_fields', array($this, 'disable'));
    add_filter('allow_password_reset', array($this, 'disable'));
  }
 
  function disable() {
    return false;
  }
 
  function hide_login_form() {
    echo('<style type="text/css">'.PHP_EOL);
    echo('    #loginform p, #loginform div, #loginform h3 { display: none; }'.PHP_EOL);
    echo('    #loginform .galogin { display: flex; }'.PHP_EOL);
    echo('    #loginform { padding-top: 46px; }'.PHP_EOL);
    echo('    #login #nav { display: none; }'.PHP_EOL);
    echo('</style>'.PHP_EOL);
  }

}
 
$disable_login_form = new Disable_Login_Form();
?>
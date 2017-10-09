<?php
/*
Plugin Name: Wp Sistema CRUD Modulado
Plugin URI: https://github.com/edinaldohvieira/wpscm
Description: Controle várias tabelas externas dentro de uma instalação do WordPress.
Version: 0.6.0
Author: Edinaldo H Vieira
Author URI: https://github.com/edinaldohvieira/
Charge log: Adicionado função "scm_create_fields".
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
define('SCM_PATH',  plugin_dir_path( __FILE__ ) );
define('WPSCM_FILE',  plugin_basename( __FILE__ ) );
define('WPSCM_PATH', get_bloginfo('url')."/" );
define('SCMKEY', 'dadaCVW7rpeLaymcQ4QKA5fVqiHanrGA' );
require_once(SCM_PATH."util/functions.php");
require_once(SCM_PATH."util/modulos.php");
add_filter( 'new_user_approve_bypass_password_reset', 'ignore_new_user_autopass' );
function ignore_new_user_autopass() {return true;}
$api_url = 'http://idados.xyz/update/';
$plugin_slug = basename(dirname(__FILE__));
add_filter('pre_set_site_transient_update_plugins', 'wpscm_check_for_plugin_update');
function wpscm_check_for_plugin_update($checked_data) {
global $api_url, $plugin_slug, $wp_version;
if (empty($checked_data->checked)) return $checked_data;
$args = array('slug' => $plugin_slug,'version' => $checked_data->checked[$plugin_slug .'/'. $plugin_slug .'.php'],);
$request_string = array('body' => array('action' => 'basic_check', 'request' => serialize($args),'api-key' => md5(get_bloginfo('url'))),'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url'));
$raw_response = wp_remote_post($api_url, $request_string);
if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200)) $response = unserialize($raw_response['body']);
if (is_object($response) && !empty($response)) $checked_data->response[$plugin_slug .'/'. $plugin_slug .'.php'] = $response;
return $checked_data;}
add_filter('plugins_api', 'wpscm_plugin_api_call', 10, 3);
function wpscm_plugin_api_call($def, $action, $args) {
global $plugin_slug, $api_url, $wp_version;
if (!isset($args->slug) || ($args->slug != $plugin_slug)) return false;
$plugin_info = get_site_transient('update_plugins');
$current_version = $plugin_info->checked[$plugin_slug .'/'. $plugin_slug .'.php'];
$args->version = $current_version;
$request_string = array('body' => array('action' => $action, 'request' => serialize($args),'api-key' => md5(get_bloginfo('url'))),'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url'));
$request = wp_remote_post($api_url, $request_string);
if (is_wp_error($request)) {$res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
} else {$res = unserialize($request['body']);
if ($res === false) $res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);}
return $res;}
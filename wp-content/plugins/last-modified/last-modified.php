<?php
/*
Plugin Name: Last Modified
Plugin URI: http://wordpress.org/extend/plugins/last-modified/
Description: Displays the date and time that the post/page was last modified.
Version: 1.11
Author: Nick Momrik
Author URI: http://nickmomrik.com/
*/

function mdv_last_modified($format='') {
	global $wpdb, $id;

	$post_mod_date = $wpdb->get_var("SELECT post_modified FROM $wpdb->posts WHERE id = $id");

	if (empty($format))
		$format = get_settings('date_format') . ' @ ' . get_settings('time_format');

	echo mysql2date($format, $post_mod_date);
}
?>

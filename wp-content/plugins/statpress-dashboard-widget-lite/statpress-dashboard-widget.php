<?php
/**
 * Plugin Name: StatPress Dashboard Widget Lite
 * Plugin URI: http://blog.dunkelwesen.de/download-statpress-dashboard-widget-lite/
 * Description: Real time stats from StatPress for your Wordpress Dashboard - Lite-Version - much smaller and faster. Based on the orginal StatPress Widget by <a href="http://www.irisco.it">Daniele Lippi</a>.
 * Version: 2.0
 * Author: <a href="http://blog.dunkelwesen.de">Andreas Kaul</a> & <a href="http://blog.ppfeufer.de">H.-Peter Pfeufer</a>
 */

/**
 * Dashboradwidget erstellen
 */
function SPO_dashboard_widget_function() {
	global $wpdb;
	$table_name = $wpdb->prefix . "statpress";

	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		die('StatPress is not installed');
	}

	# Tabella OVERVIEW
	$unique_color = "#114477";
	$web_color = "#3377B6";
	$rss_color = "#f38f36";
	$spider_color = "#83b4d8";

	// Daten für den letzten Monat
	$lastmonth = '';

	// Wenn Statpress vorhanden
	if(function_exists('iri_StatPress_lastmonth')) {
		$lastmonth = iri_StatPress_lastmonth();
		$stat_plugin = 'StatPress';
	}

	// Wenn Statpress SEOlution vorhanden
	if(function_exists('sps_lastmonth')) {
		$lastmonth = sps_lastmonth();
		$stat_plugin = 'StatPress SEOlution';
	}

	$thismonth = gmdate('Ym', current_time('timestamp'));
	$yesterday = gmdate('Ymd', current_time('timestamp') - 86400);
	$today = gmdate('Ymd', current_time('timestamp'));
	$tlm[0] = substr($lastmonth, 0, 4);
	$tlm[1] = substr($lastmonth, 4, 2);

	print "<table class='widefat'><thead><tr>
	<th scope='col'></th>
	<th scope='col'>" . __('Total', 'statpress') . "</th>
	<th scope='col'>" . __('Yesterday', 'statpress') . "<br /><font size=1>" . gmdate('d M, Y', current_time('timestamp') - 86400) . "</font></th>
	<th scope='col'>" . __('Today', 'statpress') . "<br /><font size=1>" . gmdate('d M, Y', current_time('timestamp')) . "</font></th>
	</tr></thead>
	<tbody id='the-list'>";

	################################################################################################
	# VISITORS ROW
	print "<tr><td>" . __('Visitors', 'statpress') . "</td>";

	#TOTAL
	$qry_total = $wpdb->get_row("
		SELECT count(DISTINCT ip) AS visitors
		FROM $table_name
		WHERE feed=''
		AND spider=''
	");
	print "<td>" . $qry_total->visitors . "</td>\n";

	#YESTERDAY
	$qry_y = $wpdb->get_row("
		SELECT count(DISTINCT ip) AS visitors
		FROM $table_name
		WHERE feed=''
		AND spider=''
		AND date = '$yesterday'
	");
	print "<td>" . $qry_y->visitors . "</td>\n";

	#TODAY
	$qry_t = $wpdb->get_row("
		SELECT count(DISTINCT ip) AS visitors
		FROM $table_name
		WHERE feed=''
		AND spider=''
		AND date = '$today'
	");
	print "<td>" . $qry_t->visitors . "</td>\n";
	print "</tr>";

	################################################################################################
	# PAGEVIEWS ROW
	print "<tr><td>" . __('Pageviews', 'statpress') . "</td>";

	#TOTAL
	$qry_total = $wpdb->get_row("
		SELECT count(date) as pageview
		FROM $table_name
		WHERE feed=''
		AND spider=''
	");
	print "<td>" . $qry_total->pageview . "</td>\n";

	#YESTERDAY
	$qry_y = $wpdb->get_row("
		SELECT count(date) as pageview
		FROM $table_name
		WHERE feed=''
		AND spider=''
		AND date = '$yesterday'
	");
	print "<td>" . $qry_y->pageview . "</td>\n";

	#TODAY
	$qry_t = $wpdb->get_row("
		SELECT count(date) as pageview
		FROM $table_name
		WHERE feed=''
		AND spider=''
		AND date = '$today'
	");
	print "<td>" . $qry_t->pageview . "</td>\n";
	print "</tr>";

	################################################################################################
	# SPIDERS ROW
	print "<tr><td>Spiders</td>";
	#TOTAL
	$qry_total = $wpdb->get_row("
		SELECT count(date) as spiders
		FROM $table_name
		WHERE feed=''
		AND spider<>''
	");
	print "<td>" . $qry_total->spiders . "</td>\n";

	#YESTERDAY
	$qry_y = $wpdb->get_row("
		SELECT count(date) as spiders
		FROM $table_name
		WHERE feed=''
		AND spider<>''
		AND date = '$yesterday'
	");
	print "<td>" . $qry_y->spiders . "</td>\n";

	#TODAY
	$qry_t = $wpdb->get_row("
		SELECT count(date) as spiders
		FROM $table_name
		WHERE feed=''
		AND spider<>''
		AND date = '$today'
	");
	print "<td>" . $qry_t->spiders . "</td>\n";
	print "</tr>";

	################################################################################################
	# FEEDS ROW
	print "<tr><td>Feeds</td>";
	#TOTAL
	$qry_total = $wpdb->get_row("
		SELECT count(date) as feeds
		FROM $table_name
		WHERE feed<>''
		AND spider=''
	");
	print "<td>" . $qry_total->feeds . "</td>\n";

	#YESTERDAY
	$qry_y = $wpdb->get_row("
		SELECT count(date) as feeds
		FROM $table_name
		WHERE feed<>''
		AND spider=''
		AND date = '" . $yesterday . "'
	");
	print "<td>" . $qry_y->feeds . "</td>\n";

	#TODAY
	$qry_t = $wpdb->get_row("
		SELECT count(date) as feeds
		FROM $table_name
		WHERE feed<>''
		AND spider=''
		AND date = '$today'
	");
	print "<td>" . $qry_t->feeds . "</td>\n";

	print "</tr>";

	##################################################################################################
	$qry_s = $wpdb->get_row("
		SELECT date as since
		FROM $table_name
		ORDER BY date
		LIMIT 1;
	");

	$cstart = strtotime($qry_s->since);
	$cstart = date("d.m.Y", $cstart);

	print "<tr><td><i>Counter Start</i></td>";
	print "<td colspan='3'><i>$cstart</i></td>\n";

	print "</table><br />\n\n";

	// Auf Statplugin prüfen und entsprechenden Link ausgeben
	if($stat_plugin == 'StatPress') {
		print "<div class='wrap'><h4><a href='admin.php?page=statpress/statpress.php'>" . __('More details', 'statpress') . " &raquo;</a></h4></div>";
	} elseif($stat_plugin == 'StatPress SEOlution') {
		print "<div class='wrap'><h4><a href='admin.php?page=sps'>" . __('More details', 'statpress') . " &raquo;</a></h4></div>";
	}
}

// Create the function use in the action hook
function SPO_add_dashboard_widgets() {
	// Wenn Statpress vorhanden
	if(function_exists('iri_StatPress_lastmonth')) {
		$stat_plugin = 'StatPress';
	}

	// Wenn Statpress SEOlution vorhanden
	if(function_exists('sps_lastmonth')) {
		$stat_plugin = 'StatPress SEOlution';
	}
	wp_add_dashboard_widget('SPO_dashboard_widget', $stat_plugin . ' Overview Lite', 'SPO_dashboard_widget_function');
}

// Hoook into the 'wp_dashboard_setup' action to register our other functions
add_action('wp_dashboard_setup', 'SPO_add_dashboard_widgets');
?>
=== Last Modified ===
Contributors: nickmomrik
Tags: modified, last, date, time
Stable tag: trunk

Displays the date ad time the post/page was last modified.

== Installation ==
1. Upload `last-modified.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php mdv_last_modified(); ?>` in your templates. 

== Configuration ==
You can pass it a date/time format (http://us4.php.net/date)
Example: `mdv_last_modified('l dS of F Y h:i:s A')`

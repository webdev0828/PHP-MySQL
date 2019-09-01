<?php
/*
Plugin Name: WP Open Comment Links in New Window
Plugin URI: https://github.com/dipakcg/wp-open-comment-links-in-new-window
Description: Opens all the links (URLs) added in the comments and author URL, in a new tab or window.
Author: Dipak C. Gajjar
Version: 1.2
Author URI: https://dipakgajjar.com
*/

function dcg_open_link_in_new_window($url) {
	$return_url = str_replace('<a', '<a target="_blank"', $url);
	return $return_url;
}
add_filter('get_comment_author_link', 'dcg_open_link_in_new_window');
add_filter('comment_text', 'dcg_open_link_in_new_window');

/* End of plugin */
?>

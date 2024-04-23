<?php
//SJI Theme Functions
//namespace SJI\App;
require('config/setup.php');
require('config/acfModules.php');


/**
 * 
 * Custom Title Function for More Detailed Titles
 *
 */
Class App {
	public static function title() {
		if (is_home()) {
			if ($home = get_option('page_for_posts', true)) {
				return get_the_title($home);
			}
			return __('Latest Posts', 'sage');
		}
		if(is_tax('tribe_events_cat') ){
			return single_term_title();
		}

		if (is_archive() AND !is_category() AND !is_month() ) {
			return post_type_archive_title();
		}
		if(is_category() or is_month() ){
			return get_the_archive_title();
		}

		if (is_search()) {
			return sprintf(__('Search Results for %s', 'sage'), get_search_query());
		}
		if (is_404()) {
			return __('Not Found', 'sage');
		}

		return get_the_title();
	}
}
<?php

defined( 'ABSPATH' ) || exit;


function register_ags_divi_icons_blocks(){

	$asset_file = include( AGS_Divi_Icons::$pluginDir . 'blocks/build/index.asset.php');

	wp_register_script(
		'ags-divi-icons-blocks',
		AGS_Divi_Icons::$pluginDirUrl.'/blocks/build/index.js',
		array_merge($asset_file['dependencies'], ['ags-divi-icons']),
		$asset_file['version']
	);
	
	wp_register_style(
		'ags-divi-icons-blocks',
		AGS_Divi_Icons::$pluginDirUrl.'/blocks/editor-style.css',
		null,
		$asset_file['version']
	);

	register_block_type( 'aspengrove/icon-block', array(
		'editor_script' => 'ags-divi-icons-blocks',
		'editor_style' => 'ags-divi-icons-blocks'
	));
}
register_ags_divi_icons_blocks();

/*
function ags_divi_icons_blocks_inject_richtext_loader($url, $scriptId) {
	if ($scriptId === 'wp-rich-text') {
		$url = AGS_Divi_Icons::$pluginDirUrl.'/blocks/js/wp-rich-text-loader.js?src='.urlencode($url);
	}
	return $url;
}
add_filter('script_loader_src', 'ags_divi_icons_blocks_inject_richtext_loader', 10, 2);
*/

function ags_divi_icons_blocks_add_richtext_dependencies() {
	wp_scripts()->registered['wp-rich-text']->deps = array_merge(
		wp_scripts()->registered['wp-rich-text']->deps,
		['jquery', 'wp-hooks']
	);
}
add_action('admin_enqueue_scripts', 'ags_divi_icons_blocks_add_richtext_dependencies', 99);
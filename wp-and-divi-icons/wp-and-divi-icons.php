<?php
/**
 * Plugin Name: WP and Divi Icons
 * Plugin URI:  https://wpzone.co
 * Description: Adds 300+ new icons to the WordPress editor and the Divi & Extra framework, helping you build standout WordPress web designs.
 * Version:     2.0.9
 * Author:      WP Zone
 * Author URI:  https://wpzone.co/?utm_source=wp-and-divi-icons-pro&utm_medium=plugin-credit-link&utm_content=plugin-file-author-uri
 * License:     GNU General Public License version 3
 * License URI: https://www.gnu.org/licenses/gpl.html
 * Text Domain: ds-icon-expansion
 * AGS Info: ids.aspengrove 425765
 */

/*

WP and Divi Icons plugin
Copyright (C) 2024 WP Zone

Despite the following, this project is licensed exclusively under
GNU General Public License (GPL) version 3 (no later versions).
This statement modifies the following text.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

============

For the text of the GNU General Public License version 3, and licensing/copyright
information for third-party code used in this product, see ./license.txt.

=======

Note: Divi is a registered trademark of Elegant Themes, Inc. This product is not
affiliated with nor endorsed by Elegant Themes.

*/

defined( 'ABSPATH' ) or exit;



register_activation_hook( __FILE__, array('AGS_Divi_Icons', 'on_activation') );

class AGS_Divi_Icons {
	// Following constants must be HTML safe
	const PLUGIN_NAME = 'WP and Divi Icons';
	const PLUGIN_SLUG = 'wp-and-divi-icons-free';
	const PLUGIN_AUTHOR = 'WP Zone';
	const PLUGIN_AUTHOR_URL = 'https://wpzone.co/';
	const PLUGIN_VERSION = '2.0.9';
	const PLUGIN_PAGE = 'admin.php?page=ds-icon-expansion';
	const PLUGIN_PRODUCT_URL_FREE = 'https://wpzone.coproduct/wp-and-divi-icons/';
	const PLUGIN_PRODUCT_URL_PRO = 'https://wordpress.org/plugins/wp-and-divi-icons/';
	const PLUGIN_REVIEW_URL_FREE = 'https://wpzone.coproduct/wp-and-divi-icons/';
	

	public static $pluginFile, $pluginDir, $pluginDirUrl;
	public static                          $icon_packs, $icons;
	protected static                       $agsDiviIconsPages, $multiColorIconsColorized;

	public static function init() {

		self::$pluginFile   = __FILE__;
		self::$pluginDir    = dirname( __FILE__ ) . '/';
		self::$pluginDirUrl = plugins_url( '', __FILE__ );
		$isAdmin            = is_admin();

		// Used to determine which icon sets to load and use, don't change order.
		self::$icon_packs = array(
			'single_color' => array(
				'fo'  => array(
					'name'          => __( 'Free Outline', 'ds-icon-expansion' ),
					'quantity'      => 301,
					'value'         => get_option( 'agsdi_fo_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/free-icons/',
					'icon_prefixes' => array( 'agsdi' => '(301)' ),
					'free'          => true,
					'1.5.0'         => 'yes'
				),
				'mc'  => array(
					'name'          => __( 'Multicolor', 'ds-icon-expansion' ),
					'quantity'      => 48,
					'value'         => get_option( 'agsdi_mc_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-multicolor/',
					'icon_prefixes' => array(
						'agsdix-smc' => '(48)'
					),
					'1.5.0'         => 'yes'
				),
				'fa'  => array(
					'name'          => __( 'Font Awesome 5', 'ds-icon-expansion' ),
					'quantity'      => 1297, // Number of icons in pack
					'value'         => get_option( 'agsdi_fa_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/fontawesome/',
					'icon_prefixes' => array(
						'agsdix-fa'  => '(1297)',
						'agsdix-fab' => __( 'Brands', 'ds-icon-expansion' ),
						'agsdix-fas' => __( 'Solid', 'ds-icon-expansion' ),
						'agsdix-far' => __( 'Line', 'ds-icon-expansion' ),
					),
					'1.5.0'         => 'yes'
				),
				'md'  => array(
					'name'          => __( 'Material Design', 'ds-icon-expansion' ),
					'quantity'      => 933,
					'value'         => get_option( 'agsdi_md_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/material/',
					'icon_prefixes' => array(
						'agsdix-smt' => '(933)',
					),
					'1.5.0'         => 'yes'
				),
				'ui'  => array(
					'name'          => __( 'Universal', 'ds-icon-expansion' ),
					'quantity'      => 100,
					'value'         => get_option( 'agsdi_ui_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-universal/single-color/',
					'icon_prefixes' => array(
						'agsdix-sao' => '(100)'
					),
					'1.5.0'         => 'yes'
				),
				'np'  => array(
					'name'          => __( 'Hand Drawn', 'ds-icon-expansion' ),  // prev: Nonprofit
					'quantity'      => 114,
					'value'         => get_option( 'agsdi_np_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-hand-drawn/single-color/',
					'icon_prefixes' => array(
						'agsdix-snp' => '(114)'
					),
					'1.5.0'         => 'yes'
				),
				'cs'  => array(
					'name'          => __( 'Lineal', 'ds-icon-expansion' ), //(prev: Cleaning Service)
					'quantity'      => 25,
					'value'         => get_option( 'agsdi_cs_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-lineal/single-color/',
					'icon_prefixes' => array(
						'agsdix-scs' => '(25)'
					),
					'1.5.0'         => 'yes'
				),
				'out' => array(
					'name'          => __( 'Outline', 'ds-icon-expansion' ),
					'quantity'      => 50,
					'value'         => get_option( 'agsdi_out_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-outline/single-color/',
					'icon_prefixes' => array(
						'agsdix-sout' => '(50)'
					),
					'1.5.0'         => 'no'
				),
				'ske' => array(
					'name'          => __( 'Sketch', 'ds-icon-expansion' ),
					'quantity'      => 40,
					'value'         => get_option( 'agsdi_ske_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-sketch/single-color/',
					'icon_prefixes' => array(
						'agsdix-sske' => '(40)'
					),
					'1.5.0'         => 'no'
				),

				'ele' => array(
					'name'          => __( 'Elegant', 'ds-icon-expansion' ),
					'quantity'      => 51,
					'value'         => get_option( 'agsdi_ele_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-elegant/single-color/',
					'icon_prefixes' => array(
						'agsdix-sele' => '(51)'
					),
					'1.5.0'         => 'no'
				),
				'fil' => array(
					'name'          => __( 'Filled', 'ds-icon-expansion' ),
					'quantity'      => 54,
					'value'         => get_option( 'agsdi_fil_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/ags-filled/single-color/',
					'icon_prefixes' => array(
						'agsdix-sfil' => '(54)'
					),
					'1.5.0'         => 'no'
				),
				'etl' => array(
					'name'          => __( 'Elegant Themes Line', 'ds-icon-expansion' ),
					'quantity'      => 100,
					'value'         => get_option( 'agsdi_etl_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/elegant-themes-line/single-color/',
					'icon_prefixes' => array(
						'agsdix-set' => '(100)'
					),
					'1.5.0'         => 'no'
				),
				'eth' => array(
					'name'          => __( 'Elegant Themes', 'ds-icon-expansion' ),
					'quantity'      => 360,
					'value'         => get_option( 'agsdi_eth_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/elegant-themes/single-color/',
					'icon_prefixes' => array(
						'agsdix-seth' => '(360)'
					),
					'free'          => true,
					// Icons that will be added to wysiwyg icon picker only
					// (because we don't want to repeat some icons)
					'tinymce_only'  => true,
					'1.5.0'         => 'no'
				),
				'fa6'  => array(
					'name'          => __( 'Font Awesome 6', 'ds-icon-expansion' ),
					'quantity'      => 1722, // Number of icons in pack
					'value'         => get_option( 'agsdi_fa6_icons' ),
					'path'          => self::$pluginDirUrl . '/icon-packs/fontawesome6/',
					'icon_prefixes' => array(
						'agsdix-fa6'  => '(1722)',
						'agsdix-fa6b' => __( 'Brands', 'ds-icon-expansion' ),
						'agsdix-fa6s' => __( 'Solid', 'ds-icon-expansion' ),
						'agsdix-fa6r' => __( 'Line', 'ds-icon-expansion' ),
					),
					'1.5.0'         => 'no'
				),
			),
			'multicolor'   => array(
				'mul_mul' => array(
					'name'     => __( 'Multicolor', 'ds-icon-expansion' ),
					'quantity' => 48,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-multicolor/multicolor/',
					'preview'  => 'multicolor_multicolor.svg'
				),
				'mul_ele' => array(
					'name'     => __( 'Elegant', 'ds-icon-expansion' ),
					'quantity' => 51,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-elegant/multicolor/',
					'preview'  => 'multicolor_elegant.svg'
				),
				'mul_fil' => array(
					'name'     => __( 'Filled', 'ds-icon-expansion' ),
					'quantity' => 54,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-filled/multicolor/',
					'preview'  => 'multicolor_filled.svg'
				),
				'mul_han' => array(
					'name'     => __( 'Hand Drawn', 'ds-icon-expansion' ),
					'quantity' => 80,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-hand-drawn/multicolor/',
					'preview'  => 'multicolor_hand-drawn.svg'
				),
				'mul_lin' => array(
					'name'     => __( 'Lineal', 'ds-icon-expansion' ),
					'quantity' => 25,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-lineal/multicolor/',
					'preview'  => 'multicolor_lineal.svg'
				),
				'mul_out' => array(
					'name'     => __( 'Outline', 'ds-icon-expansion' ),
					'quantity' => 50,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-outline/multicolor/',
					'preview'  => 'multicolor_outline.svg'
				),
				'mul_ske' => array(
					'name'     => __( 'Sketch', 'ds-icon-expansion' ),
					'quantity' => 40,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-sketch/multicolor/',
					'preview'  => 'multicolor_sketch.svg'
				),
				'mul_tri' => array(
					'name'     => __( 'Tri Color', 'ds-icon-expansion' ),
					'quantity' => 54,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-tri-color/multicolor/',
					'preview'  => 'multicolor_tri-color.svg'
				),
				'mul_uni' => array(
					'name'     => __( 'Universal', 'ds-icon-expansion' ),
					'quantity' => 100,
					'path'     => self::$pluginDirUrl . '/icon-packs/ags-universal/multicolor/',
					'preview'  => 'multicolor_universal.svg'
				),
			)
		);
		
		
		if ( is_admin() && isset($_POST['wadip_nonce']) && wp_verify_nonce($_POST['wadip_nonce'], 'wadip-custom') ) {
			$iconSetIds = WADIPCustomIconFont::getIconSetIds(false);
			
			if (isset($_POST['delete'])) {
				foreach ($_POST['delete'] as $prefix) {
					$iconSetId = substr($prefix, 1);
					$iconSetIndex = array_search($iconSetId, $iconSetIds);
					if ( $iconSetIndex !== false && current_user_can('delete_post', $iconSetId) ) {
						WADIPCustomIconFont::loadFromId($iconSetId)->remove();
						unset($iconSetIds[$iconSetIndex]);
					}
				}
			}
			
			foreach ($iconSetIds as $iconSetId) {
				
				$newStatus = isset($_POST['agsdi_c'.$iconSetId.'_icons']) && $_POST['agsdi_c'.$iconSetId.'_icons'] == 'yes' ? 'publish' : 'draft';
				
				wp_update_post([
					'ID' => $iconSetId,
					'post_status' => $newStatus
				]);
				
			}


			
		
		}


		
		
		// Don't change order
		self::$icons['single_color'] = array(
			
			// 'Free Outline'
			'fo' => array(
				'agsdi-aspengrovestudios','agsdi-wpgears','agsdi-message','agsdi-location','agsdi-message-2','agsdi-message-3','agsdi-mail','agsdi-gear','agsdi-zoom','agsdi-zoom-in','agsdi-zoom-out','agsdi-time','agsdi-wallet','agsdi-world','agsdi-bulb','agsdi-bulb-flash','agsdi-bulb-options','agsdi-calendar','agsdi-chat','agsdi-music','agsdi-video','agsdi-security-camera','agsdi-sound','agsdi-music-play','agsdi-video-play','agsdi-microphone','agsdi-cd','agsdi-coffee','agsdi-gift','agsdi-printer','agsdi-hand-watch','agsdi-alarm','agsdi-alarm-2','agsdi-calendar-check','agsdi-code','agsdi-learn','agsdi-globe','agsdi-warning','agsdi-cancel','agsdi-question','agsdi-error','agsdi-check-circle','agsdi-arrow-left-circle','agsdi-arrow-right-circle','agsdi-arrow-up-circle','agsdi-arrow-down-circle','agsdi-refresh','agsdi-share','agsdi-tag','agsdi-bookmark','agsdi-bookmark-star','agsdi-briefcase','agsdi-calculator','agsdi-id-card','agsdi-credit-card','agsdi-shop','agsdi-tshirt','agsdi-handbag','agsdi-clothing-handbag','agsdi-analysis','agsdi-chat-gear','agsdi-certificate','agsdi-medal','agsdi-ribbon','agsdi-star','agsdi-bullhorn','agsdi-target','agsdi-pie-chart','agsdi-bar-chart','agsdi-bar-chart-2','agsdi-bar-chart-3','agsdi-bar-chart-4','agsdi-bar-chart-5','agsdi-income','agsdi-piggy-bank','agsdi-bitcoin','agsdi-bitcoin-circle','agsdi-bitcoin-mining','agsdi-mining','agsdi-dollar','agsdi-dollar-circle','agsdi-dollar-bill','agsdi-binders','agsdi-house','agsdi-padlock','agsdi-padlock-open','agsdi-house-padlock','agsdi-cloud-padlock','agsdi-key','agsdi-keys','agsdi-eye','agsdi-eye-closed','agsdi-champagne','agsdi-rocket','agsdi-rocket-2','agsdi-rocket-3','agsdi-flag','agsdi-flag-2','agsdi-flag-3','agsdi-drop','agsdi-sun','agsdi-sun-cloud','agsdi-thermometer','agsdi-celsius','agsdi-sun-2','agsdi-cloud','agsdi-upload','agsdi-cloud-computing','agsdi-cloud-download','agsdi-cloud-check','agsdi-cursor','agsdi-mobile','agsdi-monitor','agsdi-browser','agsdi-laptop','agsdi-hamburger-menu','agsdi-hamburger-menu-circle','agsdi-download','agsdi-image','agsdi-file','agsdi-file-error','agsdi-file-add','agsdi-file-check','agsdi-file-download','agsdi-file-question','agsdi-file-cursor','agsdi-file-padlock','agsdi-file-heart','agsdi-file-jpg','agsdi-file-png','agsdi-file-pdf','agsdi-file-zip','agsdi-file-ai','agsdi-file-ps','agsdi-delete','agsdi-notebook','agsdi-notebook-2','agsdi-documents','agsdi-brochure','agsdi-clip','agsdi-align-center','agsdi-align-left','agsdi-align-justify','agsdi-align-right','agsdi-portrait','agsdi-landscape','agsdi-portrait-2','agsdi-wedding','agsdi-billboard','agsdi-flash','agsdi-crop','agsdi-message-heart','agsdi-adjust-square-vert','agsdi-adjust-circle-vert','agsdi-camera','agsdi-grid','agsdi-grid-copy','agsdi-layers','agsdi-ruler','agsdi-eyedropper','agsdi-aperture','agsdi-macro','agsdi-pin','agsdi-contrast','agsdi-battery-level-empty','agsdi-battery-level1','agsdi-battery-level2','agsdi-battery-level3','agsdi-usb-stick','agsdi-sd-card','agsdi-stethoscope','agsdi-vaccine','agsdi-hospital','agsdi-pills','agsdi-heart','agsdi-heartbeat','agsdi-hearts','agsdi-heart-leaf','agsdi-heart-leaf-2','agsdi-coffee-2','agsdi-hands','agsdi-book','agsdi-food-heart','agsdi-soup-heart','agsdi-food','agsdi-soup','agsdi-pencil','agsdi-people','agsdi-money-bag','agsdi-world-heart','agsdi-doctor','agsdi-person','agsdi-water-cycle','agsdi-sign','agsdi-hand-leaf','agsdi-gift-heart','agsdi-sleep','agsdi-hand-heart','agsdi-calendar-heart','agsdi-book-heart','agsdi-list','agsdi-leaves','agsdi-bread','agsdi-bread-heart','agsdi-animal-hands','agsdi-animal-heart','agsdi-dog','agsdi-cat','agsdi-bird','agsdi-dog-2','agsdi-cat-2','agsdi-transporter','agsdi-adjust-square-horiz','agsdi-adjust-circle-horiz','agsdi-square','agsdi-circle','agsdi-triangle','agsdi-pentagon','agsdi-hexagon','agsdi-heptagon','agsdi-refresh-2','agsdi-pause','agsdi-play','agsdi-fast-forward','agsdi-rewind','agsdi-previous','agsdi-next','agsdi-stop','agsdi-arrow-left','agsdi-arrow-right','agsdi-arrow-up','agsdi-arrow-down','agsdi-face-sad','agsdi-face-happy','agsdi-face-neutral','agsdi-messenger','agsdi-facebook','agsdi-facebook-like','agsdi-twitter','agsdi-google-plus','agsdi-linkedin','agsdi-pinterest','agsdi-tumblr','agsdi-instagram','agsdi-skype','agsdi-flickr','agsdi-myspace','agsdi-dribble','agsdi-vimeo','agsdi-500px','agsdi-behance','agsdi-bitbucket','agsdi-deviantart','agsdi-github','agsdi-github-2','agsdi-medium','agsdi-medium-2','agsdi-meetup','agsdi-meetup-2','agsdi-slack','agsdi-slack-2','agsdi-snapchat','agsdi-twitch','agsdi-rss','agsdi-rss-2','agsdi-paypal','agsdi-stripe','agsdi-youtube','agsdi-facebook-2','agsdi-twitter-2','agsdi-linkedin-2','agsdi-tumblr-2','agsdi-myspace-2','agsdi-slack-3','agsdi-github-3','agsdi-vimeo-2','agsdi-behance-2','agsdi-apple','agsdi-quora','agsdi-trello','agsdi-amazon','agsdi-reddit','agsdi-windows','agsdi-wordpress','agsdi-patreon','agsdi-patreon-2','agsdi-soundcloud','agsdi-spotify','agsdi-google-hangout','agsdi-dropbox','agsdi-tinder','agsdi-whatsapp','agsdi-adobe-cc','agsdi-android','agsdi-html5','agsdi-google-drive','agsdi-pinterest-2','agsdi-gmail','agsdi-google-wallet','agsdi-google-sheets','agsdi-twitch-2'
			),
			
			// Elegant Themes
			'eth' => array(
				'agsdix-seth-arrow_up','agsdix-seth-arrow_down','agsdix-seth-arrow_left','agsdix-seth-arrow_right','agsdix-seth-arrow_left-up','agsdix-seth-arrow_right-up','agsdix-seth-arrow_right-down','agsdix-seth-arrow_left-down','agsdix-seth-arrow-up-down','agsdix-seth-arrow_up-down_alt','agsdix-seth-arrow_left-right_alt','agsdix-seth-arrow_left-right','agsdix-seth-arrow_expand_alt2','agsdix-seth-arrow_expand_alt','agsdix-seth-arrow_condense','agsdix-seth-arrow_expand','agsdix-seth-arrow_move','agsdix-seth-arrow_carrot-up','agsdix-seth-arrow_carrot-down','agsdix-seth-arrow_carrot-left','agsdix-seth-arrow_carrot-right','agsdix-seth-arrow_carrot-2up','agsdix-seth-arrow_carrot-2down','agsdix-seth-arrow_carrot-2left','agsdix-seth-arrow_carrot-2right','agsdix-seth-arrow_carrot-up_alt2','agsdix-seth-arrow_carrot-down_alt2','agsdix-seth-arrow_carrot-left_alt2','agsdix-seth-arrow_carrot-right_alt2','agsdix-seth-arrow_carrot-2up_alt2','agsdix-seth-arrow_carrot-2down_alt2','agsdix-seth-arrow_carrot-2left_alt2','agsdix-seth-arrow_carrot-2right_alt2','agsdix-seth-arrow_triangle-up','agsdix-seth-arrow_triangle-down','agsdix-seth-arrow_triangle-left','agsdix-seth-arrow_triangle-right','agsdix-seth-arrow_triangle-up_alt2','agsdix-seth-arrow_triangle-down_alt2','agsdix-seth-arrow_triangle-left_alt2','agsdix-seth-arrow_triangle-right_alt2','agsdix-seth-arrow_back','agsdix-seth-icon_minus-06','agsdix-seth-icon_plus','agsdix-seth-icon_close','agsdix-seth-icon_check','agsdix-seth-icon_minus_alt2','agsdix-seth-icon_plus_alt2','agsdix-seth-icon_close_alt2','agsdix-seth-icon_check_alt2','agsdix-seth-icon_zoom-out_alt','agsdix-seth-icon_zoom-in_alt','agsdix-seth-icon_search','agsdix-seth-icon_box-empty','agsdix-seth-icon_box-selected','agsdix-seth-icon_minus-box','agsdix-seth-icon_plus-box','agsdix-seth-icon_box-checked','agsdix-seth-icon_circle-empty','agsdix-seth-icon_circle-slelected','agsdix-seth-icon_stop_alt2','agsdix-seth-icon_stop','agsdix-seth-icon_pause_alt2','agsdix-seth-icon_pause','agsdix-seth-icon_menu','agsdix-seth-icon_menu-square_alt2','agsdix-seth-icon_menu-circle_alt2','agsdix-seth-icon_ul','agsdix-seth-icon_ol','agsdix-seth-icon_adjust-horiz','agsdix-seth-icon_adjust-vert','agsdix-seth-icon_document_alt','agsdix-seth-icon_documents_alt','agsdix-seth-icon_pencil','agsdix-seth-icon_pencil-edit_alt','agsdix-seth-icon_pencil-edit','agsdix-seth-icon_folder-alt','agsdix-seth-icon_folder-open_alt','agsdix-seth-icon_folder-add_alt','agsdix-seth-icon_info_alt','agsdix-seth-icon_error-oct_alt','agsdix-seth-icon_error-circle_alt','agsdix-seth-icon_error-triangle_alt','agsdix-seth-icon_question_alt2','agsdix-seth-icon_question','agsdix-seth-icon_comment_alt','agsdix-seth-icon_chat_alt','agsdix-seth-icon_vol-mute_alt','agsdix-seth-icon_volume-low_alt','agsdix-seth-icon_volume-high_alt','agsdix-seth-icon_quotations','agsdix-seth-icon_quotations_alt2','agsdix-seth-icon_clock_alt','agsdix-seth-icon_lock_alt','agsdix-seth-icon_lock-open_alt','agsdix-seth-icon_key_alt','agsdix-seth-icon_cloud_alt','agsdix-seth-icon_cloud-upload_alt','agsdix-seth-icon_cloud-download_alt','agsdix-seth-icon_image','agsdix-seth-icon_images','agsdix-seth-icon_lightbulb_alt','agsdix-seth-icon_gift_alt','agsdix-seth-icon_house_alt','agsdix-seth-icon_genius','agsdix-seth-icon_mobile','agsdix-seth-icon_tablet','agsdix-seth-icon_laptop','agsdix-seth-icon_desktop','agsdix-seth-icon_camera_alt','agsdix-seth-icon_mail_alt','agsdix-seth-icon_cone_alt','agsdix-seth-icon_ribbon_alt','agsdix-seth-icon_bag_alt','agsdix-seth-icon_creditcard','agsdix-seth-icon_cart_alt','agsdix-seth-icon_paperclip','agsdix-seth-icon_tag_alt','agsdix-seth-icon_tags_alt','agsdix-seth-icon_trash_alt','agsdix-seth-icon_cursor_alt','agsdix-seth-icon_mic_alt','agsdix-seth-icon_compass_alt','agsdix-seth-icon_pin_alt','agsdix-seth-icon_pushpin_alt','agsdix-seth-icon_map_alt','agsdix-seth-icon_drawer_alt','agsdix-seth-icon_toolbox_alt','agsdix-seth-icon_book_alt','agsdix-seth-icon_calendar','agsdix-seth-icon_film','agsdix-seth-icon_table','agsdix-seth-icon_contacts_alt','agsdix-seth-icon_headphones','agsdix-seth-icon_lifesaver','agsdix-seth-icon_piechart','agsdix-seth-icon_refresh','agsdix-seth-icon_link_alt','agsdix-seth-icon_link','agsdix-seth-icon_loading','agsdix-seth-icon_blocked','agsdix-seth-icon_archive_alt','agsdix-seth-icon_heart_alt','agsdix-seth-icon_star_alt','agsdix-seth-icon_star-half_alt','agsdix-seth-icon_star','agsdix-seth-icon_star-half','agsdix-seth-icon_tools','agsdix-seth-icon_tool','agsdix-seth-icon_cog','agsdix-seth-icon_cogs','agsdix-seth-arrow_up_alt','agsdix-seth-arrow_down_alt','agsdix-seth-arrow_left_alt','agsdix-seth-arrow_right_alt','agsdix-seth-arrow_left-up_alt','agsdix-seth-arrow_right-up_alt','agsdix-seth-arrow_right-down_alt','agsdix-seth-arrow_left-down_alt','agsdix-seth-arrow_condense_alt','agsdix-seth-arrow_expand_alt3','agsdix-seth-arrow_carrot_up_alt','agsdix-seth-arrow_carrot-down_alt','agsdix-seth-arrow_carrot-left_alt','agsdix-seth-arrow_carrot-right_alt','agsdix-seth-arrow_carrot-2up_alt','agsdix-seth-arrow_carrot-2dwnn_alt','agsdix-seth-arrow_carrot-2left_alt','agsdix-seth-arrow_carrot-2right_alt','agsdix-seth-arrow_triangle-up_alt','agsdix-seth-arrow_triangle-down_alt','agsdix-seth-arrow_triangle-left_alt','agsdix-seth-arrow_triangle-right_alt','agsdix-seth-icon_minus_alt','agsdix-seth-icon_plus_alt','agsdix-seth-icon_close_alt','agsdix-seth-icon_check_alt','agsdix-seth-icon_zoom-out','agsdix-seth-icon_zoom-in','agsdix-seth-icon_stop_alt','agsdix-seth-icon_menu-square_alt','agsdix-seth-icon_menu-circle_alt','agsdix-seth-icon_document','agsdix-seth-icon_documents','agsdix-seth-icon_pencil_alt','agsdix-seth-icon_folder','agsdix-seth-icon_folder-open','agsdix-seth-icon_folder-add','agsdix-seth-icon_folder_upload','agsdix-seth-icon_folder_download','agsdix-seth-icon_info','agsdix-seth-icon_error-circle','agsdix-seth-icon_error-oct','agsdix-seth-icon_error-triangle','agsdix-seth-icon_question_alt','agsdix-seth-icon_comment','agsdix-seth-icon_chat','agsdix-seth-icon_vol-mute','agsdix-seth-icon_volume-low','agsdix-seth-icon_volume-high','agsdix-seth-icon_quotations_alt','agsdix-seth-icon_clock','agsdix-seth-icon_lock','agsdix-seth-icon_lock-open','agsdix-seth-icon_key','agsdix-seth-icon_cloud','agsdix-seth-icon_cloud-upload','agsdix-seth-icon_cloud-download','agsdix-seth-icon_lightbulb','agsdix-seth-icon_gift','agsdix-seth-icon_house','agsdix-seth-icon_camera','agsdix-seth-icon_mail','agsdix-seth-icon_cone','agsdix-seth-icon_ribbon','agsdix-seth-icon_bag','agsdix-seth-icon_cart','agsdix-seth-icon_tag','agsdix-seth-icon_tags','agsdix-seth-icon_trash','agsdix-seth-icon_cursor','agsdix-seth-icon_mic','agsdix-seth-icon_compass','agsdix-seth-icon_pin','agsdix-seth-icon_pushpin','agsdix-seth-icon_map','agsdix-seth-icon_drawer','agsdix-seth-icon_toolbox','agsdix-seth-icon_book','agsdix-seth-icon_contacts','agsdix-seth-icon_archive','agsdix-seth-icon_heart','agsdix-seth-icon_profile','agsdix-seth-icon_group','agsdix-seth-icon_grid-2x2','agsdix-seth-icon_grid-3x3','agsdix-seth-icon_music','agsdix-seth-icon_pause_alt','agsdix-seth-icon_phone','agsdix-seth-icon_upload','agsdix-seth-icon_download','agsdix-seth-social_facebook','agsdix-seth-social_twitter','agsdix-seth-social_pinterest','agsdix-seth-social_googleplus','agsdix-seth-social_tumblr','agsdix-seth-social_tumbleupon','agsdix-seth-social_wordpress','agsdix-seth-social_instagram','agsdix-seth-social_dribbble','agsdix-seth-social_vimeo','agsdix-seth-social_linkedin','agsdix-seth-social_rss','agsdix-seth-social_deviantart','agsdix-seth-social_share','agsdix-seth-social_myspace','agsdix-seth-social_skype','agsdix-seth-social_youtube','agsdix-seth-social_picassa','agsdix-seth-social_googledrive','agsdix-seth-social_flickr','agsdix-seth-social_blogger','agsdix-seth-social_spotify','agsdix-seth-social_delicious','agsdix-seth-social_facebook_circle','agsdix-seth-social_twitter_circle','agsdix-seth-social_pinterest_circle','agsdix-seth-social_googleplus_circle','agsdix-seth-social_tumblr_circle','agsdix-seth-social_stumbleupon_circle','agsdix-seth-social_wordpress_circle','agsdix-seth-social_instagram_circle','agsdix-seth-social_dribbble_circle','agsdix-seth-social_vimeo_circle','agsdix-seth-social_linkedin_circle','agsdix-seth-social_rss_circle','agsdix-seth-social_deviantart_circle','agsdix-seth-social_share_circle','agsdix-seth-social_myspace_circle','agsdix-seth-social_skype_circle','agsdix-seth-social_youtube_circle','agsdix-seth-social_picassa_circle','agsdix-seth-social_googledrive_alt2','agsdix-seth-social_flickr_circle','agsdix-seth-social_blogger_circle','agsdix-seth-social_spotify_circle','agsdix-seth-social_delicious_circle','agsdix-seth-social_facebook_square','agsdix-seth-social_twitter_square','agsdix-seth-social_pinterest_square','agsdix-seth-social_googleplus_square','agsdix-seth-social_tumblr_square','agsdix-seth-social_stumbleupon_square','agsdix-seth-social_wordpress_square','agsdix-seth-social_instagram_square','agsdix-seth-social_dribbble_square','agsdix-seth-social_vimeo_square','agsdix-seth-social_linkedin_square','agsdix-seth-social_rss_square','agsdix-seth-social_deviantart_square','agsdix-seth-social_share_square','agsdix-seth-social_myspace_square','agsdix-seth-social_skype_square','agsdix-seth-social_youtube_square','agsdix-seth-social_picassa_square','agsdix-seth-social_googledrive_square','agsdix-seth-social_flickr_square','agsdix-seth-social_blogger_square','agsdix-seth-social_spotify_square','agsdix-seth-social_delicious_square','agsdix-seth-icon_printer','agsdix-seth-icon_calulator','agsdix-seth-icon_building','agsdix-seth-icon_floppy','agsdix-seth-icon_drive','agsdix-seth-icon_search-2','agsdix-seth-icon_id','agsdix-seth-icon_id-2','agsdix-seth-icon_puzzle','agsdix-seth-icon_like','agsdix-seth-icon_dislike','agsdix-seth-icon_mug','agsdix-seth-icon_currency','agsdix-seth-icon_wallet','agsdix-seth-icon_pens','agsdix-seth-icon_easel','agsdix-seth-icon_flowchart','agsdix-seth-icon_datareport','agsdix-seth-icon_briefcase','agsdix-seth-icon_shield','agsdix-seth-icon_percent','agsdix-seth-icon_globe','agsdix-seth-icon_globe-2','agsdix-seth-icon_target','agsdix-seth-icon_hourglass','agsdix-seth-icon_balance','agsdix-seth-icon_rook','agsdix-seth-icon_printer-alt','agsdix-seth-icon_calculator_alt','agsdix-seth-icon_building_alt','agsdix-seth-icon_floppy_alt','agsdix-seth-icon_drive_alt','agsdix-seth-icon_search_alt','agsdix-seth-icon_id_alt','agsdix-seth-icon_id-2_alt','agsdix-seth-icon_puzzle_alt','agsdix-seth-icon_like_alt','agsdix-seth-icon_dislike_alt','agsdix-seth-icon_mug_alt','agsdix-seth-icon_currency_alt','agsdix-seth-icon_wallet_alt','agsdix-seth-icon_pens_alt','agsdix-seth-icon_easel_alt','agsdix-seth-icon_flowchart_alt','agsdix-seth-icon_datareport_alt','agsdix-seth-icon_briefcase_alt','agsdix-seth-icon_shield_alt','agsdix-seth-icon_percent_alt','agsdix-seth-icon_globe_alt','agsdix-seth-icon_clipboard',
			),
			// Font Awesome 6
			// Icon IDs copied from Font Awesome JavaScript code; see icon-packs/fontawesome6/LICENSE.txt for details
			'fa6' => array(
				'agsdix-fa6b fa-monero','agsdix-fa6b fa-hooli','agsdix-fa6b fa-yelp','agsdix-fa6b fa-cc-visa','agsdix-fa6b fa-lastfm','agsdix-fa6b fa-shopware','agsdix-fa6b fa-creative-commons-nc','agsdix-fa6b fa-aws','agsdix-fa6b fa-redhat','agsdix-fa6b fa-yoast','agsdix-fa6b fa-cloudflare','agsdix-fa6b fa-ups','agsdix-fa6b fa-wpexplorer','agsdix-fa6b fa-dyalog','agsdix-fa6b fa-bity','agsdix-fa6b fa-stackpath','agsdix-fa6b fa-buysellads','agsdix-fa6b fa-first-order','agsdix-fa6b fa-modx','agsdix-fa6b fa-guilded','agsdix-fa6b fa-vnv','agsdix-fa6b fa-square-js','agsdix-fa6b fa-microsoft','agsdix-fa6b fa-qq','agsdix-fa6b fa-orcid','agsdix-fa6b fa-java','agsdix-fa6b fa-invision','agsdix-fa6b fa-creative-commons-pd-alt','agsdix-fa6b fa-centercode','agsdix-fa6b fa-glide-g','agsdix-fa6b fa-drupal','agsdix-fa6b fa-hire-a-helper','agsdix-fa6b fa-creative-commons-by','agsdix-fa6b fa-unity','agsdix-fa6b fa-whmcs','agsdix-fa6b fa-rocketchat','agsdix-fa6b fa-vk','agsdix-fa6b fa-untappd','agsdix-fa6b fa-mailchimp','agsdix-fa6b fa-css3-alt','agsdix-fa6b fa-square-reddit','agsdix-fa6b fa-vimeo-v','agsdix-fa6b fa-contao','agsdix-fa6b fa-square-font-awesome','agsdix-fa6b fa-deskpro','agsdix-fa6b fa-sistrix','agsdix-fa6b fa-square-instagram','agsdix-fa6b fa-battle-net','agsdix-fa6b fa-the-red-yeti','agsdix-fa6b fa-square-hacker-news','agsdix-fa6b fa-edge','agsdix-fa6b fa-threads','agsdix-fa6b fa-napster','agsdix-fa6b fa-square-snapchat','agsdix-fa6b fa-google-plus-g','agsdix-fa6b fa-artstation','agsdix-fa6b fa-markdown','agsdix-fa6b fa-sourcetree','agsdix-fa6b fa-google-plus','agsdix-fa6b fa-diaspora','agsdix-fa6b fa-foursquare','agsdix-fa6b fa-stack-overflow','agsdix-fa6b fa-github-alt','agsdix-fa6b fa-phoenix-squadron','agsdix-fa6b fa-pagelines','agsdix-fa6b fa-algolia','agsdix-fa6b fa-red-river','agsdix-fa6b fa-creative-commons-sa','agsdix-fa6b fa-safari','agsdix-fa6b fa-google','agsdix-fa6b fa-square-font-awesome-stroke','agsdix-fa6b fa-atlassian','agsdix-fa6b fa-linkedin-in','agsdix-fa6b fa-digital-ocean','agsdix-fa6b fa-nimblr','agsdix-fa6b fa-chromecast','agsdix-fa6b fa-evernote','agsdix-fa6b fa-hacker-news','agsdix-fa6b fa-creative-commons-sampling','agsdix-fa6b fa-adversal','agsdix-fa6b fa-creative-commons','agsdix-fa6b fa-watchman-monitoring','agsdix-fa6b fa-fonticons','agsdix-fa6b fa-weixin','agsdix-fa6b fa-shirtsinbulk','agsdix-fa6b fa-codepen','agsdix-fa6b fa-git-alt','agsdix-fa6b fa-lyft','agsdix-fa6b fa-rev','agsdix-fa6b fa-windows','agsdix-fa6b fa-wizards-of-the-coast','agsdix-fa6b fa-square-viadeo','agsdix-fa6b fa-meetup','agsdix-fa6b fa-centos','agsdix-fa6b fa-adn','agsdix-fa6b fa-cloudsmith','agsdix-fa6b fa-pied-piper-alt','agsdix-fa6b fa-square-dribbble','agsdix-fa6b fa-codiepie','agsdix-fa6b fa-node','agsdix-fa6b fa-mix','agsdix-fa6b fa-steam','agsdix-fa6b fa-cc-apple-pay','agsdix-fa6b fa-scribd','agsdix-fa6b fa-debian','agsdix-fa6b fa-openid','agsdix-fa6b fa-instalod','agsdix-fa6b fa-expeditedssl','agsdix-fa6b fa-sellcast','agsdix-fa6b fa-square-twitter','agsdix-fa6b fa-r-project','agsdix-fa6b fa-delicious','agsdix-fa6b fa-freebsd','agsdix-fa6b fa-vuejs','agsdix-fa6b fa-accusoft','agsdix-fa6b fa-ioxhost','agsdix-fa6b fa-fonticons-fi','agsdix-fa6b fa-app-store','agsdix-fa6b fa-cc-mastercard','agsdix-fa6b fa-itunes-note','agsdix-fa6b fa-golang','agsdix-fa6b fa-kickstarter','agsdix-fa6b fa-grav','agsdix-fa6b fa-weibo','agsdix-fa6b fa-uncharted','agsdix-fa6b fa-firstdraft','agsdix-fa6b fa-square-youtube','agsdix-fa6b fa-wikipedia-w','agsdix-fa6b fa-wpressr','agsdix-fa6b fa-angellist','agsdix-fa6b fa-galactic-republic','agsdix-fa6b fa-nfc-directional','agsdix-fa6b fa-skype','agsdix-fa6b fa-joget','agsdix-fa6b fa-fedora','agsdix-fa6b fa-stripe-s','agsdix-fa6b fa-meta','agsdix-fa6b fa-laravel','agsdix-fa6b fa-hotjar','agsdix-fa6b fa-bluetooth-b','agsdix-fa6b fa-sticker-mule','agsdix-fa6b fa-creative-commons-zero','agsdix-fa6b fa-hips','agsdix-fa6b fa-behance','agsdix-fa6b fa-reddit','agsdix-fa6b fa-discord','agsdix-fa6b fa-chrome','agsdix-fa6b fa-app-store-ios','agsdix-fa6b fa-cc-discover','agsdix-fa6b fa-wpbeginner','agsdix-fa6b fa-confluence','agsdix-fa6b fa-mdb','agsdix-fa6b fa-dochub','agsdix-fa6b fa-accessible-icon','agsdix-fa6b fa-ebay','agsdix-fa6b fa-amazon','agsdix-fa6b fa-unsplash','agsdix-fa6b fa-yarn','agsdix-fa6b fa-square-steam','agsdix-fa6b fa-500px','agsdix-fa6b fa-square-vimeo','agsdix-fa6b fa-asymmetrik','agsdix-fa6b fa-font-awesome','agsdix-fa6b fa-gratipay','agsdix-fa6b fa-apple','agsdix-fa6b fa-hive','agsdix-fa6b fa-gitkraken','agsdix-fa6b fa-keybase','agsdix-fa6b fa-apple-pay','agsdix-fa6b fa-padlet','agsdix-fa6b fa-amazon-pay','agsdix-fa6b fa-square-github','agsdix-fa6b fa-stumbleupon','agsdix-fa6b fa-fedex','agsdix-fa6b fa-phoenix-framework','agsdix-fa6b fa-shopify','agsdix-fa6b fa-neos','agsdix-fa6b fa-square-threads','agsdix-fa6b fa-hackerrank','agsdix-fa6b fa-researchgate','agsdix-fa6b fa-swift','agsdix-fa6b fa-angular','agsdix-fa6b fa-speakap','agsdix-fa6b fa-angrycreative','agsdix-fa6b fa-y-combinator','agsdix-fa6b fa-empire','agsdix-fa6b fa-envira','agsdix-fa6b fa-square-gitlab','agsdix-fa6b fa-studiovinari','agsdix-fa6b fa-pied-piper','agsdix-fa6b fa-wordpress','agsdix-fa6b fa-product-hunt','agsdix-fa6b fa-firefox','agsdix-fa6b fa-linode','agsdix-fa6b fa-goodreads','agsdix-fa6b fa-square-odnoklassniki','agsdix-fa6b fa-jsfiddle','agsdix-fa6b fa-sith','agsdix-fa6b fa-themeisle','agsdix-fa6b fa-page4','agsdix-fa6b fa-hashnode','agsdix-fa6b fa-react','agsdix-fa6b fa-cc-paypal','agsdix-fa6b fa-squarespace','agsdix-fa6b fa-cc-stripe','agsdix-fa6b fa-creative-commons-share','agsdix-fa6b fa-bitcoin','agsdix-fa6b fa-keycdn','agsdix-fa6b fa-opera','agsdix-fa6b fa-itch-io','agsdix-fa6b fa-umbraco','agsdix-fa6b fa-galactic-senate','agsdix-fa6b fa-ubuntu','agsdix-fa6b fa-draft2digital','agsdix-fa6b fa-stripe','agsdix-fa6b fa-houzz','agsdix-fa6b fa-gg','agsdix-fa6b fa-dhl','agsdix-fa6b fa-square-pinterest','agsdix-fa6b fa-xing','agsdix-fa6b fa-blackberry','agsdix-fa6b fa-creative-commons-pd','agsdix-fa6b fa-playstation','agsdix-fa6b fa-quinscape','agsdix-fa6b fa-less','agsdix-fa6b fa-blogger-b','agsdix-fa6b fa-opencart','agsdix-fa6b fa-vine','agsdix-fa6b fa-paypal','agsdix-fa6b fa-gitlab','agsdix-fa6b fa-typo3','agsdix-fa6b fa-reddit-alien','agsdix-fa6b fa-yahoo','agsdix-fa6b fa-dailymotion','agsdix-fa6b fa-affiliatetheme','agsdix-fa6b fa-pied-piper-pp','agsdix-fa6b fa-bootstrap','agsdix-fa6b fa-odnoklassniki','agsdix-fa6b fa-nfc-symbol','agsdix-fa6b fa-ethereum','agsdix-fa6b fa-speaker-deck','agsdix-fa6b fa-creative-commons-nc-eu','agsdix-fa6b fa-patreon','agsdix-fa6b fa-avianex','agsdix-fa6b fa-ello','agsdix-fa6b fa-gofore','agsdix-fa6b fa-bimobject','agsdix-fa6b fa-facebook-f','agsdix-fa6b fa-square-google-plus','agsdix-fa6b fa-mandalorian','agsdix-fa6b fa-first-order-alt','agsdix-fa6b fa-osi','agsdix-fa6b fa-google-wallet','agsdix-fa6b fa-d-and-d-beyond','agsdix-fa6b fa-periscope','agsdix-fa6b fa-fulcrum','agsdix-fa6b fa-cloudscale','agsdix-fa6b fa-forumbee','agsdix-fa6b fa-mizuni','agsdix-fa6b fa-schlix','agsdix-fa6b fa-square-xing','agsdix-fa6b fa-bandcamp','agsdix-fa6b fa-wpforms','agsdix-fa6b fa-cloudversify','agsdix-fa6b fa-usps','agsdix-fa6b fa-megaport','agsdix-fa6b fa-magento','agsdix-fa6b fa-spotify','agsdix-fa6b fa-optin-monster','agsdix-fa6b fa-fly','agsdix-fa6b fa-aviato','agsdix-fa6b fa-itunes','agsdix-fa6b fa-cuttlefish','agsdix-fa6b fa-blogger','agsdix-fa6b fa-flickr','agsdix-fa6b fa-viber','agsdix-fa6b fa-soundcloud','agsdix-fa6b fa-digg','agsdix-fa6b fa-tencent-weibo','agsdix-fa6b fa-symfony','agsdix-fa6b fa-maxcdn','agsdix-fa6b fa-etsy','agsdix-fa6b fa-facebook-messenger','agsdix-fa6b fa-audible','agsdix-fa6b fa-think-peaks','agsdix-fa6b fa-bilibili','agsdix-fa6b fa-erlang','agsdix-fa6b fa-x-twitter','agsdix-fa6b fa-cotton-bureau','agsdix-fa6b fa-dashcube','agsdix-fa6b fa-42-group','agsdix-fa6b fa-stack-exchange','agsdix-fa6b fa-elementor','agsdix-fa6b fa-square-pied-piper','agsdix-fa6b fa-creative-commons-nd','agsdix-fa6b fa-palfed','agsdix-fa6b fa-superpowers','agsdix-fa6b fa-resolving','agsdix-fa6b fa-xbox','agsdix-fa6b fa-searchengin','agsdix-fa6b fa-tiktok','agsdix-fa6b fa-square-facebook','agsdix-fa6b fa-renren','agsdix-fa6b fa-linux','agsdix-fa6b fa-glide','agsdix-fa6b fa-linkedin','agsdix-fa6b fa-hubspot','agsdix-fa6b fa-deploydog','agsdix-fa6b fa-twitch','agsdix-fa6b fa-ravelry','agsdix-fa6b fa-mixer','agsdix-fa6b fa-square-lastfm','agsdix-fa6b fa-vimeo','agsdix-fa6b fa-mendeley','agsdix-fa6b fa-uniregistry','agsdix-fa6b fa-figma','agsdix-fa6b fa-creative-commons-remix','agsdix-fa6b fa-cc-amazon-pay','agsdix-fa6b fa-dropbox','agsdix-fa6b fa-instagram','agsdix-fa6b fa-cmplid','agsdix-fa6b fa-facebook','agsdix-fa6b fa-gripfire','agsdix-fa6b fa-jedi-order','agsdix-fa6b fa-uikit','agsdix-fa6b fa-fort-awesome-alt','agsdix-fa6b fa-phabricator','agsdix-fa6b fa-ussunnah','agsdix-fa6b fa-earlybirds','agsdix-fa6b fa-trade-federation','agsdix-fa6b fa-autoprefixer','agsdix-fa6b fa-whatsapp','agsdix-fa6b fa-slideshare','agsdix-fa6b fa-google-play','agsdix-fa6b fa-viadeo','agsdix-fa6b fa-line','agsdix-fa6b fa-google-drive','agsdix-fa6b fa-servicestack','agsdix-fa6b fa-simplybuilt','agsdix-fa6b fa-bitbucket','agsdix-fa6b fa-imdb','agsdix-fa6b fa-deezer','agsdix-fa6b fa-raspberry-pi','agsdix-fa6b fa-jira','agsdix-fa6b fa-docker','agsdix-fa6b fa-screenpal','agsdix-fa6b fa-bluetooth','agsdix-fa6b fa-gitter','agsdix-fa6b fa-d-and-d','agsdix-fa6b fa-microblog','agsdix-fa6b fa-cc-diners-club','agsdix-fa6b fa-gg-circle','agsdix-fa6b fa-pied-piper-hat','agsdix-fa6b fa-kickstarter-k','agsdix-fa6b fa-yandex','agsdix-fa6b fa-readme','agsdix-fa6b fa-html5','agsdix-fa6b fa-sellsy','agsdix-fa6b fa-sass','agsdix-fa6b fa-wirsindhandwerk','agsdix-fa6b fa-buromobelexperte','agsdix-fa6b fa-salesforce','agsdix-fa6b fa-octopus-deploy','agsdix-fa6b fa-medapps','agsdix-fa6b fa-ns8','agsdix-fa6b fa-pinterest-p','agsdix-fa6b fa-apper','agsdix-fa6b fa-fort-awesome','agsdix-fa6b fa-waze','agsdix-fa6b fa-cc-jcb','agsdix-fa6b fa-snapchat','agsdix-fa6b fa-fantasy-flight-games','agsdix-fa6b fa-rust','agsdix-fa6b fa-wix','agsdix-fa6b fa-square-behance','agsdix-fa6b fa-supple','agsdix-fa6b fa-rebel','agsdix-fa6b fa-css3','agsdix-fa6b fa-staylinked','agsdix-fa6b fa-kaggle','agsdix-fa6b fa-space-awesome','agsdix-fa6b fa-deviantart','agsdix-fa6b fa-cpanel','agsdix-fa6b fa-goodreads-g','agsdix-fa6b fa-square-git','agsdix-fa6b fa-square-tumblr','agsdix-fa6b fa-trello','agsdix-fa6b fa-creative-commons-nc-jp','agsdix-fa6b fa-get-pocket','agsdix-fa6b fa-perbyte','agsdix-fa6b fa-grunt','agsdix-fa6b fa-weebly','agsdix-fa6b fa-connectdevelop','agsdix-fa6b fa-leanpub','agsdix-fa6b fa-black-tie','agsdix-fa6b fa-themeco','agsdix-fa6b fa-python','agsdix-fa6b fa-android','agsdix-fa6b fa-bots','agsdix-fa6b fa-free-code-camp','agsdix-fa6b fa-hornbill','agsdix-fa6b fa-js','agsdix-fa6b fa-ideal','agsdix-fa6b fa-git','agsdix-fa6b fa-dev','agsdix-fa6b fa-sketch','agsdix-fa6b fa-yandex-international','agsdix-fa6b fa-cc-amex','agsdix-fa6b fa-uber','agsdix-fa6b fa-github','agsdix-fa6b fa-php','agsdix-fa6b fa-alipay','agsdix-fa6b fa-youtube','agsdix-fa6b fa-skyatlas','agsdix-fa6b fa-firefox-browser','agsdix-fa6b fa-replyd','agsdix-fa6b fa-suse','agsdix-fa6b fa-jenkins','agsdix-fa6b fa-twitter','agsdix-fa6b fa-rockrms','agsdix-fa6b fa-pinterest','agsdix-fa6b fa-buffer','agsdix-fa6b fa-npm','agsdix-fa6b fa-yammer','agsdix-fa6b fa-btc','agsdix-fa6b fa-dribbble','agsdix-fa6b fa-stumbleupon-circle','agsdix-fa6b fa-internet-explorer','agsdix-fa6b fa-stubber','agsdix-fa6b fa-telegram','agsdix-fa6b fa-old-republic','agsdix-fa6b fa-odysee','agsdix-fa6b fa-square-whatsapp','agsdix-fa6b fa-node-js','agsdix-fa6b fa-edge-legacy','agsdix-fa6b fa-slack','agsdix-fa6b fa-medrt','agsdix-fa6b fa-usb','agsdix-fa6b fa-tumblr','agsdix-fa6b fa-vaadin','agsdix-fa6b fa-quora','agsdix-fa6b fa-square-x-twitter','agsdix-fa6b fa-reacteurope','agsdix-fa6b fa-medium','agsdix-fa6b fa-amilia','agsdix-fa6b fa-mixcloud','agsdix-fa6b fa-flipboard','agsdix-fa6b fa-viacoin','agsdix-fa6b fa-critical-role','agsdix-fa6b fa-sitrox','agsdix-fa6b fa-discourse','agsdix-fa6b fa-joomla','agsdix-fa6b fa-mastodon','agsdix-fa6b fa-airbnb','agsdix-fa6b fa-wolf-pack-battalion','agsdix-fa6b fa-buy-n-large','agsdix-fa6b fa-gulp','agsdix-fa6b fa-creative-commons-sampling-plus','agsdix-fa6b fa-strava','agsdix-fa6b fa-ember','agsdix-fa6b fa-canadian-maple-leaf','agsdix-fa6b fa-teamspeak','agsdix-fa6b fa-pushed','agsdix-fa6b fa-wordpress-simple','agsdix-fa6b fa-nutritionix','agsdix-fa6b fa-wodu','agsdix-fa6b fa-google-pay','agsdix-fa6b fa-intercom','agsdix-fa6b fa-zhihu','agsdix-fa6b fa-korvue','agsdix-fa6b fa-pix','agsdix-fa6b fa-steam-symbol','agsdix-fa6r fa-trash-can','agsdix-fa6r fa-message','agsdix-fa6r fa-file-lines','agsdix-fa6r fa-calendar-days','agsdix-fa6r fa-hand-point-right','agsdix-fa6r fa-face-smile-beam','agsdix-fa6r fa-face-grin-stars','agsdix-fa6r fa-address-book','agsdix-fa6r fa-comments','agsdix-fa6r fa-paste','agsdix-fa6r fa-face-grin-tongue-squint','agsdix-fa6r fa-face-flushed','agsdix-fa6r fa-square-caret-right','agsdix-fa6r fa-square-minus','agsdix-fa6r fa-compass','agsdix-fa6r fa-square-caret-down','agsdix-fa6r fa-face-kiss-beam','agsdix-fa6r fa-lightbulb','agsdix-fa6r fa-flag','agsdix-fa6r fa-square-check','agsdix-fa6r fa-circle-dot','agsdix-fa6r fa-face-dizzy','agsdix-fa6r fa-futbol','agsdix-fa6r fa-pen-to-square','agsdix-fa6r fa-hourglass-half','agsdix-fa6r fa-eye-slash','agsdix-fa6r fa-hand','agsdix-fa6r fa-hand-spock','agsdix-fa6r fa-face-kiss','agsdix-fa6r fa-face-grin-tongue','agsdix-fa6r fa-chess-bishop','agsdix-fa6r fa-face-grin-wink','agsdix-fa6r fa-face-grin-wide','agsdix-fa6r fa-face-frown-open','agsdix-fa6r fa-hand-point-up','agsdix-fa6r fa-bookmark','agsdix-fa6r fa-hand-point-down','agsdix-fa6r fa-folder','agsdix-fa6r fa-user','agsdix-fa6r fa-square-caret-left','agsdix-fa6r fa-star','agsdix-fa6r fa-chess-knight','agsdix-fa6r fa-face-laugh-squint','agsdix-fa6r fa-face-laugh','agsdix-fa6r fa-folder-open','agsdix-fa6r fa-clipboard','agsdix-fa6r fa-chess-queen','agsdix-fa6r fa-hand-back-fist','agsdix-fa6r fa-square-caret-up','agsdix-fa6r fa-chart-bar','agsdix-fa6r fa-window-restore','agsdix-fa6r fa-square-plus','agsdix-fa6r fa-image','agsdix-fa6r fa-folder-closed','agsdix-fa6r fa-lemon','agsdix-fa6r fa-handshake','agsdix-fa6r fa-gem','agsdix-fa6r fa-circle-play','agsdix-fa6r fa-circle-check','agsdix-fa6r fa-circle-stop','agsdix-fa6r fa-id-badge','agsdix-fa6r fa-face-laugh-beam','agsdix-fa6r fa-registered','agsdix-fa6r fa-address-card','agsdix-fa6r fa-face-tired','agsdix-fa6r fa-font-awesome','agsdix-fa6r fa-face-smile-wink','agsdix-fa6r fa-file-word','agsdix-fa6r fa-file-powerpoint','agsdix-fa6r fa-envelope-open','agsdix-fa6r fa-file-zipper','agsdix-fa6r fa-square','agsdix-fa6r fa-snowflake','agsdix-fa6r fa-newspaper','agsdix-fa6r fa-face-kiss-wink-heart','agsdix-fa6r fa-star-half-stroke','agsdix-fa6r fa-file-excel','agsdix-fa6r fa-face-grin-beam','agsdix-fa6r fa-object-ungroup','agsdix-fa6r fa-circle-right','agsdix-fa6r fa-face-rolling-eyes','agsdix-fa6r fa-object-group','agsdix-fa6r fa-heart','agsdix-fa6r fa-face-surprise','agsdix-fa6r fa-circle-pause','agsdix-fa6r fa-circle','agsdix-fa6r fa-circle-up','agsdix-fa6r fa-file-audio','agsdix-fa6r fa-file-image','agsdix-fa6r fa-circle-question','agsdix-fa6r fa-face-meh-blank','agsdix-fa6r fa-eye','agsdix-fa6r fa-face-sad-cry','agsdix-fa6r fa-file-code','agsdix-fa6r fa-window-maximize','agsdix-fa6r fa-face-frown','agsdix-fa6r fa-floppy-disk','agsdix-fa6r fa-comment-dots','agsdix-fa6r fa-face-grin-squint','agsdix-fa6r fa-hand-pointer','agsdix-fa6r fa-hand-scissors','agsdix-fa6r fa-face-grin-tears','agsdix-fa6r fa-calendar-xmark','agsdix-fa6r fa-file-video','agsdix-fa6r fa-file-pdf','agsdix-fa6r fa-comment','agsdix-fa6r fa-envelope','agsdix-fa6r fa-hourglass','agsdix-fa6r fa-calendar-check','agsdix-fa6r fa-hard-drive','agsdix-fa6r fa-face-grin-squint-tears','agsdix-fa6r fa-rectangle-list','agsdix-fa6r fa-calendar-plus','agsdix-fa6r fa-circle-left','agsdix-fa6r fa-money-bill-1','agsdix-fa6r fa-clock','agsdix-fa6r fa-keyboard','agsdix-fa6r fa-closed-captioning','agsdix-fa6r fa-images','agsdix-fa6r fa-face-grin','agsdix-fa6r fa-face-meh','agsdix-fa6r fa-id-card','agsdix-fa6r fa-sun','agsdix-fa6r fa-face-laugh-wink','agsdix-fa6r fa-circle-down','agsdix-fa6r fa-thumbs-down','agsdix-fa6r fa-chess-pawn','agsdix-fa6r fa-credit-card','agsdix-fa6r fa-bell','agsdix-fa6r fa-file','agsdix-fa6r fa-hospital','agsdix-fa6r fa-chess-rook','agsdix-fa6r fa-star-half','agsdix-fa6r fa-chess-king','agsdix-fa6r fa-circle-user','agsdix-fa6r fa-copy','agsdix-fa6r fa-share-from-square','agsdix-fa6r fa-copyright','agsdix-fa6r fa-map','agsdix-fa6r fa-bell-slash','agsdix-fa6r fa-hand-lizard','agsdix-fa6r fa-face-smile','agsdix-fa6r fa-hand-peace','agsdix-fa6r fa-face-grin-hearts','agsdix-fa6r fa-building','agsdix-fa6r fa-face-grin-beam-sweat','agsdix-fa6r fa-moon','agsdix-fa6r fa-calendar','agsdix-fa6r fa-face-grin-tongue-wink','agsdix-fa6r fa-clone','agsdix-fa6r fa-face-angry','agsdix-fa6r fa-rectangle-xmark','agsdix-fa6r fa-paper-plane','agsdix-fa6r fa-life-ring','agsdix-fa6r fa-face-grimace','agsdix-fa6r fa-calendar-minus','agsdix-fa6r fa-circle-xmark','agsdix-fa6r fa-thumbs-up','agsdix-fa6r fa-window-minimize','agsdix-fa6r fa-square-full','agsdix-fa6r fa-note-sticky','agsdix-fa6r fa-face-sad-tear','agsdix-fa6r fa-hand-point-left','agsdix-fa6s fa-0','agsdix-fa6s fa-1','agsdix-fa6s fa-2','agsdix-fa6s fa-3','agsdix-fa6s fa-4','agsdix-fa6s fa-5','agsdix-fa6s fa-6','agsdix-fa6s fa-7','agsdix-fa6s fa-8','agsdix-fa6s fa-9','agsdix-fa6s fa-fill-drip','agsdix-fa6s fa-arrows-to-circle','agsdix-fa6s fa-circle-chevron-right','agsdix-fa6s fa-at','agsdix-fa6s fa-trash-can','agsdix-fa6s fa-text-height','agsdix-fa6s fa-user-xmark','agsdix-fa6s fa-stethoscope','agsdix-fa6s fa-message','agsdix-fa6s fa-info','agsdix-fa6s fa-down-left-and-up-right-to-center','agsdix-fa6s fa-explosion','agsdix-fa6s fa-file-lines','agsdix-fa6s fa-wave-square','agsdix-fa6s fa-ring','agsdix-fa6s fa-building-un','agsdix-fa6s fa-dice-three','agsdix-fa6s fa-calendar-days','agsdix-fa6s fa-anchor-circle-check','agsdix-fa6s fa-building-circle-arrow-right','agsdix-fa6s fa-volleyball','agsdix-fa6s fa-arrows-up-to-line','agsdix-fa6s fa-sort-down','agsdix-fa6s fa-circle-minus','agsdix-fa6s fa-door-open','agsdix-fa6s fa-right-from-bracket','agsdix-fa6s fa-atom','agsdix-fa6s fa-soap','agsdix-fa6s fa-icons','agsdix-fa6s fa-microphone-lines-slash','agsdix-fa6s fa-bridge-circle-check','agsdix-fa6s fa-pump-medical','agsdix-fa6s fa-fingerprint','agsdix-fa6s fa-hand-point-right','agsdix-fa6s fa-magnifying-glass-location','agsdix-fa6s fa-forward-step','agsdix-fa6s fa-face-smile-beam','agsdix-fa6s fa-flag-checkered','agsdix-fa6s fa-football','agsdix-fa6s fa-school-circle-exclamation','agsdix-fa6s fa-crop','agsdix-fa6s fa-angles-down','agsdix-fa6s fa-users-rectangle','agsdix-fa6s fa-people-roof','agsdix-fa6s fa-people-line','agsdix-fa6s fa-beer-mug-empty','agsdix-fa6s fa-diagram-predecessor','agsdix-fa6s fa-arrow-up-long','agsdix-fa6s fa-fire-flame-simple','agsdix-fa6s fa-person','agsdix-fa6s fa-laptop','agsdix-fa6s fa-file-csv','agsdix-fa6s fa-menorah','agsdix-fa6s fa-truck-plane','agsdix-fa6s fa-record-vinyl','agsdix-fa6s fa-face-grin-stars','agsdix-fa6s fa-bong','agsdix-fa6s fa-spaghetti-monster-flying','agsdix-fa6s fa-arrow-down-up-across-line','agsdix-fa6s fa-spoon','agsdix-fa6s fa-jar-wheat','agsdix-fa6s fa-envelopes-bulk','agsdix-fa6s fa-file-circle-exclamation','agsdix-fa6s fa-circle-h','agsdix-fa6s fa-pager','agsdix-fa6s fa-address-book','agsdix-fa6s fa-strikethrough','agsdix-fa6s fa-k','agsdix-fa6s fa-landmark-flag','agsdix-fa6s fa-pencil','agsdix-fa6s fa-backward','agsdix-fa6s fa-caret-right','agsdix-fa6s fa-comments','agsdix-fa6s fa-paste','agsdix-fa6s fa-code-pull-request','agsdix-fa6s fa-clipboard-list','agsdix-fa6s fa-truck-ramp-box','agsdix-fa6s fa-user-check','agsdix-fa6s fa-vial-virus','agsdix-fa6s fa-sheet-plastic','agsdix-fa6s fa-blog','agsdix-fa6s fa-user-ninja','agsdix-fa6s fa-person-arrow-up-from-line','agsdix-fa6s fa-scroll-torah','agsdix-fa6s fa-broom-ball','agsdix-fa6s fa-toggle-off','agsdix-fa6s fa-box-archive','agsdix-fa6s fa-person-drowning','agsdix-fa6s fa-arrow-down-9-1','agsdix-fa6s fa-face-grin-tongue-squint','agsdix-fa6s fa-spray-can','agsdix-fa6s fa-truck-monster','agsdix-fa6s fa-w','agsdix-fa6s fa-earth-africa','agsdix-fa6s fa-rainbow','agsdix-fa6s fa-circle-notch','agsdix-fa6s fa-tablet-screen-button','agsdix-fa6s fa-paw','agsdix-fa6s fa-cloud','agsdix-fa6s fa-trowel-bricks','agsdix-fa6s fa-face-flushed','agsdix-fa6s fa-hospital-user','agsdix-fa6s fa-tent-arrow-left-right','agsdix-fa6s fa-gavel','agsdix-fa6s fa-binoculars','agsdix-fa6s fa-microphone-slash','agsdix-fa6s fa-box-tissue','agsdix-fa6s fa-motorcycle','agsdix-fa6s fa-bell-concierge','agsdix-fa6s fa-pen-ruler','agsdix-fa6s fa-people-arrows','agsdix-fa6s fa-mars-and-venus-burst','agsdix-fa6s fa-square-caret-right','agsdix-fa6s fa-scissors','agsdix-fa6s fa-sun-plant-wilt','agsdix-fa6s fa-toilets-portable','agsdix-fa6s fa-hockey-puck','agsdix-fa6s fa-table','agsdix-fa6s fa-magnifying-glass-arrow-right','agsdix-fa6s fa-tachograph-digital','agsdix-fa6s fa-users-slash','agsdix-fa6s fa-clover','agsdix-fa6s fa-reply','agsdix-fa6s fa-star-and-crescent','agsdix-fa6s fa-house-fire','agsdix-fa6s fa-square-minus','agsdix-fa6s fa-helicopter','agsdix-fa6s fa-compass','agsdix-fa6s fa-square-caret-down','agsdix-fa6s fa-file-circle-question','agsdix-fa6s fa-laptop-code','agsdix-fa6s fa-swatchbook','agsdix-fa6s fa-prescription-bottle','agsdix-fa6s fa-bars','agsdix-fa6s fa-people-group','agsdix-fa6s fa-hourglass-end','agsdix-fa6s fa-heart-crack','agsdix-fa6s fa-square-up-right','agsdix-fa6s fa-face-kiss-beam','agsdix-fa6s fa-film','agsdix-fa6s fa-ruler-horizontal','agsdix-fa6s fa-people-robbery','agsdix-fa6s fa-lightbulb','agsdix-fa6s fa-caret-left','agsdix-fa6s fa-circle-exclamation','agsdix-fa6s fa-school-circle-xmark','agsdix-fa6s fa-arrow-right-from-bracket','agsdix-fa6s fa-circle-chevron-down','agsdix-fa6s fa-unlock-keyhole','agsdix-fa6s fa-cloud-showers-heavy','agsdix-fa6s fa-headphones-simple','agsdix-fa6s fa-sitemap','agsdix-fa6s fa-circle-dollar-to-slot','agsdix-fa6s fa-memory','agsdix-fa6s fa-road-spikes','agsdix-fa6s fa-fire-burner','agsdix-fa6s fa-flag','agsdix-fa6s fa-hanukiah','agsdix-fa6s fa-feather','agsdix-fa6s fa-volume-low','agsdix-fa6s fa-comment-slash','agsdix-fa6s fa-cloud-sun-rain','agsdix-fa6s fa-compress','agsdix-fa6s fa-wheat-awn','agsdix-fa6s fa-ankh','agsdix-fa6s fa-hands-holding-child','agsdix-fa6s fa-asterisk','agsdix-fa6s fa-square-check','agsdix-fa6s fa-peseta-sign','agsdix-fa6s fa-heading','agsdix-fa6s fa-ghost','agsdix-fa6s fa-list','agsdix-fa6s fa-square-phone-flip','agsdix-fa6s fa-cart-plus','agsdix-fa6s fa-gamepad','agsdix-fa6s fa-circle-dot','agsdix-fa6s fa-face-dizzy','agsdix-fa6s fa-egg','agsdix-fa6s fa-house-medical-circle-xmark','agsdix-fa6s fa-campground','agsdix-fa6s fa-folder-plus','agsdix-fa6s fa-futbol','agsdix-fa6s fa-paintbrush','agsdix-fa6s fa-lock','agsdix-fa6s fa-gas-pump','agsdix-fa6s fa-hot-tub-person','agsdix-fa6s fa-map-location','agsdix-fa6s fa-house-flood-water','agsdix-fa6s fa-tree','agsdix-fa6s fa-bridge-lock','agsdix-fa6s fa-sack-dollar','agsdix-fa6s fa-pen-to-square','agsdix-fa6s fa-car-side','agsdix-fa6s fa-share-nodes','agsdix-fa6s fa-heart-circle-minus','agsdix-fa6s fa-hourglass-half','agsdix-fa6s fa-microscope','agsdix-fa6s fa-sink','agsdix-fa6s fa-bag-shopping','agsdix-fa6s fa-arrow-down-z-a','agsdix-fa6s fa-mitten','agsdix-fa6s fa-person-rays','agsdix-fa6s fa-users','agsdix-fa6s fa-eye-slash','agsdix-fa6s fa-flask-vial','agsdix-fa6s fa-hand','agsdix-fa6s fa-om','agsdix-fa6s fa-worm','agsdix-fa6s fa-house-circle-xmark','agsdix-fa6s fa-plug','agsdix-fa6s fa-chevron-up','agsdix-fa6s fa-hand-spock','agsdix-fa6s fa-stopwatch','agsdix-fa6s fa-face-kiss','agsdix-fa6s fa-bridge-circle-xmark','agsdix-fa6s fa-face-grin-tongue','agsdix-fa6s fa-chess-bishop','agsdix-fa6s fa-face-grin-wink','agsdix-fa6s fa-ear-deaf','agsdix-fa6s fa-road-circle-check','agsdix-fa6s fa-dice-five','agsdix-fa6s fa-square-rss','agsdix-fa6s fa-land-mine-on','agsdix-fa6s fa-i-cursor','agsdix-fa6s fa-stamp','agsdix-fa6s fa-stairs','agsdix-fa6s fa-i','agsdix-fa6s fa-hryvnia-sign','agsdix-fa6s fa-pills','agsdix-fa6s fa-face-grin-wide','agsdix-fa6s fa-tooth','agsdix-fa6s fa-v','agsdix-fa6s fa-bangladeshi-taka-sign','agsdix-fa6s fa-bicycle','agsdix-fa6s fa-staff-snake','agsdix-fa6s fa-head-side-cough-slash','agsdix-fa6s fa-truck-medical','agsdix-fa6s fa-wheat-awn-circle-exclamation','agsdix-fa6s fa-snowman','agsdix-fa6s fa-mortar-pestle','agsdix-fa6s fa-road-barrier','agsdix-fa6s fa-school','agsdix-fa6s fa-igloo','agsdix-fa6s fa-joint','agsdix-fa6s fa-angle-right','agsdix-fa6s fa-horse','agsdix-fa6s fa-q','agsdix-fa6s fa-g','agsdix-fa6s fa-notes-medical','agsdix-fa6s fa-temperature-half','agsdix-fa6s fa-dong-sign','agsdix-fa6s fa-capsules','agsdix-fa6s fa-poo-storm','agsdix-fa6s fa-face-frown-open','agsdix-fa6s fa-hand-point-up','agsdix-fa6s fa-money-bill','agsdix-fa6s fa-bookmark','agsdix-fa6s fa-align-justify','agsdix-fa6s fa-umbrella-beach','agsdix-fa6s fa-helmet-un','agsdix-fa6s fa-bullseye','agsdix-fa6s fa-bacon','agsdix-fa6s fa-hand-point-down','agsdix-fa6s fa-arrow-up-from-bracket','agsdix-fa6s fa-folder','agsdix-fa6s fa-file-waveform','agsdix-fa6s fa-radiation','agsdix-fa6s fa-chart-simple','agsdix-fa6s fa-mars-stroke','agsdix-fa6s fa-vial','agsdix-fa6s fa-gauge','agsdix-fa6s fa-wand-magic-sparkles','agsdix-fa6s fa-e','agsdix-fa6s fa-pen-clip','agsdix-fa6s fa-bridge-circle-exclamation','agsdix-fa6s fa-user','agsdix-fa6s fa-school-circle-check','agsdix-fa6s fa-dumpster','agsdix-fa6s fa-van-shuttle','agsdix-fa6s fa-building-user','agsdix-fa6s fa-square-caret-left','agsdix-fa6s fa-highlighter','agsdix-fa6s fa-key','agsdix-fa6s fa-bullhorn','agsdix-fa6s fa-globe','agsdix-fa6s fa-synagogue','agsdix-fa6s fa-person-half-dress','agsdix-fa6s fa-road-bridge','agsdix-fa6s fa-location-arrow','agsdix-fa6s fa-c','agsdix-fa6s fa-tablet-button','agsdix-fa6s fa-building-lock','agsdix-fa6s fa-pizza-slice','agsdix-fa6s fa-money-bill-wave','agsdix-fa6s fa-chart-area','agsdix-fa6s fa-house-flag','agsdix-fa6s fa-person-circle-minus','agsdix-fa6s fa-ban','agsdix-fa6s fa-camera-rotate','agsdix-fa6s fa-spray-can-sparkles','agsdix-fa6s fa-star','agsdix-fa6s fa-repeat','agsdix-fa6s fa-cross','agsdix-fa6s fa-box','agsdix-fa6s fa-venus-mars','agsdix-fa6s fa-arrow-pointer','agsdix-fa6s fa-maximize','agsdix-fa6s fa-charging-station','agsdix-fa6s fa-shapes','agsdix-fa6s fa-shuffle','agsdix-fa6s fa-person-running','agsdix-fa6s fa-mobile-retro','agsdix-fa6s fa-grip-lines-vertical','agsdix-fa6s fa-spider','agsdix-fa6s fa-hands-bound','agsdix-fa6s fa-file-invoice-dollar','agsdix-fa6s fa-plane-circle-exclamation','agsdix-fa6s fa-x-ray','agsdix-fa6s fa-spell-check','agsdix-fa6s fa-slash','agsdix-fa6s fa-computer-mouse','agsdix-fa6s fa-arrow-right-to-bracket','agsdix-fa6s fa-shop-slash','agsdix-fa6s fa-server','agsdix-fa6s fa-virus-covid-slash','agsdix-fa6s fa-shop-lock','agsdix-fa6s fa-hourglass-start','agsdix-fa6s fa-blender-phone','agsdix-fa6s fa-building-wheat','agsdix-fa6s fa-person-breastfeeding','agsdix-fa6s fa-right-to-bracket','agsdix-fa6s fa-venus','agsdix-fa6s fa-passport','agsdix-fa6s fa-heart-pulse','agsdix-fa6s fa-people-carry-box','agsdix-fa6s fa-temperature-high','agsdix-fa6s fa-microchip','agsdix-fa6s fa-crown','agsdix-fa6s fa-weight-hanging','agsdix-fa6s fa-xmarks-lines','agsdix-fa6s fa-file-prescription','agsdix-fa6s fa-weight-scale','agsdix-fa6s fa-user-group','agsdix-fa6s fa-arrow-up-a-z','agsdix-fa6s fa-chess-knight','agsdix-fa6s fa-face-laugh-squint','agsdix-fa6s fa-wheelchair','agsdix-fa6s fa-circle-arrow-up','agsdix-fa6s fa-toggle-on','agsdix-fa6s fa-person-walking','agsdix-fa6s fa-l','agsdix-fa6s fa-fire','agsdix-fa6s fa-bed-pulse','agsdix-fa6s fa-shuttle-space','agsdix-fa6s fa-face-laugh','agsdix-fa6s fa-folder-open','agsdix-fa6s fa-heart-circle-plus','agsdix-fa6s fa-code-fork','agsdix-fa6s fa-city','agsdix-fa6s fa-microphone-lines','agsdix-fa6s fa-pepper-hot','agsdix-fa6s fa-unlock','agsdix-fa6s fa-colon-sign','agsdix-fa6s fa-headset','agsdix-fa6s fa-store-slash','agsdix-fa6s fa-road-circle-xmark','agsdix-fa6s fa-user-minus','agsdix-fa6s fa-mars-stroke-up','agsdix-fa6s fa-champagne-glasses','agsdix-fa6s fa-clipboard','agsdix-fa6s fa-house-circle-exclamation','agsdix-fa6s fa-file-arrow-up','agsdix-fa6s fa-wifi','agsdix-fa6s fa-bath','agsdix-fa6s fa-underline','agsdix-fa6s fa-user-pen','agsdix-fa6s fa-signature','agsdix-fa6s fa-stroopwafel','agsdix-fa6s fa-bold','agsdix-fa6s fa-anchor-lock','agsdix-fa6s fa-building-ngo','agsdix-fa6s fa-manat-sign','agsdix-fa6s fa-not-equal','agsdix-fa6s fa-border-top-left','agsdix-fa6s fa-map-location-dot','agsdix-fa6s fa-jedi','agsdix-fa6s fa-square-poll-vertical','agsdix-fa6s fa-mug-hot','agsdix-fa6s fa-car-battery','agsdix-fa6s fa-gift','agsdix-fa6s fa-dice-two','agsdix-fa6s fa-chess-queen','agsdix-fa6s fa-glasses','agsdix-fa6s fa-chess-board','agsdix-fa6s fa-building-circle-check','agsdix-fa6s fa-person-chalkboard','agsdix-fa6s fa-mars-stroke-right','agsdix-fa6s fa-hand-back-fist','agsdix-fa6s fa-square-caret-up','agsdix-fa6s fa-cloud-showers-water','agsdix-fa6s fa-chart-bar','agsdix-fa6s fa-hands-bubbles','agsdix-fa6s fa-less-than-equal','agsdix-fa6s fa-train','agsdix-fa6s fa-eye-low-vision','agsdix-fa6s fa-crow','agsdix-fa6s fa-sailboat','agsdix-fa6s fa-window-restore','agsdix-fa6s fa-square-plus','agsdix-fa6s fa-torii-gate','agsdix-fa6s fa-frog','agsdix-fa6s fa-bucket','agsdix-fa6s fa-image','agsdix-fa6s fa-microphone','agsdix-fa6s fa-cow','agsdix-fa6s fa-caret-up','agsdix-fa6s fa-screwdriver','agsdix-fa6s fa-folder-closed','agsdix-fa6s fa-house-tsunami','agsdix-fa6s fa-square-nfi','agsdix-fa6s fa-arrow-up-from-ground-water','agsdix-fa6s fa-martini-glass','agsdix-fa6s fa-rotate-left','agsdix-fa6s fa-table-columns','agsdix-fa6s fa-lemon','agsdix-fa6s fa-head-side-mask','agsdix-fa6s fa-handshake','agsdix-fa6s fa-gem','agsdix-fa6s fa-dolly','agsdix-fa6s fa-smoking','agsdix-fa6s fa-minimize','agsdix-fa6s fa-monument','agsdix-fa6s fa-snowplow','agsdix-fa6s fa-angles-right','agsdix-fa6s fa-cannabis','agsdix-fa6s fa-circle-play','agsdix-fa6s fa-tablets','agsdix-fa6s fa-ethernet','agsdix-fa6s fa-euro-sign','agsdix-fa6s fa-chair','agsdix-fa6s fa-circle-check','agsdix-fa6s fa-circle-stop','agsdix-fa6s fa-compass-drafting','agsdix-fa6s fa-plate-wheat','agsdix-fa6s fa-icicles','agsdix-fa6s fa-person-shelter','agsdix-fa6s fa-neuter','agsdix-fa6s fa-id-badge','agsdix-fa6s fa-marker','agsdix-fa6s fa-face-laugh-beam','agsdix-fa6s fa-helicopter-symbol','agsdix-fa6s fa-universal-access','agsdix-fa6s fa-circle-chevron-up','agsdix-fa6s fa-lari-sign','agsdix-fa6s fa-volcano','agsdix-fa6s fa-person-walking-dashed-line-arrow-right','agsdix-fa6s fa-sterling-sign','agsdix-fa6s fa-viruses','agsdix-fa6s fa-square-person-confined','agsdix-fa6s fa-user-tie','agsdix-fa6s fa-arrow-down-long','agsdix-fa6s fa-tent-arrow-down-to-line','agsdix-fa6s fa-certificate','agsdix-fa6s fa-reply-all','agsdix-fa6s fa-suitcase','agsdix-fa6s fa-person-skating','agsdix-fa6s fa-filter-circle-dollar','agsdix-fa6s fa-camera-retro','agsdix-fa6s fa-circle-arrow-down','agsdix-fa6s fa-file-import','agsdix-fa6s fa-square-arrow-up-right','agsdix-fa6s fa-box-open','agsdix-fa6s fa-scroll','agsdix-fa6s fa-spa','agsdix-fa6s fa-location-pin-lock','agsdix-fa6s fa-pause','agsdix-fa6s fa-hill-avalanche','agsdix-fa6s fa-temperature-empty','agsdix-fa6s fa-bomb','agsdix-fa6s fa-registered','agsdix-fa6s fa-address-card','agsdix-fa6s fa-scale-unbalanced-flip','agsdix-fa6s fa-subscript','agsdix-fa6s fa-diamond-turn-right','agsdix-fa6s fa-burst','agsdix-fa6s fa-house-laptop','agsdix-fa6s fa-face-tired','agsdix-fa6s fa-money-bills','agsdix-fa6s fa-smog','agsdix-fa6s fa-crutch','agsdix-fa6s fa-font-awesome','agsdix-fa6s fa-cloud-arrow-up','agsdix-fa6s fa-palette','agsdix-fa6s fa-arrows-turn-right','agsdix-fa6s fa-vest','agsdix-fa6s fa-ferry','agsdix-fa6s fa-arrows-down-to-people','agsdix-fa6s fa-seedling','agsdix-fa6s fa-left-right','agsdix-fa6s fa-boxes-packing','agsdix-fa6s fa-circle-arrow-left','agsdix-fa6s fa-group-arrows-rotate','agsdix-fa6s fa-bowl-food','agsdix-fa6s fa-candy-cane','agsdix-fa6s fa-arrow-down-wide-short','agsdix-fa6s fa-cloud-bolt','agsdix-fa6s fa-text-slash','agsdix-fa6s fa-face-smile-wink','agsdix-fa6s fa-file-word','agsdix-fa6s fa-file-powerpoint','agsdix-fa6s fa-arrows-left-right','agsdix-fa6s fa-house-lock','agsdix-fa6s fa-cloud-arrow-down','agsdix-fa6s fa-children','agsdix-fa6s fa-chalkboard','agsdix-fa6s fa-user-large-slash','agsdix-fa6s fa-envelope-open','agsdix-fa6s fa-handshake-simple-slash','agsdix-fa6s fa-mattress-pillow','agsdix-fa6s fa-guarani-sign','agsdix-fa6s fa-arrows-rotate','agsdix-fa6s fa-fire-extinguisher','agsdix-fa6s fa-cruzeiro-sign','agsdix-fa6s fa-greater-than-equal','agsdix-fa6s fa-shield-halved','agsdix-fa6s fa-book-atlas','agsdix-fa6s fa-virus','agsdix-fa6s fa-envelope-circle-check','agsdix-fa6s fa-layer-group','agsdix-fa6s fa-arrows-to-dot','agsdix-fa6s fa-archway','agsdix-fa6s fa-heart-circle-check','agsdix-fa6s fa-house-chimney-crack','agsdix-fa6s fa-file-zipper','agsdix-fa6s fa-square','agsdix-fa6s fa-martini-glass-empty','agsdix-fa6s fa-couch','agsdix-fa6s fa-cedi-sign','agsdix-fa6s fa-italic','agsdix-fa6s fa-church','agsdix-fa6s fa-comments-dollar','agsdix-fa6s fa-democrat','agsdix-fa6s fa-z','agsdix-fa6s fa-person-skiing','agsdix-fa6s fa-road-lock','agsdix-fa6s fa-a','agsdix-fa6s fa-temperature-arrow-down','agsdix-fa6s fa-feather-pointed','agsdix-fa6s fa-p','agsdix-fa6s fa-snowflake','agsdix-fa6s fa-newspaper','agsdix-fa6s fa-rectangle-ad','agsdix-fa6s fa-circle-arrow-right','agsdix-fa6s fa-filter-circle-xmark','agsdix-fa6s fa-locust','agsdix-fa6s fa-sort','agsdix-fa6s fa-list-ol','agsdix-fa6s fa-person-dress-burst','agsdix-fa6s fa-money-check-dollar','agsdix-fa6s fa-vector-square','agsdix-fa6s fa-bread-slice','agsdix-fa6s fa-language','agsdix-fa6s fa-face-kiss-wink-heart','agsdix-fa6s fa-filter','agsdix-fa6s fa-question','agsdix-fa6s fa-file-signature','agsdix-fa6s fa-up-down-left-right','agsdix-fa6s fa-house-chimney-user','agsdix-fa6s fa-hand-holding-heart','agsdix-fa6s fa-puzzle-piece','agsdix-fa6s fa-money-check','agsdix-fa6s fa-star-half-stroke','agsdix-fa6s fa-code','agsdix-fa6s fa-whiskey-glass','agsdix-fa6s fa-building-circle-exclamation','agsdix-fa6s fa-magnifying-glass-chart','agsdix-fa6s fa-arrow-up-right-from-square','agsdix-fa6s fa-cubes-stacked','agsdix-fa6s fa-won-sign','agsdix-fa6s fa-virus-covid','agsdix-fa6s fa-austral-sign','agsdix-fa6s fa-f','agsdix-fa6s fa-leaf','agsdix-fa6s fa-road','agsdix-fa6s fa-taxi','agsdix-fa6s fa-person-circle-plus','agsdix-fa6s fa-chart-pie','agsdix-fa6s fa-bolt-lightning','agsdix-fa6s fa-sack-xmark','agsdix-fa6s fa-file-excel','agsdix-fa6s fa-file-contract','agsdix-fa6s fa-fish-fins','agsdix-fa6s fa-building-flag','agsdix-fa6s fa-face-grin-beam','agsdix-fa6s fa-object-ungroup','agsdix-fa6s fa-poop','agsdix-fa6s fa-location-pin','agsdix-fa6s fa-kaaba','agsdix-fa6s fa-toilet-paper','agsdix-fa6s fa-helmet-safety','agsdix-fa6s fa-eject','agsdix-fa6s fa-circle-right','agsdix-fa6s fa-plane-circle-check','agsdix-fa6s fa-face-rolling-eyes','agsdix-fa6s fa-object-group','agsdix-fa6s fa-chart-line','agsdix-fa6s fa-mask-ventilator','agsdix-fa6s fa-arrow-right','agsdix-fa6s fa-signs-post','agsdix-fa6s fa-cash-register','agsdix-fa6s fa-person-circle-question','agsdix-fa6s fa-h','agsdix-fa6s fa-tarp','agsdix-fa6s fa-screwdriver-wrench','agsdix-fa6s fa-arrows-to-eye','agsdix-fa6s fa-plug-circle-bolt','agsdix-fa6s fa-heart','agsdix-fa6s fa-mars-and-venus','agsdix-fa6s fa-house-user','agsdix-fa6s fa-dumpster-fire','agsdix-fa6s fa-house-crack','agsdix-fa6s fa-martini-glass-citrus','agsdix-fa6s fa-face-surprise','agsdix-fa6s fa-bottle-water','agsdix-fa6s fa-circle-pause','agsdix-fa6s fa-toilet-paper-slash','agsdix-fa6s fa-apple-whole','agsdix-fa6s fa-kitchen-set','agsdix-fa6s fa-r','agsdix-fa6s fa-temperature-quarter','agsdix-fa6s fa-cube','agsdix-fa6s fa-bitcoin-sign','agsdix-fa6s fa-shield-dog','agsdix-fa6s fa-solar-panel','agsdix-fa6s fa-lock-open','agsdix-fa6s fa-elevator','agsdix-fa6s fa-money-bill-transfer','agsdix-fa6s fa-money-bill-trend-up','agsdix-fa6s fa-house-flood-water-circle-arrow-right','agsdix-fa6s fa-square-poll-horizontal','agsdix-fa6s fa-circle','agsdix-fa6s fa-backward-fast','agsdix-fa6s fa-recycle','agsdix-fa6s fa-user-astronaut','agsdix-fa6s fa-plane-slash','agsdix-fa6s fa-trademark','agsdix-fa6s fa-basketball','agsdix-fa6s fa-satellite-dish','agsdix-fa6s fa-circle-up','agsdix-fa6s fa-mobile-screen-button','agsdix-fa6s fa-volume-high','agsdix-fa6s fa-users-rays','agsdix-fa6s fa-wallet','agsdix-fa6s fa-clipboard-check','agsdix-fa6s fa-file-audio','agsdix-fa6s fa-burger','agsdix-fa6s fa-wrench','agsdix-fa6s fa-bugs','agsdix-fa6s fa-rupee-sign','agsdix-fa6s fa-file-image','agsdix-fa6s fa-circle-question','agsdix-fa6s fa-plane-departure','agsdix-fa6s fa-handshake-slash','agsdix-fa6s fa-book-bookmark','agsdix-fa6s fa-code-branch','agsdix-fa6s fa-hat-cowboy','agsdix-fa6s fa-bridge','agsdix-fa6s fa-phone-flip','agsdix-fa6s fa-truck-front','agsdix-fa6s fa-cat','agsdix-fa6s fa-anchor-circle-exclamation','agsdix-fa6s fa-truck-field','agsdix-fa6s fa-route','agsdix-fa6s fa-clipboard-question','agsdix-fa6s fa-panorama','agsdix-fa6s fa-comment-medical','agsdix-fa6s fa-teeth-open','agsdix-fa6s fa-file-circle-minus','agsdix-fa6s fa-tags','agsdix-fa6s fa-wine-glass','agsdix-fa6s fa-forward-fast','agsdix-fa6s fa-face-meh-blank','agsdix-fa6s fa-square-parking','agsdix-fa6s fa-house-signal','agsdix-fa6s fa-bars-progress','agsdix-fa6s fa-faucet-drip','agsdix-fa6s fa-cart-flatbed','agsdix-fa6s fa-ban-smoking','agsdix-fa6s fa-terminal','agsdix-fa6s fa-mobile-button','agsdix-fa6s fa-house-medical-flag','agsdix-fa6s fa-basket-shopping','agsdix-fa6s fa-tape','agsdix-fa6s fa-bus-simple','agsdix-fa6s fa-eye','agsdix-fa6s fa-face-sad-cry','agsdix-fa6s fa-audio-description','agsdix-fa6s fa-person-military-to-person','agsdix-fa6s fa-file-shield','agsdix-fa6s fa-user-slash','agsdix-fa6s fa-pen','agsdix-fa6s fa-tower-observation','agsdix-fa6s fa-file-code','agsdix-fa6s fa-signal','agsdix-fa6s fa-bus','agsdix-fa6s fa-heart-circle-xmark','agsdix-fa6s fa-house-chimney','agsdix-fa6s fa-window-maximize','agsdix-fa6s fa-face-frown','agsdix-fa6s fa-prescription','agsdix-fa6s fa-shop','agsdix-fa6s fa-floppy-disk','agsdix-fa6s fa-vihara','agsdix-fa6s fa-scale-unbalanced','agsdix-fa6s fa-sort-up','agsdix-fa6s fa-comment-dots','agsdix-fa6s fa-plant-wilt','agsdix-fa6s fa-diamond','agsdix-fa6s fa-face-grin-squint','agsdix-fa6s fa-hand-holding-dollar','agsdix-fa6s fa-bacterium','agsdix-fa6s fa-hand-pointer','agsdix-fa6s fa-drum-steelpan','agsdix-fa6s fa-hand-scissors','agsdix-fa6s fa-hands-praying','agsdix-fa6s fa-arrow-rotate-right','agsdix-fa6s fa-biohazard','agsdix-fa6s fa-location-crosshairs','agsdix-fa6s fa-mars-double','agsdix-fa6s fa-child-dress','agsdix-fa6s fa-users-between-lines','agsdix-fa6s fa-lungs-virus','agsdix-fa6s fa-face-grin-tears','agsdix-fa6s fa-phone','agsdix-fa6s fa-calendar-xmark','agsdix-fa6s fa-child-reaching','agsdix-fa6s fa-head-side-virus','agsdix-fa6s fa-user-gear','agsdix-fa6s fa-arrow-up-1-9','agsdix-fa6s fa-door-closed','agsdix-fa6s fa-shield-virus','agsdix-fa6s fa-dice-six','agsdix-fa6s fa-mosquito-net','agsdix-fa6s fa-bridge-water','agsdix-fa6s fa-person-booth','agsdix-fa6s fa-text-width','agsdix-fa6s fa-hat-wizard','agsdix-fa6s fa-pen-fancy','agsdix-fa6s fa-person-digging','agsdix-fa6s fa-trash','agsdix-fa6s fa-gauge-simple','agsdix-fa6s fa-book-medical','agsdix-fa6s fa-poo','agsdix-fa6s fa-quote-right','agsdix-fa6s fa-shirt','agsdix-fa6s fa-cubes','agsdix-fa6s fa-divide','agsdix-fa6s fa-tenge-sign','agsdix-fa6s fa-headphones','agsdix-fa6s fa-hands-holding','agsdix-fa6s fa-hands-clapping','agsdix-fa6s fa-republican','agsdix-fa6s fa-arrow-left','agsdix-fa6s fa-person-circle-xmark','agsdix-fa6s fa-ruler','agsdix-fa6s fa-align-left','agsdix-fa6s fa-dice-d6','agsdix-fa6s fa-restroom','agsdix-fa6s fa-j','agsdix-fa6s fa-users-viewfinder','agsdix-fa6s fa-file-video','agsdix-fa6s fa-up-right-from-square','agsdix-fa6s fa-table-cells','agsdix-fa6s fa-file-pdf','agsdix-fa6s fa-book-bible','agsdix-fa6s fa-o','agsdix-fa6s fa-suitcase-medical','agsdix-fa6s fa-user-secret','agsdix-fa6s fa-otter','agsdix-fa6s fa-person-dress','agsdix-fa6s fa-comment-dollar','agsdix-fa6s fa-business-time','agsdix-fa6s fa-table-cells-large','agsdix-fa6s fa-book-tanakh','agsdix-fa6s fa-phone-volume','agsdix-fa6s fa-hat-cowboy-side','agsdix-fa6s fa-clipboard-user','agsdix-fa6s fa-child','agsdix-fa6s fa-lira-sign','agsdix-fa6s fa-satellite','agsdix-fa6s fa-plane-lock','agsdix-fa6s fa-tag','agsdix-fa6s fa-comment','agsdix-fa6s fa-cake-candles','agsdix-fa6s fa-envelope','agsdix-fa6s fa-angles-up','agsdix-fa6s fa-paperclip','agsdix-fa6s fa-arrow-right-to-city','agsdix-fa6s fa-ribbon','agsdix-fa6s fa-lungs','agsdix-fa6s fa-arrow-up-9-1','agsdix-fa6s fa-litecoin-sign','agsdix-fa6s fa-border-none','agsdix-fa6s fa-circle-nodes','agsdix-fa6s fa-parachute-box','agsdix-fa6s fa-indent','agsdix-fa6s fa-truck-field-un','agsdix-fa6s fa-hourglass','agsdix-fa6s fa-mountain','agsdix-fa6s fa-user-doctor','agsdix-fa6s fa-circle-info','agsdix-fa6s fa-cloud-meatball','agsdix-fa6s fa-camera','agsdix-fa6s fa-square-virus','agsdix-fa6s fa-meteor','agsdix-fa6s fa-car-on','agsdix-fa6s fa-sleigh','agsdix-fa6s fa-arrow-down-1-9','agsdix-fa6s fa-hand-holding-droplet','agsdix-fa6s fa-water','agsdix-fa6s fa-calendar-check','agsdix-fa6s fa-braille','agsdix-fa6s fa-prescription-bottle-medical','agsdix-fa6s fa-landmark','agsdix-fa6s fa-truck','agsdix-fa6s fa-crosshairs','agsdix-fa6s fa-person-cane','agsdix-fa6s fa-tent','agsdix-fa6s fa-vest-patches','agsdix-fa6s fa-check-double','agsdix-fa6s fa-arrow-down-a-z','agsdix-fa6s fa-money-bill-wheat','agsdix-fa6s fa-cookie','agsdix-fa6s fa-arrow-rotate-left','agsdix-fa6s fa-hard-drive','agsdix-fa6s fa-face-grin-squint-tears','agsdix-fa6s fa-dumbbell','agsdix-fa6s fa-rectangle-list','agsdix-fa6s fa-tarp-droplet','agsdix-fa6s fa-house-medical-circle-check','agsdix-fa6s fa-person-skiing-nordic','agsdix-fa6s fa-calendar-plus','agsdix-fa6s fa-plane-arrival','agsdix-fa6s fa-circle-left','agsdix-fa6s fa-train-subway','agsdix-fa6s fa-chart-gantt','agsdix-fa6s fa-indian-rupee-sign','agsdix-fa6s fa-crop-simple','agsdix-fa6s fa-money-bill-1','agsdix-fa6s fa-left-long','agsdix-fa6s fa-dna','agsdix-fa6s fa-virus-slash','agsdix-fa6s fa-minus','agsdix-fa6s fa-chess','agsdix-fa6s fa-arrow-left-long','agsdix-fa6s fa-plug-circle-check','agsdix-fa6s fa-street-view','agsdix-fa6s fa-franc-sign','agsdix-fa6s fa-volume-off','agsdix-fa6s fa-hands-asl-interpreting','agsdix-fa6s fa-gear','agsdix-fa6s fa-droplet-slash','agsdix-fa6s fa-mosque','agsdix-fa6s fa-mosquito','agsdix-fa6s fa-star-of-david','agsdix-fa6s fa-person-military-rifle','agsdix-fa6s fa-cart-shopping','agsdix-fa6s fa-vials','agsdix-fa6s fa-plug-circle-plus','agsdix-fa6s fa-place-of-worship','agsdix-fa6s fa-grip-vertical','agsdix-fa6s fa-arrow-turn-up','agsdix-fa6s fa-u','agsdix-fa6s fa-square-root-variable','agsdix-fa6s fa-clock','agsdix-fa6s fa-backward-step','agsdix-fa6s fa-pallet','agsdix-fa6s fa-faucet','agsdix-fa6s fa-baseball-bat-ball','agsdix-fa6s fa-s','agsdix-fa6s fa-timeline','agsdix-fa6s fa-keyboard','agsdix-fa6s fa-caret-down','agsdix-fa6s fa-house-chimney-medical','agsdix-fa6s fa-temperature-three-quarters','agsdix-fa6s fa-mobile-screen','agsdix-fa6s fa-plane-up','agsdix-fa6s fa-piggy-bank','agsdix-fa6s fa-battery-half','agsdix-fa6s fa-mountain-city','agsdix-fa6s fa-coins','agsdix-fa6s fa-khanda','agsdix-fa6s fa-sliders','agsdix-fa6s fa-folder-tree','agsdix-fa6s fa-network-wired','agsdix-fa6s fa-map-pin','agsdix-fa6s fa-hamsa','agsdix-fa6s fa-cent-sign','agsdix-fa6s fa-flask','agsdix-fa6s fa-person-pregnant','agsdix-fa6s fa-wand-sparkles','agsdix-fa6s fa-ellipsis-vertical','agsdix-fa6s fa-ticket','agsdix-fa6s fa-power-off','agsdix-fa6s fa-right-long','agsdix-fa6s fa-flag-usa','agsdix-fa6s fa-laptop-file','agsdix-fa6s fa-tty','agsdix-fa6s fa-diagram-next','agsdix-fa6s fa-person-rifle','agsdix-fa6s fa-house-medical-circle-exclamation','agsdix-fa6s fa-closed-captioning','agsdix-fa6s fa-person-hiking','agsdix-fa6s fa-venus-double','agsdix-fa6s fa-images','agsdix-fa6s fa-calculator','agsdix-fa6s fa-people-pulling','agsdix-fa6s fa-n','agsdix-fa6s fa-cable-car','agsdix-fa6s fa-cloud-rain','agsdix-fa6s fa-building-circle-xmark','agsdix-fa6s fa-ship','agsdix-fa6s fa-arrows-down-to-line','agsdix-fa6s fa-download','agsdix-fa6s fa-face-grin','agsdix-fa6s fa-delete-left','agsdix-fa6s fa-eye-dropper','agsdix-fa6s fa-file-circle-check','agsdix-fa6s fa-forward','agsdix-fa6s fa-mobile','agsdix-fa6s fa-face-meh','agsdix-fa6s fa-align-center','agsdix-fa6s fa-book-skull','agsdix-fa6s fa-id-card','agsdix-fa6s fa-outdent','agsdix-fa6s fa-heart-circle-exclamation','agsdix-fa6s fa-house','agsdix-fa6s fa-calendar-week','agsdix-fa6s fa-laptop-medical','agsdix-fa6s fa-b','agsdix-fa6s fa-file-medical','agsdix-fa6s fa-dice-one','agsdix-fa6s fa-kiwi-bird','agsdix-fa6s fa-arrow-right-arrow-left','agsdix-fa6s fa-rotate-right','agsdix-fa6s fa-utensils','agsdix-fa6s fa-arrow-up-wide-short','agsdix-fa6s fa-mill-sign','agsdix-fa6s fa-bowl-rice','agsdix-fa6s fa-skull','agsdix-fa6s fa-tower-broadcast','agsdix-fa6s fa-truck-pickup','agsdix-fa6s fa-up-long','agsdix-fa6s fa-stop','agsdix-fa6s fa-code-merge','agsdix-fa6s fa-upload','agsdix-fa6s fa-hurricane','agsdix-fa6s fa-mound','agsdix-fa6s fa-toilet-portable','agsdix-fa6s fa-compact-disc','agsdix-fa6s fa-file-arrow-down','agsdix-fa6s fa-caravan','agsdix-fa6s fa-shield-cat','agsdix-fa6s fa-bolt','agsdix-fa6s fa-glass-water','agsdix-fa6s fa-oil-well','agsdix-fa6s fa-vault','agsdix-fa6s fa-mars','agsdix-fa6s fa-toilet','agsdix-fa6s fa-plane-circle-xmark','agsdix-fa6s fa-yen-sign','agsdix-fa6s fa-ruble-sign','agsdix-fa6s fa-sun','agsdix-fa6s fa-guitar','agsdix-fa6s fa-face-laugh-wink','agsdix-fa6s fa-horse-head','agsdix-fa6s fa-bore-hole','agsdix-fa6s fa-industry','agsdix-fa6s fa-circle-down','agsdix-fa6s fa-arrows-turn-to-dots','agsdix-fa6s fa-florin-sign','agsdix-fa6s fa-arrow-down-short-wide','agsdix-fa6s fa-less-than','agsdix-fa6s fa-angle-down','agsdix-fa6s fa-car-tunnel','agsdix-fa6s fa-head-side-cough','agsdix-fa6s fa-grip-lines','agsdix-fa6s fa-thumbs-down','agsdix-fa6s fa-user-lock','agsdix-fa6s fa-arrow-right-long','agsdix-fa6s fa-anchor-circle-xmark','agsdix-fa6s fa-ellipsis','agsdix-fa6s fa-chess-pawn','agsdix-fa6s fa-kit-medical','agsdix-fa6s fa-person-through-window','agsdix-fa6s fa-toolbox','agsdix-fa6s fa-hands-holding-circle','agsdix-fa6s fa-bug','agsdix-fa6s fa-credit-card','agsdix-fa6s fa-car','agsdix-fa6s fa-hand-holding-hand','agsdix-fa6s fa-book-open-reader','agsdix-fa6s fa-mountain-sun','agsdix-fa6s fa-arrows-left-right-to-line','agsdix-fa6s fa-dice-d20','agsdix-fa6s fa-truck-droplet','agsdix-fa6s fa-file-circle-xmark','agsdix-fa6s fa-temperature-arrow-up','agsdix-fa6s fa-medal','agsdix-fa6s fa-bed','agsdix-fa6s fa-square-h','agsdix-fa6s fa-podcast','agsdix-fa6s fa-temperature-full','agsdix-fa6s fa-bell','agsdix-fa6s fa-superscript','agsdix-fa6s fa-plug-circle-xmark','agsdix-fa6s fa-star-of-life','agsdix-fa6s fa-phone-slash','agsdix-fa6s fa-paint-roller','agsdix-fa6s fa-handshake-angle','agsdix-fa6s fa-location-dot','agsdix-fa6s fa-file','agsdix-fa6s fa-greater-than','agsdix-fa6s fa-person-swimming','agsdix-fa6s fa-arrow-down','agsdix-fa6s fa-droplet','agsdix-fa6s fa-eraser','agsdix-fa6s fa-earth-americas','agsdix-fa6s fa-person-burst','agsdix-fa6s fa-dove','agsdix-fa6s fa-battery-empty','agsdix-fa6s fa-socks','agsdix-fa6s fa-inbox','agsdix-fa6s fa-section','agsdix-fa6s fa-gauge-high','agsdix-fa6s fa-envelope-open-text','agsdix-fa6s fa-hospital','agsdix-fa6s fa-wine-bottle','agsdix-fa6s fa-chess-rook','agsdix-fa6s fa-bars-staggered','agsdix-fa6s fa-dharmachakra','agsdix-fa6s fa-hotdog','agsdix-fa6s fa-person-walking-with-cane','agsdix-fa6s fa-drum','agsdix-fa6s fa-ice-cream','agsdix-fa6s fa-heart-circle-bolt','agsdix-fa6s fa-fax','agsdix-fa6s fa-paragraph','agsdix-fa6s fa-check-to-slot','agsdix-fa6s fa-star-half','agsdix-fa6s fa-boxes-stacked','agsdix-fa6s fa-link','agsdix-fa6s fa-ear-listen','agsdix-fa6s fa-tree-city','agsdix-fa6s fa-play','agsdix-fa6s fa-font','agsdix-fa6s fa-rupiah-sign','agsdix-fa6s fa-magnifying-glass','agsdix-fa6s fa-table-tennis-paddle-ball','agsdix-fa6s fa-person-dots-from-line','agsdix-fa6s fa-trash-can-arrow-up','agsdix-fa6s fa-naira-sign','agsdix-fa6s fa-cart-arrow-down','agsdix-fa6s fa-walkie-talkie','agsdix-fa6s fa-file-pen','agsdix-fa6s fa-receipt','agsdix-fa6s fa-square-pen','agsdix-fa6s fa-suitcase-rolling','agsdix-fa6s fa-person-circle-exclamation','agsdix-fa6s fa-chevron-down','agsdix-fa6s fa-battery-full','agsdix-fa6s fa-skull-crossbones','agsdix-fa6s fa-code-compare','agsdix-fa6s fa-list-ul','agsdix-fa6s fa-school-lock','agsdix-fa6s fa-tower-cell','agsdix-fa6s fa-down-long','agsdix-fa6s fa-ranking-star','agsdix-fa6s fa-chess-king','agsdix-fa6s fa-person-harassing','agsdix-fa6s fa-brazilian-real-sign','agsdix-fa6s fa-landmark-dome','agsdix-fa6s fa-arrow-up','agsdix-fa6s fa-tv','agsdix-fa6s fa-shrimp','agsdix-fa6s fa-list-check','agsdix-fa6s fa-jug-detergent','agsdix-fa6s fa-circle-user','agsdix-fa6s fa-user-shield','agsdix-fa6s fa-wind','agsdix-fa6s fa-car-burst','agsdix-fa6s fa-y','agsdix-fa6s fa-person-snowboarding','agsdix-fa6s fa-truck-fast','agsdix-fa6s fa-fish','agsdix-fa6s fa-user-graduate','agsdix-fa6s fa-circle-half-stroke','agsdix-fa6s fa-clapperboard','agsdix-fa6s fa-circle-radiation','agsdix-fa6s fa-baseball','agsdix-fa6s fa-jet-fighter-up','agsdix-fa6s fa-diagram-project','agsdix-fa6s fa-copy','agsdix-fa6s fa-volume-xmark','agsdix-fa6s fa-hand-sparkles','agsdix-fa6s fa-grip','agsdix-fa6s fa-share-from-square','agsdix-fa6s fa-child-combatant','agsdix-fa6s fa-gun','agsdix-fa6s fa-square-phone','agsdix-fa6s fa-plus','agsdix-fa6s fa-expand','agsdix-fa6s fa-computer','agsdix-fa6s fa-xmark','agsdix-fa6s fa-arrows-up-down-left-right','agsdix-fa6s fa-chalkboard-user','agsdix-fa6s fa-peso-sign','agsdix-fa6s fa-building-shield','agsdix-fa6s fa-baby','agsdix-fa6s fa-users-line','agsdix-fa6s fa-quote-left','agsdix-fa6s fa-tractor','agsdix-fa6s fa-trash-arrow-up','agsdix-fa6s fa-arrow-down-up-lock','agsdix-fa6s fa-lines-leaning','agsdix-fa6s fa-ruler-combined','agsdix-fa6s fa-copyright','agsdix-fa6s fa-equals','agsdix-fa6s fa-blender','agsdix-fa6s fa-teeth','agsdix-fa6s fa-shekel-sign','agsdix-fa6s fa-map','agsdix-fa6s fa-rocket','agsdix-fa6s fa-photo-film','agsdix-fa6s fa-folder-minus','agsdix-fa6s fa-store','agsdix-fa6s fa-arrow-trend-up','agsdix-fa6s fa-plug-circle-minus','agsdix-fa6s fa-sign-hanging','agsdix-fa6s fa-bezier-curve','agsdix-fa6s fa-bell-slash','agsdix-fa6s fa-tablet','agsdix-fa6s fa-school-flag','agsdix-fa6s fa-fill','agsdix-fa6s fa-angle-up','agsdix-fa6s fa-drumstick-bite','agsdix-fa6s fa-holly-berry','agsdix-fa6s fa-chevron-left','agsdix-fa6s fa-bacteria','agsdix-fa6s fa-hand-lizard','agsdix-fa6s fa-notdef','agsdix-fa6s fa-disease','agsdix-fa6s fa-briefcase-medical','agsdix-fa6s fa-genderless','agsdix-fa6s fa-chevron-right','agsdix-fa6s fa-retweet','agsdix-fa6s fa-car-rear','agsdix-fa6s fa-pump-soap','agsdix-fa6s fa-video-slash','agsdix-fa6s fa-battery-quarter','agsdix-fa6s fa-radio','agsdix-fa6s fa-baby-carriage','agsdix-fa6s fa-traffic-light','agsdix-fa6s fa-thermometer','agsdix-fa6s fa-vr-cardboard','agsdix-fa6s fa-hand-middle-finger','agsdix-fa6s fa-percent','agsdix-fa6s fa-truck-moving','agsdix-fa6s fa-glass-water-droplet','agsdix-fa6s fa-display','agsdix-fa6s fa-face-smile','agsdix-fa6s fa-thumbtack','agsdix-fa6s fa-trophy','agsdix-fa6s fa-person-praying','agsdix-fa6s fa-hammer','agsdix-fa6s fa-hand-peace','agsdix-fa6s fa-rotate','agsdix-fa6s fa-spinner','agsdix-fa6s fa-robot','agsdix-fa6s fa-peace','agsdix-fa6s fa-gears','agsdix-fa6s fa-warehouse','agsdix-fa6s fa-arrow-up-right-dots','agsdix-fa6s fa-splotch','agsdix-fa6s fa-face-grin-hearts','agsdix-fa6s fa-dice-four','agsdix-fa6s fa-sim-card','agsdix-fa6s fa-transgender','agsdix-fa6s fa-mercury','agsdix-fa6s fa-arrow-turn-down','agsdix-fa6s fa-person-falling-burst','agsdix-fa6s fa-award','agsdix-fa6s fa-ticket-simple','agsdix-fa6s fa-building','agsdix-fa6s fa-angles-left','agsdix-fa6s fa-qrcode','agsdix-fa6s fa-clock-rotate-left','agsdix-fa6s fa-face-grin-beam-sweat','agsdix-fa6s fa-file-export','agsdix-fa6s fa-shield','agsdix-fa6s fa-arrow-up-short-wide','agsdix-fa6s fa-house-medical','agsdix-fa6s fa-golf-ball-tee','agsdix-fa6s fa-circle-chevron-left','agsdix-fa6s fa-house-chimney-window','agsdix-fa6s fa-pen-nib','agsdix-fa6s fa-tent-arrow-turn-left','agsdix-fa6s fa-tents','agsdix-fa6s fa-wand-magic','agsdix-fa6s fa-dog','agsdix-fa6s fa-carrot','agsdix-fa6s fa-moon','agsdix-fa6s fa-wine-glass-empty','agsdix-fa6s fa-cheese','agsdix-fa6s fa-yin-yang','agsdix-fa6s fa-music','agsdix-fa6s fa-code-commit','agsdix-fa6s fa-temperature-low','agsdix-fa6s fa-person-biking','agsdix-fa6s fa-broom','agsdix-fa6s fa-shield-heart','agsdix-fa6s fa-gopuram','agsdix-fa6s fa-earth-oceania','agsdix-fa6s fa-square-xmark','agsdix-fa6s fa-hashtag','agsdix-fa6s fa-up-right-and-down-left-from-center','agsdix-fa6s fa-oil-can','agsdix-fa6s fa-t','agsdix-fa6s fa-hippo','agsdix-fa6s fa-chart-column','agsdix-fa6s fa-infinity','agsdix-fa6s fa-vial-circle-check','agsdix-fa6s fa-person-arrow-down-to-line','agsdix-fa6s fa-voicemail','agsdix-fa6s fa-fan','agsdix-fa6s fa-person-walking-luggage','agsdix-fa6s fa-up-down','agsdix-fa6s fa-cloud-moon-rain','agsdix-fa6s fa-calendar','agsdix-fa6s fa-trailer','agsdix-fa6s fa-bahai','agsdix-fa6s fa-sd-card','agsdix-fa6s fa-dragon','agsdix-fa6s fa-shoe-prints','agsdix-fa6s fa-circle-plus','agsdix-fa6s fa-face-grin-tongue-wink','agsdix-fa6s fa-hand-holding','agsdix-fa6s fa-plug-circle-exclamation','agsdix-fa6s fa-link-slash','agsdix-fa6s fa-clone','agsdix-fa6s fa-person-walking-arrow-loop-left','agsdix-fa6s fa-arrow-up-z-a','agsdix-fa6s fa-fire-flame-curved','agsdix-fa6s fa-tornado','agsdix-fa6s fa-file-circle-plus','agsdix-fa6s fa-book-quran','agsdix-fa6s fa-anchor','agsdix-fa6s fa-border-all','agsdix-fa6s fa-face-angry','agsdix-fa6s fa-cookie-bite','agsdix-fa6s fa-arrow-trend-down','agsdix-fa6s fa-rss','agsdix-fa6s fa-draw-polygon','agsdix-fa6s fa-scale-balanced','agsdix-fa6s fa-gauge-simple-high','agsdix-fa6s fa-shower','agsdix-fa6s fa-desktop','agsdix-fa6s fa-m','agsdix-fa6s fa-table-list','agsdix-fa6s fa-comment-sms','agsdix-fa6s fa-book','agsdix-fa6s fa-user-plus','agsdix-fa6s fa-check','agsdix-fa6s fa-battery-three-quarters','agsdix-fa6s fa-house-circle-check','agsdix-fa6s fa-angle-left','agsdix-fa6s fa-diagram-successor','agsdix-fa6s fa-truck-arrow-right','agsdix-fa6s fa-arrows-split-up-and-left','agsdix-fa6s fa-hand-fist','agsdix-fa6s fa-cloud-moon','agsdix-fa6s fa-briefcase','agsdix-fa6s fa-person-falling','agsdix-fa6s fa-image-portrait','agsdix-fa6s fa-user-tag','agsdix-fa6s fa-rug','agsdix-fa6s fa-earth-europe','agsdix-fa6s fa-cart-flatbed-suitcase','agsdix-fa6s fa-rectangle-xmark','agsdix-fa6s fa-baht-sign','agsdix-fa6s fa-book-open','agsdix-fa6s fa-book-journal-whills','agsdix-fa6s fa-handcuffs','agsdix-fa6s fa-triangle-exclamation','agsdix-fa6s fa-database','agsdix-fa6s fa-share','agsdix-fa6s fa-bottle-droplet','agsdix-fa6s fa-mask-face','agsdix-fa6s fa-hill-rockslide','agsdix-fa6s fa-right-left','agsdix-fa6s fa-paper-plane','agsdix-fa6s fa-road-circle-exclamation','agsdix-fa6s fa-dungeon','agsdix-fa6s fa-align-right','agsdix-fa6s fa-money-bill-1-wave','agsdix-fa6s fa-life-ring','agsdix-fa6s fa-hands','agsdix-fa6s fa-calendar-day','agsdix-fa6s fa-water-ladder','agsdix-fa6s fa-arrows-up-down','agsdix-fa6s fa-face-grimace','agsdix-fa6s fa-wheelchair-move','agsdix-fa6s fa-turn-down','agsdix-fa6s fa-person-walking-arrow-right','agsdix-fa6s fa-square-envelope','agsdix-fa6s fa-dice','agsdix-fa6s fa-bowling-ball','agsdix-fa6s fa-brain','agsdix-fa6s fa-bandage','agsdix-fa6s fa-calendar-minus','agsdix-fa6s fa-circle-xmark','agsdix-fa6s fa-gifts','agsdix-fa6s fa-hotel','agsdix-fa6s fa-earth-asia','agsdix-fa6s fa-id-card-clip','agsdix-fa6s fa-magnifying-glass-plus','agsdix-fa6s fa-thumbs-up','agsdix-fa6s fa-user-clock','agsdix-fa6s fa-hand-dots','agsdix-fa6s fa-file-invoice','agsdix-fa6s fa-window-minimize','agsdix-fa6s fa-mug-saucer','agsdix-fa6s fa-brush','agsdix-fa6s fa-mask','agsdix-fa6s fa-magnifying-glass-minus','agsdix-fa6s fa-ruler-vertical','agsdix-fa6s fa-user-large','agsdix-fa6s fa-train-tram','agsdix-fa6s fa-user-nurse','agsdix-fa6s fa-syringe','agsdix-fa6s fa-cloud-sun','agsdix-fa6s fa-stopwatch-20','agsdix-fa6s fa-square-full','agsdix-fa6s fa-magnet','agsdix-fa6s fa-jar','agsdix-fa6s fa-note-sticky','agsdix-fa6s fa-bug-slash','agsdix-fa6s fa-arrow-up-from-water-pump','agsdix-fa6s fa-bone','agsdix-fa6s fa-user-injured','agsdix-fa6s fa-face-sad-tear','agsdix-fa6s fa-plane','agsdix-fa6s fa-tent-arrows-down','agsdix-fa6s fa-exclamation','agsdix-fa6s fa-arrows-spin','agsdix-fa6s fa-print','agsdix-fa6s fa-turkish-lira-sign','agsdix-fa6s fa-dollar-sign','agsdix-fa6s fa-x','agsdix-fa6s fa-magnifying-glass-dollar','agsdix-fa6s fa-users-gear','agsdix-fa6s fa-person-military-pointing','agsdix-fa6s fa-building-columns','agsdix-fa6s fa-umbrella','agsdix-fa6s fa-trowel','agsdix-fa6s fa-d','agsdix-fa6s fa-stapler','agsdix-fa6s fa-masks-theater','agsdix-fa6s fa-kip-sign','agsdix-fa6s fa-hand-point-left','agsdix-fa6s fa-handshake-simple','agsdix-fa6s fa-jet-fighter','agsdix-fa6s fa-square-share-nodes','agsdix-fa6s fa-barcode','agsdix-fa6s fa-plus-minus','agsdix-fa6s fa-video','agsdix-fa6s fa-graduation-cap','agsdix-fa6s fa-hand-holding-medical','agsdix-fa6s fa-person-circle-check','agsdix-fa6s fa-turn-up'
			),
		);

		
		
		
		if ( $isAdmin && current_user_can('manage_options')) {
			include( self::$pluginDir . 'admin/notices/admin-notices.php' );
		}
		include( self::$pluginDir . 'ags-divi-icons-pages/AGS_Divi_Icons_Pages.php' );
		if ( class_exists( 'AGS_Divi_Icons_Pages' ) ) {
			self::$agsDiviIconsPages = new AGS_Divi_Icons_Pages();
		}
		$actionClassName = defined( 'AGS_DIVI_ICONS_PRO' ) ? 'AGS_Divi_Icons' : 'AGS_Divi_Icons_Pro';

		add_action( 'admin_menu', array( 'AGS_Divi_Icons', 'adminMenu' ), 11 );
		add_action( 'load-plugins.php', array( 'AGS_Divi_Icons', 'onLoadPluginsPhp' ) );
		add_action( 'admin_enqueue_scripts', array( 'AGS_Divi_Icons', 'adminScripts' ) );
		add_action( 'wp_ajax_agsdi_get_icons', array( 'AGS_Divi_Icons', 'getOrderedIconsAjax' ) );

		// Load translations
		load_plugin_textdomain( 'ds-icon-expansion', false, self::$pluginDir . 'languages' );

		if ( $isAdmin ) {
			$settings = get_option( 'agsdi-icon-expansion' );
		}
		

			

			

			add_action( 'et_fb_framework_loaded', array( 'AGS_Divi_Icons', 'adminScripts' ) );
			add_filter( 'et_pb_font_icon_symbols', array( 'AGS_Divi_Icons', 'addIcons' ) );
			add_filter( 'mce_external_plugins', array( 'AGS_Divi_Icons', 'mcePlugins' ) );
			add_filter( 'mce_buttons', array( 'AGS_Divi_Icons', 'mceButtons' ) );
			add_filter( 'mce_css', array( 'AGS_Divi_Icons', 'mceStyles' ) );
			add_filter( 'et_fb_get_asset_helpers', array( __CLASS__, 'setIconFilteringCategories' ), 11 );
			
			$minSuffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

			if ( self::loadFontAwesomeInSelectedPages() ) {
				wp_enqueue_style( 'ags-divi-icons', self::$pluginDirUrl . '/css/icons.min.css', array(), self::PLUGIN_VERSION );
				wp_enqueue_script( 'ags-divi-icons', self::$pluginDirUrl . '/js/icons'.$minSuffix.'.js', array( 'jquery' ), self::PLUGIN_VERSION );

				
				
				$hasEnqueuedCustom = false;
				
				if (is_admin()) {
					$customIconsLastMod = get_option('agsdi_custom_last_modified_admin');
					if ($customIconsLastMod !== false) {
						wp_enqueue_style( 'ags-divi-icons-custom-icons', content_url('wadip-custom/admin-icons.css'), null, (int) $customIconsLastMod );
						wp_enqueue_script( 'ags-divi-icons-custom', content_url('wadip-custom/admin-icons.js'), null, (int) $customIconsLastMod );
					}
					$hasEnqueuedCustom = true;
				}
				
				foreach ( self::$icon_packs['single_color'] as $prefix => $pack ) {
						if ( $pack['value'] == 'yes' ) {
							if ( $prefix[0] == 'c' && is_numeric(substr($prefix, 1)) ) {
								if (!$hasEnqueuedCustom) {
									$customIconsLastMod = get_option('agsdi_custom_last_modified');
									if ($customIconsLastMod !== false) {
										wp_enqueue_style( 'ags-divi-icons-custom-icons', content_url('wadip-custom/icons.css'), null, (int) $customIconsLastMod );
										wp_enqueue_script( 'ags-divi-icons-custom', content_url('wadip-custom/icons.js'), null, (int) $customIconsLastMod );
									}
									$hasEnqueuedCustom = true;
								}
							} else if ( $prefix !== 'fa' ) {
								wp_enqueue_style( 'ags-divi-icons-' . $prefix . '-icons', $pack['path'] . 'agsdi-icons.min.css', null, self::PLUGIN_VERSION );
								wp_enqueue_script( 'ags-divi-icons-' . $prefix, $pack['path'] . 'agsdi-icons'.$minSuffix.'.js', null, self::PLUGIN_VERSION );
								
								if ($prefix == 'fa6' && get_option('agsdi_fa6_upgrade')) {
									wp_enqueue_script( 'ags-divi-icons-fa6upgrade', $pack['path'] . 'fa6upgrade.min.js', ['ags-divi-icons-fa6'], self::PLUGIN_VERSION );
								}
							}
						}
				}

			}

			$ags_divi_icons_config = array(
				'pluginDirUrl' => self::$pluginDirUrl
			);
			
			if (!empty($_GET['et_fb']) || is_admin()) {
				$ags_divi_icons_config['singleColorFilters'] = self::getIconFilters();
			}

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only GET variable checks
			if ( ! empty( $_GET['et_fb'] ) || ( is_admin() && isset( $_GET['page'] ) && $_GET['page'] == 'et_theme_builder' ) ) { // in frontend builder or theme builder
				wp_enqueue_script( 'ags-divi-icons-editor', self::$pluginDirUrl . '/js/tinymce-plugin'.$minSuffix.'.js', array(
					'jquery',
					'react-tiny-mce',
					'wp-i18n'
				), self::PLUGIN_VERSION );  // redid second dependency 2019-10-11, good
				wp_set_script_translations('ags-divi-icons-editor', 'ds-icon-expansion', self::$pluginDirUrl .'/languages');
				$ags_divi_icons_config['mceStyles'] = self::mceStyles( '' );
			}

			if ( self::loadFontAwesomeInSelectedPages() ) {
				
				wp_localize_script( 'ags-divi-icons', 'ags_divi_icons_config', $ags_divi_icons_config );
			}
			
			require_once(__DIR__.'/blocks/blocks.php');

			

		$option_plugin_version = 'AGS_DIVI_ICONS_PRO' ? 'agsdi_version' : 'agsdi_free_version';
		if ( get_option( $option_plugin_version ) != self::PLUGIN_VERSION ) {

			

			// Fix: free version had pro options enabled
			if ( version_compare( get_option( 'agsdi_free_version', 0 ), '1.5.0', '<' ) ) {
				delete_option('agsdi_fa_icons' );
				delete_option('agsdi_mc_icons' );
				delete_option('agsdi_md_icons' );
				delete_option('agsdi_ui_icons' );
				delete_option('agsdi_np_icons' );
				delete_option('agsdi_cs_icons' );
			}

			

			

			update_option( $option_plugin_version, self::PLUGIN_VERSION );
		}

	}
	
	public static function getIconFilters() {
		$filters = [
			
			'agsdi-' => __('Free Icons', 'ds-icon-expansion'),
			
			'agsdix-seth' => __('Elegant Themes', 'ds-icon-expansion'),
		];

		
		
		return $filters;
	}

	public static function on_activation() {

		add_option( 'ds-icon-expansion_first_activate', time(), '', false );

		if ( get_option( 'AGS_DIVI_ICONS_PRO' ? 'agsdi_version' : 'agsdi_free_version' ) === false ) { // this is the first ever activation

			add_option( 'agsdi_fo_icons', 'yes' );
			add_option( 'agsdi_eth_icons', 'yes' );


			

			add_option( 'AGS_DIVI_ICONS_PRO' ? 'agsdi_version' : 'agsdi_free_version', self::PLUGIN_VERSION );
		}

	}

	public static function loadFontAwesomeInSelectedPages() {
		if ( is_admin() ) {
			if ( self::$agsDiviIconsPages->isAllowedPages() ||
			     self::$agsDiviIconsPages->IsDiviBuilderAllowedPages() ||
			     self::$agsDiviIconsPages->isDiviLayout() ) {
				return true;
			}

			return false;
		}

		// Currently loading on all non-admin pages
		return true;

		/*
		if( self::$agsDiviIconsPages->isFrontendPostsOrPages()){
			return true;
		}

	    return false;
		*/
	}

	public static function adminMenu() {
		add_options_page( self::PLUGIN_NAME, self::PLUGIN_NAME, 'manage_options', 'admin.php?page=ds-icon-expansion' );
		add_submenu_page( 'admin.php', self::PLUGIN_NAME, self::PLUGIN_NAME,
			'manage_options', 'ds-icon-expansion', array( 'AGS_Divi_Icons', 'adminPage' ) );
		add_submenu_page( 'et_divi_options', self::PLUGIN_NAME, self::PLUGIN_NAME,
			'manage_options', 'ds-icon-expansion', array( 'AGS_Divi_Icons', 'adminPage' ) );
		add_submenu_page( 'et_extra_options', self::PLUGIN_NAME, self::PLUGIN_NAME,
			'manage_options', 'ds-icon-expansion', array( 'AGS_Divi_Icons', 'adminPage' ) );
	}

	public static function adminPage() {
		include( self::$pluginDir . 'admin/admin.php' );
	}

	// Add settings link on plugin page
	public static function pluginActionLinks( $links ) {
		
		
		$custom_links = esc_html__( 'Instructions', 'ds-icon-expansion' );
		

		array_unshift( $links, '<a href="admin.php?page=ds-icon-expansion">' . $custom_links . '</a>' );

		return $links;
	}

	public static function onLoadPluginsPhp() {
		$plugin = plugin_basename( __FILE__ );
		add_filter( 'plugin_action_links_' . $plugin, array( 'AGS_Divi_Icons', 'pluginActionLinks' ) );
	}

	public static function addIcons( $existingIcons ) {
		$icons = self::getOrderedIcons();

		return array_merge( $existingIcons, $icons );
	}

	public static function getOrderedIconsAjax() {
		wp_send_json_success( array_merge( self::getOrderedIcons(false), self::getTinyMCEIcons() ) );
	}

	public static function getOrderedIcons($withFa6Upgrade=true) {
		$icons = self::getIcons();
		

		if ( isset( $proIcons ) ) {
			return array_merge( $icons, $proIcons );
		} else {
			return $icons;
		}
	}

	public static function getIcons() {

		$isDisabled = empty( self::$icon_packs['single_color']['fo']['value'] ) || self::$icon_packs['single_color']['fo']['value'] !== 'yes';

		if ( $isDisabled && ! empty( get_option( 'agsdi-legacy-sets-loading' ) ) ) {
			return array();
		}

		$icons = self::$icons['single_color']['fo'];


		return $isDisabled
			? array_fill( 0, count( $icons ), 'agsdix-null' )
			: $icons;

	}

	

	public static function getTinyMCEIcons() {
		$icons = array();
		foreach ( self::$icon_packs['single_color'] as $prefix => $pack ) {
			$tinymce = ! empty ( $pack['tinymce_only'] ) && $pack['tinymce_only'];
			if ( $pack['value'] === 'yes' ) {
				$icons = self::$icons['single_color'][ $prefix ];
			}
		}

		return $icons;
	}


	


	public static function adminScripts() {
		$minSuffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_style( 'admin-ags-divi-icons-multicolor-icons', self::$pluginDirUrl . '/icon-packs/ags-multicolor/agsdi-icons.min.css', array(), self::PLUGIN_VERSION );
		wp_enqueue_style( 'ags-divi-icons-admin', self::$pluginDirUrl . '/css/admin.min.css', array(), self::PLUGIN_VERSION );
		wp_enqueue_script( 'ags-divi-icons-admin', self::$pluginDirUrl . '/js/admin' . ( defined( 'ET_BUILDER_PRODUCT_VERSION' ) && version_compare( ET_BUILDER_PRODUCT_VERSION, '4.13', '<' ) ? '-old' : '' ) . $minSuffix .'.js', array(
			'jquery',
			'wp-i18n'
		), self::PLUGIN_VERSION );
		wp_set_script_translations( 'ags-divi-icons-admin', 'ds-icon-expansion', dirname( __FILE__ ) . '/languages' );

		//wp_enqueue_script('ags-divi-icons-tinymce', self::$pluginDirUrl.'/js/tinymce-plugin.js', array('tinymce'), self::PLUGIN_VERSION);
		wp_localize_script( 'ags-divi-icons-admin', 'ags_divi_icons_tinymce_config', array(
			
			'styleInheritMessage' => esc_html__( 'If you leave the color and/or size settings blank, the icon will derive its color and size from the surrounding text\'s color and size (based on the styling of the icon\'s parent element). This is not reflected in the icon preview.', 'ds-icon-expansion' )
		) );
		wp_localize_script( 'ags-divi-icons-admin', 'ags_divi_icons_credit_promos', self::getCreditPromos( 'icon-picker' ) );

		global $pagenow;
		if ( isset( $pagenow ) && $pagenow == 'admin.php' ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );

			wp_enqueue_style( 'ags-wadip-addons-admin', self::$pluginDirUrl . '/admin/addons/css/admin.min.css', array(), self::PLUGIN_VERSION );

		}


		// RankMath SEO plugin compatibility
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- just checking if et_fb is set
		if ( class_exists( 'RankMath\\Divi\\Divi' ) && ! empty( $_GET['et_fb'] ) ) {
			add_filter( 'script_loader_tag', function ( $tag ) {
				return strpos( $tag, 'i18n' ) ? str_replace( 'et_fb_ignore_iframe', '', $tag ) : $tag;
			} );
		}
	}

	public static function mcePlugins( $plugins ) {
		$minSuffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
		$plugins['agsdi_icons'] = self::$pluginDirUrl . '/js/tinymce-plugin'.$minSuffix.'.js';

		return $plugins;
	}

	public static function mceButtons( $toolbarButtons ) {
		$toolbarButtons[] = 'agsdi_icons';

		return $toolbarButtons;
	}

	public static function mceStyles( $styles ) {

		$styles .= ( empty( $styles ) ? '' : ',' ) . self::$pluginDirUrl . '/css/icons.css';

		$hasEnqueuedCustom = false;
		
		foreach ( self::$icon_packs['single_color'] as $prefix => $pack ) {
			if ( $pack['value'] === 'yes' ) {
				if ( $prefix[0] != 'c' || !is_numeric(substr($prefix, 1)) ) {
					$styles .= ',' . $pack['path'] . 'agsdi-icons.min.css';
				} else if (!$hasEnqueuedCustom) {
					$hasEnqueuedCustom = true;
					$styles .= ',' . content_url('wadip-custom/icons.css');
				}
			}
		}
		

		
		$styles .= ',' . self::$pluginDirUrl . '/icon-packs/free-icons/agsdi-icons.min.css';

		

		return $styles;
	}

	public static function getCreditPromos( $context, $all = false ) {
		/*
		$creditPromos array format:
		First level of the array is requirements (promo only shown if true)
		Second level of the array is exclusions (promo only shown if false)
		Third level of the array is promos themselves

		Requirements/exclusions have the following format:
		*  - no requirement/exclusion
		p: - require active plugin / exclude if plugin installed
		t: - require active parent theme (case-insensitive) / exclude if theme installed (case-sensitive, does not check if theme is parent or child)
		c: - require active child theme (case-insensitive) / exclude if theme installed (case-sensitive, does not check if theme is parent or child)

		Promos may be specifed as single promo or array of promos
		*/
		$contextSafe = esc_attr( $context );
		$utmVars     = 'utm_source=' . self::PLUGIN_SLUG . '&amp;utm_medium=plugin-ad&amp;utm_content=' . $contextSafe . '&amp;utm_campaign=';

		$creditPromos = array(
			'*'             => array(
				'*'         => array(
					sprintf( esc_html__( '%sSubscribe%s to WP Zone emails for the latest news, updates, special offers, and more!', 'ds-icon-expansion' ), '<a href="https://wpzone.co/?' . $utmVars . 'subscribe-general#main-footer" target="_blank">', '</a>' ),
				),
				'p:testify' =>
					sprintf( esc_html__( 'Create an engaging testimonial section for your website with %s! ', 'ds-icon-expansion' ), '<a href="https://wpzone.coproduct/testify/?' . $utmVars . 'testify" target="_blank">Testify</a>' )
			),
			't:Divi'        => array(
				'*'                 => array(
					sprintf( esc_html__( '%sSign up%s for emails from %sDivi Space%s to receive news, updates, special offers, and more!', 'ds-icon-expansion' ), '<a href="https://wpzone.co?' . $utmVars . 'subscribe-general#main-footer" target="_blank">', '</a>', '<strong>', '</strong>' ),
					sprintf( esc_html__( 'Get child themes, must-have Divi plugins & exclusive content with the %sDivi Space membership%s!', 'ds-icon-expansion' ), '<a href="https://wpzone.coproduct/annual-membership/?' . $utmVars . 'annual-membership" target="_blank">', '</a>' ),
				),
				'p:divi-switch'     => sprintf( esc_html__( 'Take your Divi website to new heights with %s, the Swiss Army Knife for Divi!', 'ds-icon-expansion' ), '<a href="https://wpzone.coproduct/divi-switch/?' . $utmVars . 'divi-switch" target="_blank">Divi Switch</a>' ),
				'p:ds-divi-extras'  => sprintf( esc_html__( 'Get blog modules from the Extra theme in the Divi Builder with %s!', 'ds-icon-expansion' ), '<a href="https://wpzone.coproduct/divi-extras/?' . $utmVars . 'divi-extras" target="_blank">Divi Extras</a>' ),
				'c:diviecommerce'   => sprintf( esc_html__( 'Create an impactful online presence for your online store with the %sdivi ecommerce child theme%s!', 'ds-icon-expansion' ), '<a href="https://wpzone.coproduct/divi-ecommerce/?' . $utmVars . 'divi-ecommerce" target="_blank">', '</a>' ),
				'c:divibusinesspro' => sprintf( esc_html__( 'Showcase your business in a memorable & engaging way with the %sDivi Business Pro child theme%s!', 'ds-icon-expansion' ), '<a href="https://wpzone.coproduct/divi-business-pro/?' . $utmVars . 'divi-business-pro" target="_blank">', '</a>' ),
			),
			'p:woocommerce' => array(
				'p:hm-product-sales-report-pro' => sprintf( esc_html__( 'Need a powerful sales reporting tool for WooCommerce? Check out %s!', 'ds-icon-expansion' ), '<a href="https://wpzone.co/product/product-sales-report-pro-for-woocommerce/?' . $utmVars . 'product-sales-report-pro" target="_blank">Product Sales Report Pro</a>' ),
			),
			'p:bbpress'     => array(
				'p:image-upload-for-bbpress-pro' => sprintf( esc_html__( 'Let your forum users upload images into their posts with %s!', 'ds-icon-expansion' ), '<a href="https://wpzone.co/product/image-upload-for-bbpress-pro/?' . $utmVars . 'image-upload-for-bbpress-pro" target="_blank">Image Upload for bbPress Pro</a>' ),
			)
		);

		$myCreditPromos = array();
		if ( $all ) {
			$otherPromos = array();
		}

		foreach ( $creditPromos as $require => $requirePromos ) {
			unset( $isOtherPromos );
			if ( $require != '*' ) {
				switch ( $require[0] ) {
					case 'p':
						if ( ! is_plugin_active( substr( $require, 2 ) ) ) {
							if ( $all ) {
								$isOtherPromos = true;
							} else {
								continue 2;
							}
						}
						break;
					case 't':
						if ( ! isset( $parentTheme ) ) {
							$parentTheme = get_template();
						}
						if ( strcasecmp( $parentTheme, substr( $require, 2 ) ) ) {
							if ( $all ) {
								$isOtherPromos = true;
							} else {
								continue 2;
							}
						}
						break;
					case 'c':
						if ( ! isset( $childTheme ) ) {
							$childTheme = get_stylesheet();
						}
						if ( strcasecmp( $childTheme, substr( $require, 2 ) ) ) {
							if ( $all ) {
								$isOtherPromos = true;
							} else {
								continue 2;
							}
						}
						break;
					default:
						if ( $all ) {
							$isOtherPromos = true;
						} else {
							continue 2;
						}
				}
			}

			foreach ( $requirePromos as $exclude => $promos ) {
				if ( empty( $isOtherPromos ) ) {
					unset( $isExcluded );
					if ( $exclude != '*' ) {
						switch ( $exclude[0] ) {
							case 'p':
								if ( is_dir( self::$pluginDir . '../' . substr( $exclude, 2 ) ) ) {
									if ( $all ) {
										$isExcluded = true;
									} else {
										continue 2;
									}
								}
								break;
							case 't':
							case 'c':
								if ( ! isset( $themes ) ) {
									$themes = search_theme_directories();
								}
								if ( isset( $themes[ substr( $exclude, 2 ) ] ) ) {
									if ( $all ) {
										$isExcluded = true;
									} else {
										continue 2;
									}
								}
								break;
							default:
								if ( $all ) {
									$isExcluded = true;
								} else {
									continue 2;
								}
						}
					}
				}

				if ( empty( $isOtherPromos ) && empty( $isExcluded ) ) {
					if ( is_array( $promos ) ) {
						$myCreditPromos = array_merge( $myCreditPromos, $promos );
					} else {
						$myCreditPromos[] = $promos;
					}
				} else {
					if ( is_array( $promos ) ) {
						$otherPromos = array_merge( $otherPromos, $promos );
					} else {
						$otherPromos[] = $promos;
					}
				}


			}
		}

		return $all ? array_merge( $myCreditPromos, $otherPromos ) : $myCreditPromos;
	}

	public static function onPluginFirstActivate() {
		if ( class_exists( 'AGS_Divi_Icons_Pro' ) ) {
			AGS_Divi_Icons_Pro::onPluginFirstActivate();
		}
	}

	public static function setIconFilteringCategories( $helpers ) {

		// "searchFilterIconItems":{"show_only":{"solid":"Solid Icons","line":"Line Icons","divi":"Divi Icons","fa":"Font Awesome"}}
		$helpers = [ $helpers ];

		

		// Add our filtering categories for single color icons
		foreach ( self::$icon_packs['single_color'] as $prefix => $pack ) {
			if ( ! empty( $pack['value'] ) && $pack['value'] === 'yes' && ! isset ( $pack['tinymce_only'] ) ) {
				if ( $prefix === 'fo' ) {
					$helpers[] = 'ETBuilderBackend.searchFilterIconItems.show_only.agsdi=' . json_encode( esc_html( $pack['name'] ) );
				} elseif ( ! empty ( $pack['icon_prefixes'] ) ) {
					foreach ( $pack['icon_prefixes'] as $icon_prefix => $subname ) {
						$helpers[] = 'ETBuilderBackend.searchFilterIconItems.show_only[\'' . str_replace( '"', "", json_encode( esc_attr( $icon_prefix ) ) ) . '\']=' . json_encode( esc_html( $pack['name'] . ' ' . $subname ) );
					}
				}
			}

		}
		

		return implode( ';', $helpers );
	}

}



if ( class_exists( 'AGS_Divi_Icons_Pro' ) ) {
	add_action( 'init', array( 'AGS_Divi_Icons_Pro', 'init' ) );

	// Temporary measure to assist with backwards compatibility
	if ( get_option( 'agsdi-legacy-sets-loading', null ) === null ) {
		$needsLegacy = false;
		if ( get_option( 'aspengrove_icons_colors_slots', null ) === null && get_option( 'agsdi_fa_icons', null ) !== null ) {

			// First of all, fix screwed up options via mapping
			update_option( 'agsdi_md_icons', get_option( 'agsdi_ui_icons', 'no' ) );
			update_option( 'agsdi_ui_icons', get_option( 'agsdi_fo_icons', 'no' ) );
			update_option( 'agsdi_fo_icons', 'yes' );

			$options = [
				'agsdi_fo_icons',
				'agsdi_mc_icons',
				'agsdi_fa_icons',
				'agsdi_md_icons',
				'agsdi_ui_icons',
				'agsdi_np_icons',
				'agsdi_cs_icons'
			];

			$hadDisabled = false;

			foreach ( $options as $option ) {
				$optionValue = get_option( $option, '' );
				if ( $optionValue !== 'yes' ) {
					$hadDisabled = true;
				} else if ( $hadDisabled ) { // option is yes and a previous set was disabled
					$needsLegacy = true;
					break;
				}
			}

		}

		update_option( 'agsdi-legacy-sets-loading', $needsLegacy ? 1 : 0 );

	}
} else {
	add_action( 'init', array( 'AGS_Divi_Icons', 'init' ) );
}

	function wadip_get_extended_font_icon_symbols() {
		include(__DIR__.'/includes/divi-icon-search-terms.php');
		
		$icons = array_map( function ( $icon ) use ($diviIconSearchTerms, $diviIconStyles) {
			$isWadiIcon = substr( $icon, 0, 5 ) == 'agsdi';

			if ( ! $isWadiIcon ) {
				$iconCategories = [ 'divi' ];
				$diviIconId = substr($icon, 7, -1);
				if (isset($diviIconStyles[$diviIconId])) {
					$iconCategories[] = $diviIconStyles[$diviIconId] == 's' ? 'solid' : 'line';
				}
			} else if ( $icon[5] == 'x' ) {
				if ( substr( $icon, 0, 9 ) == 'agsdix-fa' ) {
					$iconCategories = [ 'agsdix-fa', 'agsdix-fa' . $icon[9], $icon[9] == 'r' ? 'line' : 'solid' ];
				} else {
					$iconCategories = [ 'agsdix-' . strstr( substr( $icon, 7 ), '-', true ) ];
					if ( $iconCategories[0] == 'agsdix-smt1' || $iconCategories[0] == 'agsdix-smt2' ) {
						$iconCategories[0] = 'agsdix-smt';
					}
				}
			} else { // WADI free icon
				$iconCategories = [ 'agsdi' ];
			}

			return [
				'search_terms' => $isWadiIcon ? str_replace( '-', ' ', substr( $icon, strpos( $icon, '-' ) + 1 ) ) : (
																		isset($diviIconSearchTerms[$diviIconId]) ? $diviIconSearchTerms[$diviIconId] : ''
															),
				'unicode'      => html_entity_decode( $icon ),
				'name'         => '',
				'styles'       => $iconCategories,
				'is_divi_icon' => ! $isWadiIcon,
				'font_weight'  => 400
			];
		}, et_pb_get_font_icon_symbols() );

		

		// Add back icon packs from Divi, besides ETModules
		$wpFilesystem = et_()->WPFS();
		if ( defined('ET_BUILDER_DIR') && $wpFilesystem->exists(ET_BUILDER_DIR.'feature/icon-manager/full_icons_list.json') ) {
			$diviIcons = json_decode( $wpFilesystem->get_contents( ET_BUILDER_DIR.'feature/icon-manager/full_icons_list.json' ), true );

			if (is_array($diviIcons)) {
				foreach ($diviIcons as $icon) {
					if (empty($icon['is_divi_icon'])) {
						$icons[] = $icon;
					}
				}
			}

		}

		


		return $icons;
	}

// Divi Booster compatibility
add_filter('dbdb_get_extended_font_icon_symbols', 'wadip_get_extended_font_icon_symbols');

if ( ! function_exists( 'et_pb_get_extended_font_icon_symbols' ) ) {
	function et_pb_get_extended_font_icon_symbols() {
		return wadip_get_extended_font_icon_symbols();
	}
}

if ( ! function_exists( 'et_pb_get_extended_font_icon_value' ) ) {
	function et_pb_get_extended_font_icon_value( $icon, $decoded = false ) {
		$iconValue = strstr( $icon, '||', true );
		if ( $iconValue === false ) {
			$iconValue = $icon;
		}
		$processedIcon = et_pb_process_font_icon( $iconValue );

		return $decoded ? html_entity_decode( $processedIcon, ENT_QUOTES, 'UTF-8' ) : $processedIcon;
	}
}

///*
//Following code is copied from the Divi theme by Elegant Themes (v3.10): includes/builder/functions.php and modified.
//Licensed under the GNU General Public License version 3 (see license.txt file in plugin root for license text)
//*/
//if ( ! function_exists( 'et_pb_get_font_icon_list' ) ) :
//function et_pb_get_font_icon_list() {
//	$output = is_customize_preview() ? et_pb_get_font_icon_list_items() : '<%= window.et_builder.font_icon_list_template() %>';
//
//	$output = sprintf( '<ul class="et_font_icon">%1$s</ul>', $output );
//
//	// Following lines were added
//	$output = '<input type="search" placeholder="' . esc_html__( 'Search icons...', 'ds-icon-expansion' ) . '" class="agsdi-picker-search-divi" oninput="agsdi_search(this);">'
//	          . $output
//	          . '<span class="agsdi-picker-credit">'
//	          . ( defined( 'AGS_DIVI_ICONS_PRO' ) ?
//			sprintf( esc_html__( 'With additional icons from %s by %s ', 'ds-icon-expansion' ),'<strong>' . AGS_Divi_Icons::PLUGIN_NAME . '</strong>', '<a href="' . AGS_Divi_Icons::PLUGIN_AUTHOR_URL . '?utm_source=' . AGS_Divi_Icons::PLUGIN_SLUG . '&amp;utm_medium=plugin-credit-link&amp;utm_content=divi-builder" target="_blank">' . AGS_Divi_Icons::PLUGIN_AUTHOR . '</a>' ) : sprintf( esc_html__( 'With WP and Divi Icons by %s', 'ds-icon-expansion' ), '<a href="' . AGS_Divi_Icons::PLUGIN_AUTHOR_URL . '?utm_source=' . AGS_Divi_Icons::PLUGIN_SLUG . '&amp;utm_medium=plugin-credit-link&amp;utm_content=divi-builder" target="_blank">' . AGS_Divi_Icons::PLUGIN_AUTHOR . '</a><span class="agsdi-picker-credit-promo"></span>' ) )
//	          . '</span>';
//
//	return $output;
//}
//endif;
///* End code copied from the Divi theme by Elegant Themes */

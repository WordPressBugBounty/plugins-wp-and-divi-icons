/*! Minified and unminified versions of this file are located in the same directory. Access unminified version by replacing the .min.js extension with .js*/

/*!
WP and Divi Icons WP Zone company
Licensed under the GNU General Public License v3 (see ../license.txt)

This plugin includes code based on parts of the Divi theme and/or the
Divi Builder, Copyright (c) Elegant Themes, licensed GPLv2+, used under GPLv3 (see ../license.txt).
*/

var agsdi_icons_loaded = [], wadi_config = {
	parentIds: '#main-content, #et-main-area, #page-container, #et-fb-app, #et-boc',
	
	// format: class => parentClasses
	afterElements: {
		'*': ['et-fb-font-icon-list'],
		'et_pb_shop': null,
		'et_pb_comments_module': null,
		'et_pb_image_wrap': ['et_pb_main_blurb_image']
	},
	beforeAndAfterElements: {
		'et_pb_button': null
	},
	parentsAsClasses: [],
	observerEnabled: true
}, agsdi_svg_index = 0;

for ( var childClass in wadi_config.afterElements ) {
	if (wadi_config.afterElements[childClass]) {
		wadi_config.parentsAsClasses = wadi_config.parentsAsClasses.concat(wadi_config.afterElements[childClass]);
	}
}


window.agsdi_render_icons = function(container, noClasses, reload) {
	
	var $container = jQuery(container);
	
	var contentIconSelector = '.et-pb-icon:not([data-icon]),.et-pb-icon:not([data-icon]),.dsm_icon_list_icon:not([data-icon]),.dd-icon-content:not([data-icon])';

	$container.find(contentIconSelector).addBack(contentIconSelector).each(function() {
		var iconId = jQuery(this).text();
		if ( iconId && (iconId.substr(0,6) === 'agsdi-' || iconId.substr(0,7) === 'agsdix-') ) {
			jQuery(this).attr('data-icon', iconId).html('').addClass('agsdi-loaded agsdi-no-content');
		} else {
			jQuery(this).addClass('agsdi-loaded');
		}
	});
	
	$container.find('.et_pb_toggle_title').each(function() {
		var iconId = window.getComputedStyle(this, 'before').content;
		
		
		if (iconId.substring(0,10) === '"\\a gsdix-' || iconId.substring(0,9) === '"\\a gsdi-') {
			iconId = 'a' + iconId.substring(4, iconId.length - 1);
		} else if (iconId.substring(0,9) === '\\a gsdix-' || iconId.substring(0,8) === '\\a gsdi-') {
			iconId = 'a' + iconId.substring(3);
		} else if (iconId.substring(0,8) === '"agsdix-' || iconId.substring(0,7) === '"agsdi-') {
			iconId = iconId.substring(1, iconId.length - 1);
		} else if (iconId.substring(0,7) === 'agsdix-' || iconId.substring(0,6) === 'agsdi-') {
		} else if (iconId.substring(0,9) === '"\\agsdix-' || iconId.substring(0,8) === '"\\agsdi-') {
			iconId = iconId.substring(2, iconId.length - 1);
		} else if (iconId.substring(0,8) === '\\agsdix-' || iconId.substring(0,7) === '\\agsdi-') {
			iconId = iconId.substring(1);
		} else {
			iconId = null;
		}
		
		if ( !jQuery(this).attr('data-icon') ) {
			jQuery(this).attr('data-icon', iconId).addClass('agsdi-loaded');
			return;
		}
	});

	$container.find('[data-icon]').addBack('[data-icon]').each(function() {
		
		var $this = jQuery(this);
		
		if ($this.attr('data-icon') === '__clear') {
			$this.attr('data-icon', null);
		}
		
		if (this.className && this.className.indexOf && this.className.indexOf('i-agsdi') !== -1) {
			
			var classNames = this.className.split(' '), classesToRemove = '';
			
			for (var i = 0; i < classNames.length; ++i) {
				var className = classNames[i].trim();
				if (className.substr(0, 7) === 'i-agsdi') {
					classesToRemove += className + ' ';
				}
			}
			if (classesToRemove) {
				$this.removeClass(classesToRemove);
				
				// Removing classes will trigger the rendering function again so we can exit for now
				return;
			}
		}
		
		var iconId = $this.attr('data-icon');
		
		if (!iconId) {
			return;
		}
		
		if ( iconId.length > 6 && (iconId.substr(0,6) === 'agsdi-' || iconId.substr(0,7) === 'agsdix-') ) {
			var iconClass = 'i-' + iconId.replace(/ /, '-');
		
			if (!noClasses) {
				$this.addClass(iconClass);
				for (var i = 0; i < wadi_config.parentsAsClasses.length; ++i) {
					if ($this.closest('.' + wadi_config.parentsAsClasses[i]).length) {
						$this.addClass('agsdi-parent-' + wadi_config.parentsAsClasses[i]);
					}
				}
			}
			
			if (window.wadi_icons && window.wadi_icons[iconId]) {
				
				
				var iconSelector = noClasses
								? '[data-icon="' + iconId + '"]'
								: '.' + iconClass,
					parentSelector = '',
					$currentParent = $this.parent().closest(wadi_config.parentIds);
				
				while ($currentParent.length) {
					parentSelector = '#' + $currentParent.attr('id') + ' ' + parentSelector;
					$currentParent = $currentParent.parent().closest(wadi_config.parentIds);
				}
				
				if (reload || !agsdi_icons_loaded[parentSelector+iconSelector]) {
				
					var beforeSelector = parentSelector + ' ' + iconSelector + ':before';
					
					var afterSelectors = [], noBeforeSelectors = [];
					
					
					for (var afterOnly = 0; afterOnly < 2; ++afterOnly) {
						for (var childClass in (afterOnly ? wadi_config.afterElements : wadi_config.beforeAndAfterElements)) {
							
							if (childClass === '*') {
								for (var i = 0; i < wadi_config.afterElements[childClass].length; ++i) {
									var selector = parentSelector + ' .' + wadi_config.afterElements[childClass][i] + ' ' + iconSelector;
									afterSelectors.push(selector);
									if (!afterOnly) {
										noBeforeSelectors.push(selector);
									}
								}
							} else {
							
								if (wadi_config.afterElements[childClass]) {
									for (var i = 0; i < wadi_config.afterElements[childClass].length; ++i) {
										var selector = parentSelector + ' .' + wadi_config.afterElements[childClass][i] + ' ' + iconSelector + '.' + childClass;
										afterSelectors.push(selector);
										if (!afterOnly) {
											noBeforeSelectors.push(selector);
										}
									}
								} else {
									var selector = parentSelector + ' ' + iconSelector + '.' + childClass;
									afterSelectors.push(selector);
									if (!afterOnly) {
										noBeforeSelectors.push(selector);
									}
								}
							
							}
							
						}
					
					}
				
					var iconCss = noBeforeSelectors.join(':before, ') + ':before{content:none;}' + beforeSelector + ',' + afterSelectors.join(':after, ') + ':after{content:"\\' + window.wadi_icons[iconId] + '"!important;';
					
					if (window.wadi_fonts) {
						for (var iconPrefix in window.wadi_fonts) {
							
							if (iconId.indexOf(iconPrefix) === 0) {
								if ( iconPrefix === 'agsdix-fas' ) {
									iconCss += 'font-weight: 900!important;';
								}
								iconCss += 'font-family:"' + window.wadi_fonts[iconPrefix] + '"!important;';
								break;
							}
						}
					}
					
					iconCss += '}\n';
					
					
					var $style = $container.closest('html').find('#agsdi-icons-style');
					if (!$style.length) {
						$style = jQuery('<style id="agsdi-icons-style">').appendTo( $container.closest('#tinymce').length ? $container.closest('#tinymce').siblings('head:first') : 'head:first' );
					}
					$style.append(iconCss);
					
					if (!reload) {
						agsdi_icons_loaded[parentSelector+iconSelector] = true;
					}
					
				}
				
			} else {
				var svgIconUrl = null;

				if (iconId.substring(0, 12) === 'agsdix-mcip-') {
					var iconDirs = {
						'uni': 'ags-universal',
						'lin': 'ags-lineal',
						'out': 'ags-outline',
						'mul': 'ags-multicolor',
						'han': 'ags-hand-drawn',
						'fil': 'ags-filled',
						'ske': 'ags-sketch',
						'tri': 'ags-tri-color',
						'ele': 'ags-elegant',
					};
					
					var iconDirId = iconId.substring(12, 15);
					
					if (iconDirs[iconDirId]) {
						svgIconUrl = ags_divi_icons_config.pluginDirUrl + '/icon-packs/' + iconDirs[iconDirId] + '/multicolor/' + iconId.substring(16) + '.svg';
					}
				}

				if (svgIconUrl) {

					if (!window.wadi_svg_icons) {
						window.wadi_svg_icons = {};
					}

					if (typeof window.wadi_svg_icons[iconId] === 'undefined') {
						window.wadi_svg_icons[iconId] = {
							queue: [this],
							svg: null
						};
						
						jQuery.get(
							svgIconUrl,
							{},
							function (response) {
								window.wadi_svg_icons[iconId].svg = response;
								if (response.indexOf('wadip-tertiary-color') !== -1) {
									window.wadi_svg_icons[iconId].colors = 3;
								} else if (response.indexOf('wadip-secondary-color') !== -1) {
									window.wadi_svg_icons[iconId].colors = 2;
								} else {
									window.wadi_svg_icons[iconId].colors = 1;
								}
								
								for ( var i = 0; i < window.wadi_svg_icons[iconId].queue.length; ++i) {
									loadSvgIcon(iconId, response, window.wadi_svg_icons[iconId].queue[i]);
								}
								window.wadi_svg_icons[iconId].queue = [];
							},
							'text'
						);
					} else if (window.wadi_svg_icons[iconId].svg) {
						loadSvgIcon(iconId, window.wadi_svg_icons[iconId].svg, this);
					} else {
						window.wadi_svg_icons[iconId].queue.push(this);
					}

				}

			}
			
		}
	});
	
	function loadSvgIcon(iconId, svg, targetElement) {
		var svg = setSvgStyle(svg, targetElement);
		var $this = jQuery(targetElement);
		if ( $this.closest('.wp-block-paragraph, #tinymce, .mce-container-body, .wp-block-freeform').length ) {
			
			var $head = $this.closest('body').siblings('head');
			var color1 = $this.attr('data-color1'), color2 = $this.attr('data-color2'), color3 = $this.attr('data-color3');
			var src = iconId + ';' + (color1 ? color1 : '') + ';' + (color2 ? color2 : '') + ';' + (color3 ? color3 : '');
			
			if (!$head.find('style[data-src="' + src + '"]:first').length) {
				var selector = '[data-icon="' + iconId + '"]'
								+ (color1 ? '[data-color1="' + color1 + '"]' : ':not([data-color1])')
								+ (color2 ? '[data-color2="' + color2 + '"]' : ':not([data-color2])')
								+ (color3 ? '[data-color3="' + color3 + '"]' : ':not([data-color3])');
				
				$head.append( jQuery('<style>').attr('data-src', src).text('.wp-block-paragraph ' + selector + ',#tinymce ' + selector + ',.mce-container-body ' + selector + ', .wp-block-freeform ' + selector + '{background-image:url(data:image/svg+xml;base64,' + btoa(svg) + ');}') );
			}
		} else if ( $this.html() !== jQuery('<div>').html(svg).html() ) {
			$this.html(svg);
		}
	}
	
	function setSvgStyle(svg, targetElement) {
		
		var $target = jQuery(targetElement);
		var index = ++agsdi_svg_index;
		var style = [];
		if ($target.attr('data-color1')) {
			style.push('#agsdi_svg_' + index + ' .wadip-primary-color{fill:' + $target.attr('data-color1') + ';}');
		}
		if ($target.attr('data-color2')) {
			style.push('#agsdi_svg_' + index + ' .wadip-secondary-color{fill:' + $target.attr('data-color2') + ';}');
		}
		if ( svg.indexOf('wadip-tertiary-color') !== -1 && ($target.attr('data-color3') || !jQuery(document.body).hasClass('et-fb') ) ) {
			style.push('#agsdi_svg_' + index + ' .wadip-tertiary-color{fill:' + ($target.data('color3') ? $target.attr('data-color3') : '#ccc') + ';}');
		}
		if (style.length) {
			var firstCloseTag = svg.indexOf('>');
			if (firstCloseTag !== -1) {
				svg = svg.substring(0, firstCloseTag) + ' id="agsdi_svg_' + index + '"><style>' + style.join('') + ';</style>' + svg.substring(firstCloseTag + 1);
			}
			
		}
		
		return svg;
	}
	
}


jQuery(document).ready(function($) {
	
	function rerenderToggleModule($toggleModule) {
		var $title = $toggleModule.find('.et_pb_toggle_title:first');
		$title.attr('data-icon', null).removeClass(
			$title.attr('class').split(' ').filter(function(className) {
				return className === 'agsdi-loaded' || className.substring(0, 7) === 'i-agsdi';
			})
		);
		agsdi_render_icons( $toggleModule );
	}
	
	var MO = window.MutationObserver ? window.MutationObserver : window.WebkitMutationObserver;
	if (MO) {
		
		(new MO(function(events) {
			
			if (wadi_config.observerEnabled) {
			
				for (var i = 0; i < events.length; ++i) {
					var event = events[i];
					
					if (event.addedNodes && event.addedNodes.length) {
							
						for (var j = 0; j < event.addedNodes.length; ++j) {
							
							if (event.addedNodes[j].nodeType === 3) {
								var $target = jQuery(event.target);
								if ($target.hasClass('et-pb-icon')) {
									var iconId = $target.text().trim();
									// The text() call above will also pull the contents of <style> tags in multicolor icon <svg>s. Checking
									// to make sure the iconId doesn't start with "#" is necessary for compatibility with our generated SVG style.
									if ( iconId && (iconId[0] !== '#' || iconId.length === 1) ) {
										//$target.attr('data-icon', iconId);
										if ( iconId.substr(0,5) !== 'agsdi' ) {
											$target.removeClass('agsdi-no-content').attr('data-icon', '__clear');
										} else if ( $target.hasClass('agsdi-no-content') ) {
											$target.attr('data-icon', iconId).html('');
										}
										
										agsdi_render_icons( $target );
									}
								}
							} else {
								agsdi_render_icons( jQuery(event.addedNodes[j]) );
							}
							
							
						}
						
					} else if (event.type === 'attributes') {
						var dataIconAttribute = event.target.getAttribute('data-icon');
						
						if ( dataIconAttribute && ( !event.target.className || event.target.className.indexOf('i-' + dataIconAttribute.replace(/ /, '-')) === -1 ) ) {
							agsdi_render_icons( event.target );
						} else if ( event.attributeName === 'class' && event.oldValue && event.oldValue.indexOf('agsdi-loaded') !== -1 ) {
							$(event.target).addClass('agsdi-loaded');
						} else if ( event.attributeName === 'class' && typeof event.target.className === 'string' && (
								(event.target.className.indexOf('et_pb_toggle_open') !== -1 && event.oldValue.indexOf('et_pb_toggle_open') === -1)
								|| (event.target.className.indexOf('et_pb_toggle_close') !== -1 && event.oldValue.indexOf('et_pb_toggle_close') === -1)
						) ) {
						} else if ( event.attributeName === 'data-color1' || event.attributeName === 'data-color2' || event.attributeName === 'data-color3' ) {
							agsdi_render_icons( event.target );
						}
					} else if (event.removedNodes.length) {
						for (var j = 0; j < event.removedNodes.length; ++j) {
							if (event.removedNodes[j].tagName && event.removedNodes[j].tagName.toLowerCase() !== 'svg') {
								agsdi_render_icons( jQuery(event.target).parent() );
								break;
							}
						}
					} else if (event.type === 'characterData') {
						
						if ( event.target.parentNode ) {
							if ( event.target.parentNode.tagName === 'STYLE' ) {
								var $toggleModule = $(event.target).closest('.et_pb_module.et_pb_toggle');
								if ($toggleModule.length) {
									rerenderToggleModule($toggleModule);
								}
							} else if (event.target.parentNode.innerHTML && event.target.parentNode.className.indexOf('agsdi-no-content') !== -1) {
								var iconId = event.target.parentNode.innerHTML.trim();
								if ( iconId.substr(0,5) !== 'agsdi' ) {
									window.jQuery(event.target.parentNode).removeClass('agsdi-no-content').attr('data-icon', '__clear');
								}
								agsdi_render_icons( window.jQuery(event.target.parentNode).attr('data-icon', iconId).html('') );
							}
						
						}
						
					} else { // probably never reached, but just in case
						agsdi_render_icons( jQuery(event.target).parent() );
					}
				}
			
			}
		})).observe(document.body, {
			childList: true,
			subtree: true,
			attributeOldValue: true,
			characterData: true,
			attributeFilter: [
				'data-icon',
				'data-color1',
				'data-color2',
				'data-color3',
				'class' // needed in case something strips the agsdi-loaded class
			]
		});
	}
	
	$('#et-boc').on('mouseover mouseout', '.et_pb_toggle', function() {
		rerenderToggleModule($(this));
	});
	
	if (window.wadi_fonts) {
		
		var $style = $('#agsdi-icons-style');
		if (!$style.length) {
			$style = jQuery('<style id="agsdi-icons-style">').appendTo( $('head') );
		}
		
		$style.append('html:before { content: \'a\'; position: absolute; top: -999px; left: -999px; }');
		
		var loadedFonts = [];
		
		var loadInterval = setInterval( function() {
			for (iconPrefix in wadi_fonts) {
				if ( loadedFonts.indexOf( wadi_fonts[iconPrefix] ) === -1 ) {
					$style.append('html:before { font-family: "' + wadi_fonts[iconPrefix] + '"; }');
					loadedFonts.push( wadi_fonts[iconPrefix] );
					return;
				}
			}
			clearInterval(loadInterval);
		}, 300 );
	}
	
	agsdi_render_icons( $('body') );
});

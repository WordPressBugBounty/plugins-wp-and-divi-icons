import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { ifCondition, compose } from '@wordpress/compose';
import { withSelect } from '@wordpress/data';
import { RichTextToolbarButton, InspectorControls, __experimentalPanelColorGradientSettings as PanelColorGradientSettings, useSetting } from '@wordpress/block-editor';
import { registerFormatType, insertObject, remove, useAnchorRef } from '@wordpress/rich-text';
import { SVG, Path, Button, ButtonGroup, Icon, Modal, Flex, FlexItem, FlexBlock, ColorPalette, ColorPicker, RangeControl, ToggleControl, Tip, Popover, PanelBody, SelectControl, __experimentalScrollable as Scrollable, __experimentalInputControl as InputControl, SlotFillProvider, } from '@wordpress/components';
import { addFilter } from '@wordpress/hooks';

var ourIcon = (<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><Path style={{fill:'#362985'}} d="M20.2695312,0H3.7304688C1.6733398,0,0,1.6733398,0,3.7304688v16.5390625 C0,22.3261719,1.6733398,24,3.7304688,24h16.5390625C22.3261719,24,24,22.3261719,24,20.2695312V3.7304688 C24,1.6733398,22.3261719,0,20.2695312,0z M22,20.2695312C22,21.2236328,21.2236328,22,20.2695312,22H3.7304688 C2.7763672,22,2,21.2236328,2,20.2695312V3.7304688C2,2.7763672,2.7763672,2,3.7304688,2h16.5390625 C21.2236328,2,22,2.7763672,22,3.7304688V20.2695312z M6.1955566,15.1322021 c-0.4520264,0.5498047-0.605835,1.2405396-0.4987793,1.8916626c0,0,0.5386963,2.0042725-0.3015747,2.8128052 c0,0,1.3220825,0.8447266,4.062439-1.3082886c0.0321045-0.0245361,0.1400757-0.1175537,0.1400757-0.1175537 c0.0926514-0.0820923,0.1844482-0.1652832,0.2654419-0.263855c0.8326416-1.0128784,0.6862183-2.508728-0.3265381-3.3411865 C8.5238037,13.9732666,7.0281372,14.1193237,6.1955566,15.1322021z M16.7513428,4.3816528l-5.0519409,6.1459961l1.6154785,1.3280029 l5.052002-6.1461182c0.3666382-0.4460449,0.3023071-1.1049805-0.1439209-1.4716187 C17.7769775,3.8710938,17.118042,3.9356079,16.7513428,4.3816528z M9.5584717,13.1323242 c0.3280029,0.1154785,0.6426392,0.2857056,0.9268799,0.5194092c0.2840576,0.2334595,0.5117798,0.5091553,0.6886597,0.8084717 l1.4021606-1.7058105l-1.6155396-1.3279419L9.5584717,13.1323242z"/></SVG>);

var icons = [], handleScrollTimeout, iconPickerRef = React.createRef();

window.jQuery.post(window.ajaxurl, {action: 'agsdi_get_icons'}, function(response) {
	if (response.success && response.data) {
		icons = response.data;
	}
}, 'json');

/*
addFilter(
	'ags_unofficial_rich_text_html_string',
	'agsdi',
	function(html) {
		// Look for icon elements in HTML
		
		var inIconIndex = -1;
		do {
			inIconIndex = html.indexOf('data-icon="agsdi', inIconIndex + 1);
			if (inIconIndex !== -1) {
				var closeTagIndex = html.indexOf('>', inIconIndex);
				if ( closeTagIndex !== -1 && html.substring(closeTagIndex + 1, closeTagIndex + 8).toLowerCase() !== '</span>' ) {
					html = html.substring(0, closeTagIndex + 1) + '</span>' + html.substring(closeTagIndex + 1);
				}
			}
		} while (inIconIndex !== -1);
		
		return html;
	}
);
*/

registerBlockType( 'aspengrove/icon-block', {
	title: __('Icon', 'ds-icon-expansion'),
	icon: () => {return ourIcon;},
	category: 'layout',
	attributes: {
		icon: {
			type: 'string',
			source: 'attribute',
			selector: '.agsdi-icon',
			attribute: 'data-icon'
		},
		color: {
			type: 'string',
			default: ''
		},
		color2: {
			type: 'string',
			default: ''
		},
		color3: {
			type: 'string',
			default: ''
		},
		size: {
			type: 'string',
			default: '48px'
		},
		align: {
			enum: ['center', 'left', 'right', 'inherit'],
			default: 'center'
		},
		title: {
			type: 'string',
			source: 'attribute',
			selector: '.agsdi-icon',
			attribute: 'title'
		}
	},
	example: {
		attributes: {
			icon: 'agsdix-self',
			size: '96px'
		}
	},
	edit: ( props ) => {
		const alignOptions = [
			{
				label: __('Center', 'ds-icon-expansion'),
				value: 'center'
			},
			{
				label: __('Left', 'ds-icon-expansion'),
				value: 'left'
			},
			{
				label: __('Right', 'ds-icon-expansion'),
				value: 'right'
			},
			{
				label: __('Same as surrounding content', 'ds-icon-expansion'),
				value: 'inherit'
			}
		];
		
		var hasMulticolorIcon = props.attributes.icon && props.attributes.icon.substring(0, 12) === 'agsdix-mcip-';
		var colorsCount = (hasMulticolorIcon && window.wadi_svg_icons && window.wadi_svg_icons[props.attributes.icon] && window.wadi_svg_icons[props.attributes.icon].colors ? window.wadi_svg_icons[props.attributes.icon].colors : 1);
		
		return <>
				<InspectorControls key="setting" className="gb-agsdi-icon-settings">
					<PanelBody title={__('Icon settings', 'ds-icon-expansion')}>
						<IconPicker icons={icons} selectedIcon={props.attributes.icon ? props.attributes.icon : getDefaultIcon()} onChange={ (value) => {
							var newAttributes = {icon: value};
							if ( !props.attributes.icon || props.attributes.title === getDefaultIconTitle(props.attributes.icon) ) {
								newAttributes['title'] = getDefaultIconTitle(value);
							}
							props.setAttributes(newAttributes);
						} } />
						
						<InputControl label={__('Icon title', 'ds-icon-expansion')} value={props.attributes.icon ? props.attributes.title : getDefaultIconTitle( getDefaultIcon() )}
										onChange={ (value) => {props.setAttributes({title: value});} } />
					</PanelBody>
					<IconColorSettings
						key={'colors' + colorsCount}
						inSidebar
						title={__('Design', 'ds-icon-expansion')} 
						color={props.attributes.color}
						color2={props.attributes.color2}
						color3={props.attributes.color3}
						colorsCount={colorsCount}
						onChange={(value) => { props.setAttributes(value); }}
					>
						<InputControl label={__('Icon size', 'ds-icon-expansion')} labelPosition="side" value={props.attributes.size}
										onChange={ (value) => {props.setAttributes({size: value});} } />
						<RangeControl min="16" max="128" showTooltip={false} withInputField={false} value={props.attributes.size ? parseInt(props.attributes.size) : 0}
										onChange={ (value) => {props.setAttributes({size: value + 'px'});} } />
						<SelectControl label={__('Alignment', 'ds-icon-expansion')} value={props.attributes.align} options={alignOptions}
										onChange={ (value) => {props.setAttributes({align: value});} } />
					</IconColorSettings>
				</InspectorControls>
				<IconBlock	icon={props.attributes.icon ? props.attributes.icon : getDefaultIcon()}
							color={props.attributes.color}
							color2={props.attributes.color2}
							color3={props.attributes.color3}
							size={props.attributes.size}
							align={props.attributes.align}
							title={props.attributes.icon ? props.attributes.title : getDefaultIconTitle( getDefaultIcon() )} />
			</>;
	},
	save: ( props ) => {
		return <IconBlock	icon={props.attributes.icon ? props.attributes.icon : getDefaultIcon()}
							color={props.attributes.color}
							color2={props.attributes.color2}
							color3={props.attributes.color3}
							size={props.attributes.size}
							align={props.attributes.align}
							title={props.attributes.icon ? props.attributes.title : getDefaultIconTitle( getDefaultIcon() )} />;
	},
} );

function getDefaultIcon() {
	for ( var i = 0; i < icons.length; ++i ) {
			if ( icons[i] !== 'agsdix-null' ) {
				return icons[i];
				break;
			}
		}
}

const IconColorSettings = (props) => {
	
	var palette = useSetting('color.palette');
	
	var colorSettings = [
		{
			label: __('Primary color', 'ds-icon-expansion'),
			colorValue: props.color,
			colors: palette,
			onColorChange: (value) => { props.onChange({color: value ? value : ''}); }
		}
	];
	
	if ( props.colorsCount > 1 ) {
		
		colorSettings.push(
			{
				label: __('Secondary color', 'ds-icon-expansion'),
				colorValue: props.color2,
				colors: palette,
				onColorChange: (value) => { props.onChange({color2: value ? value : ''}); }
			}
		);
		
		
		if ( props.colorsCount > 2 ) {
			colorSettings.push(
				{
					label: __('Tertiary color', 'ds-icon-expansion'),
					colorValue: props.color3,
					colors: palette,
					onColorChange: (value) => { props.onChange({color3: value ? value : ''}); }
				}
			);
		}
	}
	
	return (
		<PanelColorGradientSettings __experimentalIsRenderedInSidebar={props.inSidebar} title={props.title} settings={colorSettings}>
			{props.children}
		</PanelColorGradientSettings>
	);
}


function getDefaultIconTitle(icon) {
	var lastSpacePos = icon.lastIndexOf(' ');
	var firstDashPos = icon.indexOf('-', lastSpacePos === -1 ? 0 : lastSpacePos);
	if (firstDashPos !== -1 && icon.substring(0, 6) !== 'agsdi-' && icon.substring(0, 9) !== 'agsdix-fa') {
		firstDashPos = icon.indexOf('-', firstDashPos + 1);
		if (icon.substr(0, 12) === 'agsdix-mcip-') {
			firstDashPos = icon.indexOf('-', firstDashPos + 1);
		}
	}
	return (firstDashPos === -1 ? icon : icon.substr(firstDashPos + 1)).replace(/\-/g, ' ') + ' icon';
}


class IconPickerIcon extends React.Component {
	
	ref;
	
	constructor(props) {
		super(props);
		this.state = {
			inView: false
		};
		this.ref = React.createRef();
	}
	
	componentDidMount() {
		if ( !this.state.inView ) {
			this.checkIfInView();
		}
	}
	
	componentDidUpdate(oldProps) {
		if ( !this.state.inView ) {
			this.checkIfInView();
		}
		if (this.props.icon !== oldProps.icon && this.props.icon.substring(0, 12) !== 'agsdix-mcip-' && this.ref.current) {
			window.jQuery(this.ref.current).children('svg').remove();
		}
	}

	checkIfInView() {
		if ( this.ref.current
				&& this.props.icon !== 'agsdix-null'
				&& this.ref.current.offsetTop > this.ref.current.parentNode.scrollTop - 100
				&& this.ref.current.offsetTop < this.ref.current.parentNode.scrollTop + (this.ref.current.parentNode.clientHeight * 2) ) {
			this.setState({inView: true});
		}
	}

	render() {
		return this.state.inView
				? <span data-icon={this.props.icon} ref={this.ref} className={this.props.selected ? 'agsdi-selected' : ''} onClick={() => {this.props.onSelect && this.props.onSelect( this.props.icon );}}></span>
				: <span data-icon-pre={this.props.icon} className={this.props.selected ? 'agsdi-selected' : ''} ref={this.ref}></span>;
	}
}

class IconPicker extends React.Component {
	
	ref;
	scrollUpdateTimeout;
	filterUpdateTimeout;
	filteringOptions;
	filteringOptionsMulticolor;
	isFreeVersion = true;
	
	constructor(props) {
		super(props);
		
		this.state = {
			selectedIcon: this.props.selectedIcon ? this.props.selectedIcon : null,
			scrolledToSelected: !this.props.selectedIcon,
			filter: 'all',
			search: '',
			height: 0,
			scrollTop: 0,
			isLoading: false,
			isMulticolor: this.props.selectedIcon && this.props.selectedIcon.substring(0, 12) === 'agsdix-mcip-',
			filteredIcons: []
		};

		this.ref = React.createRef();

		this.filteringOptions = [
			{
				label: __('All', 'ds-icon-expansion'),
				value: 'all'
			}
		];
		
		for (var filter in window.ags_divi_icons_config.singleColorFilters) {
			for (var i = 0; i < this.props.icons.length; ++i) {
				if ( this.props.icons[i].substring(0, filter.length) === filter ) {
					this.filteringOptions.push(
						{
							label: window.ags_divi_icons_config.singleColorFilters[filter],
							value: filter
						}
					);
					break;
				}
			}
		}
		
		this.filteringOptionsMulticolor = [
			{
				label: __('All', 'ds-icon-expansion'),
				value: 'all'
			}
		];
		
		for (var set in window.agsdi_multicolor.sets) {
			this.filteringOptionsMulticolor.push(
				{
					label: window.agsdi_multicolor.sets[set],
					value: set
				}
			);
		}
	}
	
	componentDidUpdate(oldProps, oldState) {
		if (this.props.selectedIcon !== oldProps.selectedIcon) {
			this.setState({
				selectedIcon: this.props.selectedIcon,
				isMulticolor: this.props.selectedIcon.substring(0, 12) === 'agsdix-mcip-'
			});
		}
		
		if ( this.state.filter !== oldState.filter || this.state.search !== oldState.search || this.state.isMulticolor !== oldState.isMulticolor ) {
			
			if (this.filterUpdateTimeout) {
				clearTimeout(this.filterUpdateTimeout);
			}
			this.filterUpdateTimeout = setTimeout(() => {
				this.filterUpdateTimeout = null;
				this.updateFilteredIcons();
			}, 500);
		}
		
		if (this.state.filteredIcons.length && !oldState.filteredIcons.length) {
			this.handleScroll();
		}
		
		if (!this.state.scrolledToSelected) {
			var $selectedIcon = window.jQuery(this.ref.current).find('.agsdi-selected:first');
			
			if ($selectedIcon.length) {
				$selectedIcon.parent().scrollTop($selectedIcon.position().top);
			}
			this.setState({scrolledToSelected: true});
		}
	}

	updateFilteredIcons() {
		this.setState({isLoading: true});
		
		var filteredIcons = [], noFilter = this.state.filter === 'all';
		
		if (this.state.isMulticolor) {
			var srcIcons = [];
			for (var set in window.agsdi_multicolor.icons) {
				if (noFilter || set === this.state.filter) {
					srcIcons = srcIcons.concat.apply(
						srcIcons,
						window.agsdi_multicolor.icons[set].map((subset) => {
							return subset.icons.map((icon) => {
								return 'agsdix-' + subset.prefix.slice(0, -4) + icon;
							});
						})
					);
				}
			}
		} else {
			var srcIcons = this.props.icons;
		}
		
		if (this.state.isMulticolor && !this.state.search) {
			filteredIcons = srcIcons;
		} else if ( noFilter && !this.state.search) {
			filteredIcons = srcIcons.filter((icon) => {
				return icon !== 'agsdix-null';
			});
		} else {
			for (var i = 0; i < srcIcons.length; ++i) {
				var isVisible = true;
				if ( srcIcons[i] === 'agsdix-null' ) {
					isVisible = false;
				} else if ( !noFilter && !this.state.isMulticolor && srcIcons[i].substring(0, this.state.filter.length) !== this.state.filter ) {
					isVisible = false;
				} else if ( this.state.search ) {
					
					if (this.state.isMulticolor) {
						var keywords = srcIcons[i].substr(16);
					} else if (srcIcons[i].substr(0, 6) === 'agsdi-') {
						var keywords = srcIcons[i].substr(6);
					} else if (srcIcons[i].substr(0, 9) === 'agsdix-fa') {
						var keywords = srcIcons[i].substr(14);
					} else if (srcIcons[i].substr(0, 7) === 'agsdix-') {
						var keywords = srcIcons[i].substr(srcIcons[i].indexOf('-', 7) + 1);
					} else {
						var keywords = '';
					}

					if (keywords) {
						keywords = keywords.split('-').join(' ');
					}

					if (window.agsdi_icon_aliases[srcIcons[i]]) {
						keywords = (keywords ? keywords + ' ' : '') + window.agsdi_icon_aliases[ srcIcons[i] ];
					}
					
					if (keywords.indexOf(this.state.search) === -1) {
						isVisible = false;
					}
				}
				if (isVisible) {
					filteredIcons.push(srcIcons[i]);
				}
			}
				
		}
		
		this.setState({
			filteredIcons: filteredIcons,
			isLoading: false
		});
	}

	handleScroll() {
		if (this.scrollUpdateTimeout) {
			clearTimeout(this.scrollUpdateTimeout);
		}
		this.scrollUpdateTimeout = setTimeout(() => {
			this.scrollUpdateTimeout = null;
			this._handleScroll();
		}, 250);
	}
	
	_handleScroll() {
		if (this.ref.current) {
			this.setState({
				scrollTop: this.ref.current.scrollTop,
				height: this.ref.current.clientHeight,
			});
		}
	}

	handleIconSelection(value) {
		this.setState({selectedIcon: value});
		if (this.props.onChange) {
			this.props.onChange(value);
		}
	}

	componentDidMount() {
		this.updateFilteredIcons();
	}

	render() {
		var iconElements = [];

		for (var i = 0; i < this.state.filteredIcons.length; ++i) {
			iconElements.push(
				<IconPickerIcon	icon={this.state.filteredIcons[i]}
								selected={this.state.selectedIcon === this.state.filteredIcons[i]} key={i} onSelect={(value) => {this.handleIconSelection(value);}}
								parentScrollTop={this.state.scrollTop}
								parentHeight={this.state.height}
				/>
			);
		}
		

		return <div className="mce-agsdi-icon-picker gb-agsdi-icon-picker">
					<SelectControl className="gb-agsdi-icon-type" label={__('Icon type', 'ds-icon-expansion')} labelPosition="side" options={[{value: '', label: __('Single color', 'ds-icon-expansion')}, {value: 'multicolor', label: __('Multicolor', 'ds-icon-expansion')}]}
									value={this.state.isMulticolor ? 'multicolor' : ''} onChange={(value) => {this.setState({isMulticolor: value === 'multicolor'});}} />
					<SelectControl className="gb-agsdi-icon-set" label={__('Icon set', 'ds-icon-expansion')} labelPosition="side" options={this.state.isMulticolor ? this.filteringOptionsMulticolor : this.filteringOptions} value={this.state.filter} onChange={(value) => {this.setState({filter: value});}} />
					<InputControl className="gb-agsdi-icon-search" type="search" hideLabelFromVision={true} placeholder={__( 'Search Icons...', 'ds-icon-expansion' )} value={this.state.search} onChange={(value) => {this.setState({search: value});}} />
					{this.state.isMulticolor && this.isFreeVersion
						?	<div className="agsdi-pro-message">
								<span>{__('This is a PRO feature.', 'ds-icon-expansion')}</span>
								<br />
								<a href="#" target="_blank">{__('Upgrade', 'ds-icon-expansion')}</a>
							</div>
						:	(this.state.isLoading
								?	<div className="agsdi-loading">{__('Loading...', 'ds-icon-expansion')}</div>
								:	<Scrollable className="agsdi-icons" ref={this.ref} onScroll={() => {this.handleScroll();}}>
										{iconElements}
									</Scrollable>
							)
					}
				</div>;
	}
}


const IconPreview = ( props ) => {
	var isMulticolorIcon = props.icon && props.icon.substring(0, 12) === 'agsdix-mcip-';
	return <div className="agsdi-icon-preview" style={{color: isMulticolorIcon ? null : props.color, fontSize: props.size ? props.size : '48px', minHeight: '1em'}}>
			{ props.icon && <span className="agsdi-icon" data-icon={props.icon}
									data-color1={isMulticolorIcon && props.color && props.color !== '#000000' ? props.color : null}
									data-color2={isMulticolorIcon && props.color2 && props.color2 !== '#000000' ? props.color2 : null}
									data-color3={isMulticolorIcon && props.color3 && props.color3 !== '#000000' ? props.color3 : null}></span> }
		</div>;
}

const IconBlock = ( props ) => {
	var style = {};
	var isMulticolorIcon = props.icon.substring(0, 12) === 'agsdix-mcip-';
	
	if (props.color && !isMulticolorIcon) {
		style.color = props.color;
	}

	if (props.size) {
		style.fontSize = props.size;
	}

	if (props.align) {
		style.textAlign = props.align;
	}
	
	if ( window.wadi_svg_icons && window.wadi_svg_icons[props.icon] && window.wadi_svg_icons[props.icon].colors ) {
		var iconColors = window.wadi_svg_icons[props.icon].colors;
	} else if (props.color3) {
		iconColors = 3;
	} else if (props.color2) {
		iconColors = 2;
	} else {
		iconColors = 1;
	}

	return <div style={style} className={props.className}>
			{ props.icon === 'agsdix-self' && <img src={window.ags_divi_icons_config.pluginDirUrl + '/blocks/images/block-free.svg'} /> }
			{ props.icon && props.icon !== 'agsdix-self' && <span className={"agsdi-icon"} data-icon={props.icon} title={props.title}
																	data-color1={isMulticolorIcon && props.color && props.color !== '#000000' ? props.color : null}
																	data-color2={isMulticolorIcon && iconColors > 1 && props.color2 && props.color2 !== '#000000' ? props.color2 : null}
																	data-color3={isMulticolorIcon && iconColors > 2 && props.color3 && props.color3 !== '#000000' ? props.color3 : null}></span> }
		</div>;
}

class IconsSelectionModal extends React.Component {
	
	constructor(props) {
		super(props);
		this.state = this.deriveStateFromIconAttributes();
	}

	deriveStateFromIconAttributes() {
		var hasMulticolorIcon = this.props.iconAttributes.icon && this.props.iconAttributes.icon.substring(0, 12) === 'agsdix-mcip-';
		
		var parsedStyle = {};
		if (this.props.iconAttributes.style) {
			var styleRules = this.props.iconAttributes.style.split(';');
			for (var i = 0; i < styleRules.length; ++i) {
				var colonPos = styleRules[i].indexOf(':');
				if (colonPos !== -1) {
					parsedStyle[styleRules[i].substring(0, colonPos)] = styleRules[i].substring(colonPos + 1);
				}
			}
		}

		var iconClasses = this.props.iconAttributes.className
							? this.props.iconAttributes.className
								.split(' ')
								.filter((value) => {
									return value && value !== 'agsdi-icon' && value.substring(0, 7) !== 'i-agsdi';
								})
								.join(' ')
							: '';

		return {
			selectedIcon: this.props.iconAttributes.icon ? this.props.iconAttributes.icon : null,
			iconColor: hasMulticolorIcon ? this.props.iconAttributes.color1 : (parsedStyle['color'] ? parsedStyle['color'] : ''),
			iconColor2: this.props.iconAttributes.color2,
			iconColor3: this.props.iconAttributes.color3,
			iconSize: parsedStyle['font-size'] ? parsedStyle['font-size'] : '48px',
			iconTitle: this.props.iconAttributes.title ? this.props.iconAttributes.title : '',
			iconClasses: iconClasses
		};
	}

	componentDidMount() {
		if (!this.state.selectedIcon) {
			var defaultIcon = getDefaultIcon();
			this.setState({selectedIcon: defaultIcon, iconTitle: getDefaultIconTitle(defaultIcon)});
		}
	}

	componentDidUpdate(oldProps, oldState) {
		if (
			this.props.iconAttributes.icon !== oldProps.iconAttributes.icon
			|| this.props.iconAttributes.className !== oldProps.iconAttributes.className
			|| this.props.iconAttributes.style !== oldProps.iconAttributes.style
			|| this.props.iconAttributes.title !== oldProps.iconAttributes.title
		) {
			this.setState( this.deriveStateFromIconAttributes() );
		}
		
		if ( this.state.selectedIcon && oldState.selectedIcon
						&& this.state.selectedIcon !== oldState.selectedIcon
						&& oldState.iconTitle === getDefaultIconTitle(oldState.selectedIcon) ) {
			this.setState({iconTitle: getDefaultIconTitle(this.state.selectedIcon)});
		}
	}
	
	closeModal() {
		if (this.props.onClose) {
			this.props.onClose();
		}
	}

	render() {
		var hasMulticolorIcon = this.state.selectedIcon && this.state.selectedIcon.substring(0, 12) === 'agsdix-mcip-';
		var colorsCount = hasMulticolorIcon && window.wadi_svg_icons && window.wadi_svg_icons[this.state.selectedIcon] && window.wadi_svg_icons[this.state.selectedIcon].colors ? window.wadi_svg_icons[this.state.selectedIcon].colors : 1;
		return this.props.open ? (
			<SlotFillProvider>
			<Modal
				title={__( 'Insert Icon', 'ds-icon-expansion' )}
				onRequestClose={ () => { this.closeModal(); } }
				className="agsdi-gutenberg-insert-modal"
			>
				<Flex style={{alignItems: 'flex-start', padding: '15px 15px 50px 15px'}}>
					<FlexItem style={{width:'30%'}}>
						<IconPicker icons={icons} selectedIcon={this.state.selectedIcon} onChange={ (value) => {this.setState({selectedIcon: value});} } />
					</FlexItem>
					<FlexItem style={{width:'70%'}}>
						<Flex>
							<FlexItem style={{width:'60%', marginBottom:'20px'}} className="gb-agsdi-icon-settings">
								<IconModalColorSettings
									color={this.state.iconColor}
									color2={this.state.iconColor2}
									color3={this.state.iconColor3}
									colorsCount={colorsCount}
									onChange={ (value) => { (value.hasOwnProperty('color') && this.setState({iconColor: value.color})) || (value.hasOwnProperty('color2') && this.setState({iconColor2: value.color2})) || (value.hasOwnProperty('color3') && this.setState({iconColor3: value.color3})) } }
								/>
								<InputControl label={__('Icon size', 'ds-icon-expansion')} labelPosition="side" value={this.state.iconSize}
												onChange={ (value) => {this.setState({iconSize: value});} } />
								<RangeControl min="16" max="128" showTooltip={false} withInputField={false} value={parseInt(this.state.iconSize)}
												onChange={ (value) => {this.setState({iconSize: value + 'px'});} } />
								<InputControl label={__('Icon title', 'ds-icon-expansion')} labelPosition="side" value={this.state.iconTitle}
												onChange={ (value) => {this.setState({iconTitle: value});} } />
								<InputControl label={__('Icon class(es)', 'ds-icon-expansion')} labelPosition="side" value={this.state.iconClasses}
												onChange={ (value) => {this.setState({iconClasses: value});} } />
							</FlexItem>
							<FlexItem style={{width:'40%'}} className="mce-agsdi-icon-preview">
								<IconPreview icon={this.state.selectedIcon} color={this.state.iconColor} color2={this.state.iconColor2} color3={this.state.iconColor3} size={this.state.iconSize} />
							</FlexItem>
						</Flex>
						<div style={{border:'1px solid #d7dade', backgroundColor: '#fafafb', padding: '10px'}}>
							<Tip>If you leave the color and/or size settings blank, the icon will derive its color and size from the surrounding text's color and size (based on the styling of the icon's parent element). This is not reflected in the icon preview.</Tip>
						</div>
					</FlexItem>
					
				</Flex>

				<Flex className="agsdi-gutenberg-insert-modal-foot" style={{boxShadow: '0 0 20px 0 rgb(0 0 0 / 20%)', justifyContent: 'flex-end', padding: '10px 15px', background: '#fff'}}>
					<Button variant="primary" onClick={() => {this.props.onApply && this.props.onApply(this.state.selectedIcon, this.state.iconColor, this.state.iconColor2, this.state.iconColor3, this.state.iconSize, this.state.iconTitle, this.state.iconClasses); this.closeModal();}}>{__( 'OK', 'ds-icon-expansion' )}</Button>
					<Button variant="secondary" onClick={() => {this.closeModal();}}>{__( 'Cancel', 'ds-icon-expansion' )}</Button>
				</Flex>
			</Modal>
			</SlotFillProvider>
		) : null;
	}
}

const IconModalColorSettings = (props) => {
	var palette = useSetting('color.palette');
	
	return (
		<>
			<div className="gb-agsdi-icon-color-picker">
				<label>{wp.i18n.__('Primary color', 'ds-icon-expansion')}</label>
				<IconModalColorSetting colors={palette} value={props.color ? props.color : ''}
							onChange={ (value) => {props.onChange({color: value});} } />
				</div>
			{ props.colorsCount > 1
			&&	<div className="gb-agsdi-icon-color-picker">
					<label>{wp.i18n.__('Secondary color', 'ds-icon-expansion')}</label>
					<IconModalColorSetting colors={palette} value={props.color2 ? props.color2 : ''}
								onChange={ (value) => {props.onChange({color2: value});} } />
				</div>
			}
			{ props.colorsCount > 2
			&&	<div className="gb-agsdi-icon-color-picker">
					<label>{wp.i18n.__('Tertiary color', 'ds-icon-expansion')}</label>
					<IconModalColorSetting colors={palette} value={props.color3 ? props.color3 : ''}
							onChange={ (value) => {props.onChange({color3: value});} } />
				</div>
			}
		</>
	);
};

class IconModalColorSetting extends React.Component {
	
	constructor(props) {
		super(props);
		this.state = {
			custom: false,
			currentColor: this.props.value ? this.props.value : ''
		};
	}
	
	render() {
		var colors = this.props.colors.slice();
		
		// if (this.state.currentColor) {
		// 	var currentColorExistsInPalette = false;
		// 	for ( var i = 0; i < this.props.colors.length; ++i ) {
		// 		if (this.props.colors[i].color === this.state.currentColor) {
		// 			currentColorExistsInPalette = true;
		// 			break;
		// 		}
		// 	}
		// 	if (!currentColorExistsInPalette) {
		// 		colors.push({
		// 			name: wp.i18n.__('Custom color', 'ds-icon-expansion'),
		// 			slug: 'agsdi-custom',
		// 			color: this.state.currentColor
		// 		});
		// 	}
		// }
		
		return (
			<>
				<ColorPalette colors={colors} value={this.props.value ? this.props.value : ''}
							  onChange={ (value) => {this.setState({currentColor: value}); this.props.onChange(value);} }
							  disableCustomColors={false} clearable={false} />
				<Button variant="secondary" className="agsdi-gutenberg-insert-modal-clear-btn"  onClick={() => {this.setState({custom: false, currentColor: ''}); this.props.onChange('');}}>{wp.i18n.__('Clear', 'ds-icon-expansion')}</Button>
				<Popover.Slot />
			</>
		);
	}
};


class DiviIconAction extends React.Component {

	constructor(props) {
		super(props);
		this.state = {
			isOpen: false
		};
	}

	onApply(icon, color, color2, color3, size, title, classes) {
		
		var isMulticolorIcon = icon.substring(0, 12) === 'agsdix-mcip-';
		
		var styleRules = [];
		
		var iconAttributes = {
			icon: icon,
			className: classes
		};

		if (isMulticolorIcon) {
			var iconColors = window.wadi_svg_icons && window.wadi_svg_icons[icon] && window.wadi_svg_icons[icon].colors ? window.wadi_svg_icons[icon].colors : 1;
			
			if (color && color !== '#000000') {
				iconAttributes.color1 = color;
			}
			if (color2 && iconColors > 1 && color2 !== '#000000') {
				iconAttributes.color2 = color2;
			}
			if (color3 && iconColors > 2 && color3 !== '#000000') {
				iconAttributes.color3 = color3;
			}
		} else if (color) {
			styleRules.push('color:' + color);
		}
		
		if (size) {
			styleRules.push('font-size:' + size);
		}
		if (styleRules.length) {
			iconAttributes.style = styleRules.join(';');
		}

		if (title) {
			iconAttributes.title = title;
		}

		this.props.onChange(
			insertObject(
				this.props.value,
				{
					type: 'aspengrove/icon',
					attributes: iconAttributes
				}
			)
		);

		this.props.onFocus();
	}

	render() {
		console.log(this.props.activeObjectAttributes);
		
		return (
			<>
	<RichTextToolbarButton icon={ourIcon} title={__('Icon', 'ds-icon-expansion')} onClick={ () => {this.setState({isOpen: true});} } />
				{ this.state.isOpen && <IconsSelectionModal
					open={this.state.isOpen}
					onClose={ () => {this.setState({isOpen: false}); this.props.onFocus();} }
					onApply={ (icon, color, color2, color3, size, title, classes) => {this.onApply(icon, color, color2, color3, size, title, classes);} }
					iconAttributes={this.props.activeObjectAttributes}
				/> }
				{ this.props.isObjectActive && <EditIconPopover
													iconRef={this.props.contentRef}
													selectionValue={this.props.value}
													onEditButtonClick={ () => {this.setState({isOpen: true});} }
													onRemoveButtonClick={ () => { this.props.onChange(remove(this.props.value, this.props.value.start, this.props.value.end)); } }
												/>
				}
			</>
		)
	}

}


const EditIconPopover = ( props ) => {
	return <Popover anchorRef={useAnchorRef({ ref: props.iconRef, value: props.selectionValue, settings: AgsIconFormat })} noArrow={false} position="bottom center">
				<ButtonGroup style={{whiteSpace: 'nowrap'}}>
					<Button icon="edit" onClick={() => {props.onEditButtonClick();}}>{__('Edit Icon', 'ds-icon-expansion')}</Button>
					<Button icon="trash" onClick={() => {props.onRemoveButtonClick();}}>{__('Remove Icon', 'ds-icon-expansion')}</Button>
				</ButtonGroup>
			</Popover>
};

const AgsIconFormat = {
	name: 'aspengrove/icon',
	title: __('Icon', 'ds-icon-expansion'),
	tagName: 'span',
	className: 'agsdi-icon',
	//object: true,
	attributes: {
		icon: 'data-icon',
		style: 'style',
		className: 'class',
		title: 'title',
		color1: 'data-color1',
		color2: 'data-color2',
		color3: 'data-color3'
	},
	edit: compose(
				withSelect( function( select ) {
					return {
						selectedBlock: select( 'core/block-editor' ).getSelectedBlock()
					}
				} ),
				ifCondition( function( props ) {
					return (
						props.selectedBlock &&
						props.selectedBlock.name === 'core/paragraph'
					);
				} )
			)( DiviIconAction ),
};

registerFormatType('aspengrove/icon', AgsIconFormat);
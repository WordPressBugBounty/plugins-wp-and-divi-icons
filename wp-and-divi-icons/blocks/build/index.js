/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 15);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/*! exports used: Fragment, createElement */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),
/* 1 */
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/*! exports used: Button, ButtonGroup, ColorPalette, Flex, FlexItem, Modal, PanelBody, Path, Popover, RangeControl, SVG, SelectControl, SlotFillProvider, Tip, __experimentalInputControl, __experimentalScrollable */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),
/* 2 */
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/*! exports used: __ */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),
/* 3 */
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/assertThisInitialized.js ***!
  \**********************************************************************/
/*! no static exports found */
/*! all exports used */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

module.exports = _assertThisInitialized, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 4 */
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************/
/*! no static exports found */
/*! exports used: default */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

module.exports = _defineProperty, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 5 */
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/*! exports used: default */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 6 */
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/*! exports used: default */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  Object.defineProperty(Constructor, "prototype", {
    writable: false
  });
  return Constructor;
}

module.exports = _createClass, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 7 */
/*!*********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/inherits.js ***!
  \*********************************************************/
/*! no static exports found */
/*! exports used: default */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports, __webpack_require__) {

var setPrototypeOf = __webpack_require__(/*! ./setPrototypeOf.js */ 16);

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  Object.defineProperty(subClass, "prototype", {
    writable: false
  });
  if (superClass) setPrototypeOf(subClass, superClass);
}

module.exports = _inherits, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 8 */
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/*! no static exports found */
/*! exports used: InspectorControls, RichTextToolbarButton, __experimentalPanelColorGradientSettings, useSetting */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blockEditor"]; }());

/***/ }),
/* 9 */
/*!**********************************!*\
  !*** external ["wp","richText"] ***!
  \**********************************/
/*! no static exports found */
/*! exports used: insertObject, registerFormatType, remove, useAnchorRef */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["richText"]; }());

/***/ }),
/* 10 */
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/getPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/*! exports used: default */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

function _getPrototypeOf(o) {
  module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  }, module.exports.__esModule = true, module.exports["default"] = module.exports;
  return _getPrototypeOf(o);
}

module.exports = _getPrototypeOf, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 11 */
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/*! no static exports found */
/*! exports used: compose, ifCondition */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["compose"]; }());

/***/ }),
/* 12 */
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js ***!
  \**************************************************************************/
/*! no static exports found */
/*! exports used: default */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports, __webpack_require__) {

var _typeof = __webpack_require__(/*! ./typeof.js */ 17)["default"];

var assertThisInitialized = __webpack_require__(/*! ./assertThisInitialized.js */ 3);

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  } else if (call !== void 0) {
    throw new TypeError("Derived constructors may only return object or undefined");
  }

  return assertThisInitialized(self);
}

module.exports = _possibleConstructorReturn, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 13 */
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/*! no static exports found */
/*! exports used: registerBlockType */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blocks"]; }());

/***/ }),
/* 14 */
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/*! no static exports found */
/*! exports used: withSelect */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["data"]; }());

/***/ }),
/* 15 */
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/*! all exports used */
/*! ModuleConcatenation bailout: Module is an entry point */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ 5);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ 6);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ 3);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ 7);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ 12);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ 10);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ 4);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/element */ 0);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/i18n */ 2);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/blocks */ 13);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @wordpress/compose */ 11);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @wordpress/data */ 14);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @wordpress/block-editor */ 8);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! @wordpress/rich-text */ 9);
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! @wordpress/components */ 1);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! @wordpress/hooks */ 18);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_15__);









function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }









var ourIcon = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Path"], {
  style: {
    fill: '#362985'
  },
  d: "M20.2695312,0H3.7304688C1.6733398,0,0,1.6733398,0,3.7304688v16.5390625 C0,22.3261719,1.6733398,24,3.7304688,24h16.5390625C22.3261719,24,24,22.3261719,24,20.2695312V3.7304688 C24,1.6733398,22.3261719,0,20.2695312,0z M22,20.2695312C22,21.2236328,21.2236328,22,20.2695312,22H3.7304688 C2.7763672,22,2,21.2236328,2,20.2695312V3.7304688C2,2.7763672,2.7763672,2,3.7304688,2h16.5390625 C21.2236328,2,22,2.7763672,22,3.7304688V20.2695312z M6.1955566,15.1322021 c-0.4520264,0.5498047-0.605835,1.2405396-0.4987793,1.8916626c0,0,0.5386963,2.0042725-0.3015747,2.8128052 c0,0,1.3220825,0.8447266,4.062439-1.3082886c0.0321045-0.0245361,0.1400757-0.1175537,0.1400757-0.1175537 c0.0926514-0.0820923,0.1844482-0.1652832,0.2654419-0.263855c0.8326416-1.0128784,0.6862183-2.508728-0.3265381-3.3411865 C8.5238037,13.9732666,7.0281372,14.1193237,6.1955566,15.1322021z M16.7513428,4.3816528l-5.0519409,6.1459961l1.6154785,1.3280029 l5.052002-6.1461182c0.3666382-0.4460449,0.3023071-1.1049805-0.1439209-1.4716187 C17.7769775,3.8710938,17.118042,3.9356079,16.7513428,4.3816528z M9.5584717,13.1323242 c0.3280029,0.1154785,0.6426392,0.2857056,0.9268799,0.5194092c0.2840576,0.2334595,0.5117798,0.5091553,0.6886597,0.8084717 l1.4021606-1.7058105l-1.6155396-1.3279419L9.5584717,13.1323242z"
}));
var icons = [],
    handleScrollTimeout,
    iconPickerRef = React.createRef();
window.jQuery.post(window.ajaxurl, {
  action: 'agsdi_get_icons'
}, function (response) {
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

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_9__["registerBlockType"])('aspengrove/icon-block', {
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon', 'ds-icon-expansion'),
  icon: function icon() {
    return ourIcon;
  },
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
  edit: function edit(props) {
    var alignOptions = [{
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Center', 'ds-icon-expansion'),
      value: 'center'
    }, {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Left', 'ds-icon-expansion'),
      value: 'left'
    }, {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Right', 'ds-icon-expansion'),
      value: 'right'
    }, {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Same as surrounding content', 'ds-icon-expansion'),
      value: 'inherit'
    }];
    var hasMulticolorIcon = props.attributes.icon && props.attributes.icon.substring(0, 12) === 'agsdix-mcip-';
    var colorsCount = hasMulticolorIcon && window.wadi_svg_icons && window.wadi_svg_icons[props.attributes.icon] && window.wadi_svg_icons[props.attributes.icon].colors ? window.wadi_svg_icons[props.attributes.icon].colors : 1;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12__["InspectorControls"], {
      key: "setting",
      className: "gb-agsdi-icon-settings"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon settings', 'ds-icon-expansion')
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconPicker, {
      icons: icons,
      selectedIcon: props.attributes.icon ? props.attributes.icon : getDefaultIcon(),
      onChange: function onChange(value) {
        var newAttributes = {
          icon: value
        };

        if (!props.attributes.icon || props.attributes.title === getDefaultIconTitle(props.attributes.icon)) {
          newAttributes['title'] = getDefaultIconTitle(value);
        }

        props.setAttributes(newAttributes);
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["__experimentalInputControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon title', 'ds-icon-expansion'),
      value: props.attributes.icon ? props.attributes.title : getDefaultIconTitle(getDefaultIcon()),
      onChange: function onChange(value) {
        props.setAttributes({
          title: value
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconColorSettings, {
      key: 'colors' + colorsCount,
      inSidebar: true,
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Design', 'ds-icon-expansion'),
      color: props.attributes.color,
      color2: props.attributes.color2,
      color3: props.attributes.color3,
      colorsCount: colorsCount,
      onChange: function onChange(value) {
        props.setAttributes(value);
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["__experimentalInputControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon size', 'ds-icon-expansion'),
      labelPosition: "side",
      value: props.attributes.size,
      onChange: function onChange(value) {
        props.setAttributes({
          size: value
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["RangeControl"], {
      min: "16",
      max: "128",
      showTooltip: false,
      withInputField: false,
      value: props.attributes.size ? parseInt(props.attributes.size) : 0,
      onChange: function onChange(value) {
        props.setAttributes({
          size: value + 'px'
        });
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["SelectControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Alignment', 'ds-icon-expansion'),
      value: props.attributes.align,
      options: alignOptions,
      onChange: function onChange(value) {
        props.setAttributes({
          align: value
        });
      }
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconBlock, {
      icon: props.attributes.icon ? props.attributes.icon : getDefaultIcon(),
      color: props.attributes.color,
      color2: props.attributes.color2,
      color3: props.attributes.color3,
      size: props.attributes.size,
      align: props.attributes.align,
      title: props.attributes.icon ? props.attributes.title : getDefaultIconTitle(getDefaultIcon())
    }));
  },
  save: function save(props) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconBlock, {
      icon: props.attributes.icon ? props.attributes.icon : getDefaultIcon(),
      color: props.attributes.color,
      color2: props.attributes.color2,
      color3: props.attributes.color3,
      size: props.attributes.size,
      align: props.attributes.align,
      title: props.attributes.icon ? props.attributes.title : getDefaultIconTitle(getDefaultIcon())
    });
  }
});

function getDefaultIcon() {
  for (var i = 0; i < icons.length; ++i) {
    if (icons[i] !== 'agsdix-null') {
      return icons[i];
      break;
    }
  }
}

var IconColorSettings = function IconColorSettings(props) {
  var palette = Object(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12__["useSetting"])('color.palette');
  var colorSettings = [{
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Primary color', 'ds-icon-expansion'),
    colorValue: props.color,
    colors: palette,
    onColorChange: function onColorChange(value) {
      props.onChange({
        color: value ? value : ''
      });
    }
  }];

  if (props.colorsCount > 1) {
    colorSettings.push({
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Secondary color', 'ds-icon-expansion'),
      colorValue: props.color2,
      colors: palette,
      onColorChange: function onColorChange(value) {
        props.onChange({
          color2: value ? value : ''
        });
      }
    });

    if (props.colorsCount > 2) {
      colorSettings.push({
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Tertiary color', 'ds-icon-expansion'),
        colorValue: props.color3,
        colors: palette,
        onColorChange: function onColorChange(value) {
          props.onChange({
            color3: value ? value : ''
          });
        }
      });
    }
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12__["__experimentalPanelColorGradientSettings"], {
    __experimentalIsRenderedInSidebar: props.inSidebar,
    title: props.title,
    settings: colorSettings
  }, props.children);
};

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

var IconPickerIcon = /*#__PURE__*/function (_React$Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(IconPickerIcon, _React$Component);

  var _super = _createSuper(IconPickerIcon);

  function IconPickerIcon(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, IconPickerIcon);

    _this = _super.call(this, props);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this), "ref", void 0);

    _this.state = {
      inView: false
    };
    _this.ref = React.createRef();
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(IconPickerIcon, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      if (!this.state.inView) {
        this.checkIfInView();
      }
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(oldProps) {
      if (!this.state.inView) {
        this.checkIfInView();
      }

      if (this.props.icon !== oldProps.icon && this.props.icon.substring(0, 12) !== 'agsdix-mcip-' && this.ref.current) {
        window.jQuery(this.ref.current).children('svg').remove();
      }
    }
  }, {
    key: "checkIfInView",
    value: function checkIfInView() {
      if (this.ref.current && this.props.icon !== 'agsdix-null' && this.ref.current.offsetTop > this.ref.current.parentNode.scrollTop - 100 && this.ref.current.offsetTop < this.ref.current.parentNode.scrollTop + this.ref.current.parentNode.clientHeight * 2) {
        this.setState({
          inView: true
        });
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      return this.state.inView ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", {
        "data-icon": this.props.icon,
        ref: this.ref,
        className: this.props.selected ? 'agsdi-selected' : '',
        onClick: function onClick() {
          _this2.props.onSelect && _this2.props.onSelect(_this2.props.icon);
        }
      }) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", {
        "data-icon-pre": this.props.icon,
        className: this.props.selected ? 'agsdi-selected' : '',
        ref: this.ref
      });
    }
  }]);

  return IconPickerIcon;
}(React.Component);

var IconPicker = /*#__PURE__*/function (_React$Component2) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(IconPicker, _React$Component2);

  var _super2 = _createSuper(IconPicker);

  function IconPicker(props) {
    var _this3;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, IconPicker);

    _this3 = _super2.call(this, props);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this3), "ref", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this3), "scrollUpdateTimeout", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this3), "filterUpdateTimeout", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this3), "filteringOptions", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this3), "filteringOptionsMulticolor", void 0);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_6___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this3), "isFreeVersion", true);

    _this3.state = {
      selectedIcon: _this3.props.selectedIcon ? _this3.props.selectedIcon : null,
      scrolledToSelected: !_this3.props.selectedIcon,
      filter: 'all',
      search: '',
      height: 0,
      scrollTop: 0,
      isLoading: false,
      isMulticolor: _this3.props.selectedIcon && _this3.props.selectedIcon.substring(0, 12) === 'agsdix-mcip-',
      filteredIcons: []
    };
    _this3.ref = React.createRef();
    _this3.filteringOptions = [{
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('All', 'ds-icon-expansion'),
      value: 'all'
    }];

    for (var filter in window.ags_divi_icons_config.singleColorFilters) {
      for (var i = 0; i < _this3.props.icons.length; ++i) {
        if (_this3.props.icons[i].substring(0, filter.length) === filter) {
          _this3.filteringOptions.push({
            label: window.ags_divi_icons_config.singleColorFilters[filter],
            value: filter
          });

          break;
        }
      }
    }

    _this3.filteringOptionsMulticolor = [{
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('All', 'ds-icon-expansion'),
      value: 'all'
    }];

    for (var set in window.agsdi_multicolor.sets) {
      _this3.filteringOptionsMulticolor.push({
        label: window.agsdi_multicolor.sets[set],
        value: set
      });
    }

    return _this3;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(IconPicker, [{
    key: "componentDidUpdate",
    value: function componentDidUpdate(oldProps, oldState) {
      var _this4 = this;

      if (this.props.selectedIcon !== oldProps.selectedIcon) {
        this.setState({
          selectedIcon: this.props.selectedIcon,
          isMulticolor: this.props.selectedIcon.substring(0, 12) === 'agsdix-mcip-'
        });
      }

      if (this.state.filter !== oldState.filter || this.state.search !== oldState.search || this.state.isMulticolor !== oldState.isMulticolor) {
        if (this.filterUpdateTimeout) {
          clearTimeout(this.filterUpdateTimeout);
        }

        this.filterUpdateTimeout = setTimeout(function () {
          _this4.filterUpdateTimeout = null;

          _this4.updateFilteredIcons();
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

        this.setState({
          scrolledToSelected: true
        });
      }
    }
  }, {
    key: "updateFilteredIcons",
    value: function updateFilteredIcons() {
      this.setState({
        isLoading: true
      });
      var filteredIcons = [],
          noFilter = this.state.filter === 'all';

      if (this.state.isMulticolor) {
        var srcIcons = [];

        for (var set in window.agsdi_multicolor.icons) {
          if (noFilter || set === this.state.filter) {
            srcIcons = srcIcons.concat.apply(srcIcons, window.agsdi_multicolor.icons[set].map(function (subset) {
              return subset.icons.map(function (icon) {
                return 'agsdix-' + subset.prefix.slice(0, -4) + icon;
              });
            }));
          }
        }
      } else {
        var srcIcons = this.props.icons;
      }

      if (this.state.isMulticolor && !this.state.search) {
        filteredIcons = srcIcons;
      } else if (noFilter && !this.state.search) {
        filteredIcons = srcIcons.filter(function (icon) {
          return icon !== 'agsdix-null';
        });
      } else {
        for (var i = 0; i < srcIcons.length; ++i) {
          var isVisible = true;

          if (srcIcons[i] === 'agsdix-null') {
            isVisible = false;
          } else if (!noFilter && !this.state.isMulticolor && srcIcons[i].substring(0, this.state.filter.length) !== this.state.filter) {
            isVisible = false;
          } else if (this.state.search) {
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
              keywords = (keywords ? keywords + ' ' : '') + window.agsdi_icon_aliases[srcIcons[i]];
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
  }, {
    key: "handleScroll",
    value: function handleScroll() {
      var _this5 = this;

      if (this.scrollUpdateTimeout) {
        clearTimeout(this.scrollUpdateTimeout);
      }

      this.scrollUpdateTimeout = setTimeout(function () {
        _this5.scrollUpdateTimeout = null;

        _this5._handleScroll();
      }, 250);
    }
  }, {
    key: "_handleScroll",
    value: function _handleScroll() {
      if (this.ref.current) {
        this.setState({
          scrollTop: this.ref.current.scrollTop,
          height: this.ref.current.clientHeight
        });
      }
    }
  }, {
    key: "handleIconSelection",
    value: function handleIconSelection(value) {
      this.setState({
        selectedIcon: value
      });

      if (this.props.onChange) {
        this.props.onChange(value);
      }
    }
  }, {
    key: "componentDidMount",
    value: function componentDidMount() {
      this.updateFilteredIcons();
    }
  }, {
    key: "render",
    value: function render() {
      var _this6 = this;

      var iconElements = [];

      for (var i = 0; i < this.state.filteredIcons.length; ++i) {
        iconElements.push(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconPickerIcon, {
          icon: this.state.filteredIcons[i],
          selected: this.state.selectedIcon === this.state.filteredIcons[i],
          key: i,
          onSelect: function onSelect(value) {
            _this6.handleIconSelection(value);
          },
          parentScrollTop: this.state.scrollTop,
          parentHeight: this.state.height
        }));
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "mce-agsdi-icon-picker gb-agsdi-icon-picker"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["SelectControl"], {
        className: "gb-agsdi-icon-type",
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon type', 'ds-icon-expansion'),
        labelPosition: "side",
        options: [{
          value: '',
          label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Single color', 'ds-icon-expansion')
        }, {
          value: 'multicolor',
          label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Multicolor', 'ds-icon-expansion')
        }],
        value: this.state.isMulticolor ? 'multicolor' : '',
        onChange: function onChange(value) {
          _this6.setState({
            isMulticolor: value === 'multicolor'
          });
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["SelectControl"], {
        className: "gb-agsdi-icon-set",
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon set', 'ds-icon-expansion'),
        labelPosition: "side",
        options: this.state.isMulticolor ? this.filteringOptionsMulticolor : this.filteringOptions,
        value: this.state.filter,
        onChange: function onChange(value) {
          _this6.setState({
            filter: value
          });
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["__experimentalInputControl"], {
        className: "gb-agsdi-icon-search",
        type: "search",
        hideLabelFromVision: true,
        placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Search Icons...', 'ds-icon-expansion'),
        value: this.state.search,
        onChange: function onChange(value) {
          _this6.setState({
            search: value
          });
        }
      }), this.state.isMulticolor && this.isFreeVersion ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "agsdi-pro-message"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('This is a PRO feature.', 'ds-icon-expansion')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("br", null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("a", {
        href: "#",
        target: "_blank"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Upgrade', 'ds-icon-expansion'))) : this.state.isLoading ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "agsdi-loading"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Loading...', 'ds-icon-expansion')) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["__experimentalScrollable"], {
        className: "agsdi-icons",
        ref: this.ref,
        onScroll: function onScroll() {
          _this6.handleScroll();
        }
      }, iconElements));
    }
  }]);

  return IconPicker;
}(React.Component);

var IconPreview = function IconPreview(props) {
  var isMulticolorIcon = props.icon && props.icon.substring(0, 12) === 'agsdix-mcip-';
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
    className: "agsdi-icon-preview",
    style: {
      color: isMulticolorIcon ? null : props.color,
      fontSize: props.size ? props.size : '48px',
      minHeight: '1em'
    }
  }, props.icon && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", {
    className: "agsdi-icon",
    "data-icon": props.icon,
    "data-color1": isMulticolorIcon && props.color && props.color !== '#000000' ? props.color : null,
    "data-color2": isMulticolorIcon && props.color2 && props.color2 !== '#000000' ? props.color2 : null,
    "data-color3": isMulticolorIcon && props.color3 && props.color3 !== '#000000' ? props.color3 : null
  }));
};

var IconBlock = function IconBlock(props) {
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

  if (window.wadi_svg_icons && window.wadi_svg_icons[props.icon] && window.wadi_svg_icons[props.icon].colors) {
    var iconColors = window.wadi_svg_icons[props.icon].colors;
  } else if (props.color3) {
    iconColors = 3;
  } else if (props.color2) {
    iconColors = 2;
  } else {
    iconColors = 1;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
    style: style,
    className: props.className
  }, props.icon === 'agsdix-self' && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("img", {
    src: window.ags_divi_icons_config.pluginDirUrl + '/blocks/images/block-free.svg'
  }), props.icon && props.icon !== 'agsdix-self' && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", {
    className: "agsdi-icon",
    "data-icon": props.icon,
    title: props.title,
    "data-color1": isMulticolorIcon && props.color && props.color !== '#000000' ? props.color : null,
    "data-color2": isMulticolorIcon && iconColors > 1 && props.color2 && props.color2 !== '#000000' ? props.color2 : null,
    "data-color3": isMulticolorIcon && iconColors > 2 && props.color3 && props.color3 !== '#000000' ? props.color3 : null
  }));
};

var IconsSelectionModal = /*#__PURE__*/function (_React$Component3) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(IconsSelectionModal, _React$Component3);

  var _super3 = _createSuper(IconsSelectionModal);

  function IconsSelectionModal(props) {
    var _this7;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, IconsSelectionModal);

    _this7 = _super3.call(this, props);
    _this7.state = _this7.deriveStateFromIconAttributes();
    return _this7;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(IconsSelectionModal, [{
    key: "deriveStateFromIconAttributes",
    value: function deriveStateFromIconAttributes() {
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

      var iconClasses = this.props.iconAttributes.className ? this.props.iconAttributes.className.split(' ').filter(function (value) {
        return value && value !== 'agsdi-icon' && value.substring(0, 7) !== 'i-agsdi';
      }).join(' ') : '';
      return {
        selectedIcon: this.props.iconAttributes.icon ? this.props.iconAttributes.icon : null,
        iconColor: hasMulticolorIcon ? this.props.iconAttributes.color1 : parsedStyle['color'] ? parsedStyle['color'] : '',
        iconColor2: this.props.iconAttributes.color2,
        iconColor3: this.props.iconAttributes.color3,
        iconSize: parsedStyle['font-size'] ? parsedStyle['font-size'] : '48px',
        iconTitle: this.props.iconAttributes.title ? this.props.iconAttributes.title : '',
        iconClasses: iconClasses
      };
    }
  }, {
    key: "componentDidMount",
    value: function componentDidMount() {
      if (!this.state.selectedIcon) {
        var defaultIcon = getDefaultIcon();
        this.setState({
          selectedIcon: defaultIcon,
          iconTitle: getDefaultIconTitle(defaultIcon)
        });
      }
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(oldProps, oldState) {
      if (this.props.iconAttributes.icon !== oldProps.iconAttributes.icon || this.props.iconAttributes.className !== oldProps.iconAttributes.className || this.props.iconAttributes.style !== oldProps.iconAttributes.style || this.props.iconAttributes.title !== oldProps.iconAttributes.title) {
        this.setState(this.deriveStateFromIconAttributes());
      }

      if (this.state.selectedIcon && oldState.selectedIcon && this.state.selectedIcon !== oldState.selectedIcon && oldState.iconTitle === getDefaultIconTitle(oldState.selectedIcon)) {
        this.setState({
          iconTitle: getDefaultIconTitle(this.state.selectedIcon)
        });
      }
    }
  }, {
    key: "closeModal",
    value: function closeModal() {
      if (this.props.onClose) {
        this.props.onClose();
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this8 = this;

      var hasMulticolorIcon = this.state.selectedIcon && this.state.selectedIcon.substring(0, 12) === 'agsdix-mcip-';
      var colorsCount = hasMulticolorIcon && window.wadi_svg_icons && window.wadi_svg_icons[this.state.selectedIcon] && window.wadi_svg_icons[this.state.selectedIcon].colors ? window.wadi_svg_icons[this.state.selectedIcon].colors : 1;
      return this.props.open ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["SlotFillProvider"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Modal"], {
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Insert Icon', 'ds-icon-expansion'),
        onRequestClose: function onRequestClose() {
          _this8.closeModal();
        },
        className: "agsdi-gutenberg-insert-modal"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Flex"], {
        style: {
          alignItems: 'flex-start',
          padding: '15px 15px 50px 15px'
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["FlexItem"], {
        style: {
          width: '30%'
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconPicker, {
        icons: icons,
        selectedIcon: this.state.selectedIcon,
        onChange: function onChange(value) {
          _this8.setState({
            selectedIcon: value
          });
        }
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["FlexItem"], {
        style: {
          width: '70%'
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Flex"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["FlexItem"], {
        style: {
          width: '60%',
          marginBottom: '20px'
        },
        className: "gb-agsdi-icon-settings"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconModalColorSettings, {
        color: this.state.iconColor,
        color2: this.state.iconColor2,
        color3: this.state.iconColor3,
        colorsCount: colorsCount,
        onChange: function onChange(value) {
          value.hasOwnProperty('color') && _this8.setState({
            iconColor: value.color
          }) || value.hasOwnProperty('color2') && _this8.setState({
            iconColor2: value.color2
          }) || value.hasOwnProperty('color3') && _this8.setState({
            iconColor3: value.color3
          });
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["__experimentalInputControl"], {
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon size', 'ds-icon-expansion'),
        labelPosition: "side",
        value: this.state.iconSize,
        onChange: function onChange(value) {
          _this8.setState({
            iconSize: value
          });
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["RangeControl"], {
        min: "16",
        max: "128",
        showTooltip: false,
        withInputField: false,
        value: parseInt(this.state.iconSize),
        onChange: function onChange(value) {
          _this8.setState({
            iconSize: value + 'px'
          });
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["__experimentalInputControl"], {
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon title', 'ds-icon-expansion'),
        labelPosition: "side",
        value: this.state.iconTitle,
        onChange: function onChange(value) {
          _this8.setState({
            iconTitle: value
          });
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["__experimentalInputControl"], {
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon class(es)', 'ds-icon-expansion'),
        labelPosition: "side",
        value: this.state.iconClasses,
        onChange: function onChange(value) {
          _this8.setState({
            iconClasses: value
          });
        }
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["FlexItem"], {
        style: {
          width: '40%'
        },
        className: "mce-agsdi-icon-preview"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconPreview, {
        icon: this.state.selectedIcon,
        color: this.state.iconColor,
        color2: this.state.iconColor2,
        color3: this.state.iconColor3,
        size: this.state.iconSize
      }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        style: {
          border: '1px solid #d7dade',
          backgroundColor: '#fafafb',
          padding: '10px'
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Tip"], null, "If you leave the color and/or size settings blank, the icon will derive its color and size from the surrounding text's color and size (based on the styling of the icon's parent element). This is not reflected in the icon preview.")))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Flex"], {
        className: "agsdi-gutenberg-insert-modal-foot",
        style: {
          boxShadow: '0 0 20px 0 rgb(0 0 0 / 20%)',
          justifyContent: 'flex-end',
          padding: '10px 15px',
          background: '#fff'
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Button"], {
        variant: "primary",
        onClick: function onClick() {
          _this8.props.onApply && _this8.props.onApply(_this8.state.selectedIcon, _this8.state.iconColor, _this8.state.iconColor2, _this8.state.iconColor3, _this8.state.iconSize, _this8.state.iconTitle, _this8.state.iconClasses);

          _this8.closeModal();
        }
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('OK', 'ds-icon-expansion')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Button"], {
        variant: "secondary",
        onClick: function onClick() {
          _this8.closeModal();
        }
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Cancel', 'ds-icon-expansion'))))) : null;
    }
  }]);

  return IconsSelectionModal;
}(React.Component);

var IconModalColorSettings = function IconModalColorSettings(props) {
  var palette = Object(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12__["useSetting"])('color.palette');
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
    className: "gb-agsdi-icon-color-picker"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("label", null, wp.i18n.__('Primary color', 'ds-icon-expansion')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconModalColorSetting, {
    colors: palette,
    value: props.color ? props.color : '',
    onChange: function onChange(value) {
      props.onChange({
        color: value
      });
    }
  })), props.colorsCount > 1 && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
    className: "gb-agsdi-icon-color-picker"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("label", null, wp.i18n.__('Secondary color', 'ds-icon-expansion')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconModalColorSetting, {
    colors: palette,
    value: props.color2 ? props.color2 : '',
    onChange: function onChange(value) {
      props.onChange({
        color2: value
      });
    }
  })), props.colorsCount > 2 && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
    className: "gb-agsdi-icon-color-picker"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("label", null, wp.i18n.__('Tertiary color', 'ds-icon-expansion')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconModalColorSetting, {
    colors: palette,
    value: props.color3 ? props.color3 : '',
    onChange: function onChange(value) {
      props.onChange({
        color3: value
      });
    }
  })));
};

var IconModalColorSetting = /*#__PURE__*/function (_React$Component4) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(IconModalColorSetting, _React$Component4);

  var _super4 = _createSuper(IconModalColorSetting);

  function IconModalColorSetting(props) {
    var _this9;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, IconModalColorSetting);

    _this9 = _super4.call(this, props);
    _this9.state = {
      custom: false,
      currentColor: _this9.props.value ? _this9.props.value : ''
    };
    return _this9;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(IconModalColorSetting, [{
    key: "render",
    value: function render() {
      var _this10 = this;

      var colors = this.props.colors.slice(); // if (this.state.currentColor) {
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

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["ColorPalette"], {
        colors: colors,
        value: this.props.value ? this.props.value : '',
        onChange: function onChange(value) {
          _this10.setState({
            currentColor: value
          });

          _this10.props.onChange(value);
        },
        disableCustomColors: false,
        clearable: false
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Button"], {
        variant: "secondary",
        className: "agsdi-gutenberg-insert-modal-clear-btn",
        onClick: function onClick() {
          _this10.setState({
            custom: false,
            currentColor: ''
          });

          _this10.props.onChange('');
        }
      }, wp.i18n.__('Clear', 'ds-icon-expansion')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Popover"].Slot, null));
    }
  }]);

  return IconModalColorSetting;
}(React.Component);

;

var DiviIconAction = /*#__PURE__*/function (_React$Component5) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(DiviIconAction, _React$Component5);

  var _super5 = _createSuper(DiviIconAction);

  function DiviIconAction(props) {
    var _this11;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, DiviIconAction);

    _this11 = _super5.call(this, props);
    _this11.state = {
      isOpen: false
    };
    return _this11;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(DiviIconAction, [{
    key: "onApply",
    value: function onApply(icon, color, color2, color3, size, title, classes) {
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

      this.props.onChange(Object(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_13__["insertObject"])(this.props.value, {
        type: 'aspengrove/icon',
        attributes: iconAttributes
      }));
      this.props.onFocus();
    }
  }, {
    key: "render",
    value: function render() {
      var _this12 = this;

      console.log(this.props.activeObjectAttributes);
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_12__["RichTextToolbarButton"], {
        icon: ourIcon,
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon', 'ds-icon-expansion'),
        onClick: function onClick() {
          _this12.setState({
            isOpen: true
          });
        }
      }), this.state.isOpen && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(IconsSelectionModal, {
        open: this.state.isOpen,
        onClose: function onClose() {
          _this12.setState({
            isOpen: false
          });

          _this12.props.onFocus();
        },
        onApply: function onApply(icon, color, color2, color3, size, title, classes) {
          _this12.onApply(icon, color, color2, color3, size, title, classes);
        },
        iconAttributes: this.props.activeObjectAttributes
      }), this.props.isObjectActive && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(EditIconPopover, {
        iconRef: this.props.contentRef,
        selectionValue: this.props.value,
        onEditButtonClick: function onEditButtonClick() {
          _this12.setState({
            isOpen: true
          });
        },
        onRemoveButtonClick: function onRemoveButtonClick() {
          _this12.props.onChange(Object(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_13__["remove"])(_this12.props.value, _this12.props.value.start, _this12.props.value.end));
        }
      }));
    }
  }]);

  return DiviIconAction;
}(React.Component);

var EditIconPopover = function EditIconPopover(props) {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Popover"], {
    anchorRef: Object(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_13__["useAnchorRef"])({
      ref: props.iconRef,
      value: props.selectionValue,
      settings: AgsIconFormat
    }),
    noArrow: false,
    position: "bottom center"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["ButtonGroup"], {
    style: {
      whiteSpace: 'nowrap'
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Button"], {
    icon: "edit",
    onClick: function onClick() {
      props.onEditButtonClick();
    }
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Edit Icon', 'ds-icon-expansion')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_14__["Button"], {
    icon: "trash",
    onClick: function onClick() {
      props.onRemoveButtonClick();
    }
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Remove Icon', 'ds-icon-expansion'))));
};

var AgsIconFormat = {
  name: 'aspengrove/icon',
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Icon', 'ds-icon-expansion'),
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
  edit: Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_10__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_11__["withSelect"])(function (select) {
    return {
      selectedBlock: select('core/block-editor').getSelectedBlock()
    };
  }), Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_10__["ifCondition"])(function (props) {
    return props.selectedBlock && props.selectedBlock.name === 'core/paragraph';
  }))(DiviIconAction)
};
Object(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_13__["registerFormatType"])('aspengrove/icon', AgsIconFormat);

/***/ }),
/* 16 */
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/setPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/*! all exports used */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

function _setPrototypeOf(o, p) {
  module.exports = _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  }, module.exports.__esModule = true, module.exports["default"] = module.exports;
  return _setPrototypeOf(o, p);
}

module.exports = _setPrototypeOf, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 17 */
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/*! no static exports found */
/*! all exports used */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  return (module.exports = _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) {
    return typeof obj;
  } : function (obj) {
    return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
  }, module.exports.__esModule = true, module.exports["default"] = module.exports), _typeof(obj);
}

module.exports = _typeof, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),
/* 18 */
/*!*******************************!*\
  !*** external ["wp","hooks"] ***!
  \*******************************/
/*! no static exports found */
/*! ModuleConcatenation bailout: Module is not an ECMAScript module */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["hooks"]; }());

/***/ })
/******/ ]);
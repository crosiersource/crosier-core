(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["cfg/entMenuList"],{

/***/ "./assets/js/cfg/entMenuList.js":
/*!**************************************!*\
  !*** ./assets/js/cfg/entMenuList.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var sortablejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! sortablejs */ "./node_modules/sortablejs/Sortable.js");
/* harmony import */ var sortablejs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(sortablejs__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _static_fos_js_routes_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../static/fos_js_routes.json */ "./assets/static/fos_js_routes.json");
var _static_fos_js_routes_json__WEBPACK_IMPORTED_MODULE_2___namespace = /*#__PURE__*/__webpack_require__.t(/*! ../../static/fos_js_routes.json */ "./assets/static/fos_js_routes.json", 1);
/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js */ "./vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js");
/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_3__);






_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_3___default.a.setRoutingData(_static_fos_js_routes_json__WEBPACK_IMPORTED_MODULE_2__);
var sortable = sortablejs__WEBPACK_IMPORTED_MODULE_0___default.a.create(simpleList, {
  animation: 150,
  onEnd: function onEnd(
  /**Event*/
  evt) {
    console.log('endd');
    console.log(this.toArray());
  }
});
jquery__WEBPACK_IMPORTED_MODULE_1___default()('#confirmationModal').on('click', '#btnConfirmationModalYes', function (e) {
  var jsonSortable = JSON.stringify(sortable.toArray());
  jquery__WEBPACK_IMPORTED_MODULE_1___default.a.ajax({
    url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_3___default.a.generate('cfg_entMenu_saveOrdem'),
    type: 'post',
    dataType: 'json',
    data: {
      'jsonSortable': jsonSortable
    },
    success: function success(res) {
      console.log('deu boa');
    }
  });
});

/***/ }),

/***/ "./assets/static/fos_js_routes.json":
/*!******************************************!*\
  !*** ./assets/static/fos_js_routes.json ***!
  \******************************************/
/*! exports provided: base_url, routes, prefix, host, port, scheme, locale, default */
/***/ (function(module) {

module.exports = JSON.parse("{\"base_url\":\"\",\"routes\":{\"bse_categoriaPessoa_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/bse/categoriaPessoa/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_categoriaPessoa_list\":{\"tokens\":[[\"text\",\"/bse/categoriaPessoa/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_categoriaPessoa_datatablesJsList\":{\"tokens\":[[\"text\",\"/bse/categoriaPessoa/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_categoriaPessoa_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"categoriaPessoa\",true],[\"text\",\"/bse/categoriaPessoa/delete\"]],\"defaults\":[],\"requirements\":{\"categoriaPessoa\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoa_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/bse/pessoa/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoa_list\":{\"tokens\":[[\"text\",\"/bse/pessoa/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoa_datatablesJsList\":{\"tokens\":[[\"text\",\"/bse/pessoa/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoa_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/bse/pessoa/delete\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoaEndereco_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"endereco\",true],[\"variable\",\"/\",\"\\\\d+\",\"pessoa\",true],[\"text\",\"/bse/pessoaEndereco/form\"]],\"defaults\":{\"endereco\":null},\"requirements\":{\"pessoa\":\"\\\\d+\",\"endereco\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoaEndereco_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"endereco\",true],[\"text\",\"/bse/pessoaEndereco/delete\"]],\"defaults\":[],\"requirements\":{\"endereco\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoaContato_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"contato\",true],[\"variable\",\"/\",\"\\\\d+\",\"pessoa\",true],[\"text\",\"/bse/pessoaContato/form\"]],\"defaults\":{\"contato\":null},\"requirements\":{\"pessoa\":\"\\\\d+\",\"contato\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_pessoaContato_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"contato\",true],[\"text\",\"/bse/pessoaContato/delete\"]],\"defaults\":[],\"requirements\":{\"contato\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_prop_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/bse/prop/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_prop_list\":{\"tokens\":[[\"text\",\"/bse/prop/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_prop_datatablesJsList\":{\"tokens\":[[\"text\",\"/bse/prop/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_prop_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/bse/prop/delete\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"bse_prop_buildJson\":{\"tokens\":[[\"text\",\"/bse/prop/buildJson/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"api_cfg_pushMessage_findById\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/api/cfg/pushMessage/findById\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"api_cfg_pushMessage_findByFilters\":{\"tokens\":[[\"text\",\"/api/cfg/pushMessage/findByFilters/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"api_cfg_pushMessage_getNew\":{\"tokens\":[[\"text\",\"/api/cfg/pushMessage/getNew\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"api_cfg_pushMessage_save\":{\"tokens\":[[\"text\",\"/api/cfg/pushMessage/save\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_pushMessage_getNewMessages\":{\"tokens\":[[\"text\",\"/api/cfg/pushMessage/getNewMessages\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_app_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/cfg/app/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_app_list\":{\"tokens\":[[\"text\",\"/cfg/app/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_app_datatablesJsList\":{\"tokens\":[[\"text\",\"/cfg/app/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_app_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"app\",true],[\"text\",\"/cfg/app/delete\"]],\"defaults\":[],\"requirements\":{\"app\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_appConfig_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"appConfig\",true],[\"text\",\"/cfg/appConfig/delete\"]],\"defaults\":[],\"requirements\":{\"appConfig\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_config_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/cfg/config/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_config_list\":{\"tokens\":[[\"text\",\"/cfg/config/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_config_datatablesJsList\":{\"tokens\":[[\"text\",\"/cfg/config/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_config_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/cfg/config/delete\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_config_select2json\":{\"tokens\":[[\"text\",\"/cfg/config/select2json\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"getCrosierAssetUrl\":{\"tokens\":[[\"text\",\"/getCrosierAssetUrl/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_entMenu_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/cfg/entMenu/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_entMenu_list\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"entMenu\",true],[\"text\",\"/cfg/entMenu/list\"]],\"defaults\":[],\"requirements\":{\"entMenu\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_entMenu_listPais\":{\"tokens\":[[\"text\",\"/cfg/entMenu/listPais/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_entMenu_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/cfg/entMenu/delete\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_entMenu_saveOrdem\":{\"tokens\":[[\"text\",\"/cfg/entMenu/saveOrdem/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_entMenu_clear\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"entMenu\",true],[\"text\",\"/cfg/entMenu/clear\"]],\"defaults\":{\"entMenu\":null},\"requirements\":{\"entMenu\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_program_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/cfg/program/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_program_list\":{\"tokens\":[[\"text\",\"/cfg/program/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_program_datatablesJsList\":{\"tokens\":[[\"text\",\"/cfg/program/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"cfg_program_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/cfg/program/delete\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"index\":{\"tokens\":[[\"text\",\"/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"logAnError\":{\"tokens\":[[\"text\",\"/logAnError\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"do1\":{\"tokens\":[[\"text\",\"/do1\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"do2\":{\"tokens\":[[\"text\",\"/do2\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_api_checkLoginState\":{\"tokens\":[[\"text\",\"/api/sec/checkLoginState/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_group_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/sec/group/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_group_list\":{\"tokens\":[[\"text\",\"/sec/group/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_group_datatablesJsList\":{\"tokens\":[[\"text\",\"/sec/group/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_group_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/sec/group/delete\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_role_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/sec/role/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_role_list\":{\"tokens\":[[\"text\",\"/sec/role/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_role_datatablesJsList\":{\"tokens\":[[\"text\",\"/sec/role/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_role_delete\":{\"tokens\":[[\"text\",\"/\"],[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/sec/role/delete\"]],\"defaults\":[],\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"login\":{\"tokens\":[[\"text\",\"/login\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"logout\":{\"tokens\":[[\"text\",\"/logout\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"hash\":{\"tokens\":[[\"text\",\"/sec/hash\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_user_form\":{\"tokens\":[[\"variable\",\"/\",\"\\\\d+\",\"id\",true],[\"text\",\"/sec/user/form\"]],\"defaults\":{\"id\":null},\"requirements\":{\"id\":\"\\\\d+\"},\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_user_list\":{\"tokens\":[[\"text\",\"/sec/user/list/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]},\"sec_user_datatablesJsList\":{\"tokens\":[[\"text\",\"/sec/user/datatablesJsList/\"]],\"defaults\":[],\"requirements\":[],\"hosttokens\":[],\"methods\":[],\"schemes\":[]}},\"prefix\":\"\",\"host\":\"localhost\",\"port\":\"\",\"scheme\":\"http\",\"locale\":[]}");

/***/ }),

/***/ "./node_modules/sortablejs/Sortable.js":
/*!*********************************************!*\
  !*** ./node_modules/sortablejs/Sortable.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery) {var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;/**!
 * Sortable
 * @author	RubaXa   <trash@rubaxa.org>
 * @author	owenm    <owen23355@gmail.com>
 * @license MIT
 */

(function sortableModule(factory) {
	"use strict";

	if (true) {
		!(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	}
	else {}
})(function sortableFactory() {
	"use strict";

	if (typeof window === "undefined" || !window.document) {
		return function sortableError() {
			throw new Error("Sortable.js requires a window with a document");
		};
	}

	var dragEl,
		parentEl,
		ghostEl,
		cloneEl,
		rootEl,
		nextEl,
		lastDownEl,

		scrollEl,
		scrollParentEl,
		scrollCustomFn,

		oldIndex,
		newIndex,
		oldDraggableIndex,
		newDraggableIndex,

		activeGroup,
		putSortable,

		autoScrolls = [],
		scrolling = false,

		awaitingDragStarted = false,
		ignoreNextClick = false,
		sortables = [],

		pointerElemChangedInterval,
		lastPointerElemX,
		lastPointerElemY,

		tapEvt,
		touchEvt,

		moved,


		lastTarget,
		lastDirection,
		pastFirstInvertThresh = false,
		isCircumstantialInvert = false,
		lastMode, // 'swap' or 'insert'

		targetMoveDistance,

		// For positioning ghost absolutely
		ghostRelativeParent,
		ghostRelativeParentInitialScroll = [], // (left, top)

		realDragElRect, // dragEl rect after current animation

		/** @const */
		R_SPACE = /\s+/g,

		expando = 'Sortable' + (new Date).getTime(),

		win = window,
		document = win.document,
		parseInt = win.parseInt,
		setTimeout = win.setTimeout,

		$ = __webpack_provided_window_dot_jQuery || win.Zepto,
		Polymer = win.Polymer,

		captureMode = {
			capture: false,
			passive: false
		},

		IE11OrLess = !!navigator.userAgent.match(/(?:Trident.*rv[ :]?11\.|msie|iemobile)/i),
		Edge = !!navigator.userAgent.match(/Edge/i),
		FireFox = !!navigator.userAgent.match(/firefox/i),
		Safari = !!(navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && !navigator.userAgent.match(/android/i)),
		IOS = !!(navigator.userAgent.match(/iP(ad|od|hone)/i)),

		PositionGhostAbsolutely = IOS,

		CSSFloatProperty = Edge || IE11OrLess ? 'cssFloat' : 'float',

		// This will not pass for IE9, because IE9 DnD only works on anchors
		supportDraggable = ('draggable' in document.createElement('div')),

		supportCssPointerEvents = (function() {
			// false when <= IE11
			if (IE11OrLess) {
				return false;
			}
			var el = document.createElement('x');
			el.style.cssText = 'pointer-events:auto';
			return el.style.pointerEvents === 'auto';
		})(),

		_silent = false,
		_alignedSilent = false,

		abs = Math.abs,
		min = Math.min,
		max = Math.max,

		savedInputChecked = [],

		_detectDirection = function(el, options) {
			var elCSS = _css(el),
				elWidth = parseInt(elCSS.width)
					- parseInt(elCSS.paddingLeft)
					- parseInt(elCSS.paddingRight)
					- parseInt(elCSS.borderLeftWidth)
					- parseInt(elCSS.borderRightWidth),
				child1 = _getChild(el, 0, options),
				child2 = _getChild(el, 1, options),
				firstChildCSS = child1 && _css(child1),
				secondChildCSS = child2 && _css(child2),
				firstChildWidth = firstChildCSS && parseInt(firstChildCSS.marginLeft) + parseInt(firstChildCSS.marginRight) + _getRect(child1).width,
				secondChildWidth = secondChildCSS && parseInt(secondChildCSS.marginLeft) + parseInt(secondChildCSS.marginRight) + _getRect(child2).width;

			if (elCSS.display === 'flex') {
				return elCSS.flexDirection === 'column' || elCSS.flexDirection === 'column-reverse'
				? 'vertical' : 'horizontal';
			}

			if (elCSS.display === 'grid') {
				return elCSS.gridTemplateColumns.split(' ').length <= 1 ? 'vertical' : 'horizontal';
			}

			if (child1 && firstChildCSS.float !== 'none') {
				var touchingSideChild2 = firstChildCSS.float === 'left' ? 'left' : 'right';

				return child2 && (secondChildCSS.clear === 'both' || secondChildCSS.clear === touchingSideChild2) ?
					'vertical' : 'horizontal';
			}

			return (child1 &&
				(
					firstChildCSS.display === 'block' ||
					firstChildCSS.display === 'flex' ||
					firstChildCSS.display === 'table' ||
					firstChildCSS.display === 'grid' ||
					firstChildWidth >= elWidth &&
					elCSS[CSSFloatProperty] === 'none' ||
					child2 &&
					elCSS[CSSFloatProperty] === 'none' &&
					firstChildWidth + secondChildWidth > elWidth
				) ?
				'vertical' : 'horizontal'
			);
		},

		/**
		 * Detects first nearest empty sortable to X and Y position using emptyInsertThreshold.
		 * @param  {Number} x      X position
		 * @param  {Number} y      Y position
		 * @return {HTMLElement}   Element of the first found nearest Sortable
		 */
		_detectNearestEmptySortable = function(x, y) {
			for (var i = 0; i < sortables.length; i++) {
				if (_lastChild(sortables[i])) continue;

				var rect = _getRect(sortables[i]),
					threshold = sortables[i][expando].options.emptyInsertThreshold,
					insideHorizontally = x >= (rect.left - threshold) && x <= (rect.right + threshold),
					insideVertically = y >= (rect.top - threshold) && y <= (rect.bottom + threshold);

				if (threshold && insideHorizontally && insideVertically) {
					return sortables[i];
				}
			}
		},

		_isClientInRowColumn = function(x, y, el, axis, options) {
			var targetRect = _getRect(el),
				targetS1Opp = axis === 'vertical' ? targetRect.left : targetRect.top,
				targetS2Opp = axis === 'vertical' ? targetRect.right : targetRect.bottom,
				mouseOnOppAxis = axis === 'vertical' ? x : y;

			return targetS1Opp < mouseOnOppAxis && mouseOnOppAxis < targetS2Opp;
		},

		_isElInRowColumn = function(el1, el2, axis) {
			var el1Rect = el1 === dragEl && realDragElRect || _getRect(el1),
				el2Rect = el2 === dragEl && realDragElRect || _getRect(el2),
				el1S1Opp = axis === 'vertical' ? el1Rect.left : el1Rect.top,
				el1S2Opp = axis === 'vertical' ? el1Rect.right : el1Rect.bottom,
				el1OppLength = axis === 'vertical' ? el1Rect.width : el1Rect.height,
				el2S1Opp = axis === 'vertical' ? el2Rect.left : el2Rect.top,
				el2S2Opp = axis === 'vertical' ? el2Rect.right : el2Rect.bottom,
				el2OppLength = axis === 'vertical' ? el2Rect.width : el2Rect.height;

			return (
				el1S1Opp === el2S1Opp ||
				el1S2Opp === el2S2Opp ||
				(el1S1Opp + el1OppLength / 2) === (el2S1Opp + el2OppLength / 2)
			);
		},

		_getParentAutoScrollElement = function(el, includeSelf) {
			// skip to window
			if (!el || !el.getBoundingClientRect) return _getWindowScrollingElement();

			var elem = el;
			var gotSelf = false;
			do {
				// we don't need to get elem css if it isn't even overflowing in the first place (performance)
				if (elem.clientWidth < elem.scrollWidth || elem.clientHeight < elem.scrollHeight) {
					var elemCSS = _css(elem);
					if (
						elem.clientWidth < elem.scrollWidth && (elemCSS.overflowX == 'auto' || elemCSS.overflowX == 'scroll') ||
						elem.clientHeight < elem.scrollHeight && (elemCSS.overflowY == 'auto' || elemCSS.overflowY == 'scroll')
					) {
						if (!elem || !elem.getBoundingClientRect || elem === document.body) return _getWindowScrollingElement();

						if (gotSelf || includeSelf) return elem;
						gotSelf = true;
					}
				}
			/* jshint boss:true */
			} while (elem = elem.parentNode);

			return _getWindowScrollingElement();
		},

		_getWindowScrollingElement = function() {
			if (IE11OrLess) {
				return document.documentElement;
			} else {
				return document.scrollingElement;
			}
		},

		_scrollBy = function(el, x, y) {
			el.scrollLeft += x;
			el.scrollTop += y;
		},

		_autoScroll = _throttle(function (/**Event*/evt, /**Object*/options, /**HTMLElement*/rootEl, /**Boolean*/isFallback) {
			// Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
			if (options.scroll) {
				var _this = rootEl ? rootEl[expando] : window,
					sens = options.scrollSensitivity,
					speed = options.scrollSpeed,

					x = evt.clientX,
					y = evt.clientY,

					winScroller = _getWindowScrollingElement(),

					scrollThisInstance = false;

				// Detect scrollEl
				if (scrollParentEl !== rootEl) {
					_clearAutoScrolls();

					scrollEl = options.scroll;
					scrollCustomFn = options.scrollFn;

					if (scrollEl === true) {
						scrollEl = _getParentAutoScrollElement(rootEl, true);
						scrollParentEl = scrollEl;
					}
				}


				var layersOut = 0;
				var currentParent = scrollEl;
				do {
					var	el = currentParent,
						rect = _getRect(el),

						top = rect.top,
						bottom = rect.bottom,
						left = rect.left,
						right = rect.right,

						width = rect.width,
						height = rect.height,

						scrollWidth,
						scrollHeight,

						css,

						vx,
						vy,

						canScrollX,
						canScrollY,

						scrollPosX,
						scrollPosY;


					scrollWidth = el.scrollWidth;
					scrollHeight = el.scrollHeight;

					css = _css(el);

					scrollPosX = el.scrollLeft;
					scrollPosY = el.scrollTop;

					if (el === winScroller) {
						canScrollX = width < scrollWidth && (css.overflowX === 'auto' || css.overflowX === 'scroll' || css.overflowX === 'visible');
						canScrollY = height < scrollHeight && (css.overflowY === 'auto' || css.overflowY === 'scroll' || css.overflowY === 'visible');
					} else {
						canScrollX = width < scrollWidth && (css.overflowX === 'auto' || css.overflowX === 'scroll');
						canScrollY = height < scrollHeight && (css.overflowY === 'auto' || css.overflowY === 'scroll');
					}

					vx = canScrollX && (abs(right - x) <= sens && (scrollPosX + width) < scrollWidth) - (abs(left - x) <= sens && !!scrollPosX);

					vy = canScrollY && (abs(bottom - y) <= sens && (scrollPosY + height) < scrollHeight) - (abs(top - y) <= sens && !!scrollPosY);


					if (!autoScrolls[layersOut]) {
						for (var i = 0; i <= layersOut; i++) {
							if (!autoScrolls[i]) {
								autoScrolls[i] = {};
							}
						}
					}

					if (autoScrolls[layersOut].vx != vx || autoScrolls[layersOut].vy != vy || autoScrolls[layersOut].el !== el) {
						autoScrolls[layersOut].el = el;
						autoScrolls[layersOut].vx = vx;
						autoScrolls[layersOut].vy = vy;

						clearInterval(autoScrolls[layersOut].pid);

						if (el && (vx != 0 || vy != 0)) {
							scrollThisInstance = true;
							/* jshint loopfunc:true */
							autoScrolls[layersOut].pid = setInterval((function () {
								// emulate drag over during autoscroll (fallback), emulating native DnD behaviour
								if (isFallback && this.layer === 0) {
									Sortable.active._emulateDragOver(true);
									Sortable.active._onTouchMove(touchEvt, true);
								}
								var scrollOffsetY = autoScrolls[this.layer].vy ? autoScrolls[this.layer].vy * speed : 0;
								var scrollOffsetX = autoScrolls[this.layer].vx ? autoScrolls[this.layer].vx * speed : 0;

								if ('function' === typeof(scrollCustomFn)) {
									if (scrollCustomFn.call(_this, scrollOffsetX, scrollOffsetY, evt, touchEvt, autoScrolls[this.layer].el) !== 'continue') {
										return;
									}
								}

								_scrollBy(autoScrolls[this.layer].el, scrollOffsetX, scrollOffsetY);
							}).bind({layer: layersOut}), 24);
						}
					}
					layersOut++;
				} while (options.bubbleScroll && currentParent !== winScroller && (currentParent = _getParentAutoScrollElement(currentParent, false)));
				scrolling = scrollThisInstance; // in case another function catches scrolling as false in between when it is not
			}
		}, 30),

		_clearAutoScrolls = function () {
			autoScrolls.forEach(function(autoScroll) {
				clearInterval(autoScroll.pid);
			});
			autoScrolls = [];
		},

		_prepareGroup = function (options) {
			function toFn(value, pull) {
				return function(to, from, dragEl, evt) {
					var sameGroup = to.options.group.name &&
									from.options.group.name &&
									to.options.group.name === from.options.group.name;

					if (value == null && (pull || sameGroup)) {
						// Default pull value
						// Default pull and put value if same group
						return true;
					} else if (value == null || value === false) {
						return false;
					} else if (pull && value === 'clone') {
						return value;
					} else if (typeof value === 'function') {
						return toFn(value(to, from, dragEl, evt), pull)(to, from, dragEl, evt);
					} else {
						var otherGroup = (pull ? to : from).options.group.name;

						return (value === true ||
						(typeof value === 'string' && value === otherGroup) ||
						(value.join && value.indexOf(otherGroup) > -1));
					}
				};
			}

			var group = {};
			var originalGroup = options.group;

			if (!originalGroup || typeof originalGroup != 'object') {
				originalGroup = {name: originalGroup};
			}

			group.name = originalGroup.name;
			group.checkPull = toFn(originalGroup.pull, true);
			group.checkPut = toFn(originalGroup.put);
			group.revertClone = originalGroup.revertClone;

			options.group = group;
		},

		_checkAlignment = function(evt) {
			if (!dragEl || !dragEl.parentNode) return;
			dragEl.parentNode[expando] && dragEl.parentNode[expando]._computeIsAligned(evt);
		},

		_hideGhostForTarget = function() {
			if (!supportCssPointerEvents && ghostEl) {
				_css(ghostEl, 'display', 'none');
			}
		},

		_unhideGhostForTarget = function() {
			if (!supportCssPointerEvents && ghostEl) {
				_css(ghostEl, 'display', '');
			}
		};


	// #1184 fix - Prevent click event on fallback if dragged but item not changed position
	document.addEventListener('click', function(evt) {
		if (ignoreNextClick) {
			evt.preventDefault();
			evt.stopPropagation && evt.stopPropagation();
			evt.stopImmediatePropagation && evt.stopImmediatePropagation();
			ignoreNextClick = false;
			return false;
		}
	}, true);

	var nearestEmptyInsertDetectEvent = function(evt) {
		if (dragEl) {
			evt = evt.touches ? evt.touches[0] : evt;
			var nearest = _detectNearestEmptySortable(evt.clientX, evt.clientY);

			if (nearest) {
				// Create imitation event
				var event = {};
				for (var i in evt) {
					event[i] = evt[i];
				}
				event.target = event.rootEl = nearest;
				event.preventDefault = void 0;
				event.stopPropagation = void 0;
				nearest[expando]._onDragOver(event);
			}
		}
	};

	/**
	 * @class  Sortable
	 * @param  {HTMLElement}  el
	 * @param  {Object}       [options]
	 */
	function Sortable(el, options) {
		if (!(el && el.nodeType && el.nodeType === 1)) {
			throw 'Sortable: `el` must be HTMLElement, not ' + {}.toString.call(el);
		}

		this.el = el; // root element
		this.options = options = _extend({}, options);


		// Export instance
		el[expando] = this;

		// Default options
		var defaults = {
			group: null,
			sort: true,
			disabled: false,
			store: null,
			handle: null,
			scroll: true,
			scrollSensitivity: 30,
			scrollSpeed: 10,
			bubbleScroll: true,
			draggable: /[uo]l/i.test(el.nodeName) ? '>li' : '>*',
			swapThreshold: 1, // percentage; 0 <= x <= 1
			invertSwap: false, // invert always
			invertedSwapThreshold: null, // will be set to same as swapThreshold if default
			removeCloneOnHide: true,
			direction: function() {
				return _detectDirection(el, this.options);
			},
			ghostClass: 'sortable-ghost',
			chosenClass: 'sortable-chosen',
			dragClass: 'sortable-drag',
			ignore: 'a, img',
			filter: null,
			preventOnFilter: true,
			animation: 0,
			easing: null,
			setData: function (dataTransfer, dragEl) {
				dataTransfer.setData('Text', dragEl.textContent);
			},
			dropBubble: false,
			dragoverBubble: false,
			dataIdAttr: 'data-id',
			delay: 0,
			delayOnTouchOnly: false,
			touchStartThreshold: parseInt(window.devicePixelRatio, 10) || 1,
			forceFallback: false,
			fallbackClass: 'sortable-fallback',
			fallbackOnBody: false,
			fallbackTolerance: 0,
			fallbackOffset: {x: 0, y: 0},
			supportPointer: Sortable.supportPointer !== false && ('PointerEvent' in window),
			emptyInsertThreshold: 5
		};


		// Set default options
		for (var name in defaults) {
			!(name in options) && (options[name] = defaults[name]);
		}

		_prepareGroup(options);

		// Bind all private methods
		for (var fn in this) {
			if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
				this[fn] = this[fn].bind(this);
			}
		}

		// Setup drag mode
		this.nativeDraggable = options.forceFallback ? false : supportDraggable;

		if (this.nativeDraggable) {
			// Touch start threshold cannot be greater than the native dragstart threshold
			this.options.touchStartThreshold = 1;
		}

		// Bind events
		if (options.supportPointer) {
			_on(el, 'pointerdown', this._onTapStart);
		} else {
			_on(el, 'mousedown', this._onTapStart);
			_on(el, 'touchstart', this._onTapStart);
		}

		if (this.nativeDraggable) {
			_on(el, 'dragover', this);
			_on(el, 'dragenter', this);
		}

		sortables.push(this.el);

		// Restore sorting
		options.store && options.store.get && this.sort(options.store.get(this) || []);
	}

	Sortable.prototype = /** @lends Sortable.prototype */ {
		constructor: Sortable,

		_computeIsAligned: function(evt) {
			var target;

			if (ghostEl && !supportCssPointerEvents) {
				_hideGhostForTarget();
				target = document.elementFromPoint(evt.clientX, evt.clientY);
				_unhideGhostForTarget();
			} else {
				target = evt.target;
			}

			target = _closest(target, this.options.draggable, this.el, false);
			if (_alignedSilent) return;
			if (!dragEl || dragEl.parentNode !== this.el) return;

			var children = this.el.children;
			for (var i = 0; i < children.length; i++) {
				// Don't change for target in case it is changed to aligned before onDragOver is fired
				if (_closest(children[i], this.options.draggable, this.el, false) && children[i] !== target) {
					children[i].sortableMouseAligned = _isClientInRowColumn(evt.clientX, evt.clientY, children[i], this._getDirection(evt, null), this.options);
				}
			}
			// Used for nulling last target when not in element, nothing to do with checking if aligned
			if (!_closest(target, this.options.draggable, this.el, true)) {
				lastTarget = null;
			}

			_alignedSilent = true;
			setTimeout(function() {
				_alignedSilent = false;
			}, 30);

		},

		_getDirection: function(evt, target) {
			return (typeof this.options.direction === 'function') ? this.options.direction.call(this, evt, target, dragEl) : this.options.direction;
		},

		_onTapStart: function (/** Event|TouchEvent */evt) {
			if (!evt.cancelable) return;
			var _this = this,
				el = this.el,
				options = this.options,
				preventOnFilter = options.preventOnFilter,
				type = evt.type,
				touch = evt.touches && evt.touches[0],
				target = (touch || evt).target,
				originalTarget = evt.target.shadowRoot && ((evt.path && evt.path[0]) || (evt.composedPath && evt.composedPath()[0])) || target,
				filter = options.filter,
				startIndex,
				startDraggableIndex;

			_saveInputCheckedState(el);

			// Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.
			if (dragEl) {
				return;
			}

			if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
				return; // only left button and enabled
			}

			// cancel dnd if original target is content editable
			if (originalTarget.isContentEditable) {
				return;
			}

			target = _closest(target, options.draggable, el, false);


			if (lastDownEl === target) {
				// Ignoring duplicate `down`
				return;
			}

			// Get the index of the dragged element within its parent
			startIndex = _index(target);
			startDraggableIndex = _index(target, options.draggable);

			// Check filter
			if (typeof filter === 'function') {
				if (filter.call(this, evt, target, this)) {
					_dispatchEvent(_this, originalTarget, 'filter', target, el, el, startIndex, undefined, startDraggableIndex);
					preventOnFilter && evt.cancelable && evt.preventDefault();
					return; // cancel dnd
				}
			}
			else if (filter) {
				filter = filter.split(',').some(function (criteria) {
					criteria = _closest(originalTarget, criteria.trim(), el, false);

					if (criteria) {
						_dispatchEvent(_this, criteria, 'filter', target, el, el, startIndex, undefined, startDraggableIndex);
						return true;
					}
				});

				if (filter) {
					preventOnFilter && evt.cancelable && evt.preventDefault();
					return; // cancel dnd
				}
			}

			if (options.handle && !_closest(originalTarget, options.handle, el, false)) {
				return;
			}

			// Prepare `dragstart`
			this._prepareDragStart(evt, touch, target, startIndex, startDraggableIndex);
		},


		_handleAutoScroll: function(evt, fallback) {
			if (!dragEl || !this.options.scroll) return;
			var x = evt.clientX,
				y = evt.clientY,

				elem = document.elementFromPoint(x, y),
				_this = this;

			// IE does not seem to have native autoscroll,
			// Edge's autoscroll seems too conditional,
			// MACOS Safari does not have autoscroll,
			// Firefox and Chrome are good
			if (fallback || Edge || IE11OrLess || Safari) {
				_autoScroll(evt, _this.options, elem, fallback);

				// Listener for pointer element change
				var ogElemScroller = _getParentAutoScrollElement(elem, true);
				if (
					scrolling &&
					(
						!pointerElemChangedInterval ||
						x !== lastPointerElemX ||
						y !== lastPointerElemY
					)
				) {

					pointerElemChangedInterval && clearInterval(pointerElemChangedInterval);
					// Detect for pointer elem change, emulating native DnD behaviour
					pointerElemChangedInterval = setInterval(function() {
						if (!dragEl) return;
						// could also check if scroll direction on newElem changes due to parent autoscrolling
						var newElem = _getParentAutoScrollElement(document.elementFromPoint(x, y), true);
						if (newElem !== ogElemScroller) {
							ogElemScroller = newElem;
							_clearAutoScrolls();
							_autoScroll(evt, _this.options, ogElemScroller, fallback);
						}
					}, 10);
					lastPointerElemX = x;
					lastPointerElemY = y;
				}

			} else {
				// if DnD is enabled (and browser has good autoscrolling), first autoscroll will already scroll, so get parent autoscroll of first autoscroll
				if (!_this.options.bubbleScroll || _getParentAutoScrollElement(elem, true) === _getWindowScrollingElement()) {
					_clearAutoScrolls();
					return;
				}
				_autoScroll(evt, _this.options, _getParentAutoScrollElement(elem, false), false);
			}
		},

		_prepareDragStart: function (/** Event */evt, /** Touch */touch, /** HTMLElement */target, /** Number */startIndex, /** Number */startDraggableIndex) {
			var _this = this,
				el = _this.el,
				options = _this.options,
				ownerDocument = el.ownerDocument,
				dragStartFn;

			if (target && !dragEl && (target.parentNode === el)) {
				rootEl = el;
				dragEl = target;
				parentEl = dragEl.parentNode;
				nextEl = dragEl.nextSibling;
				lastDownEl = target;
				activeGroup = options.group;
				oldIndex = startIndex;
				oldDraggableIndex = startDraggableIndex;

				tapEvt = {
					target: dragEl,
					clientX: (touch || evt).clientX,
					clientY: (touch || evt).clientY
				};

				this._lastX = (touch || evt).clientX;
				this._lastY = (touch || evt).clientY;

				dragEl.style['will-change'] = 'all';
				// undo animation if needed
				dragEl.style.transition = '';
				dragEl.style.transform = '';

				dragStartFn = function () {
					// Delayed drag has been triggered
					// we can re-enable the events: touchmove/mousemove
					_this._disableDelayedDragEvents();

					if (!FireFox && _this.nativeDraggable) {
						dragEl.draggable = true;
					}

					// Bind the events: dragstart/dragend
					_this._triggerDragStart(evt, touch);

					// Drag start event
					_dispatchEvent(_this, rootEl, 'choose', dragEl, rootEl, rootEl, oldIndex, undefined, oldDraggableIndex);

					// Chosen item
					_toggleClass(dragEl, options.chosenClass, true);
				};

				// Disable "draggable"
				options.ignore.split(',').forEach(function (criteria) {
					_find(dragEl, criteria.trim(), _disableDraggable);
				});

				_on(ownerDocument, 'dragover', nearestEmptyInsertDetectEvent);
				_on(ownerDocument, 'mousemove', nearestEmptyInsertDetectEvent);
				_on(ownerDocument, 'touchmove', nearestEmptyInsertDetectEvent);

				_on(ownerDocument, 'mouseup', _this._onDrop);
				_on(ownerDocument, 'touchend', _this._onDrop);
				_on(ownerDocument, 'touchcancel', _this._onDrop);

				// Make dragEl draggable (must be before delay for FireFox)
				if (FireFox && this.nativeDraggable) {
					this.options.touchStartThreshold = 4;
					dragEl.draggable = true;
				}

				// Delay is impossible for native DnD in Edge or IE
				if (options.delay && (options.delayOnTouchOnly ? touch : true) && (!this.nativeDraggable || !(Edge || IE11OrLess))) {
					// If the user moves the pointer or let go the click or touch
					// before the delay has been reached:
					// disable the delayed drag
					_on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
					_on(ownerDocument, 'touchend', _this._disableDelayedDrag);
					_on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
					_on(ownerDocument, 'mousemove', _this._delayedDragTouchMoveHandler);
					_on(ownerDocument, 'touchmove', _this._delayedDragTouchMoveHandler);
					options.supportPointer && _on(ownerDocument, 'pointermove', _this._delayedDragTouchMoveHandler);

					_this._dragStartTimer = setTimeout(dragStartFn, options.delay);
				} else {
					dragStartFn();
				}
			}
		},

		_delayedDragTouchMoveHandler: function (/** TouchEvent|PointerEvent **/e) {
			var touch = e.touches ? e.touches[0] : e;
			if (max(abs(touch.clientX - this._lastX), abs(touch.clientY - this._lastY))
					>= Math.floor(this.options.touchStartThreshold / (this.nativeDraggable && window.devicePixelRatio || 1))
			) {
				this._disableDelayedDrag();
			}
		},

		_disableDelayedDrag: function () {
			dragEl && _disableDraggable(dragEl);
			clearTimeout(this._dragStartTimer);

			this._disableDelayedDragEvents();
		},

		_disableDelayedDragEvents: function () {
			var ownerDocument = this.el.ownerDocument;
			_off(ownerDocument, 'mouseup', this._disableDelayedDrag);
			_off(ownerDocument, 'touchend', this._disableDelayedDrag);
			_off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
			_off(ownerDocument, 'mousemove', this._delayedDragTouchMoveHandler);
			_off(ownerDocument, 'touchmove', this._delayedDragTouchMoveHandler);
			_off(ownerDocument, 'pointermove', this._delayedDragTouchMoveHandler);
		},

		_triggerDragStart: function (/** Event */evt, /** Touch */touch) {
			touch = touch || (evt.pointerType == 'touch' ? evt : null);

			if (!this.nativeDraggable || touch) {
				if (this.options.supportPointer) {
					_on(document, 'pointermove', this._onTouchMove);
				} else if (touch) {
					_on(document, 'touchmove', this._onTouchMove);
				} else {
					_on(document, 'mousemove', this._onTouchMove);
				}
			} else {
				_on(dragEl, 'dragend', this);
				_on(rootEl, 'dragstart', this._onDragStart);
			}

			try {
				if (document.selection) {
					// Timeout neccessary for IE9
					_nextTick(function () {
						document.selection.empty();
					});
				} else {
					window.getSelection().removeAllRanges();
				}
			} catch (err) {
			}
		},

		_dragStarted: function (fallback, evt) {
			awaitingDragStarted = false;
			if (rootEl && dragEl) {
				if (this.nativeDraggable) {
					_on(document, 'dragover', this._handleAutoScroll);
					_on(document, 'dragover', _checkAlignment);
				}
				var options = this.options;

				// Apply effect
				!fallback && _toggleClass(dragEl, options.dragClass, false);
				_toggleClass(dragEl, options.ghostClass, true);

				// In case dragging an animated element
				_css(dragEl, 'transform', '');

				Sortable.active = this;

				fallback && this._appendGhost();

				// Drag start event
				_dispatchEvent(this, rootEl, 'start', dragEl, rootEl, rootEl, oldIndex, undefined, oldDraggableIndex, undefined, evt);
			} else {
				this._nulling();
			}
		},

		_emulateDragOver: function (forAutoScroll) {
			if (touchEvt) {
				if (this._lastX === touchEvt.clientX && this._lastY === touchEvt.clientY && !forAutoScroll) {
					return;
				}
				this._lastX = touchEvt.clientX;
				this._lastY = touchEvt.clientY;

				_hideGhostForTarget();

				var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
				var parent = target;

				while (target && target.shadowRoot) {
					target = target.shadowRoot.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
					if (target === parent) break;
					parent = target;
				}

				if (parent) {
					do {
						if (parent[expando]) {
							var inserted;

							inserted = parent[expando]._onDragOver({
								clientX: touchEvt.clientX,
								clientY: touchEvt.clientY,
								target: target,
								rootEl: parent
							});

							if (inserted && !this.options.dragoverBubble) {
								break;
							}
						}

						target = parent; // store last element
					}
					/* jshint boss:true */
					while (parent = parent.parentNode);
				}
				dragEl.parentNode[expando]._computeIsAligned(touchEvt);

				_unhideGhostForTarget();
			}
		},


		_onTouchMove: function (/**TouchEvent*/evt, forAutoScroll) {
			if (tapEvt) {
				var	options = this.options,
					fallbackTolerance = options.fallbackTolerance,
					fallbackOffset = options.fallbackOffset,
					touch = evt.touches ? evt.touches[0] : evt,
					matrix = ghostEl && _matrix(ghostEl),
					scaleX = ghostEl && matrix && matrix.a,
					scaleY = ghostEl && matrix && matrix.d,
					relativeScrollOffset = PositionGhostAbsolutely && ghostRelativeParent && _getRelativeScrollOffset(ghostRelativeParent),
					dx = ((touch.clientX - tapEvt.clientX)
							+ fallbackOffset.x) / (scaleX || 1)
							+ (relativeScrollOffset ? (relativeScrollOffset[0] - ghostRelativeParentInitialScroll[0]) : 0) / (scaleX || 1),
					dy = ((touch.clientY - tapEvt.clientY)
							+ fallbackOffset.y) / (scaleY || 1)
							+ (relativeScrollOffset ? (relativeScrollOffset[1] - ghostRelativeParentInitialScroll[1]) : 0) / (scaleY || 1),
					translate3d = evt.touches ? 'translate3d(' + dx + 'px,' + dy + 'px,0)' : 'translate(' + dx + 'px,' + dy + 'px)';

				// only set the status to dragging, when we are actually dragging
				if (!Sortable.active && !awaitingDragStarted) {
					if (fallbackTolerance &&
						min(abs(touch.clientX - this._lastX), abs(touch.clientY - this._lastY)) < fallbackTolerance
					) {
						return;
					}
					this._onDragStart(evt, true);
				}

				!forAutoScroll && this._handleAutoScroll(touch, true);

				moved = true;
				touchEvt = touch;

				_css(ghostEl, 'webkitTransform', translate3d);
				_css(ghostEl, 'mozTransform', translate3d);
				_css(ghostEl, 'msTransform', translate3d);
				_css(ghostEl, 'transform', translate3d);

				evt.cancelable && evt.preventDefault();
			}
		},

		_appendGhost: function () {
			// Bug if using scale(): https://stackoverflow.com/questions/2637058
			// Not being adjusted for
			if (!ghostEl) {
				var container = this.options.fallbackOnBody ? document.body : rootEl,
					rect = _getRect(dragEl, true, container, !PositionGhostAbsolutely),
					css = _css(dragEl),
					options = this.options;

				// Position absolutely
				if (PositionGhostAbsolutely) {
					// Get relatively positioned parent
					ghostRelativeParent = container;

					while (
						_css(ghostRelativeParent, 'position') === 'static' &&
						_css(ghostRelativeParent, 'transform') === 'none' &&
						ghostRelativeParent !== document
					) {
						ghostRelativeParent = ghostRelativeParent.parentNode;
					}

					if (ghostRelativeParent !== document) {
						var ghostRelativeParentRect = _getRect(ghostRelativeParent, true);

						rect.top -= ghostRelativeParentRect.top;
						rect.left -= ghostRelativeParentRect.left;
					}

					if (ghostRelativeParent !== document.body && ghostRelativeParent !== document.documentElement) {
						if (ghostRelativeParent === document) ghostRelativeParent = _getWindowScrollingElement();

						rect.top += ghostRelativeParent.scrollTop;
						rect.left += ghostRelativeParent.scrollLeft;
					} else {
						ghostRelativeParent = _getWindowScrollingElement();
					}
					ghostRelativeParentInitialScroll = _getRelativeScrollOffset(ghostRelativeParent);
				}


				ghostEl = dragEl.cloneNode(true);

				_toggleClass(ghostEl, options.ghostClass, false);
				_toggleClass(ghostEl, options.fallbackClass, true);
				_toggleClass(ghostEl, options.dragClass, true);

				_css(ghostEl, 'box-sizing', 'border-box');
				_css(ghostEl, 'margin', 0);
				_css(ghostEl, 'top', rect.top);
				_css(ghostEl, 'left', rect.left);
				_css(ghostEl, 'width', rect.width);
				_css(ghostEl, 'height', rect.height);
				_css(ghostEl, 'opacity', '0.8');
				_css(ghostEl, 'position', (PositionGhostAbsolutely ? 'absolute' : 'fixed'));
				_css(ghostEl, 'zIndex', '100000');
				_css(ghostEl, 'pointerEvents', 'none');

				container.appendChild(ghostEl);
			}
		},

		_onDragStart: function (/**Event*/evt, /**boolean*/fallback) {
			var _this = this;
			var dataTransfer = evt.dataTransfer;
			var options = _this.options;

			// Setup clone
			cloneEl = _clone(dragEl);

			cloneEl.draggable = false;
			cloneEl.style['will-change'] = '';

			this._hideClone();

			_toggleClass(cloneEl, _this.options.chosenClass, false);


			// #1143: IFrame support workaround
			_this._cloneId = _nextTick(function () {
				if (!_this.options.removeCloneOnHide) {
					rootEl.insertBefore(cloneEl, dragEl);
				}
				_dispatchEvent(_this, rootEl, 'clone', dragEl);
			});


			!fallback && _toggleClass(dragEl, options.dragClass, true);

			// Set proper drop events
			if (fallback) {
				ignoreNextClick = true;
				_this._loopId = setInterval(_this._emulateDragOver, 50);
			} else {
				// Undo what was set in _prepareDragStart before drag started
				_off(document, 'mouseup', _this._onDrop);
				_off(document, 'touchend', _this._onDrop);
				_off(document, 'touchcancel', _this._onDrop);

				if (dataTransfer) {
					dataTransfer.effectAllowed = 'move';
					options.setData && options.setData.call(_this, dataTransfer, dragEl);
				}

				_on(document, 'drop', _this);

				// #1276 fix:
				_css(dragEl, 'transform', 'translateZ(0)');
			}

			awaitingDragStarted = true;

			_this._dragStartId = _nextTick(_this._dragStarted.bind(_this, fallback, evt));
			_on(document, 'selectstart', _this);
			if (Safari) {
				_css(document.body, 'user-select', 'none');
			}
		},


		// Returns true - if no further action is needed (either inserted or another condition)
		_onDragOver: function (/**Event*/evt) {
			var el = this.el,
				target = evt.target,
				dragRect,
				targetRect,
				revert,
				options = this.options,
				group = options.group,
				activeSortable = Sortable.active,
				isOwner = (activeGroup === group),
				canSort = options.sort,
				_this = this;

			if (_silent) return;

			// Return invocation when dragEl is inserted (or completed)
			function completed(insertion) {
				if (insertion) {
					if (isOwner) {
						activeSortable._hideClone();
					} else {
						activeSortable._showClone(_this);
					}

					if (activeSortable) {
						// Set ghost class to new sortable's ghost class
						_toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : activeSortable.options.ghostClass, false);
						_toggleClass(dragEl, options.ghostClass, true);
					}

					if (putSortable !== _this && _this !== Sortable.active) {
						putSortable = _this;
					} else if (_this === Sortable.active) {
						putSortable = null;
					}

					// Animation
					dragRect && _this._animate(dragRect, dragEl);
					target && targetRect && _this._animate(targetRect, target);
				}


				// Null lastTarget if it is not inside a previously swapped element
				if ((target === dragEl && !dragEl.animated) || (target === el && !target.animated)) {
					lastTarget = null;
				}

				// no bubbling and not fallback
				if (!options.dragoverBubble && !evt.rootEl && target !== document) {
					_this._handleAutoScroll(evt);
					dragEl.parentNode[expando]._computeIsAligned(evt);

					// Do not detect for empty insert if already inserted
					!insertion && nearestEmptyInsertDetectEvent(evt);
				}

				!options.dragoverBubble && evt.stopPropagation && evt.stopPropagation();

				return true;
			}

			// Call when dragEl has been inserted
			function changed() {
				_dispatchEvent(_this, rootEl, 'change', target, el, rootEl, oldIndex, _index(dragEl), oldDraggableIndex, _index(dragEl, options.draggable), evt);
			}


			if (evt.preventDefault !== void 0) {
				evt.cancelable && evt.preventDefault();
			}


			moved = true;

			target = _closest(target, options.draggable, el, true);

			// target is dragEl or target is animated
			if (dragEl.contains(evt.target) || target.animated) {
				return completed(false);
			}

			if (target !== dragEl) {
				ignoreNextClick = false;
			}

			if (activeSortable && !options.disabled &&
				(isOwner
					? canSort || (revert = !rootEl.contains(dragEl)) // Reverting item into the original list
					: (
						putSortable === this ||
						(
							(this.lastPutMode = activeGroup.checkPull(this, activeSortable, dragEl, evt)) &&
							group.checkPut(this, activeSortable, dragEl, evt)
						)
					)
				)
			) {
				var axis = this._getDirection(evt, target);

				dragRect = _getRect(dragEl);

				if (revert) {
					this._hideClone();
					parentEl = rootEl; // actualization

					if (nextEl) {
						rootEl.insertBefore(dragEl, nextEl);
					} else {
						rootEl.appendChild(dragEl);
					}

					return completed(true);
				}

				var elLastChild = _lastChild(el);

				if (!elLastChild || _ghostIsLast(evt, axis, el) && !elLastChild.animated) {
					// assign target only if condition is true
					if (elLastChild && el === evt.target) {
						target = elLastChild;
					}

					if (target) {
						targetRect = _getRect(target);
					}

					if (isOwner) {
						activeSortable._hideClone();
					} else {
						activeSortable._showClone(this);
					}

					if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, !!target) !== false) {
						el.appendChild(dragEl);
						parentEl = el; // actualization
						realDragElRect = null;

						changed();
						return completed(true);
					}
				}
				else if (target && target !== dragEl && target.parentNode === el) {
					var direction = 0,
						targetBeforeFirstSwap,
						aligned = target.sortableMouseAligned,
						differentLevel = dragEl.parentNode !== el,
						side1 = axis === 'vertical' ? 'top' : 'left',
						scrolledPastTop = _isScrolledPast(target, 'top') || _isScrolledPast(dragEl, 'top'),
						scrollBefore = scrolledPastTop ? scrolledPastTop.scrollTop : void 0;


					if (lastTarget !== target) {
						lastMode = null;
						targetBeforeFirstSwap = _getRect(target)[side1];
						pastFirstInvertThresh = false;
					}

					// Reference: https://www.lucidchart.com/documents/view/10fa0e93-e362-4126-aca2-b709ee56bd8b/0
					if (
						_isElInRowColumn(dragEl, target, axis) && aligned ||
						differentLevel ||
						scrolledPastTop ||
						options.invertSwap ||
						lastMode === 'insert' ||
						// Needed, in the case that we are inside target and inserted because not aligned... aligned will stay false while inside
						// and lastMode will change to 'insert', but we must swap
						lastMode === 'swap'
					) {
						// New target that we will be inside
						if (lastMode !== 'swap') {
							isCircumstantialInvert = options.invertSwap || differentLevel;
						}

						direction = _getSwapDirection(evt, target, axis,
							options.swapThreshold, options.invertedSwapThreshold == null ? options.swapThreshold : options.invertedSwapThreshold,
							isCircumstantialInvert,
							lastTarget === target);
						lastMode = 'swap';
					} else {
						// Insert at position
						direction = _getInsertDirection(target);
						lastMode = 'insert';
					}
					if (direction === 0) return completed(false);

					realDragElRect = null;
					lastTarget = target;

					lastDirection = direction;

					targetRect = _getRect(target);

					var nextSibling = target.nextElementSibling,
						after = false;

					after = direction === 1;

					var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

					if (moveVector !== false) {
						if (moveVector === 1 || moveVector === -1) {
							after = (moveVector === 1);
						}

						_silent = true;
						setTimeout(_unsilent, 30);

						if (isOwner) {
							activeSortable._hideClone();
						} else {
							activeSortable._showClone(this);
						}

						if (after && !nextSibling) {
							el.appendChild(dragEl);
						} else {
							target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
						}

						// Undo chrome's scroll adjustment
						if (scrolledPastTop) {
							_scrollBy(scrolledPastTop, 0, scrollBefore - scrolledPastTop.scrollTop);
						}

						parentEl = dragEl.parentNode; // actualization

						// must be done before animation
						if (targetBeforeFirstSwap !== undefined && !isCircumstantialInvert) {
							targetMoveDistance = abs(targetBeforeFirstSwap - _getRect(target)[side1]);
						}
						changed();

						return completed(true);
					}
				}

				if (el.contains(dragEl)) {
					return completed(false);
				}
			}

			return false;
		},

		_animate: function (prevRect, target) {
			var ms = this.options.animation;

			if (ms) {
				var currentRect = _getRect(target);

				if (target === dragEl) {
					realDragElRect = currentRect;
				}

				if (prevRect.nodeType === 1) {
					prevRect = _getRect(prevRect);
				}

				// Check if actually moving position
				if ((prevRect.left + prevRect.width / 2) !== (currentRect.left + currentRect.width / 2)
					|| (prevRect.top + prevRect.height / 2) !== (currentRect.top + currentRect.height / 2)
				) {
					var matrix = _matrix(this.el),
						scaleX = matrix && matrix.a,
						scaleY = matrix && matrix.d;

					_css(target, 'transition', 'none');
					_css(target, 'transform', 'translate3d('
						+ (prevRect.left - currentRect.left) / (scaleX ? scaleX : 1) + 'px,'
						+ (prevRect.top - currentRect.top) / (scaleY ? scaleY : 1) + 'px,0)'
					);

					this._repaint(target);
					_css(target, 'transition', 'transform ' + ms + 'ms' + (this.options.easing ? ' ' + this.options.easing : ''));
					_css(target, 'transform', 'translate3d(0,0,0)');
				}

				(typeof target.animated === 'number') && clearTimeout(target.animated);
				target.animated = setTimeout(function () {
					_css(target, 'transition', '');
					_css(target, 'transform', '');
					target.animated = false;
				}, ms);
			}
		},

		_repaint: function(target) {
			return target.offsetWidth;
		},

		_offMoveEvents: function() {
			_off(document, 'touchmove', this._onTouchMove);
			_off(document, 'pointermove', this._onTouchMove);
			_off(document, 'dragover', nearestEmptyInsertDetectEvent);
			_off(document, 'mousemove', nearestEmptyInsertDetectEvent);
			_off(document, 'touchmove', nearestEmptyInsertDetectEvent);
		},

		_offUpEvents: function () {
			var ownerDocument = this.el.ownerDocument;

			_off(ownerDocument, 'mouseup', this._onDrop);
			_off(ownerDocument, 'touchend', this._onDrop);
			_off(ownerDocument, 'pointerup', this._onDrop);
			_off(ownerDocument, 'touchcancel', this._onDrop);
			_off(document, 'selectstart', this);
		},

		_onDrop: function (/**Event*/evt) {
			var el = this.el,
				options = this.options;
			awaitingDragStarted = false;
			scrolling = false;
			isCircumstantialInvert = false;
			pastFirstInvertThresh = false;

			clearInterval(this._loopId);

			clearInterval(pointerElemChangedInterval);
			_clearAutoScrolls();
			_cancelThrottle();

			clearTimeout(this._dragStartTimer);

			_cancelNextTick(this._cloneId);
			_cancelNextTick(this._dragStartId);

			// Unbind events
			_off(document, 'mousemove', this._onTouchMove);


			if (this.nativeDraggable) {
				_off(document, 'drop', this);
				_off(el, 'dragstart', this._onDragStart);
				_off(document, 'dragover', this._handleAutoScroll);
				_off(document, 'dragover', _checkAlignment);
			}

			if (Safari) {
				_css(document.body, 'user-select', '');
			}

			this._offMoveEvents();
			this._offUpEvents();

			if (evt) {
				if (moved) {
					evt.cancelable && evt.preventDefault();
					!options.dropBubble && evt.stopPropagation();
				}

				ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

				if (rootEl === parentEl || (putSortable && putSortable.lastPutMode !== 'clone')) {
					// Remove clone
					cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
				}

				if (dragEl) {
					if (this.nativeDraggable) {
						_off(dragEl, 'dragend', this);
					}

					_disableDraggable(dragEl);
					dragEl.style['will-change'] = '';

					// Remove class's
					_toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : this.options.ghostClass, false);
					_toggleClass(dragEl, this.options.chosenClass, false);

					// Drag stop event
					_dispatchEvent(this, rootEl, 'unchoose', dragEl, parentEl, rootEl, oldIndex, null, oldDraggableIndex, null, evt);

					if (rootEl !== parentEl) {
						newIndex = _index(dragEl);
						newDraggableIndex = _index(dragEl, options.draggable);

						if (newIndex >= 0) {
							// Add event
							_dispatchEvent(null, parentEl, 'add', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);

							// Remove event
							_dispatchEvent(this, rootEl, 'remove', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);

							// drag from one list and drop into another
							_dispatchEvent(null, parentEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
							_dispatchEvent(this, rootEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
						}

						putSortable && putSortable.save();
					}
					else {
						if (dragEl.nextSibling !== nextEl) {
							// Get the index of the dragged element within its parent
							newIndex = _index(dragEl);
							newDraggableIndex = _index(dragEl, options.draggable);

							if (newIndex >= 0) {
								// drag & drop within the same list
								_dispatchEvent(this, rootEl, 'update', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
								_dispatchEvent(this, rootEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
							}
						}
					}

					if (Sortable.active) {
						/* jshint eqnull:true */
						if (newIndex == null || newIndex === -1) {
							newIndex = oldIndex;
							newDraggableIndex = oldDraggableIndex;
						}
						_dispatchEvent(this, rootEl, 'end', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);

						// Save sorting
						this.save();
					}
				}

			}
			this._nulling();
		},

		_nulling: function() {
			rootEl =
			dragEl =
			parentEl =
			ghostEl =
			nextEl =
			cloneEl =
			lastDownEl =

			scrollEl =
			scrollParentEl =
			autoScrolls.length =

			pointerElemChangedInterval =
			lastPointerElemX =
			lastPointerElemY =

			tapEvt =
			touchEvt =

			moved =
			newIndex =
			oldIndex =

			lastTarget =
			lastDirection =

			realDragElRect =

			putSortable =
			activeGroup =
			Sortable.active = null;

			savedInputChecked.forEach(function (el) {
				el.checked = true;
			});

			savedInputChecked.length = 0;
		},

		handleEvent: function (/**Event*/evt) {
			switch (evt.type) {
				case 'drop':
				case 'dragend':
					this._onDrop(evt);
					break;

				case 'dragenter':
				case 'dragover':
					if (dragEl) {
						this._onDragOver(evt);
						_globalDragOver(evt);
					}
					break;

				case 'selectstart':
					evt.preventDefault();
					break;
			}
		},


		/**
		 * Serializes the item into an array of string.
		 * @returns {String[]}
		 */
		toArray: function () {
			var order = [],
				el,
				children = this.el.children,
				i = 0,
				n = children.length,
				options = this.options;

			for (; i < n; i++) {
				el = children[i];
				if (_closest(el, options.draggable, this.el, false)) {
					order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
				}
			}

			return order;
		},


		/**
		 * Sorts the elements according to the array.
		 * @param  {String[]}  order  order of the items
		 */
		sort: function (order) {
			var items = {}, rootEl = this.el;

			this.toArray().forEach(function (id, i) {
				var el = rootEl.children[i];

				if (_closest(el, this.options.draggable, rootEl, false)) {
					items[id] = el;
				}
			}, this);

			order.forEach(function (id) {
				if (items[id]) {
					rootEl.removeChild(items[id]);
					rootEl.appendChild(items[id]);
				}
			});
		},


		/**
		 * Save the current sorting
		 */
		save: function () {
			var store = this.options.store;
			store && store.set && store.set(this);
		},


		/**
		 * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
		 * @param   {HTMLElement}  el
		 * @param   {String}       [selector]  default: `options.draggable`
		 * @returns {HTMLElement|null}
		 */
		closest: function (el, selector) {
			return _closest(el, selector || this.options.draggable, this.el, false);
		},


		/**
		 * Set/get option
		 * @param   {string} name
		 * @param   {*}      [value]
		 * @returns {*}
		 */
		option: function (name, value) {
			var options = this.options;

			if (value === void 0) {
				return options[name];
			} else {
				options[name] = value;

				if (name === 'group') {
					_prepareGroup(options);
				}
			}
		},


		/**
		 * Destroy
		 */
		destroy: function () {
			var el = this.el;

			el[expando] = null;

			_off(el, 'mousedown', this._onTapStart);
			_off(el, 'touchstart', this._onTapStart);
			_off(el, 'pointerdown', this._onTapStart);

			if (this.nativeDraggable) {
				_off(el, 'dragover', this);
				_off(el, 'dragenter', this);
			}
			// Remove draggable attributes
			Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
				el.removeAttribute('draggable');
			});

			this._onDrop();

			sortables.splice(sortables.indexOf(this.el), 1);

			this.el = el = null;
		},

		_hideClone: function() {
			if (!cloneEl.cloneHidden) {
				_css(cloneEl, 'display', 'none');
				cloneEl.cloneHidden = true;
				if (cloneEl.parentNode && this.options.removeCloneOnHide) {
					cloneEl.parentNode.removeChild(cloneEl);
				}
			}
		},

		_showClone: function(putSortable) {
			if (putSortable.lastPutMode !== 'clone') {
				this._hideClone();
				return;
			}

			if (cloneEl.cloneHidden) {
				// show clone at dragEl or original position
				if (rootEl.contains(dragEl) && !this.options.group.revertClone) {
					rootEl.insertBefore(cloneEl, dragEl);
				} else if (nextEl) {
					rootEl.insertBefore(cloneEl, nextEl);
				} else {
					rootEl.appendChild(cloneEl);
				}

				if (this.options.group.revertClone) {
					this._animate(dragEl, cloneEl);
				}
				_css(cloneEl, 'display', '');
				cloneEl.cloneHidden = false;
			}
		}
	};

	function _closest(/**HTMLElement*/el, /**String*/selector, /**HTMLElement*/ctx, includeCTX) {
		if (el) {
			ctx = ctx || document;

			do {
				if (
					selector != null &&
					(
						selector[0] === '>' ?
						el.parentNode === ctx && _matches(el, selector) :
						_matches(el, selector)
					) ||
					includeCTX && el === ctx
				) {
					return el;
				}

				if (el === ctx) break;
				/* jshint boss:true */
			} while (el = _getParentOrHost(el));
		}

		return null;
	}


	function _getParentOrHost(el) {
		return (el.host && el !== document && el.host.nodeType)
			? el.host
			: el.parentNode;
	}


	function _globalDragOver(/**Event*/evt) {
		if (evt.dataTransfer) {
			evt.dataTransfer.dropEffect = 'move';
		}
		evt.cancelable && evt.preventDefault();
	}


	function _on(el, event, fn) {
		el.addEventListener(event, fn, IE11OrLess ? false : captureMode);
	}


	function _off(el, event, fn) {
		el.removeEventListener(event, fn, IE11OrLess ? false : captureMode);
	}


	function _toggleClass(el, name, state) {
		if (el && name) {
			if (el.classList) {
				el.classList[state ? 'add' : 'remove'](name);
			}
			else {
				var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
				el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
			}
		}
	}


	function _css(el, prop, val) {
		var style = el && el.style;

		if (style) {
			if (val === void 0) {
				if (document.defaultView && document.defaultView.getComputedStyle) {
					val = document.defaultView.getComputedStyle(el, '');
				}
				else if (el.currentStyle) {
					val = el.currentStyle;
				}

				return prop === void 0 ? val : val[prop];
			}
			else {
				if (!(prop in style) && prop.indexOf('webkit') === -1) {
					prop = '-webkit-' + prop;
				}

				style[prop] = val + (typeof val === 'string' ? '' : 'px');
			}
		}
	}

	function _matrix(el) {
		var appliedTransforms = '';
		do {
			var transform = _css(el, 'transform');

			if (transform && transform !== 'none') {
				appliedTransforms = transform + ' ' + appliedTransforms;
			}
			/* jshint boss:true */
		} while (el = el.parentNode);

		if (window.DOMMatrix) {
			return new DOMMatrix(appliedTransforms);
		} else if (window.WebKitCSSMatrix) {
			return new WebKitCSSMatrix(appliedTransforms);
		} else if (window.CSSMatrix) {
			return new CSSMatrix(appliedTransforms);
		}
	}


	function _find(ctx, tagName, iterator) {
		if (ctx) {
			var list = ctx.getElementsByTagName(tagName), i = 0, n = list.length;

			if (iterator) {
				for (; i < n; i++) {
					iterator(list[i], i);
				}
			}

			return list;
		}

		return [];
	}



	function _dispatchEvent(
		sortable, rootEl, name,
		targetEl, toEl, fromEl,
		startIndex, newIndex,
		startDraggableIndex, newDraggableIndex,
		originalEvt
	) {
		sortable = (sortable || rootEl[expando]);
		var evt,
			options = sortable.options,
			onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1);
		// Support for new CustomEvent feature
		if (window.CustomEvent && !IE11OrLess && !Edge) {
			evt = new CustomEvent(name, {
				bubbles: true,
				cancelable: true
			});
		} else {
			evt = document.createEvent('Event');
			evt.initEvent(name, true, true);
		}

		evt.to = toEl || rootEl;
		evt.from = fromEl || rootEl;
		evt.item = targetEl || rootEl;
		evt.clone = cloneEl;

		evt.oldIndex = startIndex;
		evt.newIndex = newIndex;

		evt.oldDraggableIndex = startDraggableIndex;
		evt.newDraggableIndex = newDraggableIndex;

		evt.originalEvent = originalEvt;
		evt.pullMode = putSortable ? putSortable.lastPutMode : undefined;

		if (rootEl) {
			rootEl.dispatchEvent(evt);
		}

		if (options[onName]) {
			options[onName].call(sortable, evt);
		}
	}


	function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvt, willInsertAfter) {
		var evt,
			sortable = fromEl[expando],
			onMoveFn = sortable.options.onMove,
			retVal;
		// Support for new CustomEvent feature
		if (window.CustomEvent && !IE11OrLess && !Edge) {
			evt = new CustomEvent('move', {
				bubbles: true,
				cancelable: true
			});
		} else {
			evt = document.createEvent('Event');
			evt.initEvent('move', true, true);
		}

		evt.to = toEl;
		evt.from = fromEl;
		evt.dragged = dragEl;
		evt.draggedRect = dragRect;
		evt.related = targetEl || toEl;
		evt.relatedRect = targetRect || _getRect(toEl);
		evt.willInsertAfter = willInsertAfter;

		evt.originalEvent = originalEvt;

		fromEl.dispatchEvent(evt);

		if (onMoveFn) {
			retVal = onMoveFn.call(sortable, evt, originalEvt);
		}

		return retVal;
	}

	function _disableDraggable(el) {
		el.draggable = false;
	}

	function _unsilent() {
		_silent = false;
	}

	/**
	 * Gets nth child of el, ignoring hidden children, sortable's elements (does not ignore clone if it's visible)
	 * and non-draggable elements
	 * @param  {HTMLElement} el       The parent element
	 * @param  {Number} childNum      The index of the child
	 * @param  {Object} options       Parent Sortable's options
	 * @return {HTMLElement}          The child at index childNum, or null if not found
	 */
	function _getChild(el, childNum, options) {
		var currentChild = 0,
			i = 0,
			children = el.children;

		while (i < children.length) {
			if (
				children[i].style.display !== 'none' &&
				children[i] !== ghostEl &&
				children[i] !== dragEl &&
				_closest(children[i], options.draggable, el, false)
			) {
				if (currentChild === childNum) {
					return children[i];
				}
				currentChild++;
			}

			i++;
		}
		return null;
	}

	/**
	 * Gets the last child in the el, ignoring ghostEl or invisible elements (clones)
	 * @param  {HTMLElement} el       Parent element
	 * @return {HTMLElement}          The last child, ignoring ghostEl
	 */
	function _lastChild(el) {
		var last = el.lastElementChild;

		while (last && (last === ghostEl || _css(last, 'display') === 'none')) {
			last = last.previousElementSibling;
		}

		return last || null;
	}

	function _ghostIsLast(evt, axis, el) {
		var elRect = _getRect(_lastChild(el)),
			mouseOnAxis = axis === 'vertical' ? evt.clientY : evt.clientX,
			mouseOnOppAxis = axis === 'vertical' ? evt.clientX : evt.clientY,
			targetS2 = axis === 'vertical' ? elRect.bottom : elRect.right,
			targetS1Opp = axis === 'vertical' ? elRect.left : elRect.top,
			targetS2Opp = axis === 'vertical' ? elRect.right : elRect.bottom,
			spacer = 10;

		return (
			axis === 'vertical' ?
				(mouseOnOppAxis > targetS2Opp + spacer || mouseOnOppAxis <= targetS2Opp && mouseOnAxis > targetS2 && mouseOnOppAxis >= targetS1Opp) :
				(mouseOnAxis > targetS2 && mouseOnOppAxis > targetS1Opp || mouseOnAxis <= targetS2 && mouseOnOppAxis > targetS2Opp + spacer)
		);
	}

	function _getSwapDirection(evt, target, axis, swapThreshold, invertedSwapThreshold, invertSwap, isLastTarget) {
		var targetRect = _getRect(target),
			mouseOnAxis = axis === 'vertical' ? evt.clientY : evt.clientX,
			targetLength = axis === 'vertical' ? targetRect.height : targetRect.width,
			targetS1 = axis === 'vertical' ? targetRect.top : targetRect.left,
			targetS2 = axis === 'vertical' ? targetRect.bottom : targetRect.right,
			dragRect = _getRect(dragEl),
			invert = false;


		if (!invertSwap) {
			// Never invert or create dragEl shadow when target movemenet causes mouse to move past the end of regular swapThreshold
			if (isLastTarget && targetMoveDistance < targetLength * swapThreshold) { // multiplied only by swapThreshold because mouse will already be inside target by (1 - threshold) * targetLength / 2
				// check if past first invert threshold on side opposite of lastDirection
				if (!pastFirstInvertThresh &&
					(lastDirection === 1 ?
						(
							mouseOnAxis > targetS1 + targetLength * invertedSwapThreshold / 2
						) :
						(
							mouseOnAxis < targetS2 - targetLength * invertedSwapThreshold / 2
						)
					)
				)
				{
					// past first invert threshold, do not restrict inverted threshold to dragEl shadow
					pastFirstInvertThresh = true;
				}

				if (!pastFirstInvertThresh) {
					var dragS1 = axis === 'vertical' ? dragRect.top : dragRect.left,
						dragS2 = axis === 'vertical' ? dragRect.bottom : dragRect.right;
					// dragEl shadow (target move distance shadow)
					if (
						lastDirection === 1 ?
						(
							mouseOnAxis < targetS1 + targetMoveDistance // over dragEl shadow
						) :
						(
							mouseOnAxis > targetS2 - targetMoveDistance
						)
					)
					{
						return lastDirection * -1;
					}
				} else {
					invert = true;
				}
			} else {
				// Regular
				if (
					mouseOnAxis > targetS1 + (targetLength * (1 - swapThreshold) / 2) &&
					mouseOnAxis < targetS2 - (targetLength * (1 - swapThreshold) / 2)
				) {
					return _getInsertDirection(target);
				}
			}
		}

		invert = invert || invertSwap;

		if (invert) {
			// Invert of regular
			if (
				mouseOnAxis < targetS1 + (targetLength * invertedSwapThreshold / 2) ||
				mouseOnAxis > targetS2 - (targetLength * invertedSwapThreshold / 2)
			)
			{
				return ((mouseOnAxis > targetS1 + targetLength / 2) ? 1 : -1);
			}
		}

		return 0;
	}

	/**
	 * Gets the direction dragEl must be swapped relative to target in order to make it
	 * seem that dragEl has been "inserted" into that element's position
	 * @param  {HTMLElement} target       The target whose position dragEl is being inserted at
	 * @return {Number}                   Direction dragEl must be swapped
	 */
	function _getInsertDirection(target) {
		var dragElIndex = _index(dragEl),
			targetIndex = _index(target);

		if (dragElIndex < targetIndex) {
			return 1;
		} else {
			return -1;
		}
	}


	/**
	 * Generate id
	 * @param   {HTMLElement} el
	 * @returns {String}
	 * @private
	 */
	function _generateId(el) {
		var str = el.tagName + el.className + el.src + el.href + el.textContent,
			i = str.length,
			sum = 0;

		while (i--) {
			sum += str.charCodeAt(i);
		}

		return sum.toString(36);
	}

	/**
	 * Returns the index of an element within its parent for a selected set of
	 * elements
	 * @param  {HTMLElement} el
	 * @param  {selector} selector
	 * @return {number}
	 */
	function _index(el, selector) {
		var index = 0;

		if (!el || !el.parentNode) {
			return -1;
		}

		while (el && (el = el.previousElementSibling)) {
			if ((el.nodeName.toUpperCase() !== 'TEMPLATE') && el !== cloneEl && (!selector || _matches(el, selector))) {
				index++;
			}
		}

		return index;
	}

	function _matches(/**HTMLElement*/el, /**String*/selector) {
		if (!selector) return;

		selector[0] === '>' && (selector = selector.substring(1));

		if (el) {
			try {
				if (el.matches) {
					return el.matches(selector);
				} else if (el.msMatchesSelector) {
					return el.msMatchesSelector(selector);
				} else if (el.webkitMatchesSelector) {
					return el.webkitMatchesSelector(selector);
				}
			} catch(_) {
				return false;
			}
		}

		return false;
	}

	var _throttleTimeout;
	function _throttle(callback, ms) {
		return function () {
			if (!_throttleTimeout) {
				var args = arguments,
					_this = this;

				_throttleTimeout = setTimeout(function () {
					if (args.length === 1) {
						callback.call(_this, args[0]);
					} else {
						callback.apply(_this, args);
					}

					_throttleTimeout = void 0;
				}, ms);
			}
		};
	}

	function _cancelThrottle() {
		clearTimeout(_throttleTimeout);
		_throttleTimeout = void 0;
	}

	function _extend(dst, src) {
		if (dst && src) {
			for (var key in src) {
				if (src.hasOwnProperty(key)) {
					dst[key] = src[key];
				}
			}
		}

		return dst;
	}

	function _clone(el) {
		if (Polymer && Polymer.dom) {
			return Polymer.dom(el).cloneNode(true);
		}
		else if ($) {
			return $(el).clone(true)[0];
		}
		else {
			return el.cloneNode(true);
		}
	}

	function _saveInputCheckedState(root) {
		savedInputChecked.length = 0;

		var inputs = root.getElementsByTagName('input');
		var idx = inputs.length;

		while (idx--) {
			var el = inputs[idx];
			el.checked && savedInputChecked.push(el);
		}
	}

	function _nextTick(fn) {
		return setTimeout(fn, 0);
	}

	function _cancelNextTick(id) {
		return clearTimeout(id);
	}


	/**
	 * Returns the "bounding client rect" of given element
	 * @param  {HTMLElement} el                The element whose boundingClientRect is wanted
	 * @param  {[HTMLElement]} container       the parent the element will be placed in
	 * @param  {[Boolean]} adjustForTransform  Whether the rect should compensate for parent's transform
	 * @return {Object}                        The boundingClientRect of el
	 */
	function _getRect(el, adjustForTransform, container, adjustForFixed) {
		if (!el.getBoundingClientRect && el !== win) return;

		var elRect,
			top,
			left,
			bottom,
			right,
			height,
			width;

		if (el !== win && el !== _getWindowScrollingElement()) {
			elRect = el.getBoundingClientRect();
			top = elRect.top;
			left = elRect.left;
			bottom = elRect.bottom;
			right = elRect.right;
			height = elRect.height;
			width = elRect.width;
		} else {
			top = 0;
			left = 0;
			bottom = window.innerHeight;
			right = window.innerWidth;
			height = window.innerHeight;
			width = window.innerWidth;
		}

		if (adjustForFixed && el !== win) {
			// Adjust for translate()
			container = container || el.parentNode;

			// solves #1123 (see: https://stackoverflow.com/a/37953806/6088312)
			// Not needed on <= IE11
			if (!IE11OrLess) {
				do {
					if (container && container.getBoundingClientRect && _css(container, 'transform') !== 'none') {
						var containerRect = container.getBoundingClientRect();

						// Set relative to edges of padding box of container
						top -= containerRect.top + parseInt(_css(container, 'border-top-width'));
						left -= containerRect.left + parseInt(_css(container, 'border-left-width'));
						bottom = top + elRect.height;
						right = left + elRect.width;

						break;
					}
					/* jshint boss:true */
				} while (container = container.parentNode);
			}
		}

		if (adjustForTransform && el !== win) {
			// Adjust for scale()
			var matrix = _matrix(container || el),
				scaleX = matrix && matrix.a,
				scaleY = matrix && matrix.d;

			if (matrix) {
				top /= scaleY;
				left /= scaleX;

				width /= scaleX;
				height /= scaleY;

				bottom = top + height;
				right = left + width;
			}
		}

		return {
			top: top,
			left: left,
			bottom: bottom,
			right: right,
			width: width,
			height: height
		};
	}


	/**
	 * Checks if a side of an element is scrolled past a side of it's parents
	 * @param  {HTMLElement}  el       The element who's side being scrolled out of view is in question
	 * @param  {String}       side     Side of the element in question ('top', 'left', 'right', 'bottom')
	 * @return {HTMLElement}           The parent scroll element that the el's side is scrolled past, or null if there is no such element
	 */
	function _isScrolledPast(el, side) {
		var parent = _getParentAutoScrollElement(el, true),
			elSide = _getRect(el)[side];

		/* jshint boss:true */
		while (parent) {
			var parentSide = _getRect(parent)[side],
				visible;

			if (side === 'top' || side === 'left') {
				visible = elSide >= parentSide;
			} else {
				visible = elSide <= parentSide;
			}

			if (!visible) return parent;

			if (parent === _getWindowScrollingElement()) break;

			parent = _getParentAutoScrollElement(parent, false);
		}

		return false;
	}

	/**
	 * Returns the scroll offset of the given element, added with all the scroll offsets of parent elements.
	 * The value is returned in real pixels.
	 * @param  {HTMLElement} el
	 * @return {Array}             Offsets in the format of [left, top]
	 */
	function _getRelativeScrollOffset(el) {
		var offsetLeft = 0,
			offsetTop = 0,
			winScroller = _getWindowScrollingElement();

		if (el) {
			do {
				var matrix = _matrix(el),
					scaleX = matrix.a,
					scaleY = matrix.d;

				offsetLeft += el.scrollLeft * scaleX;
				offsetTop += el.scrollTop * scaleY;
			} while (el !== winScroller && (el = el.parentNode));
		}

		return [offsetLeft, offsetTop];
	}

	// Fixed #973:
	_on(document, 'touchmove', function(evt) {
		if ((Sortable.active || awaitingDragStarted) && evt.cancelable) {
			evt.preventDefault();
		}
	});


	// Export utils
	Sortable.utils = {
		on: _on,
		off: _off,
		css: _css,
		find: _find,
		is: function (el, selector) {
			return !!_closest(el, selector, el, false);
		},
		extend: _extend,
		throttle: _throttle,
		closest: _closest,
		toggleClass: _toggleClass,
		clone: _clone,
		index: _index,
		nextTick: _nextTick,
		cancelNextTick: _cancelNextTick,
		detectDirection: _detectDirection,
		getChild: _getChild
	};


	/**
	 * Create sortable instance
	 * @param {HTMLElement}  el
	 * @param {Object}      [options]
	 */
	Sortable.create = function (el, options) {
		return new Sortable(el, options);
	};


	// Export
	Sortable.version = '1.9.0';
	return Sortable;
});

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js":
/*!************************************************************************************!*\
  !*** ./vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (e, t) {
  var n = t();
   true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_FACTORY__ = (n.Routing),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function () {
  "use strict";

  function e(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
  }

  var t = Object.assign || function (e) {
    for (var t = 1; t < arguments.length; t++) {
      var n = arguments[t];

      for (var o in n) {
        Object.prototype.hasOwnProperty.call(n, o) && (e[o] = n[o]);
      }
    }

    return e;
  },
      n = "function" == typeof Symbol && "symbol" == _typeof(Symbol.iterator) ? function (e) {
    return _typeof(e);
  } : function (e) {
    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : _typeof(e);
  },
      o = function () {
    function e(e, t) {
      for (var n = 0; n < t.length; n++) {
        var o = t[n];
        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o);
      }
    }

    return function (t, n, o) {
      return n && e(t.prototype, n), o && e(t, o), t;
    };
  }(),
      i = function () {
    function i(t, n) {
      e(this, i), this.context_ = t || {
        base_url: "",
        prefix: "",
        host: "",
        port: "",
        scheme: "",
        locale: ""
      }, this.setRoutes(n || {});
    }

    return o(i, [{
      key: "setRoutingData",
      value: function value(e) {
        this.setBaseUrl(e.base_url), this.setRoutes(e.routes), "prefix" in e && this.setPrefix(e.prefix), "port" in e && this.setPort(e.port), "locale" in e && this.setLocale(e.locale), this.setHost(e.host), this.setScheme(e.scheme);
      }
    }, {
      key: "setRoutes",
      value: function value(e) {
        this.routes_ = Object.freeze(e);
      }
    }, {
      key: "getRoutes",
      value: function value() {
        return this.routes_;
      }
    }, {
      key: "setBaseUrl",
      value: function value(e) {
        this.context_.base_url = e;
      }
    }, {
      key: "getBaseUrl",
      value: function value() {
        return this.context_.base_url;
      }
    }, {
      key: "setPrefix",
      value: function value(e) {
        this.context_.prefix = e;
      }
    }, {
      key: "setScheme",
      value: function value(e) {
        this.context_.scheme = e;
      }
    }, {
      key: "getScheme",
      value: function value() {
        return this.context_.scheme;
      }
    }, {
      key: "setHost",
      value: function value(e) {
        this.context_.host = e;
      }
    }, {
      key: "getHost",
      value: function value() {
        return this.context_.host;
      }
    }, {
      key: "setPort",
      value: function value(e) {
        this.context_.port = e;
      }
    }, {
      key: "getPort",
      value: function value() {
        return this.context_.port;
      }
    }, {
      key: "setLocale",
      value: function value(e) {
        this.context_.locale = e;
      }
    }, {
      key: "getLocale",
      value: function value() {
        return this.context_.locale;
      }
    }, {
      key: "buildQueryParams",
      value: function value(e, t, o) {
        var i = this,
            r = void 0,
            s = new RegExp(/\[\]$/);
        if (t instanceof Array) t.forEach(function (t, r) {
          s.test(e) ? o(e, t) : i.buildQueryParams(e + "[" + ("object" === ("undefined" == typeof t ? "undefined" : n(t)) ? r : "") + "]", t, o);
        });else if ("object" === ("undefined" == typeof t ? "undefined" : n(t))) for (r in t) {
          this.buildQueryParams(e + "[" + r + "]", t[r], o);
        } else o(e, t);
      }
    }, {
      key: "getRoute",
      value: function value(e) {
        var t = this.context_.prefix + e,
            n = e + "." + this.context_.locale,
            o = this.context_.prefix + e + "." + this.context_.locale,
            i = [t, n, o, e];

        for (var r in i) {
          if (i[r] in this.routes_) return this.routes_[i[r]];
        }

        throw new Error('The route "' + e + '" does not exist.');
      }
    }, {
      key: "generate",
      value: function value(e, n) {
        var o = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
            i = this.getRoute(e),
            r = n || {},
            s = t({}, r),
            u = "",
            c = !0,
            a = "",
            f = "undefined" == typeof this.getPort() || null === this.getPort() ? "" : this.getPort();

        if (i.tokens.forEach(function (t) {
          if ("text" === t[0]) return u = t[1] + u, void (c = !1);
          {
            if ("variable" !== t[0]) throw new Error('The token type "' + t[0] + '" is not supported.');
            var n = i.defaults && t[3] in i.defaults;

            if (!1 === c || !n || t[3] in r && r[t[3]] != i.defaults[t[3]]) {
              var o = void 0;
              if (t[3] in r) o = r[t[3]], delete s[t[3]];else {
                if (!n) {
                  if (c) return;
                  throw new Error('The route "' + e + '" requires the parameter "' + t[3] + '".');
                }

                o = i.defaults[t[3]];
              }
              var a = !0 === o || !1 === o || "" === o;

              if (!a || !c) {
                var f = encodeURIComponent(o).replace(/%2F/g, "/");
                "null" === f && null === o && (f = ""), u = t[1] + f + u;
              }

              c = !1;
            } else n && t[3] in s && delete s[t[3]];
          }
        }), "" === u && (u = "/"), i.hosttokens.forEach(function (e) {
          var t = void 0;
          return "text" === e[0] ? void (a = e[1] + a) : void ("variable" === e[0] && (e[3] in r ? (t = r[e[3]], delete s[e[3]]) : i.defaults && e[3] in i.defaults && (t = i.defaults[e[3]]), a = e[1] + t + a));
        }), u = this.context_.base_url + u, i.requirements && "_scheme" in i.requirements && this.getScheme() != i.requirements._scheme ? u = i.requirements._scheme + "://" + (a || this.getHost()) + u : "undefined" != typeof i.schemes && "undefined" != typeof i.schemes[0] && this.getScheme() !== i.schemes[0] ? u = i.schemes[0] + "://" + (a || this.getHost()) + u : a && this.getHost() !== a + ("" === f ? "" : ":" + f) ? u = this.getScheme() + "://" + a + ("" === f ? "" : ":" + f) + u : o === !0 && (u = this.getScheme() + "://" + this.getHost() + u), Object.keys(s).length > 0) {
          var l = void 0,
              h = [],
              y = function y(e, t) {
            t = "function" == typeof t ? t() : t, t = null === t ? "" : t, h.push(encodeURIComponent(e) + "=" + encodeURIComponent(t));
          };

          for (l in s) {
            this.buildQueryParams(l, s[l], y);
          }

          u = u + "?" + h.join("&").replace(/%20/g, "+");
        }

        return u;
      }
    }], [{
      key: "getInstance",
      value: function value() {
        return r;
      }
    }, {
      key: "setData",
      value: function value(e) {
        var t = i.getInstance();
        t.setRoutingData(e);
      }
    }]), i;
  }();

  i.Route, i.Context;
  var r = new i();
  return {
    Router: i,
    Routing: r
  };
});

/***/ })

},[["./assets/js/cfg/entMenuList.js","runtime","crosier/layout"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvY2ZnL2VudE1lbnVMaXN0LmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9zb3J0YWJsZWpzL1NvcnRhYmxlLmpzIiwid2VicGFjazovLy8uL3ZlbmRvci9mcmllbmRzb2ZzeW1mb255L2pzcm91dGluZy1idW5kbGUvUmVzb3VyY2VzL3B1YmxpYy9qcy9yb3V0ZXIubWluLmpzIl0sIm5hbWVzIjpbIlJvdXRpbmciLCJzZXRSb3V0aW5nRGF0YSIsInJvdXRlcyIsInNvcnRhYmxlIiwiU29ydGFibGUiLCJjcmVhdGUiLCJzaW1wbGVMaXN0IiwiYW5pbWF0aW9uIiwib25FbmQiLCJldnQiLCJjb25zb2xlIiwibG9nIiwidG9BcnJheSIsIiQiLCJvbiIsImUiLCJqc29uU29ydGFibGUiLCJKU09OIiwic3RyaW5naWZ5IiwiYWpheCIsInVybCIsImdlbmVyYXRlIiwidHlwZSIsImRhdGFUeXBlIiwiZGF0YSIsInN1Y2Nlc3MiLCJyZXMiLCJ0IiwibiIsImRlZmluZSIsIlR5cGVFcnJvciIsIk9iamVjdCIsImFzc2lnbiIsImFyZ3VtZW50cyIsImxlbmd0aCIsIm8iLCJwcm90b3R5cGUiLCJoYXNPd25Qcm9wZXJ0eSIsImNhbGwiLCJTeW1ib2wiLCJpdGVyYXRvciIsImNvbnN0cnVjdG9yIiwiZW51bWVyYWJsZSIsImNvbmZpZ3VyYWJsZSIsIndyaXRhYmxlIiwiZGVmaW5lUHJvcGVydHkiLCJrZXkiLCJpIiwiY29udGV4dF8iLCJiYXNlX3VybCIsInByZWZpeCIsImhvc3QiLCJwb3J0Iiwic2NoZW1lIiwibG9jYWxlIiwic2V0Um91dGVzIiwidmFsdWUiLCJzZXRCYXNlVXJsIiwic2V0UHJlZml4Iiwic2V0UG9ydCIsInNldExvY2FsZSIsInNldEhvc3QiLCJzZXRTY2hlbWUiLCJyb3V0ZXNfIiwiZnJlZXplIiwiciIsInMiLCJSZWdFeHAiLCJBcnJheSIsImZvckVhY2giLCJ0ZXN0IiwiYnVpbGRRdWVyeVBhcmFtcyIsIkVycm9yIiwiZ2V0Um91dGUiLCJ1IiwiYyIsImEiLCJmIiwiZ2V0UG9ydCIsInRva2VucyIsImRlZmF1bHRzIiwiZW5jb2RlVVJJQ29tcG9uZW50IiwicmVwbGFjZSIsImhvc3R0b2tlbnMiLCJyZXF1aXJlbWVudHMiLCJnZXRTY2hlbWUiLCJfc2NoZW1lIiwiZ2V0SG9zdCIsInNjaGVtZXMiLCJrZXlzIiwibCIsImgiLCJ5IiwicHVzaCIsImpvaW4iLCJnZXRJbnN0YW5jZSIsIlJvdXRlIiwiQ29udGV4dCIsIlJvdXRlciJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFhOztBQUViO0FBQ0E7QUFFQTtBQUNBO0FBRUFBLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJDLHVEQUF2QjtBQUdBLElBQUlDLFFBQVEsR0FBR0MsaURBQVEsQ0FBQ0MsTUFBVCxDQUFnQkMsVUFBaEIsRUFBNEI7QUFDbkNDLFdBQVMsRUFBRSxHQUR3QjtBQUduQ0MsT0FBSyxFQUFFO0FBQVU7QUFBVUMsS0FBcEIsRUFBeUI7QUFDNUJDLFdBQU8sQ0FBQ0MsR0FBUixDQUFZLE1BQVo7QUFDQUQsV0FBTyxDQUFDQyxHQUFSLENBQVksS0FBS0MsT0FBTCxFQUFaO0FBQ0g7QUFOa0MsQ0FBNUIsQ0FBZjtBQVdBQyw2Q0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JDLEVBQXhCLENBQ0ksT0FESixFQUVJLDBCQUZKLEVBR0ksVUFBVUMsQ0FBVixFQUFhO0FBQ1QsTUFBSUMsWUFBWSxHQUFHQyxJQUFJLENBQUNDLFNBQUwsQ0FBZWYsUUFBUSxDQUFDUyxPQUFULEVBQWYsQ0FBbkI7QUFFQUMsK0NBQUMsQ0FBQ00sSUFBRixDQUFPO0FBQ0hDLE9BQUcsRUFBRXBCLGtIQUFPLENBQUNxQixRQUFSLENBQWlCLHVCQUFqQixDQURGO0FBRUhDLFFBQUksRUFBRSxNQUZIO0FBR0hDLFlBQVEsRUFBRSxNQUhQO0FBSUhDLFFBQUksRUFBRTtBQUNGLHNCQUFnQlI7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O0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esb0JBQW9CLFdBQVc7QUFDL0I7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxrQkFBa0IscUJBQXFCO0FBQ3ZDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxJQUFJOztBQUVKLEdBQUc7O0FBRUg7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxXQUFXO0FBQ1g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7OztBQUdBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLOztBQUVMO0FBQ0E7QUFDQSxZQUFZO0FBQ1o7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxNQUFNO0FBQ047QUFDQTtBQUNBOztBQUVBLElBQUk7QUFDSjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSzs7QUFFTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxHQUFHOztBQUVIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxNQUFNO0FBQ04sS0FBSztBQUNMO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQSxHQUFHOztBQUVIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLElBQUk7QUFDSjtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFFBQVE7O0FBRVI7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsc0JBQXNCO0FBQ3RCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxNQUFNO0FBQ047QUFDQTtBQUNBO0FBQ0E7OztBQUdBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7OztBQUdKOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7O0FBR0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE1BQU07QUFDTjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLE1BQU07QUFDTjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBOzs7QUFHQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBLHVCQUF1Qjs7QUFFdkI7QUFDQTtBQUNBLE1BQU07QUFDTjtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLE1BQU07QUFDTjtBQUNBOztBQUVBO0FBQ0E7QUFDQSxvQkFBb0I7QUFDcEI7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsTUFBTTtBQUNOO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxtQ0FBbUM7O0FBRW5DO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQSxHQUFHOztBQUVIO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLElBQUk7O0FBRUo7QUFDQSxHQUFHOztBQUVIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQSxlQUFlO0FBQ2Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxTQUFTLE9BQU87QUFDaEI7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQSxjQUFjLFNBQVM7QUFDdkI7QUFDQTtBQUNBLGlCQUFpQjs7QUFFakI7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxJQUFJOztBQUVKO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0osR0FBRzs7O0FBR0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7O0FBR0g7QUFDQTtBQUNBLGVBQWUsWUFBWTtBQUMzQixlQUFlLE9BQU87QUFDdEIsZUFBZTtBQUNmO0FBQ0E7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQSxlQUFlLE9BQU87QUFDdEIsZUFBZSxFQUFFO0FBQ2pCLGVBQWU7QUFDZjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLElBQUk7QUFDSjs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7OztBQUdIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTs7QUFFSjs7QUFFQTs7QUFFQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsSUFBSTtBQUNKOztBQUVBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxVQUFVLE9BQU87QUFDakI7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7OztBQUlBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSixHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsYUFBYSxZQUFZO0FBQ3pCLGFBQWEsT0FBTztBQUNwQixhQUFhLE9BQU87QUFDcEIsYUFBYSxZQUFZO0FBQ3pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxhQUFhLFlBQVk7QUFDekIsYUFBYSxZQUFZO0FBQ3pCO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0EsMkVBQTJFO0FBQzNFO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLGFBQWEsWUFBWTtBQUN6QixhQUFhLE9BQU87QUFDcEI7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQSxjQUFjLFlBQVk7QUFDMUIsY0FBYztBQUNkO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxhQUFhLFlBQVk7QUFDekIsYUFBYSxTQUFTO0FBQ3RCLGFBQWE7QUFDYjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE1BQU07QUFDTjtBQUNBOztBQUVBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0EsYUFBYSxZQUFZO0FBQ3pCLGFBQWEsY0FBYztBQUMzQixhQUFhLFVBQVU7QUFDdkIsYUFBYSxPQUFPO0FBQ3BCO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBLGFBQWEsWUFBWTtBQUN6QixhQUFhLE9BQU87QUFDcEIsYUFBYSxZQUFZO0FBQ3pCO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsYUFBYSxZQUFZO0FBQ3pCLGFBQWEsTUFBTTtBQUNuQjtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLElBQUk7QUFDSjs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxFQUFFOzs7QUFHRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQSxZQUFZLFlBQVk7QUFDeEIsWUFBWSxPQUFPO0FBQ25CO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOzs7Ozs7Ozs7Ozs7Ozs7QUMzNUVELENBQUMsVUFBU0ksQ0FBVCxFQUFXWSxDQUFYLEVBQWE7QUFBQyxNQUFJQyxDQUFDLEdBQUNELENBQUMsRUFBUDtBQUFVLFVBQXNDRSxpQ0FBTyxFQUFELG9DQUFJRCxDQUFDLENBQUM1QixPQUFOO0FBQUE7QUFBQTtBQUFBLG9HQUE1QyxHQUEyRCxTQUEzRDtBQUEwSyxDQUFsTSxDQUFtTSxJQUFuTSxFQUF3TSxZQUFVO0FBQUM7O0FBQWEsV0FBU2UsQ0FBVCxDQUFXQSxDQUFYLEVBQWFZLENBQWIsRUFBZTtBQUFDLFFBQUcsRUFBRVosQ0FBQyxZQUFZWSxDQUFmLENBQUgsRUFBcUIsTUFBTSxJQUFJRyxTQUFKLENBQWMsbUNBQWQsQ0FBTjtBQUF5RDs7QUFBQSxNQUFJSCxDQUFDLEdBQUNJLE1BQU0sQ0FBQ0MsTUFBUCxJQUFlLFVBQVNqQixDQUFULEVBQVc7QUFBQyxTQUFJLElBQUlZLENBQUMsR0FBQyxDQUFWLEVBQVlBLENBQUMsR0FBQ00sU0FBUyxDQUFDQyxNQUF4QixFQUErQlAsQ0FBQyxFQUFoQyxFQUFtQztBQUFDLFVBQUlDLENBQUMsR0FBQ0ssU0FBUyxDQUFDTixDQUFELENBQWY7O0FBQW1CLFdBQUksSUFBSVEsQ0FBUixJQUFhUCxDQUFiO0FBQWVHLGNBQU0sQ0FBQ0ssU0FBUCxDQUFpQkMsY0FBakIsQ0FBZ0NDLElBQWhDLENBQXFDVixDQUFyQyxFQUF1Q08sQ0FBdkMsTUFBNENwQixDQUFDLENBQUNvQixDQUFELENBQUQsR0FBS1AsQ0FBQyxDQUFDTyxDQUFELENBQWxEO0FBQWY7QUFBc0U7O0FBQUEsV0FBT3BCLENBQVA7QUFBUyxHQUF2SztBQUFBLE1BQXdLYSxDQUFDLEdBQUMsY0FBWSxPQUFPVyxNQUFuQixJQUEyQixvQkFBaUJBLE1BQU0sQ0FBQ0MsUUFBeEIsQ0FBM0IsR0FBNEQsVUFBU3pCLENBQVQsRUFBVztBQUFDLG1CQUFjQSxDQUFkO0FBQWdCLEdBQXhGLEdBQXlGLFVBQVNBLENBQVQsRUFBVztBQUFDLFdBQU9BLENBQUMsSUFBRSxjQUFZLE9BQU93QixNQUF0QixJQUE4QnhCLENBQUMsQ0FBQzBCLFdBQUYsS0FBZ0JGLE1BQTlDLElBQXNEeEIsQ0FBQyxLQUFHd0IsTUFBTSxDQUFDSCxTQUFqRSxHQUEyRSxRQUEzRSxXQUEyRnJCLENBQTNGLENBQVA7QUFBb0csR0FBblg7QUFBQSxNQUFvWG9CLENBQUMsR0FBQyxZQUFVO0FBQUMsYUFBU3BCLENBQVQsQ0FBV0EsQ0FBWCxFQUFhWSxDQUFiLEVBQWU7QUFBQyxXQUFJLElBQUlDLENBQUMsR0FBQyxDQUFWLEVBQVlBLENBQUMsR0FBQ0QsQ0FBQyxDQUFDTyxNQUFoQixFQUF1Qk4sQ0FBQyxFQUF4QixFQUEyQjtBQUFDLFlBQUlPLENBQUMsR0FBQ1IsQ0FBQyxDQUFDQyxDQUFELENBQVA7QUFBV08sU0FBQyxDQUFDTyxVQUFGLEdBQWFQLENBQUMsQ0FBQ08sVUFBRixJQUFjLENBQUMsQ0FBNUIsRUFBOEJQLENBQUMsQ0FBQ1EsWUFBRixHQUFlLENBQUMsQ0FBOUMsRUFBZ0QsV0FBVVIsQ0FBVixLQUFjQSxDQUFDLENBQUNTLFFBQUYsR0FBVyxDQUFDLENBQTFCLENBQWhELEVBQTZFYixNQUFNLENBQUNjLGNBQVAsQ0FBc0I5QixDQUF0QixFQUF3Qm9CLENBQUMsQ0FBQ1csR0FBMUIsRUFBOEJYLENBQTlCLENBQTdFO0FBQThHO0FBQUM7O0FBQUEsV0FBTyxVQUFTUixDQUFULEVBQVdDLENBQVgsRUFBYU8sQ0FBYixFQUFlO0FBQUMsYUFBT1AsQ0FBQyxJQUFFYixDQUFDLENBQUNZLENBQUMsQ0FBQ1MsU0FBSCxFQUFhUixDQUFiLENBQUosRUFBb0JPLENBQUMsSUFBRXBCLENBQUMsQ0FBQ1ksQ0FBRCxFQUFHUSxDQUFILENBQXhCLEVBQThCUixDQUFyQztBQUF1QyxLQUE5RDtBQUErRCxHQUFoUCxFQUF0WDtBQUFBLE1BQXltQm9CLENBQUMsR0FBQyxZQUFVO0FBQUMsYUFBU0EsQ0FBVCxDQUFXcEIsQ0FBWCxFQUFhQyxDQUFiLEVBQWU7QUFBQ2IsT0FBQyxDQUFDLElBQUQsRUFBTWdDLENBQU4sQ0FBRCxFQUFVLEtBQUtDLFFBQUwsR0FBY3JCLENBQUMsSUFBRTtBQUFDc0IsZ0JBQVEsRUFBQyxFQUFWO0FBQWFDLGNBQU0sRUFBQyxFQUFwQjtBQUF1QkMsWUFBSSxFQUFDLEVBQTVCO0FBQStCQyxZQUFJLEVBQUMsRUFBcEM7QUFBdUNDLGNBQU0sRUFBQyxFQUE5QztBQUFpREMsY0FBTSxFQUFDO0FBQXhELE9BQTNCLEVBQXVGLEtBQUtDLFNBQUwsQ0FBZTNCLENBQUMsSUFBRSxFQUFsQixDQUF2RjtBQUE2Rzs7QUFBQSxXQUFPTyxDQUFDLENBQUNZLENBQUQsRUFBRyxDQUFDO0FBQUNELFNBQUcsRUFBQyxnQkFBTDtBQUFzQlUsV0FBSyxFQUFDLGVBQVN6QyxDQUFULEVBQVc7QUFBQyxhQUFLMEMsVUFBTCxDQUFnQjFDLENBQUMsQ0FBQ2tDLFFBQWxCLEdBQTRCLEtBQUtNLFNBQUwsQ0FBZXhDLENBQUMsQ0FBQ2IsTUFBakIsQ0FBNUIsRUFBcUQsWUFBV2EsQ0FBWCxJQUFjLEtBQUsyQyxTQUFMLENBQWUzQyxDQUFDLENBQUNtQyxNQUFqQixDQUFuRSxFQUE0RixVQUFTbkMsQ0FBVCxJQUFZLEtBQUs0QyxPQUFMLENBQWE1QyxDQUFDLENBQUNxQyxJQUFmLENBQXhHLEVBQTZILFlBQVdyQyxDQUFYLElBQWMsS0FBSzZDLFNBQUwsQ0FBZTdDLENBQUMsQ0FBQ3VDLE1BQWpCLENBQTNJLEVBQW9LLEtBQUtPLE9BQUwsQ0FBYTlDLENBQUMsQ0FBQ29DLElBQWYsQ0FBcEssRUFBeUwsS0FBS1csU0FBTCxDQUFlL0MsQ0FBQyxDQUFDc0MsTUFBakIsQ0FBekw7QUFBa047QUFBMVAsS0FBRCxFQUE2UDtBQUFDUCxTQUFHLEVBQUMsV0FBTDtBQUFpQlUsV0FBSyxFQUFDLGVBQVN6QyxDQUFULEVBQVc7QUFBQyxhQUFLZ0QsT0FBTCxHQUFhaEMsTUFBTSxDQUFDaUMsTUFBUCxDQUFjakQsQ0FBZCxDQUFiO0FBQThCO0FBQWpFLEtBQTdQLEVBQWdVO0FBQUMrQixTQUFHLEVBQUMsV0FBTDtBQUFpQlUsV0FBSyxFQUFDLGlCQUFVO0FBQUMsZUFBTyxLQUFLTyxPQUFaO0FBQW9CO0FBQXRELEtBQWhVLEVBQXdYO0FBQUNqQixTQUFHLEVBQUMsWUFBTDtBQUFrQlUsV0FBSyxFQUFDLGVBQVN6QyxDQUFULEVBQVc7QUFBQyxhQUFLaUMsUUFBTCxDQUFjQyxRQUFkLEdBQXVCbEMsQ0FBdkI7QUFBeUI7QUFBN0QsS0FBeFgsRUFBdWI7QUFBQytCLFNBQUcsRUFBQyxZQUFMO0FBQWtCVSxXQUFLLEVBQUMsaUJBQVU7QUFBQyxlQUFPLEtBQUtSLFFBQUwsQ0FBY0MsUUFBckI7QUFBOEI7QUFBakUsS0FBdmIsRUFBMGY7QUFBQ0gsU0FBRyxFQUFDLFdBQUw7QUFBaUJVLFdBQUssRUFBQyxlQUFTekMsQ0FBVCxFQUFXO0FBQUMsYUFBS2lDLFFBQUwsQ0FBY0UsTUFBZCxHQUFxQm5DLENBQXJCO0FBQXVCO0FBQTFELEtBQTFmLEVBQXNqQjtBQUFDK0IsU0FBRyxFQUFDLFdBQUw7QUFBaUJVLFdBQUssRUFBQyxlQUFTekMsQ0FBVCxFQUFXO0FBQUMsYUFBS2lDLFFBQUwsQ0FBY0ssTUFBZCxHQUFxQnRDLENBQXJCO0FBQXVCO0FBQTFELEtBQXRqQixFQUFrbkI7QUFBQytCLFNBQUcsRUFBQyxXQUFMO0FBQWlCVSxXQUFLLEVBQUMsaUJBQVU7QUFBQyxlQUFPLEtBQUtSLFFBQUwsQ0FBY0ssTUFBckI7QUFBNEI7QUFBOUQsS0FBbG5CLEVBQWtyQjtBQUFDUCxTQUFHLEVBQUMsU0FBTDtBQUFlVSxXQUFLLEVBQUMsZUFBU3pDLENBQVQsRUFBVztBQUFDLGFBQUtpQyxRQUFMLENBQWNHLElBQWQsR0FBbUJwQyxDQUFuQjtBQUFxQjtBQUF0RCxLQUFsckIsRUFBMHVCO0FBQUMrQixTQUFHLEVBQUMsU0FBTDtBQUFlVSxXQUFLLEVBQUMsaUJBQVU7QUFBQyxlQUFPLEtBQUtSLFFBQUwsQ0FBY0csSUFBckI7QUFBMEI7QUFBMUQsS0FBMXVCLEVBQXN5QjtBQUFDTCxTQUFHLEVBQUMsU0FBTDtBQUFlVSxXQUFLLEVBQUMsZUFBU3pDLENBQVQsRUFBVztBQUFDLGFBQUtpQyxRQUFMLENBQWNJLElBQWQsR0FBbUJyQyxDQUFuQjtBQUFxQjtBQUF0RCxLQUF0eUIsRUFBODFCO0FBQUMrQixTQUFHLEVBQUMsU0FBTDtBQUFlVSxXQUFLLEVBQUMsaUJBQVU7QUFBQyxlQUFPLEtBQUtSLFFBQUwsQ0FBY0ksSUFBckI7QUFBMEI7QUFBMUQsS0FBOTFCLEVBQTA1QjtBQUFDTixTQUFHLEVBQUMsV0FBTDtBQUFpQlUsV0FBSyxFQUFDLGVBQVN6QyxDQUFULEVBQVc7QUFBQyxhQUFLaUMsUUFBTCxDQUFjTSxNQUFkLEdBQXFCdkMsQ0FBckI7QUFBdUI7QUFBMUQsS0FBMTVCLEVBQXM5QjtBQUFDK0IsU0FBRyxFQUFDLFdBQUw7QUFBaUJVLFdBQUssRUFBQyxpQkFBVTtBQUFDLGVBQU8sS0FBS1IsUUFBTCxDQUFjTSxNQUFyQjtBQUE0QjtBQUE5RCxLQUF0OUIsRUFBc2hDO0FBQUNSLFNBQUcsRUFBQyxrQkFBTDtBQUF3QlUsV0FBSyxFQUFDLGVBQVN6QyxDQUFULEVBQVdZLENBQVgsRUFBYVEsQ0FBYixFQUFlO0FBQUMsWUFBSVksQ0FBQyxHQUFDLElBQU47QUFBQSxZQUFXa0IsQ0FBQyxHQUFDLEtBQUssQ0FBbEI7QUFBQSxZQUFvQkMsQ0FBQyxHQUFDLElBQUlDLE1BQUosQ0FBVyxPQUFYLENBQXRCO0FBQTBDLFlBQUd4QyxDQUFDLFlBQVl5QyxLQUFoQixFQUFzQnpDLENBQUMsQ0FBQzBDLE9BQUYsQ0FBVSxVQUFTMUMsQ0FBVCxFQUFXc0MsQ0FBWCxFQUFhO0FBQUNDLFdBQUMsQ0FBQ0ksSUFBRixDQUFPdkQsQ0FBUCxJQUFVb0IsQ0FBQyxDQUFDcEIsQ0FBRCxFQUFHWSxDQUFILENBQVgsR0FBaUJvQixDQUFDLENBQUN3QixnQkFBRixDQUFtQnhELENBQUMsR0FBQyxHQUFGLElBQU8sY0FBWSxlQUFhLE9BQU9ZLENBQXBCLEdBQXNCLFdBQXRCLEdBQWtDQyxDQUFDLENBQUNELENBQUQsQ0FBL0MsSUFBb0RzQyxDQUFwRCxHQUFzRCxFQUE3RCxJQUFpRSxHQUFwRixFQUF3RnRDLENBQXhGLEVBQTBGUSxDQUExRixDQUFqQjtBQUE4RyxTQUF0SSxFQUF0QixLQUFtSyxJQUFHLGNBQVksZUFBYSxPQUFPUixDQUFwQixHQUFzQixXQUF0QixHQUFrQ0MsQ0FBQyxDQUFDRCxDQUFELENBQS9DLENBQUgsRUFBdUQsS0FBSXNDLENBQUosSUFBU3RDLENBQVQ7QUFBVyxlQUFLNEMsZ0JBQUwsQ0FBc0J4RCxDQUFDLEdBQUMsR0FBRixHQUFNa0QsQ0FBTixHQUFRLEdBQTlCLEVBQWtDdEMsQ0FBQyxDQUFDc0MsQ0FBRCxDQUFuQyxFQUF1QzlCLENBQXZDO0FBQVgsU0FBdkQsTUFBaUhBLENBQUMsQ0FBQ3BCLENBQUQsRUFBR1ksQ0FBSCxDQUFEO0FBQU87QUFBblgsS0FBdGhDLEVBQTI0QztBQUFDbUIsU0FBRyxFQUFDLFVBQUw7QUFBZ0JVLFdBQUssRUFBQyxlQUFTekMsQ0FBVCxFQUFXO0FBQUMsWUFBSVksQ0FBQyxHQUFDLEtBQUtxQixRQUFMLENBQWNFLE1BQWQsR0FBcUJuQyxDQUEzQjtBQUFBLFlBQTZCYSxDQUFDLEdBQUNiLENBQUMsR0FBQyxHQUFGLEdBQU0sS0FBS2lDLFFBQUwsQ0FBY00sTUFBbkQ7QUFBQSxZQUEwRG5CLENBQUMsR0FBQyxLQUFLYSxRQUFMLENBQWNFLE1BQWQsR0FBcUJuQyxDQUFyQixHQUF1QixHQUF2QixHQUEyQixLQUFLaUMsUUFBTCxDQUFjTSxNQUFyRztBQUFBLFlBQTRHUCxDQUFDLEdBQUMsQ0FBQ3BCLENBQUQsRUFBR0MsQ0FBSCxFQUFLTyxDQUFMLEVBQU9wQixDQUFQLENBQTlHOztBQUF3SCxhQUFJLElBQUlrRCxDQUFSLElBQWFsQixDQUFiO0FBQWUsY0FBR0EsQ0FBQyxDQUFDa0IsQ0FBRCxDQUFELElBQU8sS0FBS0YsT0FBZixFQUF1QixPQUFPLEtBQUtBLE9BQUwsQ0FBYWhCLENBQUMsQ0FBQ2tCLENBQUQsQ0FBZCxDQUFQO0FBQXRDOztBQUFnRSxjQUFNLElBQUlPLEtBQUosQ0FBVSxnQkFBY3pELENBQWQsR0FBZ0IsbUJBQTFCLENBQU47QUFBcUQ7QUFBL1EsS0FBMzRDLEVBQTRwRDtBQUFDK0IsU0FBRyxFQUFDLFVBQUw7QUFBZ0JVLFdBQUssRUFBQyxlQUFTekMsQ0FBVCxFQUFXYSxDQUFYLEVBQWE7QUFBQyxZQUFJTyxDQUFDLEdBQUNGLFNBQVMsQ0FBQ0MsTUFBVixHQUFpQixDQUFqQixJQUFvQixLQUFLLENBQUwsS0FBU0QsU0FBUyxDQUFDLENBQUQsQ0FBdEMsSUFBMkNBLFNBQVMsQ0FBQyxDQUFELENBQTFEO0FBQUEsWUFBOERjLENBQUMsR0FBQyxLQUFLMEIsUUFBTCxDQUFjMUQsQ0FBZCxDQUFoRTtBQUFBLFlBQWlGa0QsQ0FBQyxHQUFDckMsQ0FBQyxJQUFFLEVBQXRGO0FBQUEsWUFBeUZzQyxDQUFDLEdBQUN2QyxDQUFDLENBQUMsRUFBRCxFQUFJc0MsQ0FBSixDQUE1RjtBQUFBLFlBQW1HUyxDQUFDLEdBQUMsRUFBckc7QUFBQSxZQUF3R0MsQ0FBQyxHQUFDLENBQUMsQ0FBM0c7QUFBQSxZQUE2R0MsQ0FBQyxHQUFDLEVBQS9HO0FBQUEsWUFBa0hDLENBQUMsR0FBQyxlQUFhLE9BQU8sS0FBS0MsT0FBTCxFQUFwQixJQUFvQyxTQUFPLEtBQUtBLE9BQUwsRUFBM0MsR0FBMEQsRUFBMUQsR0FBNkQsS0FBS0EsT0FBTCxFQUFqTDs7QUFBZ00sWUFBRy9CLENBQUMsQ0FBQ2dDLE1BQUYsQ0FBU1YsT0FBVCxDQUFpQixVQUFTMUMsQ0FBVCxFQUFXO0FBQUMsY0FBRyxXQUFTQSxDQUFDLENBQUMsQ0FBRCxDQUFiLEVBQWlCLE9BQU8rQyxDQUFDLEdBQUMvQyxDQUFDLENBQUMsQ0FBRCxDQUFELEdBQUsrQyxDQUFQLEVBQVMsTUFBS0MsQ0FBQyxHQUFDLENBQUMsQ0FBUixDQUFoQjtBQUEyQjtBQUFDLGdCQUFHLGVBQWFoRCxDQUFDLENBQUMsQ0FBRCxDQUFqQixFQUFxQixNQUFNLElBQUk2QyxLQUFKLENBQVUscUJBQW1CN0MsQ0FBQyxDQUFDLENBQUQsQ0FBcEIsR0FBd0IscUJBQWxDLENBQU47QUFBK0QsZ0JBQUlDLENBQUMsR0FBQ21CLENBQUMsQ0FBQ2lDLFFBQUYsSUFBWXJELENBQUMsQ0FBQyxDQUFELENBQUQsSUFBT29CLENBQUMsQ0FBQ2lDLFFBQTNCOztBQUFvQyxnQkFBRyxDQUFDLENBQUQsS0FBS0wsQ0FBTCxJQUFRLENBQUMvQyxDQUFULElBQVlELENBQUMsQ0FBQyxDQUFELENBQUQsSUFBT3NDLENBQVAsSUFBVUEsQ0FBQyxDQUFDdEMsQ0FBQyxDQUFDLENBQUQsQ0FBRixDQUFELElBQVNvQixDQUFDLENBQUNpQyxRQUFGLENBQVdyRCxDQUFDLENBQUMsQ0FBRCxDQUFaLENBQWxDLEVBQW1EO0FBQUMsa0JBQUlRLENBQUMsR0FBQyxLQUFLLENBQVg7QUFBYSxrQkFBR1IsQ0FBQyxDQUFDLENBQUQsQ0FBRCxJQUFPc0MsQ0FBVixFQUFZOUIsQ0FBQyxHQUFDOEIsQ0FBQyxDQUFDdEMsQ0FBQyxDQUFDLENBQUQsQ0FBRixDQUFILEVBQVUsT0FBT3VDLENBQUMsQ0FBQ3ZDLENBQUMsQ0FBQyxDQUFELENBQUYsQ0FBbEIsQ0FBWixLQUF5QztBQUFDLG9CQUFHLENBQUNDLENBQUosRUFBTTtBQUFDLHNCQUFHK0MsQ0FBSCxFQUFLO0FBQU8sd0JBQU0sSUFBSUgsS0FBSixDQUFVLGdCQUFjekQsQ0FBZCxHQUFnQiw0QkFBaEIsR0FBNkNZLENBQUMsQ0FBQyxDQUFELENBQTlDLEdBQWtELElBQTVELENBQU47QUFBd0U7O0FBQUFRLGlCQUFDLEdBQUNZLENBQUMsQ0FBQ2lDLFFBQUYsQ0FBV3JELENBQUMsQ0FBQyxDQUFELENBQVosQ0FBRjtBQUFtQjtBQUFBLGtCQUFJaUQsQ0FBQyxHQUFDLENBQUMsQ0FBRCxLQUFLekMsQ0FBTCxJQUFRLENBQUMsQ0FBRCxLQUFLQSxDQUFiLElBQWdCLE9BQUtBLENBQTNCOztBQUE2QixrQkFBRyxDQUFDeUMsQ0FBRCxJQUFJLENBQUNELENBQVIsRUFBVTtBQUFDLG9CQUFJRSxDQUFDLEdBQUNJLGtCQUFrQixDQUFDOUMsQ0FBRCxDQUFsQixDQUFzQitDLE9BQXRCLENBQThCLE1BQTlCLEVBQXFDLEdBQXJDLENBQU47QUFBZ0QsMkJBQVNMLENBQVQsSUFBWSxTQUFPMUMsQ0FBbkIsS0FBdUIwQyxDQUFDLEdBQUMsRUFBekIsR0FBNkJILENBQUMsR0FBQy9DLENBQUMsQ0FBQyxDQUFELENBQUQsR0FBS2tELENBQUwsR0FBT0gsQ0FBdEM7QUFBd0M7O0FBQUFDLGVBQUMsR0FBQyxDQUFDLENBQUg7QUFBSyxhQUE5VixNQUFtVy9DLENBQUMsSUFBRUQsQ0FBQyxDQUFDLENBQUQsQ0FBRCxJQUFPdUMsQ0FBVixJQUFhLE9BQU9BLENBQUMsQ0FBQ3ZDLENBQUMsQ0FBQyxDQUFELENBQUYsQ0FBckI7QUFBNEI7QUFBQyxTQUFsa0IsR0FBb2tCLE9BQUsrQyxDQUFMLEtBQVNBLENBQUMsR0FBQyxHQUFYLENBQXBrQixFQUFvbEIzQixDQUFDLENBQUNvQyxVQUFGLENBQWFkLE9BQWIsQ0FBcUIsVUFBU3RELENBQVQsRUFBVztBQUFDLGNBQUlZLENBQUMsR0FBQyxLQUFLLENBQVg7QUFBYSxpQkFBTSxXQUFTWixDQUFDLENBQUMsQ0FBRCxDQUFWLEdBQWMsTUFBSzZELENBQUMsR0FBQzdELENBQUMsQ0FBQyxDQUFELENBQUQsR0FBSzZELENBQVosQ0FBZCxHQUE2QixNQUFLLGVBQWE3RCxDQUFDLENBQUMsQ0FBRCxDQUFkLEtBQW9CQSxDQUFDLENBQUMsQ0FBRCxDQUFELElBQU9rRCxDQUFQLElBQVV0QyxDQUFDLEdBQUNzQyxDQUFDLENBQUNsRCxDQUFDLENBQUMsQ0FBRCxDQUFGLENBQUgsRUFBVSxPQUFPbUQsQ0FBQyxDQUFDbkQsQ0FBQyxDQUFDLENBQUQsQ0FBRixDQUE1QixJQUFvQ2dDLENBQUMsQ0FBQ2lDLFFBQUYsSUFBWWpFLENBQUMsQ0FBQyxDQUFELENBQUQsSUFBT2dDLENBQUMsQ0FBQ2lDLFFBQXJCLEtBQWdDckQsQ0FBQyxHQUFDb0IsQ0FBQyxDQUFDaUMsUUFBRixDQUFXakUsQ0FBQyxDQUFDLENBQUQsQ0FBWixDQUFsQyxDQUFwQyxFQUF3RjZELENBQUMsR0FBQzdELENBQUMsQ0FBQyxDQUFELENBQUQsR0FBS1ksQ0FBTCxHQUFPaUQsQ0FBckgsQ0FBTCxDQUFuQztBQUFpSyxTQUEvTSxDQUFwbEIsRUFBcXlCRixDQUFDLEdBQUMsS0FBSzFCLFFBQUwsQ0FBY0MsUUFBZCxHQUF1QnlCLENBQTl6QixFQUFnMEIzQixDQUFDLENBQUNxQyxZQUFGLElBQWdCLGFBQVlyQyxDQUFDLENBQUNxQyxZQUE5QixJQUE0QyxLQUFLQyxTQUFMLE1BQWtCdEMsQ0FBQyxDQUFDcUMsWUFBRixDQUFlRSxPQUE3RSxHQUFxRlosQ0FBQyxHQUFDM0IsQ0FBQyxDQUFDcUMsWUFBRixDQUFlRSxPQUFmLEdBQXVCLEtBQXZCLElBQThCVixDQUFDLElBQUUsS0FBS1csT0FBTCxFQUFqQyxJQUFpRGIsQ0FBeEksR0FBMEksZUFBYSxPQUFPM0IsQ0FBQyxDQUFDeUMsT0FBdEIsSUFBK0IsZUFBYSxPQUFPekMsQ0FBQyxDQUFDeUMsT0FBRixDQUFVLENBQVYsQ0FBbkQsSUFBaUUsS0FBS0gsU0FBTCxPQUFtQnRDLENBQUMsQ0FBQ3lDLE9BQUYsQ0FBVSxDQUFWLENBQXBGLEdBQWlHZCxDQUFDLEdBQUMzQixDQUFDLENBQUN5QyxPQUFGLENBQVUsQ0FBVixJQUFhLEtBQWIsSUFBb0JaLENBQUMsSUFBRSxLQUFLVyxPQUFMLEVBQXZCLElBQXVDYixDQUExSSxHQUE0SUUsQ0FBQyxJQUFFLEtBQUtXLE9BQUwsT0FBaUJYLENBQUMsSUFBRSxPQUFLQyxDQUFMLEdBQU8sRUFBUCxHQUFVLE1BQUlBLENBQWhCLENBQXJCLEdBQXdDSCxDQUFDLEdBQUMsS0FBS1csU0FBTCxLQUFpQixLQUFqQixHQUF1QlQsQ0FBdkIsSUFBMEIsT0FBS0MsQ0FBTCxHQUFPLEVBQVAsR0FBVSxNQUFJQSxDQUF4QyxJQUEyQ0gsQ0FBckYsR0FBdUZ2QyxDQUFDLEtBQUcsQ0FBQyxDQUFMLEtBQVN1QyxDQUFDLEdBQUMsS0FBS1csU0FBTCxLQUFpQixLQUFqQixHQUF1QixLQUFLRSxPQUFMLEVBQXZCLEdBQXNDYixDQUFqRCxDQUE3cUMsRUFBaXVDM0MsTUFBTSxDQUFDMEQsSUFBUCxDQUFZdkIsQ0FBWixFQUFlaEMsTUFBZixHQUFzQixDQUExdkMsRUFBNHZDO0FBQUMsY0FBSXdELENBQUMsR0FBQyxLQUFLLENBQVg7QUFBQSxjQUFhQyxDQUFDLEdBQUMsRUFBZjtBQUFBLGNBQWtCQyxDQUFDLEdBQUMsU0FBRkEsQ0FBRSxDQUFTN0UsQ0FBVCxFQUFXWSxDQUFYLEVBQWE7QUFBQ0EsYUFBQyxHQUFDLGNBQVksT0FBT0EsQ0FBbkIsR0FBcUJBLENBQUMsRUFBdEIsR0FBeUJBLENBQTNCLEVBQTZCQSxDQUFDLEdBQUMsU0FBT0EsQ0FBUCxHQUFTLEVBQVQsR0FBWUEsQ0FBM0MsRUFBNkNnRSxDQUFDLENBQUNFLElBQUYsQ0FBT1osa0JBQWtCLENBQUNsRSxDQUFELENBQWxCLEdBQXNCLEdBQXRCLEdBQTBCa0Usa0JBQWtCLENBQUN0RCxDQUFELENBQW5ELENBQTdDO0FBQXFHLFdBQXZJOztBQUF3SSxlQUFJK0QsQ0FBSixJQUFTeEIsQ0FBVDtBQUFXLGlCQUFLSyxnQkFBTCxDQUFzQm1CLENBQXRCLEVBQXdCeEIsQ0FBQyxDQUFDd0IsQ0FBRCxDQUF6QixFQUE2QkUsQ0FBN0I7QUFBWDs7QUFBMkNsQixXQUFDLEdBQUNBLENBQUMsR0FBQyxHQUFGLEdBQU1pQixDQUFDLENBQUNHLElBQUYsQ0FBTyxHQUFQLEVBQVlaLE9BQVosQ0FBb0IsTUFBcEIsRUFBMkIsR0FBM0IsQ0FBUjtBQUF3Qzs7QUFBQSxlQUFPUixDQUFQO0FBQVM7QUFBcnNELEtBQTVwRCxDQUFILEVBQXUyRyxDQUFDO0FBQUM1QixTQUFHLEVBQUMsYUFBTDtBQUFtQlUsV0FBSyxFQUFDLGlCQUFVO0FBQUMsZUFBT1MsQ0FBUDtBQUFTO0FBQTdDLEtBQUQsRUFBZ0Q7QUFBQ25CLFNBQUcsRUFBQyxTQUFMO0FBQWVVLFdBQUssRUFBQyxlQUFTekMsQ0FBVCxFQUFXO0FBQUMsWUFBSVksQ0FBQyxHQUFDb0IsQ0FBQyxDQUFDZ0QsV0FBRixFQUFOO0FBQXNCcEUsU0FBQyxDQUFDMUIsY0FBRixDQUFpQmMsQ0FBakI7QUFBb0I7QUFBM0UsS0FBaEQsQ0FBdjJHLENBQUQsRUFBdStHZ0MsQ0FBOStHO0FBQWcvRyxHQUF4bkgsRUFBM21COztBQUFzdUlBLEdBQUMsQ0FBQ2lELEtBQUYsRUFBUWpELENBQUMsQ0FBQ2tELE9BQVY7QUFBa0IsTUFBSWhDLENBQUMsR0FBQyxJQUFJbEIsQ0FBSixFQUFOO0FBQVksU0FBTTtBQUFDbUQsVUFBTSxFQUFDbkQsQ0FBUjtBQUFVL0MsV0FBTyxFQUFDaUU7QUFBbEIsR0FBTjtBQUEyQixDQUE3bEosQ0FBRCxDIiwiZmlsZSI6ImNmZy9lbnRNZW51TGlzdC5qcyIsInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JztcclxuXHJcbmltcG9ydCBTb3J0YWJsZSBmcm9tICdzb3J0YWJsZWpzJztcclxuaW1wb3J0ICQgZnJvbSBcImpxdWVyeVwiO1xyXG5cclxuaW1wb3J0IHJvdXRlcyBmcm9tICcuLi8uLi9zdGF0aWMvZm9zX2pzX3JvdXRlcy5qc29uJztcclxuaW1wb3J0IFJvdXRpbmcgZnJvbSAnLi4vLi4vLi4vdmVuZG9yL2ZyaWVuZHNvZnN5bWZvbnkvanNyb3V0aW5nLWJ1bmRsZS9SZXNvdXJjZXMvcHVibGljL2pzL3JvdXRlci5taW4uanMnO1xyXG5cclxuUm91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpXHJcblxyXG5cclxubGV0IHNvcnRhYmxlID0gU29ydGFibGUuY3JlYXRlKHNpbXBsZUxpc3QsIHtcclxuICAgICAgICBhbmltYXRpb246IDE1MCxcclxuXHJcbiAgICAgICAgb25FbmQ6IGZ1bmN0aW9uICgvKipFdmVudCovZXZ0KSB7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdlbmRkJyk7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKHRoaXMudG9BcnJheSgpKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbik7XHJcblxyXG5cclxuJCgnI2NvbmZpcm1hdGlvbk1vZGFsJykub24oXHJcbiAgICAnY2xpY2snLFxyXG4gICAgJyNidG5Db25maXJtYXRpb25Nb2RhbFllcycsXHJcbiAgICBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgIGxldCBqc29uU29ydGFibGUgPSBKU09OLnN0cmluZ2lmeShzb3J0YWJsZS50b0FycmF5KCkpO1xyXG5cclxuICAgICAgICAkLmFqYXgoe1xyXG4gICAgICAgICAgICB1cmw6IFJvdXRpbmcuZ2VuZXJhdGUoJ2NmZ19lbnRNZW51X3NhdmVPcmRlbScpLFxyXG4gICAgICAgICAgICB0eXBlOiAncG9zdCcsXHJcbiAgICAgICAgICAgIGRhdGFUeXBlOiAnanNvbicsXHJcbiAgICAgICAgICAgIGRhdGE6IHtcclxuICAgICAgICAgICAgICAgICdqc29uU29ydGFibGUnOiBqc29uU29ydGFibGVcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKHJlcykge1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ2RldSBib2EnKVxyXG5cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuXHJcbiAgICB9KTtcclxuXHJcbiIsIi8qKiFcbiAqIFNvcnRhYmxlXG4gKiBAYXV0aG9yXHRSdWJhWGEgICA8dHJhc2hAcnViYXhhLm9yZz5cbiAqIEBhdXRob3JcdG93ZW5tICAgIDxvd2VuMjMzNTVAZ21haWwuY29tPlxuICogQGxpY2Vuc2UgTUlUXG4gKi9cblxuKGZ1bmN0aW9uIHNvcnRhYmxlTW9kdWxlKGZhY3RvcnkpIHtcblx0XCJ1c2Ugc3RyaWN0XCI7XG5cblx0aWYgKHR5cGVvZiBkZWZpbmUgPT09IFwiZnVuY3Rpb25cIiAmJiBkZWZpbmUuYW1kKSB7XG5cdFx0ZGVmaW5lKGZhY3RvcnkpO1xuXHR9XG5cdGVsc2UgaWYgKHR5cGVvZiBtb2R1bGUgIT0gXCJ1bmRlZmluZWRcIiAmJiB0eXBlb2YgbW9kdWxlLmV4cG9ydHMgIT0gXCJ1bmRlZmluZWRcIikge1xuXHRcdG1vZHVsZS5leHBvcnRzID0gZmFjdG9yeSgpO1xuXHR9XG5cdGVsc2Uge1xuXHRcdC8qIGpzaGludCBzdWI6dHJ1ZSAqL1xuXHRcdHdpbmRvd1tcIlNvcnRhYmxlXCJdID0gZmFjdG9yeSgpO1xuXHR9XG59KShmdW5jdGlvbiBzb3J0YWJsZUZhY3RvcnkoKSB7XG5cdFwidXNlIHN0cmljdFwiO1xuXG5cdGlmICh0eXBlb2Ygd2luZG93ID09PSBcInVuZGVmaW5lZFwiIHx8ICF3aW5kb3cuZG9jdW1lbnQpIHtcblx0XHRyZXR1cm4gZnVuY3Rpb24gc29ydGFibGVFcnJvcigpIHtcblx0XHRcdHRocm93IG5ldyBFcnJvcihcIlNvcnRhYmxlLmpzIHJlcXVpcmVzIGEgd2luZG93IHdpdGggYSBkb2N1bWVudFwiKTtcblx0XHR9O1xuXHR9XG5cblx0dmFyIGRyYWdFbCxcblx0XHRwYXJlbnRFbCxcblx0XHRnaG9zdEVsLFxuXHRcdGNsb25lRWwsXG5cdFx0cm9vdEVsLFxuXHRcdG5leHRFbCxcblx0XHRsYXN0RG93bkVsLFxuXG5cdFx0c2Nyb2xsRWwsXG5cdFx0c2Nyb2xsUGFyZW50RWwsXG5cdFx0c2Nyb2xsQ3VzdG9tRm4sXG5cblx0XHRvbGRJbmRleCxcblx0XHRuZXdJbmRleCxcblx0XHRvbGREcmFnZ2FibGVJbmRleCxcblx0XHRuZXdEcmFnZ2FibGVJbmRleCxcblxuXHRcdGFjdGl2ZUdyb3VwLFxuXHRcdHB1dFNvcnRhYmxlLFxuXG5cdFx0YXV0b1Njcm9sbHMgPSBbXSxcblx0XHRzY3JvbGxpbmcgPSBmYWxzZSxcblxuXHRcdGF3YWl0aW5nRHJhZ1N0YXJ0ZWQgPSBmYWxzZSxcblx0XHRpZ25vcmVOZXh0Q2xpY2sgPSBmYWxzZSxcblx0XHRzb3J0YWJsZXMgPSBbXSxcblxuXHRcdHBvaW50ZXJFbGVtQ2hhbmdlZEludGVydmFsLFxuXHRcdGxhc3RQb2ludGVyRWxlbVgsXG5cdFx0bGFzdFBvaW50ZXJFbGVtWSxcblxuXHRcdHRhcEV2dCxcblx0XHR0b3VjaEV2dCxcblxuXHRcdG1vdmVkLFxuXG5cblx0XHRsYXN0VGFyZ2V0LFxuXHRcdGxhc3REaXJlY3Rpb24sXG5cdFx0cGFzdEZpcnN0SW52ZXJ0VGhyZXNoID0gZmFsc2UsXG5cdFx0aXNDaXJjdW1zdGFudGlhbEludmVydCA9IGZhbHNlLFxuXHRcdGxhc3RNb2RlLCAvLyAnc3dhcCcgb3IgJ2luc2VydCdcblxuXHRcdHRhcmdldE1vdmVEaXN0YW5jZSxcblxuXHRcdC8vIEZvciBwb3NpdGlvbmluZyBnaG9zdCBhYnNvbHV0ZWx5XG5cdFx0Z2hvc3RSZWxhdGl2ZVBhcmVudCxcblx0XHRnaG9zdFJlbGF0aXZlUGFyZW50SW5pdGlhbFNjcm9sbCA9IFtdLCAvLyAobGVmdCwgdG9wKVxuXG5cdFx0cmVhbERyYWdFbFJlY3QsIC8vIGRyYWdFbCByZWN0IGFmdGVyIGN1cnJlbnQgYW5pbWF0aW9uXG5cblx0XHQvKiogQGNvbnN0ICovXG5cdFx0Ul9TUEFDRSA9IC9cXHMrL2csXG5cblx0XHRleHBhbmRvID0gJ1NvcnRhYmxlJyArIChuZXcgRGF0ZSkuZ2V0VGltZSgpLFxuXG5cdFx0d2luID0gd2luZG93LFxuXHRcdGRvY3VtZW50ID0gd2luLmRvY3VtZW50LFxuXHRcdHBhcnNlSW50ID0gd2luLnBhcnNlSW50LFxuXHRcdHNldFRpbWVvdXQgPSB3aW4uc2V0VGltZW91dCxcblxuXHRcdCQgPSB3aW4ualF1ZXJ5IHx8IHdpbi5aZXB0byxcblx0XHRQb2x5bWVyID0gd2luLlBvbHltZXIsXG5cblx0XHRjYXB0dXJlTW9kZSA9IHtcblx0XHRcdGNhcHR1cmU6IGZhbHNlLFxuXHRcdFx0cGFzc2l2ZTogZmFsc2Vcblx0XHR9LFxuXG5cdFx0SUUxMU9yTGVzcyA9ICEhbmF2aWdhdG9yLnVzZXJBZ2VudC5tYXRjaCgvKD86VHJpZGVudC4qcnZbIDpdPzExXFwufG1zaWV8aWVtb2JpbGUpL2kpLFxuXHRcdEVkZ2UgPSAhIW5hdmlnYXRvci51c2VyQWdlbnQubWF0Y2goL0VkZ2UvaSksXG5cdFx0RmlyZUZveCA9ICEhbmF2aWdhdG9yLnVzZXJBZ2VudC5tYXRjaCgvZmlyZWZveC9pKSxcblx0XHRTYWZhcmkgPSAhIShuYXZpZ2F0b3IudXNlckFnZW50Lm1hdGNoKC9zYWZhcmkvaSkgJiYgIW5hdmlnYXRvci51c2VyQWdlbnQubWF0Y2goL2Nocm9tZS9pKSAmJiAhbmF2aWdhdG9yLnVzZXJBZ2VudC5tYXRjaCgvYW5kcm9pZC9pKSksXG5cdFx0SU9TID0gISEobmF2aWdhdG9yLnVzZXJBZ2VudC5tYXRjaCgvaVAoYWR8b2R8aG9uZSkvaSkpLFxuXG5cdFx0UG9zaXRpb25HaG9zdEFic29sdXRlbHkgPSBJT1MsXG5cblx0XHRDU1NGbG9hdFByb3BlcnR5ID0gRWRnZSB8fCBJRTExT3JMZXNzID8gJ2Nzc0Zsb2F0JyA6ICdmbG9hdCcsXG5cblx0XHQvLyBUaGlzIHdpbGwgbm90IHBhc3MgZm9yIElFOSwgYmVjYXVzZSBJRTkgRG5EIG9ubHkgd29ya3Mgb24gYW5jaG9yc1xuXHRcdHN1cHBvcnREcmFnZ2FibGUgPSAoJ2RyYWdnYWJsZScgaW4gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2JykpLFxuXG5cdFx0c3VwcG9ydENzc1BvaW50ZXJFdmVudHMgPSAoZnVuY3Rpb24oKSB7XG5cdFx0XHQvLyBmYWxzZSB3aGVuIDw9IElFMTFcblx0XHRcdGlmIChJRTExT3JMZXNzKSB7XG5cdFx0XHRcdHJldHVybiBmYWxzZTtcblx0XHRcdH1cblx0XHRcdHZhciBlbCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3gnKTtcblx0XHRcdGVsLnN0eWxlLmNzc1RleHQgPSAncG9pbnRlci1ldmVudHM6YXV0byc7XG5cdFx0XHRyZXR1cm4gZWwuc3R5bGUucG9pbnRlckV2ZW50cyA9PT0gJ2F1dG8nO1xuXHRcdH0pKCksXG5cblx0XHRfc2lsZW50ID0gZmFsc2UsXG5cdFx0X2FsaWduZWRTaWxlbnQgPSBmYWxzZSxcblxuXHRcdGFicyA9IE1hdGguYWJzLFxuXHRcdG1pbiA9IE1hdGgubWluLFxuXHRcdG1heCA9IE1hdGgubWF4LFxuXG5cdFx0c2F2ZWRJbnB1dENoZWNrZWQgPSBbXSxcblxuXHRcdF9kZXRlY3REaXJlY3Rpb24gPSBmdW5jdGlvbihlbCwgb3B0aW9ucykge1xuXHRcdFx0dmFyIGVsQ1NTID0gX2NzcyhlbCksXG5cdFx0XHRcdGVsV2lkdGggPSBwYXJzZUludChlbENTUy53aWR0aClcblx0XHRcdFx0XHQtIHBhcnNlSW50KGVsQ1NTLnBhZGRpbmdMZWZ0KVxuXHRcdFx0XHRcdC0gcGFyc2VJbnQoZWxDU1MucGFkZGluZ1JpZ2h0KVxuXHRcdFx0XHRcdC0gcGFyc2VJbnQoZWxDU1MuYm9yZGVyTGVmdFdpZHRoKVxuXHRcdFx0XHRcdC0gcGFyc2VJbnQoZWxDU1MuYm9yZGVyUmlnaHRXaWR0aCksXG5cdFx0XHRcdGNoaWxkMSA9IF9nZXRDaGlsZChlbCwgMCwgb3B0aW9ucyksXG5cdFx0XHRcdGNoaWxkMiA9IF9nZXRDaGlsZChlbCwgMSwgb3B0aW9ucyksXG5cdFx0XHRcdGZpcnN0Q2hpbGRDU1MgPSBjaGlsZDEgJiYgX2NzcyhjaGlsZDEpLFxuXHRcdFx0XHRzZWNvbmRDaGlsZENTUyA9IGNoaWxkMiAmJiBfY3NzKGNoaWxkMiksXG5cdFx0XHRcdGZpcnN0Q2hpbGRXaWR0aCA9IGZpcnN0Q2hpbGRDU1MgJiYgcGFyc2VJbnQoZmlyc3RDaGlsZENTUy5tYXJnaW5MZWZ0KSArIHBhcnNlSW50KGZpcnN0Q2hpbGRDU1MubWFyZ2luUmlnaHQpICsgX2dldFJlY3QoY2hpbGQxKS53aWR0aCxcblx0XHRcdFx0c2Vjb25kQ2hpbGRXaWR0aCA9IHNlY29uZENoaWxkQ1NTICYmIHBhcnNlSW50KHNlY29uZENoaWxkQ1NTLm1hcmdpbkxlZnQpICsgcGFyc2VJbnQoc2Vjb25kQ2hpbGRDU1MubWFyZ2luUmlnaHQpICsgX2dldFJlY3QoY2hpbGQyKS53aWR0aDtcblxuXHRcdFx0aWYgKGVsQ1NTLmRpc3BsYXkgPT09ICdmbGV4Jykge1xuXHRcdFx0XHRyZXR1cm4gZWxDU1MuZmxleERpcmVjdGlvbiA9PT0gJ2NvbHVtbicgfHwgZWxDU1MuZmxleERpcmVjdGlvbiA9PT0gJ2NvbHVtbi1yZXZlcnNlJ1xuXHRcdFx0XHQ/ICd2ZXJ0aWNhbCcgOiAnaG9yaXpvbnRhbCc7XG5cdFx0XHR9XG5cblx0XHRcdGlmIChlbENTUy5kaXNwbGF5ID09PSAnZ3JpZCcpIHtcblx0XHRcdFx0cmV0dXJuIGVsQ1NTLmdyaWRUZW1wbGF0ZUNvbHVtbnMuc3BsaXQoJyAnKS5sZW5ndGggPD0gMSA/ICd2ZXJ0aWNhbCcgOiAnaG9yaXpvbnRhbCc7XG5cdFx0XHR9XG5cblx0XHRcdGlmIChjaGlsZDEgJiYgZmlyc3RDaGlsZENTUy5mbG9hdCAhPT0gJ25vbmUnKSB7XG5cdFx0XHRcdHZhciB0b3VjaGluZ1NpZGVDaGlsZDIgPSBmaXJzdENoaWxkQ1NTLmZsb2F0ID09PSAnbGVmdCcgPyAnbGVmdCcgOiAncmlnaHQnO1xuXG5cdFx0XHRcdHJldHVybiBjaGlsZDIgJiYgKHNlY29uZENoaWxkQ1NTLmNsZWFyID09PSAnYm90aCcgfHwgc2Vjb25kQ2hpbGRDU1MuY2xlYXIgPT09IHRvdWNoaW5nU2lkZUNoaWxkMikgP1xuXHRcdFx0XHRcdCd2ZXJ0aWNhbCcgOiAnaG9yaXpvbnRhbCc7XG5cdFx0XHR9XG5cblx0XHRcdHJldHVybiAoY2hpbGQxICYmXG5cdFx0XHRcdChcblx0XHRcdFx0XHRmaXJzdENoaWxkQ1NTLmRpc3BsYXkgPT09ICdibG9jaycgfHxcblx0XHRcdFx0XHRmaXJzdENoaWxkQ1NTLmRpc3BsYXkgPT09ICdmbGV4JyB8fFxuXHRcdFx0XHRcdGZpcnN0Q2hpbGRDU1MuZGlzcGxheSA9PT0gJ3RhYmxlJyB8fFxuXHRcdFx0XHRcdGZpcnN0Q2hpbGRDU1MuZGlzcGxheSA9PT0gJ2dyaWQnIHx8XG5cdFx0XHRcdFx0Zmlyc3RDaGlsZFdpZHRoID49IGVsV2lkdGggJiZcblx0XHRcdFx0XHRlbENTU1tDU1NGbG9hdFByb3BlcnR5XSA9PT0gJ25vbmUnIHx8XG5cdFx0XHRcdFx0Y2hpbGQyICYmXG5cdFx0XHRcdFx0ZWxDU1NbQ1NTRmxvYXRQcm9wZXJ0eV0gPT09ICdub25lJyAmJlxuXHRcdFx0XHRcdGZpcnN0Q2hpbGRXaWR0aCArIHNlY29uZENoaWxkV2lkdGggPiBlbFdpZHRoXG5cdFx0XHRcdCkgP1xuXHRcdFx0XHQndmVydGljYWwnIDogJ2hvcml6b250YWwnXG5cdFx0XHQpO1xuXHRcdH0sXG5cblx0XHQvKipcblx0XHQgKiBEZXRlY3RzIGZpcnN0IG5lYXJlc3QgZW1wdHkgc29ydGFibGUgdG8gWCBhbmQgWSBwb3NpdGlvbiB1c2luZyBlbXB0eUluc2VydFRocmVzaG9sZC5cblx0XHQgKiBAcGFyYW0gIHtOdW1iZXJ9IHggICAgICBYIHBvc2l0aW9uXG5cdFx0ICogQHBhcmFtICB7TnVtYmVyfSB5ICAgICAgWSBwb3NpdGlvblxuXHRcdCAqIEByZXR1cm4ge0hUTUxFbGVtZW50fSAgIEVsZW1lbnQgb2YgdGhlIGZpcnN0IGZvdW5kIG5lYXJlc3QgU29ydGFibGVcblx0XHQgKi9cblx0XHRfZGV0ZWN0TmVhcmVzdEVtcHR5U29ydGFibGUgPSBmdW5jdGlvbih4LCB5KSB7XG5cdFx0XHRmb3IgKHZhciBpID0gMDsgaSA8IHNvcnRhYmxlcy5sZW5ndGg7IGkrKykge1xuXHRcdFx0XHRpZiAoX2xhc3RDaGlsZChzb3J0YWJsZXNbaV0pKSBjb250aW51ZTtcblxuXHRcdFx0XHR2YXIgcmVjdCA9IF9nZXRSZWN0KHNvcnRhYmxlc1tpXSksXG5cdFx0XHRcdFx0dGhyZXNob2xkID0gc29ydGFibGVzW2ldW2V4cGFuZG9dLm9wdGlvbnMuZW1wdHlJbnNlcnRUaHJlc2hvbGQsXG5cdFx0XHRcdFx0aW5zaWRlSG9yaXpvbnRhbGx5ID0geCA+PSAocmVjdC5sZWZ0IC0gdGhyZXNob2xkKSAmJiB4IDw9IChyZWN0LnJpZ2h0ICsgdGhyZXNob2xkKSxcblx0XHRcdFx0XHRpbnNpZGVWZXJ0aWNhbGx5ID0geSA+PSAocmVjdC50b3AgLSB0aHJlc2hvbGQpICYmIHkgPD0gKHJlY3QuYm90dG9tICsgdGhyZXNob2xkKTtcblxuXHRcdFx0XHRpZiAodGhyZXNob2xkICYmIGluc2lkZUhvcml6b250YWxseSAmJiBpbnNpZGVWZXJ0aWNhbGx5KSB7XG5cdFx0XHRcdFx0cmV0dXJuIHNvcnRhYmxlc1tpXTtcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdH0sXG5cblx0XHRfaXNDbGllbnRJblJvd0NvbHVtbiA9IGZ1bmN0aW9uKHgsIHksIGVsLCBheGlzLCBvcHRpb25zKSB7XG5cdFx0XHR2YXIgdGFyZ2V0UmVjdCA9IF9nZXRSZWN0KGVsKSxcblx0XHRcdFx0dGFyZ2V0UzFPcHAgPSBheGlzID09PSAndmVydGljYWwnID8gdGFyZ2V0UmVjdC5sZWZ0IDogdGFyZ2V0UmVjdC50b3AsXG5cdFx0XHRcdHRhcmdldFMyT3BwID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IHRhcmdldFJlY3QucmlnaHQgOiB0YXJnZXRSZWN0LmJvdHRvbSxcblx0XHRcdFx0bW91c2VPbk9wcEF4aXMgPSBheGlzID09PSAndmVydGljYWwnID8geCA6IHk7XG5cblx0XHRcdHJldHVybiB0YXJnZXRTMU9wcCA8IG1vdXNlT25PcHBBeGlzICYmIG1vdXNlT25PcHBBeGlzIDwgdGFyZ2V0UzJPcHA7XG5cdFx0fSxcblxuXHRcdF9pc0VsSW5Sb3dDb2x1bW4gPSBmdW5jdGlvbihlbDEsIGVsMiwgYXhpcykge1xuXHRcdFx0dmFyIGVsMVJlY3QgPSBlbDEgPT09IGRyYWdFbCAmJiByZWFsRHJhZ0VsUmVjdCB8fCBfZ2V0UmVjdChlbDEpLFxuXHRcdFx0XHRlbDJSZWN0ID0gZWwyID09PSBkcmFnRWwgJiYgcmVhbERyYWdFbFJlY3QgfHwgX2dldFJlY3QoZWwyKSxcblx0XHRcdFx0ZWwxUzFPcHAgPSBheGlzID09PSAndmVydGljYWwnID8gZWwxUmVjdC5sZWZ0IDogZWwxUmVjdC50b3AsXG5cdFx0XHRcdGVsMVMyT3BwID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGVsMVJlY3QucmlnaHQgOiBlbDFSZWN0LmJvdHRvbSxcblx0XHRcdFx0ZWwxT3BwTGVuZ3RoID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGVsMVJlY3Qud2lkdGggOiBlbDFSZWN0LmhlaWdodCxcblx0XHRcdFx0ZWwyUzFPcHAgPSBheGlzID09PSAndmVydGljYWwnID8gZWwyUmVjdC5sZWZ0IDogZWwyUmVjdC50b3AsXG5cdFx0XHRcdGVsMlMyT3BwID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGVsMlJlY3QucmlnaHQgOiBlbDJSZWN0LmJvdHRvbSxcblx0XHRcdFx0ZWwyT3BwTGVuZ3RoID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGVsMlJlY3Qud2lkdGggOiBlbDJSZWN0LmhlaWdodDtcblxuXHRcdFx0cmV0dXJuIChcblx0XHRcdFx0ZWwxUzFPcHAgPT09IGVsMlMxT3BwIHx8XG5cdFx0XHRcdGVsMVMyT3BwID09PSBlbDJTMk9wcCB8fFxuXHRcdFx0XHQoZWwxUzFPcHAgKyBlbDFPcHBMZW5ndGggLyAyKSA9PT0gKGVsMlMxT3BwICsgZWwyT3BwTGVuZ3RoIC8gMilcblx0XHRcdCk7XG5cdFx0fSxcblxuXHRcdF9nZXRQYXJlbnRBdXRvU2Nyb2xsRWxlbWVudCA9IGZ1bmN0aW9uKGVsLCBpbmNsdWRlU2VsZikge1xuXHRcdFx0Ly8gc2tpcCB0byB3aW5kb3dcblx0XHRcdGlmICghZWwgfHwgIWVsLmdldEJvdW5kaW5nQ2xpZW50UmVjdCkgcmV0dXJuIF9nZXRXaW5kb3dTY3JvbGxpbmdFbGVtZW50KCk7XG5cblx0XHRcdHZhciBlbGVtID0gZWw7XG5cdFx0XHR2YXIgZ290U2VsZiA9IGZhbHNlO1xuXHRcdFx0ZG8ge1xuXHRcdFx0XHQvLyB3ZSBkb24ndCBuZWVkIHRvIGdldCBlbGVtIGNzcyBpZiBpdCBpc24ndCBldmVuIG92ZXJmbG93aW5nIGluIHRoZSBmaXJzdCBwbGFjZSAocGVyZm9ybWFuY2UpXG5cdFx0XHRcdGlmIChlbGVtLmNsaWVudFdpZHRoIDwgZWxlbS5zY3JvbGxXaWR0aCB8fCBlbGVtLmNsaWVudEhlaWdodCA8IGVsZW0uc2Nyb2xsSGVpZ2h0KSB7XG5cdFx0XHRcdFx0dmFyIGVsZW1DU1MgPSBfY3NzKGVsZW0pO1xuXHRcdFx0XHRcdGlmIChcblx0XHRcdFx0XHRcdGVsZW0uY2xpZW50V2lkdGggPCBlbGVtLnNjcm9sbFdpZHRoICYmIChlbGVtQ1NTLm92ZXJmbG93WCA9PSAnYXV0bycgfHwgZWxlbUNTUy5vdmVyZmxvd1ggPT0gJ3Njcm9sbCcpIHx8XG5cdFx0XHRcdFx0XHRlbGVtLmNsaWVudEhlaWdodCA8IGVsZW0uc2Nyb2xsSGVpZ2h0ICYmIChlbGVtQ1NTLm92ZXJmbG93WSA9PSAnYXV0bycgfHwgZWxlbUNTUy5vdmVyZmxvd1kgPT0gJ3Njcm9sbCcpXG5cdFx0XHRcdFx0KSB7XG5cdFx0XHRcdFx0XHRpZiAoIWVsZW0gfHwgIWVsZW0uZ2V0Qm91bmRpbmdDbGllbnRSZWN0IHx8IGVsZW0gPT09IGRvY3VtZW50LmJvZHkpIHJldHVybiBfZ2V0V2luZG93U2Nyb2xsaW5nRWxlbWVudCgpO1xuXG5cdFx0XHRcdFx0XHRpZiAoZ290U2VsZiB8fCBpbmNsdWRlU2VsZikgcmV0dXJuIGVsZW07XG5cdFx0XHRcdFx0XHRnb3RTZWxmID0gdHJ1ZTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH1cblx0XHRcdC8qIGpzaGludCBib3NzOnRydWUgKi9cblx0XHRcdH0gd2hpbGUgKGVsZW0gPSBlbGVtLnBhcmVudE5vZGUpO1xuXG5cdFx0XHRyZXR1cm4gX2dldFdpbmRvd1Njcm9sbGluZ0VsZW1lbnQoKTtcblx0XHR9LFxuXG5cdFx0X2dldFdpbmRvd1Njcm9sbGluZ0VsZW1lbnQgPSBmdW5jdGlvbigpIHtcblx0XHRcdGlmIChJRTExT3JMZXNzKSB7XG5cdFx0XHRcdHJldHVybiBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQ7XG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRyZXR1cm4gZG9jdW1lbnQuc2Nyb2xsaW5nRWxlbWVudDtcblx0XHRcdH1cblx0XHR9LFxuXG5cdFx0X3Njcm9sbEJ5ID0gZnVuY3Rpb24oZWwsIHgsIHkpIHtcblx0XHRcdGVsLnNjcm9sbExlZnQgKz0geDtcblx0XHRcdGVsLnNjcm9sbFRvcCArPSB5O1xuXHRcdH0sXG5cblx0XHRfYXV0b1Njcm9sbCA9IF90aHJvdHRsZShmdW5jdGlvbiAoLyoqRXZlbnQqL2V2dCwgLyoqT2JqZWN0Ki9vcHRpb25zLCAvKipIVE1MRWxlbWVudCovcm9vdEVsLCAvKipCb29sZWFuKi9pc0ZhbGxiYWNrKSB7XG5cdFx0XHQvLyBCdWc6IGh0dHBzOi8vYnVnemlsbGEubW96aWxsYS5vcmcvc2hvd19idWcuY2dpP2lkPTUwNTUyMVxuXHRcdFx0aWYgKG9wdGlvbnMuc2Nyb2xsKSB7XG5cdFx0XHRcdHZhciBfdGhpcyA9IHJvb3RFbCA/IHJvb3RFbFtleHBhbmRvXSA6IHdpbmRvdyxcblx0XHRcdFx0XHRzZW5zID0gb3B0aW9ucy5zY3JvbGxTZW5zaXRpdml0eSxcblx0XHRcdFx0XHRzcGVlZCA9IG9wdGlvbnMuc2Nyb2xsU3BlZWQsXG5cblx0XHRcdFx0XHR4ID0gZXZ0LmNsaWVudFgsXG5cdFx0XHRcdFx0eSA9IGV2dC5jbGllbnRZLFxuXG5cdFx0XHRcdFx0d2luU2Nyb2xsZXIgPSBfZ2V0V2luZG93U2Nyb2xsaW5nRWxlbWVudCgpLFxuXG5cdFx0XHRcdFx0c2Nyb2xsVGhpc0luc3RhbmNlID0gZmFsc2U7XG5cblx0XHRcdFx0Ly8gRGV0ZWN0IHNjcm9sbEVsXG5cdFx0XHRcdGlmIChzY3JvbGxQYXJlbnRFbCAhPT0gcm9vdEVsKSB7XG5cdFx0XHRcdFx0X2NsZWFyQXV0b1Njcm9sbHMoKTtcblxuXHRcdFx0XHRcdHNjcm9sbEVsID0gb3B0aW9ucy5zY3JvbGw7XG5cdFx0XHRcdFx0c2Nyb2xsQ3VzdG9tRm4gPSBvcHRpb25zLnNjcm9sbEZuO1xuXG5cdFx0XHRcdFx0aWYgKHNjcm9sbEVsID09PSB0cnVlKSB7XG5cdFx0XHRcdFx0XHRzY3JvbGxFbCA9IF9nZXRQYXJlbnRBdXRvU2Nyb2xsRWxlbWVudChyb290RWwsIHRydWUpO1xuXHRcdFx0XHRcdFx0c2Nyb2xsUGFyZW50RWwgPSBzY3JvbGxFbDtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH1cblxuXG5cdFx0XHRcdHZhciBsYXllcnNPdXQgPSAwO1xuXHRcdFx0XHR2YXIgY3VycmVudFBhcmVudCA9IHNjcm9sbEVsO1xuXHRcdFx0XHRkbyB7XG5cdFx0XHRcdFx0dmFyXHRlbCA9IGN1cnJlbnRQYXJlbnQsXG5cdFx0XHRcdFx0XHRyZWN0ID0gX2dldFJlY3QoZWwpLFxuXG5cdFx0XHRcdFx0XHR0b3AgPSByZWN0LnRvcCxcblx0XHRcdFx0XHRcdGJvdHRvbSA9IHJlY3QuYm90dG9tLFxuXHRcdFx0XHRcdFx0bGVmdCA9IHJlY3QubGVmdCxcblx0XHRcdFx0XHRcdHJpZ2h0ID0gcmVjdC5yaWdodCxcblxuXHRcdFx0XHRcdFx0d2lkdGggPSByZWN0LndpZHRoLFxuXHRcdFx0XHRcdFx0aGVpZ2h0ID0gcmVjdC5oZWlnaHQsXG5cblx0XHRcdFx0XHRcdHNjcm9sbFdpZHRoLFxuXHRcdFx0XHRcdFx0c2Nyb2xsSGVpZ2h0LFxuXG5cdFx0XHRcdFx0XHRjc3MsXG5cblx0XHRcdFx0XHRcdHZ4LFxuXHRcdFx0XHRcdFx0dnksXG5cblx0XHRcdFx0XHRcdGNhblNjcm9sbFgsXG5cdFx0XHRcdFx0XHRjYW5TY3JvbGxZLFxuXG5cdFx0XHRcdFx0XHRzY3JvbGxQb3NYLFxuXHRcdFx0XHRcdFx0c2Nyb2xsUG9zWTtcblxuXG5cdFx0XHRcdFx0c2Nyb2xsV2lkdGggPSBlbC5zY3JvbGxXaWR0aDtcblx0XHRcdFx0XHRzY3JvbGxIZWlnaHQgPSBlbC5zY3JvbGxIZWlnaHQ7XG5cblx0XHRcdFx0XHRjc3MgPSBfY3NzKGVsKTtcblxuXHRcdFx0XHRcdHNjcm9sbFBvc1ggPSBlbC5zY3JvbGxMZWZ0O1xuXHRcdFx0XHRcdHNjcm9sbFBvc1kgPSBlbC5zY3JvbGxUb3A7XG5cblx0XHRcdFx0XHRpZiAoZWwgPT09IHdpblNjcm9sbGVyKSB7XG5cdFx0XHRcdFx0XHRjYW5TY3JvbGxYID0gd2lkdGggPCBzY3JvbGxXaWR0aCAmJiAoY3NzLm92ZXJmbG93WCA9PT0gJ2F1dG8nIHx8IGNzcy5vdmVyZmxvd1ggPT09ICdzY3JvbGwnIHx8IGNzcy5vdmVyZmxvd1ggPT09ICd2aXNpYmxlJyk7XG5cdFx0XHRcdFx0XHRjYW5TY3JvbGxZID0gaGVpZ2h0IDwgc2Nyb2xsSGVpZ2h0ICYmIChjc3Mub3ZlcmZsb3dZID09PSAnYXV0bycgfHwgY3NzLm92ZXJmbG93WSA9PT0gJ3Njcm9sbCcgfHwgY3NzLm92ZXJmbG93WSA9PT0gJ3Zpc2libGUnKTtcblx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0Y2FuU2Nyb2xsWCA9IHdpZHRoIDwgc2Nyb2xsV2lkdGggJiYgKGNzcy5vdmVyZmxvd1ggPT09ICdhdXRvJyB8fCBjc3Mub3ZlcmZsb3dYID09PSAnc2Nyb2xsJyk7XG5cdFx0XHRcdFx0XHRjYW5TY3JvbGxZID0gaGVpZ2h0IDwgc2Nyb2xsSGVpZ2h0ICYmIChjc3Mub3ZlcmZsb3dZID09PSAnYXV0bycgfHwgY3NzLm92ZXJmbG93WSA9PT0gJ3Njcm9sbCcpO1xuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdHZ4ID0gY2FuU2Nyb2xsWCAmJiAoYWJzKHJpZ2h0IC0geCkgPD0gc2VucyAmJiAoc2Nyb2xsUG9zWCArIHdpZHRoKSA8IHNjcm9sbFdpZHRoKSAtIChhYnMobGVmdCAtIHgpIDw9IHNlbnMgJiYgISFzY3JvbGxQb3NYKTtcblxuXHRcdFx0XHRcdHZ5ID0gY2FuU2Nyb2xsWSAmJiAoYWJzKGJvdHRvbSAtIHkpIDw9IHNlbnMgJiYgKHNjcm9sbFBvc1kgKyBoZWlnaHQpIDwgc2Nyb2xsSGVpZ2h0KSAtIChhYnModG9wIC0geSkgPD0gc2VucyAmJiAhIXNjcm9sbFBvc1kpO1xuXG5cblx0XHRcdFx0XHRpZiAoIWF1dG9TY3JvbGxzW2xheWVyc091dF0pIHtcblx0XHRcdFx0XHRcdGZvciAodmFyIGkgPSAwOyBpIDw9IGxheWVyc091dDsgaSsrKSB7XG5cdFx0XHRcdFx0XHRcdGlmICghYXV0b1Njcm9sbHNbaV0pIHtcblx0XHRcdFx0XHRcdFx0XHRhdXRvU2Nyb2xsc1tpXSA9IHt9O1xuXHRcdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0aWYgKGF1dG9TY3JvbGxzW2xheWVyc091dF0udnggIT0gdnggfHwgYXV0b1Njcm9sbHNbbGF5ZXJzT3V0XS52eSAhPSB2eSB8fCBhdXRvU2Nyb2xsc1tsYXllcnNPdXRdLmVsICE9PSBlbCkge1xuXHRcdFx0XHRcdFx0YXV0b1Njcm9sbHNbbGF5ZXJzT3V0XS5lbCA9IGVsO1xuXHRcdFx0XHRcdFx0YXV0b1Njcm9sbHNbbGF5ZXJzT3V0XS52eCA9IHZ4O1xuXHRcdFx0XHRcdFx0YXV0b1Njcm9sbHNbbGF5ZXJzT3V0XS52eSA9IHZ5O1xuXG5cdFx0XHRcdFx0XHRjbGVhckludGVydmFsKGF1dG9TY3JvbGxzW2xheWVyc091dF0ucGlkKTtcblxuXHRcdFx0XHRcdFx0aWYgKGVsICYmICh2eCAhPSAwIHx8IHZ5ICE9IDApKSB7XG5cdFx0XHRcdFx0XHRcdHNjcm9sbFRoaXNJbnN0YW5jZSA9IHRydWU7XG5cdFx0XHRcdFx0XHRcdC8qIGpzaGludCBsb29wZnVuYzp0cnVlICovXG5cdFx0XHRcdFx0XHRcdGF1dG9TY3JvbGxzW2xheWVyc091dF0ucGlkID0gc2V0SW50ZXJ2YWwoKGZ1bmN0aW9uICgpIHtcblx0XHRcdFx0XHRcdFx0XHQvLyBlbXVsYXRlIGRyYWcgb3ZlciBkdXJpbmcgYXV0b3Njcm9sbCAoZmFsbGJhY2spLCBlbXVsYXRpbmcgbmF0aXZlIERuRCBiZWhhdmlvdXJcblx0XHRcdFx0XHRcdFx0XHRpZiAoaXNGYWxsYmFjayAmJiB0aGlzLmxheWVyID09PSAwKSB7XG5cdFx0XHRcdFx0XHRcdFx0XHRTb3J0YWJsZS5hY3RpdmUuX2VtdWxhdGVEcmFnT3Zlcih0cnVlKTtcblx0XHRcdFx0XHRcdFx0XHRcdFNvcnRhYmxlLmFjdGl2ZS5fb25Ub3VjaE1vdmUodG91Y2hFdnQsIHRydWUpO1xuXHRcdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdFx0XHR2YXIgc2Nyb2xsT2Zmc2V0WSA9IGF1dG9TY3JvbGxzW3RoaXMubGF5ZXJdLnZ5ID8gYXV0b1Njcm9sbHNbdGhpcy5sYXllcl0udnkgKiBzcGVlZCA6IDA7XG5cdFx0XHRcdFx0XHRcdFx0dmFyIHNjcm9sbE9mZnNldFggPSBhdXRvU2Nyb2xsc1t0aGlzLmxheWVyXS52eCA/IGF1dG9TY3JvbGxzW3RoaXMubGF5ZXJdLnZ4ICogc3BlZWQgOiAwO1xuXG5cdFx0XHRcdFx0XHRcdFx0aWYgKCdmdW5jdGlvbicgPT09IHR5cGVvZihzY3JvbGxDdXN0b21GbikpIHtcblx0XHRcdFx0XHRcdFx0XHRcdGlmIChzY3JvbGxDdXN0b21Gbi5jYWxsKF90aGlzLCBzY3JvbGxPZmZzZXRYLCBzY3JvbGxPZmZzZXRZLCBldnQsIHRvdWNoRXZ0LCBhdXRvU2Nyb2xsc1t0aGlzLmxheWVyXS5lbCkgIT09ICdjb250aW51ZScpIHtcblx0XHRcdFx0XHRcdFx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0XHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdFx0XHRcdF9zY3JvbGxCeShhdXRvU2Nyb2xsc1t0aGlzLmxheWVyXS5lbCwgc2Nyb2xsT2Zmc2V0WCwgc2Nyb2xsT2Zmc2V0WSk7XG5cdFx0XHRcdFx0XHRcdH0pLmJpbmQoe2xheWVyOiBsYXllcnNPdXR9KSwgMjQpO1xuXHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdH1cblx0XHRcdFx0XHRsYXllcnNPdXQrKztcblx0XHRcdFx0fSB3aGlsZSAob3B0aW9ucy5idWJibGVTY3JvbGwgJiYgY3VycmVudFBhcmVudCAhPT0gd2luU2Nyb2xsZXIgJiYgKGN1cnJlbnRQYXJlbnQgPSBfZ2V0UGFyZW50QXV0b1Njcm9sbEVsZW1lbnQoY3VycmVudFBhcmVudCwgZmFsc2UpKSk7XG5cdFx0XHRcdHNjcm9sbGluZyA9IHNjcm9sbFRoaXNJbnN0YW5jZTsgLy8gaW4gY2FzZSBhbm90aGVyIGZ1bmN0aW9uIGNhdGNoZXMgc2Nyb2xsaW5nIGFzIGZhbHNlIGluIGJldHdlZW4gd2hlbiBpdCBpcyBub3Rcblx0XHRcdH1cblx0XHR9LCAzMCksXG5cblx0XHRfY2xlYXJBdXRvU2Nyb2xscyA9IGZ1bmN0aW9uICgpIHtcblx0XHRcdGF1dG9TY3JvbGxzLmZvckVhY2goZnVuY3Rpb24oYXV0b1Njcm9sbCkge1xuXHRcdFx0XHRjbGVhckludGVydmFsKGF1dG9TY3JvbGwucGlkKTtcblx0XHRcdH0pO1xuXHRcdFx0YXV0b1Njcm9sbHMgPSBbXTtcblx0XHR9LFxuXG5cdFx0X3ByZXBhcmVHcm91cCA9IGZ1bmN0aW9uIChvcHRpb25zKSB7XG5cdFx0XHRmdW5jdGlvbiB0b0ZuKHZhbHVlLCBwdWxsKSB7XG5cdFx0XHRcdHJldHVybiBmdW5jdGlvbih0bywgZnJvbSwgZHJhZ0VsLCBldnQpIHtcblx0XHRcdFx0XHR2YXIgc2FtZUdyb3VwID0gdG8ub3B0aW9ucy5ncm91cC5uYW1lICYmXG5cdFx0XHRcdFx0XHRcdFx0XHRmcm9tLm9wdGlvbnMuZ3JvdXAubmFtZSAmJlxuXHRcdFx0XHRcdFx0XHRcdFx0dG8ub3B0aW9ucy5ncm91cC5uYW1lID09PSBmcm9tLm9wdGlvbnMuZ3JvdXAubmFtZTtcblxuXHRcdFx0XHRcdGlmICh2YWx1ZSA9PSBudWxsICYmIChwdWxsIHx8IHNhbWVHcm91cCkpIHtcblx0XHRcdFx0XHRcdC8vIERlZmF1bHQgcHVsbCB2YWx1ZVxuXHRcdFx0XHRcdFx0Ly8gRGVmYXVsdCBwdWxsIGFuZCBwdXQgdmFsdWUgaWYgc2FtZSBncm91cFxuXHRcdFx0XHRcdFx0cmV0dXJuIHRydWU7XG5cdFx0XHRcdFx0fSBlbHNlIGlmICh2YWx1ZSA9PSBudWxsIHx8IHZhbHVlID09PSBmYWxzZSkge1xuXHRcdFx0XHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdFx0XHRcdH0gZWxzZSBpZiAocHVsbCAmJiB2YWx1ZSA9PT0gJ2Nsb25lJykge1xuXHRcdFx0XHRcdFx0cmV0dXJuIHZhbHVlO1xuXHRcdFx0XHRcdH0gZWxzZSBpZiAodHlwZW9mIHZhbHVlID09PSAnZnVuY3Rpb24nKSB7XG5cdFx0XHRcdFx0XHRyZXR1cm4gdG9Gbih2YWx1ZSh0bywgZnJvbSwgZHJhZ0VsLCBldnQpLCBwdWxsKSh0bywgZnJvbSwgZHJhZ0VsLCBldnQpO1xuXHRcdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0XHR2YXIgb3RoZXJHcm91cCA9IChwdWxsID8gdG8gOiBmcm9tKS5vcHRpb25zLmdyb3VwLm5hbWU7XG5cblx0XHRcdFx0XHRcdHJldHVybiAodmFsdWUgPT09IHRydWUgfHxcblx0XHRcdFx0XHRcdCh0eXBlb2YgdmFsdWUgPT09ICdzdHJpbmcnICYmIHZhbHVlID09PSBvdGhlckdyb3VwKSB8fFxuXHRcdFx0XHRcdFx0KHZhbHVlLmpvaW4gJiYgdmFsdWUuaW5kZXhPZihvdGhlckdyb3VwKSA+IC0xKSk7XG5cdFx0XHRcdFx0fVxuXHRcdFx0XHR9O1xuXHRcdFx0fVxuXG5cdFx0XHR2YXIgZ3JvdXAgPSB7fTtcblx0XHRcdHZhciBvcmlnaW5hbEdyb3VwID0gb3B0aW9ucy5ncm91cDtcblxuXHRcdFx0aWYgKCFvcmlnaW5hbEdyb3VwIHx8IHR5cGVvZiBvcmlnaW5hbEdyb3VwICE9ICdvYmplY3QnKSB7XG5cdFx0XHRcdG9yaWdpbmFsR3JvdXAgPSB7bmFtZTogb3JpZ2luYWxHcm91cH07XG5cdFx0XHR9XG5cblx0XHRcdGdyb3VwLm5hbWUgPSBvcmlnaW5hbEdyb3VwLm5hbWU7XG5cdFx0XHRncm91cC5jaGVja1B1bGwgPSB0b0ZuKG9yaWdpbmFsR3JvdXAucHVsbCwgdHJ1ZSk7XG5cdFx0XHRncm91cC5jaGVja1B1dCA9IHRvRm4ob3JpZ2luYWxHcm91cC5wdXQpO1xuXHRcdFx0Z3JvdXAucmV2ZXJ0Q2xvbmUgPSBvcmlnaW5hbEdyb3VwLnJldmVydENsb25lO1xuXG5cdFx0XHRvcHRpb25zLmdyb3VwID0gZ3JvdXA7XG5cdFx0fSxcblxuXHRcdF9jaGVja0FsaWdubWVudCA9IGZ1bmN0aW9uKGV2dCkge1xuXHRcdFx0aWYgKCFkcmFnRWwgfHwgIWRyYWdFbC5wYXJlbnROb2RlKSByZXR1cm47XG5cdFx0XHRkcmFnRWwucGFyZW50Tm9kZVtleHBhbmRvXSAmJiBkcmFnRWwucGFyZW50Tm9kZVtleHBhbmRvXS5fY29tcHV0ZUlzQWxpZ25lZChldnQpO1xuXHRcdH0sXG5cblx0XHRfaGlkZUdob3N0Rm9yVGFyZ2V0ID0gZnVuY3Rpb24oKSB7XG5cdFx0XHRpZiAoIXN1cHBvcnRDc3NQb2ludGVyRXZlbnRzICYmIGdob3N0RWwpIHtcblx0XHRcdFx0X2NzcyhnaG9zdEVsLCAnZGlzcGxheScsICdub25lJyk7XG5cdFx0XHR9XG5cdFx0fSxcblxuXHRcdF91bmhpZGVHaG9zdEZvclRhcmdldCA9IGZ1bmN0aW9uKCkge1xuXHRcdFx0aWYgKCFzdXBwb3J0Q3NzUG9pbnRlckV2ZW50cyAmJiBnaG9zdEVsKSB7XG5cdFx0XHRcdF9jc3MoZ2hvc3RFbCwgJ2Rpc3BsYXknLCAnJyk7XG5cdFx0XHR9XG5cdFx0fTtcblxuXG5cdC8vICMxMTg0IGZpeCAtIFByZXZlbnQgY2xpY2sgZXZlbnQgb24gZmFsbGJhY2sgaWYgZHJhZ2dlZCBidXQgaXRlbSBub3QgY2hhbmdlZCBwb3NpdGlvblxuXHRkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGV2dCkge1xuXHRcdGlmIChpZ25vcmVOZXh0Q2xpY2spIHtcblx0XHRcdGV2dC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0ZXZ0LnN0b3BQcm9wYWdhdGlvbiAmJiBldnQuc3RvcFByb3BhZ2F0aW9uKCk7XG5cdFx0XHRldnQuc3RvcEltbWVkaWF0ZVByb3BhZ2F0aW9uICYmIGV2dC5zdG9wSW1tZWRpYXRlUHJvcGFnYXRpb24oKTtcblx0XHRcdGlnbm9yZU5leHRDbGljayA9IGZhbHNlO1xuXHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdH1cblx0fSwgdHJ1ZSk7XG5cblx0dmFyIG5lYXJlc3RFbXB0eUluc2VydERldGVjdEV2ZW50ID0gZnVuY3Rpb24oZXZ0KSB7XG5cdFx0aWYgKGRyYWdFbCkge1xuXHRcdFx0ZXZ0ID0gZXZ0LnRvdWNoZXMgPyBldnQudG91Y2hlc1swXSA6IGV2dDtcblx0XHRcdHZhciBuZWFyZXN0ID0gX2RldGVjdE5lYXJlc3RFbXB0eVNvcnRhYmxlKGV2dC5jbGllbnRYLCBldnQuY2xpZW50WSk7XG5cblx0XHRcdGlmIChuZWFyZXN0KSB7XG5cdFx0XHRcdC8vIENyZWF0ZSBpbWl0YXRpb24gZXZlbnRcblx0XHRcdFx0dmFyIGV2ZW50ID0ge307XG5cdFx0XHRcdGZvciAodmFyIGkgaW4gZXZ0KSB7XG5cdFx0XHRcdFx0ZXZlbnRbaV0gPSBldnRbaV07XG5cdFx0XHRcdH1cblx0XHRcdFx0ZXZlbnQudGFyZ2V0ID0gZXZlbnQucm9vdEVsID0gbmVhcmVzdDtcblx0XHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQgPSB2b2lkIDA7XG5cdFx0XHRcdGV2ZW50LnN0b3BQcm9wYWdhdGlvbiA9IHZvaWQgMDtcblx0XHRcdFx0bmVhcmVzdFtleHBhbmRvXS5fb25EcmFnT3ZlcihldmVudCk7XG5cdFx0XHR9XG5cdFx0fVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBAY2xhc3MgIFNvcnRhYmxlXG5cdCAqIEBwYXJhbSAge0hUTUxFbGVtZW50fSAgZWxcblx0ICogQHBhcmFtICB7T2JqZWN0fSAgICAgICBbb3B0aW9uc11cblx0ICovXG5cdGZ1bmN0aW9uIFNvcnRhYmxlKGVsLCBvcHRpb25zKSB7XG5cdFx0aWYgKCEoZWwgJiYgZWwubm9kZVR5cGUgJiYgZWwubm9kZVR5cGUgPT09IDEpKSB7XG5cdFx0XHR0aHJvdyAnU29ydGFibGU6IGBlbGAgbXVzdCBiZSBIVE1MRWxlbWVudCwgbm90ICcgKyB7fS50b1N0cmluZy5jYWxsKGVsKTtcblx0XHR9XG5cblx0XHR0aGlzLmVsID0gZWw7IC8vIHJvb3QgZWxlbWVudFxuXHRcdHRoaXMub3B0aW9ucyA9IG9wdGlvbnMgPSBfZXh0ZW5kKHt9LCBvcHRpb25zKTtcblxuXG5cdFx0Ly8gRXhwb3J0IGluc3RhbmNlXG5cdFx0ZWxbZXhwYW5kb10gPSB0aGlzO1xuXG5cdFx0Ly8gRGVmYXVsdCBvcHRpb25zXG5cdFx0dmFyIGRlZmF1bHRzID0ge1xuXHRcdFx0Z3JvdXA6IG51bGwsXG5cdFx0XHRzb3J0OiB0cnVlLFxuXHRcdFx0ZGlzYWJsZWQ6IGZhbHNlLFxuXHRcdFx0c3RvcmU6IG51bGwsXG5cdFx0XHRoYW5kbGU6IG51bGwsXG5cdFx0XHRzY3JvbGw6IHRydWUsXG5cdFx0XHRzY3JvbGxTZW5zaXRpdml0eTogMzAsXG5cdFx0XHRzY3JvbGxTcGVlZDogMTAsXG5cdFx0XHRidWJibGVTY3JvbGw6IHRydWUsXG5cdFx0XHRkcmFnZ2FibGU6IC9bdW9dbC9pLnRlc3QoZWwubm9kZU5hbWUpID8gJz5saScgOiAnPionLFxuXHRcdFx0c3dhcFRocmVzaG9sZDogMSwgLy8gcGVyY2VudGFnZTsgMCA8PSB4IDw9IDFcblx0XHRcdGludmVydFN3YXA6IGZhbHNlLCAvLyBpbnZlcnQgYWx3YXlzXG5cdFx0XHRpbnZlcnRlZFN3YXBUaHJlc2hvbGQ6IG51bGwsIC8vIHdpbGwgYmUgc2V0IHRvIHNhbWUgYXMgc3dhcFRocmVzaG9sZCBpZiBkZWZhdWx0XG5cdFx0XHRyZW1vdmVDbG9uZU9uSGlkZTogdHJ1ZSxcblx0XHRcdGRpcmVjdGlvbjogZnVuY3Rpb24oKSB7XG5cdFx0XHRcdHJldHVybiBfZGV0ZWN0RGlyZWN0aW9uKGVsLCB0aGlzLm9wdGlvbnMpO1xuXHRcdFx0fSxcblx0XHRcdGdob3N0Q2xhc3M6ICdzb3J0YWJsZS1naG9zdCcsXG5cdFx0XHRjaG9zZW5DbGFzczogJ3NvcnRhYmxlLWNob3NlbicsXG5cdFx0XHRkcmFnQ2xhc3M6ICdzb3J0YWJsZS1kcmFnJyxcblx0XHRcdGlnbm9yZTogJ2EsIGltZycsXG5cdFx0XHRmaWx0ZXI6IG51bGwsXG5cdFx0XHRwcmV2ZW50T25GaWx0ZXI6IHRydWUsXG5cdFx0XHRhbmltYXRpb246IDAsXG5cdFx0XHRlYXNpbmc6IG51bGwsXG5cdFx0XHRzZXREYXRhOiBmdW5jdGlvbiAoZGF0YVRyYW5zZmVyLCBkcmFnRWwpIHtcblx0XHRcdFx0ZGF0YVRyYW5zZmVyLnNldERhdGEoJ1RleHQnLCBkcmFnRWwudGV4dENvbnRlbnQpO1xuXHRcdFx0fSxcblx0XHRcdGRyb3BCdWJibGU6IGZhbHNlLFxuXHRcdFx0ZHJhZ292ZXJCdWJibGU6IGZhbHNlLFxuXHRcdFx0ZGF0YUlkQXR0cjogJ2RhdGEtaWQnLFxuXHRcdFx0ZGVsYXk6IDAsXG5cdFx0XHRkZWxheU9uVG91Y2hPbmx5OiBmYWxzZSxcblx0XHRcdHRvdWNoU3RhcnRUaHJlc2hvbGQ6IHBhcnNlSW50KHdpbmRvdy5kZXZpY2VQaXhlbFJhdGlvLCAxMCkgfHwgMSxcblx0XHRcdGZvcmNlRmFsbGJhY2s6IGZhbHNlLFxuXHRcdFx0ZmFsbGJhY2tDbGFzczogJ3NvcnRhYmxlLWZhbGxiYWNrJyxcblx0XHRcdGZhbGxiYWNrT25Cb2R5OiBmYWxzZSxcblx0XHRcdGZhbGxiYWNrVG9sZXJhbmNlOiAwLFxuXHRcdFx0ZmFsbGJhY2tPZmZzZXQ6IHt4OiAwLCB5OiAwfSxcblx0XHRcdHN1cHBvcnRQb2ludGVyOiBTb3J0YWJsZS5zdXBwb3J0UG9pbnRlciAhPT0gZmFsc2UgJiYgKCdQb2ludGVyRXZlbnQnIGluIHdpbmRvdyksXG5cdFx0XHRlbXB0eUluc2VydFRocmVzaG9sZDogNVxuXHRcdH07XG5cblxuXHRcdC8vIFNldCBkZWZhdWx0IG9wdGlvbnNcblx0XHRmb3IgKHZhciBuYW1lIGluIGRlZmF1bHRzKSB7XG5cdFx0XHQhKG5hbWUgaW4gb3B0aW9ucykgJiYgKG9wdGlvbnNbbmFtZV0gPSBkZWZhdWx0c1tuYW1lXSk7XG5cdFx0fVxuXG5cdFx0X3ByZXBhcmVHcm91cChvcHRpb25zKTtcblxuXHRcdC8vIEJpbmQgYWxsIHByaXZhdGUgbWV0aG9kc1xuXHRcdGZvciAodmFyIGZuIGluIHRoaXMpIHtcblx0XHRcdGlmIChmbi5jaGFyQXQoMCkgPT09ICdfJyAmJiB0eXBlb2YgdGhpc1tmbl0gPT09ICdmdW5jdGlvbicpIHtcblx0XHRcdFx0dGhpc1tmbl0gPSB0aGlzW2ZuXS5iaW5kKHRoaXMpO1xuXHRcdFx0fVxuXHRcdH1cblxuXHRcdC8vIFNldHVwIGRyYWcgbW9kZVxuXHRcdHRoaXMubmF0aXZlRHJhZ2dhYmxlID0gb3B0aW9ucy5mb3JjZUZhbGxiYWNrID8gZmFsc2UgOiBzdXBwb3J0RHJhZ2dhYmxlO1xuXG5cdFx0aWYgKHRoaXMubmF0aXZlRHJhZ2dhYmxlKSB7XG5cdFx0XHQvLyBUb3VjaCBzdGFydCB0aHJlc2hvbGQgY2Fubm90IGJlIGdyZWF0ZXIgdGhhbiB0aGUgbmF0aXZlIGRyYWdzdGFydCB0aHJlc2hvbGRcblx0XHRcdHRoaXMub3B0aW9ucy50b3VjaFN0YXJ0VGhyZXNob2xkID0gMTtcblx0XHR9XG5cblx0XHQvLyBCaW5kIGV2ZW50c1xuXHRcdGlmIChvcHRpb25zLnN1cHBvcnRQb2ludGVyKSB7XG5cdFx0XHRfb24oZWwsICdwb2ludGVyZG93bicsIHRoaXMuX29uVGFwU3RhcnQpO1xuXHRcdH0gZWxzZSB7XG5cdFx0XHRfb24oZWwsICdtb3VzZWRvd24nLCB0aGlzLl9vblRhcFN0YXJ0KTtcblx0XHRcdF9vbihlbCwgJ3RvdWNoc3RhcnQnLCB0aGlzLl9vblRhcFN0YXJ0KTtcblx0XHR9XG5cblx0XHRpZiAodGhpcy5uYXRpdmVEcmFnZ2FibGUpIHtcblx0XHRcdF9vbihlbCwgJ2RyYWdvdmVyJywgdGhpcyk7XG5cdFx0XHRfb24oZWwsICdkcmFnZW50ZXInLCB0aGlzKTtcblx0XHR9XG5cblx0XHRzb3J0YWJsZXMucHVzaCh0aGlzLmVsKTtcblxuXHRcdC8vIFJlc3RvcmUgc29ydGluZ1xuXHRcdG9wdGlvbnMuc3RvcmUgJiYgb3B0aW9ucy5zdG9yZS5nZXQgJiYgdGhpcy5zb3J0KG9wdGlvbnMuc3RvcmUuZ2V0KHRoaXMpIHx8IFtdKTtcblx0fVxuXG5cdFNvcnRhYmxlLnByb3RvdHlwZSA9IC8qKiBAbGVuZHMgU29ydGFibGUucHJvdG90eXBlICovIHtcblx0XHRjb25zdHJ1Y3RvcjogU29ydGFibGUsXG5cblx0XHRfY29tcHV0ZUlzQWxpZ25lZDogZnVuY3Rpb24oZXZ0KSB7XG5cdFx0XHR2YXIgdGFyZ2V0O1xuXG5cdFx0XHRpZiAoZ2hvc3RFbCAmJiAhc3VwcG9ydENzc1BvaW50ZXJFdmVudHMpIHtcblx0XHRcdFx0X2hpZGVHaG9zdEZvclRhcmdldCgpO1xuXHRcdFx0XHR0YXJnZXQgPSBkb2N1bWVudC5lbGVtZW50RnJvbVBvaW50KGV2dC5jbGllbnRYLCBldnQuY2xpZW50WSk7XG5cdFx0XHRcdF91bmhpZGVHaG9zdEZvclRhcmdldCgpO1xuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0dGFyZ2V0ID0gZXZ0LnRhcmdldDtcblx0XHRcdH1cblxuXHRcdFx0dGFyZ2V0ID0gX2Nsb3Nlc3QodGFyZ2V0LCB0aGlzLm9wdGlvbnMuZHJhZ2dhYmxlLCB0aGlzLmVsLCBmYWxzZSk7XG5cdFx0XHRpZiAoX2FsaWduZWRTaWxlbnQpIHJldHVybjtcblx0XHRcdGlmICghZHJhZ0VsIHx8IGRyYWdFbC5wYXJlbnROb2RlICE9PSB0aGlzLmVsKSByZXR1cm47XG5cblx0XHRcdHZhciBjaGlsZHJlbiA9IHRoaXMuZWwuY2hpbGRyZW47XG5cdFx0XHRmb3IgKHZhciBpID0gMDsgaSA8IGNoaWxkcmVuLmxlbmd0aDsgaSsrKSB7XG5cdFx0XHRcdC8vIERvbid0IGNoYW5nZSBmb3IgdGFyZ2V0IGluIGNhc2UgaXQgaXMgY2hhbmdlZCB0byBhbGlnbmVkIGJlZm9yZSBvbkRyYWdPdmVyIGlzIGZpcmVkXG5cdFx0XHRcdGlmIChfY2xvc2VzdChjaGlsZHJlbltpXSwgdGhpcy5vcHRpb25zLmRyYWdnYWJsZSwgdGhpcy5lbCwgZmFsc2UpICYmIGNoaWxkcmVuW2ldICE9PSB0YXJnZXQpIHtcblx0XHRcdFx0XHRjaGlsZHJlbltpXS5zb3J0YWJsZU1vdXNlQWxpZ25lZCA9IF9pc0NsaWVudEluUm93Q29sdW1uKGV2dC5jbGllbnRYLCBldnQuY2xpZW50WSwgY2hpbGRyZW5baV0sIHRoaXMuX2dldERpcmVjdGlvbihldnQsIG51bGwpLCB0aGlzLm9wdGlvbnMpO1xuXHRcdFx0XHR9XG5cdFx0XHR9XG5cdFx0XHQvLyBVc2VkIGZvciBudWxsaW5nIGxhc3QgdGFyZ2V0IHdoZW4gbm90IGluIGVsZW1lbnQsIG5vdGhpbmcgdG8gZG8gd2l0aCBjaGVja2luZyBpZiBhbGlnbmVkXG5cdFx0XHRpZiAoIV9jbG9zZXN0KHRhcmdldCwgdGhpcy5vcHRpb25zLmRyYWdnYWJsZSwgdGhpcy5lbCwgdHJ1ZSkpIHtcblx0XHRcdFx0bGFzdFRhcmdldCA9IG51bGw7XG5cdFx0XHR9XG5cblx0XHRcdF9hbGlnbmVkU2lsZW50ID0gdHJ1ZTtcblx0XHRcdHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG5cdFx0XHRcdF9hbGlnbmVkU2lsZW50ID0gZmFsc2U7XG5cdFx0XHR9LCAzMCk7XG5cblx0XHR9LFxuXG5cdFx0X2dldERpcmVjdGlvbjogZnVuY3Rpb24oZXZ0LCB0YXJnZXQpIHtcblx0XHRcdHJldHVybiAodHlwZW9mIHRoaXMub3B0aW9ucy5kaXJlY3Rpb24gPT09ICdmdW5jdGlvbicpID8gdGhpcy5vcHRpb25zLmRpcmVjdGlvbi5jYWxsKHRoaXMsIGV2dCwgdGFyZ2V0LCBkcmFnRWwpIDogdGhpcy5vcHRpb25zLmRpcmVjdGlvbjtcblx0XHR9LFxuXG5cdFx0X29uVGFwU3RhcnQ6IGZ1bmN0aW9uICgvKiogRXZlbnR8VG91Y2hFdmVudCAqL2V2dCkge1xuXHRcdFx0aWYgKCFldnQuY2FuY2VsYWJsZSkgcmV0dXJuO1xuXHRcdFx0dmFyIF90aGlzID0gdGhpcyxcblx0XHRcdFx0ZWwgPSB0aGlzLmVsLFxuXHRcdFx0XHRvcHRpb25zID0gdGhpcy5vcHRpb25zLFxuXHRcdFx0XHRwcmV2ZW50T25GaWx0ZXIgPSBvcHRpb25zLnByZXZlbnRPbkZpbHRlcixcblx0XHRcdFx0dHlwZSA9IGV2dC50eXBlLFxuXHRcdFx0XHR0b3VjaCA9IGV2dC50b3VjaGVzICYmIGV2dC50b3VjaGVzWzBdLFxuXHRcdFx0XHR0YXJnZXQgPSAodG91Y2ggfHwgZXZ0KS50YXJnZXQsXG5cdFx0XHRcdG9yaWdpbmFsVGFyZ2V0ID0gZXZ0LnRhcmdldC5zaGFkb3dSb290ICYmICgoZXZ0LnBhdGggJiYgZXZ0LnBhdGhbMF0pIHx8IChldnQuY29tcG9zZWRQYXRoICYmIGV2dC5jb21wb3NlZFBhdGgoKVswXSkpIHx8IHRhcmdldCxcblx0XHRcdFx0ZmlsdGVyID0gb3B0aW9ucy5maWx0ZXIsXG5cdFx0XHRcdHN0YXJ0SW5kZXgsXG5cdFx0XHRcdHN0YXJ0RHJhZ2dhYmxlSW5kZXg7XG5cblx0XHRcdF9zYXZlSW5wdXRDaGVja2VkU3RhdGUoZWwpO1xuXG5cdFx0XHQvLyBEb24ndCB0cmlnZ2VyIHN0YXJ0IGV2ZW50IHdoZW4gYW4gZWxlbWVudCBpcyBiZWVuIGRyYWdnZWQsIG90aGVyd2lzZSB0aGUgZXZ0Lm9sZGluZGV4IGFsd2F5cyB3cm9uZyB3aGVuIHNldCBvcHRpb24uZ3JvdXAuXG5cdFx0XHRpZiAoZHJhZ0VsKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0aWYgKC9tb3VzZWRvd258cG9pbnRlcmRvd24vLnRlc3QodHlwZSkgJiYgZXZ0LmJ1dHRvbiAhPT0gMCB8fCBvcHRpb25zLmRpc2FibGVkKSB7XG5cdFx0XHRcdHJldHVybjsgLy8gb25seSBsZWZ0IGJ1dHRvbiBhbmQgZW5hYmxlZFxuXHRcdFx0fVxuXG5cdFx0XHQvLyBjYW5jZWwgZG5kIGlmIG9yaWdpbmFsIHRhcmdldCBpcyBjb250ZW50IGVkaXRhYmxlXG5cdFx0XHRpZiAob3JpZ2luYWxUYXJnZXQuaXNDb250ZW50RWRpdGFibGUpIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHR0YXJnZXQgPSBfY2xvc2VzdCh0YXJnZXQsIG9wdGlvbnMuZHJhZ2dhYmxlLCBlbCwgZmFsc2UpO1xuXG5cblx0XHRcdGlmIChsYXN0RG93bkVsID09PSB0YXJnZXQpIHtcblx0XHRcdFx0Ly8gSWdub3JpbmcgZHVwbGljYXRlIGBkb3duYFxuXHRcdFx0XHRyZXR1cm47XG5cdFx0XHR9XG5cblx0XHRcdC8vIEdldCB0aGUgaW5kZXggb2YgdGhlIGRyYWdnZWQgZWxlbWVudCB3aXRoaW4gaXRzIHBhcmVudFxuXHRcdFx0c3RhcnRJbmRleCA9IF9pbmRleCh0YXJnZXQpO1xuXHRcdFx0c3RhcnREcmFnZ2FibGVJbmRleCA9IF9pbmRleCh0YXJnZXQsIG9wdGlvbnMuZHJhZ2dhYmxlKTtcblxuXHRcdFx0Ly8gQ2hlY2sgZmlsdGVyXG5cdFx0XHRpZiAodHlwZW9mIGZpbHRlciA9PT0gJ2Z1bmN0aW9uJykge1xuXHRcdFx0XHRpZiAoZmlsdGVyLmNhbGwodGhpcywgZXZ0LCB0YXJnZXQsIHRoaXMpKSB7XG5cdFx0XHRcdFx0X2Rpc3BhdGNoRXZlbnQoX3RoaXMsIG9yaWdpbmFsVGFyZ2V0LCAnZmlsdGVyJywgdGFyZ2V0LCBlbCwgZWwsIHN0YXJ0SW5kZXgsIHVuZGVmaW5lZCwgc3RhcnREcmFnZ2FibGVJbmRleCk7XG5cdFx0XHRcdFx0cHJldmVudE9uRmlsdGVyICYmIGV2dC5jYW5jZWxhYmxlICYmIGV2dC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0XHRcdHJldHVybjsgLy8gY2FuY2VsIGRuZFxuXHRcdFx0XHR9XG5cdFx0XHR9XG5cdFx0XHRlbHNlIGlmIChmaWx0ZXIpIHtcblx0XHRcdFx0ZmlsdGVyID0gZmlsdGVyLnNwbGl0KCcsJykuc29tZShmdW5jdGlvbiAoY3JpdGVyaWEpIHtcblx0XHRcdFx0XHRjcml0ZXJpYSA9IF9jbG9zZXN0KG9yaWdpbmFsVGFyZ2V0LCBjcml0ZXJpYS50cmltKCksIGVsLCBmYWxzZSk7XG5cblx0XHRcdFx0XHRpZiAoY3JpdGVyaWEpIHtcblx0XHRcdFx0XHRcdF9kaXNwYXRjaEV2ZW50KF90aGlzLCBjcml0ZXJpYSwgJ2ZpbHRlcicsIHRhcmdldCwgZWwsIGVsLCBzdGFydEluZGV4LCB1bmRlZmluZWQsIHN0YXJ0RHJhZ2dhYmxlSW5kZXgpO1xuXHRcdFx0XHRcdFx0cmV0dXJuIHRydWU7XG5cdFx0XHRcdFx0fVxuXHRcdFx0XHR9KTtcblxuXHRcdFx0XHRpZiAoZmlsdGVyKSB7XG5cdFx0XHRcdFx0cHJldmVudE9uRmlsdGVyICYmIGV2dC5jYW5jZWxhYmxlICYmIGV2dC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0XHRcdHJldHVybjsgLy8gY2FuY2VsIGRuZFxuXHRcdFx0XHR9XG5cdFx0XHR9XG5cblx0XHRcdGlmIChvcHRpb25zLmhhbmRsZSAmJiAhX2Nsb3Nlc3Qob3JpZ2luYWxUYXJnZXQsIG9wdGlvbnMuaGFuZGxlLCBlbCwgZmFsc2UpKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0Ly8gUHJlcGFyZSBgZHJhZ3N0YXJ0YFxuXHRcdFx0dGhpcy5fcHJlcGFyZURyYWdTdGFydChldnQsIHRvdWNoLCB0YXJnZXQsIHN0YXJ0SW5kZXgsIHN0YXJ0RHJhZ2dhYmxlSW5kZXgpO1xuXHRcdH0sXG5cblxuXHRcdF9oYW5kbGVBdXRvU2Nyb2xsOiBmdW5jdGlvbihldnQsIGZhbGxiYWNrKSB7XG5cdFx0XHRpZiAoIWRyYWdFbCB8fCAhdGhpcy5vcHRpb25zLnNjcm9sbCkgcmV0dXJuO1xuXHRcdFx0dmFyIHggPSBldnQuY2xpZW50WCxcblx0XHRcdFx0eSA9IGV2dC5jbGllbnRZLFxuXG5cdFx0XHRcdGVsZW0gPSBkb2N1bWVudC5lbGVtZW50RnJvbVBvaW50KHgsIHkpLFxuXHRcdFx0XHRfdGhpcyA9IHRoaXM7XG5cblx0XHRcdC8vIElFIGRvZXMgbm90IHNlZW0gdG8gaGF2ZSBuYXRpdmUgYXV0b3Njcm9sbCxcblx0XHRcdC8vIEVkZ2UncyBhdXRvc2Nyb2xsIHNlZW1zIHRvbyBjb25kaXRpb25hbCxcblx0XHRcdC8vIE1BQ09TIFNhZmFyaSBkb2VzIG5vdCBoYXZlIGF1dG9zY3JvbGwsXG5cdFx0XHQvLyBGaXJlZm94IGFuZCBDaHJvbWUgYXJlIGdvb2Rcblx0XHRcdGlmIChmYWxsYmFjayB8fCBFZGdlIHx8IElFMTFPckxlc3MgfHwgU2FmYXJpKSB7XG5cdFx0XHRcdF9hdXRvU2Nyb2xsKGV2dCwgX3RoaXMub3B0aW9ucywgZWxlbSwgZmFsbGJhY2spO1xuXG5cdFx0XHRcdC8vIExpc3RlbmVyIGZvciBwb2ludGVyIGVsZW1lbnQgY2hhbmdlXG5cdFx0XHRcdHZhciBvZ0VsZW1TY3JvbGxlciA9IF9nZXRQYXJlbnRBdXRvU2Nyb2xsRWxlbWVudChlbGVtLCB0cnVlKTtcblx0XHRcdFx0aWYgKFxuXHRcdFx0XHRcdHNjcm9sbGluZyAmJlxuXHRcdFx0XHRcdChcblx0XHRcdFx0XHRcdCFwb2ludGVyRWxlbUNoYW5nZWRJbnRlcnZhbCB8fFxuXHRcdFx0XHRcdFx0eCAhPT0gbGFzdFBvaW50ZXJFbGVtWCB8fFxuXHRcdFx0XHRcdFx0eSAhPT0gbGFzdFBvaW50ZXJFbGVtWVxuXHRcdFx0XHRcdClcblx0XHRcdFx0KSB7XG5cblx0XHRcdFx0XHRwb2ludGVyRWxlbUNoYW5nZWRJbnRlcnZhbCAmJiBjbGVhckludGVydmFsKHBvaW50ZXJFbGVtQ2hhbmdlZEludGVydmFsKTtcblx0XHRcdFx0XHQvLyBEZXRlY3QgZm9yIHBvaW50ZXIgZWxlbSBjaGFuZ2UsIGVtdWxhdGluZyBuYXRpdmUgRG5EIGJlaGF2aW91clxuXHRcdFx0XHRcdHBvaW50ZXJFbGVtQ2hhbmdlZEludGVydmFsID0gc2V0SW50ZXJ2YWwoZnVuY3Rpb24oKSB7XG5cdFx0XHRcdFx0XHRpZiAoIWRyYWdFbCkgcmV0dXJuO1xuXHRcdFx0XHRcdFx0Ly8gY291bGQgYWxzbyBjaGVjayBpZiBzY3JvbGwgZGlyZWN0aW9uIG9uIG5ld0VsZW0gY2hhbmdlcyBkdWUgdG8gcGFyZW50IGF1dG9zY3JvbGxpbmdcblx0XHRcdFx0XHRcdHZhciBuZXdFbGVtID0gX2dldFBhcmVudEF1dG9TY3JvbGxFbGVtZW50KGRvY3VtZW50LmVsZW1lbnRGcm9tUG9pbnQoeCwgeSksIHRydWUpO1xuXHRcdFx0XHRcdFx0aWYgKG5ld0VsZW0gIT09IG9nRWxlbVNjcm9sbGVyKSB7XG5cdFx0XHRcdFx0XHRcdG9nRWxlbVNjcm9sbGVyID0gbmV3RWxlbTtcblx0XHRcdFx0XHRcdFx0X2NsZWFyQXV0b1Njcm9sbHMoKTtcblx0XHRcdFx0XHRcdFx0X2F1dG9TY3JvbGwoZXZ0LCBfdGhpcy5vcHRpb25zLCBvZ0VsZW1TY3JvbGxlciwgZmFsbGJhY2spO1xuXHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdH0sIDEwKTtcblx0XHRcdFx0XHRsYXN0UG9pbnRlckVsZW1YID0geDtcblx0XHRcdFx0XHRsYXN0UG9pbnRlckVsZW1ZID0geTtcblx0XHRcdFx0fVxuXG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHQvLyBpZiBEbkQgaXMgZW5hYmxlZCAoYW5kIGJyb3dzZXIgaGFzIGdvb2QgYXV0b3Njcm9sbGluZyksIGZpcnN0IGF1dG9zY3JvbGwgd2lsbCBhbHJlYWR5IHNjcm9sbCwgc28gZ2V0IHBhcmVudCBhdXRvc2Nyb2xsIG9mIGZpcnN0IGF1dG9zY3JvbGxcblx0XHRcdFx0aWYgKCFfdGhpcy5vcHRpb25zLmJ1YmJsZVNjcm9sbCB8fCBfZ2V0UGFyZW50QXV0b1Njcm9sbEVsZW1lbnQoZWxlbSwgdHJ1ZSkgPT09IF9nZXRXaW5kb3dTY3JvbGxpbmdFbGVtZW50KCkpIHtcblx0XHRcdFx0XHRfY2xlYXJBdXRvU2Nyb2xscygpO1xuXHRcdFx0XHRcdHJldHVybjtcblx0XHRcdFx0fVxuXHRcdFx0XHRfYXV0b1Njcm9sbChldnQsIF90aGlzLm9wdGlvbnMsIF9nZXRQYXJlbnRBdXRvU2Nyb2xsRWxlbWVudChlbGVtLCBmYWxzZSksIGZhbHNlKTtcblx0XHRcdH1cblx0XHR9LFxuXG5cdFx0X3ByZXBhcmVEcmFnU3RhcnQ6IGZ1bmN0aW9uICgvKiogRXZlbnQgKi9ldnQsIC8qKiBUb3VjaCAqL3RvdWNoLCAvKiogSFRNTEVsZW1lbnQgKi90YXJnZXQsIC8qKiBOdW1iZXIgKi9zdGFydEluZGV4LCAvKiogTnVtYmVyICovc3RhcnREcmFnZ2FibGVJbmRleCkge1xuXHRcdFx0dmFyIF90aGlzID0gdGhpcyxcblx0XHRcdFx0ZWwgPSBfdGhpcy5lbCxcblx0XHRcdFx0b3B0aW9ucyA9IF90aGlzLm9wdGlvbnMsXG5cdFx0XHRcdG93bmVyRG9jdW1lbnQgPSBlbC5vd25lckRvY3VtZW50LFxuXHRcdFx0XHRkcmFnU3RhcnRGbjtcblxuXHRcdFx0aWYgKHRhcmdldCAmJiAhZHJhZ0VsICYmICh0YXJnZXQucGFyZW50Tm9kZSA9PT0gZWwpKSB7XG5cdFx0XHRcdHJvb3RFbCA9IGVsO1xuXHRcdFx0XHRkcmFnRWwgPSB0YXJnZXQ7XG5cdFx0XHRcdHBhcmVudEVsID0gZHJhZ0VsLnBhcmVudE5vZGU7XG5cdFx0XHRcdG5leHRFbCA9IGRyYWdFbC5uZXh0U2libGluZztcblx0XHRcdFx0bGFzdERvd25FbCA9IHRhcmdldDtcblx0XHRcdFx0YWN0aXZlR3JvdXAgPSBvcHRpb25zLmdyb3VwO1xuXHRcdFx0XHRvbGRJbmRleCA9IHN0YXJ0SW5kZXg7XG5cdFx0XHRcdG9sZERyYWdnYWJsZUluZGV4ID0gc3RhcnREcmFnZ2FibGVJbmRleDtcblxuXHRcdFx0XHR0YXBFdnQgPSB7XG5cdFx0XHRcdFx0dGFyZ2V0OiBkcmFnRWwsXG5cdFx0XHRcdFx0Y2xpZW50WDogKHRvdWNoIHx8IGV2dCkuY2xpZW50WCxcblx0XHRcdFx0XHRjbGllbnRZOiAodG91Y2ggfHwgZXZ0KS5jbGllbnRZXG5cdFx0XHRcdH07XG5cblx0XHRcdFx0dGhpcy5fbGFzdFggPSAodG91Y2ggfHwgZXZ0KS5jbGllbnRYO1xuXHRcdFx0XHR0aGlzLl9sYXN0WSA9ICh0b3VjaCB8fCBldnQpLmNsaWVudFk7XG5cblx0XHRcdFx0ZHJhZ0VsLnN0eWxlWyd3aWxsLWNoYW5nZSddID0gJ2FsbCc7XG5cdFx0XHRcdC8vIHVuZG8gYW5pbWF0aW9uIGlmIG5lZWRlZFxuXHRcdFx0XHRkcmFnRWwuc3R5bGUudHJhbnNpdGlvbiA9ICcnO1xuXHRcdFx0XHRkcmFnRWwuc3R5bGUudHJhbnNmb3JtID0gJyc7XG5cblx0XHRcdFx0ZHJhZ1N0YXJ0Rm4gPSBmdW5jdGlvbiAoKSB7XG5cdFx0XHRcdFx0Ly8gRGVsYXllZCBkcmFnIGhhcyBiZWVuIHRyaWdnZXJlZFxuXHRcdFx0XHRcdC8vIHdlIGNhbiByZS1lbmFibGUgdGhlIGV2ZW50czogdG91Y2htb3ZlL21vdXNlbW92ZVxuXHRcdFx0XHRcdF90aGlzLl9kaXNhYmxlRGVsYXllZERyYWdFdmVudHMoKTtcblxuXHRcdFx0XHRcdGlmICghRmlyZUZveCAmJiBfdGhpcy5uYXRpdmVEcmFnZ2FibGUpIHtcblx0XHRcdFx0XHRcdGRyYWdFbC5kcmFnZ2FibGUgPSB0cnVlO1xuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdC8vIEJpbmQgdGhlIGV2ZW50czogZHJhZ3N0YXJ0L2RyYWdlbmRcblx0XHRcdFx0XHRfdGhpcy5fdHJpZ2dlckRyYWdTdGFydChldnQsIHRvdWNoKTtcblxuXHRcdFx0XHRcdC8vIERyYWcgc3RhcnQgZXZlbnRcblx0XHRcdFx0XHRfZGlzcGF0Y2hFdmVudChfdGhpcywgcm9vdEVsLCAnY2hvb3NlJywgZHJhZ0VsLCByb290RWwsIHJvb3RFbCwgb2xkSW5kZXgsIHVuZGVmaW5lZCwgb2xkRHJhZ2dhYmxlSW5kZXgpO1xuXG5cdFx0XHRcdFx0Ly8gQ2hvc2VuIGl0ZW1cblx0XHRcdFx0XHRfdG9nZ2xlQ2xhc3MoZHJhZ0VsLCBvcHRpb25zLmNob3NlbkNsYXNzLCB0cnVlKTtcblx0XHRcdFx0fTtcblxuXHRcdFx0XHQvLyBEaXNhYmxlIFwiZHJhZ2dhYmxlXCJcblx0XHRcdFx0b3B0aW9ucy5pZ25vcmUuc3BsaXQoJywnKS5mb3JFYWNoKGZ1bmN0aW9uIChjcml0ZXJpYSkge1xuXHRcdFx0XHRcdF9maW5kKGRyYWdFbCwgY3JpdGVyaWEudHJpbSgpLCBfZGlzYWJsZURyYWdnYWJsZSk7XG5cdFx0XHRcdH0pO1xuXG5cdFx0XHRcdF9vbihvd25lckRvY3VtZW50LCAnZHJhZ292ZXInLCBuZWFyZXN0RW1wdHlJbnNlcnREZXRlY3RFdmVudCk7XG5cdFx0XHRcdF9vbihvd25lckRvY3VtZW50LCAnbW91c2Vtb3ZlJywgbmVhcmVzdEVtcHR5SW5zZXJ0RGV0ZWN0RXZlbnQpO1xuXHRcdFx0XHRfb24ob3duZXJEb2N1bWVudCwgJ3RvdWNobW92ZScsIG5lYXJlc3RFbXB0eUluc2VydERldGVjdEV2ZW50KTtcblxuXHRcdFx0XHRfb24ob3duZXJEb2N1bWVudCwgJ21vdXNldXAnLCBfdGhpcy5fb25Ecm9wKTtcblx0XHRcdFx0X29uKG93bmVyRG9jdW1lbnQsICd0b3VjaGVuZCcsIF90aGlzLl9vbkRyb3ApO1xuXHRcdFx0XHRfb24ob3duZXJEb2N1bWVudCwgJ3RvdWNoY2FuY2VsJywgX3RoaXMuX29uRHJvcCk7XG5cblx0XHRcdFx0Ly8gTWFrZSBkcmFnRWwgZHJhZ2dhYmxlIChtdXN0IGJlIGJlZm9yZSBkZWxheSBmb3IgRmlyZUZveClcblx0XHRcdFx0aWYgKEZpcmVGb3ggJiYgdGhpcy5uYXRpdmVEcmFnZ2FibGUpIHtcblx0XHRcdFx0XHR0aGlzLm9wdGlvbnMudG91Y2hTdGFydFRocmVzaG9sZCA9IDQ7XG5cdFx0XHRcdFx0ZHJhZ0VsLmRyYWdnYWJsZSA9IHRydWU7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHQvLyBEZWxheSBpcyBpbXBvc3NpYmxlIGZvciBuYXRpdmUgRG5EIGluIEVkZ2Ugb3IgSUVcblx0XHRcdFx0aWYgKG9wdGlvbnMuZGVsYXkgJiYgKG9wdGlvbnMuZGVsYXlPblRvdWNoT25seSA/IHRvdWNoIDogdHJ1ZSkgJiYgKCF0aGlzLm5hdGl2ZURyYWdnYWJsZSB8fCAhKEVkZ2UgfHwgSUUxMU9yTGVzcykpKSB7XG5cdFx0XHRcdFx0Ly8gSWYgdGhlIHVzZXIgbW92ZXMgdGhlIHBvaW50ZXIgb3IgbGV0IGdvIHRoZSBjbGljayBvciB0b3VjaFxuXHRcdFx0XHRcdC8vIGJlZm9yZSB0aGUgZGVsYXkgaGFzIGJlZW4gcmVhY2hlZDpcblx0XHRcdFx0XHQvLyBkaXNhYmxlIHRoZSBkZWxheWVkIGRyYWdcblx0XHRcdFx0XHRfb24ob3duZXJEb2N1bWVudCwgJ21vdXNldXAnLCBfdGhpcy5fZGlzYWJsZURlbGF5ZWREcmFnKTtcblx0XHRcdFx0XHRfb24ob3duZXJEb2N1bWVudCwgJ3RvdWNoZW5kJywgX3RoaXMuX2Rpc2FibGVEZWxheWVkRHJhZyk7XG5cdFx0XHRcdFx0X29uKG93bmVyRG9jdW1lbnQsICd0b3VjaGNhbmNlbCcsIF90aGlzLl9kaXNhYmxlRGVsYXllZERyYWcpO1xuXHRcdFx0XHRcdF9vbihvd25lckRvY3VtZW50LCAnbW91c2Vtb3ZlJywgX3RoaXMuX2RlbGF5ZWREcmFnVG91Y2hNb3ZlSGFuZGxlcik7XG5cdFx0XHRcdFx0X29uKG93bmVyRG9jdW1lbnQsICd0b3VjaG1vdmUnLCBfdGhpcy5fZGVsYXllZERyYWdUb3VjaE1vdmVIYW5kbGVyKTtcblx0XHRcdFx0XHRvcHRpb25zLnN1cHBvcnRQb2ludGVyICYmIF9vbihvd25lckRvY3VtZW50LCAncG9pbnRlcm1vdmUnLCBfdGhpcy5fZGVsYXllZERyYWdUb3VjaE1vdmVIYW5kbGVyKTtcblxuXHRcdFx0XHRcdF90aGlzLl9kcmFnU3RhcnRUaW1lciA9IHNldFRpbWVvdXQoZHJhZ1N0YXJ0Rm4sIG9wdGlvbnMuZGVsYXkpO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdGRyYWdTdGFydEZuKCk7XG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9LFxuXG5cdFx0X2RlbGF5ZWREcmFnVG91Y2hNb3ZlSGFuZGxlcjogZnVuY3Rpb24gKC8qKiBUb3VjaEV2ZW50fFBvaW50ZXJFdmVudCAqKi9lKSB7XG5cdFx0XHR2YXIgdG91Y2ggPSBlLnRvdWNoZXMgPyBlLnRvdWNoZXNbMF0gOiBlO1xuXHRcdFx0aWYgKG1heChhYnModG91Y2guY2xpZW50WCAtIHRoaXMuX2xhc3RYKSwgYWJzKHRvdWNoLmNsaWVudFkgLSB0aGlzLl9sYXN0WSkpXG5cdFx0XHRcdFx0Pj0gTWF0aC5mbG9vcih0aGlzLm9wdGlvbnMudG91Y2hTdGFydFRocmVzaG9sZCAvICh0aGlzLm5hdGl2ZURyYWdnYWJsZSAmJiB3aW5kb3cuZGV2aWNlUGl4ZWxSYXRpbyB8fCAxKSlcblx0XHRcdCkge1xuXHRcdFx0XHR0aGlzLl9kaXNhYmxlRGVsYXllZERyYWcoKTtcblx0XHRcdH1cblx0XHR9LFxuXG5cdFx0X2Rpc2FibGVEZWxheWVkRHJhZzogZnVuY3Rpb24gKCkge1xuXHRcdFx0ZHJhZ0VsICYmIF9kaXNhYmxlRHJhZ2dhYmxlKGRyYWdFbCk7XG5cdFx0XHRjbGVhclRpbWVvdXQodGhpcy5fZHJhZ1N0YXJ0VGltZXIpO1xuXG5cdFx0XHR0aGlzLl9kaXNhYmxlRGVsYXllZERyYWdFdmVudHMoKTtcblx0XHR9LFxuXG5cdFx0X2Rpc2FibGVEZWxheWVkRHJhZ0V2ZW50czogZnVuY3Rpb24gKCkge1xuXHRcdFx0dmFyIG93bmVyRG9jdW1lbnQgPSB0aGlzLmVsLm93bmVyRG9jdW1lbnQ7XG5cdFx0XHRfb2ZmKG93bmVyRG9jdW1lbnQsICdtb3VzZXVwJywgdGhpcy5fZGlzYWJsZURlbGF5ZWREcmFnKTtcblx0XHRcdF9vZmYob3duZXJEb2N1bWVudCwgJ3RvdWNoZW5kJywgdGhpcy5fZGlzYWJsZURlbGF5ZWREcmFnKTtcblx0XHRcdF9vZmYob3duZXJEb2N1bWVudCwgJ3RvdWNoY2FuY2VsJywgdGhpcy5fZGlzYWJsZURlbGF5ZWREcmFnKTtcblx0XHRcdF9vZmYob3duZXJEb2N1bWVudCwgJ21vdXNlbW92ZScsIHRoaXMuX2RlbGF5ZWREcmFnVG91Y2hNb3ZlSGFuZGxlcik7XG5cdFx0XHRfb2ZmKG93bmVyRG9jdW1lbnQsICd0b3VjaG1vdmUnLCB0aGlzLl9kZWxheWVkRHJhZ1RvdWNoTW92ZUhhbmRsZXIpO1xuXHRcdFx0X29mZihvd25lckRvY3VtZW50LCAncG9pbnRlcm1vdmUnLCB0aGlzLl9kZWxheWVkRHJhZ1RvdWNoTW92ZUhhbmRsZXIpO1xuXHRcdH0sXG5cblx0XHRfdHJpZ2dlckRyYWdTdGFydDogZnVuY3Rpb24gKC8qKiBFdmVudCAqL2V2dCwgLyoqIFRvdWNoICovdG91Y2gpIHtcblx0XHRcdHRvdWNoID0gdG91Y2ggfHwgKGV2dC5wb2ludGVyVHlwZSA9PSAndG91Y2gnID8gZXZ0IDogbnVsbCk7XG5cblx0XHRcdGlmICghdGhpcy5uYXRpdmVEcmFnZ2FibGUgfHwgdG91Y2gpIHtcblx0XHRcdFx0aWYgKHRoaXMub3B0aW9ucy5zdXBwb3J0UG9pbnRlcikge1xuXHRcdFx0XHRcdF9vbihkb2N1bWVudCwgJ3BvaW50ZXJtb3ZlJywgdGhpcy5fb25Ub3VjaE1vdmUpO1xuXHRcdFx0XHR9IGVsc2UgaWYgKHRvdWNoKSB7XG5cdFx0XHRcdFx0X29uKGRvY3VtZW50LCAndG91Y2htb3ZlJywgdGhpcy5fb25Ub3VjaE1vdmUpO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdF9vbihkb2N1bWVudCwgJ21vdXNlbW92ZScsIHRoaXMuX29uVG91Y2hNb3ZlKTtcblx0XHRcdFx0fVxuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0X29uKGRyYWdFbCwgJ2RyYWdlbmQnLCB0aGlzKTtcblx0XHRcdFx0X29uKHJvb3RFbCwgJ2RyYWdzdGFydCcsIHRoaXMuX29uRHJhZ1N0YXJ0KTtcblx0XHRcdH1cblxuXHRcdFx0dHJ5IHtcblx0XHRcdFx0aWYgKGRvY3VtZW50LnNlbGVjdGlvbikge1xuXHRcdFx0XHRcdC8vIFRpbWVvdXQgbmVjY2Vzc2FyeSBmb3IgSUU5XG5cdFx0XHRcdFx0X25leHRUaWNrKGZ1bmN0aW9uICgpIHtcblx0XHRcdFx0XHRcdGRvY3VtZW50LnNlbGVjdGlvbi5lbXB0eSgpO1xuXHRcdFx0XHRcdH0pO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdHdpbmRvdy5nZXRTZWxlY3Rpb24oKS5yZW1vdmVBbGxSYW5nZXMoKTtcblx0XHRcdFx0fVxuXHRcdFx0fSBjYXRjaCAoZXJyKSB7XG5cdFx0XHR9XG5cdFx0fSxcblxuXHRcdF9kcmFnU3RhcnRlZDogZnVuY3Rpb24gKGZhbGxiYWNrLCBldnQpIHtcblx0XHRcdGF3YWl0aW5nRHJhZ1N0YXJ0ZWQgPSBmYWxzZTtcblx0XHRcdGlmIChyb290RWwgJiYgZHJhZ0VsKSB7XG5cdFx0XHRcdGlmICh0aGlzLm5hdGl2ZURyYWdnYWJsZSkge1xuXHRcdFx0XHRcdF9vbihkb2N1bWVudCwgJ2RyYWdvdmVyJywgdGhpcy5faGFuZGxlQXV0b1Njcm9sbCk7XG5cdFx0XHRcdFx0X29uKGRvY3VtZW50LCAnZHJhZ292ZXInLCBfY2hlY2tBbGlnbm1lbnQpO1xuXHRcdFx0XHR9XG5cdFx0XHRcdHZhciBvcHRpb25zID0gdGhpcy5vcHRpb25zO1xuXG5cdFx0XHRcdC8vIEFwcGx5IGVmZmVjdFxuXHRcdFx0XHQhZmFsbGJhY2sgJiYgX3RvZ2dsZUNsYXNzKGRyYWdFbCwgb3B0aW9ucy5kcmFnQ2xhc3MsIGZhbHNlKTtcblx0XHRcdFx0X3RvZ2dsZUNsYXNzKGRyYWdFbCwgb3B0aW9ucy5naG9zdENsYXNzLCB0cnVlKTtcblxuXHRcdFx0XHQvLyBJbiBjYXNlIGRyYWdnaW5nIGFuIGFuaW1hdGVkIGVsZW1lbnRcblx0XHRcdFx0X2NzcyhkcmFnRWwsICd0cmFuc2Zvcm0nLCAnJyk7XG5cblx0XHRcdFx0U29ydGFibGUuYWN0aXZlID0gdGhpcztcblxuXHRcdFx0XHRmYWxsYmFjayAmJiB0aGlzLl9hcHBlbmRHaG9zdCgpO1xuXG5cdFx0XHRcdC8vIERyYWcgc3RhcnQgZXZlbnRcblx0XHRcdFx0X2Rpc3BhdGNoRXZlbnQodGhpcywgcm9vdEVsLCAnc3RhcnQnLCBkcmFnRWwsIHJvb3RFbCwgcm9vdEVsLCBvbGRJbmRleCwgdW5kZWZpbmVkLCBvbGREcmFnZ2FibGVJbmRleCwgdW5kZWZpbmVkLCBldnQpO1xuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0dGhpcy5fbnVsbGluZygpO1xuXHRcdFx0fVxuXHRcdH0sXG5cblx0XHRfZW11bGF0ZURyYWdPdmVyOiBmdW5jdGlvbiAoZm9yQXV0b1Njcm9sbCkge1xuXHRcdFx0aWYgKHRvdWNoRXZ0KSB7XG5cdFx0XHRcdGlmICh0aGlzLl9sYXN0WCA9PT0gdG91Y2hFdnQuY2xpZW50WCAmJiB0aGlzLl9sYXN0WSA9PT0gdG91Y2hFdnQuY2xpZW50WSAmJiAhZm9yQXV0b1Njcm9sbCkge1xuXHRcdFx0XHRcdHJldHVybjtcblx0XHRcdFx0fVxuXHRcdFx0XHR0aGlzLl9sYXN0WCA9IHRvdWNoRXZ0LmNsaWVudFg7XG5cdFx0XHRcdHRoaXMuX2xhc3RZID0gdG91Y2hFdnQuY2xpZW50WTtcblxuXHRcdFx0XHRfaGlkZUdob3N0Rm9yVGFyZ2V0KCk7XG5cblx0XHRcdFx0dmFyIHRhcmdldCA9IGRvY3VtZW50LmVsZW1lbnRGcm9tUG9pbnQodG91Y2hFdnQuY2xpZW50WCwgdG91Y2hFdnQuY2xpZW50WSk7XG5cdFx0XHRcdHZhciBwYXJlbnQgPSB0YXJnZXQ7XG5cblx0XHRcdFx0d2hpbGUgKHRhcmdldCAmJiB0YXJnZXQuc2hhZG93Um9vdCkge1xuXHRcdFx0XHRcdHRhcmdldCA9IHRhcmdldC5zaGFkb3dSb290LmVsZW1lbnRGcm9tUG9pbnQodG91Y2hFdnQuY2xpZW50WCwgdG91Y2hFdnQuY2xpZW50WSk7XG5cdFx0XHRcdFx0aWYgKHRhcmdldCA9PT0gcGFyZW50KSBicmVhaztcblx0XHRcdFx0XHRwYXJlbnQgPSB0YXJnZXQ7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHRpZiAocGFyZW50KSB7XG5cdFx0XHRcdFx0ZG8ge1xuXHRcdFx0XHRcdFx0aWYgKHBhcmVudFtleHBhbmRvXSkge1xuXHRcdFx0XHRcdFx0XHR2YXIgaW5zZXJ0ZWQ7XG5cblx0XHRcdFx0XHRcdFx0aW5zZXJ0ZWQgPSBwYXJlbnRbZXhwYW5kb10uX29uRHJhZ092ZXIoe1xuXHRcdFx0XHRcdFx0XHRcdGNsaWVudFg6IHRvdWNoRXZ0LmNsaWVudFgsXG5cdFx0XHRcdFx0XHRcdFx0Y2xpZW50WTogdG91Y2hFdnQuY2xpZW50WSxcblx0XHRcdFx0XHRcdFx0XHR0YXJnZXQ6IHRhcmdldCxcblx0XHRcdFx0XHRcdFx0XHRyb290RWw6IHBhcmVudFxuXHRcdFx0XHRcdFx0XHR9KTtcblxuXHRcdFx0XHRcdFx0XHRpZiAoaW5zZXJ0ZWQgJiYgIXRoaXMub3B0aW9ucy5kcmFnb3ZlckJ1YmJsZSkge1xuXHRcdFx0XHRcdFx0XHRcdGJyZWFrO1xuXHRcdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0XHR9XG5cblx0XHRcdFx0XHRcdHRhcmdldCA9IHBhcmVudDsgLy8gc3RvcmUgbGFzdCBlbGVtZW50XG5cdFx0XHRcdFx0fVxuXHRcdFx0XHRcdC8qIGpzaGludCBib3NzOnRydWUgKi9cblx0XHRcdFx0XHR3aGlsZSAocGFyZW50ID0gcGFyZW50LnBhcmVudE5vZGUpO1xuXHRcdFx0XHR9XG5cdFx0XHRcdGRyYWdFbC5wYXJlbnROb2RlW2V4cGFuZG9dLl9jb21wdXRlSXNBbGlnbmVkKHRvdWNoRXZ0KTtcblxuXHRcdFx0XHRfdW5oaWRlR2hvc3RGb3JUYXJnZXQoKTtcblx0XHRcdH1cblx0XHR9LFxuXG5cblx0XHRfb25Ub3VjaE1vdmU6IGZ1bmN0aW9uICgvKipUb3VjaEV2ZW50Ki9ldnQsIGZvckF1dG9TY3JvbGwpIHtcblx0XHRcdGlmICh0YXBFdnQpIHtcblx0XHRcdFx0dmFyXHRvcHRpb25zID0gdGhpcy5vcHRpb25zLFxuXHRcdFx0XHRcdGZhbGxiYWNrVG9sZXJhbmNlID0gb3B0aW9ucy5mYWxsYmFja1RvbGVyYW5jZSxcblx0XHRcdFx0XHRmYWxsYmFja09mZnNldCA9IG9wdGlvbnMuZmFsbGJhY2tPZmZzZXQsXG5cdFx0XHRcdFx0dG91Y2ggPSBldnQudG91Y2hlcyA/IGV2dC50b3VjaGVzWzBdIDogZXZ0LFxuXHRcdFx0XHRcdG1hdHJpeCA9IGdob3N0RWwgJiYgX21hdHJpeChnaG9zdEVsKSxcblx0XHRcdFx0XHRzY2FsZVggPSBnaG9zdEVsICYmIG1hdHJpeCAmJiBtYXRyaXguYSxcblx0XHRcdFx0XHRzY2FsZVkgPSBnaG9zdEVsICYmIG1hdHJpeCAmJiBtYXRyaXguZCxcblx0XHRcdFx0XHRyZWxhdGl2ZVNjcm9sbE9mZnNldCA9IFBvc2l0aW9uR2hvc3RBYnNvbHV0ZWx5ICYmIGdob3N0UmVsYXRpdmVQYXJlbnQgJiYgX2dldFJlbGF0aXZlU2Nyb2xsT2Zmc2V0KGdob3N0UmVsYXRpdmVQYXJlbnQpLFxuXHRcdFx0XHRcdGR4ID0gKCh0b3VjaC5jbGllbnRYIC0gdGFwRXZ0LmNsaWVudFgpXG5cdFx0XHRcdFx0XHRcdCsgZmFsbGJhY2tPZmZzZXQueCkgLyAoc2NhbGVYIHx8IDEpXG5cdFx0XHRcdFx0XHRcdCsgKHJlbGF0aXZlU2Nyb2xsT2Zmc2V0ID8gKHJlbGF0aXZlU2Nyb2xsT2Zmc2V0WzBdIC0gZ2hvc3RSZWxhdGl2ZVBhcmVudEluaXRpYWxTY3JvbGxbMF0pIDogMCkgLyAoc2NhbGVYIHx8IDEpLFxuXHRcdFx0XHRcdGR5ID0gKCh0b3VjaC5jbGllbnRZIC0gdGFwRXZ0LmNsaWVudFkpXG5cdFx0XHRcdFx0XHRcdCsgZmFsbGJhY2tPZmZzZXQueSkgLyAoc2NhbGVZIHx8IDEpXG5cdFx0XHRcdFx0XHRcdCsgKHJlbGF0aXZlU2Nyb2xsT2Zmc2V0ID8gKHJlbGF0aXZlU2Nyb2xsT2Zmc2V0WzFdIC0gZ2hvc3RSZWxhdGl2ZVBhcmVudEluaXRpYWxTY3JvbGxbMV0pIDogMCkgLyAoc2NhbGVZIHx8IDEpLFxuXHRcdFx0XHRcdHRyYW5zbGF0ZTNkID0gZXZ0LnRvdWNoZXMgPyAndHJhbnNsYXRlM2QoJyArIGR4ICsgJ3B4LCcgKyBkeSArICdweCwwKScgOiAndHJhbnNsYXRlKCcgKyBkeCArICdweCwnICsgZHkgKyAncHgpJztcblxuXHRcdFx0XHQvLyBvbmx5IHNldCB0aGUgc3RhdHVzIHRvIGRyYWdnaW5nLCB3aGVuIHdlIGFyZSBhY3R1YWxseSBkcmFnZ2luZ1xuXHRcdFx0XHRpZiAoIVNvcnRhYmxlLmFjdGl2ZSAmJiAhYXdhaXRpbmdEcmFnU3RhcnRlZCkge1xuXHRcdFx0XHRcdGlmIChmYWxsYmFja1RvbGVyYW5jZSAmJlxuXHRcdFx0XHRcdFx0bWluKGFicyh0b3VjaC5jbGllbnRYIC0gdGhpcy5fbGFzdFgpLCBhYnModG91Y2guY2xpZW50WSAtIHRoaXMuX2xhc3RZKSkgPCBmYWxsYmFja1RvbGVyYW5jZVxuXHRcdFx0XHRcdCkge1xuXHRcdFx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0XHR0aGlzLl9vbkRyYWdTdGFydChldnQsIHRydWUpO1xuXHRcdFx0XHR9XG5cblx0XHRcdFx0IWZvckF1dG9TY3JvbGwgJiYgdGhpcy5faGFuZGxlQXV0b1Njcm9sbCh0b3VjaCwgdHJ1ZSk7XG5cblx0XHRcdFx0bW92ZWQgPSB0cnVlO1xuXHRcdFx0XHR0b3VjaEV2dCA9IHRvdWNoO1xuXG5cdFx0XHRcdF9jc3MoZ2hvc3RFbCwgJ3dlYmtpdFRyYW5zZm9ybScsIHRyYW5zbGF0ZTNkKTtcblx0XHRcdFx0X2NzcyhnaG9zdEVsLCAnbW96VHJhbnNmb3JtJywgdHJhbnNsYXRlM2QpO1xuXHRcdFx0XHRfY3NzKGdob3N0RWwsICdtc1RyYW5zZm9ybScsIHRyYW5zbGF0ZTNkKTtcblx0XHRcdFx0X2NzcyhnaG9zdEVsLCAndHJhbnNmb3JtJywgdHJhbnNsYXRlM2QpO1xuXG5cdFx0XHRcdGV2dC5jYW5jZWxhYmxlICYmIGV2dC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0fVxuXHRcdH0sXG5cblx0XHRfYXBwZW5kR2hvc3Q6IGZ1bmN0aW9uICgpIHtcblx0XHRcdC8vIEJ1ZyBpZiB1c2luZyBzY2FsZSgpOiBodHRwczovL3N0YWNrb3ZlcmZsb3cuY29tL3F1ZXN0aW9ucy8yNjM3MDU4XG5cdFx0XHQvLyBOb3QgYmVpbmcgYWRqdXN0ZWQgZm9yXG5cdFx0XHRpZiAoIWdob3N0RWwpIHtcblx0XHRcdFx0dmFyIGNvbnRhaW5lciA9IHRoaXMub3B0aW9ucy5mYWxsYmFja09uQm9keSA/IGRvY3VtZW50LmJvZHkgOiByb290RWwsXG5cdFx0XHRcdFx0cmVjdCA9IF9nZXRSZWN0KGRyYWdFbCwgdHJ1ZSwgY29udGFpbmVyLCAhUG9zaXRpb25HaG9zdEFic29sdXRlbHkpLFxuXHRcdFx0XHRcdGNzcyA9IF9jc3MoZHJhZ0VsKSxcblx0XHRcdFx0XHRvcHRpb25zID0gdGhpcy5vcHRpb25zO1xuXG5cdFx0XHRcdC8vIFBvc2l0aW9uIGFic29sdXRlbHlcblx0XHRcdFx0aWYgKFBvc2l0aW9uR2hvc3RBYnNvbHV0ZWx5KSB7XG5cdFx0XHRcdFx0Ly8gR2V0IHJlbGF0aXZlbHkgcG9zaXRpb25lZCBwYXJlbnRcblx0XHRcdFx0XHRnaG9zdFJlbGF0aXZlUGFyZW50ID0gY29udGFpbmVyO1xuXG5cdFx0XHRcdFx0d2hpbGUgKFxuXHRcdFx0XHRcdFx0X2NzcyhnaG9zdFJlbGF0aXZlUGFyZW50LCAncG9zaXRpb24nKSA9PT0gJ3N0YXRpYycgJiZcblx0XHRcdFx0XHRcdF9jc3MoZ2hvc3RSZWxhdGl2ZVBhcmVudCwgJ3RyYW5zZm9ybScpID09PSAnbm9uZScgJiZcblx0XHRcdFx0XHRcdGdob3N0UmVsYXRpdmVQYXJlbnQgIT09IGRvY3VtZW50XG5cdFx0XHRcdFx0KSB7XG5cdFx0XHRcdFx0XHRnaG9zdFJlbGF0aXZlUGFyZW50ID0gZ2hvc3RSZWxhdGl2ZVBhcmVudC5wYXJlbnROb2RlO1xuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdGlmIChnaG9zdFJlbGF0aXZlUGFyZW50ICE9PSBkb2N1bWVudCkge1xuXHRcdFx0XHRcdFx0dmFyIGdob3N0UmVsYXRpdmVQYXJlbnRSZWN0ID0gX2dldFJlY3QoZ2hvc3RSZWxhdGl2ZVBhcmVudCwgdHJ1ZSk7XG5cblx0XHRcdFx0XHRcdHJlY3QudG9wIC09IGdob3N0UmVsYXRpdmVQYXJlbnRSZWN0LnRvcDtcblx0XHRcdFx0XHRcdHJlY3QubGVmdCAtPSBnaG9zdFJlbGF0aXZlUGFyZW50UmVjdC5sZWZ0O1xuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdGlmIChnaG9zdFJlbGF0aXZlUGFyZW50ICE9PSBkb2N1bWVudC5ib2R5ICYmIGdob3N0UmVsYXRpdmVQYXJlbnQgIT09IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudCkge1xuXHRcdFx0XHRcdFx0aWYgKGdob3N0UmVsYXRpdmVQYXJlbnQgPT09IGRvY3VtZW50KSBnaG9zdFJlbGF0aXZlUGFyZW50ID0gX2dldFdpbmRvd1Njcm9sbGluZ0VsZW1lbnQoKTtcblxuXHRcdFx0XHRcdFx0cmVjdC50b3AgKz0gZ2hvc3RSZWxhdGl2ZVBhcmVudC5zY3JvbGxUb3A7XG5cdFx0XHRcdFx0XHRyZWN0LmxlZnQgKz0gZ2hvc3RSZWxhdGl2ZVBhcmVudC5zY3JvbGxMZWZ0O1xuXHRcdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0XHRnaG9zdFJlbGF0aXZlUGFyZW50ID0gX2dldFdpbmRvd1Njcm9sbGluZ0VsZW1lbnQoKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0Z2hvc3RSZWxhdGl2ZVBhcmVudEluaXRpYWxTY3JvbGwgPSBfZ2V0UmVsYXRpdmVTY3JvbGxPZmZzZXQoZ2hvc3RSZWxhdGl2ZVBhcmVudCk7XG5cdFx0XHRcdH1cblxuXG5cdFx0XHRcdGdob3N0RWwgPSBkcmFnRWwuY2xvbmVOb2RlKHRydWUpO1xuXG5cdFx0XHRcdF90b2dnbGVDbGFzcyhnaG9zdEVsLCBvcHRpb25zLmdob3N0Q2xhc3MsIGZhbHNlKTtcblx0XHRcdFx0X3RvZ2dsZUNsYXNzKGdob3N0RWwsIG9wdGlvbnMuZmFsbGJhY2tDbGFzcywgdHJ1ZSk7XG5cdFx0XHRcdF90b2dnbGVDbGFzcyhnaG9zdEVsLCBvcHRpb25zLmRyYWdDbGFzcywgdHJ1ZSk7XG5cblx0XHRcdFx0X2NzcyhnaG9zdEVsLCAnYm94LXNpemluZycsICdib3JkZXItYm94Jyk7XG5cdFx0XHRcdF9jc3MoZ2hvc3RFbCwgJ21hcmdpbicsIDApO1xuXHRcdFx0XHRfY3NzKGdob3N0RWwsICd0b3AnLCByZWN0LnRvcCk7XG5cdFx0XHRcdF9jc3MoZ2hvc3RFbCwgJ2xlZnQnLCByZWN0LmxlZnQpO1xuXHRcdFx0XHRfY3NzKGdob3N0RWwsICd3aWR0aCcsIHJlY3Qud2lkdGgpO1xuXHRcdFx0XHRfY3NzKGdob3N0RWwsICdoZWlnaHQnLCByZWN0LmhlaWdodCk7XG5cdFx0XHRcdF9jc3MoZ2hvc3RFbCwgJ29wYWNpdHknLCAnMC44Jyk7XG5cdFx0XHRcdF9jc3MoZ2hvc3RFbCwgJ3Bvc2l0aW9uJywgKFBvc2l0aW9uR2hvc3RBYnNvbHV0ZWx5ID8gJ2Fic29sdXRlJyA6ICdmaXhlZCcpKTtcblx0XHRcdFx0X2NzcyhnaG9zdEVsLCAnekluZGV4JywgJzEwMDAwMCcpO1xuXHRcdFx0XHRfY3NzKGdob3N0RWwsICdwb2ludGVyRXZlbnRzJywgJ25vbmUnKTtcblxuXHRcdFx0XHRjb250YWluZXIuYXBwZW5kQ2hpbGQoZ2hvc3RFbCk7XG5cdFx0XHR9XG5cdFx0fSxcblxuXHRcdF9vbkRyYWdTdGFydDogZnVuY3Rpb24gKC8qKkV2ZW50Ki9ldnQsIC8qKmJvb2xlYW4qL2ZhbGxiYWNrKSB7XG5cdFx0XHR2YXIgX3RoaXMgPSB0aGlzO1xuXHRcdFx0dmFyIGRhdGFUcmFuc2ZlciA9IGV2dC5kYXRhVHJhbnNmZXI7XG5cdFx0XHR2YXIgb3B0aW9ucyA9IF90aGlzLm9wdGlvbnM7XG5cblx0XHRcdC8vIFNldHVwIGNsb25lXG5cdFx0XHRjbG9uZUVsID0gX2Nsb25lKGRyYWdFbCk7XG5cblx0XHRcdGNsb25lRWwuZHJhZ2dhYmxlID0gZmFsc2U7XG5cdFx0XHRjbG9uZUVsLnN0eWxlWyd3aWxsLWNoYW5nZSddID0gJyc7XG5cblx0XHRcdHRoaXMuX2hpZGVDbG9uZSgpO1xuXG5cdFx0XHRfdG9nZ2xlQ2xhc3MoY2xvbmVFbCwgX3RoaXMub3B0aW9ucy5jaG9zZW5DbGFzcywgZmFsc2UpO1xuXG5cblx0XHRcdC8vICMxMTQzOiBJRnJhbWUgc3VwcG9ydCB3b3JrYXJvdW5kXG5cdFx0XHRfdGhpcy5fY2xvbmVJZCA9IF9uZXh0VGljayhmdW5jdGlvbiAoKSB7XG5cdFx0XHRcdGlmICghX3RoaXMub3B0aW9ucy5yZW1vdmVDbG9uZU9uSGlkZSkge1xuXHRcdFx0XHRcdHJvb3RFbC5pbnNlcnRCZWZvcmUoY2xvbmVFbCwgZHJhZ0VsKTtcblx0XHRcdFx0fVxuXHRcdFx0XHRfZGlzcGF0Y2hFdmVudChfdGhpcywgcm9vdEVsLCAnY2xvbmUnLCBkcmFnRWwpO1xuXHRcdFx0fSk7XG5cblxuXHRcdFx0IWZhbGxiYWNrICYmIF90b2dnbGVDbGFzcyhkcmFnRWwsIG9wdGlvbnMuZHJhZ0NsYXNzLCB0cnVlKTtcblxuXHRcdFx0Ly8gU2V0IHByb3BlciBkcm9wIGV2ZW50c1xuXHRcdFx0aWYgKGZhbGxiYWNrKSB7XG5cdFx0XHRcdGlnbm9yZU5leHRDbGljayA9IHRydWU7XG5cdFx0XHRcdF90aGlzLl9sb29wSWQgPSBzZXRJbnRlcnZhbChfdGhpcy5fZW11bGF0ZURyYWdPdmVyLCA1MCk7XG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHQvLyBVbmRvIHdoYXQgd2FzIHNldCBpbiBfcHJlcGFyZURyYWdTdGFydCBiZWZvcmUgZHJhZyBzdGFydGVkXG5cdFx0XHRcdF9vZmYoZG9jdW1lbnQsICdtb3VzZXVwJywgX3RoaXMuX29uRHJvcCk7XG5cdFx0XHRcdF9vZmYoZG9jdW1lbnQsICd0b3VjaGVuZCcsIF90aGlzLl9vbkRyb3ApO1xuXHRcdFx0XHRfb2ZmKGRvY3VtZW50LCAndG91Y2hjYW5jZWwnLCBfdGhpcy5fb25Ecm9wKTtcblxuXHRcdFx0XHRpZiAoZGF0YVRyYW5zZmVyKSB7XG5cdFx0XHRcdFx0ZGF0YVRyYW5zZmVyLmVmZmVjdEFsbG93ZWQgPSAnbW92ZSc7XG5cdFx0XHRcdFx0b3B0aW9ucy5zZXREYXRhICYmIG9wdGlvbnMuc2V0RGF0YS5jYWxsKF90aGlzLCBkYXRhVHJhbnNmZXIsIGRyYWdFbCk7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHRfb24oZG9jdW1lbnQsICdkcm9wJywgX3RoaXMpO1xuXG5cdFx0XHRcdC8vICMxMjc2IGZpeDpcblx0XHRcdFx0X2NzcyhkcmFnRWwsICd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlWigwKScpO1xuXHRcdFx0fVxuXG5cdFx0XHRhd2FpdGluZ0RyYWdTdGFydGVkID0gdHJ1ZTtcblxuXHRcdFx0X3RoaXMuX2RyYWdTdGFydElkID0gX25leHRUaWNrKF90aGlzLl9kcmFnU3RhcnRlZC5iaW5kKF90aGlzLCBmYWxsYmFjaywgZXZ0KSk7XG5cdFx0XHRfb24oZG9jdW1lbnQsICdzZWxlY3RzdGFydCcsIF90aGlzKTtcblx0XHRcdGlmIChTYWZhcmkpIHtcblx0XHRcdFx0X2Nzcyhkb2N1bWVudC5ib2R5LCAndXNlci1zZWxlY3QnLCAnbm9uZScpO1xuXHRcdFx0fVxuXHRcdH0sXG5cblxuXHRcdC8vIFJldHVybnMgdHJ1ZSAtIGlmIG5vIGZ1cnRoZXIgYWN0aW9uIGlzIG5lZWRlZCAoZWl0aGVyIGluc2VydGVkIG9yIGFub3RoZXIgY29uZGl0aW9uKVxuXHRcdF9vbkRyYWdPdmVyOiBmdW5jdGlvbiAoLyoqRXZlbnQqL2V2dCkge1xuXHRcdFx0dmFyIGVsID0gdGhpcy5lbCxcblx0XHRcdFx0dGFyZ2V0ID0gZXZ0LnRhcmdldCxcblx0XHRcdFx0ZHJhZ1JlY3QsXG5cdFx0XHRcdHRhcmdldFJlY3QsXG5cdFx0XHRcdHJldmVydCxcblx0XHRcdFx0b3B0aW9ucyA9IHRoaXMub3B0aW9ucyxcblx0XHRcdFx0Z3JvdXAgPSBvcHRpb25zLmdyb3VwLFxuXHRcdFx0XHRhY3RpdmVTb3J0YWJsZSA9IFNvcnRhYmxlLmFjdGl2ZSxcblx0XHRcdFx0aXNPd25lciA9IChhY3RpdmVHcm91cCA9PT0gZ3JvdXApLFxuXHRcdFx0XHRjYW5Tb3J0ID0gb3B0aW9ucy5zb3J0LFxuXHRcdFx0XHRfdGhpcyA9IHRoaXM7XG5cblx0XHRcdGlmIChfc2lsZW50KSByZXR1cm47XG5cblx0XHRcdC8vIFJldHVybiBpbnZvY2F0aW9uIHdoZW4gZHJhZ0VsIGlzIGluc2VydGVkIChvciBjb21wbGV0ZWQpXG5cdFx0XHRmdW5jdGlvbiBjb21wbGV0ZWQoaW5zZXJ0aW9uKSB7XG5cdFx0XHRcdGlmIChpbnNlcnRpb24pIHtcblx0XHRcdFx0XHRpZiAoaXNPd25lcikge1xuXHRcdFx0XHRcdFx0YWN0aXZlU29ydGFibGUuX2hpZGVDbG9uZSgpO1xuXHRcdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0XHRhY3RpdmVTb3J0YWJsZS5fc2hvd0Nsb25lKF90aGlzKTtcblx0XHRcdFx0XHR9XG5cblx0XHRcdFx0XHRpZiAoYWN0aXZlU29ydGFibGUpIHtcblx0XHRcdFx0XHRcdC8vIFNldCBnaG9zdCBjbGFzcyB0byBuZXcgc29ydGFibGUncyBnaG9zdCBjbGFzc1xuXHRcdFx0XHRcdFx0X3RvZ2dsZUNsYXNzKGRyYWdFbCwgcHV0U29ydGFibGUgPyBwdXRTb3J0YWJsZS5vcHRpb25zLmdob3N0Q2xhc3MgOiBhY3RpdmVTb3J0YWJsZS5vcHRpb25zLmdob3N0Q2xhc3MsIGZhbHNlKTtcblx0XHRcdFx0XHRcdF90b2dnbGVDbGFzcyhkcmFnRWwsIG9wdGlvbnMuZ2hvc3RDbGFzcywgdHJ1ZSk7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0aWYgKHB1dFNvcnRhYmxlICE9PSBfdGhpcyAmJiBfdGhpcyAhPT0gU29ydGFibGUuYWN0aXZlKSB7XG5cdFx0XHRcdFx0XHRwdXRTb3J0YWJsZSA9IF90aGlzO1xuXHRcdFx0XHRcdH0gZWxzZSBpZiAoX3RoaXMgPT09IFNvcnRhYmxlLmFjdGl2ZSkge1xuXHRcdFx0XHRcdFx0cHV0U29ydGFibGUgPSBudWxsO1xuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdC8vIEFuaW1hdGlvblxuXHRcdFx0XHRcdGRyYWdSZWN0ICYmIF90aGlzLl9hbmltYXRlKGRyYWdSZWN0LCBkcmFnRWwpO1xuXHRcdFx0XHRcdHRhcmdldCAmJiB0YXJnZXRSZWN0ICYmIF90aGlzLl9hbmltYXRlKHRhcmdldFJlY3QsIHRhcmdldCk7XG5cdFx0XHRcdH1cblxuXG5cdFx0XHRcdC8vIE51bGwgbGFzdFRhcmdldCBpZiBpdCBpcyBub3QgaW5zaWRlIGEgcHJldmlvdXNseSBzd2FwcGVkIGVsZW1lbnRcblx0XHRcdFx0aWYgKCh0YXJnZXQgPT09IGRyYWdFbCAmJiAhZHJhZ0VsLmFuaW1hdGVkKSB8fCAodGFyZ2V0ID09PSBlbCAmJiAhdGFyZ2V0LmFuaW1hdGVkKSkge1xuXHRcdFx0XHRcdGxhc3RUYXJnZXQgPSBudWxsO1xuXHRcdFx0XHR9XG5cblx0XHRcdFx0Ly8gbm8gYnViYmxpbmcgYW5kIG5vdCBmYWxsYmFja1xuXHRcdFx0XHRpZiAoIW9wdGlvbnMuZHJhZ292ZXJCdWJibGUgJiYgIWV2dC5yb290RWwgJiYgdGFyZ2V0ICE9PSBkb2N1bWVudCkge1xuXHRcdFx0XHRcdF90aGlzLl9oYW5kbGVBdXRvU2Nyb2xsKGV2dCk7XG5cdFx0XHRcdFx0ZHJhZ0VsLnBhcmVudE5vZGVbZXhwYW5kb10uX2NvbXB1dGVJc0FsaWduZWQoZXZ0KTtcblxuXHRcdFx0XHRcdC8vIERvIG5vdCBkZXRlY3QgZm9yIGVtcHR5IGluc2VydCBpZiBhbHJlYWR5IGluc2VydGVkXG5cdFx0XHRcdFx0IWluc2VydGlvbiAmJiBuZWFyZXN0RW1wdHlJbnNlcnREZXRlY3RFdmVudChldnQpO1xuXHRcdFx0XHR9XG5cblx0XHRcdFx0IW9wdGlvbnMuZHJhZ292ZXJCdWJibGUgJiYgZXZ0LnN0b3BQcm9wYWdhdGlvbiAmJiBldnQuc3RvcFByb3BhZ2F0aW9uKCk7XG5cblx0XHRcdFx0cmV0dXJuIHRydWU7XG5cdFx0XHR9XG5cblx0XHRcdC8vIENhbGwgd2hlbiBkcmFnRWwgaGFzIGJlZW4gaW5zZXJ0ZWRcblx0XHRcdGZ1bmN0aW9uIGNoYW5nZWQoKSB7XG5cdFx0XHRcdF9kaXNwYXRjaEV2ZW50KF90aGlzLCByb290RWwsICdjaGFuZ2UnLCB0YXJnZXQsIGVsLCByb290RWwsIG9sZEluZGV4LCBfaW5kZXgoZHJhZ0VsKSwgb2xkRHJhZ2dhYmxlSW5kZXgsIF9pbmRleChkcmFnRWwsIG9wdGlvbnMuZHJhZ2dhYmxlKSwgZXZ0KTtcblx0XHRcdH1cblxuXG5cdFx0XHRpZiAoZXZ0LnByZXZlbnREZWZhdWx0ICE9PSB2b2lkIDApIHtcblx0XHRcdFx0ZXZ0LmNhbmNlbGFibGUgJiYgZXZ0LnByZXZlbnREZWZhdWx0KCk7XG5cdFx0XHR9XG5cblxuXHRcdFx0bW92ZWQgPSB0cnVlO1xuXG5cdFx0XHR0YXJnZXQgPSBfY2xvc2VzdCh0YXJnZXQsIG9wdGlvbnMuZHJhZ2dhYmxlLCBlbCwgdHJ1ZSk7XG5cblx0XHRcdC8vIHRhcmdldCBpcyBkcmFnRWwgb3IgdGFyZ2V0IGlzIGFuaW1hdGVkXG5cdFx0XHRpZiAoZHJhZ0VsLmNvbnRhaW5zKGV2dC50YXJnZXQpIHx8IHRhcmdldC5hbmltYXRlZCkge1xuXHRcdFx0XHRyZXR1cm4gY29tcGxldGVkKGZhbHNlKTtcblx0XHRcdH1cblxuXHRcdFx0aWYgKHRhcmdldCAhPT0gZHJhZ0VsKSB7XG5cdFx0XHRcdGlnbm9yZU5leHRDbGljayA9IGZhbHNlO1xuXHRcdFx0fVxuXG5cdFx0XHRpZiAoYWN0aXZlU29ydGFibGUgJiYgIW9wdGlvbnMuZGlzYWJsZWQgJiZcblx0XHRcdFx0KGlzT3duZXJcblx0XHRcdFx0XHQ/IGNhblNvcnQgfHwgKHJldmVydCA9ICFyb290RWwuY29udGFpbnMoZHJhZ0VsKSkgLy8gUmV2ZXJ0aW5nIGl0ZW0gaW50byB0aGUgb3JpZ2luYWwgbGlzdFxuXHRcdFx0XHRcdDogKFxuXHRcdFx0XHRcdFx0cHV0U29ydGFibGUgPT09IHRoaXMgfHxcblx0XHRcdFx0XHRcdChcblx0XHRcdFx0XHRcdFx0KHRoaXMubGFzdFB1dE1vZGUgPSBhY3RpdmVHcm91cC5jaGVja1B1bGwodGhpcywgYWN0aXZlU29ydGFibGUsIGRyYWdFbCwgZXZ0KSkgJiZcblx0XHRcdFx0XHRcdFx0Z3JvdXAuY2hlY2tQdXQodGhpcywgYWN0aXZlU29ydGFibGUsIGRyYWdFbCwgZXZ0KVxuXHRcdFx0XHRcdFx0KVxuXHRcdFx0XHRcdClcblx0XHRcdFx0KVxuXHRcdFx0KSB7XG5cdFx0XHRcdHZhciBheGlzID0gdGhpcy5fZ2V0RGlyZWN0aW9uKGV2dCwgdGFyZ2V0KTtcblxuXHRcdFx0XHRkcmFnUmVjdCA9IF9nZXRSZWN0KGRyYWdFbCk7XG5cblx0XHRcdFx0aWYgKHJldmVydCkge1xuXHRcdFx0XHRcdHRoaXMuX2hpZGVDbG9uZSgpO1xuXHRcdFx0XHRcdHBhcmVudEVsID0gcm9vdEVsOyAvLyBhY3R1YWxpemF0aW9uXG5cblx0XHRcdFx0XHRpZiAobmV4dEVsKSB7XG5cdFx0XHRcdFx0XHRyb290RWwuaW5zZXJ0QmVmb3JlKGRyYWdFbCwgbmV4dEVsKTtcblx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0cm9vdEVsLmFwcGVuZENoaWxkKGRyYWdFbCk7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0cmV0dXJuIGNvbXBsZXRlZCh0cnVlKTtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdHZhciBlbExhc3RDaGlsZCA9IF9sYXN0Q2hpbGQoZWwpO1xuXG5cdFx0XHRcdGlmICghZWxMYXN0Q2hpbGQgfHwgX2dob3N0SXNMYXN0KGV2dCwgYXhpcywgZWwpICYmICFlbExhc3RDaGlsZC5hbmltYXRlZCkge1xuXHRcdFx0XHRcdC8vIGFzc2lnbiB0YXJnZXQgb25seSBpZiBjb25kaXRpb24gaXMgdHJ1ZVxuXHRcdFx0XHRcdGlmIChlbExhc3RDaGlsZCAmJiBlbCA9PT0gZXZ0LnRhcmdldCkge1xuXHRcdFx0XHRcdFx0dGFyZ2V0ID0gZWxMYXN0Q2hpbGQ7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0aWYgKHRhcmdldCkge1xuXHRcdFx0XHRcdFx0dGFyZ2V0UmVjdCA9IF9nZXRSZWN0KHRhcmdldCk7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0aWYgKGlzT3duZXIpIHtcblx0XHRcdFx0XHRcdGFjdGl2ZVNvcnRhYmxlLl9oaWRlQ2xvbmUoKTtcblx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0YWN0aXZlU29ydGFibGUuX3Nob3dDbG9uZSh0aGlzKTtcblx0XHRcdFx0XHR9XG5cblx0XHRcdFx0XHRpZiAoX29uTW92ZShyb290RWwsIGVsLCBkcmFnRWwsIGRyYWdSZWN0LCB0YXJnZXQsIHRhcmdldFJlY3QsIGV2dCwgISF0YXJnZXQpICE9PSBmYWxzZSkge1xuXHRcdFx0XHRcdFx0ZWwuYXBwZW5kQ2hpbGQoZHJhZ0VsKTtcblx0XHRcdFx0XHRcdHBhcmVudEVsID0gZWw7IC8vIGFjdHVhbGl6YXRpb25cblx0XHRcdFx0XHRcdHJlYWxEcmFnRWxSZWN0ID0gbnVsbDtcblxuXHRcdFx0XHRcdFx0Y2hhbmdlZCgpO1xuXHRcdFx0XHRcdFx0cmV0dXJuIGNvbXBsZXRlZCh0cnVlKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH1cblx0XHRcdFx0ZWxzZSBpZiAodGFyZ2V0ICYmIHRhcmdldCAhPT0gZHJhZ0VsICYmIHRhcmdldC5wYXJlbnROb2RlID09PSBlbCkge1xuXHRcdFx0XHRcdHZhciBkaXJlY3Rpb24gPSAwLFxuXHRcdFx0XHRcdFx0dGFyZ2V0QmVmb3JlRmlyc3RTd2FwLFxuXHRcdFx0XHRcdFx0YWxpZ25lZCA9IHRhcmdldC5zb3J0YWJsZU1vdXNlQWxpZ25lZCxcblx0XHRcdFx0XHRcdGRpZmZlcmVudExldmVsID0gZHJhZ0VsLnBhcmVudE5vZGUgIT09IGVsLFxuXHRcdFx0XHRcdFx0c2lkZTEgPSBheGlzID09PSAndmVydGljYWwnID8gJ3RvcCcgOiAnbGVmdCcsXG5cdFx0XHRcdFx0XHRzY3JvbGxlZFBhc3RUb3AgPSBfaXNTY3JvbGxlZFBhc3QodGFyZ2V0LCAndG9wJykgfHwgX2lzU2Nyb2xsZWRQYXN0KGRyYWdFbCwgJ3RvcCcpLFxuXHRcdFx0XHRcdFx0c2Nyb2xsQmVmb3JlID0gc2Nyb2xsZWRQYXN0VG9wID8gc2Nyb2xsZWRQYXN0VG9wLnNjcm9sbFRvcCA6IHZvaWQgMDtcblxuXG5cdFx0XHRcdFx0aWYgKGxhc3RUYXJnZXQgIT09IHRhcmdldCkge1xuXHRcdFx0XHRcdFx0bGFzdE1vZGUgPSBudWxsO1xuXHRcdFx0XHRcdFx0dGFyZ2V0QmVmb3JlRmlyc3RTd2FwID0gX2dldFJlY3QodGFyZ2V0KVtzaWRlMV07XG5cdFx0XHRcdFx0XHRwYXN0Rmlyc3RJbnZlcnRUaHJlc2ggPSBmYWxzZTtcblx0XHRcdFx0XHR9XG5cblx0XHRcdFx0XHQvLyBSZWZlcmVuY2U6IGh0dHBzOi8vd3d3Lmx1Y2lkY2hhcnQuY29tL2RvY3VtZW50cy92aWV3LzEwZmEwZTkzLWUzNjItNDEyNi1hY2EyLWI3MDllZTU2YmQ4Yi8wXG5cdFx0XHRcdFx0aWYgKFxuXHRcdFx0XHRcdFx0X2lzRWxJblJvd0NvbHVtbihkcmFnRWwsIHRhcmdldCwgYXhpcykgJiYgYWxpZ25lZCB8fFxuXHRcdFx0XHRcdFx0ZGlmZmVyZW50TGV2ZWwgfHxcblx0XHRcdFx0XHRcdHNjcm9sbGVkUGFzdFRvcCB8fFxuXHRcdFx0XHRcdFx0b3B0aW9ucy5pbnZlcnRTd2FwIHx8XG5cdFx0XHRcdFx0XHRsYXN0TW9kZSA9PT0gJ2luc2VydCcgfHxcblx0XHRcdFx0XHRcdC8vIE5lZWRlZCwgaW4gdGhlIGNhc2UgdGhhdCB3ZSBhcmUgaW5zaWRlIHRhcmdldCBhbmQgaW5zZXJ0ZWQgYmVjYXVzZSBub3QgYWxpZ25lZC4uLiBhbGlnbmVkIHdpbGwgc3RheSBmYWxzZSB3aGlsZSBpbnNpZGVcblx0XHRcdFx0XHRcdC8vIGFuZCBsYXN0TW9kZSB3aWxsIGNoYW5nZSB0byAnaW5zZXJ0JywgYnV0IHdlIG11c3Qgc3dhcFxuXHRcdFx0XHRcdFx0bGFzdE1vZGUgPT09ICdzd2FwJ1xuXHRcdFx0XHRcdCkge1xuXHRcdFx0XHRcdFx0Ly8gTmV3IHRhcmdldCB0aGF0IHdlIHdpbGwgYmUgaW5zaWRlXG5cdFx0XHRcdFx0XHRpZiAobGFzdE1vZGUgIT09ICdzd2FwJykge1xuXHRcdFx0XHRcdFx0XHRpc0NpcmN1bXN0YW50aWFsSW52ZXJ0ID0gb3B0aW9ucy5pbnZlcnRTd2FwIHx8IGRpZmZlcmVudExldmVsO1xuXHRcdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0XHRkaXJlY3Rpb24gPSBfZ2V0U3dhcERpcmVjdGlvbihldnQsIHRhcmdldCwgYXhpcyxcblx0XHRcdFx0XHRcdFx0b3B0aW9ucy5zd2FwVGhyZXNob2xkLCBvcHRpb25zLmludmVydGVkU3dhcFRocmVzaG9sZCA9PSBudWxsID8gb3B0aW9ucy5zd2FwVGhyZXNob2xkIDogb3B0aW9ucy5pbnZlcnRlZFN3YXBUaHJlc2hvbGQsXG5cdFx0XHRcdFx0XHRcdGlzQ2lyY3Vtc3RhbnRpYWxJbnZlcnQsXG5cdFx0XHRcdFx0XHRcdGxhc3RUYXJnZXQgPT09IHRhcmdldCk7XG5cdFx0XHRcdFx0XHRsYXN0TW9kZSA9ICdzd2FwJztcblx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0Ly8gSW5zZXJ0IGF0IHBvc2l0aW9uXG5cdFx0XHRcdFx0XHRkaXJlY3Rpb24gPSBfZ2V0SW5zZXJ0RGlyZWN0aW9uKHRhcmdldCk7XG5cdFx0XHRcdFx0XHRsYXN0TW9kZSA9ICdpbnNlcnQnO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0XHRpZiAoZGlyZWN0aW9uID09PSAwKSByZXR1cm4gY29tcGxldGVkKGZhbHNlKTtcblxuXHRcdFx0XHRcdHJlYWxEcmFnRWxSZWN0ID0gbnVsbDtcblx0XHRcdFx0XHRsYXN0VGFyZ2V0ID0gdGFyZ2V0O1xuXG5cdFx0XHRcdFx0bGFzdERpcmVjdGlvbiA9IGRpcmVjdGlvbjtcblxuXHRcdFx0XHRcdHRhcmdldFJlY3QgPSBfZ2V0UmVjdCh0YXJnZXQpO1xuXG5cdFx0XHRcdFx0dmFyIG5leHRTaWJsaW5nID0gdGFyZ2V0Lm5leHRFbGVtZW50U2libGluZyxcblx0XHRcdFx0XHRcdGFmdGVyID0gZmFsc2U7XG5cblx0XHRcdFx0XHRhZnRlciA9IGRpcmVjdGlvbiA9PT0gMTtcblxuXHRcdFx0XHRcdHZhciBtb3ZlVmVjdG9yID0gX29uTW92ZShyb290RWwsIGVsLCBkcmFnRWwsIGRyYWdSZWN0LCB0YXJnZXQsIHRhcmdldFJlY3QsIGV2dCwgYWZ0ZXIpO1xuXG5cdFx0XHRcdFx0aWYgKG1vdmVWZWN0b3IgIT09IGZhbHNlKSB7XG5cdFx0XHRcdFx0XHRpZiAobW92ZVZlY3RvciA9PT0gMSB8fCBtb3ZlVmVjdG9yID09PSAtMSkge1xuXHRcdFx0XHRcdFx0XHRhZnRlciA9IChtb3ZlVmVjdG9yID09PSAxKTtcblx0XHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdFx0X3NpbGVudCA9IHRydWU7XG5cdFx0XHRcdFx0XHRzZXRUaW1lb3V0KF91bnNpbGVudCwgMzApO1xuXG5cdFx0XHRcdFx0XHRpZiAoaXNPd25lcikge1xuXHRcdFx0XHRcdFx0XHRhY3RpdmVTb3J0YWJsZS5faGlkZUNsb25lKCk7XG5cdFx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0XHRhY3RpdmVTb3J0YWJsZS5fc2hvd0Nsb25lKHRoaXMpO1xuXHRcdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0XHRpZiAoYWZ0ZXIgJiYgIW5leHRTaWJsaW5nKSB7XG5cdFx0XHRcdFx0XHRcdGVsLmFwcGVuZENoaWxkKGRyYWdFbCk7XG5cdFx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0XHR0YXJnZXQucGFyZW50Tm9kZS5pbnNlcnRCZWZvcmUoZHJhZ0VsLCBhZnRlciA/IG5leHRTaWJsaW5nIDogdGFyZ2V0KTtcblx0XHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdFx0Ly8gVW5kbyBjaHJvbWUncyBzY3JvbGwgYWRqdXN0bWVudFxuXHRcdFx0XHRcdFx0aWYgKHNjcm9sbGVkUGFzdFRvcCkge1xuXHRcdFx0XHRcdFx0XHRfc2Nyb2xsQnkoc2Nyb2xsZWRQYXN0VG9wLCAwLCBzY3JvbGxCZWZvcmUgLSBzY3JvbGxlZFBhc3RUb3Auc2Nyb2xsVG9wKTtcblx0XHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdFx0cGFyZW50RWwgPSBkcmFnRWwucGFyZW50Tm9kZTsgLy8gYWN0dWFsaXphdGlvblxuXG5cdFx0XHRcdFx0XHQvLyBtdXN0IGJlIGRvbmUgYmVmb3JlIGFuaW1hdGlvblxuXHRcdFx0XHRcdFx0aWYgKHRhcmdldEJlZm9yZUZpcnN0U3dhcCAhPT0gdW5kZWZpbmVkICYmICFpc0NpcmN1bXN0YW50aWFsSW52ZXJ0KSB7XG5cdFx0XHRcdFx0XHRcdHRhcmdldE1vdmVEaXN0YW5jZSA9IGFicyh0YXJnZXRCZWZvcmVGaXJzdFN3YXAgLSBfZ2V0UmVjdCh0YXJnZXQpW3NpZGUxXSk7XG5cdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0XHRjaGFuZ2VkKCk7XG5cblx0XHRcdFx0XHRcdHJldHVybiBjb21wbGV0ZWQodHJ1ZSk7XG5cdFx0XHRcdFx0fVxuXHRcdFx0XHR9XG5cblx0XHRcdFx0aWYgKGVsLmNvbnRhaW5zKGRyYWdFbCkpIHtcblx0XHRcdFx0XHRyZXR1cm4gY29tcGxldGVkKGZhbHNlKTtcblx0XHRcdFx0fVxuXHRcdFx0fVxuXG5cdFx0XHRyZXR1cm4gZmFsc2U7XG5cdFx0fSxcblxuXHRcdF9hbmltYXRlOiBmdW5jdGlvbiAocHJldlJlY3QsIHRhcmdldCkge1xuXHRcdFx0dmFyIG1zID0gdGhpcy5vcHRpb25zLmFuaW1hdGlvbjtcblxuXHRcdFx0aWYgKG1zKSB7XG5cdFx0XHRcdHZhciBjdXJyZW50UmVjdCA9IF9nZXRSZWN0KHRhcmdldCk7XG5cblx0XHRcdFx0aWYgKHRhcmdldCA9PT0gZHJhZ0VsKSB7XG5cdFx0XHRcdFx0cmVhbERyYWdFbFJlY3QgPSBjdXJyZW50UmVjdDtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGlmIChwcmV2UmVjdC5ub2RlVHlwZSA9PT0gMSkge1xuXHRcdFx0XHRcdHByZXZSZWN0ID0gX2dldFJlY3QocHJldlJlY3QpO1xuXHRcdFx0XHR9XG5cblx0XHRcdFx0Ly8gQ2hlY2sgaWYgYWN0dWFsbHkgbW92aW5nIHBvc2l0aW9uXG5cdFx0XHRcdGlmICgocHJldlJlY3QubGVmdCArIHByZXZSZWN0LndpZHRoIC8gMikgIT09IChjdXJyZW50UmVjdC5sZWZ0ICsgY3VycmVudFJlY3Qud2lkdGggLyAyKVxuXHRcdFx0XHRcdHx8IChwcmV2UmVjdC50b3AgKyBwcmV2UmVjdC5oZWlnaHQgLyAyKSAhPT0gKGN1cnJlbnRSZWN0LnRvcCArIGN1cnJlbnRSZWN0LmhlaWdodCAvIDIpXG5cdFx0XHRcdCkge1xuXHRcdFx0XHRcdHZhciBtYXRyaXggPSBfbWF0cml4KHRoaXMuZWwpLFxuXHRcdFx0XHRcdFx0c2NhbGVYID0gbWF0cml4ICYmIG1hdHJpeC5hLFxuXHRcdFx0XHRcdFx0c2NhbGVZID0gbWF0cml4ICYmIG1hdHJpeC5kO1xuXG5cdFx0XHRcdFx0X2Nzcyh0YXJnZXQsICd0cmFuc2l0aW9uJywgJ25vbmUnKTtcblx0XHRcdFx0XHRfY3NzKHRhcmdldCwgJ3RyYW5zZm9ybScsICd0cmFuc2xhdGUzZCgnXG5cdFx0XHRcdFx0XHQrIChwcmV2UmVjdC5sZWZ0IC0gY3VycmVudFJlY3QubGVmdCkgLyAoc2NhbGVYID8gc2NhbGVYIDogMSkgKyAncHgsJ1xuXHRcdFx0XHRcdFx0KyAocHJldlJlY3QudG9wIC0gY3VycmVudFJlY3QudG9wKSAvIChzY2FsZVkgPyBzY2FsZVkgOiAxKSArICdweCwwKSdcblx0XHRcdFx0XHQpO1xuXG5cdFx0XHRcdFx0dGhpcy5fcmVwYWludCh0YXJnZXQpO1xuXHRcdFx0XHRcdF9jc3ModGFyZ2V0LCAndHJhbnNpdGlvbicsICd0cmFuc2Zvcm0gJyArIG1zICsgJ21zJyArICh0aGlzLm9wdGlvbnMuZWFzaW5nID8gJyAnICsgdGhpcy5vcHRpb25zLmVhc2luZyA6ICcnKSk7XG5cdFx0XHRcdFx0X2Nzcyh0YXJnZXQsICd0cmFuc2Zvcm0nLCAndHJhbnNsYXRlM2QoMCwwLDApJyk7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHQodHlwZW9mIHRhcmdldC5hbmltYXRlZCA9PT0gJ251bWJlcicpICYmIGNsZWFyVGltZW91dCh0YXJnZXQuYW5pbWF0ZWQpO1xuXHRcdFx0XHR0YXJnZXQuYW5pbWF0ZWQgPSBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcblx0XHRcdFx0XHRfY3NzKHRhcmdldCwgJ3RyYW5zaXRpb24nLCAnJyk7XG5cdFx0XHRcdFx0X2Nzcyh0YXJnZXQsICd0cmFuc2Zvcm0nLCAnJyk7XG5cdFx0XHRcdFx0dGFyZ2V0LmFuaW1hdGVkID0gZmFsc2U7XG5cdFx0XHRcdH0sIG1zKTtcblx0XHRcdH1cblx0XHR9LFxuXG5cdFx0X3JlcGFpbnQ6IGZ1bmN0aW9uKHRhcmdldCkge1xuXHRcdFx0cmV0dXJuIHRhcmdldC5vZmZzZXRXaWR0aDtcblx0XHR9LFxuXG5cdFx0X29mZk1vdmVFdmVudHM6IGZ1bmN0aW9uKCkge1xuXHRcdFx0X29mZihkb2N1bWVudCwgJ3RvdWNobW92ZScsIHRoaXMuX29uVG91Y2hNb3ZlKTtcblx0XHRcdF9vZmYoZG9jdW1lbnQsICdwb2ludGVybW92ZScsIHRoaXMuX29uVG91Y2hNb3ZlKTtcblx0XHRcdF9vZmYoZG9jdW1lbnQsICdkcmFnb3ZlcicsIG5lYXJlc3RFbXB0eUluc2VydERldGVjdEV2ZW50KTtcblx0XHRcdF9vZmYoZG9jdW1lbnQsICdtb3VzZW1vdmUnLCBuZWFyZXN0RW1wdHlJbnNlcnREZXRlY3RFdmVudCk7XG5cdFx0XHRfb2ZmKGRvY3VtZW50LCAndG91Y2htb3ZlJywgbmVhcmVzdEVtcHR5SW5zZXJ0RGV0ZWN0RXZlbnQpO1xuXHRcdH0sXG5cblx0XHRfb2ZmVXBFdmVudHM6IGZ1bmN0aW9uICgpIHtcblx0XHRcdHZhciBvd25lckRvY3VtZW50ID0gdGhpcy5lbC5vd25lckRvY3VtZW50O1xuXG5cdFx0XHRfb2ZmKG93bmVyRG9jdW1lbnQsICdtb3VzZXVwJywgdGhpcy5fb25Ecm9wKTtcblx0XHRcdF9vZmYob3duZXJEb2N1bWVudCwgJ3RvdWNoZW5kJywgdGhpcy5fb25Ecm9wKTtcblx0XHRcdF9vZmYob3duZXJEb2N1bWVudCwgJ3BvaW50ZXJ1cCcsIHRoaXMuX29uRHJvcCk7XG5cdFx0XHRfb2ZmKG93bmVyRG9jdW1lbnQsICd0b3VjaGNhbmNlbCcsIHRoaXMuX29uRHJvcCk7XG5cdFx0XHRfb2ZmKGRvY3VtZW50LCAnc2VsZWN0c3RhcnQnLCB0aGlzKTtcblx0XHR9LFxuXG5cdFx0X29uRHJvcDogZnVuY3Rpb24gKC8qKkV2ZW50Ki9ldnQpIHtcblx0XHRcdHZhciBlbCA9IHRoaXMuZWwsXG5cdFx0XHRcdG9wdGlvbnMgPSB0aGlzLm9wdGlvbnM7XG5cdFx0XHRhd2FpdGluZ0RyYWdTdGFydGVkID0gZmFsc2U7XG5cdFx0XHRzY3JvbGxpbmcgPSBmYWxzZTtcblx0XHRcdGlzQ2lyY3Vtc3RhbnRpYWxJbnZlcnQgPSBmYWxzZTtcblx0XHRcdHBhc3RGaXJzdEludmVydFRocmVzaCA9IGZhbHNlO1xuXG5cdFx0XHRjbGVhckludGVydmFsKHRoaXMuX2xvb3BJZCk7XG5cblx0XHRcdGNsZWFySW50ZXJ2YWwocG9pbnRlckVsZW1DaGFuZ2VkSW50ZXJ2YWwpO1xuXHRcdFx0X2NsZWFyQXV0b1Njcm9sbHMoKTtcblx0XHRcdF9jYW5jZWxUaHJvdHRsZSgpO1xuXG5cdFx0XHRjbGVhclRpbWVvdXQodGhpcy5fZHJhZ1N0YXJ0VGltZXIpO1xuXG5cdFx0XHRfY2FuY2VsTmV4dFRpY2sodGhpcy5fY2xvbmVJZCk7XG5cdFx0XHRfY2FuY2VsTmV4dFRpY2sodGhpcy5fZHJhZ1N0YXJ0SWQpO1xuXG5cdFx0XHQvLyBVbmJpbmQgZXZlbnRzXG5cdFx0XHRfb2ZmKGRvY3VtZW50LCAnbW91c2Vtb3ZlJywgdGhpcy5fb25Ub3VjaE1vdmUpO1xuXG5cblx0XHRcdGlmICh0aGlzLm5hdGl2ZURyYWdnYWJsZSkge1xuXHRcdFx0XHRfb2ZmKGRvY3VtZW50LCAnZHJvcCcsIHRoaXMpO1xuXHRcdFx0XHRfb2ZmKGVsLCAnZHJhZ3N0YXJ0JywgdGhpcy5fb25EcmFnU3RhcnQpO1xuXHRcdFx0XHRfb2ZmKGRvY3VtZW50LCAnZHJhZ292ZXInLCB0aGlzLl9oYW5kbGVBdXRvU2Nyb2xsKTtcblx0XHRcdFx0X29mZihkb2N1bWVudCwgJ2RyYWdvdmVyJywgX2NoZWNrQWxpZ25tZW50KTtcblx0XHRcdH1cblxuXHRcdFx0aWYgKFNhZmFyaSkge1xuXHRcdFx0XHRfY3NzKGRvY3VtZW50LmJvZHksICd1c2VyLXNlbGVjdCcsICcnKTtcblx0XHRcdH1cblxuXHRcdFx0dGhpcy5fb2ZmTW92ZUV2ZW50cygpO1xuXHRcdFx0dGhpcy5fb2ZmVXBFdmVudHMoKTtcblxuXHRcdFx0aWYgKGV2dCkge1xuXHRcdFx0XHRpZiAobW92ZWQpIHtcblx0XHRcdFx0XHRldnQuY2FuY2VsYWJsZSAmJiBldnQucHJldmVudERlZmF1bHQoKTtcblx0XHRcdFx0XHQhb3B0aW9ucy5kcm9wQnViYmxlICYmIGV2dC5zdG9wUHJvcGFnYXRpb24oKTtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGdob3N0RWwgJiYgZ2hvc3RFbC5wYXJlbnROb2RlICYmIGdob3N0RWwucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChnaG9zdEVsKTtcblxuXHRcdFx0XHRpZiAocm9vdEVsID09PSBwYXJlbnRFbCB8fCAocHV0U29ydGFibGUgJiYgcHV0U29ydGFibGUubGFzdFB1dE1vZGUgIT09ICdjbG9uZScpKSB7XG5cdFx0XHRcdFx0Ly8gUmVtb3ZlIGNsb25lXG5cdFx0XHRcdFx0Y2xvbmVFbCAmJiBjbG9uZUVsLnBhcmVudE5vZGUgJiYgY2xvbmVFbC5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKGNsb25lRWwpO1xuXHRcdFx0XHR9XG5cblx0XHRcdFx0aWYgKGRyYWdFbCkge1xuXHRcdFx0XHRcdGlmICh0aGlzLm5hdGl2ZURyYWdnYWJsZSkge1xuXHRcdFx0XHRcdFx0X29mZihkcmFnRWwsICdkcmFnZW5kJywgdGhpcyk7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0X2Rpc2FibGVEcmFnZ2FibGUoZHJhZ0VsKTtcblx0XHRcdFx0XHRkcmFnRWwuc3R5bGVbJ3dpbGwtY2hhbmdlJ10gPSAnJztcblxuXHRcdFx0XHRcdC8vIFJlbW92ZSBjbGFzcydzXG5cdFx0XHRcdFx0X3RvZ2dsZUNsYXNzKGRyYWdFbCwgcHV0U29ydGFibGUgPyBwdXRTb3J0YWJsZS5vcHRpb25zLmdob3N0Q2xhc3MgOiB0aGlzLm9wdGlvbnMuZ2hvc3RDbGFzcywgZmFsc2UpO1xuXHRcdFx0XHRcdF90b2dnbGVDbGFzcyhkcmFnRWwsIHRoaXMub3B0aW9ucy5jaG9zZW5DbGFzcywgZmFsc2UpO1xuXG5cdFx0XHRcdFx0Ly8gRHJhZyBzdG9wIGV2ZW50XG5cdFx0XHRcdFx0X2Rpc3BhdGNoRXZlbnQodGhpcywgcm9vdEVsLCAndW5jaG9vc2UnLCBkcmFnRWwsIHBhcmVudEVsLCByb290RWwsIG9sZEluZGV4LCBudWxsLCBvbGREcmFnZ2FibGVJbmRleCwgbnVsbCwgZXZ0KTtcblxuXHRcdFx0XHRcdGlmIChyb290RWwgIT09IHBhcmVudEVsKSB7XG5cdFx0XHRcdFx0XHRuZXdJbmRleCA9IF9pbmRleChkcmFnRWwpO1xuXHRcdFx0XHRcdFx0bmV3RHJhZ2dhYmxlSW5kZXggPSBfaW5kZXgoZHJhZ0VsLCBvcHRpb25zLmRyYWdnYWJsZSk7XG5cblx0XHRcdFx0XHRcdGlmIChuZXdJbmRleCA+PSAwKSB7XG5cdFx0XHRcdFx0XHRcdC8vIEFkZCBldmVudFxuXHRcdFx0XHRcdFx0XHRfZGlzcGF0Y2hFdmVudChudWxsLCBwYXJlbnRFbCwgJ2FkZCcsIGRyYWdFbCwgcGFyZW50RWwsIHJvb3RFbCwgb2xkSW5kZXgsIG5ld0luZGV4LCBvbGREcmFnZ2FibGVJbmRleCwgbmV3RHJhZ2dhYmxlSW5kZXgsIGV2dCk7XG5cblx0XHRcdFx0XHRcdFx0Ly8gUmVtb3ZlIGV2ZW50XG5cdFx0XHRcdFx0XHRcdF9kaXNwYXRjaEV2ZW50KHRoaXMsIHJvb3RFbCwgJ3JlbW92ZScsIGRyYWdFbCwgcGFyZW50RWwsIHJvb3RFbCwgb2xkSW5kZXgsIG5ld0luZGV4LCBvbGREcmFnZ2FibGVJbmRleCwgbmV3RHJhZ2dhYmxlSW5kZXgsIGV2dCk7XG5cblx0XHRcdFx0XHRcdFx0Ly8gZHJhZyBmcm9tIG9uZSBsaXN0IGFuZCBkcm9wIGludG8gYW5vdGhlclxuXHRcdFx0XHRcdFx0XHRfZGlzcGF0Y2hFdmVudChudWxsLCBwYXJlbnRFbCwgJ3NvcnQnLCBkcmFnRWwsIHBhcmVudEVsLCByb290RWwsIG9sZEluZGV4LCBuZXdJbmRleCwgb2xkRHJhZ2dhYmxlSW5kZXgsIG5ld0RyYWdnYWJsZUluZGV4LCBldnQpO1xuXHRcdFx0XHRcdFx0XHRfZGlzcGF0Y2hFdmVudCh0aGlzLCByb290RWwsICdzb3J0JywgZHJhZ0VsLCBwYXJlbnRFbCwgcm9vdEVsLCBvbGRJbmRleCwgbmV3SW5kZXgsIG9sZERyYWdnYWJsZUluZGV4LCBuZXdEcmFnZ2FibGVJbmRleCwgZXZ0KTtcblx0XHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdFx0cHV0U29ydGFibGUgJiYgcHV0U29ydGFibGUuc2F2ZSgpO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0XHRlbHNlIHtcblx0XHRcdFx0XHRcdGlmIChkcmFnRWwubmV4dFNpYmxpbmcgIT09IG5leHRFbCkge1xuXHRcdFx0XHRcdFx0XHQvLyBHZXQgdGhlIGluZGV4IG9mIHRoZSBkcmFnZ2VkIGVsZW1lbnQgd2l0aGluIGl0cyBwYXJlbnRcblx0XHRcdFx0XHRcdFx0bmV3SW5kZXggPSBfaW5kZXgoZHJhZ0VsKTtcblx0XHRcdFx0XHRcdFx0bmV3RHJhZ2dhYmxlSW5kZXggPSBfaW5kZXgoZHJhZ0VsLCBvcHRpb25zLmRyYWdnYWJsZSk7XG5cblx0XHRcdFx0XHRcdFx0aWYgKG5ld0luZGV4ID49IDApIHtcblx0XHRcdFx0XHRcdFx0XHQvLyBkcmFnICYgZHJvcCB3aXRoaW4gdGhlIHNhbWUgbGlzdFxuXHRcdFx0XHRcdFx0XHRcdF9kaXNwYXRjaEV2ZW50KHRoaXMsIHJvb3RFbCwgJ3VwZGF0ZScsIGRyYWdFbCwgcGFyZW50RWwsIHJvb3RFbCwgb2xkSW5kZXgsIG5ld0luZGV4LCBvbGREcmFnZ2FibGVJbmRleCwgbmV3RHJhZ2dhYmxlSW5kZXgsIGV2dCk7XG5cdFx0XHRcdFx0XHRcdFx0X2Rpc3BhdGNoRXZlbnQodGhpcywgcm9vdEVsLCAnc29ydCcsIGRyYWdFbCwgcGFyZW50RWwsIHJvb3RFbCwgb2xkSW5kZXgsIG5ld0luZGV4LCBvbGREcmFnZ2FibGVJbmRleCwgbmV3RHJhZ2dhYmxlSW5kZXgsIGV2dCk7XG5cdFx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHRcdH1cblx0XHRcdFx0XHR9XG5cblx0XHRcdFx0XHRpZiAoU29ydGFibGUuYWN0aXZlKSB7XG5cdFx0XHRcdFx0XHQvKiBqc2hpbnQgZXFudWxsOnRydWUgKi9cblx0XHRcdFx0XHRcdGlmIChuZXdJbmRleCA9PSBudWxsIHx8IG5ld0luZGV4ID09PSAtMSkge1xuXHRcdFx0XHRcdFx0XHRuZXdJbmRleCA9IG9sZEluZGV4O1xuXHRcdFx0XHRcdFx0XHRuZXdEcmFnZ2FibGVJbmRleCA9IG9sZERyYWdnYWJsZUluZGV4O1xuXHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdFx0X2Rpc3BhdGNoRXZlbnQodGhpcywgcm9vdEVsLCAnZW5kJywgZHJhZ0VsLCBwYXJlbnRFbCwgcm9vdEVsLCBvbGRJbmRleCwgbmV3SW5kZXgsIG9sZERyYWdnYWJsZUluZGV4LCBuZXdEcmFnZ2FibGVJbmRleCwgZXZ0KTtcblxuXHRcdFx0XHRcdFx0Ly8gU2F2ZSBzb3J0aW5nXG5cdFx0XHRcdFx0XHR0aGlzLnNhdmUoKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH1cblxuXHRcdFx0fVxuXHRcdFx0dGhpcy5fbnVsbGluZygpO1xuXHRcdH0sXG5cblx0XHRfbnVsbGluZzogZnVuY3Rpb24oKSB7XG5cdFx0XHRyb290RWwgPVxuXHRcdFx0ZHJhZ0VsID1cblx0XHRcdHBhcmVudEVsID1cblx0XHRcdGdob3N0RWwgPVxuXHRcdFx0bmV4dEVsID1cblx0XHRcdGNsb25lRWwgPVxuXHRcdFx0bGFzdERvd25FbCA9XG5cblx0XHRcdHNjcm9sbEVsID1cblx0XHRcdHNjcm9sbFBhcmVudEVsID1cblx0XHRcdGF1dG9TY3JvbGxzLmxlbmd0aCA9XG5cblx0XHRcdHBvaW50ZXJFbGVtQ2hhbmdlZEludGVydmFsID1cblx0XHRcdGxhc3RQb2ludGVyRWxlbVggPVxuXHRcdFx0bGFzdFBvaW50ZXJFbGVtWSA9XG5cblx0XHRcdHRhcEV2dCA9XG5cdFx0XHR0b3VjaEV2dCA9XG5cblx0XHRcdG1vdmVkID1cblx0XHRcdG5ld0luZGV4ID1cblx0XHRcdG9sZEluZGV4ID1cblxuXHRcdFx0bGFzdFRhcmdldCA9XG5cdFx0XHRsYXN0RGlyZWN0aW9uID1cblxuXHRcdFx0cmVhbERyYWdFbFJlY3QgPVxuXG5cdFx0XHRwdXRTb3J0YWJsZSA9XG5cdFx0XHRhY3RpdmVHcm91cCA9XG5cdFx0XHRTb3J0YWJsZS5hY3RpdmUgPSBudWxsO1xuXG5cdFx0XHRzYXZlZElucHV0Q2hlY2tlZC5mb3JFYWNoKGZ1bmN0aW9uIChlbCkge1xuXHRcdFx0XHRlbC5jaGVja2VkID0gdHJ1ZTtcblx0XHRcdH0pO1xuXG5cdFx0XHRzYXZlZElucHV0Q2hlY2tlZC5sZW5ndGggPSAwO1xuXHRcdH0sXG5cblx0XHRoYW5kbGVFdmVudDogZnVuY3Rpb24gKC8qKkV2ZW50Ki9ldnQpIHtcblx0XHRcdHN3aXRjaCAoZXZ0LnR5cGUpIHtcblx0XHRcdFx0Y2FzZSAnZHJvcCc6XG5cdFx0XHRcdGNhc2UgJ2RyYWdlbmQnOlxuXHRcdFx0XHRcdHRoaXMuX29uRHJvcChldnQpO1xuXHRcdFx0XHRcdGJyZWFrO1xuXG5cdFx0XHRcdGNhc2UgJ2RyYWdlbnRlcic6XG5cdFx0XHRcdGNhc2UgJ2RyYWdvdmVyJzpcblx0XHRcdFx0XHRpZiAoZHJhZ0VsKSB7XG5cdFx0XHRcdFx0XHR0aGlzLl9vbkRyYWdPdmVyKGV2dCk7XG5cdFx0XHRcdFx0XHRfZ2xvYmFsRHJhZ092ZXIoZXZ0KTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0YnJlYWs7XG5cblx0XHRcdFx0Y2FzZSAnc2VsZWN0c3RhcnQnOlxuXHRcdFx0XHRcdGV2dC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0XHRcdGJyZWFrO1xuXHRcdFx0fVxuXHRcdH0sXG5cblxuXHRcdC8qKlxuXHRcdCAqIFNlcmlhbGl6ZXMgdGhlIGl0ZW0gaW50byBhbiBhcnJheSBvZiBzdHJpbmcuXG5cdFx0ICogQHJldHVybnMge1N0cmluZ1tdfVxuXHRcdCAqL1xuXHRcdHRvQXJyYXk6IGZ1bmN0aW9uICgpIHtcblx0XHRcdHZhciBvcmRlciA9IFtdLFxuXHRcdFx0XHRlbCxcblx0XHRcdFx0Y2hpbGRyZW4gPSB0aGlzLmVsLmNoaWxkcmVuLFxuXHRcdFx0XHRpID0gMCxcblx0XHRcdFx0biA9IGNoaWxkcmVuLmxlbmd0aCxcblx0XHRcdFx0b3B0aW9ucyA9IHRoaXMub3B0aW9ucztcblxuXHRcdFx0Zm9yICg7IGkgPCBuOyBpKyspIHtcblx0XHRcdFx0ZWwgPSBjaGlsZHJlbltpXTtcblx0XHRcdFx0aWYgKF9jbG9zZXN0KGVsLCBvcHRpb25zLmRyYWdnYWJsZSwgdGhpcy5lbCwgZmFsc2UpKSB7XG5cdFx0XHRcdFx0b3JkZXIucHVzaChlbC5nZXRBdHRyaWJ1dGUob3B0aW9ucy5kYXRhSWRBdHRyKSB8fCBfZ2VuZXJhdGVJZChlbCkpO1xuXHRcdFx0XHR9XG5cdFx0XHR9XG5cblx0XHRcdHJldHVybiBvcmRlcjtcblx0XHR9LFxuXG5cblx0XHQvKipcblx0XHQgKiBTb3J0cyB0aGUgZWxlbWVudHMgYWNjb3JkaW5nIHRvIHRoZSBhcnJheS5cblx0XHQgKiBAcGFyYW0gIHtTdHJpbmdbXX0gIG9yZGVyICBvcmRlciBvZiB0aGUgaXRlbXNcblx0XHQgKi9cblx0XHRzb3J0OiBmdW5jdGlvbiAob3JkZXIpIHtcblx0XHRcdHZhciBpdGVtcyA9IHt9LCByb290RWwgPSB0aGlzLmVsO1xuXG5cdFx0XHR0aGlzLnRvQXJyYXkoKS5mb3JFYWNoKGZ1bmN0aW9uIChpZCwgaSkge1xuXHRcdFx0XHR2YXIgZWwgPSByb290RWwuY2hpbGRyZW5baV07XG5cblx0XHRcdFx0aWYgKF9jbG9zZXN0KGVsLCB0aGlzLm9wdGlvbnMuZHJhZ2dhYmxlLCByb290RWwsIGZhbHNlKSkge1xuXHRcdFx0XHRcdGl0ZW1zW2lkXSA9IGVsO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKTtcblxuXHRcdFx0b3JkZXIuZm9yRWFjaChmdW5jdGlvbiAoaWQpIHtcblx0XHRcdFx0aWYgKGl0ZW1zW2lkXSkge1xuXHRcdFx0XHRcdHJvb3RFbC5yZW1vdmVDaGlsZChpdGVtc1tpZF0pO1xuXHRcdFx0XHRcdHJvb3RFbC5hcHBlbmRDaGlsZChpdGVtc1tpZF0pO1xuXHRcdFx0XHR9XG5cdFx0XHR9KTtcblx0XHR9LFxuXG5cblx0XHQvKipcblx0XHQgKiBTYXZlIHRoZSBjdXJyZW50IHNvcnRpbmdcblx0XHQgKi9cblx0XHRzYXZlOiBmdW5jdGlvbiAoKSB7XG5cdFx0XHR2YXIgc3RvcmUgPSB0aGlzLm9wdGlvbnMuc3RvcmU7XG5cdFx0XHRzdG9yZSAmJiBzdG9yZS5zZXQgJiYgc3RvcmUuc2V0KHRoaXMpO1xuXHRcdH0sXG5cblxuXHRcdC8qKlxuXHRcdCAqIEZvciBlYWNoIGVsZW1lbnQgaW4gdGhlIHNldCwgZ2V0IHRoZSBmaXJzdCBlbGVtZW50IHRoYXQgbWF0Y2hlcyB0aGUgc2VsZWN0b3IgYnkgdGVzdGluZyB0aGUgZWxlbWVudCBpdHNlbGYgYW5kIHRyYXZlcnNpbmcgdXAgdGhyb3VnaCBpdHMgYW5jZXN0b3JzIGluIHRoZSBET00gdHJlZS5cblx0XHQgKiBAcGFyYW0gICB7SFRNTEVsZW1lbnR9ICBlbFxuXHRcdCAqIEBwYXJhbSAgIHtTdHJpbmd9ICAgICAgIFtzZWxlY3Rvcl0gIGRlZmF1bHQ6IGBvcHRpb25zLmRyYWdnYWJsZWBcblx0XHQgKiBAcmV0dXJucyB7SFRNTEVsZW1lbnR8bnVsbH1cblx0XHQgKi9cblx0XHRjbG9zZXN0OiBmdW5jdGlvbiAoZWwsIHNlbGVjdG9yKSB7XG5cdFx0XHRyZXR1cm4gX2Nsb3Nlc3QoZWwsIHNlbGVjdG9yIHx8IHRoaXMub3B0aW9ucy5kcmFnZ2FibGUsIHRoaXMuZWwsIGZhbHNlKTtcblx0XHR9LFxuXG5cblx0XHQvKipcblx0XHQgKiBTZXQvZ2V0IG9wdGlvblxuXHRcdCAqIEBwYXJhbSAgIHtzdHJpbmd9IG5hbWVcblx0XHQgKiBAcGFyYW0gICB7Kn0gICAgICBbdmFsdWVdXG5cdFx0ICogQHJldHVybnMgeyp9XG5cdFx0ICovXG5cdFx0b3B0aW9uOiBmdW5jdGlvbiAobmFtZSwgdmFsdWUpIHtcblx0XHRcdHZhciBvcHRpb25zID0gdGhpcy5vcHRpb25zO1xuXG5cdFx0XHRpZiAodmFsdWUgPT09IHZvaWQgMCkge1xuXHRcdFx0XHRyZXR1cm4gb3B0aW9uc1tuYW1lXTtcblx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdG9wdGlvbnNbbmFtZV0gPSB2YWx1ZTtcblxuXHRcdFx0XHRpZiAobmFtZSA9PT0gJ2dyb3VwJykge1xuXHRcdFx0XHRcdF9wcmVwYXJlR3JvdXAob3B0aW9ucyk7XG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9LFxuXG5cblx0XHQvKipcblx0XHQgKiBEZXN0cm95XG5cdFx0ICovXG5cdFx0ZGVzdHJveTogZnVuY3Rpb24gKCkge1xuXHRcdFx0dmFyIGVsID0gdGhpcy5lbDtcblxuXHRcdFx0ZWxbZXhwYW5kb10gPSBudWxsO1xuXG5cdFx0XHRfb2ZmKGVsLCAnbW91c2Vkb3duJywgdGhpcy5fb25UYXBTdGFydCk7XG5cdFx0XHRfb2ZmKGVsLCAndG91Y2hzdGFydCcsIHRoaXMuX29uVGFwU3RhcnQpO1xuXHRcdFx0X29mZihlbCwgJ3BvaW50ZXJkb3duJywgdGhpcy5fb25UYXBTdGFydCk7XG5cblx0XHRcdGlmICh0aGlzLm5hdGl2ZURyYWdnYWJsZSkge1xuXHRcdFx0XHRfb2ZmKGVsLCAnZHJhZ292ZXInLCB0aGlzKTtcblx0XHRcdFx0X29mZihlbCwgJ2RyYWdlbnRlcicsIHRoaXMpO1xuXHRcdFx0fVxuXHRcdFx0Ly8gUmVtb3ZlIGRyYWdnYWJsZSBhdHRyaWJ1dGVzXG5cdFx0XHRBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKGVsLnF1ZXJ5U2VsZWN0b3JBbGwoJ1tkcmFnZ2FibGVdJyksIGZ1bmN0aW9uIChlbCkge1xuXHRcdFx0XHRlbC5yZW1vdmVBdHRyaWJ1dGUoJ2RyYWdnYWJsZScpO1xuXHRcdFx0fSk7XG5cblx0XHRcdHRoaXMuX29uRHJvcCgpO1xuXG5cdFx0XHRzb3J0YWJsZXMuc3BsaWNlKHNvcnRhYmxlcy5pbmRleE9mKHRoaXMuZWwpLCAxKTtcblxuXHRcdFx0dGhpcy5lbCA9IGVsID0gbnVsbDtcblx0XHR9LFxuXG5cdFx0X2hpZGVDbG9uZTogZnVuY3Rpb24oKSB7XG5cdFx0XHRpZiAoIWNsb25lRWwuY2xvbmVIaWRkZW4pIHtcblx0XHRcdFx0X2NzcyhjbG9uZUVsLCAnZGlzcGxheScsICdub25lJyk7XG5cdFx0XHRcdGNsb25lRWwuY2xvbmVIaWRkZW4gPSB0cnVlO1xuXHRcdFx0XHRpZiAoY2xvbmVFbC5wYXJlbnROb2RlICYmIHRoaXMub3B0aW9ucy5yZW1vdmVDbG9uZU9uSGlkZSkge1xuXHRcdFx0XHRcdGNsb25lRWwucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChjbG9uZUVsKTtcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdH0sXG5cblx0XHRfc2hvd0Nsb25lOiBmdW5jdGlvbihwdXRTb3J0YWJsZSkge1xuXHRcdFx0aWYgKHB1dFNvcnRhYmxlLmxhc3RQdXRNb2RlICE9PSAnY2xvbmUnKSB7XG5cdFx0XHRcdHRoaXMuX2hpZGVDbG9uZSgpO1xuXHRcdFx0XHRyZXR1cm47XG5cdFx0XHR9XG5cblx0XHRcdGlmIChjbG9uZUVsLmNsb25lSGlkZGVuKSB7XG5cdFx0XHRcdC8vIHNob3cgY2xvbmUgYXQgZHJhZ0VsIG9yIG9yaWdpbmFsIHBvc2l0aW9uXG5cdFx0XHRcdGlmIChyb290RWwuY29udGFpbnMoZHJhZ0VsKSAmJiAhdGhpcy5vcHRpb25zLmdyb3VwLnJldmVydENsb25lKSB7XG5cdFx0XHRcdFx0cm9vdEVsLmluc2VydEJlZm9yZShjbG9uZUVsLCBkcmFnRWwpO1xuXHRcdFx0XHR9IGVsc2UgaWYgKG5leHRFbCkge1xuXHRcdFx0XHRcdHJvb3RFbC5pbnNlcnRCZWZvcmUoY2xvbmVFbCwgbmV4dEVsKTtcblx0XHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0XHRyb290RWwuYXBwZW5kQ2hpbGQoY2xvbmVFbCk7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHRpZiAodGhpcy5vcHRpb25zLmdyb3VwLnJldmVydENsb25lKSB7XG5cdFx0XHRcdFx0dGhpcy5fYW5pbWF0ZShkcmFnRWwsIGNsb25lRWwpO1xuXHRcdFx0XHR9XG5cdFx0XHRcdF9jc3MoY2xvbmVFbCwgJ2Rpc3BsYXknLCAnJyk7XG5cdFx0XHRcdGNsb25lRWwuY2xvbmVIaWRkZW4gPSBmYWxzZTtcblx0XHRcdH1cblx0XHR9XG5cdH07XG5cblx0ZnVuY3Rpb24gX2Nsb3Nlc3QoLyoqSFRNTEVsZW1lbnQqL2VsLCAvKipTdHJpbmcqL3NlbGVjdG9yLCAvKipIVE1MRWxlbWVudCovY3R4LCBpbmNsdWRlQ1RYKSB7XG5cdFx0aWYgKGVsKSB7XG5cdFx0XHRjdHggPSBjdHggfHwgZG9jdW1lbnQ7XG5cblx0XHRcdGRvIHtcblx0XHRcdFx0aWYgKFxuXHRcdFx0XHRcdHNlbGVjdG9yICE9IG51bGwgJiZcblx0XHRcdFx0XHQoXG5cdFx0XHRcdFx0XHRzZWxlY3RvclswXSA9PT0gJz4nID9cblx0XHRcdFx0XHRcdGVsLnBhcmVudE5vZGUgPT09IGN0eCAmJiBfbWF0Y2hlcyhlbCwgc2VsZWN0b3IpIDpcblx0XHRcdFx0XHRcdF9tYXRjaGVzKGVsLCBzZWxlY3Rvcilcblx0XHRcdFx0XHQpIHx8XG5cdFx0XHRcdFx0aW5jbHVkZUNUWCAmJiBlbCA9PT0gY3R4XG5cdFx0XHRcdCkge1xuXHRcdFx0XHRcdHJldHVybiBlbDtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGlmIChlbCA9PT0gY3R4KSBicmVhaztcblx0XHRcdFx0LyoganNoaW50IGJvc3M6dHJ1ZSAqL1xuXHRcdFx0fSB3aGlsZSAoZWwgPSBfZ2V0UGFyZW50T3JIb3N0KGVsKSk7XG5cdFx0fVxuXG5cdFx0cmV0dXJuIG51bGw7XG5cdH1cblxuXG5cdGZ1bmN0aW9uIF9nZXRQYXJlbnRPckhvc3QoZWwpIHtcblx0XHRyZXR1cm4gKGVsLmhvc3QgJiYgZWwgIT09IGRvY3VtZW50ICYmIGVsLmhvc3Qubm9kZVR5cGUpXG5cdFx0XHQ/IGVsLmhvc3Rcblx0XHRcdDogZWwucGFyZW50Tm9kZTtcblx0fVxuXG5cblx0ZnVuY3Rpb24gX2dsb2JhbERyYWdPdmVyKC8qKkV2ZW50Ki9ldnQpIHtcblx0XHRpZiAoZXZ0LmRhdGFUcmFuc2Zlcikge1xuXHRcdFx0ZXZ0LmRhdGFUcmFuc2Zlci5kcm9wRWZmZWN0ID0gJ21vdmUnO1xuXHRcdH1cblx0XHRldnQuY2FuY2VsYWJsZSAmJiBldnQucHJldmVudERlZmF1bHQoKTtcblx0fVxuXG5cblx0ZnVuY3Rpb24gX29uKGVsLCBldmVudCwgZm4pIHtcblx0XHRlbC5hZGRFdmVudExpc3RlbmVyKGV2ZW50LCBmbiwgSUUxMU9yTGVzcyA/IGZhbHNlIDogY2FwdHVyZU1vZGUpO1xuXHR9XG5cblxuXHRmdW5jdGlvbiBfb2ZmKGVsLCBldmVudCwgZm4pIHtcblx0XHRlbC5yZW1vdmVFdmVudExpc3RlbmVyKGV2ZW50LCBmbiwgSUUxMU9yTGVzcyA/IGZhbHNlIDogY2FwdHVyZU1vZGUpO1xuXHR9XG5cblxuXHRmdW5jdGlvbiBfdG9nZ2xlQ2xhc3MoZWwsIG5hbWUsIHN0YXRlKSB7XG5cdFx0aWYgKGVsICYmIG5hbWUpIHtcblx0XHRcdGlmIChlbC5jbGFzc0xpc3QpIHtcblx0XHRcdFx0ZWwuY2xhc3NMaXN0W3N0YXRlID8gJ2FkZCcgOiAncmVtb3ZlJ10obmFtZSk7XG5cdFx0XHR9XG5cdFx0XHRlbHNlIHtcblx0XHRcdFx0dmFyIGNsYXNzTmFtZSA9ICgnICcgKyBlbC5jbGFzc05hbWUgKyAnICcpLnJlcGxhY2UoUl9TUEFDRSwgJyAnKS5yZXBsYWNlKCcgJyArIG5hbWUgKyAnICcsICcgJyk7XG5cdFx0XHRcdGVsLmNsYXNzTmFtZSA9IChjbGFzc05hbWUgKyAoc3RhdGUgPyAnICcgKyBuYW1lIDogJycpKS5yZXBsYWNlKFJfU1BBQ0UsICcgJyk7XG5cdFx0XHR9XG5cdFx0fVxuXHR9XG5cblxuXHRmdW5jdGlvbiBfY3NzKGVsLCBwcm9wLCB2YWwpIHtcblx0XHR2YXIgc3R5bGUgPSBlbCAmJiBlbC5zdHlsZTtcblxuXHRcdGlmIChzdHlsZSkge1xuXHRcdFx0aWYgKHZhbCA9PT0gdm9pZCAwKSB7XG5cdFx0XHRcdGlmIChkb2N1bWVudC5kZWZhdWx0VmlldyAmJiBkb2N1bWVudC5kZWZhdWx0Vmlldy5nZXRDb21wdXRlZFN0eWxlKSB7XG5cdFx0XHRcdFx0dmFsID0gZG9jdW1lbnQuZGVmYXVsdFZpZXcuZ2V0Q29tcHV0ZWRTdHlsZShlbCwgJycpO1xuXHRcdFx0XHR9XG5cdFx0XHRcdGVsc2UgaWYgKGVsLmN1cnJlbnRTdHlsZSkge1xuXHRcdFx0XHRcdHZhbCA9IGVsLmN1cnJlbnRTdHlsZTtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdHJldHVybiBwcm9wID09PSB2b2lkIDAgPyB2YWwgOiB2YWxbcHJvcF07XG5cdFx0XHR9XG5cdFx0XHRlbHNlIHtcblx0XHRcdFx0aWYgKCEocHJvcCBpbiBzdHlsZSkgJiYgcHJvcC5pbmRleE9mKCd3ZWJraXQnKSA9PT0gLTEpIHtcblx0XHRcdFx0XHRwcm9wID0gJy13ZWJraXQtJyArIHByb3A7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHRzdHlsZVtwcm9wXSA9IHZhbCArICh0eXBlb2YgdmFsID09PSAnc3RyaW5nJyA/ICcnIDogJ3B4Jyk7XG5cdFx0XHR9XG5cdFx0fVxuXHR9XG5cblx0ZnVuY3Rpb24gX21hdHJpeChlbCkge1xuXHRcdHZhciBhcHBsaWVkVHJhbnNmb3JtcyA9ICcnO1xuXHRcdGRvIHtcblx0XHRcdHZhciB0cmFuc2Zvcm0gPSBfY3NzKGVsLCAndHJhbnNmb3JtJyk7XG5cblx0XHRcdGlmICh0cmFuc2Zvcm0gJiYgdHJhbnNmb3JtICE9PSAnbm9uZScpIHtcblx0XHRcdFx0YXBwbGllZFRyYW5zZm9ybXMgPSB0cmFuc2Zvcm0gKyAnICcgKyBhcHBsaWVkVHJhbnNmb3Jtcztcblx0XHRcdH1cblx0XHRcdC8qIGpzaGludCBib3NzOnRydWUgKi9cblx0XHR9IHdoaWxlIChlbCA9IGVsLnBhcmVudE5vZGUpO1xuXG5cdFx0aWYgKHdpbmRvdy5ET01NYXRyaXgpIHtcblx0XHRcdHJldHVybiBuZXcgRE9NTWF0cml4KGFwcGxpZWRUcmFuc2Zvcm1zKTtcblx0XHR9IGVsc2UgaWYgKHdpbmRvdy5XZWJLaXRDU1NNYXRyaXgpIHtcblx0XHRcdHJldHVybiBuZXcgV2ViS2l0Q1NTTWF0cml4KGFwcGxpZWRUcmFuc2Zvcm1zKTtcblx0XHR9IGVsc2UgaWYgKHdpbmRvdy5DU1NNYXRyaXgpIHtcblx0XHRcdHJldHVybiBuZXcgQ1NTTWF0cml4KGFwcGxpZWRUcmFuc2Zvcm1zKTtcblx0XHR9XG5cdH1cblxuXG5cdGZ1bmN0aW9uIF9maW5kKGN0eCwgdGFnTmFtZSwgaXRlcmF0b3IpIHtcblx0XHRpZiAoY3R4KSB7XG5cdFx0XHR2YXIgbGlzdCA9IGN0eC5nZXRFbGVtZW50c0J5VGFnTmFtZSh0YWdOYW1lKSwgaSA9IDAsIG4gPSBsaXN0Lmxlbmd0aDtcblxuXHRcdFx0aWYgKGl0ZXJhdG9yKSB7XG5cdFx0XHRcdGZvciAoOyBpIDwgbjsgaSsrKSB7XG5cdFx0XHRcdFx0aXRlcmF0b3IobGlzdFtpXSwgaSk7XG5cdFx0XHRcdH1cblx0XHRcdH1cblxuXHRcdFx0cmV0dXJuIGxpc3Q7XG5cdFx0fVxuXG5cdFx0cmV0dXJuIFtdO1xuXHR9XG5cblxuXG5cdGZ1bmN0aW9uIF9kaXNwYXRjaEV2ZW50KFxuXHRcdHNvcnRhYmxlLCByb290RWwsIG5hbWUsXG5cdFx0dGFyZ2V0RWwsIHRvRWwsIGZyb21FbCxcblx0XHRzdGFydEluZGV4LCBuZXdJbmRleCxcblx0XHRzdGFydERyYWdnYWJsZUluZGV4LCBuZXdEcmFnZ2FibGVJbmRleCxcblx0XHRvcmlnaW5hbEV2dFxuXHQpIHtcblx0XHRzb3J0YWJsZSA9IChzb3J0YWJsZSB8fCByb290RWxbZXhwYW5kb10pO1xuXHRcdHZhciBldnQsXG5cdFx0XHRvcHRpb25zID0gc29ydGFibGUub3B0aW9ucyxcblx0XHRcdG9uTmFtZSA9ICdvbicgKyBuYW1lLmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgbmFtZS5zdWJzdHIoMSk7XG5cdFx0Ly8gU3VwcG9ydCBmb3IgbmV3IEN1c3RvbUV2ZW50IGZlYXR1cmVcblx0XHRpZiAod2luZG93LkN1c3RvbUV2ZW50ICYmICFJRTExT3JMZXNzICYmICFFZGdlKSB7XG5cdFx0XHRldnQgPSBuZXcgQ3VzdG9tRXZlbnQobmFtZSwge1xuXHRcdFx0XHRidWJibGVzOiB0cnVlLFxuXHRcdFx0XHRjYW5jZWxhYmxlOiB0cnVlXG5cdFx0XHR9KTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0ZXZ0ID0gZG9jdW1lbnQuY3JlYXRlRXZlbnQoJ0V2ZW50Jyk7XG5cdFx0XHRldnQuaW5pdEV2ZW50KG5hbWUsIHRydWUsIHRydWUpO1xuXHRcdH1cblxuXHRcdGV2dC50byA9IHRvRWwgfHwgcm9vdEVsO1xuXHRcdGV2dC5mcm9tID0gZnJvbUVsIHx8IHJvb3RFbDtcblx0XHRldnQuaXRlbSA9IHRhcmdldEVsIHx8IHJvb3RFbDtcblx0XHRldnQuY2xvbmUgPSBjbG9uZUVsO1xuXG5cdFx0ZXZ0Lm9sZEluZGV4ID0gc3RhcnRJbmRleDtcblx0XHRldnQubmV3SW5kZXggPSBuZXdJbmRleDtcblxuXHRcdGV2dC5vbGREcmFnZ2FibGVJbmRleCA9IHN0YXJ0RHJhZ2dhYmxlSW5kZXg7XG5cdFx0ZXZ0Lm5ld0RyYWdnYWJsZUluZGV4ID0gbmV3RHJhZ2dhYmxlSW5kZXg7XG5cblx0XHRldnQub3JpZ2luYWxFdmVudCA9IG9yaWdpbmFsRXZ0O1xuXHRcdGV2dC5wdWxsTW9kZSA9IHB1dFNvcnRhYmxlID8gcHV0U29ydGFibGUubGFzdFB1dE1vZGUgOiB1bmRlZmluZWQ7XG5cblx0XHRpZiAocm9vdEVsKSB7XG5cdFx0XHRyb290RWwuZGlzcGF0Y2hFdmVudChldnQpO1xuXHRcdH1cblxuXHRcdGlmIChvcHRpb25zW29uTmFtZV0pIHtcblx0XHRcdG9wdGlvbnNbb25OYW1lXS5jYWxsKHNvcnRhYmxlLCBldnQpO1xuXHRcdH1cblx0fVxuXG5cblx0ZnVuY3Rpb24gX29uTW92ZShmcm9tRWwsIHRvRWwsIGRyYWdFbCwgZHJhZ1JlY3QsIHRhcmdldEVsLCB0YXJnZXRSZWN0LCBvcmlnaW5hbEV2dCwgd2lsbEluc2VydEFmdGVyKSB7XG5cdFx0dmFyIGV2dCxcblx0XHRcdHNvcnRhYmxlID0gZnJvbUVsW2V4cGFuZG9dLFxuXHRcdFx0b25Nb3ZlRm4gPSBzb3J0YWJsZS5vcHRpb25zLm9uTW92ZSxcblx0XHRcdHJldFZhbDtcblx0XHQvLyBTdXBwb3J0IGZvciBuZXcgQ3VzdG9tRXZlbnQgZmVhdHVyZVxuXHRcdGlmICh3aW5kb3cuQ3VzdG9tRXZlbnQgJiYgIUlFMTFPckxlc3MgJiYgIUVkZ2UpIHtcblx0XHRcdGV2dCA9IG5ldyBDdXN0b21FdmVudCgnbW92ZScsIHtcblx0XHRcdFx0YnViYmxlczogdHJ1ZSxcblx0XHRcdFx0Y2FuY2VsYWJsZTogdHJ1ZVxuXHRcdFx0fSk7XG5cdFx0fSBlbHNlIHtcblx0XHRcdGV2dCA9IGRvY3VtZW50LmNyZWF0ZUV2ZW50KCdFdmVudCcpO1xuXHRcdFx0ZXZ0LmluaXRFdmVudCgnbW92ZScsIHRydWUsIHRydWUpO1xuXHRcdH1cblxuXHRcdGV2dC50byA9IHRvRWw7XG5cdFx0ZXZ0LmZyb20gPSBmcm9tRWw7XG5cdFx0ZXZ0LmRyYWdnZWQgPSBkcmFnRWw7XG5cdFx0ZXZ0LmRyYWdnZWRSZWN0ID0gZHJhZ1JlY3Q7XG5cdFx0ZXZ0LnJlbGF0ZWQgPSB0YXJnZXRFbCB8fCB0b0VsO1xuXHRcdGV2dC5yZWxhdGVkUmVjdCA9IHRhcmdldFJlY3QgfHwgX2dldFJlY3QodG9FbCk7XG5cdFx0ZXZ0LndpbGxJbnNlcnRBZnRlciA9IHdpbGxJbnNlcnRBZnRlcjtcblxuXHRcdGV2dC5vcmlnaW5hbEV2ZW50ID0gb3JpZ2luYWxFdnQ7XG5cblx0XHRmcm9tRWwuZGlzcGF0Y2hFdmVudChldnQpO1xuXG5cdFx0aWYgKG9uTW92ZUZuKSB7XG5cdFx0XHRyZXRWYWwgPSBvbk1vdmVGbi5jYWxsKHNvcnRhYmxlLCBldnQsIG9yaWdpbmFsRXZ0KTtcblx0XHR9XG5cblx0XHRyZXR1cm4gcmV0VmFsO1xuXHR9XG5cblx0ZnVuY3Rpb24gX2Rpc2FibGVEcmFnZ2FibGUoZWwpIHtcblx0XHRlbC5kcmFnZ2FibGUgPSBmYWxzZTtcblx0fVxuXG5cdGZ1bmN0aW9uIF91bnNpbGVudCgpIHtcblx0XHRfc2lsZW50ID0gZmFsc2U7XG5cdH1cblxuXHQvKipcblx0ICogR2V0cyBudGggY2hpbGQgb2YgZWwsIGlnbm9yaW5nIGhpZGRlbiBjaGlsZHJlbiwgc29ydGFibGUncyBlbGVtZW50cyAoZG9lcyBub3QgaWdub3JlIGNsb25lIGlmIGl0J3MgdmlzaWJsZSlcblx0ICogYW5kIG5vbi1kcmFnZ2FibGUgZWxlbWVudHNcblx0ICogQHBhcmFtICB7SFRNTEVsZW1lbnR9IGVsICAgICAgIFRoZSBwYXJlbnQgZWxlbWVudFxuXHQgKiBAcGFyYW0gIHtOdW1iZXJ9IGNoaWxkTnVtICAgICAgVGhlIGluZGV4IG9mIHRoZSBjaGlsZFxuXHQgKiBAcGFyYW0gIHtPYmplY3R9IG9wdGlvbnMgICAgICAgUGFyZW50IFNvcnRhYmxlJ3Mgb3B0aW9uc1xuXHQgKiBAcmV0dXJuIHtIVE1MRWxlbWVudH0gICAgICAgICAgVGhlIGNoaWxkIGF0IGluZGV4IGNoaWxkTnVtLCBvciBudWxsIGlmIG5vdCBmb3VuZFxuXHQgKi9cblx0ZnVuY3Rpb24gX2dldENoaWxkKGVsLCBjaGlsZE51bSwgb3B0aW9ucykge1xuXHRcdHZhciBjdXJyZW50Q2hpbGQgPSAwLFxuXHRcdFx0aSA9IDAsXG5cdFx0XHRjaGlsZHJlbiA9IGVsLmNoaWxkcmVuO1xuXG5cdFx0d2hpbGUgKGkgPCBjaGlsZHJlbi5sZW5ndGgpIHtcblx0XHRcdGlmIChcblx0XHRcdFx0Y2hpbGRyZW5baV0uc3R5bGUuZGlzcGxheSAhPT0gJ25vbmUnICYmXG5cdFx0XHRcdGNoaWxkcmVuW2ldICE9PSBnaG9zdEVsICYmXG5cdFx0XHRcdGNoaWxkcmVuW2ldICE9PSBkcmFnRWwgJiZcblx0XHRcdFx0X2Nsb3Nlc3QoY2hpbGRyZW5baV0sIG9wdGlvbnMuZHJhZ2dhYmxlLCBlbCwgZmFsc2UpXG5cdFx0XHQpIHtcblx0XHRcdFx0aWYgKGN1cnJlbnRDaGlsZCA9PT0gY2hpbGROdW0pIHtcblx0XHRcdFx0XHRyZXR1cm4gY2hpbGRyZW5baV07XG5cdFx0XHRcdH1cblx0XHRcdFx0Y3VycmVudENoaWxkKys7XG5cdFx0XHR9XG5cblx0XHRcdGkrKztcblx0XHR9XG5cdFx0cmV0dXJuIG51bGw7XG5cdH1cblxuXHQvKipcblx0ICogR2V0cyB0aGUgbGFzdCBjaGlsZCBpbiB0aGUgZWwsIGlnbm9yaW5nIGdob3N0RWwgb3IgaW52aXNpYmxlIGVsZW1lbnRzIChjbG9uZXMpXG5cdCAqIEBwYXJhbSAge0hUTUxFbGVtZW50fSBlbCAgICAgICBQYXJlbnQgZWxlbWVudFxuXHQgKiBAcmV0dXJuIHtIVE1MRWxlbWVudH0gICAgICAgICAgVGhlIGxhc3QgY2hpbGQsIGlnbm9yaW5nIGdob3N0RWxcblx0ICovXG5cdGZ1bmN0aW9uIF9sYXN0Q2hpbGQoZWwpIHtcblx0XHR2YXIgbGFzdCA9IGVsLmxhc3RFbGVtZW50Q2hpbGQ7XG5cblx0XHR3aGlsZSAobGFzdCAmJiAobGFzdCA9PT0gZ2hvc3RFbCB8fCBfY3NzKGxhc3QsICdkaXNwbGF5JykgPT09ICdub25lJykpIHtcblx0XHRcdGxhc3QgPSBsYXN0LnByZXZpb3VzRWxlbWVudFNpYmxpbmc7XG5cdFx0fVxuXG5cdFx0cmV0dXJuIGxhc3QgfHwgbnVsbDtcblx0fVxuXG5cdGZ1bmN0aW9uIF9naG9zdElzTGFzdChldnQsIGF4aXMsIGVsKSB7XG5cdFx0dmFyIGVsUmVjdCA9IF9nZXRSZWN0KF9sYXN0Q2hpbGQoZWwpKSxcblx0XHRcdG1vdXNlT25BeGlzID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGV2dC5jbGllbnRZIDogZXZ0LmNsaWVudFgsXG5cdFx0XHRtb3VzZU9uT3BwQXhpcyA9IGF4aXMgPT09ICd2ZXJ0aWNhbCcgPyBldnQuY2xpZW50WCA6IGV2dC5jbGllbnRZLFxuXHRcdFx0dGFyZ2V0UzIgPSBheGlzID09PSAndmVydGljYWwnID8gZWxSZWN0LmJvdHRvbSA6IGVsUmVjdC5yaWdodCxcblx0XHRcdHRhcmdldFMxT3BwID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGVsUmVjdC5sZWZ0IDogZWxSZWN0LnRvcCxcblx0XHRcdHRhcmdldFMyT3BwID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGVsUmVjdC5yaWdodCA6IGVsUmVjdC5ib3R0b20sXG5cdFx0XHRzcGFjZXIgPSAxMDtcblxuXHRcdHJldHVybiAoXG5cdFx0XHRheGlzID09PSAndmVydGljYWwnID9cblx0XHRcdFx0KG1vdXNlT25PcHBBeGlzID4gdGFyZ2V0UzJPcHAgKyBzcGFjZXIgfHwgbW91c2VPbk9wcEF4aXMgPD0gdGFyZ2V0UzJPcHAgJiYgbW91c2VPbkF4aXMgPiB0YXJnZXRTMiAmJiBtb3VzZU9uT3BwQXhpcyA+PSB0YXJnZXRTMU9wcCkgOlxuXHRcdFx0XHQobW91c2VPbkF4aXMgPiB0YXJnZXRTMiAmJiBtb3VzZU9uT3BwQXhpcyA+IHRhcmdldFMxT3BwIHx8IG1vdXNlT25BeGlzIDw9IHRhcmdldFMyICYmIG1vdXNlT25PcHBBeGlzID4gdGFyZ2V0UzJPcHAgKyBzcGFjZXIpXG5cdFx0KTtcblx0fVxuXG5cdGZ1bmN0aW9uIF9nZXRTd2FwRGlyZWN0aW9uKGV2dCwgdGFyZ2V0LCBheGlzLCBzd2FwVGhyZXNob2xkLCBpbnZlcnRlZFN3YXBUaHJlc2hvbGQsIGludmVydFN3YXAsIGlzTGFzdFRhcmdldCkge1xuXHRcdHZhciB0YXJnZXRSZWN0ID0gX2dldFJlY3QodGFyZ2V0KSxcblx0XHRcdG1vdXNlT25BeGlzID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGV2dC5jbGllbnRZIDogZXZ0LmNsaWVudFgsXG5cdFx0XHR0YXJnZXRMZW5ndGggPSBheGlzID09PSAndmVydGljYWwnID8gdGFyZ2V0UmVjdC5oZWlnaHQgOiB0YXJnZXRSZWN0LndpZHRoLFxuXHRcdFx0dGFyZ2V0UzEgPSBheGlzID09PSAndmVydGljYWwnID8gdGFyZ2V0UmVjdC50b3AgOiB0YXJnZXRSZWN0LmxlZnQsXG5cdFx0XHR0YXJnZXRTMiA9IGF4aXMgPT09ICd2ZXJ0aWNhbCcgPyB0YXJnZXRSZWN0LmJvdHRvbSA6IHRhcmdldFJlY3QucmlnaHQsXG5cdFx0XHRkcmFnUmVjdCA9IF9nZXRSZWN0KGRyYWdFbCksXG5cdFx0XHRpbnZlcnQgPSBmYWxzZTtcblxuXG5cdFx0aWYgKCFpbnZlcnRTd2FwKSB7XG5cdFx0XHQvLyBOZXZlciBpbnZlcnQgb3IgY3JlYXRlIGRyYWdFbCBzaGFkb3cgd2hlbiB0YXJnZXQgbW92ZW1lbmV0IGNhdXNlcyBtb3VzZSB0byBtb3ZlIHBhc3QgdGhlIGVuZCBvZiByZWd1bGFyIHN3YXBUaHJlc2hvbGRcblx0XHRcdGlmIChpc0xhc3RUYXJnZXQgJiYgdGFyZ2V0TW92ZURpc3RhbmNlIDwgdGFyZ2V0TGVuZ3RoICogc3dhcFRocmVzaG9sZCkgeyAvLyBtdWx0aXBsaWVkIG9ubHkgYnkgc3dhcFRocmVzaG9sZCBiZWNhdXNlIG1vdXNlIHdpbGwgYWxyZWFkeSBiZSBpbnNpZGUgdGFyZ2V0IGJ5ICgxIC0gdGhyZXNob2xkKSAqIHRhcmdldExlbmd0aCAvIDJcblx0XHRcdFx0Ly8gY2hlY2sgaWYgcGFzdCBmaXJzdCBpbnZlcnQgdGhyZXNob2xkIG9uIHNpZGUgb3Bwb3NpdGUgb2YgbGFzdERpcmVjdGlvblxuXHRcdFx0XHRpZiAoIXBhc3RGaXJzdEludmVydFRocmVzaCAmJlxuXHRcdFx0XHRcdChsYXN0RGlyZWN0aW9uID09PSAxID9cblx0XHRcdFx0XHRcdChcblx0XHRcdFx0XHRcdFx0bW91c2VPbkF4aXMgPiB0YXJnZXRTMSArIHRhcmdldExlbmd0aCAqIGludmVydGVkU3dhcFRocmVzaG9sZCAvIDJcblx0XHRcdFx0XHRcdCkgOlxuXHRcdFx0XHRcdFx0KFxuXHRcdFx0XHRcdFx0XHRtb3VzZU9uQXhpcyA8IHRhcmdldFMyIC0gdGFyZ2V0TGVuZ3RoICogaW52ZXJ0ZWRTd2FwVGhyZXNob2xkIC8gMlxuXHRcdFx0XHRcdFx0KVxuXHRcdFx0XHRcdClcblx0XHRcdFx0KVxuXHRcdFx0XHR7XG5cdFx0XHRcdFx0Ly8gcGFzdCBmaXJzdCBpbnZlcnQgdGhyZXNob2xkLCBkbyBub3QgcmVzdHJpY3QgaW52ZXJ0ZWQgdGhyZXNob2xkIHRvIGRyYWdFbCBzaGFkb3dcblx0XHRcdFx0XHRwYXN0Rmlyc3RJbnZlcnRUaHJlc2ggPSB0cnVlO1xuXHRcdFx0XHR9XG5cblx0XHRcdFx0aWYgKCFwYXN0Rmlyc3RJbnZlcnRUaHJlc2gpIHtcblx0XHRcdFx0XHR2YXIgZHJhZ1MxID0gYXhpcyA9PT0gJ3ZlcnRpY2FsJyA/IGRyYWdSZWN0LnRvcCA6IGRyYWdSZWN0LmxlZnQsXG5cdFx0XHRcdFx0XHRkcmFnUzIgPSBheGlzID09PSAndmVydGljYWwnID8gZHJhZ1JlY3QuYm90dG9tIDogZHJhZ1JlY3QucmlnaHQ7XG5cdFx0XHRcdFx0Ly8gZHJhZ0VsIHNoYWRvdyAodGFyZ2V0IG1vdmUgZGlzdGFuY2Ugc2hhZG93KVxuXHRcdFx0XHRcdGlmIChcblx0XHRcdFx0XHRcdGxhc3REaXJlY3Rpb24gPT09IDEgP1xuXHRcdFx0XHRcdFx0KFxuXHRcdFx0XHRcdFx0XHRtb3VzZU9uQXhpcyA8IHRhcmdldFMxICsgdGFyZ2V0TW92ZURpc3RhbmNlIC8vIG92ZXIgZHJhZ0VsIHNoYWRvd1xuXHRcdFx0XHRcdFx0KSA6XG5cdFx0XHRcdFx0XHQoXG5cdFx0XHRcdFx0XHRcdG1vdXNlT25BeGlzID4gdGFyZ2V0UzIgLSB0YXJnZXRNb3ZlRGlzdGFuY2Vcblx0XHRcdFx0XHRcdClcblx0XHRcdFx0XHQpXG5cdFx0XHRcdFx0e1xuXHRcdFx0XHRcdFx0cmV0dXJuIGxhc3REaXJlY3Rpb24gKiAtMTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0aW52ZXJ0ID0gdHJ1ZTtcblx0XHRcdFx0fVxuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0Ly8gUmVndWxhclxuXHRcdFx0XHRpZiAoXG5cdFx0XHRcdFx0bW91c2VPbkF4aXMgPiB0YXJnZXRTMSArICh0YXJnZXRMZW5ndGggKiAoMSAtIHN3YXBUaHJlc2hvbGQpIC8gMikgJiZcblx0XHRcdFx0XHRtb3VzZU9uQXhpcyA8IHRhcmdldFMyIC0gKHRhcmdldExlbmd0aCAqICgxIC0gc3dhcFRocmVzaG9sZCkgLyAyKVxuXHRcdFx0XHQpIHtcblx0XHRcdFx0XHRyZXR1cm4gX2dldEluc2VydERpcmVjdGlvbih0YXJnZXQpO1xuXHRcdFx0XHR9XG5cdFx0XHR9XG5cdFx0fVxuXG5cdFx0aW52ZXJ0ID0gaW52ZXJ0IHx8IGludmVydFN3YXA7XG5cblx0XHRpZiAoaW52ZXJ0KSB7XG5cdFx0XHQvLyBJbnZlcnQgb2YgcmVndWxhclxuXHRcdFx0aWYgKFxuXHRcdFx0XHRtb3VzZU9uQXhpcyA8IHRhcmdldFMxICsgKHRhcmdldExlbmd0aCAqIGludmVydGVkU3dhcFRocmVzaG9sZCAvIDIpIHx8XG5cdFx0XHRcdG1vdXNlT25BeGlzID4gdGFyZ2V0UzIgLSAodGFyZ2V0TGVuZ3RoICogaW52ZXJ0ZWRTd2FwVGhyZXNob2xkIC8gMilcblx0XHRcdClcblx0XHRcdHtcblx0XHRcdFx0cmV0dXJuICgobW91c2VPbkF4aXMgPiB0YXJnZXRTMSArIHRhcmdldExlbmd0aCAvIDIpID8gMSA6IC0xKTtcblx0XHRcdH1cblx0XHR9XG5cblx0XHRyZXR1cm4gMDtcblx0fVxuXG5cdC8qKlxuXHQgKiBHZXRzIHRoZSBkaXJlY3Rpb24gZHJhZ0VsIG11c3QgYmUgc3dhcHBlZCByZWxhdGl2ZSB0byB0YXJnZXQgaW4gb3JkZXIgdG8gbWFrZSBpdFxuXHQgKiBzZWVtIHRoYXQgZHJhZ0VsIGhhcyBiZWVuIFwiaW5zZXJ0ZWRcIiBpbnRvIHRoYXQgZWxlbWVudCdzIHBvc2l0aW9uXG5cdCAqIEBwYXJhbSAge0hUTUxFbGVtZW50fSB0YXJnZXQgICAgICAgVGhlIHRhcmdldCB3aG9zZSBwb3NpdGlvbiBkcmFnRWwgaXMgYmVpbmcgaW5zZXJ0ZWQgYXRcblx0ICogQHJldHVybiB7TnVtYmVyfSAgICAgICAgICAgICAgICAgICBEaXJlY3Rpb24gZHJhZ0VsIG11c3QgYmUgc3dhcHBlZFxuXHQgKi9cblx0ZnVuY3Rpb24gX2dldEluc2VydERpcmVjdGlvbih0YXJnZXQpIHtcblx0XHR2YXIgZHJhZ0VsSW5kZXggPSBfaW5kZXgoZHJhZ0VsKSxcblx0XHRcdHRhcmdldEluZGV4ID0gX2luZGV4KHRhcmdldCk7XG5cblx0XHRpZiAoZHJhZ0VsSW5kZXggPCB0YXJnZXRJbmRleCkge1xuXHRcdFx0cmV0dXJuIDE7XG5cdFx0fSBlbHNlIHtcblx0XHRcdHJldHVybiAtMTtcblx0XHR9XG5cdH1cblxuXG5cdC8qKlxuXHQgKiBHZW5lcmF0ZSBpZFxuXHQgKiBAcGFyYW0gICB7SFRNTEVsZW1lbnR9IGVsXG5cdCAqIEByZXR1cm5zIHtTdHJpbmd9XG5cdCAqIEBwcml2YXRlXG5cdCAqL1xuXHRmdW5jdGlvbiBfZ2VuZXJhdGVJZChlbCkge1xuXHRcdHZhciBzdHIgPSBlbC50YWdOYW1lICsgZWwuY2xhc3NOYW1lICsgZWwuc3JjICsgZWwuaHJlZiArIGVsLnRleHRDb250ZW50LFxuXHRcdFx0aSA9IHN0ci5sZW5ndGgsXG5cdFx0XHRzdW0gPSAwO1xuXG5cdFx0d2hpbGUgKGktLSkge1xuXHRcdFx0c3VtICs9IHN0ci5jaGFyQ29kZUF0KGkpO1xuXHRcdH1cblxuXHRcdHJldHVybiBzdW0udG9TdHJpbmcoMzYpO1xuXHR9XG5cblx0LyoqXG5cdCAqIFJldHVybnMgdGhlIGluZGV4IG9mIGFuIGVsZW1lbnQgd2l0aGluIGl0cyBwYXJlbnQgZm9yIGEgc2VsZWN0ZWQgc2V0IG9mXG5cdCAqIGVsZW1lbnRzXG5cdCAqIEBwYXJhbSAge0hUTUxFbGVtZW50fSBlbFxuXHQgKiBAcGFyYW0gIHtzZWxlY3Rvcn0gc2VsZWN0b3Jcblx0ICogQHJldHVybiB7bnVtYmVyfVxuXHQgKi9cblx0ZnVuY3Rpb24gX2luZGV4KGVsLCBzZWxlY3Rvcikge1xuXHRcdHZhciBpbmRleCA9IDA7XG5cblx0XHRpZiAoIWVsIHx8ICFlbC5wYXJlbnROb2RlKSB7XG5cdFx0XHRyZXR1cm4gLTE7XG5cdFx0fVxuXG5cdFx0d2hpbGUgKGVsICYmIChlbCA9IGVsLnByZXZpb3VzRWxlbWVudFNpYmxpbmcpKSB7XG5cdFx0XHRpZiAoKGVsLm5vZGVOYW1lLnRvVXBwZXJDYXNlKCkgIT09ICdURU1QTEFURScpICYmIGVsICE9PSBjbG9uZUVsICYmICghc2VsZWN0b3IgfHwgX21hdGNoZXMoZWwsIHNlbGVjdG9yKSkpIHtcblx0XHRcdFx0aW5kZXgrKztcblx0XHRcdH1cblx0XHR9XG5cblx0XHRyZXR1cm4gaW5kZXg7XG5cdH1cblxuXHRmdW5jdGlvbiBfbWF0Y2hlcygvKipIVE1MRWxlbWVudCovZWwsIC8qKlN0cmluZyovc2VsZWN0b3IpIHtcblx0XHRpZiAoIXNlbGVjdG9yKSByZXR1cm47XG5cblx0XHRzZWxlY3RvclswXSA9PT0gJz4nICYmIChzZWxlY3RvciA9IHNlbGVjdG9yLnN1YnN0cmluZygxKSk7XG5cblx0XHRpZiAoZWwpIHtcblx0XHRcdHRyeSB7XG5cdFx0XHRcdGlmIChlbC5tYXRjaGVzKSB7XG5cdFx0XHRcdFx0cmV0dXJuIGVsLm1hdGNoZXMoc2VsZWN0b3IpO1xuXHRcdFx0XHR9IGVsc2UgaWYgKGVsLm1zTWF0Y2hlc1NlbGVjdG9yKSB7XG5cdFx0XHRcdFx0cmV0dXJuIGVsLm1zTWF0Y2hlc1NlbGVjdG9yKHNlbGVjdG9yKTtcblx0XHRcdFx0fSBlbHNlIGlmIChlbC53ZWJraXRNYXRjaGVzU2VsZWN0b3IpIHtcblx0XHRcdFx0XHRyZXR1cm4gZWwud2Via2l0TWF0Y2hlc1NlbGVjdG9yKHNlbGVjdG9yKTtcblx0XHRcdFx0fVxuXHRcdFx0fSBjYXRjaChfKSB7XG5cdFx0XHRcdHJldHVybiBmYWxzZTtcblx0XHRcdH1cblx0XHR9XG5cblx0XHRyZXR1cm4gZmFsc2U7XG5cdH1cblxuXHR2YXIgX3Rocm90dGxlVGltZW91dDtcblx0ZnVuY3Rpb24gX3Rocm90dGxlKGNhbGxiYWNrLCBtcykge1xuXHRcdHJldHVybiBmdW5jdGlvbiAoKSB7XG5cdFx0XHRpZiAoIV90aHJvdHRsZVRpbWVvdXQpIHtcblx0XHRcdFx0dmFyIGFyZ3MgPSBhcmd1bWVudHMsXG5cdFx0XHRcdFx0X3RoaXMgPSB0aGlzO1xuXG5cdFx0XHRcdF90aHJvdHRsZVRpbWVvdXQgPSBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcblx0XHRcdFx0XHRpZiAoYXJncy5sZW5ndGggPT09IDEpIHtcblx0XHRcdFx0XHRcdGNhbGxiYWNrLmNhbGwoX3RoaXMsIGFyZ3NbMF0pO1xuXHRcdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0XHRjYWxsYmFjay5hcHBseShfdGhpcywgYXJncyk7XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0X3Rocm90dGxlVGltZW91dCA9IHZvaWQgMDtcblx0XHRcdFx0fSwgbXMpO1xuXHRcdFx0fVxuXHRcdH07XG5cdH1cblxuXHRmdW5jdGlvbiBfY2FuY2VsVGhyb3R0bGUoKSB7XG5cdFx0Y2xlYXJUaW1lb3V0KF90aHJvdHRsZVRpbWVvdXQpO1xuXHRcdF90aHJvdHRsZVRpbWVvdXQgPSB2b2lkIDA7XG5cdH1cblxuXHRmdW5jdGlvbiBfZXh0ZW5kKGRzdCwgc3JjKSB7XG5cdFx0aWYgKGRzdCAmJiBzcmMpIHtcblx0XHRcdGZvciAodmFyIGtleSBpbiBzcmMpIHtcblx0XHRcdFx0aWYgKHNyYy5oYXNPd25Qcm9wZXJ0eShrZXkpKSB7XG5cdFx0XHRcdFx0ZHN0W2tleV0gPSBzcmNba2V5XTtcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdH1cblxuXHRcdHJldHVybiBkc3Q7XG5cdH1cblxuXHRmdW5jdGlvbiBfY2xvbmUoZWwpIHtcblx0XHRpZiAoUG9seW1lciAmJiBQb2x5bWVyLmRvbSkge1xuXHRcdFx0cmV0dXJuIFBvbHltZXIuZG9tKGVsKS5jbG9uZU5vZGUodHJ1ZSk7XG5cdFx0fVxuXHRcdGVsc2UgaWYgKCQpIHtcblx0XHRcdHJldHVybiAkKGVsKS5jbG9uZSh0cnVlKVswXTtcblx0XHR9XG5cdFx0ZWxzZSB7XG5cdFx0XHRyZXR1cm4gZWwuY2xvbmVOb2RlKHRydWUpO1xuXHRcdH1cblx0fVxuXG5cdGZ1bmN0aW9uIF9zYXZlSW5wdXRDaGVja2VkU3RhdGUocm9vdCkge1xuXHRcdHNhdmVkSW5wdXRDaGVja2VkLmxlbmd0aCA9IDA7XG5cblx0XHR2YXIgaW5wdXRzID0gcm9vdC5nZXRFbGVtZW50c0J5VGFnTmFtZSgnaW5wdXQnKTtcblx0XHR2YXIgaWR4ID0gaW5wdXRzLmxlbmd0aDtcblxuXHRcdHdoaWxlIChpZHgtLSkge1xuXHRcdFx0dmFyIGVsID0gaW5wdXRzW2lkeF07XG5cdFx0XHRlbC5jaGVja2VkICYmIHNhdmVkSW5wdXRDaGVja2VkLnB1c2goZWwpO1xuXHRcdH1cblx0fVxuXG5cdGZ1bmN0aW9uIF9uZXh0VGljayhmbikge1xuXHRcdHJldHVybiBzZXRUaW1lb3V0KGZuLCAwKTtcblx0fVxuXG5cdGZ1bmN0aW9uIF9jYW5jZWxOZXh0VGljayhpZCkge1xuXHRcdHJldHVybiBjbGVhclRpbWVvdXQoaWQpO1xuXHR9XG5cblxuXHQvKipcblx0ICogUmV0dXJucyB0aGUgXCJib3VuZGluZyBjbGllbnQgcmVjdFwiIG9mIGdpdmVuIGVsZW1lbnRcblx0ICogQHBhcmFtICB7SFRNTEVsZW1lbnR9IGVsICAgICAgICAgICAgICAgIFRoZSBlbGVtZW50IHdob3NlIGJvdW5kaW5nQ2xpZW50UmVjdCBpcyB3YW50ZWRcblx0ICogQHBhcmFtICB7W0hUTUxFbGVtZW50XX0gY29udGFpbmVyICAgICAgIHRoZSBwYXJlbnQgdGhlIGVsZW1lbnQgd2lsbCBiZSBwbGFjZWQgaW5cblx0ICogQHBhcmFtICB7W0Jvb2xlYW5dfSBhZGp1c3RGb3JUcmFuc2Zvcm0gIFdoZXRoZXIgdGhlIHJlY3Qgc2hvdWxkIGNvbXBlbnNhdGUgZm9yIHBhcmVudCdzIHRyYW5zZm9ybVxuXHQgKiBAcmV0dXJuIHtPYmplY3R9ICAgICAgICAgICAgICAgICAgICAgICAgVGhlIGJvdW5kaW5nQ2xpZW50UmVjdCBvZiBlbFxuXHQgKi9cblx0ZnVuY3Rpb24gX2dldFJlY3QoZWwsIGFkanVzdEZvclRyYW5zZm9ybSwgY29udGFpbmVyLCBhZGp1c3RGb3JGaXhlZCkge1xuXHRcdGlmICghZWwuZ2V0Qm91bmRpbmdDbGllbnRSZWN0ICYmIGVsICE9PSB3aW4pIHJldHVybjtcblxuXHRcdHZhciBlbFJlY3QsXG5cdFx0XHR0b3AsXG5cdFx0XHRsZWZ0LFxuXHRcdFx0Ym90dG9tLFxuXHRcdFx0cmlnaHQsXG5cdFx0XHRoZWlnaHQsXG5cdFx0XHR3aWR0aDtcblxuXHRcdGlmIChlbCAhPT0gd2luICYmIGVsICE9PSBfZ2V0V2luZG93U2Nyb2xsaW5nRWxlbWVudCgpKSB7XG5cdFx0XHRlbFJlY3QgPSBlbC5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKTtcblx0XHRcdHRvcCA9IGVsUmVjdC50b3A7XG5cdFx0XHRsZWZ0ID0gZWxSZWN0LmxlZnQ7XG5cdFx0XHRib3R0b20gPSBlbFJlY3QuYm90dG9tO1xuXHRcdFx0cmlnaHQgPSBlbFJlY3QucmlnaHQ7XG5cdFx0XHRoZWlnaHQgPSBlbFJlY3QuaGVpZ2h0O1xuXHRcdFx0d2lkdGggPSBlbFJlY3Qud2lkdGg7XG5cdFx0fSBlbHNlIHtcblx0XHRcdHRvcCA9IDA7XG5cdFx0XHRsZWZ0ID0gMDtcblx0XHRcdGJvdHRvbSA9IHdpbmRvdy5pbm5lckhlaWdodDtcblx0XHRcdHJpZ2h0ID0gd2luZG93LmlubmVyV2lkdGg7XG5cdFx0XHRoZWlnaHQgPSB3aW5kb3cuaW5uZXJIZWlnaHQ7XG5cdFx0XHR3aWR0aCA9IHdpbmRvdy5pbm5lcldpZHRoO1xuXHRcdH1cblxuXHRcdGlmIChhZGp1c3RGb3JGaXhlZCAmJiBlbCAhPT0gd2luKSB7XG5cdFx0XHQvLyBBZGp1c3QgZm9yIHRyYW5zbGF0ZSgpXG5cdFx0XHRjb250YWluZXIgPSBjb250YWluZXIgfHwgZWwucGFyZW50Tm9kZTtcblxuXHRcdFx0Ly8gc29sdmVzICMxMTIzIChzZWU6IGh0dHBzOi8vc3RhY2tvdmVyZmxvdy5jb20vYS8zNzk1MzgwNi82MDg4MzEyKVxuXHRcdFx0Ly8gTm90IG5lZWRlZCBvbiA8PSBJRTExXG5cdFx0XHRpZiAoIUlFMTFPckxlc3MpIHtcblx0XHRcdFx0ZG8ge1xuXHRcdFx0XHRcdGlmIChjb250YWluZXIgJiYgY29udGFpbmVyLmdldEJvdW5kaW5nQ2xpZW50UmVjdCAmJiBfY3NzKGNvbnRhaW5lciwgJ3RyYW5zZm9ybScpICE9PSAnbm9uZScpIHtcblx0XHRcdFx0XHRcdHZhciBjb250YWluZXJSZWN0ID0gY29udGFpbmVyLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpO1xuXG5cdFx0XHRcdFx0XHQvLyBTZXQgcmVsYXRpdmUgdG8gZWRnZXMgb2YgcGFkZGluZyBib3ggb2YgY29udGFpbmVyXG5cdFx0XHRcdFx0XHR0b3AgLT0gY29udGFpbmVyUmVjdC50b3AgKyBwYXJzZUludChfY3NzKGNvbnRhaW5lciwgJ2JvcmRlci10b3Atd2lkdGgnKSk7XG5cdFx0XHRcdFx0XHRsZWZ0IC09IGNvbnRhaW5lclJlY3QubGVmdCArIHBhcnNlSW50KF9jc3MoY29udGFpbmVyLCAnYm9yZGVyLWxlZnQtd2lkdGgnKSk7XG5cdFx0XHRcdFx0XHRib3R0b20gPSB0b3AgKyBlbFJlY3QuaGVpZ2h0O1xuXHRcdFx0XHRcdFx0cmlnaHQgPSBsZWZ0ICsgZWxSZWN0LndpZHRoO1xuXG5cdFx0XHRcdFx0XHRicmVhaztcblx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0LyoganNoaW50IGJvc3M6dHJ1ZSAqL1xuXHRcdFx0XHR9IHdoaWxlIChjb250YWluZXIgPSBjb250YWluZXIucGFyZW50Tm9kZSk7XG5cdFx0XHR9XG5cdFx0fVxuXG5cdFx0aWYgKGFkanVzdEZvclRyYW5zZm9ybSAmJiBlbCAhPT0gd2luKSB7XG5cdFx0XHQvLyBBZGp1c3QgZm9yIHNjYWxlKClcblx0XHRcdHZhciBtYXRyaXggPSBfbWF0cml4KGNvbnRhaW5lciB8fCBlbCksXG5cdFx0XHRcdHNjYWxlWCA9IG1hdHJpeCAmJiBtYXRyaXguYSxcblx0XHRcdFx0c2NhbGVZID0gbWF0cml4ICYmIG1hdHJpeC5kO1xuXG5cdFx0XHRpZiAobWF0cml4KSB7XG5cdFx0XHRcdHRvcCAvPSBzY2FsZVk7XG5cdFx0XHRcdGxlZnQgLz0gc2NhbGVYO1xuXG5cdFx0XHRcdHdpZHRoIC89IHNjYWxlWDtcblx0XHRcdFx0aGVpZ2h0IC89IHNjYWxlWTtcblxuXHRcdFx0XHRib3R0b20gPSB0b3AgKyBoZWlnaHQ7XG5cdFx0XHRcdHJpZ2h0ID0gbGVmdCArIHdpZHRoO1xuXHRcdFx0fVxuXHRcdH1cblxuXHRcdHJldHVybiB7XG5cdFx0XHR0b3A6IHRvcCxcblx0XHRcdGxlZnQ6IGxlZnQsXG5cdFx0XHRib3R0b206IGJvdHRvbSxcblx0XHRcdHJpZ2h0OiByaWdodCxcblx0XHRcdHdpZHRoOiB3aWR0aCxcblx0XHRcdGhlaWdodDogaGVpZ2h0XG5cdFx0fTtcblx0fVxuXG5cblx0LyoqXG5cdCAqIENoZWNrcyBpZiBhIHNpZGUgb2YgYW4gZWxlbWVudCBpcyBzY3JvbGxlZCBwYXN0IGEgc2lkZSBvZiBpdCdzIHBhcmVudHNcblx0ICogQHBhcmFtICB7SFRNTEVsZW1lbnR9ICBlbCAgICAgICBUaGUgZWxlbWVudCB3aG8ncyBzaWRlIGJlaW5nIHNjcm9sbGVkIG91dCBvZiB2aWV3IGlzIGluIHF1ZXN0aW9uXG5cdCAqIEBwYXJhbSAge1N0cmluZ30gICAgICAgc2lkZSAgICAgU2lkZSBvZiB0aGUgZWxlbWVudCBpbiBxdWVzdGlvbiAoJ3RvcCcsICdsZWZ0JywgJ3JpZ2h0JywgJ2JvdHRvbScpXG5cdCAqIEByZXR1cm4ge0hUTUxFbGVtZW50fSAgICAgICAgICAgVGhlIHBhcmVudCBzY3JvbGwgZWxlbWVudCB0aGF0IHRoZSBlbCdzIHNpZGUgaXMgc2Nyb2xsZWQgcGFzdCwgb3IgbnVsbCBpZiB0aGVyZSBpcyBubyBzdWNoIGVsZW1lbnRcblx0ICovXG5cdGZ1bmN0aW9uIF9pc1Njcm9sbGVkUGFzdChlbCwgc2lkZSkge1xuXHRcdHZhciBwYXJlbnQgPSBfZ2V0UGFyZW50QXV0b1Njcm9sbEVsZW1lbnQoZWwsIHRydWUpLFxuXHRcdFx0ZWxTaWRlID0gX2dldFJlY3QoZWwpW3NpZGVdO1xuXG5cdFx0LyoganNoaW50IGJvc3M6dHJ1ZSAqL1xuXHRcdHdoaWxlIChwYXJlbnQpIHtcblx0XHRcdHZhciBwYXJlbnRTaWRlID0gX2dldFJlY3QocGFyZW50KVtzaWRlXSxcblx0XHRcdFx0dmlzaWJsZTtcblxuXHRcdFx0aWYgKHNpZGUgPT09ICd0b3AnIHx8IHNpZGUgPT09ICdsZWZ0Jykge1xuXHRcdFx0XHR2aXNpYmxlID0gZWxTaWRlID49IHBhcmVudFNpZGU7XG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHR2aXNpYmxlID0gZWxTaWRlIDw9IHBhcmVudFNpZGU7XG5cdFx0XHR9XG5cblx0XHRcdGlmICghdmlzaWJsZSkgcmV0dXJuIHBhcmVudDtcblxuXHRcdFx0aWYgKHBhcmVudCA9PT0gX2dldFdpbmRvd1Njcm9sbGluZ0VsZW1lbnQoKSkgYnJlYWs7XG5cblx0XHRcdHBhcmVudCA9IF9nZXRQYXJlbnRBdXRvU2Nyb2xsRWxlbWVudChwYXJlbnQsIGZhbHNlKTtcblx0XHR9XG5cblx0XHRyZXR1cm4gZmFsc2U7XG5cdH1cblxuXHQvKipcblx0ICogUmV0dXJucyB0aGUgc2Nyb2xsIG9mZnNldCBvZiB0aGUgZ2l2ZW4gZWxlbWVudCwgYWRkZWQgd2l0aCBhbGwgdGhlIHNjcm9sbCBvZmZzZXRzIG9mIHBhcmVudCBlbGVtZW50cy5cblx0ICogVGhlIHZhbHVlIGlzIHJldHVybmVkIGluIHJlYWwgcGl4ZWxzLlxuXHQgKiBAcGFyYW0gIHtIVE1MRWxlbWVudH0gZWxcblx0ICogQHJldHVybiB7QXJyYXl9ICAgICAgICAgICAgIE9mZnNldHMgaW4gdGhlIGZvcm1hdCBvZiBbbGVmdCwgdG9wXVxuXHQgKi9cblx0ZnVuY3Rpb24gX2dldFJlbGF0aXZlU2Nyb2xsT2Zmc2V0KGVsKSB7XG5cdFx0dmFyIG9mZnNldExlZnQgPSAwLFxuXHRcdFx0b2Zmc2V0VG9wID0gMCxcblx0XHRcdHdpblNjcm9sbGVyID0gX2dldFdpbmRvd1Njcm9sbGluZ0VsZW1lbnQoKTtcblxuXHRcdGlmIChlbCkge1xuXHRcdFx0ZG8ge1xuXHRcdFx0XHR2YXIgbWF0cml4ID0gX21hdHJpeChlbCksXG5cdFx0XHRcdFx0c2NhbGVYID0gbWF0cml4LmEsXG5cdFx0XHRcdFx0c2NhbGVZID0gbWF0cml4LmQ7XG5cblx0XHRcdFx0b2Zmc2V0TGVmdCArPSBlbC5zY3JvbGxMZWZ0ICogc2NhbGVYO1xuXHRcdFx0XHRvZmZzZXRUb3AgKz0gZWwuc2Nyb2xsVG9wICogc2NhbGVZO1xuXHRcdFx0fSB3aGlsZSAoZWwgIT09IHdpblNjcm9sbGVyICYmIChlbCA9IGVsLnBhcmVudE5vZGUpKTtcblx0XHR9XG5cblx0XHRyZXR1cm4gW29mZnNldExlZnQsIG9mZnNldFRvcF07XG5cdH1cblxuXHQvLyBGaXhlZCAjOTczOlxuXHRfb24oZG9jdW1lbnQsICd0b3VjaG1vdmUnLCBmdW5jdGlvbihldnQpIHtcblx0XHRpZiAoKFNvcnRhYmxlLmFjdGl2ZSB8fCBhd2FpdGluZ0RyYWdTdGFydGVkKSAmJiBldnQuY2FuY2VsYWJsZSkge1xuXHRcdFx0ZXZ0LnByZXZlbnREZWZhdWx0KCk7XG5cdFx0fVxuXHR9KTtcblxuXG5cdC8vIEV4cG9ydCB1dGlsc1xuXHRTb3J0YWJsZS51dGlscyA9IHtcblx0XHRvbjogX29uLFxuXHRcdG9mZjogX29mZixcblx0XHRjc3M6IF9jc3MsXG5cdFx0ZmluZDogX2ZpbmQsXG5cdFx0aXM6IGZ1bmN0aW9uIChlbCwgc2VsZWN0b3IpIHtcblx0XHRcdHJldHVybiAhIV9jbG9zZXN0KGVsLCBzZWxlY3RvciwgZWwsIGZhbHNlKTtcblx0XHR9LFxuXHRcdGV4dGVuZDogX2V4dGVuZCxcblx0XHR0aHJvdHRsZTogX3Rocm90dGxlLFxuXHRcdGNsb3Nlc3Q6IF9jbG9zZXN0LFxuXHRcdHRvZ2dsZUNsYXNzOiBfdG9nZ2xlQ2xhc3MsXG5cdFx0Y2xvbmU6IF9jbG9uZSxcblx0XHRpbmRleDogX2luZGV4LFxuXHRcdG5leHRUaWNrOiBfbmV4dFRpY2ssXG5cdFx0Y2FuY2VsTmV4dFRpY2s6IF9jYW5jZWxOZXh0VGljayxcblx0XHRkZXRlY3REaXJlY3Rpb246IF9kZXRlY3REaXJlY3Rpb24sXG5cdFx0Z2V0Q2hpbGQ6IF9nZXRDaGlsZFxuXHR9O1xuXG5cblx0LyoqXG5cdCAqIENyZWF0ZSBzb3J0YWJsZSBpbnN0YW5jZVxuXHQgKiBAcGFyYW0ge0hUTUxFbGVtZW50fSAgZWxcblx0ICogQHBhcmFtIHtPYmplY3R9ICAgICAgW29wdGlvbnNdXG5cdCAqL1xuXHRTb3J0YWJsZS5jcmVhdGUgPSBmdW5jdGlvbiAoZWwsIG9wdGlvbnMpIHtcblx0XHRyZXR1cm4gbmV3IFNvcnRhYmxlKGVsLCBvcHRpb25zKTtcblx0fTtcblxuXG5cdC8vIEV4cG9ydFxuXHRTb3J0YWJsZS52ZXJzaW9uID0gJzEuOS4wJztcblx0cmV0dXJuIFNvcnRhYmxlO1xufSk7XG4iLCIhZnVuY3Rpb24oZSx0KXt2YXIgbj10KCk7XCJmdW5jdGlvblwiPT10eXBlb2YgZGVmaW5lJiZkZWZpbmUuYW1kP2RlZmluZShbXSxuLlJvdXRpbmcpOlwib2JqZWN0XCI9PXR5cGVvZiBtb2R1bGUmJm1vZHVsZS5leHBvcnRzP21vZHVsZS5leHBvcnRzPW4uUm91dGluZzooZS5Sb3V0aW5nPW4uUm91dGluZyxlLmZvcz17Um91dGVyOm4uUm91dGVyfSl9KHRoaXMsZnVuY3Rpb24oKXtcInVzZSBzdHJpY3RcIjtmdW5jdGlvbiBlKGUsdCl7aWYoIShlIGluc3RhbmNlb2YgdCkpdGhyb3cgbmV3IFR5cGVFcnJvcihcIkNhbm5vdCBjYWxsIGEgY2xhc3MgYXMgYSBmdW5jdGlvblwiKX12YXIgdD1PYmplY3QuYXNzaWdufHxmdW5jdGlvbihlKXtmb3IodmFyIHQ9MTt0PGFyZ3VtZW50cy5sZW5ndGg7dCsrKXt2YXIgbj1hcmd1bWVudHNbdF07Zm9yKHZhciBvIGluIG4pT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG4sbykmJihlW29dPW5bb10pfXJldHVybiBlfSxuPVwiZnVuY3Rpb25cIj09dHlwZW9mIFN5bWJvbCYmXCJzeW1ib2xcIj09dHlwZW9mIFN5bWJvbC5pdGVyYXRvcj9mdW5jdGlvbihlKXtyZXR1cm4gdHlwZW9mIGV9OmZ1bmN0aW9uKGUpe3JldHVybiBlJiZcImZ1bmN0aW9uXCI9PXR5cGVvZiBTeW1ib2wmJmUuY29uc3RydWN0b3I9PT1TeW1ib2wmJmUhPT1TeW1ib2wucHJvdG90eXBlP1wic3ltYm9sXCI6dHlwZW9mIGV9LG89ZnVuY3Rpb24oKXtmdW5jdGlvbiBlKGUsdCl7Zm9yKHZhciBuPTA7bjx0Lmxlbmd0aDtuKyspe3ZhciBvPXRbbl07by5lbnVtZXJhYmxlPW8uZW51bWVyYWJsZXx8ITEsby5jb25maWd1cmFibGU9ITAsXCJ2YWx1ZVwiaW4gbyYmKG8ud3JpdGFibGU9ITApLE9iamVjdC5kZWZpbmVQcm9wZXJ0eShlLG8ua2V5LG8pfX1yZXR1cm4gZnVuY3Rpb24odCxuLG8pe3JldHVybiBuJiZlKHQucHJvdG90eXBlLG4pLG8mJmUodCxvKSx0fX0oKSxpPWZ1bmN0aW9uKCl7ZnVuY3Rpb24gaSh0LG4pe2UodGhpcyxpKSx0aGlzLmNvbnRleHRfPXR8fHtiYXNlX3VybDpcIlwiLHByZWZpeDpcIlwiLGhvc3Q6XCJcIixwb3J0OlwiXCIsc2NoZW1lOlwiXCIsbG9jYWxlOlwiXCJ9LHRoaXMuc2V0Um91dGVzKG58fHt9KX1yZXR1cm4gbyhpLFt7a2V5Olwic2V0Um91dGluZ0RhdGFcIix2YWx1ZTpmdW5jdGlvbihlKXt0aGlzLnNldEJhc2VVcmwoZS5iYXNlX3VybCksdGhpcy5zZXRSb3V0ZXMoZS5yb3V0ZXMpLFwicHJlZml4XCJpbiBlJiZ0aGlzLnNldFByZWZpeChlLnByZWZpeCksXCJwb3J0XCJpbiBlJiZ0aGlzLnNldFBvcnQoZS5wb3J0KSxcImxvY2FsZVwiaW4gZSYmdGhpcy5zZXRMb2NhbGUoZS5sb2NhbGUpLHRoaXMuc2V0SG9zdChlLmhvc3QpLHRoaXMuc2V0U2NoZW1lKGUuc2NoZW1lKX19LHtrZXk6XCJzZXRSb3V0ZXNcIix2YWx1ZTpmdW5jdGlvbihlKXt0aGlzLnJvdXRlc189T2JqZWN0LmZyZWV6ZShlKX19LHtrZXk6XCJnZXRSb3V0ZXNcIix2YWx1ZTpmdW5jdGlvbigpe3JldHVybiB0aGlzLnJvdXRlc199fSx7a2V5Olwic2V0QmFzZVVybFwiLHZhbHVlOmZ1bmN0aW9uKGUpe3RoaXMuY29udGV4dF8uYmFzZV91cmw9ZX19LHtrZXk6XCJnZXRCYXNlVXJsXCIsdmFsdWU6ZnVuY3Rpb24oKXtyZXR1cm4gdGhpcy5jb250ZXh0Xy5iYXNlX3VybH19LHtrZXk6XCJzZXRQcmVmaXhcIix2YWx1ZTpmdW5jdGlvbihlKXt0aGlzLmNvbnRleHRfLnByZWZpeD1lfX0se2tleTpcInNldFNjaGVtZVwiLHZhbHVlOmZ1bmN0aW9uKGUpe3RoaXMuY29udGV4dF8uc2NoZW1lPWV9fSx7a2V5OlwiZ2V0U2NoZW1lXCIsdmFsdWU6ZnVuY3Rpb24oKXtyZXR1cm4gdGhpcy5jb250ZXh0Xy5zY2hlbWV9fSx7a2V5Olwic2V0SG9zdFwiLHZhbHVlOmZ1bmN0aW9uKGUpe3RoaXMuY29udGV4dF8uaG9zdD1lfX0se2tleTpcImdldEhvc3RcIix2YWx1ZTpmdW5jdGlvbigpe3JldHVybiB0aGlzLmNvbnRleHRfLmhvc3R9fSx7a2V5Olwic2V0UG9ydFwiLHZhbHVlOmZ1bmN0aW9uKGUpe3RoaXMuY29udGV4dF8ucG9ydD1lfX0se2tleTpcImdldFBvcnRcIix2YWx1ZTpmdW5jdGlvbigpe3JldHVybiB0aGlzLmNvbnRleHRfLnBvcnR9fSx7a2V5Olwic2V0TG9jYWxlXCIsdmFsdWU6ZnVuY3Rpb24oZSl7dGhpcy5jb250ZXh0Xy5sb2NhbGU9ZX19LHtrZXk6XCJnZXRMb2NhbGVcIix2YWx1ZTpmdW5jdGlvbigpe3JldHVybiB0aGlzLmNvbnRleHRfLmxvY2FsZX19LHtrZXk6XCJidWlsZFF1ZXJ5UGFyYW1zXCIsdmFsdWU6ZnVuY3Rpb24oZSx0LG8pe3ZhciBpPXRoaXMscj12b2lkIDAscz1uZXcgUmVnRXhwKC9cXFtcXF0kLyk7aWYodCBpbnN0YW5jZW9mIEFycmF5KXQuZm9yRWFjaChmdW5jdGlvbih0LHIpe3MudGVzdChlKT9vKGUsdCk6aS5idWlsZFF1ZXJ5UGFyYW1zKGUrXCJbXCIrKFwib2JqZWN0XCI9PT0oXCJ1bmRlZmluZWRcIj09dHlwZW9mIHQ/XCJ1bmRlZmluZWRcIjpuKHQpKT9yOlwiXCIpK1wiXVwiLHQsbyl9KTtlbHNlIGlmKFwib2JqZWN0XCI9PT0oXCJ1bmRlZmluZWRcIj09dHlwZW9mIHQ/XCJ1bmRlZmluZWRcIjpuKHQpKSlmb3IociBpbiB0KXRoaXMuYnVpbGRRdWVyeVBhcmFtcyhlK1wiW1wiK3IrXCJdXCIsdFtyXSxvKTtlbHNlIG8oZSx0KX19LHtrZXk6XCJnZXRSb3V0ZVwiLHZhbHVlOmZ1bmN0aW9uKGUpe3ZhciB0PXRoaXMuY29udGV4dF8ucHJlZml4K2Usbj1lK1wiLlwiK3RoaXMuY29udGV4dF8ubG9jYWxlLG89dGhpcy5jb250ZXh0Xy5wcmVmaXgrZStcIi5cIit0aGlzLmNvbnRleHRfLmxvY2FsZSxpPVt0LG4sbyxlXTtmb3IodmFyIHIgaW4gaSlpZihpW3JdaW4gdGhpcy5yb3V0ZXNfKXJldHVybiB0aGlzLnJvdXRlc19baVtyXV07dGhyb3cgbmV3IEVycm9yKCdUaGUgcm91dGUgXCInK2UrJ1wiIGRvZXMgbm90IGV4aXN0LicpfX0se2tleTpcImdlbmVyYXRlXCIsdmFsdWU6ZnVuY3Rpb24oZSxuKXt2YXIgbz1hcmd1bWVudHMubGVuZ3RoPjImJnZvaWQgMCE9PWFyZ3VtZW50c1syXSYmYXJndW1lbnRzWzJdLGk9dGhpcy5nZXRSb3V0ZShlKSxyPW58fHt9LHM9dCh7fSxyKSx1PVwiXCIsYz0hMCxhPVwiXCIsZj1cInVuZGVmaW5lZFwiPT10eXBlb2YgdGhpcy5nZXRQb3J0KCl8fG51bGw9PT10aGlzLmdldFBvcnQoKT9cIlwiOnRoaXMuZ2V0UG9ydCgpO2lmKGkudG9rZW5zLmZvckVhY2goZnVuY3Rpb24odCl7aWYoXCJ0ZXh0XCI9PT10WzBdKXJldHVybiB1PXRbMV0rdSx2b2lkKGM9ITEpO3tpZihcInZhcmlhYmxlXCIhPT10WzBdKXRocm93IG5ldyBFcnJvcignVGhlIHRva2VuIHR5cGUgXCInK3RbMF0rJ1wiIGlzIG5vdCBzdXBwb3J0ZWQuJyk7dmFyIG49aS5kZWZhdWx0cyYmdFszXWluIGkuZGVmYXVsdHM7aWYoITE9PT1jfHwhbnx8dFszXWluIHImJnJbdFszXV0hPWkuZGVmYXVsdHNbdFszXV0pe3ZhciBvPXZvaWQgMDtpZih0WzNdaW4gcilvPXJbdFszXV0sZGVsZXRlIHNbdFszXV07ZWxzZXtpZighbil7aWYoYylyZXR1cm47dGhyb3cgbmV3IEVycm9yKCdUaGUgcm91dGUgXCInK2UrJ1wiIHJlcXVpcmVzIHRoZSBwYXJhbWV0ZXIgXCInK3RbM10rJ1wiLicpfW89aS5kZWZhdWx0c1t0WzNdXX12YXIgYT0hMD09PW98fCExPT09b3x8XCJcIj09PW87aWYoIWF8fCFjKXt2YXIgZj1lbmNvZGVVUklDb21wb25lbnQobykucmVwbGFjZSgvJTJGL2csXCIvXCIpO1wibnVsbFwiPT09ZiYmbnVsbD09PW8mJihmPVwiXCIpLHU9dFsxXStmK3V9Yz0hMX1lbHNlIG4mJnRbM11pbiBzJiZkZWxldGUgc1t0WzNdXX19KSxcIlwiPT09dSYmKHU9XCIvXCIpLGkuaG9zdHRva2Vucy5mb3JFYWNoKGZ1bmN0aW9uKGUpe3ZhciB0PXZvaWQgMDtyZXR1cm5cInRleHRcIj09PWVbMF0/dm9pZChhPWVbMV0rYSk6dm9pZChcInZhcmlhYmxlXCI9PT1lWzBdJiYoZVszXWluIHI/KHQ9cltlWzNdXSxkZWxldGUgc1tlWzNdXSk6aS5kZWZhdWx0cyYmZVszXWluIGkuZGVmYXVsdHMmJih0PWkuZGVmYXVsdHNbZVszXV0pLGE9ZVsxXSt0K2EpKX0pLHU9dGhpcy5jb250ZXh0Xy5iYXNlX3VybCt1LGkucmVxdWlyZW1lbnRzJiZcIl9zY2hlbWVcImluIGkucmVxdWlyZW1lbnRzJiZ0aGlzLmdldFNjaGVtZSgpIT1pLnJlcXVpcmVtZW50cy5fc2NoZW1lP3U9aS5yZXF1aXJlbWVudHMuX3NjaGVtZStcIjovL1wiKyhhfHx0aGlzLmdldEhvc3QoKSkrdTpcInVuZGVmaW5lZFwiIT10eXBlb2YgaS5zY2hlbWVzJiZcInVuZGVmaW5lZFwiIT10eXBlb2YgaS5zY2hlbWVzWzBdJiZ0aGlzLmdldFNjaGVtZSgpIT09aS5zY2hlbWVzWzBdP3U9aS5zY2hlbWVzWzBdK1wiOi8vXCIrKGF8fHRoaXMuZ2V0SG9zdCgpKSt1OmEmJnRoaXMuZ2V0SG9zdCgpIT09YSsoXCJcIj09PWY/XCJcIjpcIjpcIitmKT91PXRoaXMuZ2V0U2NoZW1lKCkrXCI6Ly9cIithKyhcIlwiPT09Zj9cIlwiOlwiOlwiK2YpK3U6bz09PSEwJiYodT10aGlzLmdldFNjaGVtZSgpK1wiOi8vXCIrdGhpcy5nZXRIb3N0KCkrdSksT2JqZWN0LmtleXMocykubGVuZ3RoPjApe3ZhciBsPXZvaWQgMCxoPVtdLHk9ZnVuY3Rpb24oZSx0KXt0PVwiZnVuY3Rpb25cIj09dHlwZW9mIHQ/dCgpOnQsdD1udWxsPT09dD9cIlwiOnQsaC5wdXNoKGVuY29kZVVSSUNvbXBvbmVudChlKStcIj1cIitlbmNvZGVVUklDb21wb25lbnQodCkpfTtmb3IobCBpbiBzKXRoaXMuYnVpbGRRdWVyeVBhcmFtcyhsLHNbbF0seSk7dT11K1wiP1wiK2guam9pbihcIiZcIikucmVwbGFjZSgvJTIwL2csXCIrXCIpfXJldHVybiB1fX1dLFt7a2V5OlwiZ2V0SW5zdGFuY2VcIix2YWx1ZTpmdW5jdGlvbigpe3JldHVybiByfX0se2tleTpcInNldERhdGFcIix2YWx1ZTpmdW5jdGlvbihlKXt2YXIgdD1pLmdldEluc3RhbmNlKCk7dC5zZXRSb3V0aW5nRGF0YShlKX19XSksaX0oKTtpLlJvdXRlLGkuQ29udGV4dDt2YXIgcj1uZXcgaTtyZXR1cm57Um91dGVyOmksUm91dGluZzpyfX0pOyJdLCJzb3VyY2VSb290IjoiIn0=
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 33);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/lightbox.init.js":
/*!*********************************************!*\
  !*** ./resources/js/pages/lightbox.init.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function (e) {
  "use strict";

  e(".image-popup-vertical-fit").magnificPopup({
    type: "image",
    closeOnContentClick: !0,
    mainClass: "mfp-img-mobile",
    image: {
      verticalFit: !0
    }
  }), e(".image-popup-no-margins").magnificPopup({
    type: "image",
    closeOnContentClick: !0,
    closeBtnInside: !1,
    fixedContentPos: !0,
    mainClass: "mfp-no-margins mfp-with-zoom",
    image: {
      verticalFit: !0
    },
    zoom: {
      enabled: !0,
      duration: 300
    }
  }), e(".popup-gallery").magnificPopup({
    delegate: "a",
    type: "image",
    tLoading: "Loading image #%curr%...",
    mainClass: "mfp-img-mobile",
    gallery: {
      enabled: !0,
      navigateByImgClick: !0,
      preload: [0, 1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  }), e(".zoom-gallery").magnificPopup({
    delegate: "a",
    type: "image",
    closeOnContentClick: !1,
    closeBtnInside: !1,
    mainClass: "mfp-with-zoom mfp-img-mobile",
    image: {
      verticalFit: !0,
      titleSrc: function titleSrc(e) {
        return e.el.attr("title") + ' &middot; <a href="' + e.el.attr("data-source") + '" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: !0
    },
    zoom: {
      enabled: !0,
      duration: 300,
      opener: function opener(e) {
        return e.find("img");
      }
    }
  }), e(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
    disableOn: 700,
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: !1,
    fixedContentPos: !1
  }), e(".popup-with-zoom-anim").magnificPopup({
    type: "inline",
    fixedContentPos: !1,
    fixedBgPos: !0,
    overflowY: "auto",
    closeBtnInside: !0,
    preloader: !1,
    midClick: !0,
    removalDelay: 300,
    mainClass: "my-mfp-zoom-in"
  }), e(".popup-with-move-anim").magnificPopup({
    type: "inline",
    fixedContentPos: !1,
    fixedBgPos: !0,
    overflowY: "auto",
    closeBtnInside: !0,
    preloader: !1,
    midClick: !0,
    removalDelay: 300,
    mainClass: "my-mfp-slide-bottom"
  }), e(".popup-form").magnificPopup({
    type: "inline",
    preloader: !1,
    focus: "#name",
    callbacks: {
      beforeOpen: function beforeOpen() {
        e(window).width() < 700 ? this.st.focus = !1 : this.st.focus = "#name";
      }
    }
  });
}).apply(this, [jQuery]);

/***/ }),

/***/ 33:
/*!***************************************************!*\
  !*** multi ./resources/js/pages/lightbox.init.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\diffi\Documents\22\ugro-master\resources\js\pages\lightbox.init.js */"./resources/js/pages/lightbox.init.js");


/***/ })

/******/ });
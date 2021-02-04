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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/calendars.init.js":
/*!**********************************************!*\
  !*** ./resources/js/pages/calendars.init.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

/* eslint-disable require-jsdoc, no-unused-vars */

var CalendarList = [];

function CalendarInfo() {
  this.id = null;
  this.name = null;
  this.checked = true;
  this.color = null;
  this.bgColor = null;
  this.borderColor = null;
  this.dragBgColor = null;
}

function addCalendar(calendar) {
  CalendarList.push(calendar);
}

function findCalendar(id) {
  var found;
  CalendarList.forEach(function (calendar) {
    if (calendar.id === id) {
      found = calendar;
    }
  });
  return found || CalendarList[0];
}

function hexToRGBA(hex) {
  var radix = 16;
  var r = parseInt(hex.slice(1, 3), radix),
      g = parseInt(hex.slice(3, 5), radix),
      b = parseInt(hex.slice(5, 7), radix),
      a = parseInt(hex.slice(7, 9), radix) / 255 || 1;
  var rgba = 'rgba(' + r + ', ' + g + ', ' + b + ', ' + a + ')';
  return rgba;
}

(function () {
  var calendar;
  var id = 0;
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'My Calendar';
  calendar.color = '#ffffff';
  calendar.bgColor = '#556ee6';
  calendar.dragBgColor = '#556ee6';
  calendar.borderColor = '#556ee6';
  addCalendar(calendar);
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'Company';
  calendar.color = '#ffffff';
  calendar.bgColor = '#50a5f1';
  calendar.dragBgColor = '#50a5f1';
  calendar.borderColor = '#50a5f1';
  addCalendar(calendar);
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'Family';
  calendar.color = '#ffffff';
  calendar.bgColor = '#f46a6a';
  calendar.dragBgColor = '#f46a6a';
  calendar.borderColor = '#f46a6a';
  addCalendar(calendar);
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'Friend';
  calendar.color = '#ffffff';
  calendar.bgColor = '#34c38f';
  calendar.dragBgColor = '#34c38f';
  calendar.borderColor = '#34c38f';
  addCalendar(calendar);
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'Travel';
  calendar.color = '#ffffff';
  calendar.bgColor = '#bbdc00';
  calendar.dragBgColor = '#bbdc00';
  calendar.borderColor = '#bbdc00';
  addCalendar(calendar);
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'etc';
  calendar.color = '#ffffff';
  calendar.bgColor = '#9d9d9d';
  calendar.dragBgColor = '#9d9d9d';
  calendar.borderColor = '#9d9d9d';
  addCalendar(calendar);
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'Birthdays';
  calendar.color = '#ffffff';
  calendar.bgColor = '#f1b44c';
  calendar.dragBgColor = '#f1b44c';
  calendar.borderColor = '#f1b44c';
  addCalendar(calendar);
  calendar = new CalendarInfo();
  id += 1;
  calendar.id = String(id);
  calendar.name = 'National Holidays';
  calendar.color = '#ffffff';
  calendar.bgColor = '#ff4040';
  calendar.dragBgColor = '#ff4040';
  calendar.borderColor = '#ff4040';
  addCalendar(calendar);
})();

/***/ }),

/***/ 3:
/*!****************************************************!*\
  !*** multi ./resources/js/pages/calendars.init.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\diffi\Documents\22\ugro-master\resources\js\pages\calendars.init.js */"./resources/js/pages/calendars.init.js");


/***/ })

/******/ });
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
/******/ 	return __webpack_require__(__webpack_require__.s = 41);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/schedules.init.js":
/*!**********************************************!*\
  !*** ./resources/js/pages/schedules.init.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
Template Name: Urgo - Online Video Learning
Author: Themesbrand
Version: 1.4.0
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: schedules (calendar) Js File
*/

/*eslint-disable*/

var ScheduleList = [];
var SCHEDULE_CATEGORY = ['milestone', 'task'];

function ScheduleInfo() {
  this.id = null;
  this.calendarId = null;
  this.title = null;
  this.body = null;
  this.isAllday = false;
  this.start = null;
  this.end = null;
  this.category = '';
  this.dueDateClass = '';
  this.color = null;
  this.bgColor = null;
  this.dragBgColor = null;
  this.borderColor = null;
  this.customStyle = '';
  this.isFocused = false;
  this.isPending = false;
  this.isVisible = true;
  this.isReadOnly = false;
  this.goingDuration = 0;
  this.comingDuration = 0;
  this.recurrenceRule = '';
  this.state = '';
  this.raw = {
    memo: '',
    hasToOrCc: false,
    hasRecurrenceRule: false,
    location: null,
    "class": 'public',
    // or 'private'
    creator: {
      name: '',
      avatar: '',
      company: '',
      email: '',
      phone: ''
    }
  };
}

function generateTime(schedule, renderStart, renderEnd) {
  var startDate = moment(renderStart.getTime());
  var endDate = moment(renderEnd.getTime());
  var diffDate = endDate.diff(startDate, 'days');
  schedule.isAllday = chance.bool({
    likelihood: 30
  });

  if (schedule.isAllday) {
    schedule.category = 'allday';
  } else if (chance.bool({
    likelihood: 30
  })) {
    schedule.category = SCHEDULE_CATEGORY[chance.integer({
      min: 0,
      max: 1
    })];

    if (schedule.category === SCHEDULE_CATEGORY[1]) {
      schedule.dueDateClass = 'morning';
    }
  } else {
    schedule.category = 'time';
  }

  startDate.add(chance.integer({
    min: 0,
    max: diffDate
  }), 'days');
  startDate.hours(chance.integer({
    min: 0,
    max: 23
  }));
  startDate.minutes(chance.bool() ? 0 : 30);
  schedule.start = startDate.toDate();
  endDate = moment(startDate);

  if (schedule.isAllday) {
    endDate.add(chance.integer({
      min: 0,
      max: 3
    }), 'days');
  }

  schedule.end = endDate.add(chance.integer({
    min: 1,
    max: 4
  }), 'hour').toDate();

  if (!schedule.isAllday && chance.bool({
    likelihood: 20
  })) {
    schedule.goingDuration = chance.integer({
      min: 30,
      max: 120
    });
    schedule.comingDuration = chance.integer({
      min: 30,
      max: 120
    });
    ;

    if (chance.bool({
      likelihood: 50
    })) {
      schedule.end = schedule.start;
    }
  }
}

function generateNames() {
  var names = [];
  var i = 0;
  var length = chance.integer({
    min: 1,
    max: 10
  });

  for (; i < length; i += 1) {
    names.push(chance.name());
  }

  return names;
}

function generateRandomSchedule(calendar, renderStart, renderEnd) {
  var schedule = new ScheduleInfo();
  schedule.id = chance.guid();
  schedule.calendarId = calendar.id;
  schedule.title = chance.sentence({
    words: 3
  });
  schedule.body = chance.bool({
    likelihood: 20
  }) ? chance.sentence({
    words: 10
  }) : '';
  schedule.isReadOnly = chance.bool({
    likelihood: 20
  });
  generateTime(schedule, renderStart, renderEnd);
  schedule.isPrivate = chance.bool({
    likelihood: 10
  });
  schedule.location = chance.address();
  schedule.attendees = chance.bool({
    likelihood: 70
  }) ? generateNames() : [];
  schedule.recurrenceRule = chance.bool({
    likelihood: 20
  }) ? 'repeated events' : '';
  schedule.state = chance.bool({
    likelihood: 20
  }) ? 'Free' : 'Busy';
  schedule.color = calendar.color;
  schedule.bgColor = calendar.bgColor;
  schedule.dragBgColor = calendar.dragBgColor;
  schedule.borderColor = calendar.borderColor;

  if (schedule.category === 'milestone') {
    schedule.color = schedule.bgColor;
    schedule.bgColor = 'transparent';
    schedule.dragBgColor = 'transparent';
    schedule.borderColor = 'transparent';
  }

  schedule.raw.memo = chance.sentence();
  schedule.raw.creator.name = chance.name();
  schedule.raw.creator.avatar = chance.avatar();
  schedule.raw.creator.company = chance.company();
  schedule.raw.creator.email = chance.email();
  schedule.raw.creator.phone = chance.phone();

  if (chance.bool({
    likelihood: 20
  })) {
    var travelTime = chance.minute();
    schedule.goingDuration = travelTime;
    schedule.comingDuration = travelTime;
  }

  ScheduleList.push(schedule);
}

function generateSchedule(viewName, renderStart, renderEnd) {
  ScheduleList = [];
  CalendarList.forEach(function (calendar) {
    var i = 0,
        length = 10;

    if (viewName === 'month') {
      length = 3;
    } else if (viewName === 'day') {
      length = 4;
    }

    for (; i < length; i += 1) {
      generateRandomSchedule(calendar, renderStart, renderEnd);
    }
  });
}

/***/ }),

/***/ 41:
/*!****************************************************!*\
  !*** multi ./resources/js/pages/schedules.init.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\diffi\Documents\22\ugro-master\resources\js\pages\schedules.init.js */"./resources/js/pages/schedules.init.js");


/***/ })

/******/ });
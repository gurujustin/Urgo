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
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/sweet-alerts.init.js":
/*!*************************************************!*\
  !*** ./resources/js/pages/sweet-alerts.init.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

!function (t) {
  "use strict";

  function e() {}

  e.prototype.init = function () {
    t("#sa-basic").on("click", function () {
      Swal.fire({
        title: "Any fool can use a computer",
        confirmButtonColor: "#556ee6"
      });
    }), t("#sa-title").click(function () {
      Swal.fire({
        title: "The Internet?",
        text: "That thing is still around?",
        type: "question",
        confirmButtonColor: "#556ee6"
      });
    }), t("#sa-success").click(function () {
      Swal.fire({
        title: "Good job!",
        text: "You clicked the button!",
        type: "success",
        showCancelButton: !0,
        confirmButtonColor: "#556ee6",
        cancelButtonColor: "#f46a6a"
      });
    }), t("#sa-warning").click(function () {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#34c38f",
        cancelButtonColor: "#f46a6a",
        confirmButtonText: "Yes, delete it!"
      }).then(function (t) {
        t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success");
      });
    }), t("#sa-params").click(function () {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ml-2 mt-2",
        buttonsStyling: !1
      }).then(function (t) {
        t.value ? Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          type: "success"
        }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
          title: "Cancelled",
          text: "Your imaginary file is safe :)",
          type: "error"
        });
      });
    }), t("#sa-image").click(function () {
      Swal.fire({
        title: "Sweet!",
        text: "Modal with a custom image.",
        imageUrl: "assets/images/logo-dark.png",
        imageHeight: 20,
        confirmButtonColor: "#556ee6",
        animation: !1
      });
    }), t("#sa-close").click(function () {
      var t;
      Swal.fire({
        title: "Auto close alert!",
        html: "I will close in <strong></strong> seconds.",
        timer: 2e3,
        onBeforeOpen: function onBeforeOpen() {
          Swal.showLoading(), t = setInterval(function () {
            Swal.getContent().querySelector("strong").textContent = Swal.getTimerLeft();
          }, 100);
        },
        onClose: function onClose() {
          clearInterval(t);
        }
      }).then(function (t) {
        t.dismiss === Swal.DismissReason.timer && console.log("I was closed by the timer");
      });
    }), t("#custom-html-alert").click(function () {
      Swal.fire({
        title: "<i>HTML</i> <u>example</u>",
        type: "info",
        html: 'You can use <b>bold text</b>, <a href="//Themesbrand.in/">links</a> and other HTML tags',
        showCloseButton: !0,
        showCancelButton: !0,
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-danger ml-1",
        confirmButtonColor: "#47bd9a",
        cancelButtonColor: "#f46a6a",
        confirmButtonText: '<i class="fas fa-thumbs-up mr-1"></i> Great!',
        cancelButtonText: '<i class="fas fa-thumbs-down"></i>'
      });
    }), t("#sa-position").click(function () {
      Swal.fire({
        position: "top-end",
        type: "success",
        title: "Your work has been saved",
        showConfirmButton: !1,
        timer: 1500
      });
    }), t("#custom-padding-width-alert").click(function () {
      Swal.fire({
        title: "Custom width, padding, background.",
        width: 600,
        padding: 100,
        confirmButtonColor: "#556ee6",
        background: "#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)"
      });
    }), t("#ajax-alert").click(function () {
      Swal.fire({
        title: "Submit email to run ajax request",
        input: "email",
        showCancelButton: !0,
        confirmButtonText: "Submit",
        showLoaderOnConfirm: !0,
        confirmButtonColor: "#556ee6",
        cancelButtonColor: "#f46a6a",
        preConfirm: function preConfirm(n) {
          return new Promise(function (t, e) {
            setTimeout(function () {
              "taken@example.com" === n ? e("This email is already taken.") : t();
            }, 2e3);
          });
        },
        allowOutsideClick: !1
      }).then(function (t) {
        Swal.fire({
          type: "success",
          title: "Ajax request finished!",
          html: "Submitted email: " + t
        });
      });
    }), t("#chaining-alert").click(function () {
      Swal.mixin({
        input: "text",
        confirmButtonText: "Next &rarr;",
        showCancelButton: !0,
        confirmButtonColor: "#556ee6",
        cancelButtonColor: "#74788d",
        progressSteps: ["1", "2", "3"]
      }).queue([{
        title: "Question 1",
        text: "Chaining swal2 modals is easy"
      }, "Question 2", "Question 3"]).then(function (t) {
        t.value && Swal.fire({
          title: "All done!",
          html: "Your answers: <pre><code>" + JSON.stringify(t.value) + "</code></pre>",
          confirmButtonText: "Lovely!"
        });
      });
    }), t("#dynamic-alert").click(function () {
      swal.queue([{
        title: "Your public IP",
        confirmButtonColor: "#556ee6",
        confirmButtonText: "Show my public IP",
        text: "Your public IP will be received via AJAX request",
        showLoaderOnConfirm: !0,
        preConfirm: function preConfirm() {
          return new Promise(function (e) {
            t.get("https://api.ipify.org?format=json").done(function (t) {
              swal.insertQueueStep(t.ip), e();
            });
          });
        }
      }])["catch"](swal.noop);
    });
  }, t.SweetAlert = new e(), t.SweetAlert.Constructor = e;
}(window.jQuery), function () {
  "use strict";

  window.jQuery.SweetAlert.init();
}();

/***/ }),

/***/ 44:
/*!*******************************************************!*\
  !*** multi ./resources/js/pages/sweet-alerts.init.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\diffi\Documents\22\ugro-master\resources\js\pages\sweet-alerts.init.js */"./resources/js/pages/sweet-alerts.init.js");


/***/ })

/******/ });
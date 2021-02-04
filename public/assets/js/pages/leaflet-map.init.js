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
/******/ 	return __webpack_require__(__webpack_require__.s = 31);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/leaflet-map.init.js":
/*!************************************************!*\
  !*** ./resources/js/pages/leaflet-map.init.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var mymap = L.map("leaflet-map").setView([51.505, -.09], 13);
L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: "mapbox/streets-v11",
  tileSize: 512,
  zoomOffset: -1
}).addTo(mymap);
var markermap = L.map("leaflet-map-marker").setView([51.505, -.09], 13);
L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: "mapbox/streets-v11",
  tileSize: 512,
  zoomOffset: -1
}).addTo(markermap), L.marker([51.5, -.09]).addTo(markermap), L.circle([51.508, -.11], {
  color: "#34c38f",
  fillColor: "#34c38f",
  fillOpacity: .5,
  radius: 500
}).addTo(markermap), L.polygon([[51.509, -.08], [51.503, -.06], [51.51, -.047]], {
  color: "#556ee6",
  fillColor: "#556ee6"
}).addTo(markermap);
var popupmap = L.map("leaflet-map-popup").setView([51.505, -.09], 13);
L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: "mapbox/streets-v11",
  tileSize: 512,
  zoomOffset: -1
}).addTo(popupmap), L.marker([51.5, -.09]).addTo(popupmap).bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup(), L.circle([51.508, -.11], 500, {
  color: "#f46a6a",
  fillColor: "#f46a6a",
  fillOpacity: .5
}).addTo(popupmap).bindPopup("I am a circle."), L.polygon([[51.509, -.08], [51.503, -.06], [51.51, -.047]], {
  color: "#556ee6",
  fillColor: "#556ee6"
}).addTo(popupmap).bindPopup("I am a polygon.");
var popup = L.popup(),
    customiconsmap = L.map("leaflet-map-custom-icons").setView([51.5, -.09], 13);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(customiconsmap);
var LeafIcon = L.Icon.extend({
  options: {
    iconSize: [45, 95],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76]
  }
}),
    greenIcon = new LeafIcon({
  iconUrl: "assets/images/logo.svg"
});
L.marker([51.5, -.09], {
  icon: greenIcon
}).addTo(customiconsmap);
var interactivemap = L.map("leaflet-map-interactive-map").setView([37.8, -96], 4);

function getColor(e) {
  return 1e3 < e ? "#435fe3" : 500 < e ? "#556ee6" : 200 < e ? "#677de9" : 100 < e ? "#798ceb" : 50 < e ? "#8a9cee" : 20 < e ? "#9cabf0" : 10 < e ? "#aebaf3" : "#c0c9f6";
}

function style(e) {
  return {
    weight: 2,
    opacity: 1,
    color: "white",
    dashArray: "3",
    fillOpacity: .7,
    fillColor: getColor(e.properties.density)
  };
}

L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: "mapbox/light-v9",
  tileSize: 512,
  zoomOffset: -1
}).addTo(interactivemap);
var geojson = L.geoJson(window.statesData, {
  style: style
}).addTo(interactivemap),
    cities = L.layerGroup();
L.marker([39.61, -105.02]).bindPopup("This is Littleton, CO.").addTo(cities), L.marker([39.74, -104.99]).bindPopup("This is Denver, CO.").addTo(cities), L.marker([39.73, -104.8]).bindPopup("This is Aurora, CO.").addTo(cities), L.marker([39.77, -105.23]).bindPopup("This is Golden, CO.").addTo(cities);
var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    mbUrl = "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
    grayscale = L.tileLayer(mbUrl, {
  id: "mapbox/light-v9",
  tileSize: 512,
  zoomOffset: -1,
  attribution: mbAttr
}),
    streets = L.tileLayer(mbUrl, {
  id: "mapbox/streets-v11",
  tileSize: 512,
  zoomOffset: -1,
  attribution: mbAttr
}),
    layergroupcontrolmap = L.map("leaflet-map-group-control", {
  center: [39.73, -104.99],
  zoom: 10,
  layers: [streets, cities]
}),
    baseLayers = {
  Grayscale: grayscale,
  Streets: streets
},
    overlays = {
  Cities: cities
};
L.control.layers(baseLayers, overlays).addTo(layergroupcontrolmap);

/***/ }),

/***/ 31:
/*!******************************************************!*\
  !*** multi ./resources/js/pages/leaflet-map.init.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\diffi\Documents\22\ugro-master\resources\js\pages\leaflet-map.init.js */"./resources/js/pages/leaflet-map.init.js");


/***/ })

/******/ });
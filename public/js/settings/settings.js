/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/settings/settings.js ***!
  \*******************************************/
/** @type {HTMLImageElement} profileImage */
var profileImage = document.getElementById('profile-image');
var currentImgSrc = profileImage.src;
/** @type {HTMLInputElement} imageInput */

var imageInput = document.getElementById('image');

imageInput.onchange = function () {
  if (imageInput.files[0]) {
    profileImage.src = URL.createObjectURL(imageInput.files[0]);
    document.getElementById('preview-text').hidden = false;
  } else {
    profileImage.src = currentImgSrc;
    document.getElementById('preview-text').hidden = true;
  }
};
/******/ })()
;
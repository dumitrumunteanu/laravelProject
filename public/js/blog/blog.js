/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/blog/mostPopular.js":
/*!******************************************!*\
  !*** ./resources/js/blog/mostPopular.js ***!
  \******************************************/
/***/ (() => {

var postTemplate = document.querySelector('[popular-post-template]');
var posts = document.querySelector('[posts-list]');
axios.get('/api/blog/most-popular').then(function (_ref) {
  var data = _ref.data;
  data.forEach(function (postData) {
    var post = postTemplate.content.cloneNode(true).children[0];
    post.querySelector('#title').innerText = postData.title;
    post.querySelector('#link').href = "/blog/".concat(postData.id);
    post.querySelector('#description').innerText = postData.description;

    if (postData.commentsCount > 99) {
      post.querySelector('#commentCount').innerText = '99+';
    } else if (!postData.commentsCount) {
      post.querySelector('#commentCount').hidden = true;
    } else {
      post.querySelector('#commentCount').innerText = postData.commentsCount;
    }

    post.querySelector('#image').src = "storage/blog_img/".concat(postData.image);
    posts.append(post);
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!***********************************!*\
  !*** ./resources/js/blog/blog.js ***!
  \***********************************/
__webpack_require__(/*! ./mostPopular */ "./resources/js/blog/mostPopular.js");
})();

/******/ })()
;
"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * File hayya.js.
 */
(function ($, document, window) {
  if (typeof window === "undefined" || !window.document) {
    (function () {
      throw new Error("Hayya Theme requires a window with a document");
    })();
  }

  var helper = {
    object: {},
    classes: '',
    creatObject: function creatObject(obj) {
      var object;

      switch (obj) {
        case 'body':
          object = document.body;
          break;

        case 'window':
          object = window;
          break;

        default:
          object = obj;
          break;
      }

      this.object = object;
      this.classes = this.object.classList;
      return this;
    },
    css: function css(args) {
      if ('object' === _typeof(args)) {
        for (var key in args) {
          this.object.style[key] = args[key];
        }
      }

      return this;
    },
    // manage class for elements
    addClass: function addClass(c) {
      this.object.classList.add(c);
      return this;
    },
    // manage class for elements
    removeClass: function removeClass(c) {
      this.object.classList.remove(c);
      return this;
    },
    // manage class for elements
    hasClass: function hasClass(c) {
      return this.object.classList.contains(c);
    },
    // adding text to element
    text: function text(_text) {
      var textNode = document.createTextNode(_text);
      this.object.appendChild(textNode);
      return this;
    },
    // manage add attribute(s) for elements
    removeAttr: function removeAttr(attr) {
      this.object.removeAttribute(attr);
      return this;
    },
    // manage add attribute(s) for elements
    setAttr: function setAttr(attr, value) {
      if ('object' === _typeof(attr)) {
        for (var key in attr) {
          this.object.setAttribute(key, attr[key]);
        }
      } else if ('string' === typeof attr) {
        this.object.setAttribute(attr, value);
      }

      return this;
    },
    getSize: function getSize(elem, h, w) {
      return Math.max(elem.documentElement["client" + name], elem.body["scroll" + name], elem.documentElement["scroll" + name], elem.body["offset" + name], elem.documentElement["offset" + name]);
    },
    getPosition: function getPosition() {
      var element = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      var el = element ? element : this.object;
      var x = 0,
          y = 0;

      while (el && !isNaN(el.offsetLeft) && !isNaN(el.offsetTop)) {
        x += el.offsetLeft - el.scrollLeft;
        y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
      }

      return {
        top: y,
        left: x
      };
    }
  };

  var _h = function _h(obj) {
    return helper.creatObject(obj);
  };

  var hayyaTheme =
  /*#__PURE__*/
  function () {
    /**
     * Constructs the object.
     */
    function hayyaTheme() {
      _classCallCheck(this, hayyaTheme);

      // Hayya Theme name
      this.name = 'Hayya Theme'; // Hayya Theme version

      this.version = '4.0'; // Hayya Theme description

      this.description = 'Hayya Theme.';
      this.stickySidebar();
      this.tabs();
    }

    _createClass(hayyaTheme, [{
      key: "tabs",
      value: function tabs() {
        var tabs = document.querySelectorAll('div.tabs');
        tabs && Array.prototype.forEach.call(tabs, function (tab) {
          var ul = tab.firstElementChild;
          var content = tab.lastElementChild;
          var isActivated = false;

          if (!ul && !ul.classList.contains('tabs__list') && !content && !content.classList.contains('tabs__content')) {
            return;
          }

          var list = ul.querySelectorAll('li');
          var tabsBody = content.querySelectorAll('.tabs__content__body');
          var swipeUpHeight = 0;
          list && Array.prototype.forEach.call(list, function (li, listIndex) {
            var link = li.firstElementChild;
            var hash = link.hash;
            var active = content.querySelector(hash);

            if (!active) {
              return;
            }

            var offsetHeight = active.offsetHeight - 5;
            var clientHeight = active.clientHeight;
            var swipeUpHeights = swipeUpHeight;

            if (!isActivated && li && li.classList.contains('active')) {
              if (active) {
                active.classList.add('active');
                content.style.height = "".concat(offsetHeight, "px"); // activeBody.style.maxHeight = `${activeBody.scrollHeight+20}px`

                isActivated = true;
              }
            }

            link && link.addEventListener('click', function (event) {
              event.preventDefault();
              tabsBody && Array.prototype.forEach.call(tabsBody, function (tabBody) {
                if (tabBody.id !== active.id) {
                  tabBody.classList.remove('active');
                  tabBody.style.height = '0';
                }
              });
              list && Array.prototype.forEach.call(list, function (l) {
                l.classList.remove('active');
              });
              li.classList.add('active');
              active && active.classList.add('active');
              content.style.height = "".concat(offsetHeight, "px");
              active.style.height = "".concat(clientHeight, "px");

              if (tab.classList.contains('tabs--swipeup')) {
                // tabsBody[0].style.marginTop = `-${listIndex*100}%`
                tabsBody[0].style.marginTop = "-".concat(swipeUpHeights, "px");
              } else if (tab.classList.contains('tabs--swipeleft')) {
                tabsBody[0].style.marginLeft = "-".concat(listIndex * 100, "%");
              } // active.style.maxHeight = `${active.scrollHeight+20}px`

            });
            swipeUpHeight = swipeUpHeight + offsetHeight;
          });
          tabsBody && Array.prototype.forEach.call(tabsBody, function (tabBody) {
            if (!tabBody.classList.contains('active')) {
              tabBody.style.height = '0';
            }
          });
        });
      }
      /**
       * { function_description }
       */

    }, {
      key: "stickySidebar",
      value: function stickySidebar() {
        if ($('#sticky-sidebar-container').length && $(window).width() >= 601) {
          if ($('#left-content').outerHeight() >= $('#right-sidebar').outerHeight()) {
            var sidebar = $('#sticky-sidebar-container');
            var leftContent = $('#left-content');
            var rightContent = $('#right-content');
            var position = sidebar.position();
            var positionTop = position.top;
            var width = sidebar.outerWidth();
            var height = sidebar.outerHeight();
            var LCHeight = leftContent.outerHeight();
            var LCPosition = leftContent.position();
            var RCHeight = rightContent.outerHeight() + 50;

            if (LCHeight >= RCHeight) {
              $(window).on('scroll', function (e) {
                var scrollTop = $(this).scrollTop();

                if (scrollTop >= positionTop) {
                  sidebar.addClass('sidebar-sticky');
                  sidebar.css('left', position.left);
                  sidebar.css('width', width);
                  var stopAt = LCHeight + LCPosition.top - height * 3;
                  var top = (stopAt - scrollTop) / 3;

                  if (positionTop >= stopAt) {
                    stopAt = LCHeight + LCPosition.top - height;
                    top = stopAt - scrollTop;
                  }

                  if (scrollTop >= stopAt) {
                    sidebar.css('top', top);
                  } else {
                    sidebar.css('top', 0);
                  }
                } else {
                  sidebar.removeClass('sidebar-sticky');
                }
              });
            }
          } // End if().

        } // End if().

      } // stickySidebar ()

    }]);

    return hayyaTheme;
  }();

  document.addEventListener('DOMContentLoaded', function () {
    new hayyaTheme();
  });
})(jQuery, document, window);
/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package HayyaTheme
 */
(function ($) {
  // Start Layout...
  wp.customize('layout-mode', function (value) {
    value.bind(function (newval, oldval) {
      var el = document.querySelector('#page');

      if (el) {
        if ('layout-boxed' == newval) {
          var width = wp.customize('layout-width')._value;

          el.classList.add('layout-boxed');
          el.style.width = "".concat(width, "vw");
        } else {
          el.classList.remove('layout-boxed');
          el.style.width = '';
        }
      }
    });
  });
  wp.customize('layout-width', function (value) {
    value.bind(function (newval) {
      var el = document.querySelector('#page.layout-boxed');
      if (el) el.style.width = "".concat(newval, "vw");
    });
  });
  wp.customize('container-width', function (value) {
    value.bind(function (newval) {
      var el = document.querySelectorAll('.container');
      el && 'function' === typeof el.forEach && el.forEach(function (element) {
        return element.style.width = "".concat(newval, "%");
      });
    });
  });
  wp.customize('layout-background-color', function (value) {
    value.bind(function (newval) {
      document.body.style.backgroundColor = newval;
    });
  });
  wp.customize('layout-background-image', function (value) {
    value.bind(function (newval, oldval) {
      document.body.style.background = "url(\"".concat(newval, "\")"); // $( 'body' ).css( 'background',  'url("' + newval + '")' );
    });
  }); // Start Typography...

  wp.customize('body-font', function (value) {
    value.bind(function (newval, oldval) {
      $('head').append('<link href="https://fonts.googleapis.com/css?family=' + encodeURI(newval) + '" rel="stylesheet" type="text/css">'); // $( 'body' ).css( 'font-family',  newval );

      document.body.style.fontFamily = newval;
    });
  });
  wp.customize('body-size', function (value) {
    value.bind(function (newval, oldval) {
      var height = newval * 1.4;
      document.body.style.fontSize = "".concat(newval, "rem");
      document.body.style.lineHeight = "".concat(height, "rem");
    });
  });
  wp.customize('h1-size', function (value) {
    value.bind(function (newval, oldval) {
      var height = newval * 1.5;
      $('h1').css('font-size', newval + 'rem');
      $('h1').css('line-height', height + 'rem');
    });
  });
  wp.customize('h2-size', function (value) {
    value.bind(function (newval, oldval) {
      var height = newval * 1.5;
      $('h2').css('font-size', newval + 'rem');
      $('h2').css('line-height', height + 'rem');
    });
  });
  wp.customize('h3-size', function (value) {
    value.bind(function (newval, oldval) {
      var height = newval * 1.5;
      $('h3').css('font-size', newval + 'rem');
      $('h3').css('line-height', height + 'rem');
    });
  });
  wp.customize('h4-size', function (value) {
    value.bind(function (newval, oldval) {
      var height = newval * 1.5;
      $('h4').css('font-size', newval + 'rem');
      $('h4').css('line-height', height + 'rem');
    });
  });
  wp.customize('h5-size', function (value) {
    value.bind(function (newval, oldval) {
      var height = newval * 1.5;
      $('h5').css('font-size', newval + 'rem');
      $('h5').css('line-height', height + 'rem');
    });
  });
  wp.customize('h6-size', function (value) {
    value.bind(function (newval, oldval) {
      var height = newval * 1.5;
      $('h6').css('font-size', newval + 'rem');
      $('h6').css('line-height', height + 'rem');
    });
  }); // start Update Header real time...

  wp.customize('header-logo', function (value) {
    value.bind(function (newval, oldval) {
      $('#main-logo img').attr('src', newval);
    });
  });
  wp.customize('header-backgound', function (value) {
    value.bind(function (newval, oldval) {
      $('.site-header.page-header').css('background', 'url("' + newval + '")');
      $('.site-header.page-header').css('background-size', 'cover');
    });
  });
  wp.customize('header-height', function (value) {
    value.bind(function (newval) {
      $('#site-header.site-header').css('height', newval);
    });
  });
  wp.customize('header-text', function (value) {
    value.bind(function (newval) {
      $('#header-content').html(newval);
    });
  }); // start Update Blog...

  wp.customize('show-single-sidebar', function (value) {
    value.bind(function (newval) {
      if ($('.entry-tags').length > 0) {
        if (1 == newval) {
          $('#right-content').css('display', 'inline-block');
          $('#right-content').css('visibility', 'visible');
          $('#left-content').css('width', '75%');
        } else {
          $('#right-content').css('display', 'none');
          $('#right-content').css('visibility', 'hidden');
          $('#left-content').css('width', '100%');
        }
      }
    });
  });
  wp.customize('show-related-and-author', function (value) {
    value.bind(function (newval) {
      if ($('#related_posts').length > 0) {
        if (1 == newval) {
          $('#related_posts').css('display', 'block');
          $('#related_posts').css('visibility', 'visible');
        } else {
          $('#related_posts').css('display', 'none');
          $('#related_posts').css('visibility', 'hidden');
        }
      }
    });
  });
  wp.customize('show-author-card', function (value) {
    value.bind(function (newval) {
      if ($('#author_card').length > 0) {
        if (1 == newval) {
          $('#author_card').css('display', 'block');
          $('#author_card').css('visibility', 'visible');
        } else {
          $('#author_card').css('display', 'none');
          $('#author_card').css('visibility', 'hidden');
        }
      }
    });
  });
  wp.customize('default-posts-image', function (value) {
    value.bind(function (newval) {
      $('img.default-posts-image').attr('src', newval);
    });
  });
  wp.customize('default-slider-image', function (value) {
    value.bind(function (newval) {
      $('img.default-slider-image').attr('src', newval);
    });
  }); // Update footer text in real time...

  wp.customize('show-footer-widgets', function (value) {
    value.bind(function (newval) {
      if ($('#footer-sidebar').length > 0) {
        if (1 == newval) {
          $('#footer-sidebar').css('display', 'block');
          $('#footer-sidebar').css('visibility', 'visible');
        } else {
          $('#footer-sidebar').css('display', 'none');
          $('#footer-sidebar').css('visibility', 'hidden');
        }
      }
    });
  });
  wp.customize('footer-backgound', function (value) {
    value.bind(function (newval, oldval) {
      $('.site-footer.page-footer').css('background', 'url("' + newval + '")');
      $('.site-footer.page-footer').css('background-size', 'cover');
    });
  });
  wp.customize('footer-text', function (value) {
    value.bind(function (newval) {
      $('#footer-content').html(newval);
    });
  });
  wp.customize('show-copyright', function (value) {
    value.bind(function (newval) {
      if ($('#footer-copyright').length > 0) {
        if (1 == newval) {
          $('#footer-copyright').css('display', 'block');
          $('#footer-copyright').css('visibility', 'visible');
        } else {
          $('#footer-copyright').css('display', 'none');
          $('#footer-copyright').css('visibility', 'hidden');
        }
      }
    });
  });
  wp.customize('footer-copyright-text', function (value) {
    value.bind(function (newval) {
      $('#footer-copyright div.container').html(newval);
    });
  });
  wp.customize('copyright-alignment', function (value) {
    value.bind(function (newval) {
      $('#footer-copyright div.container').css('text-align', newval);
    });
  });
})(jQuery);
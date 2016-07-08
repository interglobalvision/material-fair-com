/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Site, Modernizr */

Site = {
  mobileThreshold: 601,
  init: function() {
    var _this = this;

    $(window).resize(function(){
      _this.onResize();
    });

    if ($('body').hasClass('post-type-archive-press')) {
      _this.Press.init();
    }
  },

  onResize: function() {
    var _this = this;

  },

  fixWidows: function() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  },
};

Site.Press = {
  init: function() {
    var _this = this;

    if ($('.swiper-slide').length) {
      _this.photoGallery();
    }
  },

  photoGallery: function() {
    var mySwiper = new Swiper('.swiper-container', {
      speed: 400,
      spaceBetween: 100,
      nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
      loop: true,
    }); 
  },
};

jQuery(document).ready(function () {
  'use strict';

  Site.init();

});
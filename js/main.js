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

    if ($('body').hasClass('post-type-archive-event')) {
      _this.Program.init();
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

Site.Program = {
  init: function() {
    var _this = this;

    if ($('.calendar-day').length) {
      _this.calendarAccordion();
    }
  },

  calendarAccordion: function() {
    $('.calendar-heading').on('click', function() {
      var $events = $(this).next('.calendar-events');

      if (!$(this).hasClass('active')) {
        var height = $events.css('height','auto').outerHeight();
        $events.css('height',0);
        $events.stop().animate({'height':height},200);
        $(this).addClass('active');
      } else {
        $events.stop().animate({'height':0},200);
        $(this).removeClass('active');
      }
    })
  },
};

jQuery(document).ready(function () {
  'use strict';

  Site.init();

});
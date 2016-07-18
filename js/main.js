/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Site, Modernizr */

Site = {
  mobileThreshold: 601,
  $body: $('body');

  init: function() {
    var _this = this;
      
    $(window).resize(function(){
      _this.onResize();
    });

    if (Site.$body.hasClass('post-type-archive-press')) {
      _this.Press.init();
    }

    if (Site.$body.hasClass('post-type-archive-event')) {
      _this.Program.init();
    }

    _this.Mailchimp.init();
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

Site.Mailchimp = {
  $mailchimpForm: $('#mailchimp-form'),
  $submitButton: this.$mailchimpForm.find('input[type="submit"]'),
  $emailInput: this.$mailchimpForm.find('input[type="email"]'),

  init: function() {
    var _this = this;
      
    if (_this.$mailchimpForm.length) {
      _this.bindSubmit();
    }
  },

  bindSubmit: function() {
    var _this = this;

    _this.$submitButton.on('click', function (event) {
      event.preventDefault();
      _this.$submitButton.prop('disabled', true);

      if (_this.validateEmail(_this.$emailInput.val())) { 
        _this.mailchimpAjax(Site.$mailchimpForm); 
      } else {
        _this.printResponse('invalid-email');
      }
    });
  },

  validateEmail: function(email) {
    var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var is_email = regex.test(email);

    if (is_email) {
      return true;
    }
    return false;
  },

  mailchimpAjax: function($form) {
    var _this = this;

    $.ajax({
      type: $form.attr('method'),
      url: $form.attr('action'),
      data: $form.serialize(),
      cache: false,
      dataType: 'jsonp',
      jsonp: 'c',
      contentType: "application/json; charset=utf-8",
      error: function(err) { 
        _this.printResponse('server-error');
      },
      success: function(data) {
        if (data.result != 'success') {
          _this.printResponse('invalid-email');
        } else {
          _this.printResponse('success');
        }
      },
    });
  },

  printResponse: function(code) {
    var _this = this,
      $responseElem = $('#mailchimp-response');

    switch (code) {
      case 'invalid-email':
        if (currentLang == 'es') {
          $responseElem.html('Tu correo está raro...inténtalo de nuevo');
        } else {
          $responseElem.html('Your email is weird...try again');
        }
        break;
      case 'server-error':
        if (currentLang == 'es') {
          $responseElem.html('Parece que el servidor no funciona :(');
        } else {
          $responseElem.html('Looks like the server is down :(');
        }
        break;
      case 'success':
        if (currentLang == 'es') {
          $responseElem.html('¡Exito! Muchas gracias :)');
        } else {
          $responseElem.html('Success! Thanks a lot :)');
        }
        break;
    }

    _this.$submitButton.prop('disabled', false)
    _this.$emailInput.val('');
  }
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

//Menu
(function($) {
  $.fn.menumaker = function(options) {  
   var cssmenu = $(this), settings = $.extend({
     format: "dropdown",
     sticky: false
   }, options);
   return this.each(function() {
     $(this).find(".hamburger").on('click', function(){
       $(this).toggleClass('menu-opened');
       var mainmenu = $(this).next('.main-menu');
       if (mainmenu.hasClass('open')) { 
         mainmenu.slideToggle().removeClass('open');
       }
       else {
         mainmenu.slideToggle().addClass('open');
         if (settings.format === "dropdown") {
           mainmenu.find('.main-menu').show();
         }
       }
     });
     cssmenu.find('li ul').parent().addClass('has-sub');
  multiTg = function() {
       cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
       cssmenu.find('.submenu-button').on('click', function() {
         $(this).toggleClass('submenu-opened');
         if ($(this).siblings('ul').hasClass('open')) {
           $(this).siblings('ul').removeClass('open').slideToggle();
         }
         else {
           $(this).siblings('ul').addClass('open').slideToggle();
         }
       });
     };
     if (settings.format === 'multitoggle') multiTg();
     else cssmenu.addClass('dropdown');
     if (settings.sticky === true) cssmenu.css('position', 'fixed');
  resizeFix = function() {
    var mediasize = 991;
       if ($( window ).width() > mediasize) {
         cssmenu.find('.main-menu, .main-menu ul ul').show();
       }
       if ($(window).width() <= mediasize) {
         cssmenu.find('.main-menu, .main-menu ul ul').hide().removeClass('open');
       }
     };
     resizeFix();
     return $(window).on('resize', resizeFix);
   });
    };
  })(jQuery);
  
  (function($){
  $(document).ready(function(){
  $("#menu").menumaker({
     format: "multitoggle"
  });
  });
  })(jQuery);

    const header = document.querySelector(".header-area");
const toggleClass = "sticky";

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll > 150) {
    header.classList.add(toggleClass);
  } else {
    header.classList.remove(toggleClass);
  }
});


 
  /*-------------------------------------------------------------------------*
  *                             slider                         *
  *-------------------------------------------------------------------------*/

 




  $('#secBannerSlider').slick({
    slidesToShow: 3, slidesToScroll: 1, infinite: true, loop: true, dots: false, arrows: false, autoplay: true, autoplaySpeed: 3000, pauseOnHover: true,
    prevArrow: $(".secBannerSliderPrev"),
    nextArrow: $(".secBannerSliderNext"),
    responsive: [
      {
        breakpoint: 1300,
        settings: { slidesToShow: 3, }
      },
      {
        breakpoint: 992,
        settings: { slidesToShow: 3, }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 480,
        settings: { slidesToShow: 1, }
      }
    ]

  });


  $('#secBrandSlider').slick({
    slidesToShow: 5, slidesToScroll: 1, infinite: true, loop: true, dots: false, arrows: false, autoplay: true, autoplaySpeed: 3000, pauseOnHover: true,
    prevArrow: $(".secBrandSliderPrev"),
    nextArrow: $(".secBrandSliderNext"),
    responsive: [
      {
        breakpoint: 1200,
        settings: { slidesToShow: 4, }
      },
      {
        breakpoint: 992,
        settings: { slidesToShow: 3, }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 3, }
      },
      {
        breakpoint: 480,
        settings: { slidesToShow: 2, }
      }
    ]

  });


  $('#secProjectSlider').slick({
    slidesToShow: 2, slidesToScroll: 1, infinite: true, loop: true, dots: false, arrows: true, autoplay: true, autoplaySpeed: 3000, pauseOnHover: true,
    prevArrow: $(".secProjectSliderPrev"),
    nextArrow: $(".secProjectSliderNext"),
    responsive: [
      {
        breakpoint: 1200,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 992,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 480,
        settings: { slidesToShow: 1, }
      }
    ]

  });


  $('#secBlogSlider').slick({
    slidesToShow: 3, slidesToScroll: 1, infinite: true, loop: true, dots: false, arrows: true, autoplay: true, autoplaySpeed: 3000, pauseOnHover: true,
    prevArrow: $(".secBlogSliderPrev"),
    nextArrow: $(".secBlogSliderNext"),
    responsive: [
      {
        breakpoint: 1200,
        settings: { slidesToShow: 3, }
      },
      {
        breakpoint: 992,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 481,
        settings: { slidesToShow: 1, }
      }
    ]

  });


  $('#secTestiSlider').slick({
    slidesToShow: 3, slidesToScroll: 1, infinite: true, loop: true, dots: false, arrows: true, autoplay: false, autoplaySpeed: 3000,   infinite: true, variableWidth: true, 
    prevArrow: $(".secTestiSliderPrev"),
    nextArrow: $(".secTestiSliderNext"),
    responsive: [
      {
        breakpoint: 1900,
        settings: { slidesToShow: 4, }
      },
      {
        breakpoint: 1200,
        settings: { slidesToShow: 3, }
      },
      {
        breakpoint: 992,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 480,
        settings: { slidesToShow: 1, }
      }
    ]

  });


  $('#secOProjectSlider').slick({
    slidesToShow: 3, slidesToScroll: 1, infinite: true, loop: true, dots: false, arrows: true, autoplay: true, autoplaySpeed: 3000, pauseOnHover: true,
    prevArrow: $(".secOProjectSliderPrev"),
    nextArrow: $(".secOProjectSliderNext"),
    responsive: [
      {
        breakpoint: 1200,
        settings: { slidesToShow: 3, }
      },
      {
        breakpoint: 992,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 768,
        settings: { slidesToShow: 2, }
      },
      {
        breakpoint: 576,
        settings: { slidesToShow: 1, }
      }
    ]

  });





  $('.faq summary').on('click', function () {
    $('.faq summary').not(this).parent('details').removeAttr('open');
  });
(function ($) {

  const wdtImageSliderWidgetHandler = function ($scope, $) {


    const $image_slider_option = $scope.find('.wdt-image-carousel-holder');
    const $image_content_option = $image_slider_option.data('settings');
    const $swiperItem = $image_slider_option.find('.swiper');
    const $moduleId = $swiperItem.data('wrapper-class');
    const $moduleimageId = $swiperItem.data('id');
    const $swiperThumbItem = $image_slider_option.find('.wdt-imagenail-carousel');
    const $moduleThumbId = $swiperThumbItem.data('wrapper-image-class');


    const $slides_to_show = ($image_content_option['slides_to_show_opts'] !== undefined) ? parseInt($image_content_option['slides_to_show_opts']) : 1;
    const $loop = ($image_content_option['loop'] !== undefined) ? ($image_content_option['loop'] == 'yes') : false;
    const $freemode = ($image_content_option['freemode'] !== undefined) ? ($image_content_option['freemode'] == 'yes') : false;
    const $slides_to_scroll = ($image_content_option['slides_to_scroll'] !== undefined) ? parseInt($image_content_option['slides_to_scroll']) : 1;
    const $arrows = ($image_content_option['arrows'] !== undefined) ? ($image_content_option['arrows'] == 'yes') : false;
    const $centered_slides = ($image_content_option['centered_slides'] !== undefined) ? ($image_content_option['centered_slides'] == 'yes') : false;
    // const $space_between	 	= ($image_content_option['space_between'] !== undefined) ? parseInt($image_content_option['space_between']) : 10;
    const $space_between_gaps = $image_content_option['space_between_gaps'];
    var $deviceMode = elementorFrontend.getCurrentDeviceMode();

    const $space_between = $space_between_gaps[$deviceMode] ? $space_between_gaps[$deviceMode] : 0;

    if ($image_content_option === undefined) {
      return;
    }
 
  const $imageresponsiveSettings = $image_content_option['responsive'];
  const $imageresponsiveData = {};
  $.each($imageresponsiveSettings, function (index, value) {
    $imageresponsiveData[value.breakpoint] = {
      slidesPerView: value.toshow,
      slidesPerGroup: value.toscroll
    };
  });
  var galleryTop = new Swiper('.wdt-img-slider', {
    spaceBetween: $space_between,
    navigation: {
      nextEl: '.wdt-arrow-image-pagination-next',
      prevEl: '.wdt-arrow-image-pagination-prev',
    },
    loop: $loop,
    slidesPerView: $slides_to_show,
    loopFillGroupWithBlank: true,
    thumbs: {
      swiper: galleryThumbs,
    },
    breakpoints: $imageresponsiveData,
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
      speed: 1000, // fade speed in milliseconds
      autoplaySpeed: 3000 // autoplay speed in milliseconds
    }
  });

  var galleryThumbs = new Swiper('.wdt-imagenail-carousel', {
    spaceBetween: $space_between,
    centeredSlides: $centered_slides,
    // slidesPerView: $slides_to_show,
    touchRatio: 0.2,
    slideToClickedSlide: true,
    loop: $loop,
  });

  galleryTop.controller.control = galleryThumbs;
  galleryThumbs.controller.control = galleryTop;


  }

  $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/wdt-image-slider.default', wdtImageSliderWidgetHandler);
  });

})(jQuery);
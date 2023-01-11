/*!jslint
  this
*/
jQuery(function ($) {
  "use strict";
  // $("body").css("opacity","0");
  // $( document ).ready(function() {
  //   $("body").css("opacity","1");
  // });
  function appHeight() {
    var wh = $(window).innerHeight();
    document.documentElement.style
      .setProperty('--app-height', wh + 'px');

  }
  window.addEventListener('resize', appHeight)
  appHeight();
  if ($('#companies').length) {
    if ($(window).width() >= 1440) {
      $('#companies').attr('data-aos-offset', '500');
    } else if ($(window).width() >= 1024) {
      $('#companies').attr('data-aos-offset', '400');
    } else {
      $('#companies').removeAttr('data-aos-offset');
    }
  }
  $(document).on('click', '.main-nav-toggle', function (e) {
    e.preventDefault();
    //$(this).toggleClass('on');
    $('body').toggleClass('nav-open');
    $('.mobile-navigation').removeClass('sub-nav-on');
  });
  $(document).on('click', '.cs-nav-sub-toggle a', function (e) {
    //$(this).toggleClass('on');
    $('.mobile-navigation').addClass('sub-nav-on');
  });
  $(document).on('click', '.sub-nav-toggle', function (e) {
    //$(this).toggleClass('on');
    $('.mobile-navigation').removeClass('sub-nav-on');
  });
  $(document).on('click', '.contact-form-popup', function (e) {
    e.preventDefault();
    $('body').addClass('cf-open');
  });
  $(document).on('click', '.cf-close', function (e) {
    e.preventDefault();
    $('body').removeClass('cf-open');
  });

  $(".main-navigation ul.menu > li.fw-sub-nav")
    .mouseenter(function () {
      $('body').addClass('sub-nav-on');
    })
    .mouseleave(function () {
      $('body').removeClass('sub-nav-on');
    });

  if ($(window).width() <= 1023) {
    $(document).on('click', '.site-footer-widget h2', function (e) {
      $(this).toggleClass('on');
      $(this).next().find('.menu').slideToggle();
    });
  }
  $('.video-popup').magnificPopup({
    type: 'iframe',
    iframe: {
      markup: '<div class="mfp-iframe-scaler">' +
        '<div class="mfp-close"></div>' +
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
        '</div>',
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: 'v=',
          src: '//www.youtube.com/embed/%id%?autoplay=1'
        }
      },
      srcAction: 'iframe_src',
    },
    callbacks: {
      open: function (el) {
        $('html').addClass('mfp-cs-open');
      },
    }
  });
  var isScrolled = false;
  $(window).on('scroll', function () {
    var ST = $(this).scrollTop();
    /*var $btn = $('.banner');
      if($($btn).length){
      
      var OT = $('.banner').offset().top + $('.banner').outerHeight();
    
        if(ST >= OT){
            $('.main-navigation-2 ul.menu > li:last-child').addClass('loaded');
        }else{
            $('.main-navigation-2 ul.menu > li:last-child').removeClass('loaded');
        }
    }*/
    if (ST >= 100) {
      $('.site-header').addClass('floating');
    } else {
      $('.site-header').removeClass('floating');
    }
    if ($('#solutions').length || $('.sl-cnt-block').length) {
      if ($(window).width() >= 1024) {
        var SlT = $('.home-solutions-items').offset().top;
        var SlH = $('.home-solutions-items').outerHeight();
        var IH = $('.home-solutions-head').outerHeight();
        if (ST >= SlT - 90) {
          if (ST >= SlT - 90 && ST <= SlT + SlH - IH - 90) {
            $('.home-solutions-head').addClass('sticky').css('top', '0');
          } else {
            $('.home-solutions-head').removeClass('sticky').css('top', SlH - IH);
          }
        } else {
          $('.home-solutions-head').removeClass('sticky').css('top', '0');
        }
        $('.home-solutions-item').each(function (i) {
          var OTN = $(this).offset().top;
          var IHN = $(this).outerHeight();
          var OBN = OTN + IHN;
          var offset = 110;
          isScrolled = $(this);


          if (ST >= SlT - 90) {
            if (ST > OTN - offset && ST < OBN - offset) {
              $(this).addClass('active');
              $(this).find('.home-solutions-item-content').slideDown('slow');
            } else {
              $(this).removeClass('active');
              $(this).find('.home-solutions-item-content').slideUp();

            }
          } else {
            $(this).removeClass('active');
            //$(this).find('.home-solutions-item-content').slideUp();
          }
        });
      }
    }
  });
  $(function () {
    AOS.init({
      easing: 'ease-in-out-sine',
      duration: 400,
      once: true
    });
  });

  $('.path-anim').each(function (i) {
    var $svg = $(this).drawsvg();
    var $parent = $(this).data('aos-parent');
    var aosid = $('.' + $parent).data('aos-id');
    document.addEventListener('aos:in:' + aosid, ({ detail }) => {
      setTimeout(function () { $svg.drawsvg('animate'); }, 300);
    });
  });
  var solutionSLick = {
    dots: true,
    infinite: true,
    autoplay: false,
    arrows: false,
    dotsClass: 'carousel-main-paginate',
    customPaging: function (slider, i) {
      //FYI just have a look at the object to find available information
      //press f12 to access the console in most browsers
      //you could also debug or look in the source                    
      return (i + 1) + ' out of ' + slider.slideCount;
    },
  }
  var expTexhSLick = {
    dots: false,
    infinite: true,
    autoplay: false,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 744,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
  }
  var IndVertSLick = {
    dots: false,
    autoplay: false,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 744,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 540,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  }
  function slSlick() {
    if ($(window).width() <= 1023) {
      $('.home-solutions-items:not(.slick-initialized), .service-work-items:not(.slick-initialized)').slick(solutionSLick);
      $('.service-exp-items:not(.slick-initialized)').slick(expTexhSLick);
      $('.verticals-block-items-m-cl:not(.slick-initialized)').slick(IndVertSLick);
    } else {
      $(".home-solutions-items.slick-initialized, .service-work-items.slick-initialized").slick('unslick');
      $(".service-exp-items.slick-initialized").slick('unslick');
      $(".verticals-block-items-m-cl.slick-initialized").slick('unslick');
    }
  }
  slSlick();
  $(window).on("resize", function () {
    slSlick();
  });
  $(document).on('click', '.carousel-prev', function (e) {
    $(this).parents('.carousel-main').find('.slick-slider').slick('slickPrev');
    $(this).parents('.carousel-footer').find('.carousel-footer-bar').removeClass('active');
    $(this).parents('.carousel-footer').find('.carousel-footer-bar').addClass('active');
    setTimeout(() => {
      $(this).parents('.carousel-footer').find('.carousel-footer-bar').removeClass('active');
    }, 1000);
  });

  $(document).on('click', '.carousel-next', function (e) {
    $(this).parents('.carousel-main').find('.slick-slider').slick('slickNext');
    setTimeout(() => {
      $(this).parents('.carousel-footer').find('.carousel-footer-bar').removeClass('active');
    }, 1000);
    $(this).parents('.carousel-main').find('.slick-slider').slick('slickPrev');
    $(this).parents('.carousel-footer').find('.carousel-footer-bar').removeClass('active');
    $(this).parents('.carousel-footer').find('.carousel-footer-bar').addClass('active');
  });

  $('.home-companies-cl').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    arrows: false,
    centerMode: true,
    variableWidth: true,
    autoplaySpeed: 0,
    slidesToShow: 1,
    slidesToScroll: 1,
    cssEase: 'linear',
    speed: 5000,
  });
  $('.home-casestudies-cl-left').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.home-casestudies-cl-right'
  });
  $('.home-casestudies-cl-right').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.home-casestudies-cl-left'
  });
  $('.home-testimonials-cl-main').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    fade: true,
    infinite: true,
    asNavFor: '.home-testimonials-cl-content'
  });
  $('.home-testimonials-cl-content').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    infinite: true,
    asNavFor: '.home-testimonials-cl-main'
  });
  $('.single-cl').slick({
    dots: false,
    infinite: true,
    arrows: false,
  });


  $('.service-em-techs-items').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 744,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
  $('.verticals-block-items-cl').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 744,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 540,
        settings: {
          slidesToShow: 1,
        }
      }

    ]
  });
  $('.service-verticals-items').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 744,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
  $('.carousel-main .sl-block-items').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 744,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
  $('.about-team-cl-main').slick({
    dots: true,
    autoplay: false,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    //asNavFor: '.about-team-cl-sub'
    dotsClass: 'about-team-paginate',
    customPaging: function (slider, i) {
      //FYI just have a look at the object to find available information
      //press f12 to access the console in most browsers
      //you could also debug or look in the source    
      var $img = $(slider.$slides[i]).find('.about-team-cl-main-item-img span').html();
      var $name = $(slider.$slides[i]).find('.about-team-cl-main-item-cnt h3').text();
      return '<button class="tab">' + $img + '<span>' + $name + '</span></button>';
    },
  });
  /*$('.about-team-cl-sub').slick({
      dots: false,
      autoplay: false,
      arrows: false, 
      slidesToShow: 1,
      variableWidth: true,  
      outerEdgeLimit: true,
      infinite: true,   
      cssEase: 'linear',
      asNavFor: '.about-team-cl-main',
  });*/
  $('.cs-s-cl').slick({
    dots: false,
    autoplay: false,
    arrows: false,
    slidesToShow: 2,
    variableWidth: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
        }
      },
      {
        breakpoint: 744,
        settings: {
          slidesToShow: 1,
          variableWidth: false,
        }
      }
    ]
  });

  $('.blog-categories-list').slick({
    dots: false,
    autoplay: false,
    arrows: true,
    slidesToScroll: 1,
    slidesToShow: 1,
    variableWidth: true,
    infinite: false,
    nextArrow: "<button type='button' class='slick-next slick-arrow'><svg width='22' height='22' viewBox='0 0 22 22' xmlns='http://www.w3.org/2000/svg' version='1.1' preserveAspectRatio='xMinYMin'><path xmlns='http://www.w3.org/2000/svg' fill='white' d='M6.875 4.95859L7.76445 4.125L15.125 11L7.76445 17.875L6.875 17.0457L13.3418 11L6.875 4.95859Z'/></svg></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          infinite: true,
        }
      }
    ]
  });
  function SlickArrowDis() {
    var childrenWidth = 0;
    $('.blog-categories-list .slick-track').children().each(function () {
      childrenWidth += $(this).outerWidth();
    });
    var outerContainerWidth = $('.blog-categories-list').width() + 70;
    var nextArrow = $('.slick-next');
    if (childrenWidth < outerContainerWidth) {
      if (!(nextArrow.hasClass('slick-disabled'))) {
        nextArrow.addClass('slick-disabled');
      }
    } else {
      if ((nextArrow.hasClass('slick-disabled'))) {
        nextArrow.removeClass('slick-disabled');
      }
    }
  }
  SlickArrowDis();
  $(window).on("resize", function () {
    SlickArrowDis();
  });



  $(document).on('click', '.copy-clip', function (e) {
    e.preventDefault();
    var value = $(this).data('text');
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(value).select();
    document.execCommand("copy");
    $temp.remove();
  });
  $(document).on('change', '.cs-file input[type="file"]', function (e) {
    var fileName = e.target.files[0].name;
    $(this).parent().append('<span class="cs-file-selected-val">' + fileName + '</span>');
    $(this).parents('.cs-file').addClass('file-selected');
  });
  $(document).on('click', '.acc-item-head', function (e) {
    $('.acc-item-head').removeClass('on');
    $('.acc-item-content').slideUp('normal');
    if ($(this).next().is(':hidden') == true) {
      $(this).addClass('on');
      $(this).next().slideDown('normal');
    }
  });
  $(document).on('click', '.service-work-tab h2 a', function (e) {
    e.preventDefault();
    $('.service-work-tab h2').removeClass('active');
    $(this).parent().addClass('active');
    var tab1 = $(this).data('tab-item-1');
    var tab2 = $(this).data('tab-item-2');
    $('.service-work-item , .service-work-right-item').removeClass('active aos-animate');
    $(tab1).addClass('active');
    $(tab2).addClass('active');
    setTimeout(() => {
      $(tab1).addClass('aos-animate');
      $(tab2).addClass('aos-animate');
    }, 100);

  });
  if ($('.about-we-are-panel').length) {
    if ($(window).width() >= 743) {
      $(".about-we-are-panel > div").each(function (index) {
        var text = $(this).find('h4').html();
        for (var i = 0; i < 10; i++) {
          $(this).append('<span>' + text + '</span>');
        }
      });
      setRandomClass();
      setInterval(function () {
        setRandomClass();
      }, 300);//number of milliseconds (2000 = 2 seconds)

      function setRandomClass() {
        $(".about-we-are-panel > div").each(function (index) {
          var items = $(this).find("span");
          var number = items.length;
          var random = Math.floor((Math.random() * number));
          items.removeClass("active");
          items.eq(random).addClass("active");
        });
      }
    }
  }
  $(document).on('click', '.about-team-cl-sub .slick-slide', function (e) {
    var ind = $(this).data('slick-index');
    $('.about-team-cl-main').slick('slickGoTo', ind);
  });
  $(document).on('click', '.loadmore', function (e) {
    e.preventDefault();
    var $el = $(this),
      $tgt = $el.data('target'),
      link = $el.attr('href');
    if ($el.attr('disabled'))
      return;
    $el.addClass('loading').attr('disabled', true);
    $el.find('span').html('Loading...')
    console.log($tgt.html);
    $("<div>").load(link + $tgt, function () {
      //$($tgt).append($(this).find($tgt).html());
      $el.parents('.load-more').removeAttr('disabled').remove();
    });
  });
  $(document).on('click', '.blog-categories a', function (e) {
    e.preventDefault();
    var $el = $(this),
      $tgt = '#loadmorecontainer',
      link = $el.attr('href');
    if ($el.attr('disabled'))
      return;
    $('.blog-categories a').removeClass('active');
    $el.addClass('active');
    $('body').addClass('blog-loading');
    $($tgt).load(link + ' ' + $tgt, function () {
      $('body').removeClass('blog-loading');
    });
  });
  $('a.scroll-to').bind('click', function (event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top
    }, 700);
    event.preventDefault();
  });

  $('.faq-item-title').click(function () {
    $('.faq-item-title').removeClass('on');
    $('.faq-item-content').slideUp('normal');
    if ($(this).next().is(':hidden') == true) {
      $(this).addClass('on');
      $(this).next().slideDown('normal');
    }
  });


  //start toc

  // Cache selectors
  var lastId,
    topMenu = $(".links-toc-wrap"),
    topMenuHeight = $(".site-header").outerHeight() + 15,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function () {
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

  // Bind click handler to menu items
  // so we can get a fancy scroll animation
  menuItems.click(function (e) {
    var href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
    $('html, body').stop().animate({
      scrollTop: offsetTop
    }, 300);
    e.preventDefault();
  });

  // Bind to scroll
  $(window).scroll(function () {
    // Get container scroll position
    var fromTop = $(this).scrollTop() + topMenuHeight;

    // Get id of current scroll item
    var cur = scrollItems.map(function () {
      if ($(this).offset().top < fromTop)
        return this;
    });
    // Get the id of the current element
    cur = cur[cur.length - 1];
    var id = cur && cur.length ? cur[0].id : "";

    if (lastId !== id) {
      lastId = id;
      // Set/remove active class
      menuItems
        .parent().removeClass("active")
        .end().filter("[href='#" + id + "']").parent().addClass("active");
    }
  });


  // Maximum value for the progressbar
  var winHeight = $(window).height(),
    docHeight = $('.blog-post-content-main').outerHeight(),
    bHeight = $('.blog-post-header-left').height();
  var max = docHeight - winHeight;
  $('.reading-pgbar').attr('max', max);

  // Inital value (if the page is loaded within an anchor)
  if ($(window).scrollTop() > bHeight) {
    var value = $(window).scrollTop() - bHeight;
  } else {
    var value = 0;
  }
  $('.reading-pgbar').attr('value', value);
  // Maths & live update of progressbar value
  $(document).on('scroll', function () {
    if ($(window).scrollTop() > bHeight) {
      var value = $(window).scrollTop() - bHeight;
    }
    else {
      var value = 0;
    }
    $('.reading-pgbar').attr('value', value);
    if ($(window).scrollTop() > bHeight) {
      $('.back-to-top').addClass('active');
    } else {
      $('.back-to-top').removeClass('active');
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
  });



  $(window).on("resize", function () {
    var winHeight = $(window).height();
    var ctaHeight = $('.sidebar-widget-cta-2').outerHeight();
    var btboxHeight = $('.bottom-box').outerHeight();
    if (ctaHeight == null) {
      ctaHeight = -20;
    }
    if ($('.bottom-box').hasClass('active')) {
      var tocHeight = winHeight - ctaHeight - btboxHeight - 245;
    } else {
      var tocHeight = winHeight - ctaHeight - 245;
    }
    if (tocHeight < 0) {
      tocHeight = 100;
    }
    $('.links-toc-wrap').css('max-height', tocHeight);
  }).resize();
  $(document).on('click', '.close-box', function (e) {
    e.preventDefault();
    $(this).parents('.bottom-box').hide().removeClass('active');
    var winHeight = $(window).height();
    var ctaHeight = $('.sidebar-widget-cta-2').outerHeight();
    if (ctaHeight == null) {
      ctaHeight = -20;
    }
    var tocHeight = winHeight - ctaHeight - 245;
    if (tocHeight < 0) {
      tocHeight = 100;
    }
    $('.links-toc-wrap').css('max-height', tocHeight);
  });


//playbook start 

  $(document).ready(function () {

    var bodyheight = $('.playbook-banner').innerHeight();
    var playbookContentHeight = $('.playbook-content').innerHeight();
    $(window).resize(function () {
      bodyheight = $('.playbook-banner').innerHeight();
      playbookContentHeight = $('.playbook-content').innerHeight();
    }).resize();
    $(window).scroll(function () {
      if ((bodyheight < $(window).scrollTop() + 100)) {
        if ($('.playbook-content-left').hasClass("s")) {
        } else {
          $('.playbook-content-left').addClass("s")
        }
      }
      else {
        if ($('.playbook-content-left').hasClass("s")) {
          $('.playbook-content-left').removeClass("s")
        }
      }

      if (((bodyheight + playbookContentHeight - 250) < $(window).scrollTop())) {
        $('.playbook-content-left').removeClass("s")
      }
    })

  });
  
    function mobileOnlySlider() {
      $('.blog-item-playbook').slick({
        dots: false,
        infinite: true,
        arrows: false,
        slidesToShow: 2,
        responsive: [
          {
            breakpoint: 1024, // tablet breakpoint
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 480, // mobile breakpoint
            settings: {
              slidesToShow: 1,
            }
          }
        ]
      });
    }
  
   
  
    $(window).resize(function (e) {
      if (window.innerWidth < 1024) {
        if (!$('.blog-item-playbook').hasClass('slick-initialized')) {
          mobileOnlySlider();
        }
  
      } else {
        if ($('.blog-item-playbook').hasClass('slick-initialized')) {
          $('.blog-item-playbook').slick('unslick');
        }
      }
    });
    //playbook end

});


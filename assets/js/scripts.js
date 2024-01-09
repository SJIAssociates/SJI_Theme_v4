let horizontalAnimation = null;

jQuery(document).ready(function ($) {
  /* Main Nav */
  //Main Nav - gsap timeline
  var navTl = gsap.timeline();
  navTl.to(".popout-nav", {
    left: 0,
    ease: "power2",
    duration: 0.5,
  });
  navTl.to(
    ".popout-nav__asterisk",
    {
      top: 120,
      rotation: 360,
      duration: 1,
    },
    0.5
  );
  navTl.to(
    ".popout-nav__feature",
    {
      left: 0,
      duration: 1,
      ease: "power2",
    },
    0.5
  );
  navTl.to(
    ".popout-nav__nav li",
    {
      opacity: 1,
      left: 0,
      duration: 1,
      stagger: 0.1,
      ease: "power2",
    },
    1
  );
  navTl.to(
    ".popout-nav__feature__post",
    {
      right: 0,
      duration: 1,
      ease: "power1",
    },
    1
  );
  navTl.to(
    ".popout-nav__social li",
    {
      opacity: 1,
      right: 0,
      duration: 1,
      stagger: 0.1,
      ease: "power2",
    },
    1.5
  );
  navTl.pause(0);

  //Main Nav - mobile Nav toggle
  $(".navbar-toggler").click(function () {
    $(".navbar-toggler").toggleClass("js-active");
    navTl.play();
  });

  $(".popout-nav .navbar-toggler").click(function () {
    navTl.pause(0);
  });

  /*Navigation Scroll Animation*/
  var didScroll;
  var lastScrollTop = 0;
  var delta = 210;

  $(window).scroll(function (event) {
    didScroll = true;
  });

  setInterval(function () {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    var st = $(this).scrollTop();
    var pathArray = window.location.pathname.split("/");

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta) return;

    if (pathArray[1].length <= 0) {
      if (st < 200) {
        $("header").addClass("transparent");
      } else {
        $("header").removeClass("transparent");
      }
    }
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop) {
      // Scroll Down
      $("header").removeClass("nav-down");
      $("header").addClass("nav-up");
    } else {
      // Scroll Up
      if (st + $(window).height() < $(document).height()) {
        $("header").removeClass("nav-up");
        $("header").addClass("nav-down");
      }
    }

    lastScrollTop = st;
  }

  /*Hero Animation*/
  if ($(".js-gsap-hero").length) {
    var heroTl = gsap
      .timeline()
      .to(".js-gsap-line1", {
        left: 0,
        duration: 1,
      })
      .to(
        ".js-gsap-line2",
        {
          left: 0,
          duration: 1,
        },
        0.5
      )
      .to(
        ".js-gsap-line3",
        {
          left: 0,
          duration: 1,
        },
        1
      );

    ScrollTrigger.create({
      trigger: ".hero__banner",
      start: 75,
      animation: heroTl,
    });
  }

  /*Parallax Background Elements*/
  if ($(".js-gsap-parallax").length) {
    gsap.registerPlugin(ScrollTrigger);

    $(".js-gsap-parallax").each(function () {
      var topSibling = $(this).prev();

      gsap.to(this, {
        scrollTrigger: {
          trigger: this,
          start: "top bottom",
          toggleActions: "play reverse play reverse",
        },
        opacity: 1,
        duration: 0.15,
      });
      gsap.to(this, {
        scrollTrigger: {
          trigger: topSibling,
          start: "bottom 10%",
          end: "bottom -50%",
          toggleActions: "play reverse play reverse",
        },
        zIndex: 0,
        duration: 0.15,
      });
    });
  }

  /*Post Grid Filters*/
  //Post Grid Filters - active state
  $(".js-post-filter").click(function () {
    $(".js-post-filter").removeClass("js-active");
    $(this).addClass("js-active");
  });

  /*Split Expand*/
  $(".js-expand").click(function () {
    $(this).siblings(".split-expand__content__continued").toggleClass("d-none");
    if($(this).hasClass('active')) {
      $(this).find('span').text('Read The Story');
      $(this).find('i').toggleClass('fa-plus').toggleClass('fa-minus');
    }
    else {
      $(this).find('span').text('Read Less');
      $(this).find('i').toggleClass('fa-plus').toggleClass('fa-minus');
    }
    $(this).toggleClass('active');
    if(horizontalAnimation){
      setTimeout(() => {
        horizontalAnimation.scrollTrigger.refresh();
      }, 500);
    }
  });

  //Work & Key Art Mobile Filter Menu Toggle
  $(".mobile-menu-toggle").click(function () {
    $(".sub-menu-items").toggleClass("mobile-menu-closed");
    if($(".sub-menu-items").hasClass('mobile-menu-closed')) {
      $(".post-grid__filters").find('i').toggleClass('fa-plus').toggleClass('fa-minus');
      $(".blog-grid__filters").find('i').toggleClass('fa-plus').toggleClass('fa-minus');
      $(".category-grid__filters").find('i').toggleClass('fa-plus').toggleClass('fa-minus');
    }
    else {
      $(".post-grid__filters").find('i').toggleClass('fa-plus').toggleClass('fa-minus');
      $(".blog-grid__filters").find('i').toggleClass('fa-plus').toggleClass('fa-minus');
      $(".category-grid__filters").find('i').toggleClass('fa-plus').toggleClass('fa-minus');
    }
    if(horizontalAnimation){
      setTimeout(() => {
        horizontalAnimation.scrollTrigger.refresh();
      }, 500);
    }
  });

  /*Category Grid Modals*/
  var artModal = $(".js-bs-artModal");
  var modalSlider = $(".js-slick-modal");

  //Category Grid Modals - populate on modal trigger
  artModal.on("shown.bs.modal", function (e) {
    var trigger = $(e.relatedTarget);
    var title = trigger.attr("data-title");
    var client = trigger.attr("data-client");
    var categories = trigger.attr("data-categories");
    var srcString = trigger.attr("data-src");
    var srcArray = srcString.split(",");

    //Swap in the text info
    $(".modal__project").html(title);
    $(".modal__client").html(client);
    $(".modal__categories").html(categories);

    //Re-populate the slider
    if (srcString) {
      $.each(srcArray, function (index, value) {
        var img = $("<img>").attr("src", value);
        var figure = $("<figure>");
        var slide = $("<div>");

        figure.append(img);
        slide.append(figure);
        $(".modal__slider").append(slide);
      });

      //Trim off the empty last slide
      $(".modal__slider div:last-of-type").remove();

      //Re-initialize slick
      setTimeout(function () {
        modalSlider.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          dots: false,
          arrows: true,
          fade: true,
        });
      }, 50);
    }
  });

  //Category Grid Modals - Clear out the slider when the modal closes
  artModal.on("hidden.bs.modal", function () {
    modalSlider.slick("unslick");
    modalSlider.empty();
  });

  //Accordion
  if ($(".accordion").length) {
    $(".accordion-item:first-of-type .accordion-collapse").addClass("show");
  }

  //Infinite Slider
  var infiniteSlider = $(".js-slick-infinite:not(.slick-initialized)");
  if (infiniteSlider.length) {
    infiniteSlider.each(function () {
      $(this).slick({
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 5000,
        pauseOnHover: false,
        variableWidth: true,
        cssEase: "linear",
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      });
    });
  }
  //Category Grid Modals - Clear out the slider when the modal closes
  artModal.on('hidden.bs.modal', function () {
      modalSlider.slick('unslick');
      modalSlider.empty();
  });

  //Accordion
  if ($('.accordion').length) {
    $('.accordion-item:first-of-type .accordion-collapse').addClass('show');
  }

  //Contact Page Image Slider

      $(".js-slick-contact").slick({
        arrows: false,
        dots: false,
        fade: true,
        speed: 100,
        autoplay: true,
        pauseOnHover: false,
        cssEase: "ease-in-out",
      });

  //Testimionials Module Slider

  $(".js-slick-testimonial").slick({
    arrows: false,
    dots: false,
    fade: true,
    autoplaySpeed: 5000,
    autoplay: true,
    pauseOnHover: false,
    cssEase: "ease-in-out",
  });

  //code for horizonally sliding while scrolling module

  if ($(".panel").length) {
    gsap.registerPlugin(ScrollTrigger);

    let panels = gsap.utils.toArray(".panel:not(:first-child)");

    horizontalAnimation = gsap.to(panels, {
      xPercent: -100 * (panels.length - 1),
      ease: "none",
      scrollTrigger: {
        trigger: ".panel-container",
        pin: true,
        scrub: 1,
        // snap: 1 / (panels.length - 1),
        // base vertical scrolling on how wide the container is so it feels more natural.
        end: () =>
          "+=" + document.querySelector(".panel-container").offsetHeight,
      },
    });
  }
  //horizontal grid
  if ($(".horizontal-scroll-grid").length) {
    gsap.registerPlugin(ScrollTrigger);

    let panels = gsap.utils.toArray(".horizontal-scroll-grid .panel-container");

    const gap = parseInt($('.horizontal-scroll-grid__row-1').css('gap'), 10);
    const paddingLeft = parseInt($('.horizontal-scroll-grid__row-1').css('padding-left'), 10);
    let elementsWidth = 0
    $('.horizontal-scroll-grid__row-1 img').each(function() {
      elementsWidth += $(this).outerWidth();
    });
    const fullWidth = elementsWidth + (gap * ($('.horizontal-scroll-grid__row-1 img').length - 1));
    const scrollTo = $(window).width() - (2 * paddingLeft) - fullWidth;

    horizontalAnimation = gsap.to(panels, {
      x: scrollTo,
      ease: "none",
      scrollTrigger: {
        trigger: ".horizontal-scroll-grid",
        pin: true,
        scrub: 1,
        // snap: 1 / (panels.length - 1),
        // base vertical scrolling on how wide the container is so it feels more natural.
        end: () =>
          // "+=" + document.querySelector(".horizontal-scroll-grid").offsetHeight,
          `+=${fullWidth}`
      },
    });
  }


  //for homepage hero video
  //close vid on scroll
	$('.home').bind('mousewheel', function(e) {
		closeHomeVideo();	  
	});

  function closeHomeVideo(){
      $("#hero-video-container").fadeOut(400);
      window.setTimeout(resumeScrolling, 500);
      animateLetters();
  }

  function resumeScrolling() {
    $('body').css("overflow-y", "auto");
  }

  function openHomeVideo() {
    const video = document.getElementById('hero-video');
    if ($(window).width() > 991 && !!video) {

      video.currentTime = 0;

      $("#hero-video-container").show();
      $('body').css("overflow-y", "hidden");

      //when video has ended, fade out container and resume normal scrolling
      $("#hero-video").on("ended", function() {
        closeHomeVideo();
      });

      $("#close-icon").click(function () {
        closeHomeVideo();
      });

      Cookies.set('homevideo', 'true', { expires: 7 });
    }
    else {
      animateLetters();
    }
  }

  $("#watch-again").click(function (e) {
    Cookies.set('homevideo', 'false', { expires: 7 });
    openHomeVideo();
  });


  var home_video = Cookies.get('homevideo');

  if (home_video != "true"){
    openHomeVideo();
  } else {
    animateLetters();
  }


  function animateLetters() {
    //console.log ("called animateLetters");
    //word swap animation for home page
   const wordSwapHome = [
    "thrive.",
    "break through.",
    "grow.",
    "connect.",
    "unique.",
    "fabulous.",
    "dazzle.",
    "inspire.",
    "captivate.",
    "stand apart."
  ];
  let counter1 = 0;
  const wordTimer = setInterval(fancyTextHome, 800);
  function fancyTextHome() {
    $('#word-swap-home').fadeOut(800, function() {
      $('#word-swap-home').html(wordSwapHome[counter1]);
      counter1++;
      $('#word-swap-home').fadeIn(800);
      if (counter1 == wordSwapHome.length) {
        clearInterval(wordTimer);
      }
    });
  }
}

  //word swap animation for approach page
  const wordSwapApproach = [
    "compellingly creative.",
    "intelligently designed.",
    "attention-demanding.",
    "uniquely memorable.",
    "elegantly<br class='mobile-only'> simple."
  ];
  let counter2 = 0;
  const wordTimer2 = setInterval(fancyTextApproach, 800);
  function fancyTextApproach() {
    $('#word-swap-approach').fadeOut(800, function() {
      $('#word-swap-approach').html(wordSwapApproach[counter2]);
      counter2++;
      $('#word-swap-approach').fadeIn(800);
      if (counter2 == wordSwapApproach.length) {
        clearInterval(wordTimer2);
      }
    });
  }
});


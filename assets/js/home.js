jQuery(document).ready(function ($) {

  //for homepage hero video
  //close vid on scroll
	$('.home').on('scroll', function(e) {
		closeHomeVideo();	 
  
	});

  function closeHomeVideo(){
      resumeScrolling();
      $("#hero-video-container").fadeOut(400);
      animateLetters();
  }

  function resumeScrolling() {
    $('body').css("overflow-y", "auto");
  }

  function openHomeVideo() {
    const video = document.getElementById('hero-video');
    if ($(window).width() > 991 && !!video) {

      video.currentTime = 0;
      console.log('showing modal')
      $("#hero-video-container").show();
      console.log('playing video');
      video.play();
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
  const wordTimer = setInterval(fancyTextHome, 1600);
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

});
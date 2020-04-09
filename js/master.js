function refreshScrollspy() {
  $('[data-spy="scroll"]').each(function () {
    var $spy = $(this).scrollspy('refresh')
  });
}



jQuery(document).ready(function($){

  $('body').scrollspy({
    target: '#about-navigation',
    offset: 150
  });

  $(window).scroll(function(){
    var scroll = $(window).scrollTop();

    var headerHeight = $('#headerImage').height() - 50;

    if (scroll > headerHeight) {
      $('#mainNav').removeClass('navbar-transparent');
      $('#about-navigation').addClass('about-nav-scroll');
      $('#back-to-top').fadeIn();
    } else {
      $('#mainNav').addClass('navbar-transparent');
      $('#about-navigation').removeClass('about-nav-scroll');
      $('#back-to-top').fadeOut();
    }
  });

  $('#back-to-top').click(function () {
    $('#back-to-top').tooltip('hide');
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });

  // $('#back-to-top').tooltip('show');

  $('.nav-link, .navbar-brand').click(function(e) {

    var sectionTo = $(this).attr('href');
    if(sectionTo.charAt(0) !== "#") {
      return;
    }
    e.preventDefault();
    if ($('nav').hasClass('fixed-top')) {

      $('html, body').animate({
        scrollTop: $(sectionTo).offset().top - 100
      }, 1000);
    }else {

      $('html, body').animate({
        scrollTop: $(sectionTo).offset().top - 100
      }, 1000);
    }

  });

  $('body').scrollspy({ target: '#about-navigation' });



  $('[data-toggle="offcanvas"]').on('click', function () {
    var scroll = $(window).scrollTop();

    var headerHeight = $('#headerImage').height() - 50;
    if (scroll > headerHeight) {
      $('#mainNav').removeClass('navbar-transparent');
    }else{
      $('#mainNav').toggleClass('navbar-transparent');
    }
    $('.offcanvas-collapse').toggleClass('open');


  });

  // setTimeOut(refreshScrollspy,1000);

});

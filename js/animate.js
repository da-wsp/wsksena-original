$(document).ready(function() {
  NProgress.start();

  $('.parallax-window').parallax({imageSrc: 'img/bg.jpg'});

    $("#owl-demo").owlCarousel({
        items : 3,
        lazyLoad : true,
        navigation : false
    }); 

    $(".menu-button").on('click', function(e) {
        /*$('#wrapper').css({'-webkit-filter':'brightness(0.1)',
                            '-moz-filter':'brightness(0.1)',
                            '-o-filter':'brightness(0.1)',
                            '-ms-filter':'brightness(0.1)',
                            'filter':'brightness(0.1)',
                            "transition":"1s"});*/
        $(".main-menu nav").fadeIn();
    });

    $('.close-menu img').on('click', function(e) {
        $('.main-menu nav').fadeOut(500);
        /*$('#wrapper').css({'-webkit-filter':'none',
                            '-moz-filter':'none',
                            '-o-filter':'none',
                            '-ms-filter':'none',
                            'filter':'none',
                            "transition":"1s"});*/
    });

    $('.main-menu nav ul a').on('click', function(e) {
        $('.main-menu nav').fadeOut(500);
        /*$('#wrapper').css({'-webkit-filter':'none',
                            '-moz-filter':'none',
                            '-o-filter':'none',
                            '-ms-filter':'none',
                            'filter':'none',
                            "transition":"1s"});*/
    });

    /*Карусель*/
	if ($(window).width() <= '850') {
   	 var carousel = $("#carousel").waterwheelCarousel({
          flankingItems: 3,
		  orientation: 'vertical',
          movingToCenter: function ($item) {
            $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });
	} else {
		var carousel = $("#carousel").waterwheelCarousel({
          flankingItems: 3,
          movingToCenter: function ($item) {
            $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });
	}

        $('#prev').bind('click', function () {
          carousel.prev();
          return false
        });

        $('#next').bind('click', function () {
          carousel.next();
          return false;
        });

        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });

    /* Admin */

    $('.menu-list-for-admin .menu-list a').click(function(e) {
        e.preventDefault();
        var animationName = 'animated fadeIn';
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('section.content .active-admin-block').removeClass('active-admin-block');
        $(this).find('.admin-block').addClass('active-admin-block');
        $('.menu-list-for-admin .menu-list a.active').removeClass('active');
        $(this).addClass('active');
        var atr = $(this).attr('href');
        $('.admin-block').not(atr).css({'display':'none'});
        $(atr).fadeIn(400).addClass(animationName);
        $(this).addClass('active');
    });

    /* Send form-contctas */
    $("#form-contacts").submit(function() {
      $.ajax({
        type: "POST",
        url: "../mail.php",
        data: $(this).serialize()
      }).done(function() {
        $('#form-contacts').fadeOut();
        
        setTimeout(function() {
          $('.contacts-date-block .done-send').fadeIn(1000);
          $("#form-contacts").trigger("reset");
        }, 1000);
      });
      return false;
    });

});


$(window).load(function(){
setTimeout(function(){
$('.wrapper').removeClass('out');
$('.load-site').addClass('dn').removeClass('load-site');
NProgress.done();
}, 2000);
});

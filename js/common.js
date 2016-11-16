$(document).ready(function() {
	/* Zoom */
    jQuery(function(){
   
      $(".my-foto").imagezoomsl({
        
         zoomrange: [3, 3]
      });
   });
   /* end Zoom */
   /* Умова для Zoom & Fancybox */
   if ($(window).width() <= '992') {
      $('.photo-dress img').removeClass('my-foto');
    } 

    $('.fancybox').fancybox();
    /* end Умова для Zoom & Fancybox */

});
/* Menu */
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
/* end Menu */

function dress(vector) {
	
		$.ajax({
			dataType: 'json',
  			url: 'http://wsksena.com/pages/ajax.php?Dress='+$('#dress_id').html()+'&Vector='+vector+'&Lang='+$('html').attr('lang'),
  			success: function(data) {
				
    			$('.photo-dress a').attr('href','../img/collections/'+data.Id+'/1.jpg');
				$('.photo-dress a img').attr('src','../img/collections/'+data.Id+'/1.jpg');
				$.ajax({
    				url:'../img/collections/'+data.Id+'/1.jpg',
    				type:'HEAD',
    				error:
        			function(){
            			$('#photo-small-block1 img').hide();
        			},
    				success:
       				function(){
            			$('#photo-small-block1 img').attr('src','../img/collections/'+data.Id+'/1.jpg');
						$('#photo-small-block1 img').show();
        			}
				});				
				$.ajax({
    				url:'../img/collections/'+data.Id+'/2.jpg',
    				type:'HEAD',
    				error:
        			function(){
            			$('#photo-small-block2 img').hide();
        			},
    				success:
       				function(){
            			$('#photo-small-block2 img').attr('src','../img/collections/'+data.Id+'/2.jpg');
						$('#photo-small-block2 img').show();
        			}
				});	
				$.ajax({
    				url:'../img/collections/'+data.Id+'/3.jpg',
    				type:'HEAD',
    				error:
        			function(){
            			$('#photo-small-block3 img').hide();
        			},
    				success:
       				function(){
            			$('#photo-small-block3 img').attr('src','../img/collections/'+data.Id+'/3.jpg');
						$('#photo-small-block3 img').show();
        			}
				});
				$.ajax({
    				url:'../img/collections/'+data.Id+'/4.jpg',
    				type:'HEAD',
    				error:
        			function(){
            			$('#photo-small-block4 img').hide();
        			},
    				success:
       				function(){
            			$('#photo-small-block4 img').attr('src','../img/collections/'+data.Id+'/4.jpg');
						$('#photo-small-block4 img').show();
        			}
				});
				$('.block-inf h1').html(data.Name);
				$('.title h2').html(data.Name);
				$('.text-for-coll').html(data.About);
				$('#dress_id').html(data.Id);
  			},
			error: function (e) {alert(e.status);}
		});

}

function change_img(img) {
	$('.photo-dress a').attr('href',img.src);
	$('.photo-dress img').attr('src',img.src);
}

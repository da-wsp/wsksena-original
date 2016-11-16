<?php

include_once "lang.php";

$query = "SELECT * FROM `Interface_$lang`";
$query = mysqli_query($db,$query);
$Interface = [];
while ($label = mysqli_fetch_assoc($query)) {
	$Interface[$label['Trigger']] = $label['Label'];
}

?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="ru"> 
<!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="admin" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<link rel="shortcut icon" href="/img/favicon/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="/img/favicon/favicon.png" />
	<link rel="apple-touch-icon" sizes="16x16" href="/img/favicon/favicon.png" />

	<link rel="stylesheet" href="/libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="/libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="/libs/owl-carousel/owl.theme.css" />
	<title>Контакты салона свадебных платьев Wedding Salon Ksena</title>
	<meta name="description" content="Салон свадебных платьев wedding salon Ksena находится по адресу: г. Черновцы, ул. Главная, 29. Звоните по номеру: +380501050355." />
    <link rel="stylesheet" href="/main.css" />
    <link rel="stylesheet" href="/fonts.css" />
    <link rel="stylesheet" href="/media.css" />
    <link rel="stylesheet" href="/animated.css" />
    <!— Yandex.Metrika counter —>
<script type="text/javascript">
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter35230720 = new Ya.Metrika({
id:35230720,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true
});
} catch(e) { }
});

var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = "https://mc.yandex.ru/metrika/watch.js";

if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/35230720" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!— /Yandex.Metrika counter —>
</head>

<body>

<div id="wrapper">
	
	<!--<img src="img/bg-top-right-gold.png" height="580" width="762" alt="" class="top-right-gold">-->

	<img src="../img/bg-top-right-gold-2.png" height="185" width="761" alt="" class="top-right-gold-h">

	<img src="../img/bg-top-right-gold-3.png" height="579" width="294" alt="" class="top-right-gold-v">
	
	<header class="header">
		
		<div class="container">
			
			<div class="row">
				
				<div class="col-md-4">
					
					<div class="logo">
						
						<a href="/"><img src="../img/logo.png" height="191" width="471" alt="Ksena"></a>

					</div><!-- end logo -->

				</div>

				<div class="col-md-8">
					
					<div class="row">
						
						<div class="col-md-7">
							
							<div class="soc-list">
						
								<a href="https://plus.google.com/u/0/100284826586645036695/posts?hl=ru" target="_blank"></a>
								<a href="https://twitter.com/svadebnye_platy" target="_blank"></a>
								<a href="http://ok.ru/group/53866473718005" target="_blank"></a>
								<a href="https://www.facebook.com/groups/181404582218858/" target="_blank"></a>

							</div><!-- end soc-list -->

						</div>
						<div class="col-md-5">
							
							<div class="languages">
							<form name="lang"  method="post" action="/?setlang">
								<select class="select" onchange="document.forms.lang.submit()" name="lang">
								<?php
									foreach ($langs as &$language) {
										echo 
											"<option value='$language[Trigger]' 
											".($lang==$language['Trigger']?'selected':null).">$language[Label]</option>";
									}
								?>
								</select>
							</form>
							</div><!-- end languages -->

						</div>

					</div><!-- end row -->

					<div class="row">
						
						<div class="col-md-12">
							
							<div class="main-menu">
								
								<div class="menu-button hidden-sm hidden-md hidden-lg">
			
									<img src="../img/button-menu.png" height="46" width="46" alt="" />

								</div><!-- end menu-button -->

								<nav>

									<div class="close-menu">

										<img src="../img/button-close.png" height="20" width="20" alt="Close menu" />

									</div><!-- end close-menu -->
									<ul>
										<a href="/"><li><?=$Interface['Index']?></li></a>
										<a href="collection.php"><li><?=$Interface['Collection']?></li></a>
										<a href="about.php"><li class="about"><?=$Interface['About']?></li></a>
										<a href="articles.php"><li class="articles"><?=$Interface['Articles']?></li></a>
										<a href="partner.php"><li class="partner"><?=$Interface['Partner']?></li></a>
										<a href="contacts.php"  class="active"><li><?=$Interface['Contacts']?></li></a>
									</ul>

								</nav>

							</div><!-- end menu -->

						</div>

					</div><!-- end row -->

				</div>

			</div><!-- end row -->

		</div><!-- end container -->

	</header><!-- end header -->

	<section class="title-page">

		<div class="container">
			
			<div class="row">
				
				<div class="col-md-12">
					
					<div class="title">
						
						<h2><?=$Interface['Contacts']?></h2>

					</div><!-- end title -->

				</div>

			</div><!-- end row -->

		</div><!-- end container -->
		
	</section><!-- end title-page -->

	<section class="content">
		
		<div class="container">
			
			<div class="row">

				<div class="col-md-12">
					
					<div class="content-block">
						
						<div class="map-block">

							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2654.4669301553413!2d25.93468531565455!3d48.29387047923615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4734089a5cb6c673%3A0x23ad4a736e3c5374!2z0JPQvtC70L7QstC90LAg0LLRg9C7LiwgMjksINCn0LXRgNC90ZbQstGG0ZYsINCn0LXRgNC90ZbQstC10YbRjNC60LAg0L7QsdC70LDRgdGC0Yw!5e0!3m2!1sru!2sua!4v1452814614222" max-width="989px" width="100%" height="520px" frameborder="0" style="border:1px #996633 solid; border-radius: 3px;" allowfullscreen></iframe>
							
						</div><!-- end map-block -->

						<div class="contacts-date-block">
							
							<div class="row">
							
							<div class="col-md-7 col-md-push-5">
								
								<form action="" class="form-contacts" id="form-contacts">
									
									<div class="input-row">
										<input type="text" name="name" placeholder="І'мя" required="required">
									</div><!-- end input-row -->

									<div class="input-row">
										<input type="email" name="mail" placeholder="Email" required="required">
									</div><!-- end input-row -->

									<div class="input-row">
										<input type="text" name="phone" placeholder="Телефон" required="required">
									</div><!-- end input-row -->

									<div class="input-row">
										<textarea name="message" id="message" cols="30" rows="10" placeholder="Сообщение"></textarea>
									</div><!-- end input-row -->
									
									<div class="input-row">
										<button type="submit" class="button-submit" id="send">Отправить</button>
									</div><!-- end input-row -->

								</form>

								<div class="done-send">
									<p>Ваше сообщение отправлено!</p>
									<p>Спасибо!</p>
								</div><!-- end done-send -->

							</div>
							<div class="col-md-5 col-md-pull-7">
								
								<div class="contacts-date">
									
									<h2>Адрес: г. Черновцы, <br />ул.Главная 29</h2>
									<h3>тел. <?php
										$trans = 
											[
												'0' => '&#048;',
												'1' => '&#049;',
												'2' => '&#050;',
												'3' => '&#051;',
												'4' => '&#052;',
												'5' => '&#053;',
												'6' => '&#054;',
												'7' => '&#055;',
												'8' => '&#056;',
												'9' => '&#057;'
											];
										$str = $Interface['Number'];
										$encoded = strtr($str, $trans);
										echo $encoded;
									?></h3>
									<p><a href="mailto:ws.ksena@mail.ru">e-mail:ws.ksena@mail.ru</a></p>

								</div><!-- end contacts-date -->

							</div>

						</div><!-- end row -->

						</div><!-- contacts-date-block -->

					</div><!-- end content-block -->

				</div>

				<img src="../img/lantern.png" height="302" width="187" alt="Ksena" id="lantern-left">

				<img src="../img/lantern.png" height="302" width="187" alt="Ksena" id="lantern-right">
				
			</div><!-- end row -->

		</div><!-- end container -->

	</section><!-- end content -->

	<footer class="footer">

		<img src="../img/bg-top-right-gold-2.png" height="185" width="761" alt="" class="bottom-right-gold-h">

		<img src="../img/bg-top-right-gold-3.png" height="579" width="294" alt="" class="bottom-right-gold-v">

		<div class="bottom-line">
			
			<div class="container">

				<div class="row">

					<div class="col-md-6">
						
						<div class="logo-bottom">

							<a href="/"><img src="../img/logo-bottom.png" height="113" width="277" alt=""></a>
						
						</div><!-- end logo-bottom -->

					</div>
					<div class="col-md-6">
						
						<div class="bottom-menu">
							
							<nav>
									
								<ul>
									<a href="/"><li><?=$Interface['Index']?></li></a>
									<a href="collection.php"><li><?=$Interface['Collection']?></li></a>
									<a href="about.php"><li><?=$Interface['About']?></li></a>
									<a href="articles.php"><li><?=$Interface['Articles']?></li></a>
                                    <a href="partner.php"><li class="partner"><?=$Interface['Partner']?></li></a>
									<a href="contacts.php"  class="active"><li><?=$Interface['Contacts']?></li></a>
								</ul>

							</nav>

						</div><!-- end bottom-menu -->

					</div>
				
				</div><!-- end row -->
			
			</div><!-- end container -->

		</div><!-- end bootom-line -->

		<div class="author">

			<div class="container">
				
				<div class="row">
					
					<div class="col-md-12">

						<span>&copy;2009-2016 Розроблено</span>

						<a href="http://da-wsp.com.ua" target="_blank"><img src="/img/logo-footer-wsp.png" height="100" width="185" alt="PR Service Pro" /></a>

					</div>

				</div><!-- end row -->

			</div><!-- end container -->
			
		</div><!-- end author -->
		
	</footer><!-- end footer -->

</div><!-- end wrapper -->

	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
<script src="../libs/jquery/jquery-1.11.1.min.js"></script>
<script src="../libs/dist/jquery.knob.min.js"></script>
<script src="../libs/viewportchecker/jquery.viewportchecker.js"></script>
<script src="../libs/owl-carousel/owl.carousel.min.js"></script>
<script src="../libs/waterwheel-carousel/jquery.waterwheelCarousel.js"></script>
<script src="../libs/waterwheel-carousel/jquery.waterwheelCarousel.min.js"></script>
<script src="../js/animate.js"></script>
<script src="../js/common.js"></script>

</body>
</html>
?>
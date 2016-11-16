<?php

include_once "lang.php";

$query = "SELECT * FROM `Index_$lang` WHERE `Page` = 'About'";
$Index = mysqli_fetch_assoc(mysqli_query($db,$query));

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
<html lang="<?=$lang?>"> 
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
	<title>Компания производитель ТМ "Ксена"</title>
	<meta name="description" content="Компания производитель ТМ Ксена работает на рынке Украины, стран СНГ и Европы уже более 7 лет." />
        <meta name="keywords" content="Салон свадебных платьев, компания производитель" />
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

	<img src="../img/bg-top-right-gold-2.png" height="185" width="761" alt="" class="top-right-gold-h" />

	<img src="../img/bg-top-right-gold-3.png" height="579" width="294" alt="" class="top-right-gold-v" />
	
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
							<form name="lang"  method="post" action="?setlang">
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
										<a href="about.php" class="active"><li class="about"><?=$Interface['About']?></li></a>
										<a href="articles.php"><li class="articles"><?=$Interface['Articles']?></li></a>
										<a href="partner.php"><li class="partner"><?=$Interface['Partner']?></li></a>
										<a href="contacts.php"><li><?=$Interface['Contacts']?></li></a>
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
						
						<h2><?=$Interface['About']?></h2>

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
						<center><h1><?=$Index['Name']?></h1></center>
						<?=$Index['Content']?>
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
									<a href="about.php" class="active"><li><?=$Interface['About']?></li></a>
									<a href="articles.php"><li><?=$Interface['Articles']?></li></a>
                                    <a href="partner.php"><li class="partner"><?=$Interface['Partner']?></li></a>
									<a href="contacts.php"><li><?=$Interface['Contacts']?></li></a>
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
<script src="/libs/jquery/jquery-1.11.1.min.js"></script>
<script src="/libs/dist/jquery.knob.min.js"></script>
<script src="/libs/viewportchecker/jquery.viewportchecker.js"></script>
<script src="/libs/owl-carousel/owl.carousel.min.js"></script>
<script src="/libs/waterwheel-carousel/jquery.waterwheelCarousel.js"></script>
<script src="/libs/waterwheel-carousel/jquery.waterwheelCarousel.min.js"></script>
<script src="/js/animate.js"></script>
<script src="/js/common.js"></script>

</body>
</html>
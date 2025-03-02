<!DOCTYPE html>
<html lang="ru">

<head>
	<!-- <title>Аренда Экскаваторов и др. строительной техники в Крыму</title> -->
	<?php if (isset($_GET['service']) && isset($_GET['product']) && isset($_GET['city'])) { ?>
		<title><?php if (htmlspecialchars($_GET['service'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><span><?= htmlspecialchars($_GET['service'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></span><?php if (htmlspecialchars($_GET['product'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><?= htmlspecialchars($_GET['product'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></span><?php if (htmlspecialchars($_GET['city'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><span><?= htmlspecialchars($_GET['city'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></span><?php if (htmlspecialchars($_GET['price'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><?= htmlspecialchars($_GET['price'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></title>
	<?php } else if (isset($_GET['service']) && isset($_GET['product'])) { ?>
		<title><?= htmlspecialchars($_GET['service'] ?? "", ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($_GET['product'] ?? "", ENT_QUOTES, 'UTF-8') ?></title>
	<?php } else { ?>
		<title>Аренда спецтехники в Крыму</title>
	<?php } ?>
	<meta charset="UTF-8">
	<meta name="description" content="Наша компания предлагает взять в аренду спецтехнику в Крыму на выгодных условиях. У нас представлен широкий модельный ряд известных мировых производителей UMG, DOOSAN, SUNWARD, LIUGONG, DIECI и т.д.">
	<meta name="keywords" content="industry, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
	<link rel="shortcut icon" href="/favicon/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
	<link rel="manifest" href="/favicon/site.webmanifest" />

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css" />


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<style>
		body {
			scroll-behavior: smooth;
		}
	</style>
	<!-- Page Preloder -->
	<!-- 	<div id="preloder">
		<div class="loader"></div>
	</div> -->

	<!-- Header section  -->
	<header class="header-section clearfix">
		<div class="header-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<p>ООО "НАКО 100"</p>
					</div>
					<div class="col-md-6 text-md-right">
						<p><a href="mailto:i89787597336@yandex.ru" style="margin-right:5px;color: #718090;">i89787597336@yandex.ru</a>ОГРН 1209100000273 ИНН 9108124223 КПП 910801001</p>
					</div>
					<div class="col-xm-12 d-md-none" style="color: #fff;width:  100%;text-align: center;"><a style="color: #fff;text-align: center; display: block;" href="tel:+7 978 759-73-36">+7 978 759-73-36</a></div>
				</div>
			</div>
		</div>
		<div class="site-navbar">
			<a href="/" class="site-logo">
				<img src="img/logo4.png" alt="">
			</a>
			<div class="header-right">
				<div class="header-info-box">
					<div class="hib-icon">
						<img alt="nako220" src="img/icons/phone.png" alt="" class="">
					</div>
					<div class="hib-text">
						<h6><a href="tel:+7 978 759-73-36" style="color: #000">+7 978 759-73-36</a></h6>
						<p><a href="tel:+7 978 618-44-08" style="color: #000">+7 978 618-44-08</a></p>
						<!-- <p><a href="mailto:i89787597336@yandex.ru" style="color: #000;">i89787597336@yandex.ru</a></p> -->
					</div>
				</div>
				<div class="header-info-box">
					<div class="hib-icon">
						<img src="img/icons/map-marker.png" alt="" class="">
					</div>
					<div class="hib-text">
						<h6>298100, Республика Крым</h6>
						<p>г Феодосия, ул Земская, д. 6</p>
					</div>
				</div>
			</div>
			<nav class="site-nav-menu">
				<ul>
					<li class="active"><a href="/">Главная</a></li>
					<li><a href="#sectionThree">Компании</a></li>
					<li><a href="#testimonial">Доп. информация</a></li>
					<li><a href="#services">Услуги</a></li>
					<li><a href="#reviews">Отзывы</a></li>
					<li><a href="#footer">Контакты</a></li>
				</ul>
			</nav>
			<div style="width: 100%;padding: 10px;text-align: center;background: #ffc000;color: #fff;margin-top: 2px;">
				<img src="warning.png" style="width: 40px;margin-top: -7px;" alt=""><span style="color: #081624; font-weight:bold;">Важно!</span> Заявки принимаются при заказе техники с работой <span style="font-weight:bold; color: #081624; font-size: 20px">от 40 моточасов</span>
			</div>
		</div>
	</header>
	<!-- Header section end  -->


	<div id="scrollMenu" class="col-12 d-md-none">
		<div class="d-flex justify-content-between">
			<button class="menu-toggle">Menu</button>
			<a href="tel:+7 978 759-73-36" style="color: #000">+7 978 759-73-36</a>
		</div>
		<div id="leftMenu">
			<a href="/">Главная</a>
			<a href="#sectionThree">Компании</a>
			<a href="#testimonial">Доп. информация</a>
			<a href="#services">Услуги</a>
			<a href="#reviews">Отзывы</a>
			<a href="#footer">Контакты</a>
		</div>
	</div>

	<!-- Hero section  -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">

			<?php

			$bg = "img/bg.jpg";
			if (isset($_GET['product']) && $_GET['product'] == 'гальк') {
				$bg = "img/bg2.jpg";
			}

			?>
			<div class="hero-item set-bg" data-setbg="<?= $bg ?>">
				<div class="container" style="margin-top: 150px;">
					<div class="row">
						<div class="col-xl-12">
							<?php if (isset($_GET['service']) && isset($_GET['product']) && isset($_GET['city'])) { ?>
								<h2><?php if (htmlspecialchars($_GET['service'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><span><?= htmlspecialchars($_GET['service'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></span><?php if (htmlspecialchars($_GET['product'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><span><?= htmlspecialchars($_GET['product'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></span><?php if (htmlspecialchars($_GET['city'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><span><?= htmlspecialchars($_GET['city'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></span><?php if (htmlspecialchars($_GET['price'] ?? "", ENT_QUOTES, 'UTF-8')) { ?><span><?= htmlspecialchars($_GET['price'] ?? "", ENT_QUOTES, 'UTF-8') ?> <?php } ?></span></h2>
							<?php } else if (isset($_GET['service']) && isset($_GET['product'])) { ?>
								<h2><span><?= htmlspecialchars($_GET['service'] ?? "", ENT_QUOTES, 'UTF-8') ?></span><span><?= htmlspecialchars($_GET['product'] ?? "", ENT_QUOTES, 'UTF-8') ?></span></h2>
							<?php } else { ?>
								<h2>
									<span>Аренда</span><span>спецтехники</span><span>в Крыму</span>
								</h2>
							<?php } ?>
							<a href="#" class="site-btn sb-white mb-3" id="order">Заказать</a>
							<a href="#services" class="site-btn sb-dark">все услуги</a>
						</div>
					</div>
				</div>
			</div>
			<!-- 			<div class="hero-item set-bg" data-setbg="img/hero-slider/2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-8">
							<h2><span>Power</span><span>& Energy</span><span>Industry</span></h2>
							<a href="#" class="site-btn sb-white mr-4 mb-3">Read More</a>
							<a href="#" class="site-btn sb-dark">our Services</a>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</section>
	<!-- Hero section end  -->

	<!-- Services section  -->
	<section class="services-section">
		<div class="services-warp">
			<div style="width: 100%;padding: 10px;text-align: center;background: #ffc000;color: #fff;margin-top: 2px; margin-bottom:15px;">
				<img src="warning.png" style="width: 40px;margin-top: -7px;" alt=""><span style="color: #081624; font-weight:bold;">Важно!</span> Заявки принимаются при заказе техники с работой <span style="font-weight:bold; color: #081624; font-size: 20px">от 40 моточасов</span>
			</div>
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-3 col-md-6">
						<div class="service-item">
							<div class="si-head">
								<div class="si-icon">
									<img src="img/icons/cogwheel.png" alt="">
								</div>
								<h5>Работаем с Юр. и Физ. лицами</h5>
							</div>
							<p>Гибкий подход к формированию цены за аренду спецтехники. Скидки постоянным клиентам и объемы работ. Работаем с Юр. и Физ. лицами с любыми формами налогообложения </p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="service-item">
							<div class="si-head">
								<div class="si-icon">
									<img src="img/icons/helmet.png" alt="">
								</div>
								<h5>Профессиональный подход</h5>
							</div>
							<p>Команда профессионалов: логисты,механизаторы,водители. Оперативно примем заказ, обработаем и выполним доставку спецтехники до Вашего объекта. Выполнение работ в установленные сроки</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="service-item">
							<div class="si-head">
								<div class="si-icon">
									<img src="img/icons/wind-engine.png" alt="">
								</div>
								<h5>Техника парк</h5>
							</div>
							<p>Огромный парк спецтехники, под любые задачи и виды работ. Гарантируем полный технический осмотр , техобслуживание , заправка гсм , нашей техники</p>
						</div>
					</div>
					<!-- 					<div class="col-lg-4 col-md-6">
						<div class="service-item">
							<div class="si-head">
								<div class="si-icon">
									<img src="img/icons/pollution.png" alt="">
								</div>
								<h5>Power Engineering</h5>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. </p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="service-item">
							<div class="si-head">
								<div class="si-icon">
									<img src="img/icons/pumpjack.png" alt="">
								</div>
								<h5>Oil & Lubricants</h5>
							</div>
							<p>Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="service-item">
							<div class="si-head">
								<div class="si-icon">
									<img src="img/icons/light-bulb.png" alt="">
								</div>
								<h5>Power & Energy</h5>
							</div>
							<p>Sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec con-sequat arcu et commodo interdum. </p>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end  -->

	<!-- Call to action section  -->
	<section class="cta-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 d-flex align-items-center">
					<h2>Мы подберем для Вас нужную технику</h2>
				</div>
				<div class="col-lg-3 text-lg-right">
					<a href="#" class="site-btn sb-dark" onclick="openWindowModal('Заказать обратный звонок');return false;">заказать звонок</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Call to action section end  -->



	<!-- Clients section  -->
	<section class="clients-section spad" id="sectionThree">
		<div class="container">
			<div class="client-text">
				<h2>Аренда строительной техники в Крыму: надежно, быстро, профессионально</h2>
				<p>Наша компания предлагает взять в аренду спецтехнику в Крыму на выгодных условиях. У нас представлен широкий модельный ряд известных мировых производителей UMG, DOOSAN, SUNWARD, LIUGONG, DIECI и т.д.</p>
			</div>
			<div id="client-carousel" class="client-slider owl-carousel">
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b1.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b2.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b3.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b4.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b5.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b6.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b7.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b8.png" alt="">
					</a>
				</div>
				<div class="single-brand">
					<a href="#" onclick="return false">
						<img src="img/clients/b9.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Clients section end  -->

	<!-- Call to action section  -->
	<section class="cta-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 d-flex align-items-center">
					<h2>Мы подберем для Вас нужную технику</h2>
				</div>
				<div class="col-lg-3 text-lg-right">
					<a href="#" class="site-btn sb-dark" onclick="openWindowModal('Заказать обратный звонок');return false;">заказать звонок</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Call to action section end  -->



	<!-- Testimonial section -->
	<section class="testimonial-section" id="testimonial">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 p-0 m-h-view">
					<div class="wrapper-bg-testimonial owl-carousel" style="height: 100%;">
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/1.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/2.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/3.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/4.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/5.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/6.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/7.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/8.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/9.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/10.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/11.jpg"></div>
						</div>
						<!-- 						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/12.jpg"></div>
						</div> -->
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/13.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/14.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/15.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/16.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/17.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/18.jpg"></div>
						</div>
						<!-- <div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/19.jpg"></div>
						</div> -->
						<!-- <div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/20.jpg"></div>
						</div> -->
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/21.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/22.jpg"></div>
						</div>
						<div style="height: 100%; width: 100%;">
							<div class="testimonial-bg set-bg" data-setbg="img/testimonial/23.jpg"></div>
						</div>
					</div>
					<!-- <div class="testimonial-bg set-bg" data-setbg="img/testimonial-bg.jpg"></div> -->
				</div>
				<div class="col-lg-6 p-0" style="position: relative; ">
					<div style="display: none; justify-content: space-between; position: absolute; left: 0; right: 0; top: 30%">
						<div onclick="()=>owl.trigger('owl.prev');" id="prev"><img src="/arrow.svg" width="30px" heigth="30px" style="fill:#fff; width: 30px; height:30px;transform: rotate(180deg); cursor: pointer;" /></div>
						<div onclick="()=>owl.trigger('owl.next');" id="next"><img src="/arrow.svg" width="30px" heigth="30px" style="fill:#fff; width: 30px; height:30px;  cursor: pointer;" /></div>
					</div>
					<div class="testimonial-box">
						<div class="testi-box-warp">
							<div class="testimonial-slider owl-carousel">

								<!-- 								<div class="testimonial">
									<h2>Стоимость аренды спецтехники — платите за качество</h2>
									<p>Широкий выбор спецтехники позволяет подобрать необходимый комплект машин для любых типов работ и объектов. Более того мы регулярно расширяем свой парк, приобретая для него только высокоэффективный и производительный транспорт.</p>
									<p>Машины компании «Нако220» можно встретить на самых разнообразных промышленных и строительных площадках Крыма. Вся спецтехника находится в отличном эксплуатационном состоянии.</p>
									<h2>Экономьте время и деньги</h2>
									<span>Аренда спецтехники в строительной компании «Нако220» обеспечит вам бесперебойную автоматизированную работу на любых объектах строительства.</span>
								</div> -->
								<div class="testimonial">

									<h2>Гибкие цены</h2>
									<p>Благодаря ориентированности на запросы клиента мы найдём подход к каждому. Цена за аренду и объем работ решаются с каждым индивидуально. Удовлетворим запросы как Юр., так и Физ. лиц. Работаем с любыми видами налогообложения.</p>
									<h2>Профессиональный подход</h2>
									<p>Мы – команда высококлассных специалистов, работающих для вас. Оператор примет заказ, логист организует доставку спецтехники, водитель выполнит работу чётко в срок. А благодаря механизаторам наша строительная техника всегда находится в идеальном состоянии.</p>
									<i style="color: #fff">«Нако220» – это широкий выбор спецтехники, профессиональный подход и гарантия качества. Каждый день мы стараемся стать лучше, чтобы помочь вам справиться с любой задачей.</i>
								</div>
								<div class="testimonial">
									<h2>Широкий выбор</h2>
									<p>В арсенале компании огромный выбор спецтехники, которая справится с любой задачей. Регулярно проводится техническое обслуживание каждой машины и заправка горюче-смазочными материалами. Полный технической осмотр гарантируем.</p>
									<h2>Цена = качество </h2>
									<p>Компания «Нако220» предлагает богатый ассортимент строительной техники, подходящей для любых работ и объектов. Наш автопарк регулярно пополняется новыми машинами, которые отличаются высокой эффективностью и производительностью.</p>
									<p>Прямо сейчас спецтехника от «Нако220» работает на многих строительных объектах Крыма. Каждая машина находится в идеальном состоянии. </p>
								</div>
								<div class="testimonial">
									<h2>Дополнительные услуги компании «Нако 220»</h2>
									<p>Помимо основных услуг, связанных с предоставлением в аренду широкого ассортимента специальной техники, компания «Нако 220» оказывает также широкий спектр дополнительных услуг, востребованных у компаний и частных лиц:</p>
									<ul>
										<li style="color: #fff; margin-left: 21px;">Ответственный вывоз строительного мусора и его правильная утилизация – наша компания имеет лицензию на этот вид деятельности и осуществляет его в полном соответствии с действующими строительными правилами, экологическими нормами и иными документами;</li>
										<li style="color: #fff; margin-left: 21px;">Профессиональный сном и демонтаж, снос зданий и сооружений любого типа и уровня сложности;</li>
										<li style="color: #fff; margin-left: 21px;">Доставка инертных материалов – нерудных полезных ископаемых сыпучего типа (песок, Гравий, щебень, ПГС), применяемых для производства бетона, раствора и других строительных материалов;</li>
										<li style="color: #fff; margin-left: 21px;">Доставка плодородного многокомпонентного грунта для обустройства садовых участков и удобрения почвы в подсобных хозяйствах</li>
										<li style="color: #fff; margin-left: 21px;">Профессиональная копка котлованов для фундаментов и иных сооружений;</li>
										<li style="color: #fff; margin-left: 21px;">Планировочные и земляные работы – вертикальная планировка участка, выход в нулевые отметки, рытье кабельных траншей и пр.;</li>
										<li style="color: #fff; margin-left: 21px; margin-bottom: 15px;">Установка заборов из различных материалов.</li>
									</ul>
									<p>Все работы ведутся опытными специалистами, которым помогает профессиональная техника и оборудование. Будем рады сотрудничеству!</p>
								</div>
								<div class="testimonial">
									<h2>Официальная утилизация грунтов</h2>
									<p style="margin-bottom: 10px;">Одна из важных услуг, оказываемых нашей компанией – профессиональная, официальная и ответственная утилизация грунтов со строительных площадок на территории всей Республики Крым. </p>
									<p style="margin-bottom: 10px;">Профессиональная – потому что мы работаем на рынке не первый год, имеем всю необходимую технику и готовы к утилизации грунтов в любом объеме.</p>
									<p style="margin-bottom: 10px;">Официальная – потому что у нас есть все необходимые разрешения и лицензии на выполнение данного вида работ.</p>
									<p style="margin-bottom: 10px;">Ответственная – потому что мы заботимся об окружающей среде и производим утилизацию грунта в Крыму в полном соответствии с действующими нормами и правилами.</p>
									<p style="margin-bottom: 10px;">Работаем как с физическими, так и с юридическими лицами. Предоставляем все необходимые отчетные инструменты. Возможны различные формы оплаты. Для постоянных клиентов и крупных заказчиков всегда готовим специальные предложения и особо выгодные условия.</p>
									<p style="margin-bottom: 20px;">Получить еще больше полезной и актуальной информации по утилизации грунтов в Крыму вы можете, связавшись с нами любым из доступных способов.</p>
									<p style="margin-bottom: 10px;">Будем рады сотрудничеству, обращайтесь!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonial section end  -->


	<!-- Call to action section  -->
	<section class="cta-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 d-flex align-items-center">
					<h2>Мы подберем для Вас нужную технику</h2>
				</div>
				<div class="col-lg-3 text-lg-right">
					<a href="#" class="site-btn sb-dark" onclick="openWindowModal('Заказать обратный звонок');return false;">заказать звонок</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Call to action section end  -->

	<!-- Video section  -->
	<section class="" id="services">
		<div class="container">
			<h2>Какую технику мы предоставляем</h2>
			<div class="row">
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/1.png" alt=""><span class="priceInfo">от 1 200 ₽/час</span></div>
					<div class="col-6"><span>Самосвалы</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/2.png" alt=""><span class="priceInfo">от 5 500 ₽/час</span></div>
					<div class="col-6"><span>Асфальтоукладчики</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/3.png" alt=""><span class="priceInfo">от 1 700 ₽/час</span></div>
					<div class="col-6"><span>Бульдозеры</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/4.png" alt=""><span class="priceInfo">от 120 ₽ за м3</span></div>
					<div class="col-6"><span>Дорожная фреза</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/5.png" alt=""><span class="priceInfo">от 1 500 ₽/час</span></div>
					<div class="col-6"><span>Автовышки</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/6.png" alt=""><span class="priceInfo">от 15 000 ₽ за рейс</span></div>
					<div class="col-6"><span>Тралы (Низкорамники)</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/7.png" alt=""><span class="priceInfo">от 2 500 ₽/час</span></div>
					<div class="col-6"><span>Фронтальные погрузчики</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/8.png" alt=""><span class="priceInfo">от 3 000 ₽/час</span></div>
					<div class="col-6"><span>Манипуляторы (КМУ)</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/9.png" alt=""><span class="priceInfo">от 2 000 ₽/час</span></div>
					<div class="col-6"><span>Мини-погрузчики</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/10.png" alt=""><span class="priceInfo">от 4 500 ₽/час</span></div>
					<div class="col-6"><span>Краны башенные</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/11.png" alt=""><span class="priceInfo">от 4 500 ₽/час</span></div>
					<div class="col-6"><span>Краны самоходные</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/12.png" alt=""><span class="priceInfo">от 3 500 ₽/час</span></div>
					<div class="col-6"><span>Автогрейдеры</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/13.png" alt=""><span class="priceInfo">от 2 000 ₽/час</span></div>
					<div class="col-6"><span>Катки грунтовые</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/14.png" alt=""><span class="priceInfo">от 2 000 ₽/час</span></div>
					<div class="col-6"><span>Катки дорожные</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/15.png" alt=""><span class="priceInfo">от 2 500 ₽/час</span></div>
					<div class="col-6"><span>Поливомоечные машины</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/16.png" alt=""><span></span></div>
					<div class="col-6"><span>Эвакуаторы</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/17.png" alt=""><span class="priceInfo">от 1 900 ₽/час</span></div>
					<div class="col-6"><span>Экскаваторы-погрузчики</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/18.jpg" alt=""><span class="priceInfo">от 2 700 ₽/час</span></div>
					<div class="col-6"><span>Экскаваторы гусеничные</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/19.png" alt=""><span class="priceInfo">от 2 500 ₽/час</span></div>
					<div class="col-6"><span>Экскаваторы колесные</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/20.jpg" alt=""><span class="priceInfo">от 2 200 ₽/час</span></div>
					<div class="col-6"><span>Мини-экскаваторы</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/21.png" alt=""><span class="priceInfo">от 1 700 ₽/час</span></div>
					<div class="col-6"><span>Бортовые машины</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/22.png" alt=""><span class="priceInfo">от 2 000 ₽ за метр</span></div>
					<div class="col-6"><span>Буровые установки</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/23.png" alt=""><span></span></div>
					<div class="col-6"><span>Другая спецтехника</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>
				<div class="col-md-3 d-flex">
					<div class="col-6"><img src="img/machin/24.png" alt=""><span class="priceInfo">от 150 ₽/тонна</span></div>
					<div class="col-6"><span>Продажа инертных материалов</span><a href="#" class="servicesButton" onclick="return false;">Заказать</a></div>
				</div>


			</div>
		</div>
	</section>
	<!-- Video section end  -->

	<!-- Call to action section  -->
	<section class="cta-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 d-flex align-items-center">
					<h2>Мы подберем для Вас нужную технику</h2>
				</div>
				<div class="col-lg-3 text-lg-right">
					<a href="#" class="site-btn sb-dark" onclick="openWindowModal('Заказать обратный звонок');return false;">заказать звонок</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Call to action section end  -->

	<section class="reviews" id="reviews">
		<div class="container">
			<h2>Отзывы</h2>
			<style>
				.wparrepReviews h2 {
					text-align: left;
					padding: 20px 0 0 0;
					margin-bottom: 20px;
					margin-right: 10px;
					width: inherit;
					display: inline-block;
				}

				.wparrepReviews {
					display: flex;
					justify-content: space-between;
				}
			</style>
			<div class="wparrepReviews owl-carousel">
				<div class="w90">
					<h2>Николай Быстрыкин</h2>
					<p>Расчищал участок для застройки и заказал у компании “Нако220” экскаватор и самосвал. Работа предстояла непростая, так как кроме вывоза мусора надо было ещё пни выкорчевать. Но экскаваторщик исполнил в лучшем виде - не разворотил всё вокруг, а аккуратно повырывал коряги с корнем. Водитель самосвала тоже молодец. Проезд на участок узкий, но он даже ворота не задел. Короче, понравился мне профессионализм рабочих. Даже время не тянули, а то иногда всякое бывает. Остался доволен. Как понадобится - ещё обращусь.</p>
				</div>
				<div class="w90">
					<h2>Иван Баранов</h2>
					<p>Нужно было два бульдозера для разравнивания оснований под застройку нескольких объектов. Отработали на “ура” по 5 смен каждый. Техника справилась идеально, видно, в отличном состоянии. Бульдозеристы тоже не подкачали - чётко знали, что делать, объяснять и вмешиваться не приходилось. Отдельно скажу про соотношение “цена-качество”. Аренда и так одна из самых доступных в регионе, а нам ещё и скидку оформили. Сотрудничество продолжим.</p>
				</div>
				<div class="w90">
					<h2>Владислав Маракулин</h2>
					<p>Рекомендую этот сервис. Арендовал кран-манипулятор - для погрузки нужен был. Ребята управились за 5 часов, хотя закладывал 6. Приехали вовремя, грузили на совесть, и без сбоев машины обошлось. </p>
				</div>
				<div class="w90">
					<h2>Иван Никитин</h2>
					<p>Большое спасибо консультанту компании “Нако220”! Очень быстро разобрался в моей проблеме и подсказал, какую спецтехнику и в каком количестве лучше заказать. Я сам не большой знаток, поэтому ценю такой подход к клиентам. По работе тоже нареканий никаких, так что однозначно всем советую.</p>
				</div>
				<div class="w90">
					<h2>Николай</h2>
					<p>Расчищал участок для застройки и заказал у компании “Нако220” экскаватор и самосвал. Работа предстояла непростая, так как кроме вывоза мусора надо было ещё пни выкорчевать. Но экскаваторщик исполнил в лучшем виде - не разворотил всё вокруг, а аккуратно повырывал коряги с корнем. Водитель самосвала тоже молодец. Проезд на участок узкий, но он даже ворота не задел. Короче, понравился мне профессионализм рабочих. Даже время не тянули, а то иногда всякое бывает. Остался доволен. Как понадобится - ещё обращусь.</p>
				</div>
				<div class="w90">
					<h2>Ваш отзыв</h2>
					<form action="#" method="post" id="reviewsForm">
						<label class="w-100">
							<input type="text" class="form-control" name="name" placeholder="Имя" required>
						</label>
						<label class="w-100">
							<textarea name="comment" class="form-control" id="" cols="30" rows="4" placeholder="Отзыв" required></textarea>
						</label>
						<button class="btn" style="background-color: #ffc000; border-color: #ffc000; color: #000;">Отправить</button>
					</form>
				</div>
			</div>

		</div>
	</section>


	<!-- Footer section -->
	<footer class="footer-section spad" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="footer-widget about-widget">
						<img src="img/logo4.png" alt="">
						<p>Широкий выбор спецтехники позволяет подобрать необходимый комплект машин для любых типов работ и объектов. Более того мы регулярно расширяем свой парк, приобретая для него только высокоэффективный и производительный транспорт. </p>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-7">
					<div class="footer-widget">
						<h2 class="fw-title">Контакты</h2>

						<div class="footer-info-box">
							<div class="fib-icon">
								<img src="img/icons/map-marker.png" alt="" class="">
							</div>
							<div class="fib-text">
								<p>298100, Республика Крым, г.о. Феодосия<br>г Феодосия, ул Земская, д. 6</p>
							</div>
						</div>
						<div class="footer-info-box">
							<div class="fib-icon">
								<img src="img/icons/phone.png" alt="" class="">
							</div>
							<div class="fib-text" style="color: #fff; ">
								<p><a style="color: #fff; " href="tel:+7 978 759-73-36">+7 978 759-73-36</a></p>
								<p><a style="color: #fff; " href="tel:+7 978 618-44-08">+7 978 618-44-08</a></p>
								<br>i89787597336@yandex.ru</p>
							</div>
						</div>

						<h4 class="fw-title">Поделиться</h4>
						<script src="https://yastatic.net/share2/share.js"></script>
						<div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,odnoklassniki,telegram,whatsapp"></div>
						<!-- <form class="footer-search">
							<input type="text" placeholder="Search">
							<button><i class="fa fa-search"></i></button>
						</form> -->
					</div>
				</div>
			</div>
		</div>
		<div class="footer-buttom">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 order-2 order-lg-1 p-0">
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> Все права защищены </div>
					</div>
					<div class="col-lg-7 order-1 order-lg-2 p-0">
						<ul class="footer-menu">
							<li class="active"><a href="/">Главная</a></li>
							<li><a href="#sectionThree">Компании</a></li>
							<li><a href="#testimonial">Доп. информация</a></li>
							<li><a href="#services">Услуги</a></li>
							<li><a href="#reviews">Отзывы</a></li>
							<li><a href="#footer">Контакты</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->

	<div id="openModal" class="modalM">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Форма обратной связи</h3>
					<span title="Close" class="close" id="close">×</span>
				</div>
				<div class="modal-body">
					<form action="#" id="mainForm">
						<!-- <p>Содержимое модального окна...</p> -->
						<label class="w-100">Имя
							<input type="text" class="form-control ym-record-keys" id="name" name="name" placeholder="Имя" required>
						</label>
						<label class="w-100">Телефон
							<input type="text" class="form-control ym-record-keys" id="phone" name="phones[0][phone]" placeholder="+7(999)999-99-99" id="phone" required>
						</label>
						<input type="hidden" name="form" id="form" value="Форма обратной связи">
						<input type="hidden" name="query" id="query" value="<?= htmlspecialchars($_GET['service'] ?? "", ENT_QUOTES, 'UTF-8') ?? "" ?> <?= htmlspecialchars($_GET['product'] ?? "", ENT_QUOTES, 'UTF-8') ?? "" ?> <?= htmlspecialchars($_GET['city'] ?? "", ENT_QUOTES, 'UTF-8') ?? "" ?>">
						<input type="hidden" name="ip" id="ip" value="<?= $_SERVER['SERVER_ADDR'] ?? "" ?>">
						<label class="w-100">Комментарий
							<textarea class="form-control ym-record-keys" name="comment" id="comment" cols="2" rows="2"></textarea>
						</label>
						<div><input type="checkbox" required checked style="margin-right: 10px;">Ознакомлен с политикой <u style="cursor: pointer;" class="openInfo">конфиденциальности</u></div>
						<div style="text-align: center;margin-top: 20px">
							<button type="submit" class="site-btn">Отправить</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div id="openModal2" class="modalM">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Информация</h3>
						<span title="Close" class="close" id="close2">×</span>
					</div>
					<div class="modal-body">
						Политика конфиденциальности
					</div>
				</div>
			</div>
		</div>


		<!-- Search model -->
		<!-- 	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div> -->
		<!-- Search model end -->

		<!--====== Javascripts & Jquery ======-->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.slicknav.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/circle-progress.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
		<script src="js/main.js"></script>


		<!-- Yandex.Metrika counter -->
		<script type="text/javascript">
			(function(m, e, t, r, i, k, a) {
				m[i] = m[i] || function() {
					(m[i].a = m[i].a || []).push(arguments)
				};
				m[i].l = 1 * new Date();
				k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
			})
			(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

			ym(89064266, "init", {
				clickmap: true,
				trackLinks: true,
				accurateTrackBounce: true,
				webvisor: true
			});
		</script>
		<noscript>
			<div><img src="https://mc.yandex.ru/watch/89064266" style="position:absolute; left:-9999px;" alt="" /></div>
		</noscript>
		<!-- /Yandex.Metrika counter -->
		<!-- <form action="/nako" method="POST">
    <p>Имя: <input type="text" name="name" /></p>
    <p>Возраст: <input type="number" name="age" /></p>
    <input type="submit" value="Отправить">
</form> -->


		<script>
			// function sendPostToUrl(url) {
			// 	let login = prompt("Введите Логин")
			// 	let psw = prompt("Введите Пароль")
			// 	var form = document.createElement("form");
			// 	    document.body.appendChild(form)
			// 	    form.setAttribute("method", 'post');
			// 	    form.setAttribute("action", url);
			// 	    // document.body.appendChild(form)
			// 	    var input = document.createElement("input");
			// 	    input.setAttribute("type", "text");
			// 	    input.setAttribute("name", 'msg');
			// 	    input.setAttribute("value", '323');

			// 	    form.appendChild(input);
			// 	    // form.submit();
			// }

			$('#learn-more').on('click', function(event) {
				event.preventDefault();
				sendPostToUrl($(this).attr('href'), data);
			});
		</script>


		<!-- <script type="text/javascript">
			var ZCallbackWidgetLinkId = '30da10e2c49351179c60eb25488ab0cc';
			var ZCallbackWidgetDomain = 'my.novofon.com';
			(function() {
				var lt = document.createElement('script');
				lt.type = 'text/javascript';
				lt.charset = 'utf-8';
				lt.async = true;
				lt.src = 'https://' + ZCallbackWidgetDomain + '/callbackWidget/js/main.min.js?v=1.15.3';
				var sc = document.getElementsByTagName('script')[0];
				if (sc) sc.parentNode.insertBefore(lt, sc);
				else document.documentElement.firstChild.appendChild(lt);
			})();
		</script> -->


</body>

</html>
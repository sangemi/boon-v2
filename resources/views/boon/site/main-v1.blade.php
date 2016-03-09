
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>분쟁제로 &mdash; 분쟁을 최소화하는 가장 쉬운 방법</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FREEHTML5.CO

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	-->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Monsterrat:400,700|Merriweather:400,300italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="site/main-v1/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="site/main-v1/css/icomoon.css">
	<!-- Magnific Popup-->
	<link rel="stylesheet" href="site/main-v1/css/magnific-popup.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="site/main-v1/css/owl.carousel.min.css">
	<link rel="stylesheet" href="site/main-v1/css/owl.theme.default.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="site/main-v1/css/bootstrap.css">

	<!-- Cards -->
	<link rel="stylesheet" href="site/main-v1/css/cards.css">

	<!-- Modernizr JS -->
	<script src="site/main-v1/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="site/main-v1/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-page">

		<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
			<div class="container">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
					<a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
					<a href="#">Boon</a>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-5 text-center fh5co-link-wrap">
					<ul data-offcanvass="yes">
						<li class="active"><a href="/ccmail/sample">내용증명 양식</a></li>
						<li><a href="/ccmail/work">보관함</a></li>
						<li><a href="/board/free">게시판</a></li>
						<!--<li><a href="#">Pricing</a></li>-->
					</ul>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-4 text-right fh5co-link-wrap">
					<ul class="fh5co-special" data-offcanvass="yes">
						@if(Auth::user())
							<li><a href="/auth/logout">Logout</a></li>
						@else
							<li><a href="/auth/login">Login</a></li>
						@endif
						<li><a href="/ccmail/work/create" class="call-to-action">바로시작</a></li>
					</ul>
				</div>
			</div>
		</nav>


		<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"  style="background-image: url(site/main-v1/images/full_1.jpg);">
		  	<span class="scroll-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
				<a href="#">
					<span class="mouse"><span></span></span>
				</a>
			</span>
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover-text">
				<div class="container">
					<div class="row">
						<div class="col-md-push-6 col-md-6 full-height js-full-height">
							<div class="fh5co-cover-intro">
								<?php $rand = rand(0, 1);
								$textSupertitle = array('분쟁을 관리하는 가장 쉬운 방법', '분쟁에 대처하는 엘레강스한 방법');
								?>
								<h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$textSupertitle[$rand]?></h1>
								<h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
									분쟁이 예상될 때에는 내용증명으로 시작하세요. <br>어렵지 않습니다. <big>천여개의 샘플</big>과 <big>법률 전문가</big>가 기다리고 있으니까요.
								</h2>
								<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s"><a href="/ccmail/sample" class="btn btn-primary btn-outline btn-lg">샘플보기</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>




		<div class="fh5co-project-style-2">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">다양한 발송방법</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">

						</p>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s"><a href="javascript:$('#div내용증명비교표').toggle();" class="btn btn-success btn-lg">상세 비교표 보기</a></p>
						{{--<div style="cursor:pointer;clear:both;margin-top:20px;" class="text-center" onclick="">
							&nbsp; <br/>상세 비교표 ▼
						</div>--}}
						<div id="div내용증명비교표" style="display:none;">
							<table class="table text-center">
								<tr>
									<th></th>
									<th>발송대행</th>
									<th>법인명의</th>
									<th>변호사 작성</th>
									<th>전화 설득</th>
								</tr>
								<tr>
									<td>우체국 방문접수</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>내용증명 3부 제작</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>접수 후 고화질 스캔</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>줄간격 등 기본서식 수정</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>법률용어 및 문장 기본 수정</td>
									<td>-</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>법무법인 전용 용지</td>
									<td>-</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>변호사 사건검토</td>
									<td>-</td>
									<td>-</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>법률요건 검토/적용</td>
									<td>-</td>
									<td>-</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>소송시 유불리 검토</td>
									<td>-</td>
									<td>-</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>상대방과 직접 통화 및 설득</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>O</td>
								</tr>
								<tr>
									<td>통화보고 및 향후 전략</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>O</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-projects">
				<ul>
					<li class="wow fadeInUp" style="background-image: url(site/main-v1/images/full_1.jpg);" data-wow-duration="1s" data-wow-delay=".4s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #1 발송대행</h3></div>
											<div class="col-md-6"><p>우체국을 직접 가지 않고,
												실제 우체국 비용정도의 결제로 간단히 발송할 수 있습니다.
													{{--직접 내용증명을 보내는 방법 안내</a>


													--}}
													<span style="font-size:0.7em">
														<br>우체국 방문접수, 내용증명 3부 제작, 접수 후 고화질 스캔, 줄간격 등 기본서식 수정
													</span>
												</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow fadeInUp" style="background-image: url(site/main-v1/images/full_2.jpg);" data-wow-duration="1s" data-wow-delay=".7s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #2 법무법인 명의 발송</h3></div>
											<div class="col-md-6"><p>
													실제 소송에 사용하는 법무법인의 고퀄리티 서식에, 공신력을 담아 안전하게 발송대행합니다.
													<span style="font-size:0.7em">
														<br>+
														법률용어 및 문장 기본 수정, 법무법인 전용 용지
													</span>

												</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow fadeInUp" style="background-image: url(site/main-v1/images/full_1.jpg);" data-wow-duration="1s" data-wow-delay="1s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #3 변호사 직접 작성</h3></div>
											<div class="col-md-6"><p>
												담당변호사가 내용을 <b>법률요건</b>에 맞추고 <b>불리한 내용</b>은 빼고 다듬어
												실제 소송에 완벽 대비합니다. 더불어 위엄있는 문장 사용으로 서류의 진정성을 높입니다.
													<span style="font-size:0.7em">
														<br>+
														변호사 사건검토, 법률요건 검토/적용, 소송시 유불리 검토,
													</span>
											</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow fadeInUp" style="background-image: url(site/main-v1/images/full_4.jpg);" data-wow-duration="1s" data-wow-delay="1.2s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #4 변호사 임시선임</h3></div>
											<div class="col-md-6"><p>
													변호사가 사건을 이해한 후, 상대방에게 직접 전화하여 무게있는 설득을 합니다.
													곧 시작될 <b>소송의 피로함을 설명</b>하여 사건 조기해결을 시도합니다.
													<span style="font-size:0.7em">
														<br>+
														상대방과 직접 통화 및 설득, 통화보고 및 향후 전략
													</span>
												</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>

				</ul>
			</div>
		</div>
{{--
		<div class="fh5co-blog-style-1">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Recent From Blog</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="row p-b">
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12">
						<div class="fh5co-post wow fadeInLeft"  data-wow-duration="1s" data-wow-delay="1.1s">
							<div class="fh5co-post-image">
								<div class="fh5co-overlay"></div>
								<div class="fh5co-category"><a href="#">Tutorial</a></div>
								<img src="site/main-v1/images/img_same_dimension_2.jpg" alt="Image" class="img-responsive">
							</div>
							<div class="fh5co-post-text">
								<h3><a href="#">How to Create Cards</a></h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts...</p>
							</div>
							<div class="fh5co-post-meta">
								<a href="#"><i class="icon-chat"></i> 33</a>
								<a href="#"><i class="icon-clock2"></i> 2 hours ago</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12">
						<div class="fh5co-post wow fadeInLeft"  data-wow-duration="1s" data-wow-delay="1.4s">
							<div class="fh5co-post-image">
								<div class="fh5co-overlay"></div>
								<div class="fh5co-category"><a href="#">Health</a></div>
								<img src="site/main-v1/images/img_same_dimension_3.jpg" alt="Image" class="img-responsive">
							</div>
							<div class="fh5co-post-text">
								<h3><a href="#">Drinking Ginger and Lemon Tea</a></h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts...</p>
							</div>
							<div class="fh5co-post-meta">
								<a href="#"><i class="icon-chat"></i> 33</a>
								<a href="#"><i class="icon-clock2"></i> 2 hours ago</a>
							</div>
						</div>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12">
						<div class="fh5co-post wow fadeInLeft"  data-wow-duration="1s" data-wow-delay="1.7s">
							<div class="fh5co-post-image">
								<div class="fh5co-overlay"></div>
								<div class="fh5co-category"><a href="#">Tips</a></div>
								<img src="site/main-v1/images/img_same_dimension_4.jpg" alt="Image" class="img-responsive">
							</div>
							<div class="fh5co-post-text">
								<h3><a href="#">4 Easy Steps to Create a Soup</a></h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts...</p>
							</div>
							<div class="fh5co-post-meta">
								<a href="#"><i class="icon-chat"></i> 33</a>
								<a href="#"><i class="icon-clock2"></i> 2 hours ago</a>
							</div>
						</div>
					</div>
					<div class="clearfix visible-sm-block"></div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
						<a href="#" class="btn btn-primary btn-lg">View All Post</a>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-features-style-1" style="background-image: url(site/main-v1/images/full_4.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container" style="z-index: 3; position: relative;">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
						<h2 class="fh5co-heading">We Help Brands Grow</h2>
					</div>
				</div>
				<div class="row">
					<div class="fh5co-features">
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
							<div class="icon"><i class="icon-ribbon"></i></div>
							<h3>Brand Strategy</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
							<div class="icon"><i class="icon-image22"></i></div>
							<h3>Design + Idenity</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
							<div class="icon"><i class=" icon-monitor"></i></div>
							<h3>Web Development</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>

						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
							<div class="icon"><i class="icon-video2"></i></div>
							<h3>Video Direction</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
							<div class="icon"><i class="icon-bag"></i></div>
							<h3>E-Commerce Integration</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.3s">
							<div class="icon"><i class="icon-mail2"></i></div>
							<h3>Email Strategy</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-features-style-2">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Why Choose Us</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
					<div class="fh5co-icon"><i class="icon-command"></i></div>
					<div class="fh5co-desc">
						<h3>100% Free</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
					<div class="fh5co-icon"><i class="icon-eye22"></i></div>
					<div class="fh5co-desc">
						<h3>Retina Ready</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="clearfix visible-sm-block visible-xs-block"></div>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
					<div class="fh5co-icon"><i class="icon-toggle"></i></div>
					<div class="fh5co-desc">
						<h3>Fully Responsive</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
					<div class="fh5co-icon"><i class="icon-archive22"></i></div>
					<div class="fh5co-desc">
						<h3>Lightweight</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="clearfix visible-sm-block visible-xs-block"></div>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.3s">
					<div class="fh5co-icon"><i class="icon-heart22"></i></div>
					<div class="fh5co-desc">
						<h3>Made with Love</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.6s">
					<div class="fh5co-icon"><i class="icon-umbrella"></i></div>
					<div class="fh5co-desc">
						<h3>Eco Friendly</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="clearfix visible-sm-block visible-xs-block"></div>
				</div>
			</div>
		</div>

		<div class="fh5co-pricing-style-2">
			<div class="container">
				<div class="row">
					<div class="row p-b">
						<div class="col-md-6 col-md-offset-3 text-center">
							<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Pricing Plans</h2>
							<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="pricing">
		            <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
		                 <h3 class="pricing-title">Basic</h3>
		                 <p class="pricing-sentence">Little description here</p>
		                 <div class="pricing-price"><span class="pricing-currency">$</span>19<span class="pricing-period">/ month</span></div>
		                 <ul class="pricing-feature-list">
		                     <li class="pricing-feature">10 presentations/month</li>
		                     <li class="pricing-feature">Support at $25/hour</li>
		                     <li class="pricing-feature">1 campaign/month</li>
		                 </ul>
		                 <button class="btn btn-success btn-outline">Choose plan</button>
		             </div>
		             <div class="pricing-item pricing-item--featured wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
		                 <h3 class="pricing-title">Standard</h3>
		                 <p class="pricing-sentence">Little description here</p>
		                 <div class="pricing-price"><span class="pricing-currency">$</span>29<span class="pricing-period">/ month</span></div>
		                 <ul class="pricing-feature-list">
		                     <li class="pricing-feature">50 presentations/month</li>
		                     <li class="pricing-feature">5 hours of free support</li>
		                     <li class="pricing-feature">10 campaigns/month</li>
		                 </ul>
		                 <button class="btn btn-success btn-lg">Choose plan</button>
		             </div>
		             <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
		                 <h3 class="pricing-title">Enterprise</h3>
		                 <p class="pricing-sentence">Little description here</p>
		                 <div class="pricing-price"><span class="pricing-currency">$</span>79<span class="pricing-period">/ month</span></div>
		                 <ul class="pricing-feature-list">
		                     <li class="pricing-feature">Unlimited presentations</li>
		                     <li class="pricing-feature">Unlimited support</li>
		                     <li class="pricing-feature">Unlimited campaigns</li>
		                 </ul>
		                 <button class="btn btn-success btn-outline">Choose plan</button>
		             </div>
		         </div>
		      </div>
			</div>
		</div>

		<div class="fh5co-content-style-6">
			<div class="container">
				<div class="row p-b text-center">
					<div class="col-md-6 col-md-offset-3">
						<h2 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Explore the impossibility.</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
						<a href="#" class="link-block">
							<figure><img src="site/main-v1/images/img_same_dimension_1.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Responsive Layout</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".8s">
						<a href="#" class="link-block">
							<figure><img src="site/main-v1/images/img_same_dimension_2.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Retina Ready</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.1s">
						<a href="#" class="link-block">
							<figure><img src="site/main-v1/images/img_same_dimension_3.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Creative UI Design</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.4s">
						<a href="#" class="link-block">
							<figure><img src="site/main-v1/images/img_same_dimension_4.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Responsive Layout</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-counter-style-2" style="background-image: url(site/main-v1/images/full_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-section-content-wrap">
					<div class="fh5co-section-content">
						<div class="row">
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
								<div class="icon">
									<i class="icon-command"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="28" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Clients Worked With</span>

							</div>
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
								<div class="icon">
									<i class="icon-power"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="57" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Completed Projects</span>
							</div>
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
								<div class="icon">
									<i class="icon-code2"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="34023" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Line of Codes</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
--}}
		<div class="fh5co-testimonial-style-2">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">추천 말씀</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
							실제 분제로 닷컴을 사용하신 분들의 인사말을 모았습니다. <i class="heart icon-heart"></i> 의견주신 분들께 한분 한분 감사인사 드립니다.
						</p>
					</div>
				</div>
				<div class="row">

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
							<div class="fh5co-name">
								<img src="site/main-v1/images/person_5.jpg" alt="">
								<div class="fh5co-meta">
									<h3>중소기업</h3>
									<span class="fh5co-company">신영석 (유통업체 대표)</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo;업무상 한달에 한두번 정도 내용증명을 보낼 일이 있었는데, 직원을 직접 보내는 것보다 훨씬 싸고 편합니다. 보관도 되니 나중 찾아보기도 좋고요.
									&rdquo;</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
							<div class="fh5co-name">
								<img src="site/main-v1/images/person_4.jpg" alt="">
								<div class="fh5co-meta">
									<h3>주부</h3>
									<span class="fh5co-company">전혜영</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo;집에 컴퓨터가 없어 출력을 하지도 못하는데, 다 알아서 해주니 너무 좋았습니다. 다음에 또 이용할게요.  &rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
							<div class="fh5co-name">
								<img src="site/main-v1/images/person_3.jpg" alt="">
								<div class="fh5co-meta">
									<h3>거래서 사장</h3>
									<span class="fh5co-company">서OO 대표이사</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo;미지급 대금상환 요구의 건. 법무법인 명의발송의 효력을 보았습니다. 작은 차이이지만 확실히 효과가 있더군요.&rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-lg-block visible-md-block"></div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
							<div class="fh5co-name">
								<img src="site/main-v1/images/person_1.jpg" alt="">
								<div class="fh5co-meta">
									<h3>회사원</h3>
									<span class="fh5co-company">홍영O</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo; 미루기만 하다가 마음을 먹으니 하루만에 처리가 되네요. 실명을 쓴 모욕적인 글들도 다 삭제되었습니다.
									법조문이 들어간 강력한 경고메세지를 작성해 주신게 효과가 있었던것 같아요. &rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.3s">
							<div class="fh5co-name">
								<img src="site/main-v1/images/person_2.jpg" alt="">
								<div class="fh5co-meta">
									<h3>기술계약위반</h3>
									<span class="fh5co-company">재단 이사장</span>
								</div>
							</div>
							<div class="fh5co-text">

								<p>&ldquo; 두서없는 글을 정돈해 주시니 좋았습니다. 복잡한 관계가 깔끔해진 느낌입니다. 현재 소송진행중입니다. &rdquo;</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.6s">
							<div class="fh5co-name">
								<img src="site/main-v1/images/person_6.jpg" alt="">
								<div class="fh5co-meta">
									<h3>공사업체</h3>
									<span class="fh5co-company">관리자</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo; 기성고에 대해서 확정증거를 마련할 필요가 있어서 이용했습니다. 친절히 응대해주셔서 감사드립니다. &rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm-block"></div>

				</div>
			</div>
		</div>


		<!-- jQuery -->
		<script src="site/main-v1/js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="site/main-v1/js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="site/main-v1/js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="site/main-v1/js/jquery.waypoints.min.js"></script>
		<!-- Owl Carousel -->
		<script src="site/main-v1/js/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="site/main-v1/js/jquery.magnific-popup.min.js"></script>
		<!-- Stellar -->
		<script src="site/main-v1/js/jquery.stellar.min.js"></script>
		<!-- countTo -->
		<script src="site/main-v1/js/jquery.countTo.js"></script>
		<!-- WOW -->
		<script src="site/main-v1/js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<!-- Main -->
		<script src="site/main-v1/js/main.js"></script>


		<div class="fh5co-footer-style-3">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
						<div class="fh5co-logo"><span class="logo">B</span> Boonzero</div>
						<p class="fh5co-copyright">&copy; 2013 Boonzero. <br>All Rights Reserved.
							<br>Designed by <a target="_blank" href="about:blank">Moior</a>
							<br>Work with <a target="_blank" href="http://www.yeyul.com">Yeyul</a>
							{{--<br>Images: <a target="_blank" href="http://unsplash.com/">Unsplash</a>, <a target="_blank" href="http://pexels.com/">Pexels</a></p>--}}
					</div>
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
						<h3>Company</h3>
						<ul class="fh5co-links">
							<li>(주)모이어</li>
							<li><a target="_blank" href="https://www.google.co.kr/maps/place/%EC%95%84%EA%B0%80%EB%B0%A9%EB%B9%8C%EB%94%A9/@37.5019931,127.038773,18.29z/data=!4m12!1m9!4m8!1m0!1m6!1m2!1s0x357ca3ff15a01301:0xa36dcf2c34b2115a!2z7ISc7Jq47Yq567OE7IucIOqwleuCqOq1rCDsl63sgrwx64-ZIDY3OC0zNiDslYTqsIDrsKnruYzrlKk!2m2!1d127.0387154!2d37.5016827!3m1!1s0x0000000000000000:0xa36dcf2c34b2115a">
									서울 강남 테헤란로207, 7층</a></li>
							{{--<li><a href="#">How it Works</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Products</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact</a></li>--}}
						</ul>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
						{{--<h3>Connect</h3>
						<ul class="fh5co-links fh5co-social">
							<li><a href="#"><i class="icon icon-facebook2"></i> Facebook</a></li>
							<li><a href="#"><i class="icon icon-twitter"></i> Twitter</a></li>
							<li><a href="#"><i class="icon icon-dribbble"></i> Dribbble</a></li>
							<li><a href="#"><i class="icon icon-instagram"></i> Instagram</a></li>
						</ul>--}}
					</div>
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
						<h3>About Site</h3>
						<p>분쟁관리 전문사이트 분제로닷컴</p>
						<p><a href="javascript:void(0)" id="addFavorite3" title="즐겨찾기 등록" class="btn btn-success btn-sm btn-outline">+북마크</a></p>
						<script>
							$(document).ready(function(){
								$('#addFavorite3').click( function(e) {
									var bookmarkURL = window.location.href;
									var bookmarkTitle = document.title;
									var triggerDefault = false;

									if (window.sidebar && window.sidebar.addPanel) {
										// Firefox version < 23
										window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
									} else if ((window.sidebar && (navigator.userAgent.toLowerCase().indexOf('firefox') > -1)) || (window.opera && window.print)) {
										// Firefox version >= 23 and Opera Hotlist
										var $this = $(this);
										$this.attr('href', bookmarkURL);
										$this.attr('title', bookmarkTitle);
										$this.attr('rel', 'sidebar');
										$this.off(e);
										triggerDefault = true;
									} else if (window.external && ('AddFavorite' in window.external)) {
										// IE Favorite
										window.external.AddFavorite(bookmarkURL, bookmarkTitle);
									} else {
										// WebKit - Safari/Chrome
										alert((navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Cmd' : 'Ctrl') + '+D 키를 눌러 즐겨찾기에 등록하실 수 있습니다.');
									}

									return triggerDefault;
								});
							});
						</script>
					</div>
					<div class="clearfix visible-sm-block"></div>
				</div>
				<div class="row fh5co-made">
					<div class="col-md-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
						<p><a href="/boon/status">분노의 포인트를 충전하세요</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- END footer -->

	</div>
	<!-- END page-->


	</body>
</html>

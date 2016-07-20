
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>기업토탈솔루션 :: 분쟁제로</title>
	<meta name="description" content="지식재산권 확보, 분쟁관리의 시작 내용증명, 적은 비용으로 가볍게 시작해는 지급명령, 복잡한 소송단계까지 일괄지원 가능합니다." />
	<meta name="keywords" content="지식재산권, 특허, 상표, 서비스표, 디자인, 분쟁, 내용증명, 최소비용, 지급명령, 소송, 소액소송, 분쟁관리, 내용증명 작성방법, 내용증명 양식, 채권추심, 차용증쓰는법, 차용증양식, 사직서양식" />
	<meta name="author" content="(주)모이어" />

	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FREEHTML5.CO

	Website: 		http://freehtml5.co/

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
	<link rel="stylesheet" href="site/ccmail/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="site/ccmail/css/icomoon.css">
	<!-- Magnific Popup-->
	<link rel="stylesheet" href="site/ccmail/css/magnific-popup.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="site/ccmail/css/owl.carousel.min.css">
	<link rel="stylesheet" href="site/ccmail/css/owl.theme.default.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="site/ccmail/css/bootstrap.css">

	<!-- Cards -->
	<link rel="stylesheet" href="site/ccmail/css/cards.css">

	<!-- Modernizr JS -->
	<script src="site/ccmail/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="site/ccmail/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-page">

		<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
			<div class="container">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
					<a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
					<a href="/">Boon</a>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-5 text-center fh5co-link-wrap">


					<ul data-offcanvass="yes">
						<li class="active"><big>기업</big></li>
						{{--<li><a href="/help/patent"><i>ABC</i></a></li>
						<li><a href="/ip/sample"><i>출원</i></a></li>
						<li><a href="/ip/work"><i>작업</i></a></li>--}}
						{{--<li><a href="/board/free">게시판</a></li>--}}
						<!--<li><a href="#">Pricing</a></li>-->
					</ul>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-4 text-right fh5co-link-wrap">
					<ul class="fh5co-special" data-offcanvass="yes">
						@if(Auth::user())
							<li><a href="/auth/logout">로그아웃</a></li>
							<li><a href="/ip/askvisit" class="call-to-action">방문요청</a></li>

						@else
							<li><a href="/auth/login">로그인</a></li>
							<li><a href="/auth/register">가입</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>


		<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"
			 style="position:relative;background-image: url(site/ip/images/full_5.jpg);background-color:rgba(0, 0, 0, 0.5);">
			<small style="position:fixed;bottom:10px;left:10px;"><a href="tel:02-2135-5251" style="background-color:gray;color:cornsilk;letter-spacing: -0.7px;" class="btn btn-xs btn-default">문의 02-2135-5251</a></small>

			{{--한블럭 내려가는 버튼
            <span class="scroll-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
              <a href="#">
                  <span class="mouse"><span></span></span>
              </a>
          </span>--}}

			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover-text">
				<div class="container">
					<div class="row">
						<div class="col-md-12 full-height js-full-height">
							<div class="fh5co-cover-intro">

								<style> /*js-full-height : 화면높이 계산해서 이미지를 꽉 채움.*/
									.font-size-up {font-size:110%;}
									.cover-text-lead {
										font-size: 30px;
									}
									@media (max-width : 768px) { /*휴대폰에서 최상당화면만 정렬다시*/
										#area메인문구 h1{
											margin-top:120px;
										}
										#area메인문구 p{
											text-align:right;
										}
									}
								</style>
								<div class="col-sm-6" id="area메인문구">
									<?php $rand = rand(0, 2);

									$textSupertitle = array('기업전문 상표/디자인/특허','기업전문 상표/디자인/특허',
												'기업지식재산 전문팀'); //분쟁을 관리하는 가장 쉬운 방법  '분쟁에 대처하는 엘레강스한 방법',

									?>
										<h1 class="cover-text-lead wow fadeInUp" style="display:none;" data-wow-duration="1s" data-wow-delay="0s"><?=$textSupertitle[$rand]?></h1>
										<h2 class="cover-text-sublead wow fadeInUp" style="display:none;" data-wow-duratio="1s" data-wow-delay=".4s">
										특허상표 그물망으로 분쟁을 예방하세요. <br>어렵지 않습니다. <big>기업지식재산 전문가</big>가 기다리고 있습니다.
									</h2>
									<p class="wow fadeInUp" style="display:none;" data-wow-duration="1s" data-wow-delay="1.4s">
										<a href="tel:022135525" class="btn btn-primary btn-outline">상담전화</a>
										<a href="tel:022135525" class="btn btn-primary btn-outline">방문요청</a>
										{{--/ip/askvisit--}}
										&nbsp;&nbsp;&nbsp;

									</p>

										<div class="alert alert-link text-right"><small>
												<a href="/site/ip/book/company and ip 20160515.pdf" target="_blank" style="color:#eee;">최신 책자 다운로드</a></small>
										</div>
										@if(Auth::check())
											@if(Auth::user()->name == '김상겸')
											@endif
										@endif
								</div>


								@if( !Auth::user() )
								{{--회원가입 바로 유도!--}}
								<style>
									@media (max-width : 768px) { /*휴대폰에서 최상당화면만 정렬다시*/
										#area회원가입 {
											line-height:80%;
										}
										#area회원가입 .alert {
											line-height:105%;
										}
										#area회원가입 h1{
											margin-bottom:0px;
										}
										#area회원가입 #area가입버튼{
											text-align:right;
										}
									}
								</style>
								<div class="col-sm-6" id="area회원가입">

									<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">


										<div class="form-group">
											<label class="col-md-4 control-label"></label>
											<div class="col-md-6">
												<h1 style="color:white;font-size:2em;">처음이세요?</h1>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">이름</label>
											<div class="col-md-6">
												<input type="text" class="form-control" name="name" value="{{ old('name') }}">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">이메일</label>
											<div class="col-md-6">
												<input type="email" class="form-control" name="email" value="{{ old('email') }}">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">비밀번호</label>
											<div class="col-md-6">
												<input type="password" class="form-control" name="password">
											</div>
										</div>

										{{--왜냐면, 비번 잘못입력시 다시 이메일로 승인받으면 될일. <div class="form-group">
                                            <label class="col-md-4 control-label">비밀번호 확인</label>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password_confirmation">
                                            </div>
                                        </div>--}}

										{{--추가정보 받기
                                        <div class="form-group">
                                            <label for="resume">Resume</label>
                                            <textarea class="form-control" id="resume" name="resume" rows="10"></textarea>
                                        </div>--}}


										<div class="form-group">
											<div class="col-md-6 col-md-offset-4" id="area가입버튼">
												{{--<div><small>가입하기 버튼을 클릭하면 <a>약관</a>에 동의한 것으로 간주됩니다.</small></div>--}}
												<button type="submit" class="btn btn-primary">
													가입
												</button>
											</div>
											<div class="col-md-6 col-md-offset-4" style="font-size:0.8em;">※ 이미 가입하셨으면 <a href="/auth/login">로그인</a></div>
										</div>
										@if($errors->any())
											<div class="alert alert-danger">
												{{--<strong>다음</strong> 입력값에 오류가 있는듯 합니다.<br><br>--}}

													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach

											</div>
										@endif

									</form>
								</div>
								@else

									<div class="col-sm-5 col-sm-push-1" id="area회원가입">
									{{--세션에 메세지 있으면 보여주기--}}
										@if (Session::has('message'))
											<div class="alert alert-info">{{ Session::get('message') }}</div>
										@endif
										@if (Session::has('tip'))
											<div class="alert alert-info"><B>Tip.</B> {{ Session::get('tip') }}</div>
										@endif

									</div>

								@endif

								<?php
								//랜덤하게 1/3의 확률로 Tip 보여주기!
								//Session::flash('tip', '내용증명은 총 3부를 만들어 우체국에 들고가야 합니다. ');
								?>

							</div>
						</div>

						{{--<div class="col-md-6  full-height js-full-height">
							<div class="fh5co-cover-intro">

							</div>
						</div>--}}

					</div>
				</div>
			</div>

		  	<span class="scroll-btn wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.0s">
				<a href="#">
					▼
				</a>
			</span>
		</div>




		<div class="fh5co-project-style-2">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">비용안내</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
							권리확보부터 분쟁까지
						</p>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
							<a href="javascript:$('#div비용표').toggle();" class="btn btn-success font-size-up">비용표 보기</a>
						</p>
						{{--<div style="cursor:pointer;clear:both;margin-top:20px;" class="text-center" onclick="">
							&nbsp; <br/>상세 비교표 ▼
						</div>--}}
						<div id="div비용표" style="display:none;">
							<table class="table text-center">
								<tr>
									<th></th>
									<th class="text-center">상표</th>
									<th class="text-center"><nobr>디자인</nobr></th>
									<th class="text-center">특허</th>
									<th class="text-center">자문</th>
								</tr>
								<tr>
									<td>착수비
										<small style="font-size:0.7em;">다량의뢰 협의</small></td>
									<td><small style="font-size:0.7em;">약</small>20<small style="font-size:0.7em;">만</small></td>
									<td>25<small style="font-size:0.7em;">만</small>~</td>
									<td>120<small style="font-size:0.7em;">만</small>~</td>
									<td><small style="font-size:0.7em;">약</small>30<small style="font-size:0.7em;">만</small></td>
								</tr>
								<tr>
									<td>선행권리 조사</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>중간사건 비용</td>
									<td>1O</td>
									<td>1O</td>
									<td>1O</td>
									<td>-</td>
								</tr>
								<tr>
									<td>변호사/변리사 검토</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
									<td>O</td>
								</tr>
								<tr>
									<td>소송시 유불리 검토</td>
									<td>△</td>
									<td>○</td>
									<td>○</td>
									<td>○</td>
								</tr>

							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-projects">
				<ul>
					<li class="wow fadeInUp" style="background-image: url(site/ccmail/images/full_1.jpg);" data-wow-duration="1s" data-wow-delay=".4s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #1 방문요청</h3></div>
											<div class="col-md-6"><p>사무소<small>(서울 역삼 / 부산 연산)</small>까지 나오실 필요 없습니다.
												정기적으로 각 지역을 변리사/변호사/전문직원이 직접 방문합니다.
													{{--직접 내용증명을 보내는 방법 안내</a>


													--}}
													<br>
													<span style="font-size:0.7em">
														방문요청은 유료가 원칙이나, 일정에 따라 조정가능합니다.
													</span>
												</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow fadeInUp" style="background-image: url(site/ccmail/images/full_2.jpg);" data-wow-duration="1s" data-wow-delay=".7s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #2 지식법 변천의 산 증인</h3></div>
											<div class="col-md-6"><p>
													30년 경력의 옥특허법률사무소를 비롯하여 분쟁제로 기업전담팀은 오랜 세월동안 기업과 함께하여 왔습니다.
													<span style="font-size:0.7em">
														<br>+
														풍부한 데이터베이스를 바탕으로 어떤 일이든 최적의 결과를 도출합니다.
													</span>

												</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow fadeInUp" style="background-image: url(site/ccmail/images/ccmail/ccmail3_002.png);background-size: contain"
						data-wow-duration="1s" data-wow-delay="1s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #3 변호사 연계 사무실</h3></div>
											<div class="col-md-6"><p>
												옥/예율특허법률사무소는 법무법인(유한)예율과 긴밀하게 협력하여 모든 사건을 진행합니다.
												지식재산은 향후 소송에 활용하기 위한 도구입니다. <b>실소송을 예상</b>하여 타사 대비 고급 권리를 만들어낼 수 있습니다.
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
					<li class="wow fadeInUp" style="background-image: url(site/ccmail/images/full_4.jpg);" data-wow-duration="1s" data-wow-delay="1.2s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #4 직원 개인서비스</h3></div>
											<div class="col-md-6"><p>
													기업의 가입으로 회사의 모든 직원이 분제로의 다양한 기능을 이용할 수 있습니다.
													<b>개인 법률문제, 인사문제</b> 등 직원의 모든 일까지 일시에 관리하여 줍니다.

													<span style="font-size:0.7em">
														<br>+
														회사와의 분쟁은 제외합니다.
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
								<img src="site/ccmail/images/img_same_dimension_2.jpg" alt="Image" class="img-responsive">
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
								<img src="site/ccmail/images/img_same_dimension_3.jpg" alt="Image" class="img-responsive">
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
								<img src="site/ccmail/images/img_same_dimension_4.jpg" alt="Image" class="img-responsive">
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

		<div class="fh5co-features-style-1" style="background-image: url(site/ccmail/images/full_4.jpg);" data-stellar-background-ratio="0.5">
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
							<figure><img src="site/ccmail/images/img_same_dimension_1.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Responsive Layout</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".8s">
						<a href="#" class="link-block">
							<figure><img src="site/ccmail/images/img_same_dimension_2.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Retina Ready</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.1s">
						<a href="#" class="link-block">
							<figure><img src="site/ccmail/images/img_same_dimension_3.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Creative UI Design</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.4s">
						<a href="#" class="link-block">
							<figure><img src="site/ccmail/images/img_same_dimension_4.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Responsive Layout</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-counter-style-2" style="background-image: url(site/ccmail/images/full_2.jpg);" data-stellar-background-ratio="0.5">
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
						<h2 class="fh5co-heading">추천 말씀</h2>{{-- wow fadeInUp--}}
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
							<i class="heart icon-heart"></i><br>
							실제 분제로를 이용해본 고객님들의 인사말입니다.
						</p>
					</div>
				</div>
				<div class="row">

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">
							<div class="fh5co-name">
								<img src="site/ccmail/images/person_5.jpg" alt="">
								<div class="fh5co-meta">
									<h3>중소기업</h3>
									<span class="fh5co-company">장진석 대표</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo; 제품디자인 출원과 계약법률검토를 의뢰한 후 지금까지 정기법률자문을 하고 있습니다.
									밤늦게까지 열정적으로 일하시는 담당자분께 특히 감사드리고,
									다양한 기업문제를 유기적으로 생각해주시는 것에 또한번 감사드립니다.
									&rdquo;</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
							<div class="fh5co-name">
								<img src="site/ccmail/images/person_4.jpg" alt="">
								<div class="fh5co-meta">
									<h3>소상공인</h3>
									<span class="fh5co-company">김수영</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo;기존에 없던 퓨전 메뉴를 개발하고 이름을 지었는데, 반응이 좋아 내친김에 상표출원을 하였습니다. 나중 프랜차이즈를 세울 때 유용할것 같습니다. 상표등록증을 받으니 뿌듯하더군요. 감사합니다. &rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
							<div class="fh5co-name">
								<img src="site/ccmail/images/person_3.jpg" alt="">
								<div class="fh5co-meta">
									<h3>발명가</h3>
									<span class="fh5co-company">이** 대표이사</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo;기계류는 복잡해서 설명하기가 어려운데, 보자마자 내부 구조까지 개략적으로 먼저 맞추시는게 대단했습니다. 발명 후 시제품단계였는데 특허출원을 하고 나니 마음이 한결 편안합니다.&rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-lg-block visible-md-block"></div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
							<div class="fh5co-name">
								<img src="site/ccmail/images/person_1.jpg" alt="">
								<div class="fh5co-meta">
									<h3>유통사</h3>
									<span class="fh5co-company">OOO 이사</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo; 대표님께서 믿을만한 회사를 골라 장기거래를 하라 하셨는데, 귀사와 인연이 되어 참 감사하게 생각합니다. 상표 뿐 아니라 계약서 검토까지 도움 주셔서 거래처 확장에 큰 도움이 되었습니다. &rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
							<div class="fh5co-name">
								<img src="site/ccmail/images/person_2.jpg" alt="">
								<div class="fh5co-meta">
									<h3>기술계약위반</h3>
									<span class="fh5co-company">재단 이사장 박찬성</span>
								</div>
							</div>
							<div class="fh5co-text">

								<p>&ldquo; 두서없는 글을 정돈해 주시니 좋았습니다. 복잡한 관계가 깔끔해진 느낌입니다. 지금 소송을 하고 있는데 미리 보내놓았던 내용증명이 정말 도움되고 있습니다. &rdquo;</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
							<div class="fh5co-name">
								<img src="site/ccmail/images/person_6.jpg" alt="">
								<div class="fh5co-meta">
									<h3>의류업체</h3>
									<span class="fh5co-company">임** 총괄</span>
								</div>
							</div>
							<div class="fh5co-text">
								<p>&ldquo; 의류디자인 다량으로 맡기니 잘 대우해주셔서 도움되고 있습니다. 앞으로 계속 번창 바랍니다. 감사해요 &rdquo;</p>
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm-block"></div>

				</div>
			</div>
		</div>


		<!-- jQuery -->
		<script src="site/ccmail/js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="site/ccmail/js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="site/ccmail/js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="site/ccmail/js/jquery.waypoints.min.js"></script>
		<!-- Owl Carousel -->
		<script src="site/ccmail/js/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="site/ccmail/js/jquery.magnific-popup.min.js"></script>
		<!-- Stellar -->
		<script src="site/ccmail/js/jquery.stellar.min.js"></script>
		<!-- countTo -->
		<script src="site/ccmail/js/jquery.countTo.js"></script>
		<!-- WOW -->
		<script src="site/ccmail/js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<!-- Main -->
		<script src="site/ccmail/js/main.js"></script>


		<div class="fh5co-footer-style-3">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-3 col-sm-6 fh5co-footer-widget"> {{--wow fadeInUp  data-wow-duration="1s" data-wow-delay=".1s"--}}
						<div class="fh5co-logo"><span class="logo">B</span> Boonzero</div>
						<p class="fh5co-copyright">&copy; 2013 Boonzero. <br>All Rights Reserved.
							<br>Designed by <a target="_blank" href="about:blank">Moior</a>
							<br>Work with <a target="_blank" href="http://www.yeyul.com">Yeyul</a>
							{{--<br>Images: <a target="_blank" href="http://unsplash.com/">Unsplash</a>, <a target="_blank" href="http://pexels.com/">Pexels</a></p>--}}
					</div>
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
						<h3>Company</h3>
						<ul class="fh5co-links">
							<li>(주)모이어</li>
							<li><a target="_blank" href="https://www.google.co.kr/maps/place/%EC%95%84%EA%B0%80%EB%B0%A9%EB%B9%8C%EB%94%A9/@37.5019931,127.038773,18.29z/data=!4m12!1m9!4m8!1m0!1m6!1m2!1s0x357ca3ff15a01301:0xa36dcf2c34b2115a!2z7ISc7Jq47Yq567OE7IucIOqwleuCqOq1rCDsl63sgrwx64-ZIDY3OC0zNiDslYTqsIDrsKnruYzrlKk!2m2!1d127.0387154!2d37.5016827!3m1!1s0x0000000000000000:0xa36dcf2c34b2115a">
									서울 강남 테헤란로207, 7층</a></li>
							<li><a href="tel:1661-5521">02-1661-5521</a></li>
							{{--<li><a href="#">How it Works</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Products</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact</a></li>--}}
						</ul>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
						{{--<h3>Connect</h3>
						<ul class="fh5co-links fh5co-social">
							<li><a href="#"><i class="icon icon-facebook2"></i> Facebook</a></li>
							<li><a href="#"><i class="icon icon-twitter"></i> Twitter</a></li>
							<li><a href="#"><i class="icon icon-dribbble"></i> Dribbble</a></li>
							<li><a href="#"><i class="icon icon-instagram"></i> Instagram</a></li>
						</ul>--}}
					</div>
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
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
					<div class="col-md-12">
					<div class="col-md-12">
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


<script>

	$(document).ready(function(){
		/*메인화면의 글자들이, 순간적으로 보였다가 슬라이드 나타남.. 별루라서 수정시도*/
		setTimeout(function(){
			$(".fadeInUp").css("display", "block");
		},100);
	});
</script>


{{--페이스북 로그인--}}
<script>
	window.fbAsyncInit = function() {
		FB.init({   appId      : '1026118984094160',
			xfbml      : true,
			version    : 'v2.5'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

{{--구글 analytics--}}
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-75241580-1', 'auto');
	ga('send', 'pageview');

</script>
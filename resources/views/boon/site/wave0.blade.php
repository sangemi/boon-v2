
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>단체소송 :: 분쟁제로</title>
	<meta name="description" content="집단소송" />
	<meta name="keywords" content="민형사 집단소송, 지식재산권 분쟁, 내용증명, 원스탑 소송지원" />
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
	<link rel="stylesheet" href="/site/ccmail/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/site/ccmail/css/icomoon.css">
	<!-- Magnific Popup-->
	<link rel="stylesheet" href="/site/ccmail/css/magnific-popup.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/site/ccmail/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/site/ccmail/css/owl.theme.default.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/site/ccmail/css/bootstrap.css">

	<!-- Cards -->
	<link rel="stylesheet" href="/site/ccmail/css/cards.css">

	<!-- Modernizr JS -->
	<script src="/site/ccmail/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="/site/ccmail/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-page">

		<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
			<div class="container">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
					<a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
					<a href="/">법무법인<small>(유)</small>예율</a>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-5 text-center fh5co-link-wrap">


					<ul data-offcanvass="yes">
						{{--<li class="active"><big>단체소송</big></li>--}}
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
							{{--<li><a href="/ip/askvisit" class="call-to-action">방문요청</a></li>--}}

						@else
							<li><a href="/auth/login">로그인</a></li>
							<li><a href="/auth/register">가입</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>


		<div class="fh5co-cover fh5co-cover-style-2 js-full-height" data-stellar-background-ratio="0.5" data-next="yes"
			 style="position:relative;background-image: url('/site/wave/images/full_5.jpg');background-color:rgba(0, 0, 0, 0.5);">
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
									<?php $rand = 0 ; //rand(0, 2);

									$textSupertitle = array('소비자소송의 시작'); //분쟁을 관리하는 가장 쉬운 방법  '분쟁에 대처하는 엘레강스한 방법',

									?>
										<h1 class="cover-text-lead wow fadeInUp" style="display:none;" data-wow-duration="1s" data-wow-delay="0s"><?=$textSupertitle[$rand]?></h1>
										<h2 class="cover-text-sublead wow fadeInUp" style="display:none;" data-wow-duratio="1s" data-wow-delay=".4s">
										다수의 경험으로 집단소송을 관리해드립니다. <br>정기적 진행보고. <big>차별화된 소송지원</big>을 경험하세요.
									</h2>
									<p class="wow fadeInUp" style="display:none;" data-wow-duration="1s" data-wow-delay="1.4s">
										<a href="/wave/5" class="btn btn-primary btn-sm" target="">#6 코웨이</a>
										<a href="/wave/6" class="btn btn-primary btn-sm" target="">#7 인터파크</a>
										<br>
										<a href="#소송안내" class="btn btn-primary  btn-outline btn-sm">안내</a>
										<a href="#소비자권리단원" class="btn btn-primary btn-outline btn-sm">권리지킴이 모집</a>
										{{--<a href="tel:022135525" class="btn btn-primary btn-outline">방문요청</a>--}}
										{{--/ip/askvisit--}}
										&nbsp;&nbsp;&nbsp;

									</p>

										{{--<div class="alert alert-link text-right"><small>
												<a href="/site/ip/book/company and ip 20160515.pdf" target="_blank" style="color:#eee;">최신 책자 다운로드</a></small>
										</div>--}}
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
												<h1 style="color:white;font-size:2em;">접수하기</h1>
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
													회원등록 & 다음
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

										<div class="well text-center" style="">
											접수할 소송을 선택해주세요.<br><br>
											<p>
												<a href="/wave/5" class="btn btn-link" target="">#6 코웨이 중금속 사건</a><br>
												<a href="/wave/6" class="btn btn-link" target="">#7 인터파크 정보유출 사건</a>

											</p>
										</div>
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

		  	<span class="scroll-btn wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.6s">
				<a href="#">
					소송안내▼
				</a>
			</span>
		</div>


		<a  name="소송안내"></a>
		<div class="fh5co-project-style-2">

			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">단체소송 안내</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">

						</p>

<h3>1. 인사말</h3>

						<p>가. 안녕하십니까. 법무법인 예율입니다. 예율 단체소송팀은 본 사이트를 통하여 의뢰인분들과 적극 소통하고 있습니다.</p>
						<p>나. 법무법이 예율은
							현대/폭스바겐 등 연비소송 (원고 5천명), 여수 바지락 소송 (원고 330명), 산후조리원 결핵 집단전염 사건 (230여명), 가네보 백반증 피해자 소송 등을 진행하고 있으며,
							정보유출사건으로는 국민은행 등 은행권 정보유출사건/홈플러스 정보유출사건 등의 경험이 있습니다.
							이와 같은 경험으로, 소송 초기부터 마무리 단계까지 소비자들의 권익을 위하여 최선의 노력을 다할 것을 약속드립니다.
						{{--<ul>
						<li>가. 한뼘얼음정수기(CHPI-380N 또는 CPI-380N) 사용자</li>
						<li>나. 커피얼음정수기(CHPCI-430N) 사용자</li>
						<li>다. 스파클링아이스정수기(CPSI-370N) 사용자</li>
						</ul>--}}

						<p></p>
<h3>2. 단체소송의 이해</h3>
	<p>가. 단체소송은 보통 1심에서만 1년 6월, 최대 3년이 소요되는 경우가 많습니다. 다만 상대가 쟁점을 크게 다투지 않는 경우에는 조정/화해결정을 통해 기간이 단축될 수 있습니다.</p>

	<p>나. 일반적으로 민사사건 변호사 선임비용은 1사건당 500만원 상당이나,
		단체소송의 경우 동일한 사실관계에 기인하여 청구를 하는 것이므로 상대적으로 저렴한 비용에 진행이 가능합니다.</p>

	<p>다. 그러나 단체소송은 당사자가 수백~수천명이므로 소송경제, 변론의 원할 등을 위하여 개인의 특수성을 고려하지 못합니다.
		예를 들어 원고 중 일부는 위자료를 추가적으로 인정해 달라 라는 취지의 변론을 할 수 없습니다.</p>

	<p>다만 법무법인 예율 소송은 다년간 단체소송을 수행한 경험을 바탕으로,
		개인의 특성을 고려한  다양한 소송진행 방식을 구상 및 제안드리기도 합니다.</p>

<h3>3. 유의사항</h3>

	<p>가. <u>본인의 지인, 가족, 이웃들에게 본 페이지를 소개해 주십시오.</u>
		집단소송의 특성상 원고가 충분히 모이지 아니하면 긴 시간 소송을 버티지 못합니다.
		따라서 원고가 적정수 확보되지 아니할 경우 진행이 힘들 수도 있습니다.
		윤리를 망각한 기업에 대한 유일한 해결책은 소비자들의 적극적인 노력밖에 없습니다.
	</p>

	<p>나. 법무법인 예율 단체소송팀은 장기간 진행되는 소송기간 중, 기일 지정 및 변론의 방향 등에 대해 정기적 안내를 성실하게 수행하여,
		의사소통에 어려움이 없도록 하겠습니다.
		다만 단체소송의 특성상 세부적인 변론의 내용 등에 대하여 구체적인 고지가 어려운 점 미리 양해 부탁드리며,
		신뢰를 바탕으로 개별적 전화연락은 가급적 지양하여 주시기를 부탁드립니다.
		(2,000분 이상의 의뢰인들이 동시에 전화연락을 하는 경우 소송 진행에 상당한 어려움을 겪기 때문입니다)

		{{--믿음 - 법무법인은 최소 1년 이상 단체소송을 이끌어 나가가야 합니다.
		개인별 궁금한 사정이 많으실 것입니다. 소송 진행 중 의뢰인분들의 전화응대에 본업인 소송진행에 힘이드는 경우가 많이 있습니다.
		<u>필요하실 경우 <a href="tel:02-2135-5251">전화</a>를 주시면 담당자들이 최대한 성실히 답변해 드리오나,
		부득이 한분 한분 모든 사정을 살펴드리지는 못하는 점 깊은 양해 부탁드립니다.</u>--}}
	</p>

					</div>
				</div>
			</div>
		</div>


		<a  name="소비자권리단원"></a>
		<div class="fh5co-project-style-2">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 ">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">소비자 권리지킴이 모집</h2>
						<p></p>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">

						</p>
						<div id="" style="display:block;">
							<p>가. 미국식 집단소송제가 도입되기 전까지 국내에서 대기업들의 소비자에 대한 횡포는 지속될 것입니다.
								<br><small>※ 경험상 현재 발생 사건들은 1년 후 거의 기억되지 못합니다.
								이후 2년이 더 경과하면 시효가 완성되어 기업은 금전배상책임까지 없게됩니다.</small>
							<p>나. 현재 소비자권리를 보호받는 방법은 단체소송이 가장 현실적입니다. 단체소송의 법리는 일반소송과 크게 다르지는 않습니다.
								다만 수백~수천 소송인단을 이끌고 수년을 버티기가 힘들어 어느 로펌도 쉽게 시작하지 않을 뿐입니다.
								<br /><br />힘을 보태 주십시오. <br />
								법무법인 예율 단체소송팀과 함께 마땅히 누려야 할 소비자들의 권리를 지켜 주십시오.
								기나긴 싸움에서 소송팀도 지치지 않도록 마음을 모아 주십시오.
								<br><small>※ 예율은 소비자소송에서 얻은 수익을 소비자 권익운동에 활용합니다.</small>
							</p>
							<p>
								아래 링크를 카카오톡/블로그/페이스북 등에 공유해 많은 분들이 소송에 참여할 수 있도록 독려해 주시기 바랍니다. <br>
								적극적인 노력으로 다수의 소송 참여자를 모집한 분들께는 법무법인 예율에서 ‘소비자 권리지킴이’ 공로상을 수여할 예정입니다.
								또한 모든 참여자분들께도 예율이 드릴 수 있는 최대한의 서비스를 제공드립니다. 감사합니다.
								<br><small>※ 마이페이지에서 개인별 링크 클릭수 등을 확인할 수 있습니다.</small>

								<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
								<?php
								if(Auth::check()){
									$kakao_link = 'http://boonzero.com/wave/0/recom/'.Auth::user()->id;
									$txt_personal_link = 'http://boonzero.com/wave/0/recom/'.Auth::user()->id;
									$txt_normal_link = 'http://boonzero.com/wave';
								}else{
									$kakao_link = 'http://boonzero.com/wave';
									$txt_personal_link = '로그인 후 개인별링크 제공됩니다.';
									$txt_normal_link = 'http://boonzero.com/wave';
								}
								$txt_suit_name = '소비자 권리찾기';
								$txt_btn_name = '단체소송 살펴보기';
								?>


								<div class="well">개인별 추천링크 <small>/ 이력확인이 가능합니다.</small><br>
									<?=$txt_personal_link?>
								</div>
								<div class="well">
									일반 링크 : <?=$txt_normal_link?>
								</div>
								<p>
									<a id="kakao-link-btn" href="javascript:;">
										<img src="//dev.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png"/>
									</a>
								</p>
								<script type='text/javascript'>
									//<![CDATA[
									Kakao.init('fa482b7c7beafe607ce137cd563f02b5'); // // 사용할 앱의 JavaScript 키를 설정해 주세요.
									Kakao.Link.createTalkLinkButton({ // // 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
										container: '#kakao-link-btn',
										label: '<?=$txt_suit_name?>',
										image: {
											src: 'http://wave.boonzero.com/img/wave/wave-main.png',
											width: '300',
											height: '184'
										},
										webButton: {
											text: '<?=$txt_btn_name?>',
											url: '<?=$kakao_link?>' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
										}
									});
									//]]>
								</script>
							</p>

						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-projects">
				<ul>
					<li class="wow " style="background-image: url(site/wave/images/full_1.jpg);" >
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #1 소송의 기간</h3></div>
											<div class="col-md-6"><p>
												대기업을 상대로 하는 단체소송은 짧은면 1년, 길면 2년이상 걸리는 지난한 싸움입니다.
												따라서 <b>긴 시간 참을성있게 기다리실 수 있는 분</b>께서 참여해주시기 바랍니다.
													<br>
													<span style="font-size:0.7em">
														다만 상대방이 사실을 인정하는 경우, 6개월 조기종결도 가능합니다.
													</span>
												</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow" style="background-image: url(site/wave/images/full_2.jpg);">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #2 소송의 목적</h3></div>
											<div class="col-md-6"><p>
													소비자 단체소송은 단순히 금전적인 이익만이 목적이 아닙니다.
													반복되는 기업의 부도덕에 대하여 벌하는 위해서는 꾸준한 소비자운동/소송으로 기업을 견제하여야 합니다.

													<span style="font-size:0.7em">
														<br>
														징벌적 손해배상제의 도입은 아직 요원합니다. 그때를 기다리시겠습니까?
													</span>

												</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow fadeInUp" style="background-image: url(site/wave/images/full_3.jpg);background-size: contain"
						data-wow-duration="0.5s" data-wow-delay="0.5s" data-stellar-background-ratio="0.5">{{--site/ccmail/images/ccmail/ccmail3_002.png--}}
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #3 소송 비용</h3></div>
											<div class="col-md-6"><p>
												단체소송은 변호사 배만 불린다? 그렇지 않습니다.
												대기업 소송은 보통 1심만 2년이 걸리며 그동안 수천명을 이끌고 가는것은 쉽지 않습니다.
												마르지않는 자금을 가진 상대에 대응하려면 체력이 튼튼해야 합니다.
													<span style="font-size:0.7em">
														<br>
														예율은 소비자소송에서 얻은 수익을 소비자 권익운동에 활용합니다.
													</span>
											</p></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li class="wow fadeInUp" style="background-image: url(site/wave/images/full_4.jpg);" data-wow-duration="0.7s" data-wow-delay="0.8s" data-stellar-background-ratio="0.5">
						<a href="#">
							<div class="fh5co-overlay"></div>
							<div class="container">
								<div class="fh5co-text">
									<div class="fh5co-text-inner">
										<div class="row">
											<div class="col-md-6"><h3> #4 소송에 임하는 각오</h3></div>
											<div class="col-md-6"><p>
													예율 임직원은 어떠한 어려움이 와도 굴하지 아니하고 소송인단의 최종 목표를 위해 매진하겠습니다.
													지켜보아 주십시오. 감사합니다.

													<span style="font-size:0.7em">
														<br>지금이 아니면 다음은 없습니다.
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



		<!-- jQuery -->
		<script src="/site/ccmail/js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="/site/ccmail/js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="/site/ccmail/js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="/site/ccmail/js/jquery.waypoints.min.js"></script>
		<!-- Owl Carousel -->
		<script src="/site/ccmail/js/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="/site/ccmail/js/jquery.magnific-popup.min.js"></script>
		<!-- Stellar -->
		<script src="/site/ccmail/js/jquery.stellar.min.js"></script>
		<!-- countTo -->
		<script src="/site/ccmail/js/jquery.countTo.js"></script>
		<!-- WOW -->
		<script src="/site/ccmail/js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<!-- Main -->
		<script src="/site/ccmail/js/main.js"></script>


		<div class="fh5co-footer-style-3">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-3 col-sm-6 fh5co-footer-widget"> {{--wow fadeInUp  data-wow-duration="1s" data-wow-delay=".1s"--}}
						<div class="fh5co-logo"><span class="logo">M</span> MOIOR corp.</div>
						<p class="fh5co-copyright">&copy; 2013 Boonzero. <br>All Rights Reserved.
							<br>Designed by <a target="_blank" href="about:blank">Moior</a>
							<br>Work with <a target="_blank" href="http://www.yeyul.com">Yeyul</a>
							{{--<br>Images: <a target="_blank" href="http://unsplash.com/">Unsplash</a>, <a target="_blank" href="http://pexels.com/">Pexels</a></p>--}}
					</div>
					<div class="col-md-3 col-sm-6 fh5co-footer-widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
						<h3>Company</h3>
						<ul class="fh5co-links">
							<li>(주)모이어 <small>대표 김상겸/264-81-14053</small></li>
							<li><a target="_blank" href="https://www.google.co.kr/maps/place/%EC%95%84%EA%B0%80%EB%B0%A9%EB%B9%8C%EB%94%A9/@37.5019931,127.038773,18.29z/data=!4m12!1m9!4m8!1m0!1m6!1m2!1s0x357ca3ff15a01301:0xa36dcf2c34b2115a!2z7ISc7Jq47Yq567OE7IucIOqwleuCqOq1rCDsl63sgrwx64-ZIDY3OC0zNiDslYTqsIDrsKnruYzrlKk!2m2!1d127.0387154!2d37.5016827!3m1!1s0x0000000000000000:0xa36dcf2c34b2115a">
									서울 강남 테헤란로207, 7층</a></li>
							<li><a href="tel:1661-5521">1661-5521</a></li>
							<li>Work with 법무법인(유한)예율</li>
							<li><a href="tel:1661-5521">02-2135-5251</a></li>

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
						<p><a href="/wave/mypage">접수상태 확인</a></p>
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
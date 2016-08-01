
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
			 style="position:relative;background-image: url(site/wave/images/full_5.jpg);background-color:rgba(0, 0, 0, 0.5);">
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

									$textSupertitle = array('#5 정수기 피해 지원'); //분쟁을 관리하는 가장 쉬운 방법  '분쟁에 대처하는 엘레강스한 방법',

									?>
										<h1 class="cover-text-lead wow fadeInUp" style="display:none;" data-wow-duration="1s" data-wow-delay="0s"><?=$textSupertitle[$rand]?></h1>
										<h2 class="cover-text-sublead wow fadeInUp" style="display:none;" data-wow-duratio="1s" data-wow-delay=".4s">
										다수의 경험으로 집단소송을 관리해드립니다. <br>정기적 진행보고. <big>차별화된 소송지원</big>을 경험하세요.
									</h2>
									<p class="wow fadeInUp" style="display:none;" data-wow-duration="1s" data-wow-delay="1.4s">
										<a href="http://cafe.naver.com/hogu1004" class="btn btn-primary" target="_blank">카페채널</a>
										<a href="#소송안내" class="btn btn-primary btn-outline btn-sm">안내</a>
										<a href="#소송비용" class="btn btn-primary btn-outline btn-sm">비용</a>
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

										<a href="/wave/mypage" class="btn btn-lg btn-warning" style="color:black"> ▶ 접수 / 관리</a>
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
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">소송 안내</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
							코웨이 정수기 중금속 니켈 검출에 대한 소비자 소송
						</p>

<h3>1. 신청자격의 안내</h3>

						<ul>
						<li>가. 한뼘얼음정수기(CHPI-380N 또는 CPI-380N) 사용자</li>
						<li>나. 커피얼음정수기(CHPCI-430N) 사용자</li>
						<li>다. 스파클링아이스정수기(CPSI-370N) 사용자</li>
						</ul>

						<p></p>
<h3>2. 손해배상 소송에 대하여</h3>

						<p>가. 안녕하십니까. 법무법인 예율입니다. 코웨이는 현재 자사 정수기의 니켈 성분 검출에 대하여 사죄의 뜻을 표하며, 사용기간 중 렌탈료의 환불 및 제품 무상 교환조치를 제시하였습니다.</p>

						<p>나. 그러나 위 조치만으로 소비자들의 손해가 전보되지 아니함은 자명하다 할 것입니다. 특히 ① 계약자 본인 및 가족의 정신적 고통에 대한 위자료의 청구 및 ② 니켈 흡수와 상당인과관계가 있는 상해에 대한 치료비의 청구, ③ 장래의 정기 건강검진 비용에 대한 청구 등이 필요하다 할 것입니다.</p>

						<p>다. 소송기간은 최소 1년 6월, 최대 3년이 예상되오나, 소송 중 조정, 화해가 이루어지는 경우 위 기간은 단축될 수 있습니다.</p>

						<p>라. 법무법이 예율은 자동차 연비소송 등 다수의 집단소송 경험을 보유하고 있으며, 소송 초기부터 마무리 단계까지 소비자들의 권익을 위하여 최선의 노력을 다할 것을 약속드립니다.</p>

<h3>3. 소송 선택</h3>

<p>가. 일반적으로 민사사건 변호사 선임비용은 1인당 500만원 상당이나, 단체소송의 경우 동일한 사실관계에 기인하여 청구를 하는 것이므로 상대적으로 저렴한 비용에 진행이 가능합니다.</p>

<p>나. 그러나 단체소송은 당사자가 다수이므로 소송경제, 변론의 원할 등을 위하여 개인의 특수성을 고려하지 못합니다. 예를 들어 위자료를 추가적으로 인정해 달라 라는 취지의 변론을 할 수 없습니다.</p>

<p>다. 다만, 법무법인 예율 소송은 다년간 단체소송을 수행한 경험이 있어 이를 바탕으로 개인의 특성을 고려한 두 가지 소송 진행 방식을 제시합니다.</p>

<h4>소송진행 방식 선택 가능</h4>

<p><b>(1) A타입 - 위자료 및 검진비를 청구하는 경우</b></p>
	<div style="padding-left:20px;">
						<p>(가) 위자료 및 장래의 검진비는 일괄하여 청구가 가능합니다. 1인당 30만원 내지 100만원의 위자료를 청구할 계획이며, 검진비의 경우 소송 중 원고 일부의 신체감정 결과를 반영하여 장래의 정기 건강검진 비용을 추가적으로 청구할 예정입니다.</p>

						<p>(나) 다만 이 경우 소비자의 개별적 사정을 반영하지는 못하고 평균적인 검진비용만을 청구할 수 있습니다. 현재 얼음정수기 사용으로 인한 건강상의 이상증세가 존재하지 아니하는 경우 A타입을 선택하시기 바랍니다.</p>

						<p>(다) 소송비용 : 인지대, 송달료를 포함하여 <b>11만원</b>.</p>
	</div>
<p><b>(2) B타입 – 위자료, 검진비에 치료비를 추가적으로 청구하는 경우</b></p>
	<div style="padding-left:20px;">

						<p>(가) 소비자들의 개별적인 신체 반응에 따라 기 발생한 진료비, 진단서를 분석 및 제출하며, 소송 중 신체감정을 통하여 현재 손해액과 향후 발생할 손해액을 구체적, 개별적으로 주장, 입증할 계획입니다.</p>

						<p>(나) 개인마다 증상이 상이하여 청구하는 소가(소송목적의 가액)도 이에 따라 결정될 것이나, 피해가 특별히 커서 500만원 이상을 청구하는 경우 추가적으로 발생하는 인지대, 송달료는 개인이 부담해주셔야 합니다. (최대 10만원)</p>

						<p>(다) 특히 치료비 청구에 대하여 신체감정은 필수적 요소이므로, 소비자들이 직접 법원이 지정한 병원에 방문 및 진단을 받아야 하고, 이에 따르는 신체감정 비용은 개인이 부담하여야 합니다(감정비용 : 10만원 내지 100만원, 진료시간 : 2시간 내지 4시간).</p>

						<p>(라) 현재 제조물 책임에 대한 다수의 판례는 소비자의 상해와 제조물의 결함 사이에 인과관계를 쉽게 인정하지 않고 있으나, 법무법인 예율은 본 코웨이 소비자 단체소송을 통하여 이에 대한 선례를 남기고자 하오니, B타입에 적극적인 참여를 부탁드립니다.</p>

						<p>(바) 소송비용 : 인지대, 송달료를 포함하여 <b>44만원</b>.</p>
	</div>

<div style="border:1px solid gray;padding:10px;">
	※ 가족 구성원이 모두 원고가 되는 경우, 할인하여 진행합니다. 하단 표를 확인해주세요.
	(가족 구성원 중 일부만 A타입, 일부는 B타입으로 선택하시려면 아래 표가 적용되지 않습니다) 이때 주민등록상 주소지가 계약자 주소지와 동일한 분만 신청 가능합니다.
</div>

						<p></p>
<h3>4. 유의사항</h3>

						<p>1) 코웨이 측과 개별적으로 제품교환 및 렌탈료의 반환을 받아, 합의를 경료한(<u>추후 민형사상의 이의를 제기하지 아니하기로 하는 취지의 합의</u>) 소비자의 경우 소송의 참여가 불가함을 고지드립니다.</p>

						<p>2) 현재 이후부터 코웨이가 제시하는 서류에 임의로 서명 및 날인하지 마시고, 제품 “교환”이 아닌 새로운 제품 “지급”을 요청하시기 바랍니다(추후 정수기 음용수에 대한 중금속 농도 수질감정이 필요합니다. 모든 원고의 제품을 검사하지는 않으나 저희가 요청하는 경우 도움을 주셔야 할 수도 있습니다).</p>

						<p>3) 중금속 농도에 대한 수질감정, 임의집단에 대한 중금속 중독여부 검사는 본 소송의 승패에 핵심적인 요소이고, 감정비가 1,000만원 내지 5,000만원 상당이 소요될 것이나, 위 금액은 기 납부해주신 소송비용에서 충당할 예정입니다.</p>

						<p>4) 집단소송의 특성상 원고가 충분히 모이지 아니하면 긴 시간 소송을 버티지 못합니다. 따라서 원고가 적정수 확보되지 아니할 경우 진행이 힘들 수도 있으니 적극적인 독려 부탁드립니다.</p>

					</div>
				</div>
			</div>
		</div>


		<a  name="소송비용"></a>
		<div class="fh5co-project-style-2">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">비용안내</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">

						</p>
						{{--<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
							<a href="javascript:$('#div비용표').toggle();" class="btn btn-success font-size-up">비용표 보기</a>
						</p>--}}
						{{--<div style="cursor:pointer;clear:both;margin-top:20px;" class="text-center" onclick="">
							&nbsp; <br/>상세 비교표 ▼
						</div>--}}
						<div id="div비용표" style="display:block;">
							<table class="table text-center">
								<tr>
									<th></th>
									<th class="text-center" style="color:royalblue;">1명</th>
									<th class="text-center"><nobr>2명</nobr></th>
									<th class="text-center">3명</th>
									<th class="text-center">4명</th>
									<th class="text-center">5명 이상</th>
								</tr>
								<tr>
									<td><small style="font-size:0.7em;"><nobr>집단소송</nobr></small><br>
										<nobr>A타입</nobr>
										</td>
									<td style="color:royalblue;">11<small style="font-size:0.7em;">만</small></td>
									<td>20<small style="font-size:0.7em;">만</small></td>
									<td>29<small style="font-size:0.7em;">만</small></td>
									<td>37<small style="font-size:0.7em;">만</small></td>
									<td>8<small style="font-size:0.7em;">만+</small></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="6"><small style="font-size:0.7em;">인지대, 송달료 포함 </small></td>
								</tr>
								<tr>
									<td><small style="font-size:0.7em;"><nobr>개별소송</nobr></small><br>
										B타입
										</td>
									<td style="color:royalblue;">44<small style="font-size:0.7em;">만</small></td>
									<td>80<small style="font-size:0.7em;">만</small></td>
									<td>116<small style="font-size:0.7em;">만</small></td>
									<td>148<small style="font-size:0.7em;">만</small></td>
									<td>32<small style="font-size:0.7em;">만+</small></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="6"><small style="font-size:0.7em;">인지대, 송달료 일부 포함 </small></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="6"><small style="font-size:0.7em;">※ 복수신청은 <u>주민등록상 주소와 정수기 설치주소가 동일한 경우</u>에 가능합니다</small></td>
								</tr>

							</table>
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
						<p><a href="/wave/main">접수상태 확인</a></p>
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
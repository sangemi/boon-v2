@extends('layouts.master')

@section('content')
	<style>
		#title설득멘트 {
			padding:0px 20px 20px 20px ;font-size:1.6em;font-weight:600;color:#195F91;
			color: #fff;
			font-weight: bold;
			text-shadow: 	0 1px 0 #777, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);

			/* 글씨가 4em쯤 되면 멋짐
			text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
			*/
		}

		#title설득멘트2 {
			padding:10px 20px 0px 20px;
			font-style: italic;
		}
		.col-left {text-align:right;}
	</style>

	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">회원정보</div>
				<div class="panel-body">

					@if($errors->any()) {{--@if (!empty($errors) && count($errors) > 0)--}}
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{{-- 소셜 로그인은, 버튼으로 만들어서 바로 할 수 있도록 하자.


					<ul id="tabs" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">일반</a></li>
						<li role="presentation"><a href="#social-login" aria-controls="social-login" role="tab" data-toggle="tab">소셜 로그인</a></li>
					</ul>--}}

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="login">
						<br/>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 col-left">이메일</label>
							<div class="col-md-6">
								<?=Auth::user()->email?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-left">이름</label>
							<div class="col-md-6">
								<?=Auth::user()->name?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-left">닉네임</label>
							<div class="col-md-6">
								<?=Auth::user()->userInfo->nick?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-left">포인트</label>
							<div class="col-md-6">
								<?=Auth::user()->boonStatus->boon_point?> point
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 col-left">휴대폰</label>
							<div class="col-md-6">
								<?=Auth::user()->userInfo->phone?>
							</div>
						</div>



						{{--<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">로그인</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">비밀번호를 잊으셨나요?</a>

							</div>
						</div>--}}
					</form>

					</div>

						<div role="tabpanel" class="tab-pane" id="social-login">
							<br/>
							<ul>
								<li><a href="{{ url('/login/facebook') }}">페이스북 로그인</a></li>
							</ul>
						</div>
					</div>

				</div>
				<div class="panel-body text-center" style="background-color:#dcf0fa">
					<div id="title설득멘트2">
						법률문제 관리툴
					</div>
					<div id="title설득멘트">
						쉽고 빠른 <span style="">분쟁관리</span><br>
					</div>

					{{--어려워서 지금 x <a href="/member/dropout">회원탈퇴</a>--}}

				</div>

			</div>
		</div>
	</div>
</div>
@endsection

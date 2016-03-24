@extends('layouts.master')

@section('content')
	<style>
		#title설득멘트 {
			padding:0px 20px 20px 20px ;font-size:1.6em;font-weight:600;color:#195F91;
/*
			background-color: #666666;
			-webkit-background-clip: text;
			-moz-background-clip: text;
			background-clip: text;
			color: transparent;
			text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;



			익스에서 안됨!!





			*/
		}
		#title설득멘트2 {
			padding:10px 20px 0px 20px;
			font-style: italic;
		}
	</style>

	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">로그인</div>
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

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> 로그인 유지하기
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">로그인</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">비밀번호를 잊으셨나요?</a>

							</div>
						</div>
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
						서식작성까지 단 10분!
					</div>
					<div id="title설득멘트">
						쉽고 빠른 <span style="">분쟁관리사</span><br>
					</div>

					<a href="/auth/register">회원가입</a>

				</div>

			</div>
		</div>
	</div>
</div>
@endsection

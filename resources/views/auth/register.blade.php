@extends('layouts.master')


@section('sidebar-right') {{--사이드바 내용없음으로 대체하고, 본문은 너비100%로--}}
	<script>
		$(document).ready(function(){
			$("#content").removeClass('col-md-10');
		});

	</script>
@endsection

@section('content')
<style>
#title설득멘트 {
	padding:0px 20px 20px 20px ;font-size:1.6em;font-weight:600;color:#195F91;

	/*background-color: #195F91;
	-webkit-background-clip: text;
	-moz-background-clip: text;
	background-clip: text;
	color: transparent;
	text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;*/
}
#title설득멘트2 {
	padding:10px 20px 0px 20px;
	font-style: italic;;
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">회원가입</div>
				<div class="panel-body">
					<div id="title설득멘트2">
						서식작성까지 단 10분!
					</div>
					<div id="title설득멘트">
						쉽고 빠른 <span style="">분쟁관리사</span><br>
						<small>가입만 하면 쓸 수 있습니다.</small>
					</div>
					@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
							<div class="col-md-6 col-md-offset-4">
								{{--<div><small>가입하기 버튼을 클릭하면 <a>약관</a>에 동의한 것으로 간주됩니다.</small></div>--}}
								<button type="submit" class="btn btn-primary">
									가입하기
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-body text-center" style="background-color:#dcf0fa">
					<a href="/auth/login" style="color:gray;">로그인</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

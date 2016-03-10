@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">로그인</div>
				<div class="panel-body">

					@if (!empty($errors) && count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif


					<ul id="tabs" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">일반</a></li>
						<li role="presentation"><a href="#social-login" aria-controls="social-login" role="tab" data-toggle="tab">소셜 로그인</a></li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="login">
						<br/>

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">이메일 주소</label>
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
			</div>
		</div>
	</div>
</div>
@endsection

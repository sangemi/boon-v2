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


#div환영{
	background-image: url(/img/v1/register_welcome_title.jpg);
	background-size: contain;
	background-repeat: no-repeat;

}

#div환영이미지부분{
	min-height:160px;
}

#title멘트 {
	padding: 0px 20px 20px 20px;
	text-align:center;
}
#title멘트 a{
	font-size: 1.6em;
	font-weight: 600;
	color: #195F91;
}
#title멘트 p{
	background-color: #195F91;
	-webkit-background-clip: text;
	-moz-background-clip: text;
	background-clip: text;
	color: transparent;
	text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;
}
@media screen and (min-width:600px) {
	#title멘트 {
		padding: 100px 20px 20px 20px;
	}
}
@media screen and (max-width:599px) {

}
.margin-top-30 {margin-top:30px;}
</style>
<div class="container-fluid margin-top-30">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">

				<div class="panel-body">
					<div id="div환영">
						<div id="div환영이미지부분">

						</div>
						<div id="title멘트">
							<?php $return_url = Session::pull('return_url'); ?>
							<a class="btn btn-lg btn-default" href="{{$return_url or "/"}}">작업을 계속합니다</a>
							<p><small>잠깐, 분제로를 북마크에 추가해 보세요</small></p>
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
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
@endsection

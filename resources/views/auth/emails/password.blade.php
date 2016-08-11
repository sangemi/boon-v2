{{--Hello {{$user->firstName}},--}}
아래 링크를 클릭해주세요. 비밀번호를 리셋합니다. (Click here to reset your password)
<br />
{{ url('password/reset/'.$token) }}

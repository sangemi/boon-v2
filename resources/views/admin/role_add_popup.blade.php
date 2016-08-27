@extends('layouts.popup') {{--master를 상속받음--}}

@section('title', '단체소송 - 분제로')


@section('content')

    <script type="text/javascript" src="/lib/common.sk.js"></script>



    <?php

    echo "<h2>역할추가</h2>";

    ?>


    {{-- 세션에 메세지 있으면 보여주기 --}}
    @if (Session::has('message'))
        <div class="alert alert-info" style="margin:10px 0;">{{ Session::get('message') }}</div>
    @endif

    <h4>
        <?=$user->name?> (<?=$user->email?>) 님의 현재 역할
    </h4>
    <p>
        <?php
        ?>
        @foreach($currentRoles as $key => $currentRole)
            <a class="btn btn-sm btn-primary btnRoleAction"  data-action="del" data-role_id="<?=$currentRole['id']?>">
            <?=$currentRole['name']?>
            </a>
        @endforeach

    </p>

    <table class="table">
        <tr><th>레벨</th><th>이름</th><th>설명</th></tr>
    @foreach($roles as $key => $role)
        <tr>
            <td>
                <?=$role['level']?>
            </td>
            <td>
                <a class="btn btn-sm btn-default btnRoleAction" data-action="add" data-role_id="<?=$role['id']?>">
                    <?=$role['name']?> <small></small>
                </a>
            </td>
            <td>
                <small><?/*=$role['slug']*/?></small>
                <small><?=$role['description']?></small>
            </td>
        </tr>
    @endforeach
    </table>


{{--ajax post 이것때문에 500 에러 생김!! ㅜ.ㅜ 3시간쯤--}}
<meta name="_token" content="{!! csrf_token() !!}" />
<script> $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') } }); </script>
{{--ajax post 이것때문에 500 에러 생김!! ㅜ.ㅜ 3시간쯤--}}

<script>
    $(document).ready(function(){
    $(".btnRoleAction").click(function(){
        var my_url = "/admin/role-action";
        var formData = {
            row_id:     '<?=$user['id']?>',
            role_id:    $(this).data("role_id"),
            action:     $(this).data("action")
        };

        $.ajax({ type: "POST", url: my_url, data: formData, dataType: 'json',
            success: function (data) { console.log("[" + my_url + " 반환값] " + JSON.stringify(data)); // js 배열 확인하기
                alert(data['data']);
                location.reload();
            },
            error: function (data) {
                console.log('SK Error 넘긴값 :', formData); console.log('SK Error 반환값 :', data);
            }
        });
    });

});
</script>

<a href="javascript:window.close()" class="btn btn-default">창 닫기</a>


@stop
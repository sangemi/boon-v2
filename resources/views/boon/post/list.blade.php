@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent

    <p>내용증명</p>
    <?
    echo "1";
    echo "2";
    echo "3";
    ?>
@stop

@section('content')

    <div style="margin-top:100px;">
        thank 3
    </div>

<form method="post" action="/public/todo">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"
    <label>할일111</label>
    <input type="text" class="form-controll" name="title" />
    <input type="submit">
</form>




@foreach ($todos as $todo)
    <p>
    @if ($todo->done == 1)
        <span style="text-decoration: line-through;">
    @endif
            {{ $todo['title'] }}
            @if ($todo->done == 1)
        </span>
    @endif

    <form method="post" action="/public/todo/done/{{$todo->id}}" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token()  }}">
        <input type="submit" value="<?php echo $todo->done == 1?"취소":"완료"; ?>">
    </form>

    <form method="post" action="/public/todo/{{$todo->id}}" class="form-horizontal">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token()  }}">
        <input type="submit" value="삭제">
    </form>

    </p>
@endforeach

<?php echo "haha2";?>



@stop


<tr id="post-{{ $post->id }}" class="{{ $post->trashed() ? 'deleted' : '' }}"
    <?php if($tr_number == 0) echo " style='background-color:#efefef;border:1px solid skyblue;'"; ?>
    >
    <td>
        <strong>{!! $post->authorName !!}</strong>
    </td>
    <td>
        @if (!is_null($post->parent))
            <p>{{--답글이면--}}
                <strong>
                    {{ trans('forum::general.response_to', ['item' => $post->parent->authorName]) }}
                    (<a href="{{ Forum::route('post.show', $post->parent) }}">{{ trans('forum::posts.view') }}</a>) {{--글보기--}}
                </strong>
            </p>
            <blockquote>
                {!! str_limit(Forum::render($post->parent->content)) !!}
            </blockquote>
        @endif

        @if ($post->trashed())
            <span class="label label-danger">{{ trans('forum::general.deleted') }}</span>
        @else
            {!! Forum::render($post->content) !!} {{--댓글/답글 내용--}}
        @endif

        <table class="" style="width:100%;margin-top:15px;">
            <tr>
                <td class="text-muted">
                    <small>{{ trans('forum::general.posted', ['item' => $post->posted] ) }}</small> {{--작성시각--}}
                    @if ($post->hasBeenUpdated())
                        | {{ trans('forum::general.last_updated') }} {{ $post->updated }}
                    @endif


                    <span class="pull-right">

                        <a href="{{ Forum::route('thread.show', $post) }}">#{{ $post->id }}</a>
                        @if (!$post->trashed())
                            @can ('reply', $post->thread)
                                - <a href="{{ Forum::route('post.create', $post) }}">{{ trans('forum::general.reply') }}</a>
                            @endcan
                        @endif
                        @if (Request::fullUrl() != Forum::route('post.show', $post))
                            - <a href="{{ Forum::route('post.show', $post) }}">{{ trans('forum::posts.view') }}</a>
                        @endif
                        @if (isset($thread))
                            @can ('deletePosts', $thread)
                                @if (!$post->isFirst)
                                    <input type="checkbox" name="items[]" value="{{ $post->id }}">
                                @endif
                            @endcan
                        @endif

                        @if (!$post->trashed())
                            @can ('edit', $post)
                            - <a href="{{ Forum::route('post.edit', $post) }}">{{ trans('forum::general.edit') }}</a> {{--수정버튼--}}
                            @endcan
                        @endif
                    </span>
                </td>
            </tr>
        </table>
    </td>
</tr>

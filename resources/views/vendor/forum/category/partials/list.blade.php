<tr>
    <td {{ $category->threadsEnabled ? '' : 'colspan=5'}}>
        <p class="{{ isset($titleClass) ? $titleClass : '' }}">

            {{--한글은 안됨. 그래서 고침 SK modi --}}
            <a href="{{ Forum::route('category.show', $category) }}">{{ $category->title }}</a>
            {{--<a href="/forum/{{ $category->id }}-{{ $category->title }}">{{ $category->title }}</a>--}}
        </p>
        <span class="text-muted">{{ $category->description }}</span>
        <small style="color:gray;">{{--1글 / 5내용--}}
        {{ trans_choice('forum::threads.thread', 2) }} {{ $category->threadCount }} /
        {{ trans_choice('forum::posts.post', 2)}} {{ $category->postCount }}
        </small>
    </td>
    @if ($category->threadsEnabled)
        <td>
            <p>

            @if ($category->newestThread)
                <a href="{{ Forum::route('thread.show', $category->newestThread) }}">
                    {{ $category->newestThread->title }}
                    {{--({{ $category->newestThread->authorName }})--}}
                </a>
            @endif
            </p>
            <p>
            @if ($category->latestActiveThread)
                <a href="{{ Forum::route('thread.show', $category->latestActiveThread->lastPost) }}">
                    {{ $category->latestActiveThread->title }}
                    {{--({{ $category->latestActiveThread->lastPost->authorName }})--}}
                </a>
            @endif
            </p>
        </td>
    @endif
</tr>

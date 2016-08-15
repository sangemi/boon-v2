<tr>
    <td {{ $category->threadsEnabled ? '' : 'colspan=5'}}>
        <p class="{{ isset($titleClass) ? $titleClass : '' }}">

            {{--한글은 안됨. 그래서 고침 SK modi --}}
            <a href="{{ Forum::route('category.show', $category) }}">{{ $category->title }}</a>
            {{--<a href="/forum/{{ $category->id }}-{{ $category->title }}">{{ $category->title }}</a>--}}
        </p>
        <span class="text-muted">{{ $category->description }}</span>
        <small>
        / {{ $category->threadCount }} {{ trans_choice('forum::threads.thread', 2) }} /
        {{ $category->postCount }} {{ trans_choice('forum::posts.post', 2)}}
        </small>
    </td>
    @if ($category->threadsEnabled)
        <td>
            @if ($category->newestThread)
                <a href="{{ Forum::route('thread.show', $category->newestThread) }}">
                    {{ $category->newestThread->title }}
                    {{--({{ $category->newestThread->authorName }})--}}
                </a>
            @endif
        </td>
        <td>
            @if ($category->latestActiveThread)
                <a href="{{ Forum::route('thread.show', $category->latestActiveThread->lastPost) }}">
                    {{ $category->latestActiveThread->title }}
                    {{--({{ $category->latestActiveThread->lastPost->authorName }})--}}
                </a>
            @endif
        </td>
    @endif
</tr>

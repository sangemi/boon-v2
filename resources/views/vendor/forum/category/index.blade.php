{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('forum::master', ['category' => null])

@section ('content')
    @can ('createCategories')
        @include ('forum::category.partials.form-create')
    @endcan

    <h2>{{ trans('forum::general.index') }}</h2>

    @foreach ($categories as $category)
        <div class=" col-xs-6">
        <table class="table table-index">
            <thead>
                <tr>
                    <th>
                        {{ trans_choice('forum::categories.category', 1) }}
                        {{--{{ trans_choice('forum::threads.thread', 2) }}
                        {{ trans_choice('forum::posts.post', 2) }}--}}
                    </th>
                    <th class="col-md-7">{{ trans('forum::threads.newest') }} / {{ trans('forum::posts.last') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{--{!! $category  !!}카테고리에 slug는 안넘어가는데. route 함수에서 slug를 어떻게 쓰지.--}}

                    @include ('forum::category.partials.list', ['titleClass' => 'lead'])


                </tr>
                @if (!$category->children->isEmpty())
                    {{--소분류 <tr>
                        <th colspan="5">{{ trans('forum::categories.subcategories') }}</th>
                    </tr>--}}
                    @foreach ($category->children as $subcategory)
                        @include ('forum::category.partials.list', ['category' => $subcategory])
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
    @endforeach
@stop

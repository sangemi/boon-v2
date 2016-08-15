<?php

// Forum index
$r->get('/', ['as' => 'index', 'uses' => "{$controllers['category']}@index"]);

// New/updated threads
$r->get('new', ['as' => 'index-new', 'uses' => "{$controllers['thread']}@indexNew"]);
$r->patch('new', ['as' => 'mark-new', 'uses' => "{$controllers['thread']}@markNew"]);

// Categories
$r->post('category/create', ['as' => 'category.store', 'uses' => "{$controllers['category']}@store"]);

/*우선 slug 사용을 다 빼버리자. 한글문제때문에.

그렇게 했더니.. ?category_slug=자유게시판&thread_slug=이-게시판
이런식으로 변수로 넘어가고 있음. 어쨌든 ㄱㄱ

*/
/*$r->group(['prefix' => '{category}-{category_slug}'], function ($r) use ($controllers)*/
$r->group(['prefix' => '{category}'], function ($r) use ($controllers)
{
    $r->get('/', ['as' => 'category.show', 'uses' => "{$controllers['category']}@show"]);
    $r->patch('/', ['as' => 'category.update', 'uses' => "{$controllers['category']}@update"]);
    $r->delete('/', ['as' => 'category.delete', 'uses' => "{$controllers['category']}@destroy"]);

    // Threads
    /*$r->get('{thread}-{thread_slug}', ['as' => 'thread.show', 'uses' => "{$controllers['thread']}@show"]);*/
    $r->get('{thread}', ['as' => 'thread.show', 'uses' => "{$controllers['thread']}@show"]);
    $r->get('thread/create', ['as' => 'thread.create', 'uses' => "{$controllers['thread']}@create"]);
    $r->post('thread/create', ['as' => 'thread.store', 'uses' => "{$controllers['thread']}@store"]);
/*    $r->patch('{thread}-{thread_slug}', ['as' => 'thread.update', 'uses' => "{$controllers['thread']}@update"]);
    $r->delete('{thread}-{thread_slug}', ['as' => 'thread.delete', 'uses' => "{$controllers['thread']}@destroy"]);*/
    $r->patch('{thread}', ['as' => 'thread.update', 'uses' => "{$controllers['thread']}@update"]);
    $r->delete('{thread}', ['as' => 'thread.delete', 'uses' => "{$controllers['thread']}@destroy"]);

    // Posts
/*    $r->get('{thread}-{thread_slug}/post/{post}', ['as' => 'post.show', 'uses' => "{$controllers['post']}@show"]);
    $r->get('{thread}-{thread_slug}/reply', ['as' => 'post.create', 'uses' => "{$controllers['post']}@create"]);
    $r->post('{thread}-{thread_slug}/reply', ['as' => 'post.store', 'uses' => "{$controllers['post']}@store"]);
    $r->get('{thread}-{thread_slug}/post/{post}/edit', ['as' => 'post.edit', 'uses' => "{$controllers['post']}@edit"]);
    $r->patch('{thread}-{thread_slug}/{post}', ['as' => 'post.update', 'uses' => "{$controllers['post']}@update"]);
    $r->delete('{thread}-{thread_slug}/{post}', ['as' => 'post.delete', 'uses' => "{$controllers['post']}@destroy"]);*/
    $r->get('{thread}/post/{post}', ['as' => 'post.show', 'uses' => "{$controllers['post']}@show"]);
    $r->get('{thread}/reply', ['as' => 'post.create', 'uses' => "{$controllers['post']}@create"]);
    $r->post('{thread}/reply', ['as' => 'post.store', 'uses' => "{$controllers['post']}@store"]);
    $r->get('{thread}/post/{post}/edit', ['as' => 'post.edit', 'uses' => "{$controllers['post']}@edit"]);
    $r->patch('{thread}/{post}', ['as' => 'post.update', 'uses' => "{$controllers['post']}@update"]);
    $r->delete('{thread}/{post}', ['as' => 'post.delete', 'uses' => "{$controllers['post']}@destroy"]);

});

// Bulk actions
$r->group(['prefix' => 'bulk', 'as' => 'bulk.'], function ($r) use ($controllers)
{
    $r->patch('thread', ['as' => 'thread.update', 'uses' => "{$controllers['thread']}@bulkUpdate"]);
    $r->delete('thread', ['as' => 'thread.delete', 'uses' => "{$controllers['thread']}@bulkDestroy"]);
    $r->patch('post', ['as' => 'post.update', 'uses' => "{$controllers['post']}@bulkUpdate"]);
    $r->delete('post', ['as' => 'post.delete', 'uses' => "{$controllers['post']}@bulkDestroy"]);
});

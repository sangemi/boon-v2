<?php namespace App\Policies\Forum;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Riari\Forum\Models\Category;
use Riari\Forum\Models\Post;

class PostPolicy
{
    public function show($user, Post $post)
    {
        $categoryOnlyMember = config('forum.integration.category.groups.for_member'); // SK. 개별 category_id 추가.
        /*return in_array($user->group->id, $categoryGroups[$category->id]);*/
        if(in_array($post->category->id, $categoryOnlyMember)){
            if(Auth::check()) return true;
            else return false;
        }
        return true;
    }
    /**
     * Permission: Edit post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function edit($user, Post $post)
    {
        return $user->getKey() === $post->author_id;
    }

    /**
     * Permission: Delete post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function delete($user, Post $post)
    {
        return Gate::forUser($user)->allows('deletePosts', $post->thread) || $user->getKey() === $post->user_id;
    }
}

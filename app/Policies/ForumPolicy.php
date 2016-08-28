<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Riari\Forum\Models\Category;

class ForumPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(User $user, Category $category)
    {
        return $category;
        if( in_array($category, [4, 5, 6]) ) // 공지사항들.
        {
            if($user->level()->get() <= 50)
                return true;
        }

        return false;
    }
}

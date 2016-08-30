<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Riari\Forum\Models\Category;

class ForumPolicy
{
    use HandlesAuthorization;

    /**            이건 안씀 지워.
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

        return false;
    }
}

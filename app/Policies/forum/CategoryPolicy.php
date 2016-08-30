<?php namespace App\Policies\Forum;

use Illuminate\Support\Facades\Auth;
use Riari\Forum\Models\Category;

class CategoryPolicy
{
    /**
     * Permission: Create threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function createThreads($user, Category $category)
    {
        //return true;
        /*SK 여기다 날코딩하면 vendor 덮어쓸때 작동않음. custom policy 작성해야
        역할이 2개일때... 가장 큰 레벨로 지정됨.
        */
        if( in_array($category->id, [4, 5, 6]) ) // 공지사항들.
        {
            if($user->level() >= 500)
                return true;
            else return false;
        }else{
            return true;
        }
    }

    /**
     * Permission: Manage threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function manageThreads($user, Category $category)
    {
        return $this->deleteThreads($user, $category) ||
               $this->enableThreads($user, $category) ||
               $this->moveThreadsFrom($user, $category) ||
               $this->lockThreads($user, $category) ||
               $this->pinThreads($user, $category);
    }

    /**
     * Permission: Delete threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function deleteThreads($user, Category $category)
    {
        return true;
    }

    /**
     * Permission: Enable threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function enableThreads($user, Category $category)
    {
        return true;
    }

    /**
     * Permission: Move threads from category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function moveThreadsFrom($user, Category $category)
    {
        return true;
    }

    /**
     * Permission: Move threads to category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function moveThreadsTo($user, Category $category)
    {
        return true;
    }

    /**
     * Permission: Lock threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function lockThreads($user, Category $category)
    {
        return true;
    }

    /**
     * Permission: Pin threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function pinThreads($user, Category $category)
    {
        return true;
    }

    /**
     * Permission: View category. Only takes effect for 'private' categories.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    /*public function view($user, Category $category)
    {
        return true;
    }*/
    public function view($user, Category $category)
    {
        $categoryOnlyMember = config('forum.integration.category.groups.for_member'); // SK. 개별 category_id 추가.
        /*return in_array($user->group->id, $categoryGroups[$category->id]);*/
        if(in_array($category->id, $categoryOnlyMember)){
            if(Auth::check()) return true;
            else return false;
        }
        return true;
    }
    /**
     * Permission: Delete category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function delete($user, Category $category)
    {
        return true;
    }
}

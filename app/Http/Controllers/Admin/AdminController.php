<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //if(!Auth::check()) return redirect()->to('/auth/login');
        //$this->middleware('guest'); //원래 5.2 버전은 except => logout 이었음.
        /*로그인된 상태여도 getRegisterEnd 페이지는 보이도록. */

    }

    public function getIndex() // /admin 으로 접속시!
    {

        /*if(Auth::user()){
            //return Redirect::to('/site/ccmail');
        }else{
            return view('boon.site.ccmail');

        }*/

        $username = Auth::user()->name;
        /*if (Auth::check() && ($username == '김상겸' || $username == '정지혜' || $username == '김수로' || $username == '곽지영'
                || $username == '장미라' || $username == '이준호')
        ){*/
        if (Auth::user()->level() <= 50) {
            return view('admin.main');
        }else{
            echo "제한";
        }

    }

    public function getRole()
    {

        /*해당 역할을 가진 모든 유저*/
        /*$role_slug = 'admin';
        $adminUsers = User::leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
                          ->leftjoin('roles', 'role_user.role_id', '=', 'roles.id')
                          ->where('roles.name', $role_slug)->get();*/

        /*역할이 지정된 모든 유저*/
        $roleUsers = User::leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftjoin('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*','roles.*', 'users.name as name','users.id as user_id','roles.name as role_name')
            ->where('role_user.id', '<>', '')->get();
        $roles = Role::all();
        return view('admin.role', compact('roleUsers', 'roles'));

        /*if ($user->is('admin|moderator')) { // 최소 하나만 가져도

        }
        if ($user->is('admin|moderator', true)) { // 모든 역할 가져야

        }*/

    }

    public function getCreateRole()
    {
        $adminRole = Role::create([
            'name' => '파트너변호사',
            'slug' => 'lawyer.partner',
            'description' => '파트너 변호사', // optional
            'level' => 30, // optional, set to 1 by default
        ]);

        $adminRole = Role::create([
            'name' => '어쏘변호사',
            'slug' => 'lawyer.asso',
            'description' => '어쏘 변호사', // optional
            'level' => 40, // optional, set to 1 by default
        ]);

        $adminRole = Role::create([
            'name' => '송무보조',
            'slug' => 'lawyer.staff',
            'description' => '송무보조', // optional
            'level' => 50, // optional, set to 1 by default
        ]);

        $adminRole = Role::create([
            'name' => '대표',
            'slug' => 'ceo',
            'description' => '최고관리자. CEO', // optional
            'level' => 1, // optional, set to 1 by default
        ]);


        $Role = Role::create([
            'name' => '최고관리자',
            'slug' => 'admin.super',
            'description' => '회사 내 최고관리자',
            'level' => 30,
        ]);
        $Role = Role::create([
            'name' => '외부관리자',
            'slug' => 'admin.other',
            'description' => '회사 외부 관리자',
            'level' => 100,
        ]);

        $Role = Role::create([
            'name' => '재무',
            'slug' => 'staff.finance',
            'description' => '재무부서',
            'level' => 50,
        ]);
        $Role = Role::create([
            'name' => '기획',
            'slug' => 'staff.planning',
            'description' => '기획부서',
            'level' => 30,
        ]);

        $Role = Role::create([
            'name' => '생산',
            'slug' => 'staff.produce',
            'description' => '생산부서',
            'level' => 100,
        ]);
        $Role = Role::create([
            'name' => '영업',
            'slug' => 'staff.sales',
            'description' => '영업부서',
            'level' => 100,
        ]);
        $Role = Role::create([
            'name' => '디자인',
            'slug' => 'staff.design',
            'description' => '디자인부서',
            'level' => 100,
        ]);
        $Role = Role::create([
            'name' => '회계',
            'slug' => 'staff.accounting',
            'description' => '회계부서',
            'level' => 100,
        ]);


        echo "성공";
    }
    public function getAttachRole()
    {
        /*
        1       김상겸
        7       정지혜
        11      정지혜
        16      김진한
        36      신정재
        231     이준호
        294     이준호
        300     곽지영
        2909    김예희
        4282    장미라 */

        $adminRole = Role::where('slug', '=', 'ceo')->first();

        $user = User::find(1);
        $user->attachRole($adminRole);

        $adminRole = Role::where('slug', '=', 'staff.accounting')->first();
        $user = User::find(4282);
        $user->attachRole($adminRole);

        $adminRole = Role::where('slug', '=', 'staff.design')->first();
        $user = User::find(2909);
        $user->attachRole($adminRole);

        $adminRole = Role::where('slug', '=', 'admin.other')->first();
        $user = User::find(16);
        $user->attachRole($adminRole);

        $adminRole = Role::where('slug', '=', 'lawyer.partner')->first();
        $user = User::find(1);
        $user->attachRole($adminRole);
        $user = User::find(7);
        $user->attachRole($adminRole);
        $user = User::find(11);
        $user->attachRole($adminRole);
        $user = User::find(36);
        $user->attachRole($adminRole);
        $user = User::find(300);
        $user->attachRole($adminRole);
        $adminRole = Role::where('slug', '=', 'lawyer.staff')->first();
        $user = User::find(231);
        $user->attachRole($adminRole);
        $user = User::find(294);
        $user->attachRole($adminRole);
        $user = User::find(4282);
        $user->attachRole($adminRole);


    }




}

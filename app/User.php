<?php

namespace App;

/*use Illuminate\Foundation\Auth\User as Authenticatable; 라라벨네이티브 Authorization*/
/*bican add*/
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


//class User extends Authenticatable // 원래.
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** Http/Controllers/Auth/AuthController 수정함.
     * // 회원가입할 때 hasOne인것들은 자동 추가 / SK 추가
        UserInfo::create([
            'user_id' => $user_id
        ]);
     */
/*
    public function roles(){
        return $this->belongsToMany('App\Role');
    }*/

    public function userInfo(){
        return $this->hasOne('App\UserInfo');
    }

    public function boonStatus(){
        return $this->hasOne('App\BoonStatus');
    }
    public function boonCash(){
        return $this->hasMany('App\BoonCash');
    }

    public function ccMailWork() {
        return $this->hasMany('App\CcMailWork');
    }

    public function userRequest(){
        return $this->hasMany('App\UserRequest');
    }

    public function userPayment(){
        return $this->hasMany('App\UserPayment');
    }

    public function pecon() {
        return $this->hasMany('App\Pecon');
    }

    /**
     * A user can have many roles.
     * /
    public function roles()
    {
    return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function is($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }
        return false;
    }*/
}

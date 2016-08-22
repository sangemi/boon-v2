<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

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

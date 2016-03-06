<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/* '의뢰' : 내용증명, 지급명령, 상담 신청, 주문 Request*/
class UserPayment extends Model {
    protected $table = 'user_requests';

    /*public function __construct($table_name = null, array $attributes = array())
    {
        parent::__construct($attributes);
    }*/

    /* 보안을 위하여, 값을 입력할 수 있는 컬럼을 whitelist (fillable)로 지정해줘야. 아님 Mass Assignment 에러가 나옴 */
    //protected $fillable = ['sample_id', 'sender_name', 'sender_addr', 'sender_phone', 'receiver_name', 'receiver_addr', 'receiver_phone', 'content', 'used_cnt', 'create_id'];
    protected $guarded = ['created_at']; // 지정한것 외에 다 쓸 수 있음.

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function userRequest(){
        return $this->hasMany('App\userRequest');
    }

}




/**
 * The attributes excluded from the model's JSON form.
 */
//protected $hidden = ['password', 'remember_token'];



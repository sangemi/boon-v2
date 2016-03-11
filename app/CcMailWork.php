<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CcMailWork extends Model {
    protected $table = 'ccmail_works';

/*    public function __construct($table_name = null, array $attributes = array())
    {
        parent::__construct($attributes);
$this->table = 'ccmails_work'; //
    }*/


    /* 보안을 위하여, 값을 입력할 수 있는 컬럼을 whitelist (fillable)로 지정해줘야함
    하지 않으면 Mass Assignment 에러가 나옴 */
    protected $fillable = ['user_id', 'sample_id', 'sender_name', 'sender_addr', 'sender_phone', 'receiver_name', 'receiver_addr', 'receiver_phone', 'content', 'used_cnt'];
    //guarded = ['title']; // 지정한것 외에 다 쓸 수 있음.

    /*소프트딜리트 사용하기 위해서 모델에 정의하고 Controll에는 그냥 그대로 delete() 쓰면됨 */
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /*7일 이내의 이슈만 : \App\CcMail::dueIn7Days()->take(5)->get() 식으로 씀*/
    public function scopeDueIn7Days($query, $days)
    {
        return $query->where('due_date', '>', \Carbon\Carbon::now()->subDays($days));
    }
    public function user(){
        return $this->belongsToMany('App\User');
    }
}




/**
 * The attributes excluded from the model's JSON form.
 */
//protected $hidden = ['password', 'remember_token'];



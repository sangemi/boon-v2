<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WaveSuit extends Model {
    protected $table = 'wave_suits';

    /*public function __construct($table_name = null, array $attributes = array())
    {
        parent::__construct($attributes);

        // 원래 자동으로 cc_mails ? 테이블과 연결됨 // protected $table = 'ccmail_samples';
        if( empty($table_name) || $table_name == 'sample' )   $this->table = 'ccmail_samples';
        else $this->table = 'ccmails_'.$table_name; //
    }*/

    protected $guarded = ['created_at']; // 지정한것 외에 다 쓸 수 있음.

    use SoftDeletes; /*소프트딜리트 사용하기 위해서 모델에 정의하고 Controll에는 그냥 그대로 delete() 쓰면됨 */
    protected $dates = ['deleted_at'];

    /*이부분 너무 어려워 ㅠ.ㅠ*/
    public function client(){
        return $this->hasMany('App\WaveClient', 'client_id'); // 이건 안쓸듯한데..
    }

    public function status(){
        return $this->hasMany('App\WaveStatus', 'status_id'); // 이건 안쓸듯한데..
    }
}




/**
 * The attributes excluded from the model's JSON form.
 */
//protected $hidden = ['password', 'remember_token'];



<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoonStatus extends Model {
    protected $table = 'boon_status';

    //protected $fillable = ['sample_id', 'sender_name', 'sender_addr', 'sender_phone', 'receiver_name', 'receiver_addr', 'receiver_phone', 'content', 'used_cnt', 'create_id'];
    protected $guarded = ['created_at']; // 지정한것 외에 다 쓸 수 있음.

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function boonPoint(){
        return $this->hasMany('App\BoonPoint');
    }

    public function boonCash(){
        return $this->hasMany('App\BoonCash');
    }
}

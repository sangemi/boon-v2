<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMemo extends Model {
    protected $table = 'user_memos';

    protected $guarded = ['created_at']; // 지정한것 외에 다 쓸 수 있음.
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pecon extends Model {
    public function __construct($table_name = null, array $attributes = array())
    {
        parent::__construct($attributes);
    }


    /* 보안을 위하여,  않으면 Mass Assignment 에러가 나옴 */
    protected $fillable = ['user_id', 'name', 'nation', 'cate3', 'content', 'used_cnt'];
    //guarded = ['title']; // 지정한것 외에 다 쓸 수 있음.

    /*소프트딜리트 사용하기 위해서 모델에 정의하고 Controll에는 그냥 그대로 delete() 쓰면됨 */
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}


<?php namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LatentClient extends Model {
    protected $table = 'latent_clients';

    protected $guarded = ['created_at']; // 지정한것 외에 다 쓸 수 있음.
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}

<?php namespace App\Models\Wave;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WaveEventHistory extends Model {
    protected $table = 'wave_event_history';

    protected $guarded = ['created_at']; // 지정한것 외에 다 쓸 수 있음.
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}

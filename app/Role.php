<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $timestamps = false; // DB에 없슴.

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}

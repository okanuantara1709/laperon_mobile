<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendataan extends Model
{
    protected $table = 'pendataan';
    protected $guarded = [];

    public function vaksin(){
        return $this->belongsTo('App\Vaksin');
    }
}

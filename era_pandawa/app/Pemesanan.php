<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $guarded = [];

    public function properti(){
        return $this->belongsTo('App\Properti');
    }
}

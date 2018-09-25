<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    protected $table = 'properti';
    protected $guarded = [];
    
    public function foto(){
        return $this->hasMany('App\Foto');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori');
    }
}

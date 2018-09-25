<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayi extends Model
{
    protected $table = 'bayi';
    protected $guarded = [];
    
    public function bapak(){
        return $this->belongsTo('App\OrangTua','bapak_id');
    }

    public function ibu(){
        return $this->belongsTo('App\OrangTua','ibu_id');
    }
}

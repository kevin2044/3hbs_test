<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = ['name','code','city'];

    public function remarks(){
        return $this->morphMany(Remark::class, 'remarkable');
    }

    public function flights(){
        return $this->hasMany(Flight::class);
    }
}

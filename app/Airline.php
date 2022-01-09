<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = ['name', 'code'];

    public function remarks(){
        return $this->morphMany(Remark::class, 'remarkable');
    }

    public function flights(){
        return $this->hasMany(Flight::class);
    }
}

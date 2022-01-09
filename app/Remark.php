<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $fillable = ['content'];

    public function remarkable(){
        return $this->morphTo();
    }
}

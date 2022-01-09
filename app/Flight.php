<?php

namespace App;

use App\Remark;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'code',
        'type',
        'departure_time',
        'arrival_time',
        'departure_id',
        'destination_id',
        'airline_id',
    ];

    protected $dates = ['departure_time', 'arrival_time'];

    public function remarks(){
        return $this->morphMany(Remark::class, 'remarkable');
    }

    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    public function departure(){
        return $this->belongsTo(Airport::class, 'departure_id');
    }

    public function destination(){
        return $this->belongsTo(Airport::class, 'destination_id');
    }

    public function getArrivalTime(){
        return $this->arrival_time->format('Y-m-d');
    }
}

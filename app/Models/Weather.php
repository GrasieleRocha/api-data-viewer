<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model {
    use HasFactory;

    protected $table = "weather"; 
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'city',
        'temperature',
        'visibility',
        'wind_speed',
        'description',
        'timestamp'
    ];

    public $incrementing = true;
    public $timestamps = false;
}

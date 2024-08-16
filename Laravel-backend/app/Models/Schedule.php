<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date',
        'day_of_week',
        'start_time',
        'end_time',
        'max_reservations_per_hour'
    ];
}

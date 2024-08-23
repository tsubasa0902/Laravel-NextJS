<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatingHour extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'office_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}

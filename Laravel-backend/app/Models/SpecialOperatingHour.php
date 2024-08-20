<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialOperatingHour extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'office_id',
        'special_date',
        'start_time',
        'end_time',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}

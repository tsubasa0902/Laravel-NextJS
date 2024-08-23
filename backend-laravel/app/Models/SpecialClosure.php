<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialClosure extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'office_id',
        'closure_date',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}

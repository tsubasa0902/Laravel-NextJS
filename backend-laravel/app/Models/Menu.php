<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'office_id',
        'category_id',
        'name',
        'description',
        'duration',
        'price'
    ];
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

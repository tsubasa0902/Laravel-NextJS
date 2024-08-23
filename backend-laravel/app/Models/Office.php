<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Office extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'address',
        'tel',
        'email',
    ];
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
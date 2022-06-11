<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clentitog extends Model
{
    use HasFactory;
    public $fillable = [
        'tavarshtuk',
        'shtuk',
        'foiz',
        'itog',
        'opshi'
    ];
    public $timestamps = true;
}
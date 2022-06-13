<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itogop extends Model
{
    use HasFactory;
    public $fillable = [
        'itogo',
        'kurs',
        'usd',
    ];
    public $timestamps = true;
}

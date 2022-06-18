<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clentmalumot extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'namese2',
        'familiya',
        'sana',
        'tels',
        'tels2',
        'region',
        'adress',
        'orentr',
        'ishjoyi',
        'lavozim',
        'qoshimachaish',
        'qoshimcha',
        'coment',
    ];
    public $timestamps = true;
}

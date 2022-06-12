<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ishchilar extends Model
{
    use HasFactory;
    public $fillable = ['name', 'login', 'password'];
    public $timestamps = true;
}

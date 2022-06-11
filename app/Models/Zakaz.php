<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakaz extends Model
{
    use HasFactory;
    public $fillable = [
        'malumot', 
        'itogs', 
        'naqt', 
        'plastik', 
        'bank', 
        'karzs'
    ];
    public $timestamps = true;
}
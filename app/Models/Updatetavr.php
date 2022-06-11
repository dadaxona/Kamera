<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updatetavr extends Model
{
    use HasFactory;
    public $fillable = ['tavar_id', 'ichkitavar_id', 'adress', 'tavar2_id', 'raqam', 'hajm', 'summa', 'summa2', 'summa3'];
    public $timestamps = true;
}
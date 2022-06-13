<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umumiyp extends Model
{
    use HasFactory;
    public $fillable = ['hajm', 'summa', 'summa2', 'foyda'];
    public $timestamps = true;
}

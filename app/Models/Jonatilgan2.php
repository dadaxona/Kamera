<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jonatilgan2 extends Model
{
    use HasFactory;
    public $fillable = ['tavar_id', 'adress', 'tavar2_id', 'name', 'raqam', 'hajm', 'summa', 'summa2', 'summa3', 'kurs', 'kurs2'];
    public $timestamps = true;

    public function tavar()
    {
        return $this->belongsTo(Tavar::class);
    }

    public function tavar2()
    {
        return $this->belongsTo(Tavar2::class);
    }
}

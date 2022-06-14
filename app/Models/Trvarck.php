<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trvarck extends Model
{
    use HasFactory;
    public $fillable = ['tavar_id', 'adress', 'tavar2_id', 'ichkitavar_id', 'name', 'raqam', 'hajm', 'summa', 'summa2', 'summa3'];
    public $timestamps = true;

    public function tavar()
    {
        return $this->belongsTo(Tavar::class);
    }

    public function tavar2()
    {
        return $this->belongsTo(Tavar2::class);
    }

    public function ichkitavar()
    {
        return $this->belongsTo(Ichkitavar::class);
    }
}

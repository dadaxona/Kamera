<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzina3 extends Model
{
    use HasFactory;
    public $fillable = [
        'tavar_id', 
        'ichkitavar_id', 
        'name', 
        'soni', 
        'raqam', 
        'hajm', 
        'summa', 
        'summa2', 
        'chegirma', 
        'itog',
    ];
    public $timestamps = true;

    public function tavar()
    {
        return $this->belongsTo(Tavar::class);
    }

    public function ichkitavar()
    {
        return $this->belongsTo(Ichkitavar::class);
    }
}

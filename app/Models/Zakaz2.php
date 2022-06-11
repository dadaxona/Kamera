<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakaz2 extends Model
{
    use HasFactory;
    public $fillable = [
        'zakaz_id', 
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

    public function zakaz()
    {
        return $this->belongsTo(Zakaz::class);
    }
    
    public function tavar()
    {
        return $this->belongsTo(Tavar::class);
    }

    public function ichkitavar()
    {
        return $this->belongsTo(Ichkitavar::class);
    }
}

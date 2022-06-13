<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzina3p extends Model
{
    use HasFactory;
    public $fillable = [
        'tavarp_id', 
        'tayyorsqlad_id', 
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
        return $this->belongsTo(Tavarp::class);
    }

    public function ichkitavar()
    {
        return $this->belongsTo(Tayyorsqlad::class);
    }
}

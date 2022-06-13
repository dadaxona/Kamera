<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzina2p extends Model
{
    use HasFactory;
    public $fillable = [
        'userp_id', 
        'tavarp_id', 
        'tayyorsqlad_id', 
        'clentra',
        'name', 
        'soni', 
        'raqam', 
        'hajm', 
        'summa', 
        'summa2', 
        'chegirma', 
        'itog',
        'zakaz'
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(Userp::class);
    }

    public function tavar()
    {
        return $this->belongsTo(Tavarp::class);
    }
}

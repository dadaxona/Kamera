<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzina2 extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id', 
        'tavar_id', 
        'ichkitavar_id', 
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
        return $this->belongsTo(User::class);
    }

    public function tavar()
    {
        return $this->belongsTo(Tavar::class);
    }
}

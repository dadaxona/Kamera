<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jonatilgan extends Model
{
    use HasFactory;
    public $fillable = ['tavarp_id', 'adress', 'tavar2p_id', 'name', 'raqam', 'hajm', 'summa', 'summa2', 'summa3', 'kurs', 'kurs2'];
    public $timestamps = true;

    public function tavarp()
    {
        return $this->belongsTo(Tavarp::class);
    }

    public function tavar2p()
    {
        return $this->belongsTo(Tavar2p::class);
    }
}

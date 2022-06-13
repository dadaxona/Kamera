<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sqladpoytaxtp extends Model
{
    use HasFactory;
    public $fillable = ['tavarp_id', 'adress', 'tavar2p_id', 'name', 'raqam', 'hajm', 'summa', 'summa2', 'summa3', 'kurs', 'kurs2'];
    public $timestamps = true;

    public function tavar()
    {
        return $this->belongsTo(Tavarp::class);
    }

    public function tavar2()
    {
        return $this->belongsTo(Tavar2p::class);
    }
}

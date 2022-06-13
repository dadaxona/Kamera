<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updatetavrp extends Model
{
    use HasFactory;
    public $fillable = ['tavarp_id', 'tayyorsqlad_id', 'adress', 'tavar2p_id', 'raqam', 'hajm', 'summa', 'summa2', 'summa3'];
    public $timestamps = true;
}
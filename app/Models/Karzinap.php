<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karzinap extends Model
{
    use HasFactory;
    public $fillable = ['tavarp_id', 'tayyorsqlad_id', 'name', 'soni', 'raqam', 'hajm', 'summa', 'summa2', 'chegirma', 'itog'];
    public $timestamps = true;
}

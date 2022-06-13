<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tavar2p extends Model
{
    use HasFactory;
    public $fillable = ['tavarp_id','name'];
    public $timestamps = true;

    public function tavar()
    {
        return $this->belongsTo(Tavarp::class);
    }
}

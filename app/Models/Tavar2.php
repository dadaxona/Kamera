<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tavar2 extends Model
{
    use HasFactory;
    public $fillable = ['tavar_id','name'];
    public $timestamps = true;

    public function tavar()
    {
        return $this->belongsTo(Tavar::class);
    }
}

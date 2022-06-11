<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arxiv extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'itogs',
        'naqt',
        'plastik',
        'bank',
        'karzs',
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'title_short',
        'duration',
        'preview',
        'cover_small',
        'estado',
    ];
}

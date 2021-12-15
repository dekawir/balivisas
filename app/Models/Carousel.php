<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $table = 'carousel';
    protected $fillable = [
        'title',
        'status',
        'path',
        'created_by',
        'update_by',
    ];
}

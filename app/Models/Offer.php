<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    
    protected $fillable = [
        'title',
        'content',
        'price',
        'available'
    ];
    use HasFactory;
}

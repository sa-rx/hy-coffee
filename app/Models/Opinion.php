<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = [
        'name',
        'content'
    ];

     
    use HasFactory;
}

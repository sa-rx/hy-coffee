<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'content',
        'price',
        'offer_price',
        'calories',
        'available',
        'user_id',
        'category_id',
        'img_url'
    ]; 


    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }



    public function category(){
        return $this->belongsTo(Category::class);
    }

}

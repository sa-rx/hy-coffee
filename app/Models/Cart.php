<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items = [];
    public $totalQty ;
    public $totalPrice ;



    public function __Construct($cart = null){
        if($cart){
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }


    public function add($menu) {
        $item = [
            'name'=> $menu->name,
            'price'=> $menu->price,
            'qty'=> 0,
            'img_url'=> $menu->img_url,
        ];


        if(!array_key_exists($menu->id, $this->items)) {
            $this->items[$menu->id] = $item ;
            $this->totalQty +=1;
            $this->totalPrice += $menu->price;
        }else{
            $this->totalQty +=1;
            $this->totalPrice += $menu->price;
        }


        $this->items[$menu->id]['qty'] += 1 ;


    }

}

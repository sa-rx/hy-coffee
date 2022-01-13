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
            'id'=> $menu->id,
            'name'=> $menu->name,
            'price'=> $menu->price,
            'qty'=> 0,
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


    public function remove($menu){

        if(array_key_exists($menu, $this->items)){
            $this->totalQty -= $this->items[$menu]['qty'];
            $this->totalPrice -= $this->items[$menu]['qty'] * $this->items[$menu]['price'];
            unset($this->items[$menu]);
        }

    }

    public function updateQty($id, $qty) {
        
        //reset qty and price in the cart ,
        $this->totalQty -= $this->items[$id]['qty'] ;
        $this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['qty']   ;
        // add the item with new qty
        $this->items[$id]['qty'] = $qty;

        // total price and total qty in cart
        $this->totalQty += $qty ;
        $this->totalPrice += $this->items[$id]['price'] * $qty   ;

    }

}

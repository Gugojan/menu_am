<?php


namespace App;


class Cart
{
    public $items = null;
    private $total_qty =0;
    private $total_price =0;

    public function __construct($old_cart)
    {
        if (!empty($old_cart)) {
            $this->items = $old_cart->items;
            $this->total_qty = $old_cart->total_qty;
            $this->total_price = $old_cart->total_price;
        }
    }


    public function add($item, $id)
    {
        $store_item = [
            'qty'=>0,
            'price'=>$item->price,
            'product'=>$item
        ];
        if (!empty($this->items)){
            if (!array_key_exists($id,$this->items)){
                $this->items[$id] = $store_item;
            }
        }else{
            $this->items[$id] = $store_item;
        }
        $this->items[$id]['qty']++;
        $this->items[$id]['price']=$this->items[$id]['qty']*$item->price;
        $this->total_qty++;
        $this->total_price += $item->price;

    }
    public function getTotalQty(){
        return $this->total_qty;
    }
    public function getTotalPrice(){
        return $this->total_price;
    }
}

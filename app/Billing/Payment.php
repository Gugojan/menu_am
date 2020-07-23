<?php


namespace App\Billing;


class Payment
{
    private $currency = 'AMD';
    private $discount = 5;

    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    public function charge($amount){
    return[
        'amount'=>$amount - ($amount * $this->discount)/100,
        'currency'=>$this->currency,
        'discount'=>$this->discount,
    ];
}
    
public function setDiscount($discount){
        $this->discount=$discount;
}
}

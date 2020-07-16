<?php


namespace App\Sales;


use App\Billing\Payment;

class TopUsers
{
    private $payment;

public function __construct(Payment $payment)
{
    $this->payment= $payment;
}
public function chaneDiscount(){
    $this->payment->setDiscount(2);
}
}

<?php

class Order
{
    public $code;
    public $orderDate;
    public $status;
    public $shipDate;


    public function __construct($code, $orderDate, $shipDate, $status)
    {
        $this->code = $code;
        $this->orderDate = $orderDate;
        $this->status = $status;
        $this->shipDate = $shipDate;

    }
}

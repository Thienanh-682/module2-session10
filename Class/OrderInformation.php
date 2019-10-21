<?php
class OrderInformation
{
    public $productName;
    public $amount;
    public $intoMoney;
    public function __construct($productName, $amount, $intoMoney)
    {
        $this->productName = $productName;
        $this->amount = $amount;
        $this->intoMoney = $intoMoney;
    }
}
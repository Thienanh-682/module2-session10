
<?php
class Order
{
    public $orderNumber;
    public $orderDate;
    public $shippedDate;
    public $status;
    public $priceEach;
    public function __construct($orderNumber, $orderDate, $shippedDate, $status,$priceEach)
    {
        $this->orderNumber = $orderNumber;
        $this->orderDate = $orderDate;
        $this->shippedDate = $shippedDate;
        $this->status = $status;
        $this->priceEach = $priceEach;
    }
}
<?php
class CustomerInformation
{
    public $name;
    public $phone;
    public $orderDate;
    public $status;
    public function __construct($name, $phone, $orderDate,$status)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->orderDate = $orderDate;
        $this->status = $status;
    }
}
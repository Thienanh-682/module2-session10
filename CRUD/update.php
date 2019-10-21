<?php
include_once '../Class/OrderManager.php';
if ($_SERVER['REQUEST_METHOD']='POST'){
    $orderManager = new OrderManager();
}
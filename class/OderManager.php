<?php


class OderManager
{
    public $connect;

    public function __construct()
    {
        $db = new DBConnect("mysql:host=localhost;dbname=classicmodels","root","thieanh01");
        $this->connect = $db->connect();
    }

    public function getAll()
    {
        $sql =  'SELECT o.orderNumber AS \'orderNumber\', o.orderDate AS \'orderDate\',
                o.status AS \'status\', SUM(od.priceEach) AS \'totalPrice\' FROM orders o
                INNER JOIN orderdetails od
                ON o.orderNumber = od.orderNumber
                GROUP BY od.orderNumber ';
        $stmt = $this->connect->query($sql);
        $list = $stmt->fetchAll();
        $listOrder=[];
        foreach ($list as $item ) {
            $order = new Order($item["orderNumber"],$item["orderDate"],$item["status"],$item["totalPrice"]);
            array_push($listOrder,$order);
        }
        return $listOrder;
    }

}
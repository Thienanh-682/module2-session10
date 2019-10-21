<?php
include_once 'DBConnect.php';
include_once 'Order.php';
include_once 'CustomerInformation.php';
include_once 'OrderInformation.php';

class OrderManager
{
    protected $connect;
    public function __construct()
    {
        $db = new DBConnect('mysql:host=localhost;dbname=classicmodels', 'root', 'thieanh01');
        $this->connect = $db->connect();
    }
    public function getAllOrder()
    {
        $sql = 'SELECT o.orderNumber,o.orderDate,o.shippedDate,o.status,SUM(od.priceEach) AS priceEach
        FROM orders o
        JOIN orderdetails od on o.orderNumber = od.orderNumber
        GROUP BY o.orderNumber;';
        $stmt = $this->connect->query($sql);
        $list = $stmt->fetchAll();
        $orders = [];
        foreach ($list as $value) {
            $order = new Order($value['orderNumber'], $value['orderDate'], $value['shippedDate'], $value['status'], $value['priceEach']);
            array_push($orders, $order);
        }
        return $orders;
    }
    public function update($orderNumber, $status)
    {
        $stmt = $this->connect->prepare('UPDATE orders SET status=:status WHERE orderNumber=:orderNumber');
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':orderNumber', $orderNumber);
        $stmt->execute();
    }
    public function getCustomerInformationById($orderNumber)
    {
        $stmt = $this->connect->prepare('SELECT c.customerName AS customerName, c.phone AS phone , o.orderDate AS orderDate, o.status AS status
        FROM customers c
        JOIN orders o ON c.customerNumber= o.customerNumber
        WHERE orderNumber = :orderNumber;');
        $stmt->bindParam(':orderNumber', $orderNumber);
        $stmt->execute();
        $result = $stmt->fetch();
        $customerInformation = new CustomerInformation($result['customerName'], $result['phone'], $result['orderDate'],$result['status']);
        return $customerInformation;
    }
    public function getOrderById($orderNumber)
    {
        $stmt = $this->connect->prepare('SELECT p.productName AS productName, COUNT(p.productCode) AS amount , SUM(od.priceEach) AS intoMoney
        FROM products p
        JOIN orderdetails od
        ON p.productCode = od.productCode
        WHERE od.orderNumber= :orderNumber
        GROUP BY p.productName');
        $stmt->bindParam(':orderNumber',$orderNumber);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $orderInformations = [];
        foreach ($result as $value){
            $orderInformation = new OrderInformation($value['productName'],$value['amount'],$value['intoMoney']);
            array_push($orderInformations,$orderInformation);
        }
        return $orderInformations;
    }
}
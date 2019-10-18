<?php

include_once "class/DBConnect.php";
include_once "class/Order.php";
include_once "class/OderManager.php";

$managerOrder = new OderManager();
$orders = $managerOrder->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, td {
            border: 1px solid black;
        }
        td {
            width: 150px;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
<center>
<h1 style="font-size: 40px">Danh sách đơn hàng</h1>
<table>
    <tr>
        <td>STT</td>
        <td>Mã đơn hàng</td>
        <td>Ngày đặt</td>
        <td>Trạng Thái</td>
        <td>Tổng Tiền</td>
    </tr>
    <?php foreach ($orders as $key => $order): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><a href="order_detail.php?id=<?php echo $order->code ?>"><?php echo $order->code ?></a></td>
            <td><?php echo $order->orderDate ?></td>
            <td><?php echo $order->shipDate ?></td>
            <td><?php echo $order->status ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</center>
</body>
</html>
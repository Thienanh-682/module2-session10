<?php

include_once "Class/OrderManager.php";

$orderManager = new OrderManager();
$listOrder = $orderManager->getAllOrder();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        h1 {
            text-align: center
        }
    </style>
</head>
<body>
<h1>List Order</h1>
<table width="100%">
    <tr>
        <td><h3>STT</h3></td>
        <td><h3>Order Number</h3></td>
        <td><h3>Order Date</h3></td>
        <td><h3>Shipped Date</h3></td>
        <td><h3>Status</h3></td>
        <td><h3>Price Each</h3></td>
    </tr>
    <?php foreach ($listOrder as $key => $value): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><a href="orderDetail.php?id=<?php echo $value->orderNumber ?>"><?php echo 'DH'.$value->orderNumber ?></a></td>
            <td><?php echo $value->orderDate ?></td>
            <td><?php echo $value->shippedDate ?></td>
            <td><?php echo $value->status ?></td>
            <td><?php echo $value->priceEach ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
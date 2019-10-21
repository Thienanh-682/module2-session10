<?php
include_once 'Class/OrderManager.php';
$orderManager = new OrderManager();
$id = $_GET['id'];
$customerInformation = $orderManager->getCustomerInformationById($id);
$customerName = $customerInformation->name;
$phone = $customerInformation->phone;
$orderDate = $customerInformation->orderDate;
$status = $customerInformation->status;
$orderInformation = $orderManager->getOrderById($id);
if (isset($_POST['status'])){
    $updateStatus = $_POST['status'];
    $orderManager->update($id,$updateStatus);
    header("Location:orderDetail.php?id=$id");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <td>Customer Name: </td>
        <td><?php echo $customerName ?></td>
    </tr>
    <tr>
        <td>Phone: </td>
        <td><?php echo $phone ?></td>
    </tr>
    <tr>
        <td>Order date: </td>
        <td><?php echo $orderDate ?></td>
    </tr>
    <tr>
</table>
<label>Tinh trang: </label>
<form method="post">
    <select name="status">
        <option vualue="Shipped" <?php echo ($status == 'Shipped') ? "selected" : '' ?>>Shipped</option>
        <option vualue="Cancelled" <?php echo ($status == 'Cancelled') ? "selected" : '' ?>>Cancelled</option>
        <option vualue="Resolved" <?php echo ($status == 'Resolved') ? "selected" : '' ?>>Resolved</option>
        <option vualue="On Hold" <?php echo ($status == 'On Hold') ? "selected" : '' ?>>On Hold</option>
        <option vualue="Disputed" <?php echo ($status == 'Disputed') ? "selected" : '' ?>>Disputed</option>
        <option vualue="In Process" <?php echo ($status == 'In Process') ? "selected" : '' ?>>In Process</option>
    </select>
    <button type="submit">Update</button>
</form>
<br>
<h2>Detail order</h2>
<br>
<table border="1" width="100%">
    <tr>
        <td>STT</td>
        <td>Product name</td>
        <td>Amount</td>
        <td>Into money</td>
    </tr>
    <?php foreach ($orderInformation as $key => $value): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $value->productName ?></td>
            <td><?php echo $value->amount ?></td>
            <td><?php echo $value->intoMoney ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
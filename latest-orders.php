<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="latest-orders.php" method="get">
        <input type="number" name="num">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    session_start();
    if (isset($_GET['submit'])) {
        $num = $_GET['num'];
        $conn = mysqli_connect("localhost", "root", "", "route_1");
        $query = "SELECT * from orders
        ORDER by orderNumber DESC
        LIMIT $num";
        $result = mysqli_query($conn, $query);
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['customers']=$customers;

    }

    ?>
    <?php
    if (isset($_GET['submit'])) {
    ?>
    <table border="2">
    <thead>
    <tr>
    <th>orderNumber</th>
    <th>orderDate</th>
    <th>requiredDate</th>
    <th>customerNumber</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($_SESSION['customers'] as $customer)
        { ?>
        <tr>
        <td><?php echo $customer['orderNumber']?></td>
        <td><?php echo $customer['orderDate']?></td>
        <td><?php  echo $customer['requiredDate']?></td>
        <td><?php  echo $customer['customerNumber']?></td>
    
        </tr>
        <?php } ?>
    </tbody>
    </table>
<?php }?>
</body>

</html>

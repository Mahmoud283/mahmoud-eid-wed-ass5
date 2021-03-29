<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="show-order-api.php" method="get">
        <input type="number" name="order_number">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    if (isset($_GET['submit'])) {
        $order_number = $_GET['order_number'];
        $conn = mysqli_connect("localhost", "root", "", "route_1");
        $query = "SELECT * from orders 
        where orderNumber=$order_number";
        $result = mysqli_query($conn, $query);
        $order = mysqli_fetch_all($result, MYSQLI_ASSOC);

        header("Content-Type:Application/json");
        echo json_encode($order);

    }

    ?>
    
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="product-quantity-ordered.php" method="get">
        <input type="text" name="product_name">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    session_start();
    if (isset($_GET['submit'])) {
        $product_name = $_GET['product_name'];
        $conn = mysqli_connect("localhost", "root", "", "route_1");
        $query = "SELECT products.productName,sum(quantityOrdered) from products JOIN orderdetails
        on orderdetails.productCode=products.productCode
        WHERE productName='$product_name'
        GROUP BY products.productName";
        $result = mysqli_query($conn, $query);
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['product']=$customers;

    }

    ?>
    
<?php
    if (isset($_GET['submit'])) {
    ?>
    <table border="2">
    <thead>
    <tr>
    <th>productName</th>
    <th>productpecies</th>
   
    </tr> 
    </thead>
    <tbody>
        <?php foreach($_SESSION['product'] as $customer)
        { ?>
        <tr>
        <td><?php echo $customer['productName']?></td>
        <td><?php echo $customer['sum(quantityOrdered)']?></td>
      
        </tr>
        <?php } ?>
    </tbody>
    </table>
<?php }?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="search-customers.php" method="get">
        <input type="text" name="search_keyword">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    session_start();
    if (isset($_GET['submit'])) {
        $search_keyword = $_GET['search_keyword'];
        $conn = mysqli_connect("localhost", "root", "", "route_1");
        $query = "SELECT * from customers 
        where customerName like '%$search_keyword%'";
        $result = mysqli_query($conn, $query);
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['names']=$customers;

    }

    ?>
    
<?php
    if (isset($_GET['submit'])) {
    ?>
    <table border="2">
    <thead>
    <tr>
    <th>CustomerName</th>
    <th>CustomerCountry</th>
    <th>Customerphone</th>
   
    </tr> 
    </thead>
    <tbody>
        <?php foreach($_SESSION['names'] as $customer)
        { ?>
        <tr>
        <td><?php echo $customer['customerName']?></td>
        <td><?php echo $customer['country']?></td>
        <td><?php echo $customer['phone']?></td>
      
        </tr>
        <?php } ?>
    </tbody>
    </table>
<?php }?>
</body>

</html>

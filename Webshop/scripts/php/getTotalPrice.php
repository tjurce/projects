<?php
    include "dbConnection.php";

    
    $ip = $_SESSION['ip'];
    $pro_id = array();

    $check_query = "select * from carts where IPAddress = '$ip'";
    $run_check_query = mysqli_query($conn, $check_query);

    while($rows = mysqli_fetch_array($run_check_query)) {
        $pro_id[] = $rows['ProductID'];
    }

    $i = 0;
    $totalPrice = 0;


    while($i <= count($pro_id)-1) {
        $query = "select * from products where ProductID = '$pro_id[$i]'";
        $run_query = mysqli_query($conn, $query);
        $i++;
        

        while($rows = mysqli_fetch_array($run_query)) {
            $price = $rows['ProductPrice'];
            $totalPrice += $price;
        }
    }
?>
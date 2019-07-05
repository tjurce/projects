<?php
    header('Content-Type: application/json');

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "webshop");
    $customer_email = $_SESSION['customer_email'];
    $output = array();

    $get_user = "select * from customers where CustomerEmail = '$customer_email'";
    $run_query = mysqli_query($conn, $get_user);
    
    while($rows = mysqli_fetch_assoc($run_query)) {
        $customer_id = $rows['CustomerID'];
    }

    $get_orders = "select * from orders where CustomerID = '$customer_id'";
    $run_orders = mysqli_query($conn, $get_orders);
    while($rows = mysqli_fetch_array($run_orders)) {
        $product_id[] = $rows['ProductID'];
    }

    $i = 0;

    while($i <= count($product_id)-1) {
        $get_products = "select * from products where ProductID = '$product_id[$i]'";
        $run_products = mysqli_query($conn, $get_products);
        $i++;

        while($rows = mysqli_fetch_array($run_products)) {
            $output[] = $rows;
        }
    }


    echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
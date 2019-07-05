<?php
    header('Content-Type: application/json');

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "webshop");
    $customer_email = $_SESSION['customer_email'];
    $output = array();

    $get_user = "select * from customers where CustomerEmail = '$customer_email'";
    $run_query = mysqli_query($conn, $get_user);

    while($rows = mysqli_fetch_array($run_query)) {
        $output[] = $rows;
    }
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
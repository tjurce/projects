<?php
    session_start();
    include "dbConnection.php";
    
    $id = $_SESSION['cat_id'];

    header('Content-Type: application/json');
    $output = array();

    $query = "select * from products where ProductCat = '$id'";
    $run_query = mysqli_query($conn, $query);

    while($rows = mysqli_fetch_array($run_query)) {
        $output[] = $rows;
    }
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
 ?>  
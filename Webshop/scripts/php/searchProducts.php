<?php
    session_start();
    include "dbConnection.php";
    
    header('Content-Type: application/json');
    
    $search = $_SESSION['search'];
    $output = array(); 

    $query = "select * from products where lower(ProductKeys) like lower(".'"'.'%'.$search.'%'.'")';
    $run_query = mysqli_query($conn, $query);

    while($rows = mysqli_fetch_array($run_query)) {
        $output[] = $rows;
    }
    echo json_encode($output, JSON_UNESCAPED_UNICODE);


   $query = "select * from products where ProductKeys like ".'"'.'%'.$search.'%'.'"';
?>
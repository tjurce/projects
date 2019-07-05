<?php
    include "dbConnection.php";
    include "../../details.php";
    
    header('Content-Type: application/json');

    $output = array();

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
 ?>  
<?php
    include "../../../scripts/php/dbConnection.php";
    include "../../../scripts/php/getIP.php";

    session_start();

    if(isset($_POST['deleteProfile'])) {
        $customer_id = $_POST['id'];

        $update_query = "delete from Customers where CustomerID = '$customer_id'";

        $run_query = mysqli_query($conn, $update_query) or die(mysqli_error($conn));
        
        session_destroy();

        header("location: ../../my_account.php");
    }
?>
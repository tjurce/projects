<?php
    include "../../../scripts/php/dbConnection.php";
    include "../../../scripts/php/getIP.php";

    session_start();

    if(isset($_POST['updateProfile'])) {
        $customer_id = $_POST['id'];
        $customer_fname = $_POST['first_name'];
        $customer_lname = $_POST['last_name'];
        $customer_country = $_POST['country'];
        $customer_city = $_POST['city'];
        $customer_address = $_POST['address'];

        $update_query = "update customers set CustomerFirstName = '$customer_fname', CustomerLastName = '$customer_lname', CustomerCountry = '$customer_country', CustomerCity = '$customer_city', CustomerAddress = '$customer_address' where CustomerID = '$customer_id'";

        $run_query = mysqli_query($conn, $update_query) or die(mysqli_error($conn));
        
        header("location: ../../my_account.php");
    }
?>
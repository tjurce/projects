<?php
    include "../../../scripts/php/dbConnection.php";
    include "../../../scripts/php/getIP.php";

    session_start();

    if(isset($_POST['updateProfile'])) {
        $customer_id = $_POST['id'];
        $customer_oldPass = md5($_POST['old_password']);
        $customer_newPass = md5($_POST['new_password']);
        $customer_confirmNewPass = md5($_POST['confirm_new_password']);

        $check_query = "select * from customers where CustomerID = '$customer_id'";

        $run_check_query = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($run_check_query) > 0) {
            $row = mysqli_fetch_assoc($run_check_query);
            $getOldPass = $row['CustomerPassword'];

            if($getOldPass == $customer_oldPass) {
                if($customer_newPass == $customer_confirmNewPass) {
                    $update_query = "update customers set CustomerPassword = '$customer_newPass' where CustomerID = '$customer_id'";

                    $run_query = mysqli_query($conn, $update_query) or die(mysqli_error($conn));
                    
                    header("location: ../../my_account.php");
                }
            }
        }
    }
?>
<?php
    include "../../scripts/php/dbConnection.php";
    include "../../scripts/php/getIP.php";

    session_start();

    if(isset($_POST['login'])) {
        $customer_email = $_POST['email'];
        $customer_password = md5($_POST['password']);

        $query = "select * from customers where CustomerEmail = '$customer_email' and CustomerPassword = '$customer_password'";

        $run_query = mysqli_query($conn, $query);

        $check_query = mysqli_num_rows($run_query);

        if($check_query == 0) {
            echo "<script>window.open('../../sign_in.php', '_self')</script>";
            exit();
        }

        $ip = getIP();

        $select_cart = "select * from carts where IPAddress = '$ip'";

        $run_cart = mysqli_query($conn, $select_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if($check_query > 0 && $check_cart == 0) {
            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('Uspješno ste se prijavili!')</script>";
            echo "<script>window.open('../../customer/my_account.php', '_self')</script>";
        }
        else {
            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('Uspješno ste se prijavili!')</script>";
            echo "<script>window.open('../../checkout.php', '_self')</script>";
        }
    }
?>
<?php
    include "dbConnection.php";
    include "getIP.php";

    session_start();

    if(isset($_POST['register'])) {
        $customer_ip = getIP();
        $customer_username = $_POST['username'];
        $customer_password = md5($_POST['password']);
        $customer_email = $_POST['email'];
        $customer_fname = $_POST['first_name'];
        $customer_lname = $_POST['last_name'];
        $customer_country = $_POST['country'];
        $customer_city = $_POST['city'];
        $customer_address = $_POST['address'];

        $insert_query = "insert into customers (CustomerIp, CustomerFirstName, CustomerLastName, CustomerUsername, CustomerEmail, CustomerPassword, CustomerCountry, CustomerCity, CustomerAddress) values ('$customer_ip', '$customer_fname', '$customer_lname', '$customer_username', '$customer_email', '$customer_password', '$customer_country', '$customer_city', '$customer_address')";

        $run_query = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));

        $select_cart = "select * from carts where IPAddress = '$customer_ip'";

        $run_cart = mysqli_query($conn, $select_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart == 0) {
            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('Uspješno ste se registrirali. Hvala!')</script>";
            echo "<script>window.open('../../customer/my_account.php','_self')</script>";
        }

        else {
            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('Uspješno ste se registrirali. Hvala!')</script>";
            echo "<script>window.open('../../checkout.php','_self')</script>";
        }
    }
?>

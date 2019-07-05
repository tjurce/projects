<!DOCTYPE html>

<?php
    include "../scripts/php/dbConnection.php";
    include "../scripts/php/getIP.php";

    session_start();


    if(isset($_GET['submit_query'])) {
        $_SESSION['search'] = $_GET['search_query'];
        echo $_SESSION['search'];
    }

    $_SESSION['ip'] = getIP();

    $ip = getIP();

    $check_query = "select * from carts where IPAddress = '$ip'";
    $run_check_query = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($run_check_query) > 0) {
        while($rows = mysqli_fetch_assoc($run_check_query)) {
            $num = 0;
            $nums[] = $rows['Quantity'];
            for($i = 0; $i < count($nums); $i++) {
                $num += $nums[$i];
            }
        }
    }

?> 

<html ng-app="webShopApp">

<head>
    <meta charset="UTF-8">
    <title>Web Shop</title>

    <!-- Bootstrap i AngularJS CDN-ovi -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <link rel="stylesheet" type="text/css" href="styles\style.css">
    <link rel="stylesheet" type="text/css" href="styles\contact.css">
</head>

<body>
    <div class="menu_bar">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                <span class="welcome">
                    <?php
                        if(isset($_SESSION['customer_email'])) {
                            echo "<h3>Dobrodošao " . "<a href='my_account.php'>" . $_SESSION['customer_email'] . "!</h3>" . "</a>";
                        }
                    ?>
                </span>
            </div>
            <div class="col-lg-10 col-sm-12">
                <ul class="menu">
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='../sign_in.php'>Prijavi se</a>";
                            }
                            else {
                                echo "<a href='../logout.php'>Odjavi se</a>";
                            }
                        ?>
                    </li>
                    <p>&nbsp&nbsp|&nbsp&nbsp</p>
                    <li>
                        <a href="contact.php">Kontakt</a>
                    </li>
                </ul>
            </div>  
        </div>
    </div>

    <div class="navbar col-lg-12 col-sm-12">
        <ul class="nav">
            <li>
                <a href="../index.php">Povratak na početnu stranicu</a>
            </li>
        </ul>
    </div>

    <div class="header">
        <h1>Moj profil</h1>
    </div>

    <div class="wrapper row">
        <ul class="col-lg-12">
            <li><a href="my_account.php?my_orders">Moje narudžbe</a></li>
            <li><a href="my_account.php?edit_profile">Uredi profil</a></li>
            <li><a href="my_account.php?change_password">Promjeni šifru</a></li>
            <li><a href="my_account.php?delete_account">Izbriši račun</a></li>
        </ul>
    </div>

    <?php
        if(!isset($_GET['my_orders'])) {
            if(!isset($_GET['edit_profile'])) {
                if(!isset($_GET['change_password'])) {
                    if(!isset($_GET['delete_account'])) {
                        include "main_profile.php";
                    }
                }
            }
        }

        if(isset($_GET['my_orders'])) {
            include "my_orders.php";
        }

        if(isset($_GET['edit_profile'])) {
            include "edit_profile.php";
        }

        if(isset($_GET['change_password'])) {
            include "change_password.php";
        }

        if(isset($_GET['delete_account'])) {
            include "delete_account.php";
        }
    ?>

    <div class="footer">&copy 2018 All rights reserved</div>

    <script src="../scripts/js/app.js"></script>
    <script src="scripts/js/customer_Controller.js"></script>
</body>

</html>
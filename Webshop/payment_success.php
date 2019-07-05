<!DOCTYPE html>

<?php
    include "scripts/php/dbConnection.php";
    include "scripts/php/getIP.php";

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

    $ip = $_SESSION['ip'];
    $pro_id = array();

    $check_query = "select * from carts where IPAddress = '$ip'";
    $run_check_query = mysqli_query($conn, $check_query);

    while($rows = mysqli_fetch_array($run_check_query)) {
        $pro_id[] = $rows['ProductID'];
        $p_quantity[] = $rows['Quantity'];
    }

    $i = 0;
    $total_Price = 0;
    $total_eu_price = 0;

    while($i <= count($pro_id)-1) {
        $query = "select * from products where ProductID = '$pro_id[$i]'";
        $run_query = mysqli_query($conn, $query);
        $i++;
        

        while($rows = mysqli_fetch_assoc($run_query)) {
            $proID = $rows['ProductID'];
            $proName = $rows['ProductName'];
            $proPrice = $rows['ProductPrice'];
            $proDesc = $rows['ProductDesc'];
            $proImage = $rows['ProductImage'];
            
            $values = $proPrice*$p_quantity[$i-1];
            $total_Price += $values;
        }
    }
    $total_eu_price = $total_Price*0.13;
    $total_eu_price_format = round($total_eu_price, 2);
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
                            echo "<h3>Dobrodošao " . "<a href='customer/my_account.php'>" . $_SESSION['customer_email'] . "!</h3>" . "</a>";
                        }
                    ?>
                </span>
            </div>
            <div class="col-lg-8 col-sm-12">
                <ul class="menu">
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='sign_in.php'>Prijavi se</a>";
                            }
                            else {
                                echo "<a href='logout.php'>Odjavi se</a>";
                            }
                        ?>                    </li>
                    <p>&nbsp&nbsp|&nbsp&nbsp</p>
                    <li>
                        <a href="contact.php">Kontakt</a>
                    </li>
                    <p>&nbsp&nbsp|&nbsp&nbsp</p>
                    <li>
                    <li>
                        <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                        <?php echo $num ?>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-12">
                <div id="form">
                    <form action="search.php" method="GET" enctype="multipart/form-data">
                        <input type="text" name="search_query" placeholder="Pronađi proizvod...">
                        <input class="btn btn-primary" type="submit" name="submit_query" value="Search">
                    </form>
                </div>
            </div>  
        </div>
    </div>

    <div class="navbar col-lg-12 col-sm-12" ng-controller="cat_brand_Controller">
        <ul class="nav">
            <li>
                <a href="index.php">Početna</a>
            </li>
            <li>
                <a href="all_products.php">Svi Proizvodi</a>
            </li>
            <li>
                <div class="dropdown">
                    <div class="dropbtn">Kategorije<i class="fa fa-caret-down"></i></div>
                    <div class="dropdown-content">
                        <a ng-repeat="cat in categories" href="categories.php?cat_id={{cat.CatID}}">{{cat.CatName}}</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <div class="dropbtn">Proizvođači<i class="fa fa-caret-down"></i></div>
                    <div class="dropdown-content">
                        <a ng-repeat="brand in brands" href="brands.php?brand_id={{brand.BrandID}}">{{brand.BrandName}}</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="header">
        <h1>Kupovina je uspješno dovršena</h1>
    </div>

    <div class="col-lg-12">
        <div>
        <?php
            echo $totalPrice;
            $customerEmail = $_SESSION['customer_email'];

            $c_query = "select * from customers where CustomerEmail = '$customerEmail'";
            $run_c_query = mysqli_query($conn, $c_query);
            $new_c_rows = mysqli_fetch_assoc($run_c_query);
            $customerID = $new_c_rows['CustomerID'];
            $customerFName = $new_c_rows['CustomerFirstName'];
            $customerLName = $new_c_rows['CustomerLastName'];
            $customerAddress = $new_c_rows['CustomerAddress'];
            $customerCity = $new_c_rows['CustomerCity'];
            $customerCountry = $new_c_rows['CustomerCountry'];
                            
                            
            $amount = $_GET['amt'];
            $currency = $_GET['cc'];
            $transactionID = $_GET['tx'];


            if($amount == $total_eu_price_format) {
                $j = 0;
                for($j = 0; $j < $i; $j++) {
                    $query = "select * from products where ProductID = '$pro_id[$j]'";
                    $run_query = mysqli_query($conn, $query);
                    while($rows = mysqli_fetch_array($run_query)) {
                        $new_query = "select * from carts where IPAddress = '$ip' AND ProductID = '$pro_id[$j]'";
                        $run_new_query = mysqli_query($conn, $new_query);
                        $new_rows = mysqli_fetch_assoc($run_new_query);
                        $proQty = $new_rows['Quantity'];
        
                        $proID = $rows['ProductID'];
                        $proName = $rows['ProductName'];
                        $proPrice = $rows['ProductPrice'];
                        $proDesc = $rows['ProductDesc'];
                        $proImage = $rows['ProductImage'];

                        $proNameMail[] = $rows['ProductName'];
                    }
                    echo  '<div class="cart_wrapper">
                        <div>
                            <div class="row custom_cart">
                                <div class="col-lg-8">
                                    <h2>' . $proName . '</h2>
                                </div>
                                <div class="col-lg-2">
                                    <p>' . $proQty . '</p>
                                </div>
                                <div class="col-lg-2">
                                    <p>' . $proPrice . ' kn</p>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                echo '<div class="totalPrice">
                        Ukupno: ' . $total_Price . ' kn
                        </div>';

                $check_query_2 = "select * from carts where IPAddress = '$ip'";
                $run_check_query_2 = mysqli_query($conn, $check_query_2);
                    
                while($rows_2 = mysqli_fetch_array($run_check_query_2)) {
                    $pro_id_2[] = $rows_2['ProductID'];
                    $qty_2 [] = $rows_2['Quantity'];
                }

                $proNameMailResult = implode(", ", $proNameMail);

                $p_id_result = implode(", ", $pro_id_2);
                $p_qty_result = implode(", ", $qty_2);

                for ($t = 0; $t < 10; $t++) {
                    $invoice_num .= mt_rand(0, 9);
                }

                $insert_orders = "insert into orders (ProductID, CustomerID, Quantity, OrderDate) values ('$p_id_result', '$customerID', '$p_qty_result', NOW())";
                $run_orders = mysqli_query($conn, $insert_orders);
                
                $orders_query = "select * from orders order by OrderID DESC LIMIT 1";
                $orders_run = mysqli_query($conn, $orders_query);
                while($result = mysqli_fetch_assoc($orders_run)) {
                    $orderID = $result['OrderID'];
                }

                $insert_payments = "insert into payments (Amount, OrderID, CustomerID, ProductID, TrxID, Currency, PaymentDate, InvoiceNumber) values ('$amount', '$orderID', '$customerID', '$p_id_result', '$transactionID', '$currency', NOW(), '$invoice_num')";
                $run_payments = mysqli_query($conn, $insert_payments);

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers = "From: tomi.jurcevic@hotmail.com" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $subject = "Detalji narudžbe";

                $message = '<html>
                <head>
                </head>
                <div class="cart_wrapper">
                        <div>
                            <div>
                                <div">
                                    <p>Broj računa: ' . $invoice_num . '</p>
                                    <h4>' . $proNameMailResult . '</h4>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <h2>Ukupno: '. $total_Price . ' kn<h2>
                    <h3>Hvala na kupnji!</h3>
                </html>';

                mail($customerEmail, $subject, $message, $headers);

                $empty_cart = "delete from carts";
                $run_empty_cart = mysqli_query($conn, $empty_cart);
            }
            else {
                echo "<h3>Neuspješna kupovina!</h3>";
            }
        ?>
        </div>
    </div>

    <div class="footer">&copy 2018 All rights reserved</div>

    <script src="scripts/js/app.js"></script>
    <script src="scripts/js/cat_brand_Controller.js"></script>
    <script src="scripts/js/products_Controller.js"></script>
    <script src="scripts/js/slide_Controller.js"></script>
</body>

</html>
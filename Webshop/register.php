<!DOCTYPE html>

<?php
    include "scripts/php/dbConnection.php";
    include "scripts/php/getIP.php";
    include "scripts/php/removeFromCart.php";

    session_start();


    if(isset($_GET['submit_query'])) {
        $_SESSION['search'] = $_GET['search_query'];
    }

    $_SESSION['ip'] = getIP();

    $ip = getIP();
    global $totalPrice;
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
                        <a href="checkout.php"><i class="fa fa-shopping-cart"></i></a>
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
        <h1>Registracija</h1>
    </div>

    <div class="col-lg-12">
        <div>
            <div>
                <h3>Registrirajte se!</h3>
            </div>
            <div class="form-contact">
                <form action="scripts/php/registration_form.php" method="post">
                    <input id="contact-inputA" type="text" name="username" placeholder="Korisničko ime..." required><br>
                    <input id="contact-inputB" type="password" name="password" placeholder="Lozinka" required><br>
                    <input id="contact-inputB" type="email" name="email" placeholder="E-mail..." required><br>
                    <input id="contact-inputB" type="text" name="first_name" placeholder="Ime..." required><br>
                    <input id="contact-inputB" type="text" name="last_name" placeholder="Prezime..." required><br>
                    <input id="contact-inputB" type="text" name="country" placeholder="Država..." required><br>
                    <input id="contact-inputB" type="text" name="city" placeholder="Grad..." required><br>
                    <input id="contact-inputB" type="text" name="address" placeholder="Adresa..." required><br>
                    <button class="btn btn-primary contact-button" type="submit" name="register">Registrirajte se</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">&copy 2018 All rights reserved</div>

    <script src="scripts/js/app.js"></script>
    <script src="scripts/js/cat_brand_Controller.js"></script>
    <script src="scripts/js/products_Controller.js"></script>
    <script src="scripts/js/slide_Controller.js"></script>
</body>

</html>
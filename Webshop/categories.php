<!DOCTYPE html>

<?php
    include "scripts/php/getIP.php";

    session_start();
    $_SESSION['cat_id'] = $_GET['cat_id'];
    $id = $_SESSION['cat_id'];

    if(isset($_GET['submit_query'])) {
        $_SESSION['search'] = $_GET['search_query'];
        echo $_SESSION['search'];
    }

    include "scripts/php/dbConnection.php";
    global $catID;

    $query = "select * from categories where catID = '$id'";
    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query) > 0) {
        while($row = mysqli_fetch_assoc($run_query)) {
            $catID = $row["CatName"];
        }
    }

    $_SESSION['ip'] = getIP();

    $ip = getIP();

?>  

<html ng-app="webShopApp">

<head>
    <meta charset="UTF-8">
    <title>Web Shop</title>

    <!-- Bootstrap and AngularJS CDNs -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <link rel="stylesheet" type="text/css" href="styles\style.css">
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
        <h1><?php echo $catID ?></h1>
    </div>

    <div class="main_wrapper">
        <div class="row" ng-controller="products_Controller">
            <div class="col-lg-4" ng-repeat="p in catProducts">
                <div class="well content">
                    <div class="row">
                        <div class="col-lg-12 img-pro">
                            <a href="details.php?pro_id={{p.ProductID}}">
                                <img ng-src="admin/images/product_images/{{p.ProductImage}}" alt="product_image" width="350px" height="350px">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 data-pro">
                            <a href="details.php?pro_id={{p.ProductID}}">
                                <h4>{{p.ProductName}}</h4>
                            </a>
                            <p>
                                {{p.ProductPrice}} kn
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">&copy 2018 All rights reserved</div>

    <script src="scripts/js/app.js"></script>
    <script src="scripts/js/cat_brand_Controller.js"></script>
    <script src="scripts/js/products_Controller.js"></script>
</body>

</html>
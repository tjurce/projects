<!DOCTYPE html>

<?php
    include "../scripts/php/dbConnection.php";
    include "../scripts/php/getIP.php";

    session_start();

    if(!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php?not_admin= You are not an Admin', '_self')</script>";
    }
    else {

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

        <link rel="stylesheet" type="text/css" href="styles\add_product.css">
    </head>

    <body ng-controller="cat_brand_ControllerAdmin">
        <div class="menu_bar">
            <div class="row">
                <div class="col-lg-2 col-sm-12">
                    <span class="welcome">
                        <a href="logout.php">Odjavi se</a>
                    </span>
                </div>
            </div>
        </div>

        <div class="navbar col-lg-12 col-sm-12" ng-controller="cat_brand_ControllerAdmin">
            <ul class="nav">
                <li>
                    <a href="admin.php">Početna</a>
                </li>
                <li>
                    <div class="dropdown">
                        <div class="dropbtn">Proizvodi<i class="fa fa-caret-down"></i></div>
                        <div class="dropdown-content">
                            <a href="add_product.php">Dodaj proizvod</a>
                            <a href="delete_product.php">Izbriši proizvod</a>
                            <a href="view_products.php">Pregledaj proizvode</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <div class="dropbtn">Kategorije<i class="fa fa-caret-down"></i></div>
                        <div class="dropdown-content">
                            <a href="add_category.php">Dodaj kategoriju</a>
                            <a href="delete_category.php">Izbriši kategoriju</a>
                            <a href="view_categories.php">Pregledaj kateogrije</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <div class="dropbtn">Proizvođači<i class="fa fa-caret-down"></i></div>
                        <div class="dropdown-content">
                            <a href="add_brand.php">Dodaj proizvođača</a>
                            <a href="delete_brand.php">Izbriši proizvođača</a>
                            <a href="view_brands.php">Pregledaj proizvođače</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="view_users.php">Pregledaj korisnike</a>
                </li>
                <li>
                    <a href="view_orders.php">Pregledaj narudžbe</a>
                </li>
                <li>
                    <a href="view_payments.php">Pregledaj uplate</a>
                </li>
            </ul>
        </div>

        <div class="header">
            Administrator
        </div>
        
        <div class="col-lg-12 table">
            <form action="scripts/php/insert_product.php" method="post" enctype="multipart/form-data">
                    
                <table align="center" width="800px">
                        <tr align="center">
                            <th colspan="2">DODAJ NOVI PROIZVOD</th>
                        </tr>

                        <tr>
                            <th>Ime proizvoda:</th>
                            <td align="center"><input type="text" name="product_name" required></td>
                        </tr>

                        <tr>
                            <th>Kategorija:</th>
                            <td align="center">
                                <select name="product_cat">
                                    <option>Odaberi kategoriju</option>
                                    <option ng-repeat="cat in categories" value={{cat.CatID}} required>{{cat.CatName}}</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Proizvođač:</th>
                            <td align="center">
                                <select name="product_brand">
                                    <option>Odaberi proizvođača</option>
                                    <option ng-repeat="brand in brands" value={{brand.BrandID}} required>{{brand.BrandName}}</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Cijena:</th>
                            <td align="center"><input type="text" name="product_price" required></td>
                        </tr>

                        <tr>
                            <th>Slika:</th>
                            <td align="center"><input type="file" name="product_image" required></td>
                        </tr>

                        <tr>
                            <th>Opis proizvoda:</th>
                            <td align="center"><textarea name="product_desc" cols="54" rows="5"></textarea></td>
                        </tr>

                        <tr>
                            <th>Ključne riječi:</th>
                            <td align="center"><input type="text" name="product_keys" required></td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2"><input type="submit" name="insert_product" value="Dodaj proizvod"></td>
                        </tr>
                </table>
                    
            </form>
        </div>

        <div class="footer">&copy 2018 All rights reserved</div>
        
        <script src="scripts/js/app.js"></script>
        <script src="scripts/js/cat_brand_ControllerAdmin.js"></script>
    </body>
</html>

<?php } ?>
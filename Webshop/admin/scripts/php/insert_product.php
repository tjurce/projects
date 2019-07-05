<?php
    $conn = mysqli_connect("localhost", "root", "", "webshop");

    if(isset($_POST['insert_product'])) {
        $productName = $_POST['product_name'];
        $productCat = $_POST['product_cat'];
        $productBrand = $_POST['product_brand'];
        $productPrice = $_POST['product_price'];
        $productDesc = $_POST['product_desc'];
        $productKeys = $_POST['product_keys'];
        
        $productImage = $_FILES['product_image']['name'];
        $productImageTemp = $_FILES['product_image']['tmp_name'];


        move_uploaded_file($productImageTemp, "../../images/product_images/$productImage");

        $query = "insert into products (ProductName, ProductCat, ProductBrand, ProductPrice, ProductDesc, ProductKeys, ProductImage) values ('$productName', '$productCat', '$productBrand', '$productPrice', '$productDesc', '$productKeys', '$productImage')";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($run_query) {
            echo "<script>alert('Proizvod je dodan!');</script>";
            echo "<script>window.open('../../add_product.php','_self');</script>";
        }

    }
?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "webshop");

    if(isset($_POST['insert_brand'])) {
        $brandName = $_POST['brand_name'];

        $query = "insert into brands (BrandName) values ('$brandName')";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($run_query) {
            echo "<script>alert('Proizvođač je dodan!');</script>";
            echo "<script>window.open('../../add_brand.php','_self');</script>";
        }

    }
?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "webshop");

    if(isset($_POST['insert_cat'])) {
        $catName = $_POST['cat_name'];

        $query = "insert into categories (CatName) values ('$catName')";

        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if($run_query) {
            echo "<script>alert('Kategorija je dodana!');</script>";
            echo "<script>window.open('../../add_category.php','_self');</script>";
        }

    }
?>
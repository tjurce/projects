<?php
    function deleteBrand() {
        include "dbConnection.php";
        
        $remove = $_SESSION['remove'];

        $query = "delete from brands where BrandID = '$remove'";
        mysqli_query($conn, $query);

        header("location: delete_brand.php");
    }
?>
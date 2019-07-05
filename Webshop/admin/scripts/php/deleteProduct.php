<?php
    function deleteProduct() {
        include "dbConnection.php";
        
        $remove = $_SESSION['remove'];

        $query = "delete from products where ProductID = '$remove'";
        mysqli_query($conn, $query);

        header("location: delete_product.php");
    }
?>
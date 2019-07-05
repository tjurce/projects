<?php
    function deleteCat() {
        include "dbConnection.php";
        
        $remove = $_SESSION['remove'];

        $query = "delete from categories where CatID = '$remove'";
        mysqli_query($conn, $query);

        header("location: delete_category.php");
    }
?>
<?php
    function deleteUser() {
        include "dbConnection.php";
        
        $remove = $_SESSION['remove'];

        $query = "delete from customers where CustomerID = '$remove'";
        mysqli_query($conn, $query);

        header("location: view_users.php");
    }
?>
<!DOCTYPE html>

<?php
    include "scripts/php/dbConnection.php";
    
    session_start();

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);

        $query = "select * from admins where AdminEmail = '$email' and AdminPassword = '$pass'";
        $run_query = mysqli_query($conn, $query);

        $check_query = mysqli_num_rows($run_query);

        if($check_query==0) {
            echo "<script>alert('Pogrešan email ili lozinka')</script>";
        }

        else {
            $_SESSION['admin_email'] = $email;
            
            echo "<script>window.open('admin.php?logged_in=You have successfully logged in', '_self')</script>";
        }
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Prijava</title>

        <link rel="stylesheet" type="text/css" href="styles\login.css">
    </head>
    <body>
        <div class="login">
            <h1>Prijavi se admine!</h1>
            <form method="post">
                <input type="email" name="email" placeholder="Email" required="required" />
                <input type="password" name="pass" placeholder="Lozinka" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Prijavi se</button>
            </form>
        </div>
    </body>
</html>
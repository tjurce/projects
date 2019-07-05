<?php
    include "scripts/php/dbConnection.php";


    $ip = $_SESSION['ip'];
    $pro_id = array();

    $check_query = "select * from carts where IPAddress = '$ip'";
    $run_check_query = mysqli_query($conn, $check_query);

    while($rows = mysqli_fetch_array($run_check_query)) {
        $pro_id[] = $rows['ProductID'];
    }

    $i = 0;
    $total_Price = 0;
    $total_eu_price = 0;

    while($i <= count($pro_id)-1) {
        $query = "select * from products where ProductID = '$pro_id[$i]'";
        $run_query = mysqli_query($conn, $query);
        $i++;
        

        while($rows = mysqli_fetch_assoc($run_query)) {
            $proID = $rows['ProductID'];
            $proName = $rows['ProductName'];
            $proPrice = array($rows['ProductPrice']);
            $proDesc = $rows['ProductDesc'];
            $proImage = $rows['ProductImage'];
            
            $values = array_sum($proPrice);
            $total_Price += $values;
        }
    }
    $total_eu_price = $total_Price*0.13;
    $pp_checkout_btn = '';
?>

<link rel="stylesheet" type="text/css" href="styles\style.css">

<div class="col-lg-12 paypal_img">
    <?php
        $pp_checkout_btn .= '<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="tomi.jurcevic-facilitator@gmail.com">';
        $j = 0;
        for($j = 0; $j < $i; $j++) {
            $query = "select * from products where ProductID = '$pro_id[$j]'";
            $run_query = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_array($run_query)) {
                $new_query = "select * from carts where IPAddress = '$ip' AND ProductID = '$pro_id[$j]'";
                $run_new_query = mysqli_query($conn, $new_query);
                $new_rows = mysqli_fetch_assoc($run_new_query);
                $proQty = $new_rows['Quantity'];

                $proID = $rows['ProductID'];
                $proName = $rows['ProductName'];
                $proPrice = $rows['ProductPrice'];
                $proDesc = $rows['ProductDesc'];
                $proImage = $rows['ProductImage'];

            }
        $y = $j + 1;
        $pp_checkout_btn .= '<input type="hidden" name="item_name_' . $y . '" value="' . $proName . '">
        <input type="hidden" name="amount_' . $y . '" value="' . $proPrice*0.13 . '">
        <input type="hidden" name="quantity_' . $y . '" value="' . $proQty . '">  ';
        }
        $pp_checkout_btn .= '<input type="hidden" name="shipping" value="0.00">
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="return" value="https://tomijurcevic.000webhostapp.com/zavrsni/payment_success.php">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="bn" value="PP-ShopCartBF">
        <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
        </form>';
        echo $pp_checkout_btn;
    ?>
</div>
<?php
include "user_header.php";
include "connection.php";
error_reporting(0);
session_start();
$addr = $_SESSION['address'];
include_once "cart.php";
if (is_null($_SESSION['session2']))

    header("location:user_login.php");
else  {
        $ar1 = array();
        $ar2 = array();
        $ar1 = $_SESSION['cart'];
        $email = $_SESSION['session2'];
        $count = count($ar1);
        $gt = 0;
        for ($i = 0; $i < $count; $i++) {
            $ar2 = (array)$ar1[$i];
            $pr = $ar2['price'];
            $disc = $ar2['discount'];
            $amt = $pr - ($disc / 100) * $pr;
            $gt += $amt * $ar2['qty'];
        }
        date_default_timezone_set("America/Montreal");
        $dt = date("Y-m-d");
        $tm = date("h:i:s A");
        $ptype = $_SESSION['payment_method'];
        $insert = "insert into bill values(null,$gt,'$ptype','$email','$dt','$tm','pending',$addr)";
        // echo $insert . "<br>";
        mysqli_query($conn, $insert);

        $select = "select max(b_id) from bill";
        $sres = mysqli_query($conn, $select);
        $srow = mysqli_fetch_array($sres);
        $bill_id = $srow[0];

        for ($i = 0; $i < $count; $i++) {
            $ar2 = (array)$ar1[$i];
            $pr = $ar2['price'];
            $disc = $ar2['discount'];
            $amt = $pr - ($disc / 100) * $pr;
            $gt += $amt * $ar2['qty'];

            $insert_bd = "insert into bill_details values(null," . $ar2['pro_id'] . "," . $ar2['qty'] . ",$bill_id)";
            // echo $insert_bd;
            mysqli_query($conn, $insert_bd);
            // header("location:my_orders.php");


        }
        
       
    }
    ?>

<div class="wthreehome-latest">
    <div class="container">
        <h2>Order Placed</h2><br>
        <div class="row">
            <div class="col-sm-12">
                <h4>Thanks for placing order with us!</h4><br>
                <h4>Your order items will be arrived within 50 mins.</h4><br>
                <h4>you can check your order at <a href="my_orders.php">my orders</a><h4>      
            
            </div>
            
                
        </div>

    </div>
</div>
<?php
unset($_SESSION['cart']);
?>
<?php include "footer.html" ?>

    
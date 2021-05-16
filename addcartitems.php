<?php
$item = $_REQUEST['p'];
$q = $_REQUEST['q'];
if ($q == "") {
    $q = 1;
}
include "connection.php";
include_once "cart.php";
session_start();
$select = "select * from products where p_id=$item";
$item_res = mysqli_query($conn, $select);
$item_row = mysqli_fetch_array($item_res);
$ar1 = array();
$num = 0;
if (isset($_SESSION['cart'])) {
    $ar1 = (array)$_SESSION['cart'];
    $count = count($ar1);
    $flag = false;
    foreach ($ar1 as $items) {
        if ($item == $items->getPro_id()) {
            $flag = true;
            break;
        }
    }
    if ($flag == true) {
        $total = $items->getQty() + $q;
        $items->setQty($total);

    } else {
        array_push($ar1, new cart($count, $item, $item_row[1], $item_row[3], $item_row[2], $item_row[7],$item_row[4],$q));
        $_SESSION['cart'] = $ar1;
    }

}
else {
    $ar1[0] = new cart($num, $item, $item_row[1], $item_row[3], $item_row[2], $item_row[7],$item_row[4],$q);
    $_SESSION['cart'] = $ar1;

}
echo "Item added to cart.";

?>

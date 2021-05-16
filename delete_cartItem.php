<?php
session_start();
$ar3 = array();
$ar4 = array();
$temp = array();
$num = 0;
$id = $_GET['q'];
if (isset($_SESSION['cart'])) {
    $ar3 = $_SESSION['cart'];
    $count = count($ar3);
    for ($i = 0; $i < $count; $i++) {
        $ar4 = (array)$ar3[$i];
        $srno = $ar4['srno'];
        if ($id != $srno) {
            $temp[$num] = $ar3[$i];
            $num++;
        }
    }
}
$_SESSION['cart'] = $temp;
echo "Item removed from the cart";
?>
<?php
include "connection.php";
$id=$_REQUEST['q'];
$update="update bill set status='dispatched' where b_id=$id";
mysqli_query($conn,$update);
header("location:dispatched_orders.php");
echo $update;
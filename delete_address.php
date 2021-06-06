<?php
include "connection.php";
$id=$_REQUEST['q'];
$delete="delete from address WHERE aid=$id";
mysqli_query($conn,$delete);
echo $delete;
header("location:view_address.php");
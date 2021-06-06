<?php
include "connection.php";
$username=$_REQUEST['q'];
$delete="delete from admin WHERE username='$username'";
mysqli_query($conn,$delete);
header("location:view_admin.php");
<?php
include "connection.php";
$email = $_REQUEST['mail'];
$password = $_REQUEST['password'];

$select = "select * from user";
$res = mysqli_query($conn, $select);
$flag = false;
while (($row = mysqli_fetch_array($res))) {
    if ($email == $row['email'] && $password == $row['password']) {
        $flag = true;
        break;
    }
}
if ($flag == true) {
    session_start();
    $_SESSION['session2'] = $email;
    header("location:user_home.php");
} else {
    header("location:index.php?msg=Incorrect Email or Password");
}
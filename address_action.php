<?php
include "connection.php";
session_start();
$address=$_REQUEST['address'];
if($address == ""){
    echo "No Previous address";
    $location=urlencode($_REQUEST['location']);
    $apartment=urlencode($_REQUEST['apartment']);
    $cno=$_REQUEST['cno'];
    $city=strtolower($_REQUEST['city']);
    $state=$_REQUEST['state'];
    $insert="insert into address values(null,'$location','$apartment',$cno,'$city','$state','".$_SESSION['session2']."')";
    mysqli_query($conn,$insert);
    $select_addr="select max(aid) from address";
    $addr_res=mysqli_query($conn,$select_addr);
    $addr_row=mysqli_fetch_array($addr_res);
    $_SESSION['address']=$addr_row[0];
}
else{
    $_SESSION['address']=$address;
}

header("location:checkout.php");
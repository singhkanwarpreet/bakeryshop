<?php
include "connection.php";

$scat_name=$_REQUEST['sbcat_name'];
$descp=$_REQUEST['descp'];
$category=$_REQUEST['category'];
$insert="insert into sub_category VALUES (null,'$scat_name','$descp',$category)";
echo $insert;
mysqli_query($conn,$insert);
header("location:sub_category.php?msg=SubCategory Added Successfully");
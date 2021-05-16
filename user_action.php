<?php
include "connection.php";
$email=$_REQUEST['mail'];
$password=$_REQUEST['password'];
$cpassword=$_REQUEST['cpassword'];
$name=$_REQUEST['name'];
$mobile_no=$_REQUEST['mobile_no'];
$gender=$_REQUEST['gender'];


$select="select * from user";
$res=mysqli_query($conn,$select);
$flag=false;
while($row=mysqli_fetch_array($res)){
    if($row[0]==$email){
        $flag=true;
        break;
    }
}
if($flag ==true){
    header("location:user.php?msg=User Email already exists");
}
else{
    if($password == $cpassword){
        $insert="insert into user VALUES ('$email','$password','$name',$mobile_no,'$gender')";
        echo "$insert";
        mysqli_query($conn,$insert);
        header("location:index.php?msg=User added successfully");
    }
    else{
        header("location:index.php?msg=Password and Confirm Password not Matched");
    }
}

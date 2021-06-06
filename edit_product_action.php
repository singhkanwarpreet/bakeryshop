<?php
include "connection.php";
$id = $_REQUEST['id'];
$product_name = $_REQUEST['p_name'];
$price = $_REQUEST['price'];
$photo = $_FILES['photo']['name'];
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$discount = $_REQUEST['discount'];
$category = $_REQUEST['category'];
$sub_category = $_REQUEST['sub_category'];


if ($photo == "") {
    $update = "update products set p_name='$product_name',price=$price,discount=$discount,
cat_id=$category,sub_id=$sub_category WHERE p_id=$id";

    mysqli_query($conn,$update);
     header("location:view_product.php");
}
else{
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    if($ext=="jpg" || $ext =="png" || $ext=="jpeg" || $ext=="gif"){
        $temp=$_FILES['photo']['tmp_name'];
        $path="images/$photo";
        move_uploaded_file($temp,$path);
        $update = "update products set p_name='$product_name',price=$price,photo='$path',discount=$discount,
cat_id=$category,sub_id=$sub_category WHERE p_id=$id";
        echo $update;
        mysqli_query($conn,$update);
        header("location:view_product.php");
    }
    else{
        header("location:view_product.php?msg=upload image files only");
    }
}

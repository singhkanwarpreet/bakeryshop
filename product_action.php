<?php
include "connection.php";
$p_name = $_REQUEST['p_name'];
$price = $_REQUEST['price'];
$photo = $_FILES['photo']['name'];
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
//echo $ext;
$discount = $_REQUEST['discount'];
$category = $_REQUEST['category'];
$sub_category = $_REQUEST['sub_category'];

//echo $p_name." ".$category." ".$sub_category;
$select = "select * from products";
$p_res = mysqli_query($conn, $select);
$flag = false;
while($row=mysqli_fetch_array($p_res)) {
    if ( ($row['p_name'] == $p_name && $category == $row[5]) || ($row['p_name'] == $p_name) && $sub_category == $row[6]) {
        $flag = true;
        break;
    }
}
if ($flag == true) {
    header("location:product.php?msg=product already exist");
} else {
    if ($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif") {
        $temp = $_FILES['photo']['tmp_name'];
        $path = "images/$photo";
        move_uploaded_file($temp, $path);
        $insert = "insert into products VALUES (null,'$p_name',$price,'$path',$discount,$category,$sub_category)";
       
   if(     mysqli_query($conn, $insert)) {
       header("location:product.php?msg=product Added Successfully");
   }
        else
        {
            echo $insert;
            echo "Insert Failed";
        }
    } else {
        header("location:product.php?msg=upload image files only");
    }
};


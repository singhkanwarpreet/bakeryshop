<?php
include "admin_header.php";
include "connection.php";
$id = $_REQUEST['q'];
$select = "select * from products WHERE p_id=$id";
$res = mysqli_query($conn, $select);
$row = mysqli_fetch_array($res);
?><script>

    function getsubcategory(obj)
    {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("sub_category").innerHTML=this.responseText;



            }
        };
        xmlhttp.open("GET", "getsubcategories.php?catid=" + obj, true);
        xmlhttp.send();


    }
</script>
<div class="wthreehome-latest">
    <div class="container">
        <h1>Products</h1>
        <form action="edit_product_action.php" enctype="multipart/form-data" class="form-horizontal" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>"/>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Product Name</label>

                    <input type="text" class="form-control" name="p_name" value="<?php echo $row[1] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Price</label>

                    <input type="text" name="price" value="<?php echo $row[2] ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Photo</label>
                    <img src="<?php echo $row['photo']; ?>" style="width:20% !important;height: 20% !important;">
                    <input type="file" name="photo" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Discount</label>

                    <input type="text" name="discount" value="<?php echo $row[4] ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Category Name</label>

                    <select name="category" class="form-control" required onchange="getsubcategory(this.value)">
                        <option value="">Choose Category</option>
                        <?php
                        include "connection.php";

                        $select = "select * from category";
                        $cres = mysqli_query($conn, $select);
                        while ($crow = mysqli_fetch_array($cres)) {
                            ?>
                            <option <?php if ($row[5] == $crow[0]){ echo "selected";  $subselectcat=$row[5];}?>
                                value="<?php echo $crow[0] ?>"><?php echo $crow[1] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Sub Category Name</label>

                    <select name="sub_category" id="sub_category" class="form-control" required>
                        <option value="">Choose Category</option>
                        <?php
                        include "connection.php";
                        $sselect = "select * from sub_category where cat_id=$subselectcat";
                        $sres = mysqli_query($conn, $sselect);
                        while ($srow = mysqli_fetch_array($sres)) {
                            ?>
                            <option <?php if ($row[6] == $srow[0]) echo "selected"; ?>
                                value="<?php echo $srow[0] ?>"><?php echo $srow[1] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary" value="INSERT"/>
                    <?php
                    if (isset($_REQUEST['msg']))
                        echo $_REQUEST['msg'];
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "admin_footer.php" ?>









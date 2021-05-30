<?php include "admin_header.php";
?>
<script>

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
        <form action="product_action.php" enctype="multipart/form-data" class="form-horizontal" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Product Name</label>

                    <input type="text" class="form-control" name="p_name" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Price</label>

                    <input type="text" name="price" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Photo</label>

                    <input type="file" name="photo" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Discount</label>

                    <input type="text" name="discount" required class="form-control">
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
                        $res = mysqli_query($conn, $select);
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
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
<?php include "admin_header.php";
?>
<div class="wthreehome-latest">
    <div class="container">
        <h1>Sub Category</h1>
        <form action="sub_category_action.php" class="form-horizontal" method="post">
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Sub-Category Name</label>

                    <input type="text" class="form-control" name="sbcat_name" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Description</label>

                    <input type="text" name="descp" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Category Name</label>

                    <select name="category" class="form-control" required>
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